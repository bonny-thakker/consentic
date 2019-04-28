<?php

namespace App\Policies;

use App\Team;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
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

    public function view(User $user, Team $team)
    {
        return true;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Team $team)
    {
        return false;
    }

    public function delete(User $user, Team $team)
    {
        return false;
    }

    public function restore(User $user, Team $team)
    {
        return false;
    }

    public function forceDelete(User $user, Team $team)
    {
        return false;
    }

}
