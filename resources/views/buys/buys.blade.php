@if (count($buys) > 0)
    <table class="table">
        <thead class="table-light">
            <tr>
                <th>番号</th>
                <th>商品名</th>
                <th>購入数</th>
                <th>価格</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buys as $buy)
                <tr>
                    <td>{{ $buy->id++ }}</td>
                    <td>{{ $buy->goods }}</td>
                    <td>{{ $buy->purchase_number }}</td>
                    <td>{{ $buy->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif