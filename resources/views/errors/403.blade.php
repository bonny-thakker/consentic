@extends('layouts.web')

@section('code', '403')
@section('title', __('Forbidden'))

@section('styles')

    @include('app.partial.styles')

@endsection

@section('content')

    {{-- <section class="section" id="consent-container">
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
     </section>--}}

    <section class="section">
        <div class="container">
            <h1 class="title">{{ __($exception->getMessage() ?: 'Sorry, you are forbidden from accessing this page.') }}</h1>
            <div class="columns is-variable is-8">
                <div class="column">

                    <div class="tab-content">

                        @if(!auth()->guest())

                            <p>You may be trying to access a resource that is owned by another practice.</p>
                            <p>If you have access please switch into the correct practice and try again.</p>

                        @else

                            <p>This link no longer exists.</p>

                        @endif

                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
