@extends('layouts.app')

@section('content')
    <h1>App1 page</h1>
    @if (!empty($lang))
        <ul>
            @foreach($lang as $ln)
                <li>{{ $ln }}</li>
            @endforeach
        </ul>
    @endif
@endsection

@section('footer')
    some footer
@endsection
