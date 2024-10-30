@extends("layout.dashboard")
@section('title')
Patients - {{ isset($patient)?'Edit':'Create' }}
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page"> <a href="{{ route('patients.index') }}" class="text-success">Patient</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ isset($patient)?'Edit':'Create' }}</li>

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
            <h4 class="card-title">Add Patients</h4>
            <div class="d-grid gap-2 col-6 mx-auto">
            <a class="nav-link btn btn-outline-success create-new-button mb-3" id="createbuttonDropdown"  aria-expanded="false" href="{{ route('patients.index') }}">Patients</a>
            </div>
            <form action="{{ isset($patient)?route('patients.update',$patient->id):route('patients.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
             @csrf
             @if(isset($patient))

             @method('PUT')
             @endif

             <div class="form-group">
                <x-form.input type="text" name="name" placeholder="Name patient" lable="Name patient" value="{{ old('name', $patient->name ?? '') }}" />

            </div>

            <div class="form-group">
                <label>User</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" @selected(old('user_id', $doctor->user_id ?? '') == $user->id)>
                        {{ $user->type }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Department</label>
                <select name="department_id" class="form-control">
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}" @selected(old('department_id', $patient->department_id ?? '') == $department->id)>
                        {{ $department->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <x-form.input type="date" name="birthday" placeholder="Birth Date" lable="Birth Date :" value="{{ old('birthday', $patient->birthday ?? '') }}" />
            </div>
            <div class="form-group">
                <x-form.input type="email" name="email" placeholder="Email" lable="Email:" value="{{ old('email', $patient->email ?? '') }}" />

            </div>
            <div class="form-group">
                <x-form.input type="number" name="phone" placeholder="Phone Number" lable="Phone Number:" value="{{ old('phone', $patient->phone ?? '') }}" />

            </div>
            <div class="form-group">
                <label for="">Country</label>
                <select name="country" class="form-control">
                    @foreach ($countries as $code => $name)
                        <option value="{{ $code }}">
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <x-form.input type="text" name="city" placeholder="city" lable="City:" value="{{ old('city', $patient->city ?? '') }}" />

            </div>
            <div class="form-group">
                <x-form.input type="text" name="street" placeholder="Street" lable="Street:" value="{{ old('phone', $patient->phone ?? '') }}" />

            </div>

            <div class="form-group">
                <label for="exampleSelectGender">Gender</label>
                <x-form.radio name="gander" :options="[
                 'male' => 'male',
                 'female' => 'female',
                ]" checked="female" />
            </div>
                <button type="submit" class="btn btn-primary me-2">
                    {{ isset($patient)?'Edit':'ADD' }}
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
{{-- --}}
