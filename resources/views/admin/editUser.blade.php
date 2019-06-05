@extends('layouts.app')
@section('content')

    <h1>Edit user</h1>

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
            <form class="form" action="{{ url('admin/'.$user->id.'/update-user') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" value="{{ $user->name }}" class="form-control" type="text" name="name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" value="{{ $user->email }}" class="form-control" type="email" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" value="{{ $user->password }}" class="form-control" type="password" name="password">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Role</label>
                    </div>
                    {{--<select class="custom-select form-control" id="role" name="role_id">--}}
                        {{--<option selected>Choose Role</option>--}}
                        {{--<option name="admin" value="1">Admin</option>--}}
                        {{--<option name="boardmember" value="2">Board member</option>--}}
                        {{--<option name="localcontact" value="3">Local contact</option>--}}
                        {{--<option name="user" value="4">User</option>--}}
                    {{--</select>--}}

                    <select class="custom-select" id="role" type="text" name="role_id">
                        <option selected>Choose Role</option>
                        @foreach ($roles as $role)
                            <option id="role_id" value={{ $role->id }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update user</button>
            </form>

        </div>
    </div>

    <form action="{{ url('admin/'.$user->id.'/delete-user') }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button class="btn btn-danger" type="submit">Delete</button>
    </form>

@endsection