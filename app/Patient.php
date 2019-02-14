<?php

namespace App;

use App\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{

    use BelongsToTenants;
    use SoftDeletes;

}
