@extends('layouts.app')

@section('content')
    <h2>Edit post</h2>
    <form method="post" action="/proj1/public/posts/{{$post->id}}">
        @csrf
        <input type="hidden" name="_method" value="PUT" />
        <label>
            <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}" />
        </label>
        <label>
            <input type="text" name="url" placeholder="Enter url" value="{{$post->url}}" />
        </label>
        <label>
            <input type="text" name="content" placeholder="Enter content" value="{{$post->content}}" />
        </label>
        <input type="submit" name="submit" />
    </form>
@endsection
