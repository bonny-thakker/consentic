<div class="container">
    <div class="columns">
        <div class="column">
            @if(Spark::usesTeams())
                <h1 class="title">Practice: {{ Auth::user()->currentTeam->shortname ?? Auth::user()->currentTeam->name }}</h1>
            @endif
        </div>
    </div>
</div>