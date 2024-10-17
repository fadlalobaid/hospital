@props([
'name',
'options',
'ckecked'=>null
])
@if ($name)
<label for="">{{ $name }}</label>
@endif

@foreach ($options as $value=>$lable)
<div class="form-check">
    <input class="form-check-input" type="radio" name="{{ $name }}" id="flexRadioDefault1" value="{{ $value }}"
    {{ old($name,$ckecked)==$value? 'checked':''}}>
    <label class="form-check-label" for="flexRadioDefault1">
        {{ $lable }}
    </label>
</div>
@endforeach
