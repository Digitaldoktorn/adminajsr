@extends('layouts.app')
@section('content')

    <h1>Board members
        {{--@if(Auth::user())--}}
            {{--<a class="btn btn-primary btn-sm" title="Create New Post" href="{{ url('boardmembers/create') }}">+</a>--}}
        {{--@endif--}}
    </h1>

    {{--@if (session('status'))--}}
        {{--<div class="alert alert-success">--}}
            {{--{{ session('status') }}--}}
        {{--</div>--}}
    {{--@endif--}}

    <div class="row">
        @foreach ($boardmembers as $boardmember)
            <div class="col-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        {{--<h5 class="card-title"><a href="{{ url('boardmembers/'.$boardmembers->id) }}">{{ $boardmember->title }}</a></h5>--}}
                        <h5 class="card-title">{{ $boardmember->title }}</h5>
                        <p class="card-text">{{ $boardmember->responsibility }}</p>
                        {{--@if(Auth::user())--}}
                            {{--<a href="{{ url('boardmembers/'.$boardmember->id.'/edit') }}" class="btn btn-primary">Edit</a>--}}
                        {{--@endif--}}
                    </div>
                </div>

            </div>


        @endforeach

    </div>


@endsection