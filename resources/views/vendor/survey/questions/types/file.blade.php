@component('survey::questions.base', compact('question'))
    <div class="custom-file">
        <input type="file" name="{{ $question->key }}" id="{{ $question->key }}"
            class="custom-file-input @error($question->key)
        is-invalid
    @enderror"
            {{ $disabled ?? false ? 'disabled' : '' }}>
        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
    </div>
@endcomponent
