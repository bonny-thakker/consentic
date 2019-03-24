<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use PhpParser\ParserAbstract;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $patients = \App\Patient::all();

        return view('app.patient.index',[
            'patients' => $patients
        ]);

    }

    /**
     * Search patients
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        if(!$request->input('search')){
            return redirect('app/patients');
        }

        $patients = \App\Patient::search($request->input('search'))
            ->get();

        return view('app.patient.index',[
            'patients' => $patients
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required|date_format:d/m/Y',
            'address' => 'required',
            'suburb' => 'required',
            'state' => 'required',
            'postcode' => 'required',
        ]);

        $patient = \App\Patient::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => $request->birthday
        ]);

        if( $request->email){

            $email = \App\Email::create([
                'address' => $request->email
            ]);

            $patient->email()->save($email);

        }

        if( $request->mobile){

            $phoneNumber = \App\PhoneNumber::create([
                'number' => $request->mobile
            ]);

            $patient->phoneNumber()->save($phoneNumber);

        }

        $address = \App\Address::create([
            'line_1' => $request->address,
            'suburb' => $request->suburb,
            'state' => $request->state,
            'postcode' => $request->postcode,
        ]);

        $patient->address()->save($address);

        notify()->success('Patient created');

        return redirect('app/patients');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {

        return view('app.patient.show',compact('patient'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {

        return view('app.patient.edit',compact('patient'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'suburb' => 'required',
            'state' => 'required',
            'postcode' => 'required',
        ]);

        $patient->update([
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => $request->birthday
        ]);

        if( $request->email){

            $patient->email->update([
                'address' => $request->email
            ]);

        }else{
            $patient->email->delete();
        }

        if( $request->mobile){

            $patient->phoneNumber->update([
                'number' => $request->mobile
            ]);

        }else{
            $patient->phoneNumber->delete();
        }

        $patient->address->update([
            'line_1' => $request->address,
            'suburb' => $request->suburb,
            'state' => $request->state,
            'postcode' => $request->postcode,
        ]);

        notify()->success('Patient Updated');

        return redirect('app/patients');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {

        $patient->delete();
        notify()->success('Patient deleted');
        return back();

    }

    public function createOrUpdate(){

    }
}
