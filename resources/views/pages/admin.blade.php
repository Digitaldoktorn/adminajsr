@extends('layouts.app')
@section('content')

    <h1>Admin Page</h1>

    {{--@if (session('status'))--}}
        {{--<div class="alert alert-success">--}}
            {{--{{ session('status') }}--}}
        {{--</div>--}}
    {{--@endif--}}

    <h2>Users and roles</h2>
    {{--<table class="table table-striped">--}}
        {{--<tbody>--}}
        {{--@if(count($users) > 0)--}}
            {{--@foreach ($users as $user)--}}
                {{--<tr>--}}
                    {{--<th scope="row">{{ $user->title }}</th>--}}
                    {{--<td>{{ $user->name }}</td>--}}
                    {{--<td>{{ $user->responsibility }}</td>--}}
                    {{--<td>{{ $user->email }}</td>--}}
                    {{--<td>--}}
                        {{--@if(Auth::user())--}}
                            {{--<a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-sm btn-primary">Edit</a>--}}
                        {{--@endif--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
        {{--@else--}}
            {{--<p>No posts found</p>--}}
        {{--@endif--}}

        {{--</tbody>--}}
    {{--</table>--}}
    {{--@if(Auth::user())--}}
        {{--<a class="btn btn-primary btn-sm" title="Add user" href="{{ url('users/create') }}">Add user</a>--}}
    {{--@endif--}}


@endsection