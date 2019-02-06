<header class="app-header" id="app-header">
    <div class="container">
        <nav class="navbar">
            <div class="navbar-brand">
                <a href="/" class="navbar-item p-none" title="Consentic">
                    @if (request()->is('/'))
                        <img class="is-hidden-touch" id="brand-logo" src="/images/logo-light-sm.png" alt="">
                        <img class="is-hidden-desktop" src="/images/logo-dark-sm.png" alt="">
                    @else
                        <img src="/images/logo-dark-sm.png" alt="">
                    @endif
                </a>
                <button class="button is-large navbar-burger" data-target="navbar-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button> 
            </div>
            <div class="navbar-menu navbar-end" id="navbar-menu">

               {{-- Menu here --}}
                
                @if (! Auth::check())
                    <div class="navbar-item p-r-none">
                        <div class="field is-grouped">
                            <div class=control>
                                <a href="/pages/pricing" class="button is-primary" id="button-signup">Join Now</a>
                            </div>
                            <div class=control> 
                                <a href="https://portal.consentic.com/login" class="button" id="button-login">Login</a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="navbar-item p-r-none">
                        <div class="field is-grouped">
                            <div class=control> 
                                <a href="#" data-toggle="modal" data-modal-id="#sign-in" class="button" id="button-login">Login</a>
                            </div>
                            <div class=control>
                                <a href="/pages/pricing" class="button is-primary" id="button-signup">Sign up now</a>
                            </div>
                        </div>
                    </div> --}}
                @else
                    <div class="navbar-item">
                        <div class="field is-grouped">
                            <div class="control"> <a href="//portal.consentic.com" class="button">My Portal</a> </div>
                            <div class="control"> <a href="//portal.consentic.com/logout" class="button">Logout</a> </div>
                        </div>
                    </div>
                @endif
            </div>
        </nav>
    </div>
</header>