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
                   <li><a href="#" id="video-link">Consent Request</a></li>
                   <li class="is-active"><a href="#" id="video-link">Consent Questions</a></li>
                   <li class="is-active" ><a href="#" aria-current="page" id="sign-link">Sign Consent</a></li>
               </ul>
           </nav>
           <h1 class="title">Hi <strong>{{ $patient->fullName() }}</strong>,</h1>
           <p class="subtitle is-4">
               Please complete the consent request <strong>{{ $consentRequest->consent->name }}</strong> requested by <strong>{{ $consentReqeust->user->title ?? null }} {{ $consentRequest->user->name }}</strong>.
           </p>
           <hr />
           <div class="columns">
               <div class="column">
                   <div class="tab-content">
                       <div id="consent-request-tab" class="tab-pane active">
                         <span id="consent-video-player-container" data-videos-watched="{{ $consentRequest->video_watched }}" data-id="{{ $consentRequest->id }}" data-url-signature="{{ request()->input('signature') }}">
                            <div id="consent-video-player" class="plyr__video-embed" data-plyr-provider="youtube" data-plyr-embed-id="{{ $videoId }}"></div>
                        </span>
                       </div>
                       <div id="consent-questions-tab" class="is-hidden">
                           <form method="POST" action="{{ url()->current() }}" name="publicConsentRequestQuestions">
                           TBC, Consent specific questions to be imported
                           @foreach($consentRequest->consentRequestQuestions()->with('consentRequestQuestionable')->where('consent_request_questionable_type','App\Question')->get() as $consentRequestQuestion)
                               @include('app.partial.question', [
                                'consentRequestQuestion' => $consentRequestQuestion,
                                'consentRequestQuestionAnswer' => null
                               ])
                           @endforeach
                           <hr >
                           @foreach($consentRequest->consentRequestQuestions()->with('consentRequestQuestionable')->where('consent_request_questionable_type','App\PatientQuestion')->get() as $consentRequestQuestion)
                               @include('app.partial.question', [
                                'consentRequestQuestion' => $consentRequestQuestion,
                                'consentRequestQuestionAnswer' => null
                               ])
                           @endforeach
                           <h2 class="subtitle is-4">If you have any questions that have not been answered, please enter these in the box below.</h2>
                               @csrf
                               <input type="hidden" name="commentable_type" value="\App\Patient" />
                               <input type="hidden" name="commentable_id" value="{{ $consentRequest->patient->id }}" />
                               <div class="field">
                                   <p class="control">
                                       <label for="message">Enter your comment here:</label>
                                       <textarea class="textarea @if($errors->has('message')) is-danger @endif" name="message"></textarea>
                                   @if ($errors->has('message'))
                                       <p class="help is-danger invalid-feedback">{{ $errors->first('message') }}</p>
                                       @endif
                                       {{-- <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>--}}
                                       </p>
                               </div>
                               <nav class="level">
                                   <div class="level-left">
                                       <div class="level-item">
                                           <button type="submit" class="button is-info">Submit</button>
                                       </div>
                                   </div>
                               </nav>
                           </form>
                       </div>
                       <div id="consent-sign-tab" class="is-hidden">
                           <form action="#" method="POST" id="add-signature-form" class="has-text-centered">
                               {{-- <p>"I {{ $consentRequest->patient->fullName }} consent to undergo a {{ $consentRequest->procedure->consentName }} performed by {{ $consentRequest->doctor->fullName }}." </p> --}}
                               <p>I confirm that I am "{{ trim($consentRequest->patient->fullName()) }}" or I am the legal guardian of {{ trim($consentRequest->patient->fullName()) }}, born on the {{ \Carbon\Carbon::parse($consentRequest->patient->birthday)->format('jS F Y') }} and am able to consent for the medical procedure.</p>
                               <div id="signature" class="m-b-md"></div>

                               <textarea class="textarea is-hidden" name="consentPatientSignature"></textarea>
                               {{ csrf_field() }}

                               <div class="field m-b-md">
                                   <input class="is-checkradio" id="agreement" type="checkbox" name="agreement" required="">
                                   <label for="agreement" id="agreement-confirmation" style="font-size: 1.2rem;">
                                       I confirm that I have read and agree to the Consentic <a href="https://consentic.com/pages/privacy-policy" target="_blank">Privacy Policy</a> and <a href="https://consentic.com/pages/terms-and-conditions" target="_blank">Terms &amp; Conditions</a>
                                   </label>
                               </div>

                               <button id="clear-signature" class="button is-medium is-warning" style="height: 3em;">Clear</button>
                               <button id="submit-signature" class="button is-medium submit is-primary" disabled>Sign Consent</button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>

@endsection