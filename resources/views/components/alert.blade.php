@props(['type'])
 @if (session()->has($type))
<div class="alert alert-{{$type}} p-2 m-4 text-center">
    {{ session($type) }}
</div>
@endif
