@include('layouts.navbar')
@section('content')
<table>
    <thead>
        <tr>
            <th>Album Name</th>
            <th>View counter</th>
            <th>Recorded</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($albums as $album)
            <tr>
                <td><a href = '/{{ $album }}'>{{ $album }}</a></td>
                <td>0</td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
@include('layouts.footer')
