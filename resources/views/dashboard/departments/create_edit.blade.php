@extends("layout.dashboard")
@section('title')
Department - {{ isset($department)?'Edit':'Create' }}
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page"> <a href="{{ route('departemnts.index') }}" class="text-success">Department</a> </li>
<li class="breadcrumb-item active" aria-current="page">{{ isset($department)?'Edit':'Create' }}</li>

@endsection
@section('content')


<div class="col-12 grid-margin stretch-card">
    <div class="card">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ol type="1">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach

            </ol>
        </div>
        @endif
        <div class="card-body">
            <h3 class="d-inline">Departmet</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('departemnts.index') }}" class="btn btn-success fs-5">
                   Department
                </a>
            </div>

            <form action="{{ isset($department)?route('departemnts.update',$department->id):route('departemnts.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf
                @if(isset($department))
                @method('PUT')
                @endif

                <div class="form-group">
                    <x-form.input type="text" name="name" placeholder="Name Department" lable="Name Patient" value="{{ old('name', $department->id?? '') }}" />

                </div>

                <div class="form-group ">
                    <x-form.textarea label="description" name="description" rows="10" cols="30" />

                </div>





                <div class="form-group m-2">
                    <x-form.radio name="status" :options="[
                     'active' => 'active',
                     'inactive' => 'inactive',
                      ]" checked="active" />
                </div>


                <button type="submit" class="btn btn-primary me-2">
                    {{ isset($department)?'Edit':'ADD' }}
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
{{-- --}}
