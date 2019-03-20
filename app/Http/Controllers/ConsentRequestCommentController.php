<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\ConsentRequest;

class ConsentRequestCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ConsentRequest $consentRequest)
    {

        $patient = $consentRequest->patient;

        foreach($consentRequest->comments as $comment){

            if($comment->commented_type == 'App\Patient' && $comment->commentable->user_id == auth()->user()->id){

                $comment->update([
                    'user_seen_ts' => Carbon::now()->toDateTimeString()
                 ]);

            }

        }

        return view('app.consent-request.comment.index' , compact(
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
    public function store(Request $request, ConsentRequest $consentRequest)
    {

        $validatedData = $request->validate([
            'message' => 'required',
        ]);

        auth()->user()->comment($consentRequest,$request->message);
        notify()->success('Comment addded to consent request');
        return back();

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
    public function update(Request $request, $id)
    {
        //
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
