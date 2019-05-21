@switch ($question->type)
    @case('boolean')
    Yes / No
    @break
    @case('multiple')
    @foreach($question->answers as $answer)
         - {{ $answer->text }}<br />
    @endforeach
    @break
@endswitch