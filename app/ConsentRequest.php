<?php

namespace App;

use App\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsentRequest extends Model
{

    use BelongsToTenants;
    use SoftDeletes;

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

}
