<?php

namespace App;

use Laravel\Spark\Team as SparkTeam;

class Team extends SparkTeam
{

    /**
     * Get the consent request for the team.
     */
    public function consentRequests()
    {
        return $this->hasMany('App\ConsentRequest');
    }

}
