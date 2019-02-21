<?php

namespace App;

use App\Model;

class Email extends Model
{

    public function emailable()
    {
        return $this->morphTo();
    }

    public function setAddressAttribute($value)
    {
        if ($value) {
            $this->attributes['address'] = encrypt($value);
        } else {
            $this->attributes['address'] = null;
        }
    }

    public function getAddressAttribute($value)
    {

        return \App\Http\Helpers\decryptField($value);

    }

}
