<div class="field m-b-lg">
    <label class="label">{{ $consentRequestQuestion->consentRequestQuestionable->text }}</label>
    <div class="control">
        @switch ($consentRequestQuestion->consentRequestQuestionable->type)

            @case('boolean')

            <div
                    @if ($consentRequestQuestionAnswer)
                    class="select is-medium is-fullwidth {{ $answer->isAnswerCorrect ? 'is-success' : 'is-danger' }}"
                    @else
                    class="select is-medium is-fullwidth"
                    @endif
            >
                <select class="patient-input"
                        name="question[{{ $consentRequestQuestion->id }}]" {{ ($consentRequest->isSigned()) ? 'disabled' : '' }}>
                    <option disabled selected>Select Answer</option>
                    <option
                            @if ($consentRequestQuestionAnswer)
                            {{ ($answer->userAnswerText === 'Yes') ? 'selected' : '' }}
                            @endif
                            value="Yes">Yes
                    </option>
                    <option
                            @if ($consentRequestQuestionAnswer)
                            {{ ($answer->userAnswerText === 'No') ? 'selected' : '' }}
                            @endif
                            value="No">No
                    </option>
                </select>
            </div>

            @break

            @case('multiple')

            <div
                    @if ($consentRequestQuestionAnswer)
                    class="select is-medium is-fullwidth {{ $answer->isAnswerCorrect ? 'is-success' : 'is-danger' }}"
                    @else
                    class="select is-medium is-fullwidth"
                    @endif
            >
                <select class="patient-input"
                        name="question[{{ $consentRequestQuestion->id }}]" {{ ($consentRequest->isSigned()) ? 'disabled' : '' }}>
                    <option disabled selected>Select Answer</option>
                    @foreach($consentRequestQuestion->consentRequestQuestionable->answers as $answer)
                        <option
                                @if ($consentRequestQuestionAnswer)
                                {{ ($answer->userAnswerText === 'Yes') ? 'selected' : '' }}
                                @endif
                                value="{{ $answer->id }}">{{ $answer->text }}
                        </option>
                    @endforeach
                </select>
            </div>

            @break

        @endswitch
    </div>
</div>