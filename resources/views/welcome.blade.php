@extends('layouts.app')

@section('content')

    <h1 class="mb-5">家計助けるノート</h1>
    @if (Auth::check())
        @include('buys.buys', ['buys' => $buys])

        @include('buys.buys_form', ['buys' => $buys])
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1 class="mb-4">Household-planへようこそ！</h1>
            {!! link_to_route('signup.get', '新規作成', [], ['class' => 'btn btn-primary btn-lg mr-4']) !!}
            {!! link_to_route('login.get', 'ログイン', [], ['class' => 'btn btn-primary btn-lg']) !!}
        </div>
    </div>
    @endif
@endsection