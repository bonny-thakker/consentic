@extends('layouts.auth')

@section('title', 'Login')

@section('styles')

@section('scripts')
    @include('web.partial.scripts')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <form id="signin-form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="columns is-vcentered">
                    <div class="login column">
                        <div class="columns">
                            <div class="column is-4 is-offset-4">
                                <section class="section">

                                    <div class="field">
                                        <label for="email" class="label is-medium">{{ __('Email') }}</label>
                                        <div class="control has-icons-left">
                                            <input class="input is-medium{{ $errors->has('email') ? ' is-invalid is-danger' : '' }}" type="text" name="email" type="email" id="email" value="{{ old('email') }}" required autofocus>
                                            <span class="icon is-small is-left">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                            @if ($errors->has('email'))
                                                <p class="help is-danger">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label for="password" class="label is-medium">{{ __('Password') }}</label>
                                        <div class="control has-icons-left">
                                            <input class="input is-medium{{ $errors->has('password') ? ' is-invalid is-danger' : '' }}" type="password" name="password" required>
                                            <span class="icon is-small is-left">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                            @if ($errors->has('password'))
                                                <p class="help is-danger">{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="field">

                                        <div class="control has-icons-left">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="button is-medium submit is-vcentered is-primary is-outlined">{{ __('Login') }}</button>
                                    </div>
                                    <div>
                                        {{-- <a href="https://consentic.com/pages/pricing"> No Account? Sign Up Now!</a><br>  --}}
                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">{{__('Forgot Your Password?')}}</a>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection