<?php

namespace App;

use App\Model;

class Consent extends Model
{

    /**
     * Get the consent requests for the consent.
     */
    public function consentRequests()
    {
        return $this->hasMany('App\ConsentRequest');
    }

    /**
     * Get the consent type that owns the consent.
     */
    public function consentType()
    {
        return $this->belongsTo('App\ConsentType');
    }

    /**
     * Get the questions for the consent.
     */
    public function questions()
    {
        return $this->hasMany('App\Question');
    }

}
