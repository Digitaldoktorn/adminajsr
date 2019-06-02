@extends('layouts.app')
@section('content')

    <h1>Add User</h1>

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
        <div class="col-12 col-md-6">
            <form class="form" action="{{ url('admin/create-user') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" class="form-control" type="text" name="name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" class="form-control" type="password" name="password">
                </div>

                {{--<div class="form-group">--}}
                    {{--<label for="role_id">Role ID</label>--}}
                    {{--<input id="role_id" class="form-control" type="number" min="1" max="4" name="role_id">--}}
                {{--</div>--}}

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Role</label>
                    </div>
                    <select class="custom-select" id="role" name="role_id">
                        <option selected>Choose Role</option>
                        <option name="admin" id="role_id" value="1">Admin</option>
                        <option name="boardmember" id="role_id" value="2">Board member</option>
                        <option name="localcontact" id="role_id" value="3">Local contact</option>
                        <option name="user" id="role_id" value="4">User</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add user</button>
            </form>

        </div>
    </div>

@endsection

