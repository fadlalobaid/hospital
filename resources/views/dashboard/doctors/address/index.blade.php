@extends("layout.dashboard")
@section('title')
Doctors - Address -edit
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
            <h4 class="card-title"> Doctor Address</h4>
            <div class="d-grid gap-2 col-6 mx-auto">
                <a class="nav-link btn btn-outline-success create-new-button" id="createbuttonDropdown" aria-expanded="false" href="{{ route('doctors.index') }}">Doctors</a>
            </div>
            <form action="{{    route('d.address.update') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf

                {{-- @if(isset($doctor))
                @method('PUT')
                @endif  --}}



                <div class="form-group">
                    <label>Country</label>
                    <select name="country" class="form-control">
                        @foreach ($countries as $code =>$name)
                        <option value="{{ $code}}" {{ $doctor->addressD->name ==$code ?'selected':'' }}>
                            {{ $name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <x-form.input type="text" name="city" placeholder="city" lable="City" value="{{ old('city', $doctor->addressD->city ?? '') }}" />

                </div>


                <div class="form-group">
                    <x-form.input type="text" name="home" placeholder="home" lable="home:" value="{{ old('home', $doctor->addressD->home ?? '') }}" />


                </div>


                <div class="btn btn-success">
                    save
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
{{-- --}}
