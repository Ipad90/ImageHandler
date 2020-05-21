@include('layouts.navbar')
@section('content')
<table>
    @foreach (array_chunk($image_details['images'], 2) as $images)
        <tr>
            @foreach ($images as $image)
                <td>
                    <a href = "/{{ $image_details['album'] }}/{{ $image['image_name'] }}">
                        <img src = "{{ $image['image_link'] }}">
                    </a>
                </td>
            @endforeach
        </tr>
    @endforeach
</table>
@include('layouts.footer')
