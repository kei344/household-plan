@extends('layouts.app')

@section('content')

    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="" src="" alt="保存した画像を表示する">
                </div>
            </div>
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