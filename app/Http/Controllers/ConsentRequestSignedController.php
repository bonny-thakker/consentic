<?php

namespace App\Http\Controllers;

use App\Consent;
use Illuminate\Http\Request;
use App\ConsentRequest;
use Illuminate\Support\Facades\URL;
use Storage;
use Carbon\Carbon;
use Mail;
use Image;
use Mpdf\Mpdf;
use Validator;

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

        if($consentRequest->isUserSigned()){

            return view('app.consent-request.signed.edit-complete', compact(
                'consentRequest',
                'patient'
            ));

        }

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

        // Generate PDF
        parse_str( parse_url( $consentRequest->consent->video_url, PHP_URL_QUERY ), $videoParams );
        $videoId = $videoParams['v'] ?? '';

        // Signed url for video link
        $signedVideoLink = URL::temporarySignedRoute('public.consent.show',now()->addDays(28), [
            'consent' => $consentRequest->consent->id
        ]);

        $html = view('pdf.consent-summary', compact('consentRequest', 'signedVideoLink'))->render();

        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path('assets/fonts'),
            ]),
            'fontdata' => $fontData + [
                    'helvetica' => [
                        'R' => 'HelveticaNeue.ttf'
                    ],
                    'fontawesome' => [
                        'R' => 'fa-solid-900.ttf'
                    ]
                ],
            'default_font' => 'helvetica',
            'tempDir' => storage_path('app/mpdf')
        ]);

        $pdfFileName = trim($consentRequest->patient->fullName()) . '_' . trim($consentRequest->consent->name) . '_' . date('dmY');
        $pdfFileName = str_replace(' ', '_', strtolower($pdfFileName)) . '.pdf';

        if(!file_exists(storage_path('app/pdf'))){
            mkdir(storage_path('app/pdf'));
        }

        $pdfPath = storage_path('app/pdf/'.$pdfFileName);

        $mpdf->WriteHTML($html);
        $mpdf->Output($pdfPath);

        $consentRequest->update([
            'pdf' => 'app/pdf/'.$pdfFileName,
        ]);

        // Send notification
        if($consentRequest->patient->email && $consentRequest->patient->email->address){
            Mail::to($consentRequest->patient->email->address, $consentRequest->patient->fullName())
                ->send(new \App\Mail\ConsentRequestCompletedMail($consentRequest, 'patient', $pdfPath));
        }

        Mail::to($consentRequest->user->email, $consentRequest->user->name)
             ->send(new \App\Mail\ConsentRequestCompletedMail($consentRequest, 'doctor', $pdfPath));

        event(new \App\Events\ConsentUserSigned($consentRequest));

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
