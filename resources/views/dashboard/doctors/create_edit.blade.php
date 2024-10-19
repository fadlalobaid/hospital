@extends("layout.dashboard")
@section('title')
Department - {{ isset($doctor)?'Edit':'Create' }}
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
            <a class="nav-link btn btn-outline-success create-new-button" id="createbuttonDropdown"  aria-expanded="false" href="{{ route('doctors.index') }}">Doctors</a>
            </div>
            <form action="{{ isset($doctor)?route('doctors.update',$doctor->id):route('doctors.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf

                @if(isset($doctor))
                @method('PUT')
                @endif

                <div class="form-group">
                    <x-form.input type="text" name="name" placeholder="Name Doctor" lable="Name Doctor" value="{{ old('name', $doctor->name ?? '') }}" />

                </div>

                <div class="form-group">
                    <label>Department</label>
                    <select name="department_id" class="form-control">
                        @foreach ($departments as $department)
                        <option  value="{{ $department->id }}" @selected(old('department_id', $doctor->department_id ?? '') == $department->id)>
                            {{ $department->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <x-form.textarea label="discription" name="discription" rows="10" cols="30"/>

                </div>

                <div class="form-group">
                    <x-form.input type="text" name="Specialization" placeholder="Specialization" lable="Specialization:" value="{{ old('Specialization', $doctor->Specialization ?? '') }}" />


                </div>

                <div class="form-group">
                    <x-form.input type="email" name="email" placeholder="Email" lable="Email:" value="{{ old('email', $doctor->email ?? '') }}" />

                </div>




                <div class="form-group">
                    <label for="exampleSelectGender">Gender</label>
                    <x-form.radio name="gender" :options="[
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
