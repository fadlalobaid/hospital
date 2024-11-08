@extends("layout.dashboard")
@section('title')
Doctors - index
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page">Doctor</li>
<li class="breadcrumb-item active" aria-current="page">index</li>

@endsection
@section('content')
{{-- --}}

<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">
        {{-- filter  --}}
        <form action="{{ URL::current() }}" class="row g-3 m-3">
            <div class="form-group col-auto">
                <x-form.input type="text" name="name" placeholder="Name Doctor" :value="request('name')" />
            </div>
            <div class="form-group col-auto">
                <x-form.input type="text" name="specialization" placeholder="specialization" :value="request('specialization')" />
            </div>
            <div class="form-group col-auto">
                <x-form.input type="text" name="country" placeholder="country" :value="request('country')" />
            </div>

            <div class="form-group col-auto">

                <select name="gander" id="" class="form-control">
                    <option value="">Gander</option>
                    <option value="male" @selected(request('gander')=='male' )>male</option>
                    <option value="female" @selected(request('gander')=='female' )>female</option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-secondary  col-auto m-3">Filter</button>
        </form>

        <x-alert type="success" />
        <x-alert type="info" />
        <x-alert type="danger" />
        <div class="card-body">
            <h3 class="d-inline">Doctors Table</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('doctors.create') }}" class="btn btn-success fs-5">
                    + Add Doctor
                </a>
            </div>
            </p>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Name Doctor</th>
                            <td>Name Department</td>
                            <td>specialization</td>
                            <th> Birth Data </th>
                            <th> Gander </th>
                            <th>Number Phone </th>
                            <th>email </th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Street</th>
                            <th>Reports</th>
                            <th> Satting </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($doctors as $doctor)
                        <tr>
                            <td> {{ $doctor->name }} </td>
                            <td><a href="{{ route('departemnts.index') }}">{{ $doctor->department->name }}</a></td>
                            <td>{{ $doctor->specialization }}</td>
                            <td>{{$doctor->birthday }}</td>
                            <td> {{ $doctor->gander}}</td>
                            <td> {{ $doctor->phone }}</td>
                            <td> {{ $doctor->email }}</td>
                            <td> {{ $doctor->country }}</td>
                            <td> {{ $doctor->city }}</td>
                            <td> {{ $doctor->street }}</td>
                            <td>
                                <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-warning h-25">
                                    <i class="mdi mdi-eye fs-6"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('doctors.edit',$doctor->id) }}" class="btn btn-success m-1">
                                    <i class="mdi mdi-auto-fix"></i>
                                </a>

                                <form action="{{ route('doctors.destroy', $doctor->id) }}" method="post" class="m-1">
                                    @csrf
                                    @method('DELETE')
                                    <Button type="submit" class="btn btn-danger ">
                                        <i class="mdi mdi-backspace"></i>
                                    </Button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <td colspan="4">No Data</td>
                        @endforelse


                    </tbody>
                </table>


            </div>
            <div class="m-2">{{ $doctors->withQueryString() }}</div>
        </div>
    </div>
</div>
@endsection









-----
