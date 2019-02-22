<?php

namespace App;

use App\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{

    use BelongsToTenants;
    use SoftDeletes;

    public function setBirthdayAttribute($value)
    {
        if ($value) {
            $this->attributes['birthday'] = encrypt($value);
        } else {
            $this->attributes['birthday'] = null;
        }
    }

    public function getBirthdayAttribute($value)
    {

        return \App\Http\Helpers\decryptField($value);

    }

    public function setTitleAttribute($value)
    {
        if ($value) {
            $this->attributes['title'] = encrypt($value);
        } else {
            $this->attributes['title'] = null;
        }
    }

    public function getTitleAttribute($value)
    {

        return \App\Http\Helpers\decryptField($value);

    }

    public function setFirstNameAttribute($value)
    {
        if ($value) {
            $this->attributes['first_name'] = encrypt($value);
        } else {
            $this->attributes['first_name'] = null;
        }
    }

    public function getFirstNameAttribute($value)
    {

        return \App\Http\Helpers\decryptField($value);

    }

    public function setMiddleNameAttribute($value)
    {
        if ($value) {
            $this->attributes['middle_name'] = encrypt($value);
        } else {
            $this->attributes['middle_name'] = null;
        }
    }

    public function getMiddleNameAttribute($value)
    {

        return \App\Http\Helpers\decryptField($value);

    }

    public function setLastNameAttribute($value)
    {
        if ($value) {
            $this->attributes['last_name'] = encrypt($value);
        } else {
            $this->attributes['last_name'] = null;
        }
    }

    public function getLastNameAttribute($value)
    {

        return \App\Http\Helpers\decryptField($value);

    }

    public function fullName($middle = false){

        return trim($this->first_name.' '.(($middle) ? $this->middle_name.' ' : null).$this->last_name);

    }

    public function email()
    {
        return $this->morphOne(Email::class, 'emailable');
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function phoneNumber()
    {
        return $this->morphOne(PhoneNumber::class, 'phone_numberable');
    }

    /**
     * Get the consent requests for the patient.
     */
    public function consentRequests()
    {
        return $this->hasMany('App\ConsentRequest');
    }

}
