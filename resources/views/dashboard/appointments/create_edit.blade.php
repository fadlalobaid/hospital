@extends("layout.dashboard")
@section('title')
Appointment - {{ isset($appointment)?'Edit':'Create' }}
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page"> <a href="{{ route('departemnts.index') }}" class="text-success">appointment</a> </li>
<li class="breadcrumb-item active" aria-current="page">{{ isset($appointment)?'Edit':'Create' }}</li>

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
            <h3 class="d-inline">Appointment</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('appointments.index') }}" class="btn btn-success fs-5">
                    appointment
                </a>
            </div>
            <form action="{{isset($appointment)? route('appointments.update',$appointment->id):route('appointments.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf

                @if(isset($appointment))
                @method('PUT')
                @endif

                <div class="form-group">
                    <label>Department</label>
                    <select name="department_id" class="form-control">
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}" @selected(old('department_id', $appointment->department_id ?? '') == $department->id)>
                            {{ $department->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Doctor</label>
                    <select name="doctor_id" class="form-control">
                        @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" @selected(old('doctor_id', $appointment->doctor_id ?? '') == $department->id)>
                            {{ $doctor->name }}
                        </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label>patient</label>
                    <select name="patient_id" class="form-control">
                        @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}" @selected(old('patient_id', $appointment->patient_id ?? '') == $department->id)>
                            {{ $patient->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <x-form.input type="time" name="time_appointment" placeholder="time" lable="Time" value="{{ old('time_appointment', $appointment->time_appointment ?? '') }}" />
                </div>
                <div class="form-group">
                    <x-form.input type="date" name="date_appointment" placeholder="Date Appointment" lable="Date Appointment" value="{{ old('date_appointment', $appointment->date_appointment ?? '') }}" />
                </div>

                <div class="form-group ">
                    <x-form.textarea label="notes" name="notes" rows="10" cols="30" />

                </div>





                <div class="form-group m-2">
                    <x-form.radio name="status" :options="[
                    'confirmed'=>'confirmed',
                    'pending'=>'pending',
                    'cancelled'=>'cancelled',
                    
                      ]" checked="pending" />
                </div>


                <button type="submit" class="btn btn-primary me-2">
                    {{ isset($appointment)?'Edit':'ADD' }}
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
{{-- --}}
