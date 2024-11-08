@extends("layout.dashboard")
@section('title')
Appointment - index
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page">Appointment</li>
<li class="breadcrumb-item active" aria-current="page">index</li>

@endsection
@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        {{--  <div class="m-3 ">
            <form action="{{ URL::current() }}" class="row g-3 m-2">
                <div class="form-group col-auto">
                    <x-form.input type="text" name="name" placeholder="Name appointment" :value="request('name')" />
                </div>

                <div class="form-group col-auto">

                    <select name="status" id="" class="form-control">
                        <option value="">Status</option>
                        <option value="active" @selected(request('status')=='active' )>Active</option>
                        <option value="inactive" @selected(request('status')=='inactive' )>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-secondary  col-auto m-3">Filter</button>
            </form>
        </div>  --}}
        <div class="card">
            <x-alert type="success" />
            <x-alert type="info" />
            <x-alert type="danger" />
            <div class="card-body">
                <h3 class="d-inline">Appointment Table</h3>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('appointments.create') }}" class="btn btn-success fs-5">
                        + Add appointment
                    </a>
                </div>
                </p>
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Department Name</th>
                                <th> Patient Name</th>
                                <th>Doctor Name</th>
                                <th> Time </th>
                                <th> date </th>
                                <th> Status </th>
                                <th class="text-wrap"> Notes </th>
                                <th> Satting </th>



                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->id }}</td>
                                <td> {{ $appointment->departments->name }}</td>
                                <td> {{ $appointment->patients->name }}</td>
                                <td > {{ $appointment->doctors->name }}</td>
                                <td> {{ $appointment->time_appointment }} </td>
                                <td> {{ $appointment->date_appointment }} </td>
                                <td>
                                    {{ $appointment->status }}
                                </td>
                                <td>
                                    {{ $appointment->notes }}
                                </td>
                                <td>
                                    <a href="{{ route('appointments.edit',$appointment->id) }}" class="btn btn-success m-1">
                                        <i class="mdi mdi-auto-fix fs-6"></i>
                                    </a>

                                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <Button type="submit" class="btn btn-danger m-1">
                                            <i class="mdi mdi-backspace fs-6"></i>
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
                <div class="m-2">{{ $appointments->withQueryString() }}</div>
            </div>
        </div>
    </div>
    @endsection









    -----
