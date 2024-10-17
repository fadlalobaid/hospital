@extends("layout.dashboard")
@section('title')
Doctor - index
@endsection

@section('content')


<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">

        <div class="card-body">
            <h4 class="card-title">Inverse table</h4>
            <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-bs-toggle="dropdown" aria-expanded="false" href="{{ route('doctors.create') }}">Add Department</a>

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
                            <th> Satting </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $patient)
                        <tr>
                            <td> {{ $patient->name }} </td>
                            <td>{{$patient->birthday }}</td>
                            <td> {{ $patient->gander }}</td>
                            <td> {{ $patient->email }}</td>
                            <td> {{ $patient->number_phone }}</td>
                            <td>
                                <a href="{{ route('patient.edit',$patient->id) }}" class="btn btn-success">Edit</a>
                            </td>

                            <td>
                                <form action="{{ route('patient.destroy', $patient->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <Button type="submit" class="btn btn-danger">
                                        Delete
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
