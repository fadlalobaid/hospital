@extends("layout.dashboard")
@section('title')
Patients - index
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page">Patients</li>
<li class="breadcrumb-item active" aria-current="page">index</li>

@endsection
@section('content')


<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">
        <div class="m-3 ">
            <form action="{{ URL::current() }}" class="row g-3 m-2 ml-1 ">
                <div class="form-group col-auto">
                    <x-form.input type="text" name="name" placeholder="Name Patient" :value="request('name')" />
                </div>
                <div class="form-group col-auto">
                    <x-form.input type="text" name="country" placeholder="Country" :value="request('country')" />
                </div>

                <div class="form-group col-auto">

                    <select name="gander" id="" class="form-control col-auto">
                        <option value="">Gander </option>
                        <option value="male" @selected(request('gander')=='male' )>male</option>
                        <option value="female" @selected(request('gander')=='female' )>female</option>
                    </select>
                </div>

                    {{--  d-grid gap-2 col-6 mx-auto  --}}
                <button type="submit" class="btn btn-outline-secondary  col-auto m-3">Filter</button>

            </form>
                <x-alert type="success" />
                <x-alert type="info" />
                <x-alert type="danger" />
                <div class="card-body">
                    <h4 class="card-title">Inverse table</h4>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a class="nav-link btn btn-outline-success create-new-button" id="createbuttonDropdown" aria-expanded="false" href="{{ route('patients.create') }}">
                            <i class="mdi mdi-account-plus"></i> <span>Add Patiens</span>
                        </a>
                    </div>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th> Name Patient</th>
                                    <th> Birthday </th>
                                    <th> Gander </th>
                                    <th> Number Phone </th>
                                    <th> Email </th>
                                    <th> Country </th>
                                    <th> City </th>
                                    <th> Street </th>
                                    <th>Report</th>
                                    <th colspan="2"> Satting </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($patients as $patient)
                                <tr>
                                    <td> {{ $patient->name }} </td>
                                    <td>{{$patient->birthday }}</td>
                                    <td> {{ $patient->gander}}</td>
                                    <td> {{ $patient->phone }}</td>
                                    <td> {{ $patient->email }}</td>
                                    <td> {{ $patient->country }}</td>
                                    <td> {{ $patient->city }}</td>
                                    <td> {{ $patient->street }}</td>
                                    <td> {{ $patient->number_phone }}</td>
                                    <td>
                                        <a href="{{ route('patients.show', $patient ->id) }}" class="btn btn-warning h-25">
                                            <i class="mdi mdi-eye fs-6"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('patients.edit',$patient->id) }}" class="btn btn-success m-1">
                                            <i class="mdi mdi-auto-fix"></i>
                                        </a>

                                        <form action="{{ route('patients.destroy', $patient->id) }}" method="post" class="m-1">
                                            @csrf
                                            @method('DELETE')
                                            <Button type="submit" class="btn btn-danger ">
                                                <i class="mdi mdi-backspace"></i>
                                            </Button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <td colspan="7">No Data</td>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                    <div class="m-2">{{ $patients->links() }}</div>
                </div>

        </div>
    </div>
    @endsection









    -----
