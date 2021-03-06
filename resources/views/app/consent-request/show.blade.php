@extends('layouts.app')

@section('title', 'Consent Request')

@section('styles')

    @include('app.partial.styles')

@endsection

@section('scripts')

@endsection

@section('content')


   <section class="section">
       <div class="container">
           <h1 class="title">Consent Request - {{ $consentRequest->consent->name }} @if($consentRequest->datetime)
                   - {{ \Carbon\Carbon::parse($consentRequest->datetime)->format('l jS \\of F Y') }}
               @endif</h1>

           <div class="columns is-variable is-8">
               <div class="column is-4 patient-profile-card">
                   <div class="p-lg" style="border: 2px solid #47525E; border-radius: 6px; min-height: 400px;">
                       <figure class="m-b-md image is-128x128">
                           <img class="img-circle"
                                src="https://ssl.gstatic.com/images/branding/product/1x/avatar_circle_blue_512dp.png">
                       </figure>
                       <h5 class="title is-5 m-none">{{ $patient->title }} {{ $patient->fullName() }}</h5>
                       <p>
                           <small>Patient Since {{ $patient->created_at->format('M, Y') }}</small>
                       </p>
                       <hr/>
                       <p>
                           <small><strong>Birthday</strong><br/>
                               {{ \Carbon\Carbon::parse($patient->birthday)->format('d/m/Y')  }}
                           </small>
                       </p>
                       <p>
                           <small><strong>Email</strong><br/>
                               {{ $patient->email->address ?? null }}
                           </small>
                       </p>
                       <p>
                           <small><strong>Mobile</strong><br/>
                               {{ $patient->phoneNumber->number ?? null }}
                           </small>
                       </p>
                       <p>
                           <small><strong>Address</strong><br/>
                               <span class="patient-profile-card-address">
                                        @if($patient->address)
                                       {{ $patient->address->line_1 }}
                                       {{ ($patient->address->line_2) ? '<br />'.$patient->address->line_2 : null }}
                                       {{ ($patient->address->line_3) ? '<br />'.$patient->address->line_3 : null }}
                                       <br/>{{ $patient->address->suburb }}
                                       <br/>{{ $patient->address->state }} {{ $patient->address->postcode }}
                                   @endif
                                    </span>
                           </small>
                       </p>
                   </div>
               </div>
               <div class="column">

                   <div class="tabs is-toggle is-fullwidth">
                       <ul>
                           <li class="is-active">
                               <a href="{{ url('app/consent-requests/'.$consentRequest->id) }}">Animation</a>
                           </li>
                           <li>
                               <a href="{{ url('app/consent-requests/'.$consentRequest->id.'/files') }}">Files</a>
                           </li>
                           <li>
                               <a href="{{ url('app/consent-requests/'.$consentRequest->id.'/doctor-questions') }}">Doctor Questions</a>
                           </li>
                           <li>
                               <a href="{{ url('app/consent-requests/'.$consentRequest->id.'/patient-questions') }}">Patient Questions</a>
                           </li>
                           <li>
                               <a href="{{ url('app/consent-requests/'.$consentRequest->id.'/comments') }}">Comments</a>
                           </li>
                           <li>
                               <a href="{{ url('app/consent-requests/'.$consentRequest->id.'/signed') }}">Signed</a>
                           </li>
                       </ul>
                   </div>

                   <div class="tab-content">
                       <div class="columns is-variable">
                           <div class="column {{ $consentRequest->note ? 'is-8' : 'is-12' }}">
                                <span id="consent-video-player-container" data-videos-watched="{{ $consentRequest->video_watched }}" data-id="{{ $consentRequest->id }}">
                                    <div id="consent-video-player" class="plyr__video-embed" data-plyr-provider="youtube" data-plyr-embed-id="{{ $videoId }}"></div>
                                 </span>
                           </div>
                           @if($consentRequest->note)
                               <div class="column is-4">
                                   @if($consentRequest->note)
                                       <h3 class="subtitle is-4" style="margin-bottom: 10px">Note from Doctor</h3>
                                       {!! $consentRequest->note !!}
                                   @endif
                               </div>
                           @endif
                       </div>
                   </div>

               </div>
           </div>
       </div>
   </section>

@endsection