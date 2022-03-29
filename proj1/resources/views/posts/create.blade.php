@extends('layouts.app')

@section('content')
    <h2>Create post</h2>
    {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\PostController@store']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::input('text', 'title') !!}
    </div>
    <div class="form-group">
        {!! Form::label('url', 'Url') !!}
        {!! Form::input('text', 'url') !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Content') !!}
        {!! Form::input('text', 'content') !!}
    </div>
    <div class="form-group">
        {!! Form::submit() !!}
    </div>
    {!! Form::close() !!}

    <form method="post" action="/proj1/public/posts">
        @csrf
        <input type="text" name="title" placeholder="Enter title"/>
        <input type="text" name="url" placeholder="Enter url"/>
        <input type="text" name="content" placeholder="Enter content"/>
        <input type="submit" name="submit"/>
    </form>
@endsection
