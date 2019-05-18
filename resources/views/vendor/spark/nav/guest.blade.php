<nav class="navbar navbar-light navbar-expand-md navbar-spark">
    <div class="container">
        <!-- Branding Image -->
        @include('spark::nav.brand')
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <!-- Left Side Of Navbar -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('team') }}">Our Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('benefits') }}">Benefits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('pricing') }}">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('faq') }}">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact-cc') }}">Contact Us</a>
                </li>

            </ul>

            <ul class="navbar-nav ml-3">
                <li class="nav-item">
                    <a id="button-signup" class="btn btn-primary" href="/register">
                        @if(env('TRIAL_ENABLED'))
                            14 Day Free Trial, Join Now!
                        @else
                            Sign Up Now
                        @endif
                    </a>

                </li>
                <li class="nav-item">
                    <a id="button-login" class="btn btn-outline-secondary" href="/login">{{__('Login')}}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
