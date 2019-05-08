@extends('layouts.app')
@section('content')

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <hr>
    <small class="text-black-50">Published {{ $post->created_at }} by {{ $post->user->name }}</small><br><br>

    <a href="/posts" class="btn btn-sm btn-primary">Go back</a>

@endsection