@extends('layouts.public')

@section('title', 'Consent Request')

@section('styles')

    @include('app.partial.styles')

@endsection

@section('scripts')

@endsection

@section('content')

   <section class="section">
       <div class="container">
           <h1 class="title">Consent Request - {{ $consentRequest->consent->name }}</h1>
           <div class="columns">
               <div class="column">
                   <div class="tab-content">
                       <div>
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