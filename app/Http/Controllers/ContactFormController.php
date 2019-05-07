<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Mailgun\Mailgun;
use Validator;
use Exception;

class ContactFormController extends Controller
{


    public function send(Request $request)
    {

        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            // 'phone' => 'required',
            // 'subject' => 'required',
            'email' => 'required|email',
            'body' => 'required'
        ]);

        if ($validator->fails())
            return ['action' => 'error', 'message' => $validator->errors()->all()];

        $mailgun = Mailgun::create(env('MAILGUN_API_KEY'));
        $mgClient = new Mailgun(env('MAILGUN_API_KEY'));

        $template = '
            <table>
                <tr>
                    <td>Name</td>
                    <td>'.$request->name.'</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>'.$request->phone.'</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>'.$request->email.'</td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td>'.$request->body.'</td>
                </tr>
            </table>
        ';

        try {
            $mgClient->sendMessage(env('MAILGUN_DOMAIN'), [
                'from' => 'Consentic <accounts@consentic.com>',
                'h:Reply-To' => 'accounts@mg.consentic.com',
                'to' => env('MAILGUN_CONTACT_EMAIL'),
                'subject' => $request->subject,
                'html' => $template
            ]);

        } catch (Exception $e) {
            return ['message' => $e->getMessage(), 'action' => 'error'];
        }

        return ['message' => 'Your message has been sent successfully!', 'action' => 'success'];

    }

}
