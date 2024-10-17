@props([
    'label'=>null,
     'name',
     'rows',
     'cols',
])
@if ($label)
<label for="">{{ $label }}</label>
@endif

<textarea name="{{ $name }}" id="" cols="{{ $cols }}" rows="{{ $rows }}" class="form-control
@error($name)
 is-invalid
@enderror
">
{{ old($name) }}</textarea>
@error($name)
<div class="invalid-feedback">
    {{ $message }}
</div>

@enderror
