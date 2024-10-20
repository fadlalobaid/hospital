@extends("layout.dashboard")
@section('title')
Department - {{ isset($nurse)?'Edit':'Create' }}
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
            <a class="nav-link btn btn-outline-success create-new-button" id="createbuttonDropdown"  aria-expanded="false" href="{{ route('nurses.index') }}">Nurses</a>
            </div>
            <form action="{{isset($nurse)? route('nurses.update',$nurse->id):route('nurses.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf

                @if(isset($nurse))
                @method('PUT')
                @endif

                <div class="form-group">
                    <x-form.input type="text" name="name" placeholder="Name Nurse" lable="Name Patient" value="{{ old('name', $nurse->name ?? '') }}" />

                </div>

                <div class="form-group">
                    <label>Department</label>
                    <select name="department_id" class="form-control">
                        @foreach ($departments as $department)
                        <option  value="{{ $department->id }}" @selected(old('department_id', $nurse->department_id ?? '') == $department->id)>
                            {{ $department->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group ">
                    <x-form.input type="date" name="birthday" placeholder="birthday" lable="BirthDay" value="{{ old('birthday',$nurse->birthday ??'') }}"/>

                </div>

                <div class="form-group ">
                    <x-form.input type="email" lable="Email" name="email" placeholder="Email@example.com" value="{{ old('email',$nurse->email??'') }}"/>

                </div>
                <div class="form-group ">
                    <x-form.input type="number" lable="Hours Work" name="hours_work" placeholder="1,2,3,4" value="{{ old('hours_work',$nurse->hours_work??'') }}"/>

                </div>





                <div class="form-group m-2">
                    <x-form.radio name="gander" :options="[
                     'male' => 'male',
                     'female' => 'female',
                      ]" checked="male" />
                </div>


                <button type="submit" class="btn btn-primary me-2">
                  {{ isset($nurse)?'Edit':'ADD' }}
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
{{-- --}}
