<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuysController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $users = \Auth::User();
            $buys = $users->buys()->orderBy('created_at')->paginate(10);
            $buys_total_value =
            \App\Buy::whereYear('created_at', date('Y'))
            ->get()
            ->groupBy(function ($row) {
                return $row->created_at->format('m');
            })
            ->map(function ($day) {
                return $day->sum('price');
            });

            $data = [
                'users' => $users,
                'buys' => $buys,
                'buys_total_value' => $buys_total_value
            ];
        }

        return view('welcome', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'goods' => 'required|max:191',
            'purchase_number' => 'numeric',
            'price' => 'numeric',
        ]);

        $request->user()->buys()->create([
            'goods' => $request->goods,
            'purchase_number' => $request->purchase_number,
            'price' => $request->price,
            'user_id' => auth()->id(),
        ]);

        return back();
    }

    public function destroy($id)
    {
        $buy = \App\Buy::find($id);

        if (\Auth::id() === $buy->user_id) {
            $buy->delete();
        }

        return back();
    }
}
