@extends("layout.dashboard")
@section('title')
Patients - Create
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
            <a class="nav-link btn btn-success create-new-button mb-3" id="createbuttonDropdown" data-bs-toggle="dropdown" aria-expanded="false" href="{{ route('patients.index') }}">Patients</a>

            <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf



                <div class="form-group">
                    <x-form.input type="text" name="name" placeholder="Name Patient" lable="Name Patient" value=""/>
                    {{--  <label for="exampleInputName1">Name</label>
                    <input type="text" name="name" id="exampleInputName1" placeholder="Name" class="form-control
                    @error('name')
                     is-invalid
                    @enderror
                    ">
                    @if ($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                    @endif  --}}
                </div>



                <div class="form-group">

                    <x-form.input type="date" name="birthday" placeholder="birthday" lable="birthday" value=""/>

                </div>

                <div class="form-group">

                    <x-form.input type="number" name="number_phone" placeholder="Number Phone" lable="Number Phone" value=""/>

                </div>

                <div class="form-group">
                    <x-form.input type="email" name="email" placeholder="Email" lable="Emali" value=""/>

                </div>




                <div class="form-group">
                    <label for="exampleSelectGender">Gender</label>
                    <x-form.radio name="gender" :options="[
                'male' => 'male',
                'female' => 'female',
             ]" checked="female" />
                </div>


                <button type="submit" class="btn btn-primary me-2">
                    ADD
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
{{-- --}}
