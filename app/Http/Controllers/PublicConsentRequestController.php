<?php

namespace App\Http\Controllers;

use App\ConsentRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use Mail;
use Image;
use Storage;

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
                $consentRequest->patient->comment($consentRequest,$request->message);
            }

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

            // Send notification TBC
            Mail::to($consentRequest->patient->email->address, $consentRequest->patient->fullName())
                ->send(new \App\Mail\ConsentRequestCompletedMail($consentRequest, 'patient'));

            Mail::to($consentRequest->user->email, $consentRequest->user->name)
                ->send(new \App\Mail\ConsentRequestCompletedMail($consentRequest, 'doctor'));


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
