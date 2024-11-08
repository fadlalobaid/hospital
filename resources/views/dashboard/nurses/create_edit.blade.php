@extends("layout.dashboard")
@section('title')
Department - {{ isset($nurse)?'Edit':'Create' }}
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('nurses.index') }}" class="text-success">Nurse</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ isset($nurse)?'Edit':'Create' }}</li>

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
            <h3 class="d-inline">Nurse</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('nurses.index') }}" class="btn btn-success fs-5">
                   nurse
                </a>
            </div>
            <form action="{{isset($nurse)? route('nurses.update',$nurse->id):route('nurses.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf

                @if(isset($nurse))
                @method('PUT')
                @endif

                <div class="form-group">
                    <x-form.input type="text" name="name" placeholder="Name Nurse" lable="Name Nurse" value="{{ old('name', $nurse->name ?? '') }}" />

                </div>
                <div class="form-group">
                    <label>Department</label>
                    <select name="department_id" class="form-control">
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}" @selected(old('department_id', $nurse->department_id ?? '') == $department->id)>
                            {{ $department->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <x-form.input type="date" name="birthday" placeholder="Birth Date" lable="Birth Date :" value="{{ old('birthday', $nurse->birthday ?? '') }}" />
                </div>
                <div class="form-group">
                    <x-form.input type="email" name="email" placeholder="Email" lable="Email:" value="{{ old('email', $nurse->email ?? '') }}" />

                </div>
                <div class="form-group">
                    <x-form.input type="number" name="phone" placeholder="Phone Number" lable="Phone Number:" value="{{ old('phone', $nurse->phone ?? '') }}" />

                </div>
                <div class="form-group">
                    <x-form.input type="text" name="country" placeholder="Country" lable="Country:" value="{{ old('country', $nurse->country ?? '') }}" />

                </div>
                <div class="form-group">
                    <x-form.input type="text" name="city" placeholder="city" lable="City:" value="{{ old('city', $nurse->city ?? '') }}" />

                </div>
                <div class="form-group">
                    <x-form.input type="text" name="street" placeholder="Street" lable="Street:" value="{{ old('phone', $nurse->phone ?? '') }}" />

                </div>

                <div class="form-group">
                    <label for="exampleSelectGender">Gender</label>
                    <x-form.radio name="gander" :options="[
                     'male' => 'male',
                     'female' => 'female',
                    ]" checked="female" />
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
