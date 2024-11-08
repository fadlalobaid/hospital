@extends("layout.dashboard")
@section('title')
Department - {{ isset($doctor)?'Edit':'Create' }}
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page"> <a href="{{ route('doctors.index') }}" class="text-success">Doctor</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ isset($doctor)?'Edit':'Create' }}</li>

@endsection
@section('content')
{{--    --}}

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
            <h3 class="d-inline">Doctor</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('doctors.index') }}" class="btn btn-success fs-5">
                 Doctor
                </a>
            </div>

            <form action="{{ isset($doctor)?route('doctors.update',$doctor->id):route('doctors.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf

                @if(isset($doctor))
                @method('PUT')
                @endif

                <div class="form-group">
                    <x-form.input type="text" name="name" placeholder="Name Doctor" lable="Name Doctor" value="{{ old('name', $doctor->name ?? '') }}" />
                </div>
                {{--  <div class="form-group">
                    <label>User</label>
                    <select name="user_id" class="form-control">
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}" @selected(old('user_id', $doctor->id ?? '') == $user->id )>
                            {{ $user->type }}
                        </option>
                        @endforeach
                    </select>
                </div>  --}}
                <div class="form-group">
                    <label>Department</label>
                    <select name="department_id" class="form-control">
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}" @selected(old('department_id', $doctor->department_id ?? '') == $department->id)>
                            {{ $department->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <x-form.input type="text" name="specialization" placeholder=" Specialization" lable="Specialization:" value="{{ old('specialization', $doctor->specialization ?? '') }}" />
                </div>
                <div class="form-group">
                    <x-form.input type="date" name="birthday" placeholder="Birth Date" lable="Birth Date :" value="{{ old('birthday', $doctor->birthday ?? '') }}" />
                </div>
                <div class="form-group">
                    <x-form.input type="email" name="email" placeholder="Email" lable="Email:" value="{{ old('email', $doctor->email ?? '') }}" />

                </div>
                <div class="form-group">
                    <x-form.input type="number" name="phone" placeholder="Phone Number" lable="Phone Number:" value="{{ old('phone', $doctor->phone ?? '') }}" />

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
                    {{--  <x-form.input type="text" name="country" placeholder="Country" lable="Country:" value="{{ old('country', $doctor->country ?? '') }}" />  --}}

                </div>
                <div class="form-group">
                    <x-form.input type="text" name="city" placeholder="city" lable="City:" value="{{ old('city', $doctor->city ?? '') }}" />

                </div>
                <div class="form-group">
                    <x-form.input type="text" name="street" placeholder="Street" lable="Street:" value="{{ old('phone', $doctor->phone ?? '') }}" />

                </div>

                <div class="form-group">
                    <label for="exampleSelectGender">Gender</label>
                    <x-form.radio name="gander" :options="[
                     'male' => 'male',
                     'female' => 'female',
                    ]" checked="female" />
                </div>



                <button type="submit" class="btn btn-primary me-2">
                    {{isset($doctor)?'Edit':'ADD'}}
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
{{-- --}}
