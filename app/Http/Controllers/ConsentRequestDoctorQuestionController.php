<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConsentRequest;
use Validator;

class ConsentRequestDoctorQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ConsentRequest $consentRequest)
    {

        $patient = $consentRequest->patient;

        return view('app.consent-request.doctor-question.index' , compact(
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

        return view('app.consent-request.doctor-question.edit', compact(
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
                ->withInput();
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

        notify()->success('You have answered the consent request questions correctly');

        return redirect('app/consent-requests/'.$consentRequest->id.'/signed/edit');

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
