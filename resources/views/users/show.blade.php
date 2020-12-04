@extends('layouts.app')

@section('content')

    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
        <ul class="list-unstyled">
            @for ($i = 1; $i <= 12; $i++)
                <li class="media">
                    <div class="mb-4">{{ $i }} 月分</div>
                    <div class="media-body">
                        <div>
                            {{ $buys_total_value }}
                        </div>
                    </div>
                </li>
            @endfor
        </ul>
    </div>
@endsection