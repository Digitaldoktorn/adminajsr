@extends('layouts.app')
@section('content')

    <h1>Admin Page</h1><br>
    <h3>Users
        @if(Auth::user())
            <a class="btn btn-primary btn-sm" title="Add user" href="{{ url('admin/create-user') }}">New user</a>
    </h3>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <table class="table table-striped">
        <tbody>
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        @if(count($users) > 0)
            @foreach ($users as $user)
                <tr>

                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles->first()->name }}</td>

                    <td>
                        <a href="{{ url('admin/'.$user->id.'/edit-user') }}" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ url('admin/'.$user->id.'/delete-user') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                        </form>
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

