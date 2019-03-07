<?php

namespace App\Http\Controllers;

use App\Mail\ConsentRequestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\ConsentRequest;
use App\Patient;
use Illuminate\Support\Facades\Storage;
use App\Traits\SearchFilters;

class ConsentRequestController extends Controller
{

    use SearchFilters;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $consentRequests = \App\ConsentRequest::orderBy('created_at', 'DESC')->get();

        return view('app.consent-request.index',[
            'consentRequests' => $consentRequests
        ]);

    }

    /**
     * Search consent requests
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $this->setFilters($request, class_basename($request->route()->getAction()['controller']));

        if(!$request->input('search')){
            $consentRequests = \App\ConsentRequest::select('consent_requests.*')
                ->leftJoin('consents', 'consent_requests.consent_id', '=', 'consents.id')
                ->when($this->filter_consent && $this->filter_consent != 'all', function ($query) {
                    return $query->where('consent_id',$this->filter_consent);
                })
                ->when($this->filter_consent_type && $this->filter_consent_type != 'all', function ($query) {
                    return $query->where('consents.consent_type_id',$this->filter_consent_type);
                })
                ->orderBy('created_at', 'DESC')
                ->get();
        }else{

            $consentRequests = \App\ConsentRequest::search($request->input('search'))
                ->when($this->filter_consent && $this->filter_consent != 'all', function ($query) {
                    return $query->where('consent_id',$this->filter_consent);
                })
                ->when($this->filter_consent_type && $this->filter_consent_type != 'all', function ($query)  {

                    $constraint = \App\ConsentRequest::whereHas('consent', function ($query) {
                        return $query->where('consent_type_id', $this->filter_consent_type);
                    });

                    return $query->constrain($constraint);
                })
                ->get();

        }

        return view('app.consent-request.index',[
            'consentRequests' => $consentRequests,
            'filter_consent' => $this->filter_consent,
            'filter_consent_type' => $this->filter_consent_type,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $patient)
    {
        return view('app.consent-request.create', [
            'createForPatient' => $patient
        ]);
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
            'patient' => 'required',
            'consent' => 'required'
        ]);

        $patient = \App\Patient::find($request->patient);
        $consent = \App\Consent::find($request->consent);

        $consentRequest = \App\ConsentRequest::create([
            'user_id' => auth()->user()->id,
            'patient_id' => $patient->id,
            'consent_id' => $consent->id,
        ]);

        // Check uploaded file
        if ($request->consent_file) {

            foreach ($request->consent_file as $consent_file) {

                $fileName =  str_replace(' ', '-', $consent_file->getClientOriginalName()) ?? 'file.' . $consent_file->extension();
                $filepath = $consent_file->path();
                $uploadedFile = Storage::putFile('consent-requests/'.$consentRequest->id, $consent_file);

                $file = \App\File::create([
                    'name' => $fileName,
                    'file' => $uploadedFile
                ]);

                $consentRequest->files()->save($file);

            }

        }

        $signedLink = URL::signedRoute('public.consent-request.show', [
            'consentRequest' => $consentRequest->id
        ]);

        Mail::to($patient->email->address, $patient->fullName())->send(new \App\Mail\ConsentRequestMail($consentRequest, $signedLink));

        notify()->success('Patient consent request created');

        return redirect('app/consent-requests');

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

        return view('app.consent-request.show', compact(
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
    public function edit(ConsentRequest $consentRequest)
    {
        return view('app.consent-request.edit', compact(
            'consentRequest'
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

        $validatedData = $request->validate([
            'patient' => 'required',
            'consent' => 'required'
        ]);

        $patient = \App\Patient::find($request->patient);
        $consent = \App\Consent::find($request->consent);

        $consentRequest->update([
            'patient_id' => $patient->id,
            'consent_id' => $consent->id,
        ]);

        // Check uploaded file
        if ($request->consent_file) {

            foreach ($request->consent_file as $consent_file) {

                $fileName =  str_replace(' ', '-', $consent_file->getClientOriginalName()) ?? 'file.' . $consent_file->extension();
                $filepath = $consent_file->path();
                $uploadedFile = Storage::putFile('consent-requests/'.$consentRequest->id, $consent_file);

                $file = \App\File::create([
                    'name' => $fileName,
                    'file' => $uploadedFile
                ]);

                $consentRequest->files()->save($file);

            }

        }

        $signedLink = URL::signedRoute('public.consent-request.show', [
            'consentRequest' => $consentRequest->id
        ]);

        Mail::to($patient->email->address, $patient->fullName())->send(new \App\Mail\ConsentRequestUpdatedMail($consentRequest, $signedLink));

        notify()->success('Patient consent request updated');

        return redirect('app/consent-requests');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsentRequest $consentRequest)
    {
        $consentRequest->delete();
        notify()->success('Consent request deleted');
        return back();
    }
}
