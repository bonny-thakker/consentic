@extends('layouts.web')

@section('title', 'FAQ | Online medical, dental and financial consent')
@section('description', 'Frequently asked questions about Consentic’s online platform for medical, dental and financial consent.')

@section('styles')

    @include('web.partial.styles')

    <style>
        .section-title {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("/images/7f891e36e8cdbe39777d0d4b0144f55a_contact_header.jpeg");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        @media screen and (max-width: 1024px) {
            .section-title {
                background-attachment: initial;
            }
        }
    </style>

@endsection

@section('scripts')
    @include('web.partial.scripts')
@endsection

@section('content')

    <main class="app-content content">

        <section class="section section-title is-highlight">
            <div class="container">
                <h2 class="title">Frequently asked questions</h2>
            </div>
        </section>

        <section class="section ui-sortable-handle section-faq">
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <h2 class="title is-spaced is-bold has-tint">What is Consentic?</h2>
                            <div class="subtitle">
                                <p>Consentic is an online platform for medical, dental and financial consent. Consentic
                                    provides a comprehensive library of patient-tested, medicolegally-reviewed consent
                                    video animations with interactive checklists and secure electronic consent forms.
                                    Consentic improves and standardises the consent process for medical treatment,
                                    making consent simpler and reassuring for patients, and safer and faster for
                                    clinicians.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <h2 class="title is-spaced is-bold has-tint">How does it work?</h2>
                            <div class="subtitle">
                                <p>Consentic is simple to use and faster than conventional consent.</p>
                                <p>As the <strong>clinician</strong>, you: </p>
                                <ul>
                                    <li>log in to your Consentic account</li>
                                    <li>create a profile for the patient</li>
                                    <li>select the procedure you want the patient to be consented for.</li>
                                </ul>
                                <p>The<strong> patient </strong><strong> </strong></p>
                                <ul>
                                    <li>is emailed a link to watch the video at home, or watches it in your practice or
                                        hospital
                                    </li>
                                    <li>completes a checklist after watching the video, to ensure they have understood
                                        the procedure and its risks
                                    </li>
                                    <li>is provided with estimated fees for the procedure, if you choose to include
                                        financial consent
                                    </li>
                                    <li>signs the consent form electronically</li>
                                </ul>
                                <p>You then sign the consent form electronically. <br>
                                    Consent is completed! You and the patient are emailed copies of the completed
                                    consent forms. </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <h2 class="title is-spaced is-bold has-tint">Who creates the video animations?</h2>
                            <div class="subtitle">
                                <p>All of our video animations are created by medical specialists, and are reviewed by
                                    medicolegal experts prior to publication on Consentic.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <h2 class="title is-spaced is-bold has-tint">What are the benefits of using Consentic?</h2>
                            <div class="subtitle">

                                <p>There are more than 150 peer-reviewed studies in the medical literature supporting
                                    the use of video-assisted consent to improve consent for medical procedures.<br>
                                      <br>
                                    Consent for medical treatment is <strong>not</strong> standardised between
                                    practitioners, practices and institutions. Consentic aims to bring clarity and
                                    consistency to medical, dental and financial consent. </p>
                                <p>Benefits include but are not limited to: </p>
                                <ul>
                                    <li>Time saved per consent</li>
                                    <li>Standardised consent</li>
                                    <li>Improved patient and clinician satisfaction</li>
                                    <li>Improved patient understanding</li>
                                    <li>Reduced patient anxiety</li>
                                    <li>Improved patient compliance with post-operative instructions</li>
                                    <li>Potential reduction in medicolegal risk.</li>
                                </ul>
                                <p>What is the benefit to my patients? </p>
                                <ul>
                                    <li>Improved patient satisfaction</li>
                                    <li>Improved comprehension and retention of material presented</li>
                                    <li>Reduced anxiety leading up to the procedure</li>
                                    <li>Improved compliance with post-operative instructions.</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <h2 class="title is-spaced is-bold has-tint">Can I customise the video animations and
                                information? (for example, my own complication rates or specific post-operative
                                instructions)</h2>
                            <div class="subtitle">
                                <p>The video animations are not able to be customised. However, each clinician has the
                                    opportunity to enter their own information for each consent they create, for example
                                    their complication rates. In addition, clinicians can upload documents for viewing
                                    and download by patients, for example their post-operative instructions. </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <h2 class="title is-spaced is-bold has-tint">Can I request for a particular video animation
                                to be made?</h2>
                            <div class="subtitle">
                                <p>Please do! We welcome suggestions and look forward to hearing from you. Please
                                    contact us at <a href="mailto:info@consentic.com">info@consentic.com</a> or visit
                                    our <a href="/contact-cc">contact page.</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <h2 class="title is-spaced is-bold has-tint">Can I have access to the video animations
                                without using the consent forms?</h2>
                            <div class="subtitle">
                                <p>At this stage, all video animations are linked to a consent form. However, it is
                                    possible to email your patients a consent which would allow them to watch the video
                                    animation. Please note that they are not obliged to complete the consent form. </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <h2 class="title is-spaced is-bold has-tint">What specialties are available?</h2>
                            <div class="subtitle">
                                <p>Cardiology</p>
                                <p> Dermatology</p>
                                <p> Gastroenterology</p>
                                <p> Ophthalmology</p>
                                <p> Orthopaedic surgery</p>
                                <p>If your specialty is not listed and you would like it to be, please let us know.
                                    Contact us at <a href="mailto:info@consentic.com">info@consentic.com</a> or visit
                                    our <a href="/contact-cc">contact page.</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <h2 class="title is-spaced is-bold has-tint">How secure is my patient information?</h2>
                            <div class="subtitle">
                                <p>We take patient privacy seriously. All information is Health Insurance Portability
                                    and Accountability Act compliant. All data is encrypted.</p></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <h2 class="title is-spaced is-bold has-tint">Is my credit card information safe?</h2>
                            <div class="subtitle">
                                <p>Consentic doesn’t store any credit card information. All transactions are encrypted
                                    through Stripe. </p></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <h2 class="title is-spaced is-bold has-tint">Do you have different languages available?</h2>
                            <div class="subtitle">
                                <p>We have the option to translate our medical consent videos into any language. Please contact us with the language you require, by emailing  <a href="mailto:info@consentic.com">info@consentic.com</a> or visit
                                    our <a href="/contact-cc">contact page.</a></p></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <h2 class="title is-spaced is-bold has-tint">Am I medicolegally protected if I use Consentic?</h2>
                            <div class="subtitle">
                                <p>Consentic video animations are comprehensive, yet simple to understand and enhance patient comprehension. The data of the patient watching the animation is logged, and patient understanding is tested prior to your patient signing a legally binding electronic medical consent form, so you can demonstrate they have understood procedure specific risks. Whilst we cannot guarantee that you will not be litigated against, you can rest assured that you have provided robust consent. All videos are archived for 20 years and any revisions or new versions are tracked, should problems ever arise.</p></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <h2 class="title is-spaced is-bold has-tint">Am I locked into a contract?</h2>
                            <div class="subtitle">
                                <p>No. Our flexible payment options mean you purchase monthly consents packages. There is absolutely no obligation to continue using the platform, and you will never be charged for anything without your consent. </p></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <h2 class="title is-spaced is-bold has-tint">Ready to revolutionise your practice?</h2>
                            <div class="subtitle">
                                <p>Check out <a href="/pricing">our pricing </a> or <a href="/register">sign up now </a></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection