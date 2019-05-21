<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Consent Summary: {{ $consentRequest->consent->name }}</title>

    <!-- Bootstrap core CSS -->
    {{--<link href="/assets/pdf/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}

    <!-- Custom fonts for this template -->
    <link href="/assets/pdf/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
   {{-- <link href="/assets/pdf/css/custom.min.css" rel="stylesheet">--}}

    <style>

        .invoice-box {
            /* background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15); */
            max-width: 800px;
            margin: auto;
            padding: 30px;
            /* border: 1px solid #eee; */
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: 24px;
            text-align: left;
        }

        .invoice-box table td{
            text-align: left;
        }

        .signature{
            padding:30px 0;
        }

        .sign-sec p.signed-date{
            margin-top: 5px;
            font-size: 90%;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }


    </style>

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
                    <h1>Consent Form </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="details-section">
    <div class="container-invoice">
        <div>
            <table id="patient-details" class="table">
                <thead>
                <tr>
                    <th colspan="2">
                        <h2>Patient Details</h2>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>Title</th>
                    <td>{{ $consentRequest->patient->title ?? null }}</td>
                </tr>

                <tr>
                    <th>Given name(s)</th>
                    <td>{{ $consentRequest->patient->first_name ?? null }} {{ $consentRequest->patient->middle_name ?? null }}</td>
                </tr>


                <tr>
                    <th>Surname</th>
                    <td>{{ $consentRequest->patient->last_name ?? null }}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>
                        @if($consentRequest->patient->birthday)
                            {{ \Carbon\Carbon::parse($consentRequest->patient->birthday)->format('d/m/Y')  }}
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div id="contact-details">
            <table class="table">
                <thead>
                <tr>
                    <th colspan="6">
                        <h2>Contact Details</h2>
                    </th>
                </tr>
                </thead>
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

        <div id="other-details">

            <table id="patient-details" class="table">
                <thead>
                <tr>
                    <th colspan="2">
                        <h2>Other Details</h2>
                    </th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <th>Doctor</th>
                    <td>{{ $consentRequest->user->fullName() }}</td>
                </tr>

                <tr>
                    <th>Practice/Hospital</th>
                    <td>{{ $consentRequest->team->name }}</td>
                </tr>


                <tr>
                    <th>Procedure</th>
                    <td>{{ $consentRequest->consent->name }}</td>
                </tr>


                <tr>
                    <th>Side (if relevant)</th>
                    <td>&nbsp;</td>
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
                <h2>Note from Doctor</h2>
                {!! $consentRequest->note !!}
            </div>

        @endif

        <div class="patient-declaration">
            <h2>Patient Declaration</h2>
            <ul>
                @foreach($consentRequest->consentRequestQuestions()->with('consentRequestQuestionable')->where('consent_request_questionable_type','App\Question')->get() as $consentRequestQuestion)
                    <li>{{ $consentRequestQuestion->consentRequestQuestionable->text }}</li>
                @endforeach
                @foreach($consentRequest->consentRequestQuestions()->with('consentRequestQuestionable')->where('consent_request_questionable_type','App\PatientQuestion')->get() as $consentRequestQuestion)
                    <li>{{ $consentRequestQuestion->consentRequestQuestionable->text }}</li>
                @endforeach
            </ul>
        </div>

        <div class="doctor-declaration">
            <h2>Doctor Declaration</h2>
            <ul>
                @foreach($consentRequest->consentRequestQuestions()->with('consentRequestQuestionable')->where('consent_request_questionable_type','App\UserQuestion')->get() as $consentRequestQuestion)
                    <li>{{ $consentRequestQuestion->consentRequestQuestionable->text }}</li>
                @endforeach
            </ul>
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

        <div class="financial-consent" style="display: none;">
            <h2>FINANCIAL CONSENT</h2>
            <div class="financial-cont">
                <p>I agree to pay the costs associated with the procedure, and Dr (insert doctor’s name) has provided an estimate of ($insert amount). There may be a Medicare rebate of ($insert amount), and the estimated out of pocket cost is ($insert amount). You may be entitled to a rebate from your private insurer. </p>
                <p>I understand there may be additional incidental costsassociated with the procedure, and that the total amount I am required to pay may be greater than this estimate. </p>
                <p>I understand there will be a fee for the anaesthetic, and that the anaesthetist will provide this cost to me.</p>
                <p>If I am privately insured, I understand that I will need to speak with my health care fund to determine whether any rebates are available.</p>
            </div>
        </div>
    </div>
</div>

</div>

<!-- Bootstrap core JavaScript -->
<script src="/assets/pdf/vendor/jquery/jquery.min.js"></script>
<script src="/assets/pdf/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
