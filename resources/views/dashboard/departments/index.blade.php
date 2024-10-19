@extends("layout.dashboard")
@section('title')
Department - index
@endsection

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <x-alert type="success" />
        <x-alert type="info" />
        <x-alert type="danger" />
        <div class="card-body">
            <h4 class="card-title">Department</h4>
            <div class="d-grid gap-2 col-6 mx-auto">

                <a class="nav-link btn btn-outline-success " id="createbuttonDropdown" aria-expanded="false" href="{{ route('departemnts.create') }}">Add Department</a>
            </div>
            </p>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name Department</th>
                            <th> discrption </th>
                            <th>Count_doctor</th>
                            <th> status </th>
                            <th> Satting </th>
                            <th> Show </th>


                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($departments as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td> {{ $department->name }}</td>
                            <td class="text-wrap"> {{ $department->description }}</td>
                            <td> <i class="mdi mdi-numeric-{{ $department->doctors_count }}-box-outline text-success fs-4 "></i> </td>
                            <td>
                                {{ $department->status }}
                            </td>
                            <td>
                                <a href="{{ route('departemnts.edit',$department->id) }}" class="btn btn-success m-1">
                                    <i class="mdi mdi-auto-fix fs-6"></i>
                                </a>

                                <form action="{{ route('departemnts.destroy', $department->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <Button type="submit" class="btn btn-danger m-1">
                                        <i class="mdi mdi-backspace fs-6"></i>
                                    </Button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('departemnts.show', $department->id) }}" class="btn btn-warning h-25">
                                    <i class="mdi mdi-help-circle-outline fs-6"></i>
                                </a>
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
