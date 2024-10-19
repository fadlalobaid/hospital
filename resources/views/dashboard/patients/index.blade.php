@extends("layout.dashboard")
@section('title')
Patients - index
@endsection

@section('content')


<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">

<x-alert type="success" />
<x-alert type="info" />
<x-alert type="danger" />
        <div class="card-body">
            <h4 class="card-title">Inverse table</h4>
            <div class="d-grid gap-2 col-6 mx-auto">
            <a class="nav-link btn btn-outline-success create-new-button" id="createbuttonDropdown"  aria-expanded="false" href="{{ route('patients.create') }}">
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
                            <th> Email </th>
                            <th> Number Phone </th>
                            <th  > Satting </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $patient)
                        <tr>
                            <td> {{ $patient->name }} </td>
                            <td>{{$patient->birthday }}</td>
                            <td> {{ $patient->gander}}</td>
                            <td> {{ $patient->email }}</td>
                            <td> {{ $patient->number_phone }}</td>
                             <td >
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
                        <td colspan="4">No Data</td>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection









-----
