@extends('layouts.app')

@section('content')
    Title: {{$post->title}} <br>
    Content: {{$post->content}}
    <form method="post" action="/proj1/public/posts/{{$post->id}}">
        @csrf
        <input type="hidden" name="_method" value="DELETE" />
        <input type="submit" name="submit" value="Delete" />
    </form>
@endsection
