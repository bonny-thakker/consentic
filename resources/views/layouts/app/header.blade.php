<header class="app-header">
    <div class="container">
        <nav class="navbar">
            <div class="navbar-brand">
                <a href="/" class="navbar-item" title="Consentic">
                    <img src="/images/logo-dark-sm.png" alt="">
                </a>
                <button class="button is-white navbar-burger" data-target="navbar-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <div class="navbar-menu navbar-end fadeInDown" id="navbar-menu">

                @include('vendor.laravel-menu.custom.web-main-menu', array('items' => $appMainMenu->roots()))

                <div class=navbar-item>
                    <div class="field is-grouped">
                        <div class=control>
                            <div class="dropdown is-right tooltip is-tooltip-bottom" data-tooltip="Notifications">
                                <div class="dropdown-trigger">
                                    <a class="button button-notification is-text is-borderless" aria-haspopup="true" aria-controls="dropdown-notifications" data-badge="#" data-total="#">
                                        <span class="icon">
                                            <i class="mdi mdi-24px mdi-bell-outline"></i>
                                        </span>
                                    </a>
                                </div>
                                <div class="dropdown-menu" id="dropdown-notifications" role="menu">
                                    <div class="dropdown-content">

                                        <span href="" class="dropdown-item has-text-centered">Notifications</span>
                                        <hr class="dropdown-divider">

                                        {{-- NOTIFICATIONS HERE --}}

                                    </div>
                                </div>
                            </div>
                            {{-- <a class="button is-text is-borderless tooltip is-tooltip-bottom" href="/logout" data-tooltip="Logout">
                                <span class="icon">
                                    <i class="mdi mdi-24px mdi-logout"></i>
                                </span>
                            </a> --}}
                        </div>
                    </div>
                </div>

                <div class="navbar-item">
                    <div class="field">
                        <div class="control">
                            {{--@if(Spark::usesTeams())
                                <a class="button" href="#"> <span class="fa fa-bank"></span>{{ Auth::user()->currentTeam->shortname ?? Auth::user()->currentTeam->name }}</a>
                            @endif--}}
                            @include('layouts.partial.spark-menu')
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>