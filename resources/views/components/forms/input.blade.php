@props(
    ['type' => 'text', 'id' => null, 'last' => null, 'name' => 'NAME', 'label' => 'LABEL', 'cols' => 'col-md-6 col-12'] 
)

@php
    $defClass = 'form-control';
    $lastValue = null;

    if (isset($last?->$name)) {
        $lastValue = $last?->$name;
    }
@endphp

@error($name)
    @php
        $defClass .= ' is-invalid';
    @endphp
@enderror

<div class="form-group {{ $cols }}">
    <label class="form-label" for="{{ $id ?? $name }}">{{ $label ?? $name }}</label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        {{ $attributes->merge(['class' => $defClass ]) }}
        value="{{ old($name) ?? $lastValue }}" 
        id="{{ $id ?? $name }}"
        aria-describedby="{{ $id ?? $name }}"
        {{ $attributes }}
    />
    @error($name)
        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
    @enderror
</div>
