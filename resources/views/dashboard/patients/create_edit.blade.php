@extends("layout.dashboard")
@section('title')
Patients - {{ isset($patient)?'Edit':'Create' }}
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
                    <x-form.input type="text" name="name" placeholder="Name Patient" lable="Name Patient" value="{{ old('name', $patient->name ?? '') }}" />


                </div>



                <div class="form-group">

                    <x-form.input type="date" name="birthday" placeholder="birthday" lable="birthday" value="{{ old('birthday', $patient->birthday ?? '') }}" />

                </div>

                <div class="form-group">

                    <x-form.input type="number" name="number_phone" placeholder="Number Phone" lable="Number Phone" value="{{ old('number_phone', $patient->number_phone ?? '') }}" />

                </div>

                <div class="form-group">
                    <x-form.input type="email" name="email" placeholder="Email" lable="Emali" value="{{ old('email', $patient->email ?? '') }}" />

                </div>




                <div class="form-group">
                    <label for="exampleSelectGender">Gender</label>
                    <x-form.radio name="gander" :options="[
                    'male' => 'male',
                    'female' => 'female',
                    ]" checked="male" />
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
