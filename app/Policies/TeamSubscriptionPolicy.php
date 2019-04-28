<?php

namespace App\Policies;

use App\User;
use Laravel\Spark\TeamSubscription;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamSubscriptionPolicy
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

    public function view(User $user, TeamSubscription $teamSubscription)
    {
        return true;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, TeamSubscription $teamSubscription)
    {
        return false;
    }

    public function delete(User $user, TeamSubscription $teamSubscription)
    {
        return false;
    }

    public function restore(User $user, TeamSubscription $teamSubscription)
    {
        return false;
    }

    public function forceDelete(User $user, TeamSubscription $teamSubscription)
    {
        return false;
    }
    
}
