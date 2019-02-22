@extends('layouts.app')

@section('title', 'Consent Request')

@section('styles')

    @include('app.partial.styles')

@endsection

@section('scripts')

@endsection

@section('content')

    <section class="section" id="consent-container">
        <div class="container">
            <div class="columns is-variable is-8">
                <!-- Consent Video -->
                <div class="column">
                    <span id="consent-video-player-container">
                        VIDEO GOES HERE
                        <div id="consent-video-player" class="plyr__video-embed" data-plyr-provider="youtube" data-plyr-embed-id="{{ $videoId }}"></div>
                    </span>
                </div>
            </div>
         </div>
    </section>

@endsection