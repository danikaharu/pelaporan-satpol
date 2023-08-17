@component('survey::questions.base', compact('question'))
    <select name="{{ $question->key }}" id="{{ $question->key }}"
        class="form-control @error($question->key)
        is-invalid
    @enderror select2">
        <option value="" selected>-- Pilih {{ $question->content }} --</option>
        @foreach ($question->options as $option)
            <option value="{{ $option }}">
                {{ $option }}
                {{ $disabled ?? false ? 'disabled' : '' }}
            </option>
        @endforeach
    </select>
@endcomponent
