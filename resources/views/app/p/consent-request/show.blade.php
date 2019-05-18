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
                   <li><a href="#" class="video-link">Consent Request</a></li>
                   <li class="{{ ($consentRequest->video_watched == 1) ? '' : 'is-active' }}"><a href="#" class="questions-link">Consent Questions</a></li>
                   <li class="{{ ($consentRequest->hasPatientAnsweredCorrectly()) ? '' : 'is-active' }}" ><a href="#" aria-current="page" class="sign-link">Sign Consent</a></li>
               </ul>
           </nav>
           <h1 class="title">Hi <strong>{{ $patient->fullName() }}</strong>,</h1>
           <p class="subtitle is-4">
               Please complete the consent request for the <strong>{{ $consentRequest->consent->name }}</strong> procedure @if($consentRequest->datetime)
                   on <strong>{{ \Carbon\Carbon::parse($consentRequest->datetime)->format('l jS \\of F Y') }}</strong>
           @endif requested by <strong>{{ $consentRequest->user->fullName() }}</strong>.
           </p>
           <hr />
           <div class="columns">
               <div class="column">
                   <div class="tab-content">
                       <div id="consent-request-tab" class="{{ (\Session::get('consentRequestStage') == null) ? '' : 'is-hidden' }}">
                         <span id="consent-video-player-container" data-videos-watched="{{ $consentRequest->video_watched }}" data-id="{{ $consentRequest->id }}" data-url-signature="{{ request()->input('signature') }}">
                            <div id="consent-video-player" class="plyr__video-embed" data-plyr-provider="youtube" data-plyr-embed-id="{{ $videoId }}"></div>
                        </span>
                       </div>
                       <div id="consent-questions-tab" class="{{ (\Session::get('consentRequestStage') == 'questions') ? '' : 'is-hidden' }}">
                           <form method="POST" action="{{ url()->current() }}?signature={{ request()->input('signature') }}" name="publicConsentRequestQuestions" id="publicConsentRequestQuestions">
                               @csrf
                               <input type="hidden" name="form" value="publicConsentRequestQuestions" />
                           @foreach($consentRequest->consentRequestQuestions()->with('consentRequestQuestionable')->where('consent_request_questionable_type','App\Question')->get() as $consentRequestQuestion)
                               @include('app.partial.question', [
                                'consentRequestQuestion' => $consentRequestQuestion,
                                'consentRequestQuestionAnswer' => $consentRequestQuestion->consentRequestQuestionAnswer->answer ?? null
                               ])
                           @endforeach
                           <hr >
                           @foreach($consentRequest->consentRequestQuestions()->with('consentRequestQuestionable')->where('consent_request_questionable_type','App\PatientQuestion')->get() as $consentRequestQuestion)
                               @include('app.partial.question', [
                                'consentRequestQuestion' => $consentRequestQuestion,
                                'consentRequestQuestionAnswer' => $consentRequestQuestion->consentRequestQuestionAnswer->answer ?? null
                               ])
                           @endforeach
                           <h2 class="subtitle is-4">Comments</h2>
                           <h2 class="subtitle is-5">If you have any questions that have not been answered, please enter these in the box below.</h2>

                               <div class="field">
                                   <p class="control">
                                       <label for="message">Enter your comment here:</label>
                                       <textarea class="textarea @if($errors->has('message')) is-danger @endif" name="message">{{ old('message') }}</textarea>
                                         @if ($errors->has('message'))
                                       <p class="help is-danger invalid-feedback">{{ $errors->first('message') }}</p>
                                       @endif
                                       {{-- <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>--}}
                                       </p>
                               </div>
                               <nav class="level">
                                   <div class="level-left">
                                       <div class="columns">
                                           <div class="column">
                                               <button type="submit" class="button is-medium submit is-primary m-t-md">Submit Answers &amp; Continue</button>
                                           </div>
                                           <div class="is-divider-vertical m-t-md" data-content="OR"></div>
                                           <div class="column">
                                               <div class="level-item">
                                                   <a class="button is-medium is-fullwidth is-theme m-t-md video-link" href="#">&laquo; Watch Video Again</a>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </nav>
                           </form>
                       </div>
                       <div id="consent-sign-tab" class="{{ (\Session::get('consentRequestStage') == 'sign') ? '' : 'is-hidden' }}">
                           <form action="{{ url()->current() }}?signature={{ request()->input('signature') }}" method="POST" id="add-signature-form" class="has-text-centered">
                               {{-- <p>"I {{ $consentRequest->patient->fullName }} consent to undergo a {{ $consentRequest->procedure->consentName }} performed by {{ $consentRequest->doctor->fullName }}." </p> --}}
                               <p>I confirm that I am "{{ trim($consentRequest->patient->fullName()) }}" or I am the legal guardian of {{ trim($consentRequest->patient->fullName()) }}, born on the {{ \Carbon\Carbon::parse($consentRequest->patient->birthday)->format('jS F Y') }} and am able to consent for the medical procedure.</p>
                               <div id="signature" class="m-b-md"></div>

                               <textarea class="textarea is-hidden" name="consentPatientSignature"></textarea>
                               {{ csrf_field() }}

                               <input type="hidden" name="form" value="publicConsentPatientSignature" />

                               <div class="field m-b-md">
                                   <input class="is-checkradio" id="agreement" type="checkbox" name="agreement" required="">
                                   <label for="agreement" id="agreement-confirmation" style="font-size: 1.2rem;">
                                       I confirm that I have read and agree to the Consentic <a href="/privacy-policy" target="_blank">Privacy Policy</a> and <a href="/terms-and-conditions" target="_blank">Terms &amp; Conditions</a>
                                   </label>
                               </div>

                               <nav class="level">
                                   <div class="level-center">
                                       <div class="columns">
                                           <div class="column">
                                               <button id="clear-signature" class="button is-medium is-warning m-t-md" style="height: 3em;">Clear</button>
                                               <button type="input" href="#" id="submit-signature" class="button is-medium submit is-primary m-t-md" disabled>Sign Consent</button></div>
                                           <div class="is-divider-vertical m-t-md" data-content="OR"></div>
                                           <div class="column">
                                               <div class="level-item">
                                                   <a class="button is-medium is-fullwidth is-theme m-t-md questions-link" href="#">&laquo; Back to consent questions</a>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </nav>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>

@endsection