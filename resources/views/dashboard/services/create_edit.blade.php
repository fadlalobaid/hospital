@extends("layout.dashboard")
@section('title')
report - {{ isset($service)?'Edit':'Create' }}
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('services.index') }} " class="text-success">service</a> </li>
<li class="breadcrumb-item active" aria-current="page">{{ isset($service)?'Edit':'Create' }}</li>

@endsection
@section('content')

<div class="col-lg-12 grid-margin stretch-card">

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
        <div class="card-body m-2">
            <h3 class="d-inline">service</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('services.index') }}" class="btn btn-success fs-5">
                    service
                </a>
            </div>
            <form action="{{ isset($service)?route('services.update',$service->id):route('services.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf
                @if(isset($service))

                @method('PUT')
                @endif

                <div class="form-group">
                    <label>Department:</label>
                    <select name="department_id" class="form-control">
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}" @selected(old('department_i', $service->department_id ?? '') == $department->id)>
                            {{ $department->name }}
                        </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <x-form.input type="text" name="service_name" placeholder="Service Name" lable="Service:" value="{{ old('service_name', $service->service_name ?? '') }}" />
                </div>
                <div class="form-group">
                    <x-form.input type="number" name="service_charge" placeholder="Service Charge" lable="Service Charge:" value="{{ old('service_charge', $service->service_charge ?? '') }}" />
                </div>
                <div class="form-group">
                    <x-form.input type="number" name="Doctor_commission" placeholder="Doctor Commission" lable="Doctor Commission:" value="{{ old('Doctor_commission', $service->Doctor_commission ?? '') }}" />
                </div>

                <div class="form-group ">
                    <x-form.textarea label="Discription" name="discription" rows="10" cols="30" />

                </div>

                <button type="submit" class="btn btn-primary me-2">
                    {{ isset($report)?'Edit':'ADD' }}
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
{{-- --}}
