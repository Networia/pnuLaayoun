@props(
    ['type' => 'text', 'id' => null, 'last' => null, 'name' => 'NAME', 'htmlname' => null, 'dataname' => null, 'label' => 'LABEL', 'cols' => 'col-md-6 col-12'] 
)

@php
    $defClass = 'form-control';
    $lastValue = null;
    $dataName = ($dataname ?? $name);

    if (isset($last?->$dataName)) {
        $lastValue = $last?->$dataName;
    }
@endphp

@error(($htmlname ?? $name))
    @php
        $defClass .= ' is-invalid';
    @endphp
@enderror

<div class="form-group {{ $cols }}">
    <label class="form-label" for="{{ $id ?? ($htmlname ?? $name) }}">{{ $label ?? ($htmlname ?? $name) }}</label>
    <input
        type="{{ $type }}"
        name="{{ $htmlname ?? ($htmlname ?? $name) }}"
        {{ $attributes->merge(['class' => $defClass ]) }}
        value="{{ old(($htmlname ?? $name)) ?? $lastValue }}" 
        id="{{ $id ?? ($htmlname ?? $name) }}"
        aria-describedby="{{ $id ?? ($htmlname ?? $name) }}"
        {{ $attributes }}
    />
    @error(($htmlname ?? $name))
        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
    @enderror
</div>
