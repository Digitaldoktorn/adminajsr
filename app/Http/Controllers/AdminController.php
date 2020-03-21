<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\User;
    use App\Role;
    use Gate;
    use App\Http\Requests\ValidateUser;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Auth;

    class AdminController extends Controller
    {
        /**
         * Display a listing of the resource.
         * @return \Illuminate\Http\Response
         */
//        shows all users in the database on the admin page
        public function indexAdmin()
        {
            $users = User::all();

            return view('admin/indexAdmin', compact('users'));
        }

        /**
         * Show the form for creating a new resource.
         * @return \Illuminate\Http\Response
         */
//        Admin can create users
        public function createUser()
        {
            if (!Gate::allows('isAdmin')) {
                abort(404, 'Sorry, you are not authorized');
            }
            $roles = Role::all();

            return view('admin.createUser', compact('roles'));
        }

        /**
         * Store a newly created resource in storage
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
//        Storing user - with validation - see rules method in ValidateUser.php
        public function storeUser(ValidateUser $request)
        {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $role = Role::find($request->role_id);
//            $array = [];
//            $array[] = $role;
            $user->city = $request->city;
            $user->address = $request->address;
            $user->meeting_time = $request->meeting_time;
            $user->phone = $request->phone;
            $user->responsibility = $request->responsibility;

            $user->save();
            $user->roles()->attach($role);

            return redirect('/admin')->with('status', 'User has been created! ');
        }

        /**
         * Display the specified resource.
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
//        Admin can edit user
        public function editUser($id)
        {
            if (!Gate::allows('isAdmin')) {
                abort(404, 'Sorry, you are not authorized');
            }
            $roles = Role::all();
            $user = User::find($id);

            return view('admin.editUser', compact('user', 'roles'));


        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  int $id
         * @return \Illuminate\Http\Response
         */

//        Storing updated user
        public function updateUser(ValidateUser $request, $id)
        {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->city = $request->city;
            $user->address = $request->address;
            $user->meeting_time = $request->meeting_time;
            $user->phone = $request->phone;
            $user->responsibility = $request->responsibility;

            // Updating roles-first detach current role, then attach new role
            if (isset($user->roles->first()->id)) {
                $user->roles()->detach($user->roles->first()->id);
            }
            $user->roles()->attach($request->role_id);
            $user->save();

            return redirect('/admin')->with('status', 'User updated! ');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function destroyUser($id)
        {

            $user = User::find($id);
            $user->delete();

            return redirect('/admin')->with('status', 'User deleted! ');


        }
    }
