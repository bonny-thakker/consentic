<?php

namespace App;

use App\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelista\Comments\Commenter;
use Carbon\Carbon;
use Laravel\Scout\Searchable;

class Patient extends Model
{

    use BelongsToTenants;
    use SoftDeletes;
    use Commenter;
    use Searchable;

    public function setBirthdayAttribute($value)
    {
        if ($value) {
            $value = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
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

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {

        // $array = $this->toArray();

        $array = [
            $this->getKeyName() => $this->getKey(),
            'team_id' => $this->team_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name
        ];

        return $array;

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
