<?php

namespace App;

use App\Model;

class Consent extends Model
{

    /**
     * Get the consent request for the consent.
     */
    public function consentRequests()
    {
        return $this->hasMany('App\cCnsentRequest');
    }

    /**
     * Get the consent type that owns the consent.
     */
    public function consentType()
    {
        return $this->belongsTo('App\ConsentType');
    }

}
