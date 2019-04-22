@extends('layouts.app')
@section('content')

    <form action="{{ url('posts') }}" method="POST">
        {{ csrf_field() }}
        <label for="title">Title</label>
        <input id="title" type="text" name="title">

        <label for="content">Content</label>
        <input id="content" type="text" name="content">

        <button type="submit">Create</button>
    </form>

@endsection