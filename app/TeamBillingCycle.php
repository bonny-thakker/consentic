<?php

namespace App;

use App\Model;

class TeamBillingCycle extends Model
{

    /**
     * Get the team that owns the billing cycle.
     */
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

}
