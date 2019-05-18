@extends('layouts.public')

@section('title', 'Consent')

@section('styles')

    @include('app.partial.styles')

@endsection

@section('scripts')

@endsection

@section('content')

   <section class="section" style="padding-top: 30px">
       <div class="container">
           <div class="columns">
               <div class="column">
                   <div class="tab-content">
                       <div id="consent-request-tab">
                         <span id="consent-video-player-container">
                            <div id="consent-video-player" class="plyr__video-embed" data-plyr-provider="youtube" data-plyr-embed-id="{{ $videoId }}"></div>
                        </span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>

@endsection