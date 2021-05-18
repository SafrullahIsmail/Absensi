<div class="con-table">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody id="table">
        @foreach($data as $key => $value)
            <tr>
                <td scope="row">{{ ($data->currentpage() - 1) * $data->perpage() + $key + 1 }}</td>
                <td>{{ $value->user->name }}</td>
                <td>{{ $value->status }}</td>
                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('M d Y H:i:s') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>