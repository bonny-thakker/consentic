<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Consentic | Intelligent Consent</title>

    <!-- Custom fonts for this template -->
    <link href="/assets/pdf/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <!-- Custom styles for this template -->
    <link href="/assets/pdf/css/normalize.css" rel="stylesheet">
    <link href="/assets/pdf/css/custom-3.css" rel="stylesheet">

</head>

<body id="page-top">
<div class="invoice-box">

    <!-- Navigation -->
    <div class="header">
        <div class="container-invoice">
            <div>
                <div class="logo-sec">
                    <div class="logo">
                        <img src="/assets/pdf/img/logo.png" alt="logo">
                    </div>
                    <div class="logo-title">
                        <div class="logo-title-box">
                            <h1>Consent Form</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="details-section">
        <div class="container-invoice">
            <div class="table-responsive">

                <h2>Patient Details</h2>

                <table id="patient-details" class="table">

                    <tbody>
                    <tr>
                        <th>Title</th>
                        <td colspan="2">{{ $consentRequest->patient->title ?? null }}</td>
                    </tr>

                    <tr>
                        <th>Given name(s)</th>
                        <td colspan="2">{{ $consentRequest->patient->first_name ?? null }} {{ $consentRequest->patient->middle_name ?? null }}</td>
                    </tr>


                    <tr>
                        <th>Surname</th>
                        <td colspan="2">{{ $consentRequest->patient->last_name ?? null }}</td>
                    </tr>


                    <tr>
                        <th>Date of Birth</th>
                        <td colspan="2">
                            @if($consentRequest->patient->birthday)
                                {{ \Carbon\Carbon::parse($consentRequest->patient->birthday)->format('d/m/Y')  }}
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>

            <div id="contact-details" class="table-responsive">

                <h2>Contact Details</h2>

                <table class="table">
                    <tbody>
                    <tr>
                        <th>Street Address</th>
                        <td colspan="5">
                            {{ $consentRequest->patient->address->line_1 }}
                            {{ ($consentRequest->patient->address->line_2) ? '<br />'.$consentRequest->patient->address->line_2 : null }}
                            {{ ($consentRequest->patient->address->line_3) ? '<br />'.$consentRequest->patient->address->line_3 : null }}
                        </td>
                    </tr>

                    <tr>
                        <th>Suburb</th>
                        <td>{{ $consentRequest->patient->address->suburb }}</td>
                        <th>State</th>
                        <td>{{ $consentRequest->patient->address->state }}</td>
                        <th>Postcode</th>
                        <td>{{ $consentRequest->patient->address->postcode  }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td colspan="5">{{ $consentRequest->patient->phoneNumber->number ?? null }}</td>
                    </tr>
                    </tbody>
                </table>

            </div>

            <div id="other-details" class="table-responsive">

                <h2>Other Details</h2>

                <table id="patient-details" class="table">

                    <tbody>
                    <tr>
                        <th>Doctor</th>
                        <td colspan="2">{{ $consentRequest->user->fullName() }}</td>
                    </tr>

                    <tr>
                        <th>Practice/Hospital</th>
                        <td colspan="2">{{ $consentRequest->team->name }}</td>
                    </tr>


                    <tr>
                        <th>Procedure</th>
                        <td colspan="2">{{ $consentRequest->consent->name }}</td>
                    </tr>


                    <tr>
                        <th>Side (if relevant)</th>
                        <td colspan="2"></td>
                    </tr>
                    </tbody>
                </table>

            </div>

            <div class="watch-video">
                <div class="play-icon">
                    <a target="_blank" href="{{ $signedVideoLink }}"><img src="{{ $consentRequest->consent->videoThumbnail() }}" alt="logo"></a>
                </div>

                <div class="video-text">
                    <h2>{{ $consentRequest->consent->name }}</h2>
                    @if($consentRequest->datetime)
                        <h3>on {{ \Carbon\Carbon::parse($consentRequest->datetime)->format('l jS \\of F Y') }}</h3>
                    @endif
                    <a href="{{ $signedVideoLink }}" target="_blank">Click to watch video</a>
                    <p>This link will be active for a limited time following signing the consent. For ongoing access, please contact your doctor.</p>
                </div>
            </div>

            @if($consentRequest->note)

                <div class="patient-declaration">
                    <h2 style="margin-bottom: 10px">Note from Doctor</h2>
                    <div class="declaration-padding">
                        {!! $consentRequest->note !!}
                    </div>

                </div>

            @endif

            <div class="patient-declaration">
                <h2>Patient Declaration</h2>
                <div class="declaration-padding">
                @foreach($consentRequest->consentRequestQuestions()->with('consentRequestQuestionable')->where('consent_request_questionable_type','App\Question')->get() as $consentRequestQuestion)
                    <div class="answer">
                        {{ $consentRequestQuestion->consentRequestQuestionable->text }}
                     </div>
                 @endforeach
                 @foreach($consentRequest->consentRequestQuestions()->with('consentRequestQuestionable')->where('consent_request_questionable_type','App\PatientQuestion')->get() as $consentRequestQuestion)
                    <div class="answer">
                        {{ $consentRequestQuestion->consentRequestQuestionable->text }}
                    </div>
                @endforeach
                </div>
            </div>

            <div class="doctor-declaration">
                <h2>Doctor Declaration</h2>
                <div class="declaration-padding">
                @foreach($consentRequest->consentRequestQuestions()->with('consentRequestQuestionable')->where('consent_request_questionable_type','App\UserQuestion')->get() as $consentRequestQuestion)
                    <div class="answer">{{ $consentRequestQuestion->consentRequestQuestionable->text }}</div>
                @endforeach
                </div>
            </div>

            <div class="consent-sign">
                <h2>Consent for Procedure and/or Treatment</h2>
                <h3>"I <strong>{{ $consentRequest->patient->fullName() }}</strong> consent to undergo <span>{{ $consentRequest->consent->name }}</span> performed by <span>{{ $consentRequest->user->fullName() }}.</span> I have read and agree to the Consentic Privacy Policy and agree that I am happy to proceed having fully understood the entire policy."</h3>
                <div class="sign-sec">
                    <h4>Patient Signature</h4>
                    <div class="signature">
                        @if ($consentRequest->patient_signature)
                            <img class="sign-image" src="{{ $consentRequest->patient_signature }}" alt="Patient Signature" style="width: 300px;">
                        @endif
                    </div>

                    <p class="decor">{{ $consentRequest->patient->fullName() }}</p>
                    <p class="signed-date">{{ \Carbon\Carbon::parse($consentRequest->patient_signed_ts)->timezone($consentRequest->user->time_zone)->format('l dS F Y H:i') }}</p>

                </div>

                <div class="sign-sec">
                    <h4>Doctor Signature</h4>
                    <div class="signature">
                        @if ($consentRequest->user_signature)
                            <img class="sign-image" src="{{ $consentRequest->user_signature  }}" alt="Doctor Signature" style="width: 300px;">
                        @endif
                    </div>

                    <p class="decor">{{ $consentRequest->user->fullName() }}</p>
                    <p class="signed-date">{{ \Carbon\Carbon::parse($consentRequest->user_signed_ts)->timezone($consentRequest->user->time_zone)->format('l dS F Y H:i') }}</p>
                </div>

            </div>

         {{--   <div class="financial-consent">
                <h2>FINANCIAL CONSENT</h2>
                <div class="financial-cont">
                    <p>I agree to pay the costs associated with the procedure, and Dr (insert doctor’s name) has provided an estimate of ($insert amount). There may be a Medicare rebate of ($insert amount), and the estimated out of pocket cost is ($insert amount). You may be entitled to a rebate from your private insurer. </p>
                    <p>I understand there may be additional incidental costsassociated with the procedure, and that the total amount I am required to pay may be greater than this estimate. </p>
                    <p>I understand there will be a fee for the anaesthetic, and that the anaesthetist will provide this cost to me.</p>
                    <p>If I am privately insured, I understand that I will need to speak with my health care fund to determine whether any rebates are available.</p>
                </div>

            </div>
--}}

        </div>
    </div>

</div>
</body>

</html>
