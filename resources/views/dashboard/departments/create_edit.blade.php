@extends("layout.dashboard")
@section('title')
Department - {{ isset($department)?'Edit':'Create' }}
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
            <a class="nav-link btn btn-outline-success create-new-button mb-3" id="createbuttonDropdown"  aria-expanded="false" href="{{ route('departemnts.index') }}">Department</a>
            </div>
            <form action="{{isset($department)? route('departemnts.update',$department->id):route('departemnts.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf

                @if(isset($department))
                @method('PUT')
                @endif

                <div class="form-group">
                    <x-form.input type="text" name="name" placeholder="Name Department" lable="Name Patient" value="{{ old('name', $patient->name ?? '') }}" />

                </div>

                <div class="form-group ">
                    <x-form.textarea label="description" name="description" rows="10" cols="30"/>

                </div>





                <div class="form-group m-2">
                    <x-form.radio name="status" :options="[
                     'active' => 'active',
                     'inactive' => 'inactive',
                      ]" checked="active" />
                </div>


                <button type="submit" class="btn btn-primary me-2">
                  {{ isset($department)?'Edit':'ADD' }}
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
{{-- --}}
