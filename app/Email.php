<?php

namespace App;

use App\Model;

class Email extends Model
{

    public function emailable()
    {
        return $this->morphTo();
    }

}
