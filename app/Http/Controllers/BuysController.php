<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuysController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::User();
            $buys = $user->buys()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'buys' => $buys
            ];

            return view('welcome', $data);
        }
    }

    public function store(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
