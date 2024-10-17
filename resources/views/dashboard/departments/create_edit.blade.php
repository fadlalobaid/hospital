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
            <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-bs-toggle="dropdown" aria-expanded="false" href="{{ route('doctors.index') }}">Add Department</a>

            <form action="{{ route('departemnts.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf

                @if(isset($doctor))
                @method('put')
                @endif

                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" name="name" id="exampleInputName1" placeholder="Name" class="form-control
                    @error('name')
                     is-invalid
                    @enderror
                    ">
                    @if ($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">discription</label>
                    <textarea name="description" placeholder="discription" cols="30" rows="10" class="form-control
                      @error('discription')
                       is-invalid
                         @enderror
                     ">
                    </textarea>
                    @if ($errors->has('discription'))
                    <div class="text-danger">
                        {{ $errors->first('discription') }}
                        @endif
                    </div>
                </div>





                <div class="form-group m-2">
                    <label for="exampleSelectGender">Gender</label>
                    <x-form.radio name="status" :options="[
                'active' => 'active',
                'inactive' => 'inactive',
             ]" checked="active" />
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
