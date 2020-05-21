@include('layouts.navbar')
@section('content')
<img src = "{{ $image }}">
<br>
<button>Previous</button>
<button>Next</button>
@include('layouts.footer')
