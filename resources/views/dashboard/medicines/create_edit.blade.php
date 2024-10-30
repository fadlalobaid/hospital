@extends("layout.dashboard")
@section('title')
Department - {{ isset($medicine)?'Edit':'Create' }}
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('medicines.index') }}" class="text-success">Medicine</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ isset($medicine)?'Edit':'Create' }}</li>

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
            <a class="nav-link btn btn-outline-success create-new-button" id="createbuttonDropdown"  aria-expanded="false" href="{{ route('medicines.index') }}">Medicines</a>
            </div>
            <form action="{{isset($medicine)? route('medicines.update',$medicine->id):route('medicines.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf

                @if(isset($medicine))
                @method('PUT')
                @endif

                <div class="form-group">
                    <x-form.input type="text" name="medicine_name" placeholder="Name medicine" lable="Name Medicine" value="{{ old('medicine_name', $medicine->medicine_name ?? '') }}" />

                </div>


                <div class="form-group ">
                    <x-form.input type="date" lable="date_created" name="date_created" placeholder="date_created" value="{{ old('date_created',$medicine->date_created??'') }}"/>

                </div>
                <div class="form-group ">
                    <x-form.input type="date" lable="date_end" name="date_end" placeholder="date_end" value="{{ old('date_end',$medicine->date_end??'') }}"/>

                </div>

                <div class="form-group ">
                    <x-form.input type="text" lable="manufacturer" name="manufacturer" placeholder="manufacturer" value="{{ old('manufacturer',$medicine->manufacturer??'') }}"/>

                </div>

                <div class="form-group ">
                    <x-form.input type="number" lable="quantity" name="quantity" placeholder="quantity" value="{{ old('quantity',$medicine->quantity??'') }}"/>

                </div>
                <div class="form-group ">
                    <x-form.input type="number" lable="price" name="price" placeholder="price" value="{{ old('price',$medicine->price??'') }}"/>

                </div>





                <button type="submit" class="btn btn-primary me-2">
                  {{ isset($medicine)?'Edit':'ADD' }}
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
{{-- --}}
