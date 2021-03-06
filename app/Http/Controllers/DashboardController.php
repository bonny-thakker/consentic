<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $consentRequests = \App\ConsentRequest::latest()->limit(5)->get();
        $patientsCount = \App\Patient::all()->count();
        $consentRequestsCount = \App\ConsentRequest::all()->count();
        $consents = \App\Consent::all()->count();
        $consentRequestPendingCount = \App\ConsentRequest::where([
            'patient_signed_ts' => null
        ])->orWhere([
            'revoked' => 1
        ])
            ->get()
            ->count();

        $consentRequestUnseenCommentsCount = \App\ConsentRequest::whereHas('comments', function($q){
            $q->whereNull('user_seen_ts')
            ->where('commented_type','App\Patient');
        })->get()->count();

        return view('app.dashboard.index', compact(
            'consentRequests',
            'patientsCount',
            'consentRequestsCount',
            'consents',
            'consentRequestPendingCount',
            'consentRequestUnseenCommentsCount'
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
