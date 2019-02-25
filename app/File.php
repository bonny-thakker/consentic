<?php

namespace App;

use App\Model;

class File extends Model
{

    public function fileable()
    {
        return $this->morphTo();
    }

}
