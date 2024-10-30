@props([
    'name',
    'route'
])
<li class="breadcrumb-item active" aria-current="page"> <a href="{{ route($route) }}" class="text-success">{{ $name }}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ isset($name)?'Edit':'Create' }}</li>

{{-- --}}
