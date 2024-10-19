@extends("layout.dashboard")
@section('title')
Doctors - index
@endsection

@section('content')


<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">

<x-alert type="success" />
<x-alert type="info" />
<x-alert type="danger" />
        <div class="card-body">
            <h4 class="card-title">Doctors Table</h4>
            <div class="d-grid gap-2 col-6 mx-auto">
            <a class="nav-link btn btn-outline-success create-new-button" id="createbuttonDropdown"  aria-expanded="false" href="{{ route('doctors.create') }}">
                 <i class="mdi mdi-account-plus"></i> <span>Add Doctors</span>
            </a>
            </div>
            </p>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th> Name Doctror</th>
                            <td>Name Department</td>
                            <th> discription </th>
                            <th> Gander </th>
                            <th> Specialization </th>
                            <th>email </th>
                            <th  > Satting </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($doctors as $doctor)
                        <tr>
                            <td> {{ $doctor->name }} </td>
                            <td><a href="{{ route('departemnts.index') }}">{{ $doctor->department->name }}</a></td>
                            <td>{{$doctor->discription }}</td>
                            <td> {{ $doctor->gender}}</td>
                            <td> {{ $doctor->Specialization }}</td>
                            <td> {{ $doctor->email }}</td>
                             <td >
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
                <div class="m-2">{{ $doctors->links() }}</div>

            </div>
        </div>
    </div>
</div>
@endsection









-----
