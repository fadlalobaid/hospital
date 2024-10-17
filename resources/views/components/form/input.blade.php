@props([
'type',
'name',
'placeholder'=>null,
'lable'=>null,
'value',
])

@if ($lable)
<label for="">{{ $lable }}</label>
@endif




<input type="{{ $type }}" name="{{ $name }}" value="{{ $value ?? old($name)}}" class="form-control

  @error($name)
  is-invalid
  @enderror
"

placeholder="{{ $placeholder }}"

>


@if ($errors->has($name))
<div class="text-danger">
    {{ $errors->first($name) }}
</div>

@endif
