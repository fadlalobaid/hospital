@extends("layout.dashboard")
@section('title')
report - {{ isset($report)?'Edit':'Create' }}
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('reports.index') }} " class="text-success">Report</a> </li>
<li class="breadcrumb-item active" aria-current="page">{{ isset($report)?'Edit':'Create' }}</li>

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
            <h4 class="card-title">Add report</h4>
            <div class="d-grid gap-2 col-6 mx-auto">
                <a class="nav-link btn btn-outline-success create-new-button mb-3" id="createbuttonDropdown" aria-expanded="false" href="{{ route('reports.index') }}">report</a>
            </div>
            <form action="{{ isset($report)?route('reports.update',$report->id):route('reports.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf
                @if(isset($report))

                @method('PUT')
                @endif

                <div class="form-group">
                    <label>Doctor:</label>
                    <select name="doctor_id" class="form-control">
                        @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" @selected(old('doctor_id', $report->doctor_id ?? '') == $doctor->id)>
                            {{ $doctor->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Patient:</label>
                    <select name="patient_id" class="form-control">
                        @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}" @selected(old('patient_id', $report->patient_id ?? '') == $patient->id)>
                            {{ $patient->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <x-form.input type="date" name="date_report" placeholder="Report Date" lable="Report Date :" value="{{ old('date_report', $report->date_report ?? '') }}" />
                </div>
                <div class="form-group">
                    <x-form.input type="time" name="time_report" placeholder="Report time" lable="Report time :" value="{{ old('time_report', $report->time_report ?? '') }}" />
                </div>

                <div class="form-group ">
                    <x-form.textarea label="Report" name="report" rows="10" cols="30" />

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
