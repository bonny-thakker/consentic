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

}