<hr class="dropdown-divider">

<!-- Teams -->
<h6 class="dropdown-header">{{ __('teams.teams') }}</h6>

<!-- Create Team -->
@if (Spark::createsAdditionalTeams())
    <a href="/settings#/{{ Spark::teamsPrefix() }}" class="dropdown-item">
        <i class="fa fa-fw text-left fa-btn fa-plus"></i> {{__('teams.create_team')}}
    </a>
@endif

<!-- Switch Current Team -->
@if (Spark::showsTeamSwitcher())
    @foreach (Auth::user()->teams as $team)

            <a href="/settings/{{ Spark::teamsPrefix() }}/{{ $team->id }}/switch" class="dropdown-item">
                @if (Auth::user()->current_team_id === $team->id)
                    <i class="fa fa-fw text-left fa-btn fa-check text-success"></i> {{ $team->name }}
                @else
                    <img src="{{ $team->photo_url }}" class="spark-profile-photo-xs" alt="{{__('Team Photo')}}" /><i class="fa fa-btn"></i> {{ $team->name }}
                @endif
            </a>
    @endforeach
@endif
