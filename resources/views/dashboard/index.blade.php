@extends('layout.dashboard')
@section('title')
hospital
@endsection
@section('breadcrumbs')
@parent

<li class="breadcrumb-item active" aria-current="page">index</li>

@endsection
@section('content')

<div class="container text-center">

    <div class="row">
        <div class=" bg-info  bg-opacity-10  card col m-2 border border-success-subtle rounded" style="width: 18rem;">
            <i class="mdi mdi-hospital-building fs-1"></i>
            <div class="card-body">
                <h5 class="card-title">DEPARTMENT</h5>
                <p class="card-text">Managing the departments in the hospital</p>
                <a href="{{ route('departemnts.index') }}" class="btn btn-inverse-success">Click here</a>
            </div>
        </div>

        <div class=" bg-info  bg-opacity-10  card col m-2 border border-success-subtle rounded" style="width: 18rem;">
            <i class="mdi mdi-doctor fs-1"></i>
            <div class="card-body">
                <h5 class="card-title">DOCTORS</h5>
                <p class="card-text">Managing the doctors present in the hospital</p>
                <a href="{{ route('doctor.index') }}" class="btn btn-inverse-success">Click here</a>
            </div>
        </div>

        <div class=" bg-info  bg-opacity-10  card col m-2 border border-success-subtle rounded" style="width: 18rem;">
            <i class="mdi mdi-account-multiple fs-1"></i>
            <div class="card-body">
                <h5 class="card-title">PATIENTS</h5>
                <p class="card-text">Managing patients in the hospital</p>
                <a href="{{ route('patients.index') }}" class="btn btn-inverse-success">Click here</a>
            </div>
        </div>
    </div>


    <div class="row">

        <div class=" bg-info  bg-opacity-10  card col m-2 border border-success-subtle rounded" style="width: 18rem;">
            <i class="mdi mdi-account-multiple fs-1"></i>
            <div class="card-body">
                <h5 class="card-title">NURSE</h5>
                <p class="card-text">Managing the nurses present in the hospital</p>
                <a href="{{ route('nurses.index') }}" class="btn btn-inverse-success">Click here</a>
            </div>
        </div>

        <div class=" bg-info  bg-opacity-10  card col m-2 border border-success-subtle rounded" style="width: 18rem;">
            <i class="mdi mdi-briefcase-plus fs-1"></i>
            <div class="card-body">
                <h5 class="card-title">MEDICINE</h5>
                <p class="card-text">Managing medications in the hospital</p>
                <a href="{{ route('medicines.index') }}" class="btn btn-inverse-success">Click here</a>
            </div>
        </div>

        <div class=" bg-info  bg-opacity-10  card col m-2 border border-success-subtle rounded" style="width: 18rem;">
            <i class="mdi mdi-file-document-box fs-1"></i>
            <div class="card-body">
                <h5 class="card-title">PRESCRIPTION</h5>
                <p class="card-text">Managing prescriptions in the hospital</p>
                <a href="{{ route('prescriptions.index') }}" class="btn btn-inverse-success">Click here</a>
            </div>
        </div>
    </div>


    <div class="row">

        <div class=" bg-info  bg-opacity-10  card col m-2 border border-success-subtle rounded" style="width: 18rem;">
            <i class="mdi mdi-note fs-1"></i>
            <div class="card-body">
                <h5 class="card-title">REPORT</h5>
                <p class="card-text">Managing reports in the hospital</p>
                <a href="{{ route('reports.index') }}" class="btn btn-inverse-success">Click here</a>
            </div>
        </div>

        <div class=" bg-info  bg-opacity-10  card col m-2 border border-success-subtle rounded" style="width: 18rem;">
            <i class="mdi mdi-buffer fs-1"></i>
            <div class="card-body">
                <h5 class="card-title">SERVICE</h5>
                <p class="card-text">Managing services in the hospital</p>
                <a href="{{ route('services.index') }}" class="btn btn-inverse-success">Click here</a>
            </div>
        </div>

        <div class=" bg-info  bg-opacity-10  card col m-2 border border-success-subtle rounded" style="width: 18rem;">
            <i class="mdi mdi-calendar-multiple fs-1 "></i>
            <div class="card-body">
                <h5 class="card-title">APPOINTMENTS</h5>
                <p class="card-text">Management of booking appointments in the hospital</p>
                <a href="{{ route('appointments.index') }}" class="btn btn-inverse-success">Click here</a>
            </div>
        </div>
    </div>

</div>

@endsection
{{-- --}}
