<?php

namespace App;

use App\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{

    use SoftDeletes;

    public function consentRequestQuestions()
    {
        return $this->morphMany(ConsentRequestQuestion::class, 'consentRequestQuestionable');
    }

    public function answers()
    {
        return $this->morphMany(Answer::class, 'answerable');
    }

    /**
     * Get the consent that owns the question.
     */
    public function consent()
    {
        return $this->belongsTo('App\Consent');
    }

}
