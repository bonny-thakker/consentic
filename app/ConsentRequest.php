<?php

namespace App;

use App\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelista\Comments\Commentable;
use Laravel\Scout\Searchable;

class ConsentRequest extends Model
{

    use BelongsToTenants;
    use SoftDeletes;
    use Commentable;
    use Searchable;

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
            'first_name' => $this->patient->first_name,
            'last_name' => $this->patient->last_name,
        ];

        return $array;

    }

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

    public function isSigned(){

        if(($this->user_signed_ts || $this->patient_signed_ts) && $this->revoked != 1){
            return true;
        }

    }

    public function isUserSigned(){

        if($this->user_signed_ts && $this->revoked != 1){
            return true;
        }

    }

    public function isPatientSigned(){

        if($this->patient_signed_ts && $this->revoked != 1){
            return true;
        }

    }

    public function hasPatientAnsweredCorrectly(){

        foreach($this->consentRequestQuestions()->where([
            'consent_request_questionable_type' => 'App\PatientQuestion'
        ])->get() as $consentRequestQuestion){

            if(!isset($consentRequestQuestion->consentRequestQuestionAnswer->answer) || $consentRequestQuestion->consentRequestQuestionAnswer->answer->correct == 0){
                return false;
            }

        }

        foreach($this->consentRequestQuestions()->where([
            'consent_request_questionable_type' => 'App\Question'
        ])->get() as $consentRequestQuestion){

            if(!isset($consentRequestQuestion->consentRequestQuestionAnswer->answer) || $consentRequestQuestion->consentRequestQuestionAnswer->answer->correct == 0){
                return false;
            }

        }

        return true;

    }

    public function hasUserAnsweredCorrectly(){

        foreach($this->consentRequestQuestions()->where([
            'consent_request_questionable_type' => 'App\UserQuestion'
        ])->get() as $consentRequestQuestion){

            if(!isset($consentRequestQuestion->consentRequestQuestionAnswer->answer) || $consentRequestQuestion->consentRequestQuestionAnswer->answer->correct == 0){
                return false;
            }

        }

        return true;

    }

}
