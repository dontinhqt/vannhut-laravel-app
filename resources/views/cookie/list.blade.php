@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row table-responsive">
        <table class="table table-hover table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Ip</th>
                    <th scope="col">User Agent</th>
                    <th scope="col">Cookie</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listCookie as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->user_id }}</td>
                        <td>{{ $data->ip }}</td>
                        <td>{{ $data->user_agent }}</td>
                        <td>
                            <button type="button" class="btn btn-outline-info " onclick="copyToClipboard('#copy-cookie-{{ $data->user_id }}')">Copy Cookie</button>
                            <p id="copy-cookie-{{ $data->user_id }}">{{ $data->cookie }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        @if( request()->get('limit') )
            {!! $listCookie->appends(['limit' => request()->get('limit')])->links() !!}
        @else
            {!! $listCookie->links() !!}
        @endif
        
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }
</script>
