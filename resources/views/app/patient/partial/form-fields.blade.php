<h5 class="title is-5">Personal Information</h5>
<div class="field columns is-variable is-3">
    <div class="control column p-b-none">
        <input type="text" id="email" name="email" class="input is-medium{{ $errors->has('email') ? ' is-danger' : '' }}" placeholder="Email Address (Optional - for at-home consent)" value="{{ old('email') ?? $patient->email->address ?? null }}" autocomplete="off">
        @if ($errors->has('email'))
            <p class="help is-danger">{{ $errors->first('email') }}</p>
        @endif
    </div>
</div>
<div class="field columns is-variable is-3">
    <div class="control column p-b-none is-2">
        <div class="select is-medium is-fullwidth{{ $errors->has('title') ? ' is-danger' : '' }}">
            <select name="title" name="title" autocomplete="off">
                <option {{ (!old('title'))? 'selected':'' }} disabled>Title</option>
                <option value="Doctor."{{ ((isset($patient) && $patient->title == 'Doctor.') || old('title')=='Doctor.')? ' selected':'' }}>Doctor.</option>
                <option value="Mr."{{ ((isset($patient) &&$patient->title == 'Mr.') || old('title')=='Mr.')? ' selected':'' }}>Mr.</option>
                <option value="Mrs."{{ ((isset($patient) && $patient->title == 'Mrs.') || old('title')=='Mrs.')? ' selected':'' }}>Mrs.</option>
                <option value="Ms."{{ ((isset($patient) && $patient->title == 'Ms.') || old('title')=='Ms.')? ' selected':'' }}>Ms.</option>
                <option value="Miss"{{ ((isset($patient) && $patient->title == 'Miss') || old('title')=='Miss')? ' selected':'' }}>Miss</option>
            </select>
            @if ($errors->has('title'))
                <p class="help is-danger">{{ $errors->first('title') }}</p>
            @endif
        </div>
    </div>
    <div class="control column p-b-none">
        <input type="text" name="first_name" class="input is-medium{{ $errors->has('first_name') ? ' is-danger' : '' }}" placeholder="First Name" value="{{ old('first_name') ?? $patient->first_name ?? null}}" autocomplete="off">
        @if ($errors->has('first_name'))
            <p class="help is-danger">{{ $errors->first('first_name') }}</p>
        @endif
    </div>
    <div class="control column p-b-none">
        <input type="text" name="last_name" class="input is-medium{{ $errors->has('last_name') ? ' is-danger' : '' }}" placeholder="Last Name" value="{{ old('last_name') ?? $patient->last_name ?? null }}" autocomplete="off">
        @if ($errors->has('last_name'))
            <p class="help is-danger">{{ $errors->first('last_name') }}</p>
        @endif
    </div>
</div>
<div class="field columns is-variable is-3">
    <div class="control column p-b-none">
        <input id="dob" type="text" name="birthday" class="input is-medium{{ $errors->has('birthday') ? ' is-danger' : '' }}" placeholder="DD/MM/YYYY" value="{{ old('birthday') ?? ((isset($patient->birthday)) ? \Carbon\Carbon::parse($patient->birthday)->format('d/m/Y') : '') ?? null }}" autocomplete="off">
        @if ($errors->has('birthday'))
            <p class="help is-danger">{{ $errors->first('birthday') }}</p>
        @endif
    </div>
</div>

<h5 class="title is-5 m-t-lg">Contact Details</h5>
<div class="field columns is-variable is-3">
    <div class="control column p-b-none">
        <input id="address" type="text" name="address" class="input is-medium{{ $errors->has('address') ? ' is-danger' : '' }}" placeholder="Street Address" value="{{  old('address') ?? $patient->address->line_1 ?? null }}" autocomplete="off">
        @if ($errors->has('address'))
            <p class="help is-danger">{{ $errors->first('address') }}</p>
        @endif
    </div>
