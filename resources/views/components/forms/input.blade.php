@props(
    ['type' => 'text' , 'id' => null ,'name' => 'NAME' ,'label' => 'LABEL' , 'cols' => 'col-md-6 col-12'] 
)

<div class="{{ $cols }}">
    <div class="form-group">
        <label for="{{ $id ?? $name }}">{{ $label ?? $name }}</label>
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            {{ $attributes->merge(['class' => 'form-control']) }}
            id="{{ $id ?? $name }}"
            aria-describedby="{{ $id ?? $name }}"
            {{ $attributes }}
        />
    </div>
</div>