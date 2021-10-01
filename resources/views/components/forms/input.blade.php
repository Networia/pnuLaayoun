@props(
    ['type' => 'text' , 'id' => null ,'name' => 'NAME' ,'label' => 'LABEL' , 'cols' => 'col-md-6 col-12'] 
)

@php
    $defClass = 'form-control';

    if (!isset($last)) {
        $last = null;
    }
@endphp

@error($name)
    @php
        $defClass .= ' is-invalid';
    @endphp
@enderror

<div class="{{ $cols }}">
    <div class="form-group">
        <label class="form-label" for="{{ $id ?? $name }}">{{ $label ?? $name }}</label>
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            {{ $attributes->merge(['class' => $defClass ]) }}
            value="{{ old($name) ?? $last?->$name }}" 
            id="{{ $id ?? $name }}"
            aria-describedby="{{ $id ?? $name }}"
            {{ $attributes }}
        />
        @error($name)
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
        @enderror
    </div>
</div>