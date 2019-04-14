<div class="select is-fullwidth{{ $errors->has('user') ? ' is-danger' : '' }}">
    <select name="user" id="user-list">
        <option disabled selected>Select Doctor</option>
        @foreach (Auth::user()->currentTeam->users()->orderBy('name', 'ASC')->get() as $user)
            <option value="{{ $user->id }}" {{ (old('user') == $user->id || (isset($consentRequest) && $consentRequest->user->id == $user->id) || (isset($createForUser) && $createForUser->id == $user->id)) ? 'selected' : null }}>{{ $user->fullName() }}</option>
        @endforeach
    </select>
</div>
@if ($errors->has('user'))
    <p class="help is-danger">{{ $errors->first('user') }}</p>
@endif
<div class="select is-fullwidth m-t-md{{ $errors->has('patient') ? ' is-danger' : '' }}">
    <select name="patient" id="patient-list">
        <option disabled selected>Select Patient</option>
        @foreach (\App\Patient::orderBy('first_name', 'ASC')->get() as $patient)
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
        @foreach (\App\Consent::orderBy('name', 'ASC')->get() as $consent)
            <option
                    value="{{ $consent->id }}"
                    data-video="{{ $consent->video_url }}"  {{ (old('consent') == $consent->id || (isset($consentRequest) && $consentRequest->consent->id == $consent->id) || (isset($createForConsent) && $createForConsent->id == $consent->id)) ? 'selected' : null }}
            >{{ $consent->name }}</option>
        @endforeach
    </select>
</div>
@if ($errors->has('consent'))
    <p class="help is-danger">{{ $errors->first('consent') }}</p>
@endif