@props(['type'])
 @if (session()->has($type))
<div class="alert alert-{{$type}} p-2 m-4 text-center alert-dismissible">
    {{ session($type) }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>
@endif
