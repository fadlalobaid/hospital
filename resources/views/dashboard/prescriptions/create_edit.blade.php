@extends("layout.dashboard")
@section('title')
Prescriptions - {{ isset($prescription)?'Edit':'Create' }}
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page"> <a href="{{ route('prescriptions.index') }}" class="text-success">Prescriptions</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ isset($prescription)?'Edit':'Create' }}</li>

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
            <h4 class="card-title">Basic form elements</h4>
            <div class="d-grid gap-2 col-6 mx-auto">
                <a class="nav-link btn btn-outline-success create-new-button" id="createbuttonDropdown" aria-expanded="false" href="{{ route('prescriptions.index') }}" >prescriptions</a>
            </div>
            <form action="{{isset($prescription)? route('prescriptions.update',$prescription->id):route('prescriptions.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf

                @if(isset($prescription))
                @method('PUT')
                @endif



                <div class="form-group">
                    <label>Doctors</label>
                    <select name="doctor_id" class="form-control">
                        @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" @selected(old('doctor_id', $prescription->doctor_id ?? '') == $doctor->id)>
                            {{ $doctor->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Doctors</label>
                    <select name="patient_id" class="form-control">
                        @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}" @selected(old('patient_id', $prescription->patient_id ?? '') == $patient->id)>
                            {{ $patient->name}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group ">
                    <x-form.input type="text" name="recipe_name" placeholder="recipe_name" lable="recipe_name" value="{{ old('recipe_name',$prescription->recipe_name ??'') }}" />

                </div>

                <div class="form-group ">
                    <x-form.input type="date" lable="recipe_date" name="recipe_date" placeholder="recipe_date" value="{{ old('recipe_date',$prescription->recipe_date??'') }}" />
                </div>
                <div class="form-group ">
                    <x-form.textarea label="instructions" name="instructions" rows="10" cols="30" />

                </div>







                <button type="submit" class="btn btn-primary me-2">
                    {{ isset($prescription)?'Edit':'ADD' }}
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
{{-- --}}
