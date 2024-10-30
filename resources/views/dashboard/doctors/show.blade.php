@extends("layout.dashboard")
@section('title')
Doctor - Report - show
@endsection

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <x-alert type="success" />
        <x-alert type="info" />
        <x-alert type="danger" />
        <div class="card-body">


            <h4 class="card-title">{{ $doctor->name}} </h4>

            <div class="d-grid gap-2 col-6 mx-auto">
                <a class="nav-link btn btn-outline-success create-new-button" href="{{ route('doctors.index') }}"> Department</a>
            </div>
            </p>
            <div class="table-responsive">

                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>id</th>

                            <th> Name Doctor </th>
                            <th> Data Report </th>
                            <th> Name Patient </th>
                            <th> Report </th>



                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($doctor->reports as $report)
                        <tr>
                            <td>{{ $report->id }}</td>

                            <td> {{ $report->doctor->name }}</td>
                            <td> {{ $report->date_report }}</td>
                            <td>
                                {{ $report->patient->name }}
                            </td>
                            <td>
                                {{ $report->report }}
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