</div>
<div class="field columns is-variable is-3">
    <div class="control column p-b-none">
        <input type="text" name="suburb" id="locality" class="input is-medium{{ $errors->has('suburb') ? ' is-danger' : '' }}" placeholder="Suburb" value="{{ old('suburb') ?? $patient->address->suburb ?? null }}" autocomplete="off">
        @if ($errors->has('suburb'))
            <p class="help is-danger">{{ $errors->first('suburb') }}</p>
        @endif
    </div>
    <div class="control column p-b-none">
        <div class="select is-medium is-fullwidth{{ $errors->has('state') ? ' is-danger' : '' }}">
            <select name="state" id="administrative_area_level_1" autocomplete="off">
                <option {{ (!old('state'))? 'selected':'' }} disabled>State</option>
                <option value="ACT"{{ ((isset($patient) && $patient->address->state == 'ACT') || old('state')=='ACT')? ' selected':'' }}>Australian Capital Territory</option>
                <option value="NSW"{{ ((isset($patient) && $patient->address->state == 'NSW') || old('state')=='NSW')? ' selected':'' }}>New South Wales</option>
                <option value="NT"{{ ((isset($patient) && $patient->address->state == 'NT') || old('state')=='NT')? ' selected':'' }}>Northern Territory</option>
                <option value="QLD"{{ ((isset($patient) && $patient->address->state == 'QLD') || old('state')=='QLD')? ' selected':'' }}>Queensland</option>
                <option value="SA"{{ ((isset($patient) && $patient->address->state == 'SA') || old('state')=='SA')? ' selected':'' }}>South Australia</option>
                <option value="TAS"{{ ((isset($patient) && $patient->address->state == 'TAS') || old('state')=='TAS')? ' selected':'' }}>Tasmania</option>
                <option value="VIC"{{ ((isset($patient) && $patient->address->state == 'VIC') || old('state')=='VIC')? ' selected':'' }}>Victoria</option>
                <option value="WA"{{ ((isset($patient) && $patient->address->state == 'WA') || old('state')=='WA')? ' selected':'' }}>Western Australia</option>
            </select>
            @if ($errors->has('state'))
                <p class="help is-danger">{{ $errors->first('state') }}</p>
            @endif
        </div>
    </div>
</div>
<div class="field columns is-variable is-3">
    <div class="control column p-b-none">
        <input type="text" name="postcode" id="postal_code" class="input is-medium{{ $errors->has('postcode') ? ' is-danger' : '' }}" placeholder="Postcode" value="{{  old('postcode') ?? $patient->address->postcode ?? null }}" autocomplete="off">
        @if ($errors->has('postcode'))
            <p class="help is-danger">{{ $errors->first('postcode') }}</p>
        @endif
    </div>
    <div class="control column p-b-none">
        <input type="text" name="mobile" class="input is-medium{{ $errors->has('mobile') ? ' is-danger' : '' }}" placeholder="Mobile Number (Optional)" value="{{ old('mobile') ?? $patient->phoneNumber->number ?? null }}" autocomplete="off">
        @if ($errors->has('mobile'))
            <p class="help is-danger">{{ $errors->first('mobile') }}</p>
        @endif
    </div>

</div>

<h5 class="title is-5 m-t-lg is-hidden">Health Fund Details</h5>
<div class="field columns is-variable is-3 is-hidden">
    <div class="control column p-b-none">
        <div class="select is-medium is-fullwidth">
            <select name="healthFundProvider" requiredx>
                <option selected disabled>Provider</option>
                <option value="">No health fund</option>
                @foreach (\App\HealthcareProvider::all() as $provider)
                    <option value="{{ $provider->id }}">{{ $provider->providerName }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="control column p-b-none">
        <div class="select is-medium is-fullwidth">
            <select name="healthFundCoverLevel" requiredx>
                <option selected disabled="true">Cover Level</option>
            </select>
        </div>
    </div>
    <div class="control column p-b-none">
        <input type="text" name="healthFundMemberNumber" class="input is-medium" placeholder="Member Number" requiredx>
    </div>
</div>

<h5 class="title is-5 m-t-lg is-hidden">Health Fund Notes</h5>
<div class="field is-hidden">
    <div class="control content">
        <textarea class="textarea summernote" placeholder="Enter Fund Notes" name="healthFundNotes"></textarea>
    </div>
</div>
