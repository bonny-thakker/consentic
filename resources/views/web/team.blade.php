@extends('layouts.web')

@section('title', 'Comprehensive medical consent for medical and dental specialists ')
@section('description', 'Reduce your medicolegal risk and save time with our online video animation consent process. Developed by doctors, who understand the challenges surrounding medical consent.')


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
    </style>

@endsection

@section('scripts')
    @include('web.partial.scripts')
@endsection

@section('content')

    <main class="app-content">

        <section class="section section-title is-highlight">
            <div class="container">
                <h2 class="title">Meet our team</h2>
                <h3 class="subtitle">Consentic has been developed by medical specialists who understand first-hand the importance of comprehensive medical consent, and the challenges that can arise when obtaining it. </h3>
            </div>
        </section>
        <section class="section ui-sortable-handle">
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-content">
                            <div class="subtitle">
                              <p>We understand from years of clinical practice the complexities of obtaining adequate consent, the time this can take, and the barriers to patient understanding. Additionally, we are acutely aware of the medicolegal risks associated with inadequate consent and the need to protect ourselves as clinicians, as well as our patients. </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="section ui-sortable-handle bg-grey">
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-actions" style="display: none;">
                            <button class="button page-action is-circle is-primary is-outlined tooltip"
                                    data-tooltip="Edit Content" data-action="edit" data-toggle="modal"
                                    data-modal-id="#edit-content">
                            <span class="icon is-small">
                                <i class="fa fa-edit"></i>
                            </span>
                            </button>
                            <button class="button page-action is-circle is-primary is-outlined tooltip"
                                    data-tooltip="Remove Column" data-action="remove">
                            <span class="icon is-small">
                                <i class="fa fa-trash"></i>
                            </span>
                            </button>
                        </div>
                        <div class="column-content"><h2 class="title is-spaced is-bold has-tint"
                                                        style="text-align: left;">Dr Rebecca Saunderson — CEO</h2>
                            <div class="subtitle">
                                <p style="text-align: left;">Rebecca is a practicing dermatologist, researcher, lecturer and entrepreneur, working in both public and private sectors. After completing her physicians training at Royal Prince Alfred Hospital, she studied her MPhil at the University of Cambridge on a prestigious Gates Cambridge Scholarship, where she undertook a course at the Judge Business School. She met her Cofounder, Dr Julia Rhodes, in East Timor where they worked together to eradicate scabies in a remote village.

                                    She is passionate about improving the patient journey through the healthcare system, and changing medical consent for the better. Rebecca has published in local and international journals. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section ui-sortable-handle bg-grey">
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-actions" style="display: none;">
                            <button class="button page-action is-circle is-primary is-outlined tooltip"
                                    data-tooltip="Edit Content" data-action="edit" data-toggle="modal"
                                    data-modal-id="#edit-content">
                            <span class="icon is-small">
                                <i class="fa fa-edit"></i>
                            </span>
                            </button>
                            <button class="button page-action is-circle is-primary is-outlined tooltip"
                                    data-tooltip="Remove Column" data-action="remove">
                            <span class="icon is-small">
                                <i class="fa fa-trash"></i>
                            </span>
                            </button>
                        </div>
                        <div class="column-content"><h2 class="title is-spaced is-bold has-tint"
                                                        style="text-align: left;">Dr Julia Rhodes — CEO</h2>
                            <div class="subtitle">
                                <p style="text-align: left;">Julia is a practising dermatologist and Cofounder of Consentic. She has a passion for advancing healthcare through evidence-based innovation in technology, and in doing so, improving the healthcare experience for patients. Through her experience over more than 10 years of clinical practice, Julia has accumulated a comprehensive understanding of the unique challenges associated with medical consent.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section ui-sortable-handle bg-grey">
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-actions" style="display: none;">
                            <button class="button page-action is-circle is-primary is-outlined tooltip"
                                    data-tooltip="Edit Content" data-action="edit" data-toggle="modal"
                                    data-modal-id="#edit-content">
                            <span class="icon is-small">
                                <i class="fa fa-edit"></i>
                            </span>
                            </button>
                            <button class="button page-action is-circle is-primary is-outlined tooltip"
                                    data-tooltip="Remove Column" data-action="remove">
                            <span class="icon is-small">
                                <i class="fa fa-trash"></i>
                            </span>
                            </button>
                        </div>
                        <div class="column-content"><h2 class="title is-spaced is-bold has-tint"
                                                        style="text-align: left;">Prem Matthew — Intern</h2>
                            <div class="subtitle">
                                <p style="text-align: left;">Prem is in the midst of completing his degree in Biomedical Engineering and Medical Science at the University of Sydney. Through his education he has gained experience in a clinician collaboration project, which went on to win the 2018 MedTech Innovation Competition held at Westmead Hospital. Prem is passionate about implementing human centric design and innovation in the medical industry to optimise patient outcomes, and their experience with the healthcare system.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section ui-sortable-handle bg-grey">
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-actions" style="display: none;">
                            <button class="button page-action is-circle is-primary is-outlined tooltip"
                                    data-tooltip="Edit Content" data-action="edit" data-toggle="modal"
                                    data-modal-id="#edit-content">
                            <span class="icon is-small">
                                <i class="fa fa-edit"></i>
                            </span>
                            </button>
                            <button class="button page-action is-circle is-primary is-outlined tooltip"
                                    data-tooltip="Remove Column" data-action="remove">
                            <span class="icon is-small">
                                <i class="fa fa-trash"></i>
                            </span>
                            </button>
                        </div>
                        <div class="column-content"><h2 class="title is-spaced is-bold has-tint"
                                                        style="text-align: left;">Andrew Drake - CTO</h2>
                            <div class="subtitle">
                                <p style="text-align: left;">Andrew is Consentic’s Chief Technology Officer. With extensive experience across all aspects of web technology, he brings technical expertise, design skills, software engineering and technical innovation to Consentic. Andrew understands the importance of technology leadership in advancing the health care sector and excels at delivering secure and robust technology solutions to help solve pressing health issues.

                                    After completing a degree in Economics at the University of Sydney, majoring in Finance and Computer Science, Andrew went on to work in investment banking technology on large scale projects. He has worked in Silicon Valley and has been involved in projects driving technology to the limits while meeting business operational requirements and goals.

                                    With a career spanning 20 years from small to large enterprise technical projects across a number of industries, he brings a wealth of expertise and knowledge to help best utilise the application of technology to improve the patient and doctor experience.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section ui-sortable-handle bg-grey" style="padding-bottom: 55px">
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <div class="column-actions" style="display: none;">
                            <button class="button page-action is-circle is-primary is-outlined tooltip"
                                    data-tooltip="Edit Content" data-action="edit" data-toggle="modal"
                                    data-modal-id="#edit-content">
                            <span class="icon is-small">
                                <i class="fa fa-edit"></i>
                            </span>
                            </button>
                            <button class="button page-action is-circle is-primary is-outlined tooltip"
                                    data-tooltip="Remove Column" data-action="remove">
                            <span class="icon is-small">
                                <i class="fa fa-trash"></i>
                            </span>
                            </button>
                        </div>
                        <div class="column-content"><h2 class="title is-spaced is-bold has-tint"
                                                        style="text-align: left;">Arooj Sheikh</h2>
                            <div class="subtitle">
                                <p style="text-align: left;">Arooj is Consentic’s lead animation developer, supervising a team of experienced animators at Mavrick Studios. He has years of experience in animation, video creation and copywriting across a range of industries, and prides himself on conveying information simply and effectively using high quality graphics. He is passionate about using the power of animations to effectively convey information and improve communication.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection