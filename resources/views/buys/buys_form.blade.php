@if (\Auth::id() === $users->id)
            {!! Form::open(['route' => 'buys.store']) !!}
                <div class="row jumbotron">
                    <div class="form-group col-sm-5">
                        {!! Form::label('goods', '商品名') !!}
                        {!! Form::text('goods', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('price', '価格') !!}
                        {!! Form::number('price', '円', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-1 mt-1 ml-3">
                        {!! Form::label('purchase_number', '購入数') !!}
                        {!! Form::selectRange('purchase_number', 1, 10, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('追加', ['class' => 'btn btn-primary col-sm-2 my-3 ml-4']) !!}
                </div>
            {!! Form::close() !!}
        @endif