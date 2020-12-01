<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        $buys_total_value =
            \App\Buy::whereYear('created_at', date('Y'))
            ->get()
            ->groupBy(function ($row) {
                return $row->created_at->format('m');
            })
            ->map(function ($day) {
                return $day->sum('price');
            });

        return view('users.show', [
            'user' => $user,
            'buys_total_value' => $buys_total_value
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit',[
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (\Auth::id() === $user->id)
        {
            $user->delete();
        }

        return redirect('/');
    }
}
