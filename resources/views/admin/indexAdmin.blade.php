@extends('layouts.app')
@section('content')

    <h1>Admin Page</h1><br>
    <h3>Users
        @if(Auth::user())
            <a class="btn btn-primary btn-sm" title="Add user" href="{{ url('admin/create-user') }}">+</a>
    </h3>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <table class="table table-striped">
        <tbody>
        @if(count($users) > 0)
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->title }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role_id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(Auth::user())
                            <a href="{{ url('admin/'.$user->id.'/edit-user') }}" class="btn btn-sm btn-primary">Edit</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <p>No posts found</p>
        @endif

        </tbody>
    </table>

    @endif
@endsection