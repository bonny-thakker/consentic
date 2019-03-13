<?php

namespace App;

use App\Model;

class ConsentRequestQuestion extends Model
{

    /**
     * Get the consent request that owns the consent request question.
     */
    public function consentRequest()
    {
        return $this->belongsTo('App\ConsentRequest');
    }

    public function consentRequestQuestionable()
    {
        return $this->morphTo();
    }

    /**
     * Get the consent request question answer for the consent request question.
     */
    public function consentRequestQuestionAnswer()
    {
        return $this->hasOne('App\ConsentRequestQuestionAnswer');
    }

}