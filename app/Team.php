<?php

namespace App;

use Laravel\Spark\Team as SparkTeam;

class Team extends SparkTeam
{

    /**
     * Get the consent requests for the team.
     */
    public function consentRequests()
    {
        return $this->hasMany('App\ConsentRequest');
    }

    /**
     * Get the biling cycles for the team.
     */
    public function teamBillingCycles()
    {
        return $this->hasMany('App\TeamBillingCycle');
    }

}
