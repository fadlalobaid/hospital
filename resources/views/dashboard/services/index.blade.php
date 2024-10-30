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
            <h4 class="card-title">Services Table</h4>
            <div class="d-grid gap-2 col-6 mx-auto">
            <a class="nav-link btn btn-outline-success create-new-button" id="createbuttonDropdown"  aria-expanded="false" href="{{ route('services.create') }}">
                 <i class="mdi mdi-account-plus"></i> <span>Add Services</span>
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
                            <th> discription </th>

                            <th> Satting </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                        <tr>
                            <td> {{ $service->name }} </td>
                            <td><a href="{{ route('departemnts.index') }}">{{ $service->department->name??'' }}</a></td>
                            <td>{{$service->charge }}</td>
                            <td> {{ $service->discrption}}</td>

                             <td >
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
