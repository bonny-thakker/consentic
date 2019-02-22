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
           <h1 class="title">Consent Request - {{ $consentRequest->consent->name }}</h1>
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
                               <a href="#">Animation</a>
                           </li>
                           <li>
                               <a href="#">Doctor Questions</a>
                           </li>
                           <li>
                               <a href="#">Patient Questions</a>
                           </li>
                           <li>
                               <a href="#">Comments</a>
                           </li>
                           <li>
                               <a href="#">Signed</a>
                           </li>
                       </ul>
                   </div>

                   <div class="tab-content">
                       <div id="doctor-questions">
                         {{--  <h5 class="title is-5">Doctor Questions</h5>--}}
                       </div>
                       {{--<div id="atient-questions">
                           <h5 class="title is-5">Patient Questions</h5>
                       </div>
                       <div id="comments">
                           <h5 class="title is-5">Comments</h5>
                       </div>
                       <div id="signed">
                           <h5 class="title is-5">Signed</h5>
                       </div>--}}
                   </div>

               </div>
           </div>
       </div>
   </section>

@endsection