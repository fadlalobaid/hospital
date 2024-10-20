@extends("layout.dashboard")
@section('title')
Nurse - index
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

                <a class="nav-link btn btn-outline-success " id="createbuttonDropdown" aria-expanded="false" href="{{ route('nurses.create') }}">Add Nurse</a>
            </div>
            </p>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name Nurse</th>
                            <th>Name Department</th>
                            <th> Birthday </th>
                            <th>Gander</th>
                            <th> Email </th>
                            <th> Hours Work </th>
                            <th> Satting </th>



                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($nurses as $nurse)
                        <tr>
                            <td>{{ $nurse->id }}</td>
                            <td> {{ $nurse->name }}</td>
                            <td> {{ $nurse->department->name }}</td>
                            <td >{{ $nurse->birthday }} </td>
                            <td>{{ $nurse->gander }}</td>
                            <td>
                                {{ $nurse->email }}
                            </td>
                            <td>
                                {{ $nurse->hours_work }}
                            </td>
                            <td>
                                <a href="{{ route('nurses.edit',$nurse->id) }}" class="btn btn-success m-1">
                                    <i class="mdi mdi-auto-fix fs-6"></i>
                                </a>

                                <form action="{{ route('nurses.destroy',$nurse->id) }}" method="post">
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
                {{ $nurses->links() }}
            </div>
        </div>
    </div>
</div>
@endsection









-----
