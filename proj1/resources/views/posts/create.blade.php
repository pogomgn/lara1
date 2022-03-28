@extends('layouts.app')

@section('content')
    <h2>Create post</h2>
    <form method="post" action="/proj1/public/posts">
        @csrf
        <input type="text" name="title" placeholder="Enter title" />
        <input type="text" name="url" placeholder="Enter url" />
        <input type="text" name="content" placeholder="Enter content" />
        <input type="submit" name="submit" />
    </form>
@endsection
