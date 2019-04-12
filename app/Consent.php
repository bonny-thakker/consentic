<?php

namespace App;

use App\Model;
use Image;

class Consent extends Model
{

    /**
     * Get the consent requests for the consent.
     */
    public function consentRequests()
    {
        return $this->hasMany('App\ConsentRequest');
    }

    /**
     * Get the consent type that owns the consent.
     */
    public function consentType()
    {
        return $this->belongsTo('App\ConsentType');
    }

    /**
     * Get the speciality type that owns the consent.
     */
    public function consentSpeciality()
    {
        return $this->belongsTo('App\ConsentSpeciality');
    }

    /**
     * Get the questions for the consent.
     */
    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    /**
     * Get the patient questions for the consent.
     */
    public function patientQuestions()
    {
        return $this->hasMany('App\PatientQuestion');
    }

    public function videoThumbnail()
    {

        parse_str( parse_url( $this->video_url, PHP_URL_QUERY ), $videoParams );
        $videoId = $videoParams['v'] ?? '';

        // create new Intervention Image
        $img = Image::make("https://img.youtube.com/vi/$videoId/0.jpg");

        // create a new Image instance for inserting
        $watermark = Image::make(public_path('/images/video-play-button.png'))
            ->resize(300, null, function($constraint) {
                $constraint->aspectRatio();
            });

        $img->insert($watermark, 'center');
        return $img->encode('data-url');

    }

}
