<table>
    <thead>
        <tr>
            <th>SN</th>
            <th>Tags Asset</th>
            <th>Asset</th>
            <th>PIC</th>
            <th>Location</th>
            <th>Status</th>
            <th>User Created</th>
            <th>Do Create</th>
        </tr>
    </thead>
    <tbody>
        @foreach($asset as $value)
        <tr>
            <td>{{ $value->sn }}</td>
            <td>{{ $value->asset_code }}</td>
            <td>{{ $value->asset_name }}</td>
            <td>{{ $value->pic }}</td>
            <td>{{ $value->office->office_name }}</td>
            <td>{{ $value->condition}}</td>
            <td>{{ $value->user_id }}</td>
            <td>{{ $value->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>