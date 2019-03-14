<div class="columns">
    <div class="column">
        <a href="{{ url('app/patients') }}" class="box quick-stats has-background-primary has-text-white" style="background-color: #00d1b2 !important;">
            <div class="quick-stats-icon">
                <span class="icon is-large">
                    <i class="fas fa-users"></i>
                </span>
            </div>
            <div class="quick-stats-content">
                <h2 class="title">{{ $patientsCount ?? 0 }}</h2>
                <p class="subtitle">Patients</p>
            </div>
        </a>
    </div>
    <div class="column">
        <a href="{{ url('app/consent-requests') }}" class="box quick-stats has-background-info has-text-white" style="background-color: #16B1BA !important;">
            <div class="quick-stats-icon">
                <span class="icon is-large">
                    <i class="fas fa-list-ul"></i>
                </span>
            </div>
            <div class="quick-stats-content">
                <h2 class="title">{{ $consentRequestsCount ?? 0 }}</h2>
                <p class="subtitle">Consents</p>
            </div>
        </a>
    </div>
    <div class="column">
        <a id="unseen-consents" href="{{ url('app/consent-requests') }}" class="box quick-stats has-background-danger has-text-white" style="background-color: #1C3D45 !important;">
            <div class="quick-stats-icon">
                <span class="icon is-large">
                    <i class="fas fa-tasks"></i>
                </span>
            </div>
            <div class="quick-stats-content">
                <h2 class="title">{{ $consentRequestPendingCount ?? 0 }}</h2>
                <p class="subtitle">Pending Consents</p>
            </div>
        </a>
    </div>
</div>
<div class="columns">
    <div class="column">
        <a href="/" id="unseen-comments" class="box quick-stats has-text-white" style="background-color: #1C3D45">
            <div class="quick-stats-icon">
                <span class="icon is-large">
                    <i class="fas fa-comments"></i>
                </span>
            </div>
            <div class="quick-stats-content">
                <h2 class="title">{{ $unseenComments ?? 0 }}</h2>
                <p class="subtitle">Unseen Comments</p>
            </div>
        </a>
    </div>
    <div class="column">
        <a href="/" id="animations" class="box quick-stats has-text-white" style="background-color: #16B1BA;">
            <div class="quick-stats-icon">
                <span class="icon is-large">
                    <i class="fas fa-video"></i>
                </span>
            </div>
            <div class="quick-stats-content">
                <h2 class="title">{{ $consents ?? 0 }}</h2>
                <p class="subtitle">Animations</p>
            </div>
        </a>
    </div>
    <div class="column">
        <a href="/settings?tab=subscription" class="box quick-stats has-background-primary has-text-white" style="background-color: #00d1b2 !important;">
            <div class="quick-stats-icon">
                <span class="icon is-large">
                    <i class="fas fa-file-contract"></i>
                </span>
            </div>
            <div class="quick-stats-content">
                <h2 class="title">{{ $remainingConsents ?? 0 }}</h2>
                <p class="subtitle">Remaining Credits</p>
            </div>
        </a>
    </div>
</div>