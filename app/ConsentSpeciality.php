<?php

namespace App;

use App\Model;

class ConsentSpeciality extends Model
{

    public $timestamps = false;

    /**
     * Get the consents for the consent speciality.
     */
    public function consents()
    {
        return $this->hasMany('App\Consent');
    }

}
