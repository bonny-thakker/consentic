<?php

namespace App;

use App\Model;

class PatientQuestion extends Model
{

    public function consentRequestQuestions()
    {
        return $this->morphMany(ConsentRequestQuestion::class, 'consentRequestQuestionable');
    }

    public function answers()
    {
        return $this->morphMany(Answer::class, 'answerable');
    }

    /**
     * Get the consent that owns the patient question.
     */
    public function consent()
    {
        return $this->belongsTo('App\Consent');
    }

}