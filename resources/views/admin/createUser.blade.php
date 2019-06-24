@extends('layouts.app')
@section('content')

    <h1>Add User</h1>
    <br>

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
        <div class="col-12 col-md-12">

            <form class="form" action="{{ url('admin/create-user') }}" method="POST">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col" id="all_users">
                        <h5 class="p-3 mb-2 bg-secondary text-white">For all users:</h5>
                        <div class="form-group">
                            <label for="name">Name <super>*</super></label>
                            {{--"old" means that the value is not lost in case of error--}}
                            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
                        </div>


                        <div class="form-group">
                            <label for="email">Email <super>*</super></label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Password <super>*</super></label>
                            <input id="password" class="form-control" type="password" name="password"
                                   value="{{ old('password') }}">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Role <super> *</super></label>
                            </div>

                            <select class="custom-select" id="role" type="text" name="role_id">
                                <option value="" disabled selected>Choose Role</option>
                                @foreach ($roles as $role)
                                    <option id="role_id" value={{ $role->id }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <small><em><super>*</super> Required</em></small>
                    </div>
                    <div class="col">
                        <h5 class="p-3 mb-2 bg-secondary text-white">For local contacts only:</h5>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input id="city" class="form-control" type="text" name="city" value="{{ old('city') }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input id="address" class="form-control" type="text" name="address" value="{{ old('address') }}">
                        </div>
                        <div class="form-group">
                            <label for="meeting_time">Meeting time</label>
                            <input id="meeting_time" class="form-control" type="text" name="meeting_time" placeholder="Example: Thursdays at 6:30 PM" value="{{ old('meeting_time') }}">
                        </div>
                        <br>
                        <br>
                        <h5 class="p-3 mb-2 bg-secondary text-white">For board members only:</h5>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="responsibility">Responsibility</label>
                            <textarea id="responsibility" class="form-control" rows="3" name="responsibility" value="{{ old('responsibility') }}"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add user</button>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection

