@extends("layout.dashboard")
@section('title')
Prescription - index
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page">Prescription</li>
<li class="breadcrumb-item active" aria-current="page">index</li>

@endsection
@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <x-alert type="success" />
        <x-alert type="info" />
        <x-alert type="danger" />
        <div class="card-body">
            <h3 class="d-inline">Prescriptions Table</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('prescriptions.create') }}" class="btn btn-success fs-5">
                    + Add prescription
                </a>
            </div>
            </p>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th> Doctor Name</th>
                            <th>  petient Name </th>
                            <th>Recipe Name</th>
                            <th> Recipe Date </th>
                            <th> instructions </th>
                            <th> Satting </th>
                            <th> Show </th>


                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($prescriptions as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td> {{ $item->doctor->name }}</td>
                            <td > {{ $item->patient->name }}</td>
                            <td> {{ $item->recipe_name }} </td>
                            <td>
                                {{ $item->recipe_date }}
                            </td>
                            <td class="text-wrap">
                                {{ $item->instructions }}
                            </td>
                            <td>
                                <a href="{{ route('prescriptions.edit',$item->id) }}" class="btn btn-success m-1">
                                    <i class="mdi mdi-auto-fix fs-6"></i>
                                </a>

                                <form action="{{ route('prescriptions.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <Button type="submit" class="btn btn-danger m-1">
                                        <i class="mdi mdi-backspace fs-6"></i>
                                    </Button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('prescriptions.show', $item->id) }}" class="btn btn-warning h-25">
                                    <i class="mdi mdi-eye fs-6"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <td colspan="4">No Data</td>
                        @endforelse


                    </tbody>

                </table>

            </div>
        </div> {{ $prescriptions->withQueryString() }}
    </div>
</div>
@endsection









-----
