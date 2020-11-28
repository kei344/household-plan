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
            <div>1月分</div>
            <div>2月分</div>
            <div>3月分</div>
            <div>4月分</div>
            <div>5月分</div>
        </div>
    </div>
@endsection