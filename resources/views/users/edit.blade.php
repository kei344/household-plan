@extends('layouts.app')

@section('content')

    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
            {!! Form::open(['route' => ['users.upload', $user->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::label('image', '画像ファイルを変更する', ['class' => 'mt-3']) !!}
                    {!! Form::file('image', ['class' => 'form-control pb-5 pt-4']) !!}
                </div>
                <div class="text-right">
                    {!! Form::submit('送信', ['class' => 'btn btn-primary mt-2']) !!}
                </div>
            {!! Form::close() !!}
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