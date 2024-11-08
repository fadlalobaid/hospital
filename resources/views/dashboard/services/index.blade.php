@extends("layout.dashboard")
@section('title')
Services - index
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page">Report</li>
<li class="breadcrumb-item active" aria-current="page">index</li>

@endsection
@section('content')


<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">

        <x-alert type="success" />
        <x-alert type="info" />
        <x-alert type="danger" />
        <div class="card-body">
            <h3 class="d-inline">Services Table</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('services.create') }}" class="btn btn-success fs-5">
                    + Add service
                </a>
            </div>
            </p>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Name service</th>
                            <td>Name Department</td>
                            <th> Service Charge </th>
                            <th> Doctor Commission </th>
                            <th>Discription</th>

                            <th> Satting </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                        <tr>
                            <td> {{ $service->service_name }} </td>
                            <td><a href="{{ route('departemnts.index') }}">{{ $service->department->name??'' }}</a></td>
                            <td>{{$service->service_charge }}</td>
                            <td>{{ $service->Doctor_commission }}</td>
                            <td class="text-wrap"> {{ $service->discription}}</td>

                            <td>
                                <a href="{{ route('services.edit',$service->id) }}" class="btn btn-success m-1">
                                    <i class="mdi mdi-auto-fix"></i>
                                </a>

                                <form action="{{ route('services.destroy', $service->id) }}" method="post" class="m-1">
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
            <div class="m-2">{{ $services->links() }}</div>
        </div>
    </div>
</div>
@endsection









-----
