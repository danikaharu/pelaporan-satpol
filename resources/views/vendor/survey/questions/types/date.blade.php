@component('survey::questions.base', compact('question'))
    <input type="text" name="{{ $question->key }}" id="{{ $question->key }}"
        class="form-control @error($question->key)
    is-invalid
@enderror datepicker"
        {{ $disabled ?? false ? 'disabled' : '' }}>
@endcomponent
