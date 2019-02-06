<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Newsletter;

class MailchimpController extends Controller
{

    public function store(Request $request)
    {

        $validator = Validator::make(request()->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails())
            return ['message' => $validator->errors()->all()];

     /*   if (Newsletter::isSubscribed(request('email')))
            return ['message' => 'You already subscribed.', 'action' => 'info'];

        if (! Newsletter::subscribe(request('email')))
            return ['message' => Newsletter::getLastError(), 'action' => 'error'];*/

        return [
            'message' => 'You have successfully subscribed to the newsletter!',
            'action' => 'success'
        ];

    }

}