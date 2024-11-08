@extends("layout.dashboard")
@section('title')
Reports - index
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page">Report</li>
<li class="breadcrumb-item active" aria-current="page">index</li>

@endsection
@section('content')


<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">
        {{-- --}}

        <x-alert type="success" />
        <x-alert type="info" />
        <x-alert type="danger" />
        <div class="card-body m-2">
            <h3 class="d-inline">Reports Table</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('doctors.create') }}" class="btn btn-success fs-5">
                    + Add Doctor
                </a>
            </div>
            </p>
            <div class="table-responsive">
                <table class="table table-dark ">
                    <thead>
                        <tr>
                            <th> Name Patient</th>
                            <td>Name Doctor</td>
                            <th> Report Date </th>
                            <th> Report Time </th>
                            <th>Report </th>
                            <th colspan="2"> Satting </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reports as $report)
                        <tr>

                            <td> {{ $report->doctor->name }} </td>
                            <td>{{ $report->patient->name ??''}}</td>
                            <td>{{$report->date_report }}</td>
                            <td> {{ $report->time_report}}</td>
                            <td class="text-wrap"> {{ $report->report }}</td>
                            <td>
                                <a href="{{ route('reports.edit',$report->id) }}" class="btn btn-success m-1">
                                    <i class="mdi mdi-auto-fix"></i>
                                </a>

                                <form action="{{ route('reports.destroy', $report->id) }}" method="post" class="m-1">
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
            <div class="m-2">{{ $reports->withQueryString() }}</div>
        </div>
    </div>
</div>
@endsection









-----
