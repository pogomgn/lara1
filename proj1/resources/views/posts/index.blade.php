@extends('layouts.app')

@section('content')
    <ul>
        @foreach($posts as $post)
            <li>{{$post->url}} <a href="/proj1/public/posts/{{$post->id}}">{{$post->title}}</a> <a href="/proj1/public/posts/{{$post->id}}/edit">Edit</a></li>
        @endforeach
    </ul>
@endsection
