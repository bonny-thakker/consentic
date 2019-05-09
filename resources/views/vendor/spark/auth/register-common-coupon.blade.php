<div class="row justify-content-center">
    <div class="col-lg-8">

        @if(Session::has('coupon'))
        <div class="alert alert-success">
            Your <strong>{{ Session::get('coupon') }}</strong> coupon will be applied when you register below
        </div>
        @endif

    </div>
</div>

<!-- Basic Profile -->
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-default">
            <div class="card-header">
                {{__('Register')}}
            </div>

            <div class="card-body">
                <!-- Generic Error Message -->
                <div class="alert alert-danger" v-if="registerForm.errors.has('form')">
                    @{{ registerForm.errors.get('form') }}
                </div>

                <!-- Registration Form -->
                @include('spark::auth.register-common-form-coupon')
            </div>
        </div>
    </div>
</div>
