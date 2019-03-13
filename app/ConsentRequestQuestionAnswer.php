<?php

namespace App;

use App\Model;

class ConsentRequestQuestionAnswer extends Model
{

    /**
     * Get the consent request question that owns the consent request answer.
     */
    public function consentRequestQuestion()
    {
        return $this->belongsTo('App\ConsentRequestQuestion');
    }

    /**
     * Get the answer that owns the consent request answer.
     */
    public function answer()
    {
        return $this->belongsTo('App\Answer');
    }

}
