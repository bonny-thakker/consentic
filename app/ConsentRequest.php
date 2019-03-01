<?php

namespace App;

use App\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelista\Comments\Commentable;

class ConsentRequest extends Model
{

    use BelongsToTenants;
    use SoftDeletes;
    use Commentable;

    /**
     * Get the consent that owns the consent request.
     */
    public function consent()
    {
        return $this->belongsTo('App\Consent');
    }

    /**
     * Get the user that owns the consent request.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the patient that owns the consent request.
     */
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function isSigned(){

        if(($this->user_signed_ts || $this->patient_signed_ts) && $this->revoked != 1){
            return true;
        }

    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    /**
     * Get the consent request for the consent.
     */
    public function consentRequestQuestions()
    {
        return $this->hasMany('App\ConsentRequestQuestion');
    }

}
