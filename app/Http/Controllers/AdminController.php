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
    public function indexAdmin()
    {

        $users = User::all();
        return view('admin/indexAdmin', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function createUser()
    {
        if(!Gate::allows('isAdmin')){
            abort(404, 'Sorry, you are not authorized');
        }
        $roles = Role::all();
        $user = Auth::user();

        return view('admin.createUser', compact('roles'));

    }

    /**
     * Store a newly created resource in storage
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(ValidateUser $request)
    {
        $user = new User;
        $user->name = $request->name;
//        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $role = Role::find($request->role_id);
        $array = [];
        $array[] = $role;

        $user->save();
        $user->roles()->attach($role);
        return redirect('/admin')->with('status', 'User has been created! ');
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUser($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(404, 'Sorry, you are not authorized');
        }
        // get current logged in user
        $user = Auth::user();
        $roles = Role::all();

        $user = User::find($id);


        return view('admin.editUser', compact('user', 'roles'));


//        return view('admin.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateUser(ValidateUser $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        // Updating roles
        if(isset($user->roles->first()->id))
        {
            $user->roles()->detach($user->roles->first()->id);
        }
        $user->roles()->attach($request->role_id);
        $user->save();

        return redirect('/admin')->with('status', 'User updated! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($id)
    {
        $user = Auth::user();

        $user = User::find($id);
        $user->delete();
        return redirect('/admin')->with('status', 'User deleted! ');


    }
}
