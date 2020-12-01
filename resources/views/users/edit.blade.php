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
            <div class="btn btn-success btn-block mt-2">画像を変更する</div>
        </aside>
        <div class="col-sm-8">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}

            <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            @if (Auth::id() === $user->id)
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    {!! Form::submit('ID削除', ['class' => 'btn btn-danger mt-3']) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </div>
@endsection