@extends('layouts.app')

@section('title', 'Consent Request')

@section('styles')

    @include('app.partial.styles')

@endsection

@section('scripts')

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
           <h1 class="title">Consent Request</h1>
           <div class="columns is-variable is-8">
               <div class="column">

                   <div class="tab-content">

                       <p>This consent request is for a differen't practice than the one you are currently logged in to.</p>
                       <p>Please switch into the correct practice and click the link in your email again.</p>

                   </div>

               </div>
           </div>
       </div>
   </section>

@endsection