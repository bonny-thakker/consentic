<div class="field m-b-lg">
    <label class="label">{{ $consentRequestQuestion->consentRequestQuestionable->text }}</label>
    <div class="control">
        @switch ($consentRequestQuestion->consentRequestQuestionable->type)

            @case('boolean')

            <div
                    @if ($consentRequestQuestionAnswer)
                    class="select is-medium is-fullwidth {{ ($consentRequestQuestionAnswer->correct == 1) ? 'is-success' : 'is-danger' }} {{ $errors->has('question['.$consentRequestQuestion->id.']') ? ' is-danger' : '' }}"
                    @else
                    class="select is-medium is-fullwidth {{ $errors->has('question['.$consentRequestQuestion->id.']') ? ' is-danger' : '' }}"
                    @endif
            >
                <select class="patient-input"
                        name="question[{{ $consentRequestQuestion->id }}]" {{ ($consentRequest->isSigned() || isset($isDisabledQuestion)) ? 'disabled' : '' }} >
                    <option selected>Select Answer</option>
                    @foreach($consentRequestQuestion->consentRequestQuestionable->answers as $answer)
                        <option
                                @if(old('question.'.$consentRequestQuestion->id))
                                {{ (old('question.'.$consentRequestQuestion->id) == $answer->id) ? 'selected' : '' }}
                                @elseif ($consentRequestQuestionAnswer)
                                {{ ($consentRequestQuestionAnswer->id == $answer->id) ? 'selected' : '' }}
                                @endif
                                value="{{ $answer->id }}">{{ $answer->text }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('question['.$consentRequestQuestion->id.']'))
                    <p class="help is-danger">{{ $errors->first('question['.$consentRequestQuestion->id.']') }}</p>
                @endif
            </div>

            @break

            @case('multiple')

            <div
                    @if ($consentRequestQuestionAnswer)
                    class="select is-medium is-fullwidth {{ ($consentRequestQuestionAnswer->correct == 1) ? 'is-success' : 'is-danger' }} {{ $errors->has('question['.$consentRequestQuestion->id.']') ? ' is-danger' : '' }}"
                    @else
                    class="select is-medium is-fullwidth {{ $errors->has('question['.$consentRequestQuestion->id.']') ? ' is-danger' : '' }}"
                    @endif
            >
                <select class="patient-input"
                        name="question[{{ $consentRequestQuestion->id }}]" {{ ($consentRequest->isSigned() || isset($isDisabledQuestion)) ? 'disabled' : '' }}>
                    <option selected>Select Answer</option>
                    @foreach($consentRequestQuestion->consentRequestQuestionable->answers as $answer)
                        <option
                                @if(old('question.'.$consentRequestQuestion->id))
                                {{ (old('question.'.$consentRequestQuestion->id) == $answer->id) ? 'selected' : '' }}
                                @elseif ($consentRequestQuestionAnswer)
                                {{ ($consentRequestQuestionAnswer->id == $answer->id) ? 'selected' : '' }}
                                @endif
                                value="{{ $answer->id }}">{{ $answer->text }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('question['.$consentRequestQuestion->id.']'))
                    <p class="help is-danger">{{ $errors->first('question['.$consentRequestQuestion->id.']') }}</p>
                @endif
            </div>

            @break

        @endswitch
    </div>
</div>