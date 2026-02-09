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

        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ old($errorKey, $receivedData) }}"
            {{ $required ? 'required' : '' }}
            {{ $attributes->merge([
                'class' => 'form-control ' 
                    . $extraClass . " "
                    . ($errors->has($errorKey) ? 'is-invalid' : '')
                ]) 
            }}
        />

        @error($errorKey)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
