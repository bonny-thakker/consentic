<?php

namespace App;

use App\Model;

class Address extends Model
{

    public function addressable()
    {
        return $this->morphTo();
    }

    public function setLine1Attribute($value)
    {
        if ($value) {
            $this->attributes['line_1'] = encrypt($value);
        } else {
            $this->attributes['line_1'] = null;
        }
    }

    public function getLine1Attribute($value)
    {

        return \App\Http\Helpers\decryptField($value);

    }

    public function setLine2Attribute($value)
    {
        if ($value) {
            $this->attributes['line_2'] = encrypt($value);
        } else {
            $this->attributes['line_2'] = null;
        }
    }

    public function getLine2Attribute($value)
    {

        return \App\Http\Helpers\decryptField($value);

    }

    public function setLine3Attribute($value)
    {
        if ($value) {
            $this->attributes['line_3'] = encrypt($value);
        } else {
            $this->attributes['line_3'] = null;
        }
    }

    public function getLine3Attribute($value)
    {

        return \App\Http\Helpers\decryptField($value);

    }

    public function setSuburbAttribute($value)
    {
        if ($value) {
            $this->attributes['suburb'] = encrypt($value);
        } else {
            $this->attributes['suburb'] = null;
        }
    }

    public function getSuburbAttribute($value)
    {

        return \App\Http\Helpers\decryptField($value);

    }

    public function setStateAttribute($value)
    {
        if ($value) {
            $this->attributes['state'] = encrypt($value);
        } else {
            $this->attributes['state'] = null;
        }
    }

    public function getStateAttribute($value)
    {

        return \App\Http\Helpers\decryptField($value);

    }

    public function setPostcodeAttribute($value)
    {
        if ($value) {
            $this->attributes['postcode'] = encrypt($value);
        } else {
            $this->attributes['postcode'] = null;
        }
    }

    public function getPostcodeAttribute($value)
    {

        return \App\Http\Helpers\decryptField($value);

    }

}
