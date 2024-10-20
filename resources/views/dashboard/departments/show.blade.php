@extends("layout.dashboard")
@section('title')
Department - show
@endsection

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <x-alert type="success" />
        <x-alert type="info" />
        <x-alert type="danger" />
        <div class="card-body">


            <h4 class="card-title">{{ $department->name }} </h4>

            <div class="d-grid gap-2 col-6 mx-auto">
                <a class="nav-link btn btn-outline-success create-new-button" href="{{ route('departemnts.index') }}"> Department</a>
            </div>
            </p>
            <div class="table-responsive">

                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>id</th>

                            <th> Name Doctor </th>
                            <th> gander </th>
                            <th> Specialization </th>



                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($department->doctors as $doctor)
                        <tr>
                            <td>{{ $doctor->id }}</td>

                            <td> {{ $doctor->name }}</td>
                            <td> {{ $doctor->gender }}</td>
                            <td>
                                {{ $doctor->Specialization }}
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
