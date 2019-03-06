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
                   <li><a href="#">Bulma</a></li>
                   <li><a href="#">Documentation</a></li>
                   <li><a href="#">Components</a></li>
                   <li class="is-active"><a href="#" aria-current="page">Breadcrumb</a></li>
               </ul>
           </nav>
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