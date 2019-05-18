<form role="form">

    <!-- Title -->
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{__('Title')}}</label>

        <div class="col-md-6">
            <select class="form-control" name="title" v-model="registerForm.title"
                    :class="{'is-invalid': registerForm.errors.has('title')}" autofocus>
                <option></option>
                <option value="Doctor">Doctor</option>
                <option value="Miss">Miss</option>
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Ms.">Ms.</option>

            </select>

            <span class="invalid-feedback" v-show="registerForm.errors.has('title')">
            @{{ registerForm.errors.get('name') }}
            </span>
        </div>
    </div>

    <!-- Name -->
   {{-- <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{__('Name')}}</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="name" v-model="registerForm.name" :class="{'is-invalid': registerForm.errors.has('name')}" autofocus>

            <span class="invalid-feedback" v-show="registerForm.errors.has('name')">
                @{{ registerForm.errors.get('name') }}
            </span>
        </div>
    </div>--}}

    <!-- First Name -->
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{__('First Name')}}</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="first_name" v-model="registerForm.first_name" :class="{'is-invalid is-danger': registerForm.errors.has('first_name')}">

            <span class="invalid-feedback" v-show="registerForm.errors.has('first_name')">
                        @{{ registerForm.errors.get('first_name') }}
                    </span>
        </div>
    </div>

    <!-- Last Name -->
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{__('Last Name')}}</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="last_name" v-model="registerForm.last_name" :class="{'is-invalid is-danger': registerForm.errors.has('last_name')}">

            <span class="invalid-feedback" v-show="registerForm.errors.has('last_name')">
                        @{{ registerForm.errors.get('last_name') }}
                    </span>
        </div>
    </div>

    <!-- Speciality -->
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{__('Speciality')}}</label>

        <div class="col-md-6">
            <select class="form-control" name="speciality" v-model="registerForm.speciality"
                    :class="{'is-invalid': registerForm.errors.has('speciality')}" autofocus>
                <option></option>
                @foreach (\App\ConsentSpeciality::where('id','<>',1)->get() as $speciality)
                    <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                @endforeach
            </select>

            <span class="invalid-feedback" v-show="registerForm.errors.has('speciality')">
            @{{ registerForm.errors.get('speciality') }}
            </span>
        </div>
    </div>

    <!-- E-Mail Address -->
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{__('E-Mail Address')}}</label>

        <div class="col-md-6">
            <input type="email" class="form-control" name="email" v-model="registerForm.email" :class="{'is-invalid': registerForm.errors.has('email')}">

            <span class="invalid-feedback" v-show="registerForm.errors.has('email')">
                @{{ registerForm.errors.get('email') }}
            </span>
        </div>
    </div>

    <!-- Phone Number -->
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{__('Mobile Number')}}</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="phone_number" v-model="registerForm.phone_number" :class="{'is-invalid is-danger': registerForm.errors.has('phone_number')}">

            <span class="invalid-feedback" v-show="registerForm.errors.has('phone_number')">
                        @{{ registerForm.errors.get('phone_number') }}
                    </span>
        </div>
    </div>

    <!-- Password -->
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{__('Password')}}</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password" v-model="registerForm.password" :class="{'is-invalid': registerForm.errors.has('password')}">

            <span class="invalid-feedback" v-show="registerForm.errors.has('password')">
                @{{ registerForm.errors.get('password') }}
            </span>
        </div>
    </div>

    <!-- Password Confirmation -->
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{__('Confirm Password')}}</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation" v-model="registerForm.password_confirmation" :class="{'is-invalid': registerForm.errors.has('password_confirmation')}">

            <span class="invalid-feedback" v-show="registerForm.errors.has('password_confirmation')">
                @{{ registerForm.errors.get('password_confirmation') }}
            </span>
        </div>
    </div>

@if (Spark::usesTeams() && Spark::onlyTeamPlans())
    <!-- Team Name -->
        <div class="form-group row" v-if=" ! invitation">
            <label class="col-md-4 col-form-label text-md-right">{{ __('teams.team_name') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="team" v-model="registerForm.team" :class="{'is-invalid': registerForm.errors.has('team')}" autofocus>
                <small class="form-text text-muted">Please enter your full practice or clinic name. If an individual simply enter your full name.</small>
                <span class="invalid-feedback" v-show="registerForm.errors.has('team')">
                    @{{ registerForm.errors.get('team') }}
                </span>
            </div>
        </div>

    @if (Spark::teamsIdentifiedByPath())
        <!-- Team Slug (Only Shown When Using Paths For Teams) -->
            <div class="form-group row" v-if=" ! invitation">
                <label class="col-md-4 col-form-label text-md-right">{{ __('teams.team_slug') }}</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="team_slug" v-model="registerForm.team_slug" :class="{'is-invalid': registerForm.errors.has('team_slug')}" autofocus>

                    <small class="form-text text-muted" v-show="! registerForm.errors.has('team_slug')">
                        {{__('teams.slug_input_explanation')}}
                    </small>

                    <span class="invalid-feedback" v-show="registerForm.errors.has('team_slug')">
                        @{{ registerForm.errors.get('team_slug') }}
                    </span>
                </div>
            </div>
    @endif
@endif

    <!-- Terms And Conditions -->
    <div v-if=" ! selectedPlan || selectedPlan.price == 0">
        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="terms" :class="{'is-invalid': registerForm.errors.has('terms')}" v-model="registerForm.terms">
                    <label class="form-check-label" for="terms">
                        I consent that I have read and agree to be bound by the  <a href="#terms" @click="showTerms()">  Terms & Conditions </a> of Consentic. I also agree that I have read and understand the Privacy Policy and understand that both these agreements may change at any time without notice.

                        {{--{!! __('I Accept :linkOpen The Terms Of Service :linkClose', ['linkOpen' => '<a href="/terms" target="_blank">', 'linkClose' => '</a>']) !!}--}}
                    </label>
                    <div class="invalid-feedback" v-show="registerForm.errors.has('terms')">
                        <strong>@{{ registerForm.errors.get('terms') }}</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button class="btn btn-primary" @click.prevent="register" :disabled="registerForm.busy">
                    <span v-if="registerForm.busy">
                        <i class="fa fa-btn fa-spinner fa-spin"></i> {{__('Registering')}}
                    </span>

                    <span v-else>
                        <i class="fa fa-btn fa-check-circle"></i> {{__('Register')}}
                    </span>
                </button>
            </div>
        </div>
    </div>
</form>
