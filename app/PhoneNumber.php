<?php

namespace App;

use App\Model;

class PhoneNumber extends Model
{

    public function phone_numberable()
    {
        return $this->morphTo();
    }

    public function setNumberAttribute($value)
    {
        if ($value) {
            $this->attributes['number'] = encrypt($value);
        } else {
            $this->attributes['number'] = null;
        }
    }

    public function getNumberAttribute($value)
    {

        return \App\Http\Helpers\decryptField($value);

    }

}
