<?php

namespace App;

use App\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{

    use SoftDeletes;

    public function answerable()
    {
        return $this->morphTo();
    }

    /**
     * Get the consent request answers for the consent type.
     */
    public function consentRequestQuestionAnswers()
    {
        return $this->hasMany('App\ConsentRequestQuestionAnswers');
    }

}
