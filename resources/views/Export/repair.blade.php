<table>
    <thead>
        <tr>
            <th>Tags Asset</th>
            <th>Asset</th>
            <th>Code Repair</th>
            <th>Description</th>
            <th>status</th>
            <th>Do Create</th>
        </tr>
    </thead>
    <tbody>
        @foreach($repair as $value)
        <tr>
            <td>{{ $value->asset->asset_code }}</td>
            <td>{{ $value->asset->asset_name }}</td>
            <td>{{ $value->repair_asset }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->status }}</td>
            <td>{{ $value->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>