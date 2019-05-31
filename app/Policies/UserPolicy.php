<?php

namespace App\Policies;

use App\User;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
//    public function indexAdmin(User $user, User $model)
//    {
//        return TRUE;
//    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function createUser(User $user)
    {
        // admin can create a user
        return $user->roles->first()->id == 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function editUser(User $user, User $model)
    {
        // admin can edit a user
        return $user->roles->first()->id == 1;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function destroyUser(User $user, User $model)
    {
        // admin can delete a user
        return $user->roles->first()->id == 1;
    }

}
