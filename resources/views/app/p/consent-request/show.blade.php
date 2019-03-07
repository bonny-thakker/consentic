@extends('layouts.public')

@section('title', 'Consent Request')

@section('styles')

    @include('app.partial.styles')

@endsection

@section('scripts')

@endsection

@section('content')

   <section class="section section-public">
       <div class="container">
           <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
               <ul>
                   <li><a href="#">Consent Request</a></li>
                   <li class="is-active"><a href="#">Consent Questions</a></li>
                   <li class="is-active"><a href="#" aria-current="page">Sign Consent</a></li>
               </ul>
           </nav>
           <h1 class="title">Hi <strong>{{ $patient->fullName() }}</strong>,</h1>
           <p class="subtitle is-4">
               Please complete the consent request <strong>{{ $consentRequest->consent->name }}</strong> requested by <strong>{{ $consentReqeust->user->title ?? null }} {{ $consentRequest->user->name }}</strong>.
           </p>
           <div class="columns">
               <div class="column">
                   <div class="tab-content">
                       <div>
                         <span id="consent-video-player-container" data-videos-watched="{{ $consentRequest->video_watched }}" data-id="{{ $consentRequest->id }}" data-url-signature="{{ request()->input('signature') }}">
                            <div id="consent-video-player" class="plyr__video-embed" data-plyr-provider="youtube" data-plyr-embed-id="{{ $videoId }}"></div>
                        </span>
                       </div>
                   </div>

               </div>
           </div>
       </div>
   </section>

@endsection