<?php

namespace App\Policies;

use App\User;
use App\User as UpdatingUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, UpdatingUser $updatingUser)
    {
        return true;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, UpdatingUser $updatingUser)
    {
        return false;
    }

    public function delete(User $user, UpdatingUser $updatingUser)
    {
        return false;
    }

    public function restore(User $user, UpdatingUser $updatingUser)
    {
        return false;
    }

    public function forceDelete(User $user, UpdatingUser $updatingUser)
    {
        return false;
    }

}
