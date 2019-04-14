<!doctype html>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Consent Summary: {{ $consentRequest->consent->name }}</title>
        <link rel="stylesheet" href="/assets/plugins/materialdesignicons/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome-all.min.css">
        <style>
            h2.section-title {
                margin: 0;
            }

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
                line-height: inherit;
                text-align: left;
            }
            
            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }
            
            .invoice-box table tr td:nth-child(2) {
                /* text-align: right; */
            }
            
            .invoice-box table tr.top table td {
                padding-bottom: 20px;
            }
            
            .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 45px;
                color: #333;
            }
            
            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            }
            
            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }
            
            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }
            
            .invoice-box table tr.item td{
                border-bottom: 1px solid #eee;
            }
            
            .invoice-box table tr.item.last td {
                border-bottom: none;
            }
            
            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }
            
            .invoice-box table tr td p {
                margin: 0;
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
            
            .icon-check {
                color: #299CF3;
            }

            .user-avatar {
                border-radius: 50%;
                max-width: 50px;
            }

            .invoice-box table td.answer {
                padding: 5px 20px;
            }

            .sign-image {
                max-width: 300px;
                max-height: 100px;
            }
        </style>
    </head>

    <body>
        <div class="invoice-box">
            
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2" align="center">
                        <img src="https://consentic.com/images/logo-dark-sm.png" style="width:100%; max-width:250px;"> <br>
                        <h2>Consent Summary: {{ $consentRequest->consent->name }}</h2>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="padding: 0px; padding-bottom: 20px;" align="center">
                        <br>
                        <a target="_blank" href="{{ $consentRequest->consent->video_url }}">
                            <img width="100%" height="400" src="{{ $consentRequest->consent->videoThumbnail() }}">
                        </a>
                        <p style="text-align: center;">
                            <a target="_blank" href="{{ $consentRequest->consent->video_url }}">Click to open video</a>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <br>
                        <h2 class="section-title">Patient Questions</h2>
                        <br>
                    </td>
                </tr>

                @foreach($consentRequest->consentRequestQuestions()->with('consentRequestQuestionable')->where('consent_request_questionable_type','App\Question')->get() as $consentRequestQuestion)

                    <tr class="item">
                        <td colspan="2" style="padding-top: 20px;">{{ $consentRequestQuestion->consentRequestQuestionable->text }}</td>
                    </tr>

                    @switch ($consentRequestQuestion->consentRequestQuestionable->type)

                        @case('boolean')
                        @case('multiple')
                            <tr class="heading">
                                <td class="answer">{{ $consentRequestQuestion->consentRequestQuestionAnswer->answer->text }}</td>
                                <td class="answer" align="right">
                                    <span class="icon-check">
                                        {{-- <i class="mdi mdi-24px mdi-check"></i> --}}
                                        <i class="fas fa-check" style="font-family: fontawesome;">&#xf00c</i>
                                    </span>
                                </td>
                            </tr>
                        @break

                    @endswitch

                @endforeach

                @foreach($consentRequest->consentRequestQuestions()->with('consentRequestQuestionable')->where('consent_request_questionable_type','App\PatientQuestion')->get() as $consentRequestQuestion)

                    <tr class="item">
                        <td colspan="2" style="padding-top: 20px;">{{ $consentRequestQuestion->consentRequestQuestionable->text }}</td>
                    </tr>

                    @switch ($consentRequestQuestion->consentRequestQuestionable->type)

                        @case('boolean')
                        @case('multiple')
                        <tr class="heading">
                            <td class="answer">{{ $consentRequestQuestion->consentRequestQuestionAnswer->answer->text }}</td>
                            <td class="answer" align="right">
                                    <span class="icon-check">
                                        {{-- <i class="mdi mdi-24px mdi-check"></i> --}}
                                        <i class="fas fa-check" style="font-family: fontawesome;">&#xf00c</i>
                                    </span>
                            </td>
                        </tr>
                        @break

                    @endswitch

                @endforeach

                <tr>
                    <td colspan="2">
                        <br>
                        <br>
                        <h2 class="section-title">Doctor Questions</h2>
                        <br>
                    </td>
                </tr>

                @foreach($consentRequest->consentRequestQuestions()->with('consentRequestQuestionable')->where('consent_request_questionable_type','App\UserQuestion')->get() as $consentRequestQuestion)

                    <tr class="item">
                        <td colspan="2" style="padding-top: 20px;">{{ $consentRequestQuestion->consentRequestQuestionable->text }}</td>
                    </tr>

                    @switch ($consentRequestQuestion->consentRequestQuestionable->type)

                        @case('boolean')
                        @case('multiple')
                        <tr class="heading">
                            <td class="answer">{{ $consentRequestQuestion->consentRequestQuestionAnswer->answer->text }}</td>
                            <td class="answer" align="right">
                                    <span class="icon-check">
                                        {{-- <i class="mdi mdi-24px mdi-check"></i> --}}
                                        <i class="fas fa-check" style="font-family: fontawesome;">&#xf00c</i>
                                    </span>
                            </td>
                        </tr>
                        @break

                    @endswitch

                @endforeach

            </table>
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <br>
                        <h2 class="section-title" style="margin: 20px 0 20px 0;">Comments</h2>
                        <br>
                    </td>
                </tr>

                @foreach ($consentRequest->comments as $comment)
                    <tr class="item">
                        <td align="center" width="60px">
                            @if(isset($comment->commented->photo_url))
                                <img class="ser-avatar" src="{{ $comment->commented->photo_url }}" alt="{{ $comment->commented->name ?? $comment->commented->fullName() }} Avatar">
                            @elseif($comment->commented->email->address)
                                <img class="user-avatar" src="https://www.gravatar.com/avatar/{{ md5($comment->commented->email) }}.jpg?s=64&d=mp" alt="User Profile Picture">
                            @else
                                {{-- TBC --}}
                            @endif
                        </td>
                        <td>
                            <b>{{ $comment->commented->name ?? $comment->commented->fullName() }}</b> <br>
                            {!! $comment->comment !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td colspan="2" style="padding-top: 40px;" align="center">
                        <p>"I {{ $consentRequest->patient->fullName() }} consent to undergo {{ $consentRequest->consent->name }} performed by {{ $consentRequest->user->fullName() }}. I have read and agree to the Consentic Privacy Policy and agree that I am happy to proceed having fully understood the entire policy." </p>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-top: 40px;" width="50%">
                        <p>Patient Signature</p> <br>
                        @if ($consentRequest->patient_signature)
                            <img class="sign-image" src="{{ $consentRequest->patient_signature }}" alt="Patient Signature" style="width: 300px;">
                        @endif
                    </td>
                    <td align="center" style="padding-top: 40px;" width="50%">
                        <p>Doctor Signature</p> <br>
                        @if ($consentRequest->user_signature)
                            <img class="sign-image" src="{{ $consentRequest->user_signature  }}" alt="Doctor Signature" style="width: 300px;">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-top: 40px;" width="50%">
                        @if ($consentRequest->patient_signature)
                            <p>{{ $consentRequest->patient->title . ' ' . $consentRequest->patient->fullName() }}</p> <br>
                            <p>Signed at {{ \Carbon\Carbon::parse($consentRequest->patient_signed_ts)->timezone($consentRequest->user->time_zone)->format('l dS F Y H:i') }}</p>
                        @endif
                    </td>
                    <td align="center" style="padding-top: 40px;" width="50%">
                        @if ($consentRequest->user_signature)
                            <p>Dr. {{ $consentRequest->user->fullName() }}</p> <br>
                            <p>Signed at {{ \Carbon\Carbon::parse($consentRequest->user_signed_ts)->timezone($consentRequest->user->time_zone)->format('l dS F Y H:i') }}</p>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>