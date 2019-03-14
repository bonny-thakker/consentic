<div class="select is-fullwidth{{ $errors->has('patient') ? ' is-danger' : '' }}">
    <select name="patient" id="patient-list">
        <option disabled selected>Select Patient</option>
        @foreach (\App\Patient::all() as $patient)
            <option value="{{ $patient->id }}" {{ (old('patient') == $patient->id || (isset($consentRequest) && $consentRequest->patient->id == $patient->id) || (isset($createForPatient) && $createForPatient->id == $patient->id)) ? 'selected' : null }}>{{ $patient->fullName() }}
                - {{ \Carbon\Carbon::parse($patient->birthday)->format('d/m/Y') }}</option>
        @endforeach
    </select>
</div>
@if ($errors->has('patient'))
    <p class="help is-danger">{{ $errors->first('patient') }}</p>
@endif
<div class="select is-fullwidth m-t-md{{ $errors->has('consent') ? ' is-danger' : '' }}">
    <select name="consent" id="procedure-list">
        <option disabled selected>Select Procedure</option>
        @foreach (\App\Consent::all() as $consent)
            <option
                    value="{{ $consent->id }}"
                    data-video="{{ $consent->video_url }}"  {{ (old('consent') == $consent->id || (isset($consentRequest) && $consentRequest->consent->id == $consent->id)) ? 'selected' : null }}
            >{{ $consent->name }}</option>
        @endforeach
    </select>
</div>
@if ($errors->has('consent'))
    <p class="help is-danger">{{ $errors->first('consent') }}</p>
@endif