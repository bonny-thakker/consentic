<?php

namespace App\Http\Controllers;

use App\ConsentRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use Mail;
use Image;
use Storage;
use Mpdf\Mpdf;

class PublicConsentRequestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(ConsentRequest $consentRequest)
    {

        parse_str( parse_url( $consentRequest->consent->video_url, PHP_URL_QUERY ), $videoParams );
        $videoId = $videoParams['v'] ?? '';

        $patient = $consentRequest->patient;

        return view('app.p.consent-request.show',compact(
            'consentRequest',
            'videoId',
            'patient'
        ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        if(isset($request->video_watched)){

            $consentRequest->update([
                'video_watched' => $request->video_watched
            ]);

            event(new \App\Events\ConsentPatientWatched($consentRequest));

        }

        if(isset($request->form) && $request->form == 'publicConsentRequestQuestions'){

            $validator = Validator::make($request->all(),[]);

            $requestData = $request->all();

            $validator->after(function ($validator) use ($requestData) {

                if(isset($requestData['question'])){
                    foreach($requestData['question'] as $questionId => $questionAnswer){

                        if(!is_numeric($questionAnswer)) {
                            $validator->errors()->add('question['.$questionId.']', 'Answer is required');
                        }elseif(\App\Answer::find($questionAnswer)->correct == 0){
                            $validator->errors()->add('question['.$questionId.']', 'Your answer to this question is incorrect');
                        }

                    }
                }

            });

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('consentRequestStage', 'questions');
            }

            // Process form
            if(isset($requestData['question'])) {
                foreach ($requestData['question'] as $questionId => $questionAnswer) {

                    $consentRequestQuestion = \App\ConsentRequestQuestion::find($questionId);

                    $consentRequestQuestion->consentRequestQuestionAnswer->update([
                        'answer_id' => $questionAnswer
                    ]);

                }
            }

            // Submit comment
            if($request->message){
                $comment = $consentRequest->patient->comment($consentRequest,$request->message);
                event(new \App\Events\ConsentPatientCommented($comment));
            }

            event(new \App\Events\ConsentPatientAnsweredQuestionsCorrectly($consentRequest));

            return back()->with('consentRequestStage', 'sign');

        }

        if(isset($request->form) && $request->form == 'publicConsentPatientSignature'){

            // Upload file
            $signatureUrl = 'public/consent-requests/'.$consentRequest->id.'/'.uniqid().'.svg';
            Storage::put($signatureUrl, $request->consentPatientSignature);

            // Process form
            $consentRequest->update([
                'patient_signed_ts' => Carbon::now()->toDateTimeString(),
                'patient_signature' => str_replace('public','/storage',$signatureUrl)
            ]);

            // Generate PDF
            parse_str( parse_url( $consentRequest->consent->video_url, PHP_URL_QUERY ), $videoParams );
            $videoId = $videoParams['v'] ?? '';

            $html = view('pdf.consent-summary', compact('consentRequest', 'videoId'))->render();

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
            $pdfPath = storage_path('app/pdf/'.$pdfFileName);

            $mpdf->WriteHTML($html);
            $mpdf->Output($pdfPath);

            $consentRequest->update([
                'pdf' => 'app/pdf/'.$pdfFileName,
            ]);

            // Send notification
            Mail::to($consentRequest->patient->email->address, $consentRequest->patient->fullName())
                ->send(new \App\Mail\ConsentRequestCompletedMail($consentRequest, 'patient', $pdfPath));

            Mail::to($consentRequest->user->email, $consentRequest->user->name)
                ->send(new \App\Mail\ConsentRequestCompletedMail($consentRequest, 'doctor', $pdfPath));

            event(new \App\Events\ConsentPatientSigned($consentRequest));


            return view('app.p.consent-request.complete',compact(
                'consentRequest',
                'patient'
            ));

        }

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
