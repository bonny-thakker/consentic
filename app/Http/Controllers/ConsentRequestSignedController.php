<?php

namespace App\Http\Controllers;

use App\Consent;
use Illuminate\Http\Request;
use App\ConsentRequest;
use Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

class ConsentRequestSignedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ConsentRequest $consentRequest)
    {
        $patient = $consentRequest->patient;

        return view('app.consent-request.signed.index' , compact(
            'consentRequest',
            'patient'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsentRequest $consentRequest)
    {
        $patient = $consentRequest->patient;

        return view('app.consent-request.signed.edit' , compact(
            'consentRequest',
            'patient'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConsentRequest $consentRequest)
    {

        $patient = $consentRequest->patient;

        // Upload file
        $signatureUrl = 'public/consent-requests/'.$consentRequest->id.'/doctor-'.uniqid().'.svg';
        Storage::put($signatureUrl, $request->consentDoctorSignature);

        // Process form
        $consentRequest->update([
            'user_signed_ts' => Carbon::now()->toDateTimeString(),
            'user_signature' => str_replace('public','/storage',$signatureUrl)
        ]);


        event(new \App\Events\ConsentUserSigned($consentRequest));
        $signedLink = URL::signedRoute('public.consent-request.show', [
            'consentRequest' => $consentRequest->id
        ]);

        if($consentRequest->in_office == 1){

            return redirect($signedLink);

        }else{

            Mail::to($patient->email->address, $patient->fullName())->send(new \App\Mail\ConsentRequestMail($consentRequest, $signedLink));

        }

        notify()->success('You have signed the consent request');

        return redirect('/app/consent-requests/'.$consentRequest->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
