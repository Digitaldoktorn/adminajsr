@extends('layouts.app')
@section('content')

    <h1>Edit user</h1>

    {{--Kopierat från https://gist.github.com/trevorgreenleaf/b1508d5524d43a666757f9e9fd1e3903--}}
    @if (count($errors) > 0)
        <div class="alert alert-danger text-left">
            <strong>Whoops!</strong> There were problems with input:
            <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row">
        <div class="col-12 col-md-4">
            <form class="form" action="{{ url('users/'.$user->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" value="{{ $user->name }}" class="form-control" type="text" name="name">
                </div>

                <div class="form-group">
                    <label for="role_id">Role ID</label>
                    <input id="role_id" value="{{ $user->role_id }}" class="form-control" type="number" name="role_id">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" value="{{ $user->email }}" class="form-control" type="email" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" value="{{ $user->password }}" class="form-control" type="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Update user</button>
            </form>

        </div>
    </div>

    <form action="{{ url('users/'.$user->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button class="btn btn-danger" type="submit">Delete</button>
    </form>

@endsection