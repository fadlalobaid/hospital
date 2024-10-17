@extends("layout.dashboard")
@section('title')
Department - index
@endsection

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Department</h4>
            <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-bs-toggle="dropdown" aria-expanded="false" href="{{ route('departemnts.create') }}">Add Department</a>

            </p>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name Department</th>
                            <th> discrption </th>
                            <th> status </th>
                            <th> Edit </th>
                            <th> Delete</th>

                        </tr>
                    </thead>
                    <tbody>

                            @forelse ($departments as $department)
                            <tr>
                            <td>{{ $department->id }}</td>
                            <td> {{ $department->name }}</td>
                            <td> {{ $department->description }}</td>
                            <td>
                                {{ $department->status }}
                            </td>
                            <td>
                                <a href="{{ route('departemnts.edit',$department->id) }}" class="btn btn-success">Edit</a>
                            </td>

                            <td>
                                <form action="{{ route('departemnts.destroy', $department->id) }}" method="post">
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
                {{ $departments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection









-----
