<section class="section-modal">
    <div class="container-fluid">
        @foreach($consent->questions()->where('archived',0)->get()  as $question)
            <p class="question-label" style="margin-bottom: 10px">{{ $question->text }}<br />
                <span> @include('app.consent.partial.question-type',[
                    'question' => $question
                ])</span>
            </p>
                <hr >
        @endforeach
            @foreach($consent->patientQuestions()->where('archived',0)->get() as $question)
                <p class="question-label" style="margin-bottom: 10px">{{ $question->text }}<br />
                    <span>@include('app.consent.partial.question-type', [
                    'question' => $question
                ])</span>
                </p>
                <hr >
            @endforeach
    </div>
</section>