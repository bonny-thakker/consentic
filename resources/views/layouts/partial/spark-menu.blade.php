<div class="dropdown">
    <div class="dropdown-trigger spark-nav-profile-dropdown">
        <img src="{{ Auth::user()->photo_url }}" class="dropdown-toggle-image spark-nav-profile-photo" alt="{{__('User Photo')}}" />
            <span class="spark-nav-profile-name">{{ Auth::user()->name }}</span>
            <span class="icon is-small">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>

    </div>
    <div class="dropdown-menu spark-nav-profile-dropdown-menu" id="dropdown-menu" role="menu">
        <div class="dropdown-content">
            @if (session('spark:impersonator'))
                <h6 class="dropdown-header">{{__('Impersonation')}}</h6>

                <!-- Stop Impersonating -->
                <a class="dropdown-item" href="/spark/kiosk/users/stop-impersonating">
                    <i class="fa fa-fw text-left fa-btn fa-user-secret"></i> {{__('Back To My Account')}}
                </a>

                <hr class="dropdown-divider">
            @endif

            <!-- Developer -->
            @if (Spark::developer(Auth::user()->email))
                @include('spark::nav.developer')
            @endif

            <!-- Subscription Reminders -->
            @include('spark::nav.subscriptions')

                <h6 class="dropdown-header">Settings</h6>

                <!-- Your Settings -->
                <a href="/settings" class="dropdown-item">
                    <i class="fa fa-fw fa-btn fa-cog"></i> Your Settings
                </a>

            @if (Spark::usesTeams() && (Spark::createsAdditionalTeams() || Spark::showsTeamSwitcher()))
            <!-- Team Settings -->
                @include('spark::nav.blade.teams-bulma')
            @endif

                 <hr class="dropdown-divider">

                <!-- Logout -->
                <a href="/logout" class="dropdown-item">
                    <i class="fa fa-fw text-left fa-btn fa-sign-out"></i> Logout
                </a>

        </div>
    </div>
</div>