<?php

namespace App;

use App\Model;

class ConsentType extends Model
{

    public $timestamps = false;

    /**
     * Get the consents for the consent type.
     */
    public function consents()
    {
        return $this->hasMany('App\Consent');
    }


}
