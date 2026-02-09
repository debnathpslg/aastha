@php
    $errorKey = str_replace(['[', ']'], ['.', ''], $name);
@endphp

<div class="{{ $colSpan }}">
    <div class="form-group">
        <label class="control-label" for="{{ $name }}">
            @if($required)
                <span class="text-danger">*</span>
            @endif
            {{ $labelCaption }}
        </label>

        <select
            name="{{ $name }}"
            id="{{ $name }}"
            class="form-control {{ $errors->has($errorKey) ? 'is-invalid' : '' }}"
        >
            @foreach($options as $key => $value)
                <option
                    value="{{ $key }}"
                    {{ old($errorKey, $selectedData) == $key ? 'selected' : '' }}
                >
                    {{ $value }}
                </option>
            @endforeach
        </select>

        @error($errorKey)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
