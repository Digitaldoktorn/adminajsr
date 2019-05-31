<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
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
        $roles = Role::all();
        $user = Auth::user();
        if($user->can('createUser', User::class)){
            return view('admin.createUser', compact('roles'));
        } else {
            echo 'Not authorized';
        }
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
        // get current logged in user
        $user = Auth::user();

        $user = User::find($id);

        if ($user->can('editUser', $user)) {
            return view('admin.editUser', compact('user'));
        } else {
            echo 'Not Authorized.';
        }

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
        if($user->can('destroyUser', $user)){
            $user->delete();
            return redirect('/admin')->with('status', 'User deleted! ');
        } else {
            echo "Not Authorized.";
        }




    }
}
