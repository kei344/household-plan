@if (count($buys) > 0)
    <table class="table ">
        <thead class="thead-light">
            <tr>
                <th>日付</th>
                <th>商品名</th>
                <th>価格</th>
                <th>購入数</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buys as $buy)
                <tr>
                    <td>{{ $buy->created_at->format('m月d日') }}</td>
                    <td>{{ $buy->goods }}</td>
                    <td>{{ $buy->price }}</td>
                    <td>{{ $buy->purchase_number }}</td>
                    <td>
                        @if (Auth::id() === $buy->user_id)
                            {!! Form::open(['route' => ['buys.destroy', $buy->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2>今月の支出額 {{ $buys_total_value[2] }} 円</h2>
    {{ $buys->links('pagination::bootstrap-4') }}
@endif