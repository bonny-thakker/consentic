<?php

namespace App;

use Carbon\Carbon;
use Laravel\Spark\User as SparkUser;
use Laravel\Spark\CanJoinTeams;
use Spatie\Permission\Traits\HasRoles;
use Actuallymab\LaravelComment\CanComment;


class User extends SparkUser
{

    use CanJoinTeams;
    use HasRoles;
    use CanComment;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'title',
        'first_name',
        'last_name',
        'phone_number'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'authy_id',
        'country_code',
        'phone',
        'two_factor_reset_code',
        'card_brand',
        'card_last_four',
        'card_country',
        'billing_address',
        'billing_address_line_2',
        'billing_city',
        'billing_zip',
        'billing_country',
        'extra_billing_information',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'trial_ends_at' => 'datetime',
        'uses_two_factor_auth' => 'boolean',
    ];

    /**
     * Get the consent request for the user.
     */
    public function consentRequests()
    {
        return $this->hasMany('App\ConsentRequest');
    }

    public function consentsSinceLastLogin(){

        if($this->last_login_ts){
            return $this->consentRequests()
                ->whereNotNull('patient_signed_ts')
                ->where('patient_signed_ts', '>', Carbon::parse($this->last_login_ts)->toDayDateTimeString())
                ->get()
                ->count();
        }

        return 0;

    }

    public function fullName($middle = false, $title = true){

        return trim((($title) ? $this->title.' ' : null).' '.$this->name);

    }

    /**
     * Get the consent speciality that owns the user.
     */
    public function consentSpeciality()
    {
        return $this->belongsTo('App\ConsentSpeciality');
    }

}
