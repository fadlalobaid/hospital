@extends("layout.dashboard")
@section('title')
Medicine - index
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page">Medicine</li>
<li class="breadcrumb-item active" aria-current="page">index</li>

@endsection
@section('content')


<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">
        <form action="{{ URL::current() }}" class="row g-3 m-2 ">
            <div class="form-group col-auto">
                <x-form.input type="text" name="medicine_name" placeholder="Name Medicine" :value="request('medicine_name')" />
            </div>
            <div class="form-group col-auto">
                <x-form.input type="text" name="manufacturer" placeholder="Manufacturer" :value="request('manufacturer')" />
            </div>
            <div class="form-group col-auto">
                <x-form.input type="date" name="date_end" placeholder="Date End" :value="request('date_end')" />
            </div>
            <button type="submit" class="btn btn-outline-secondary   col-auto m-3">Filter</button>
        </form>

        <x-alert type="success" />
        <x-alert type="info" />
        <x-alert type="danger" />
        <div class="card-body">
            <h3 class="d-inline">medicines Table</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('medicines.create') }}" class="btn btn-success fs-5">
                    + Add medicine
                </a>
            </div>
            </p>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th> Name Medicine</th>

                            <th> Date Create </th>
                            <th> Date End </th>
                            <th> Manufacturer </th>
                            <th>Quantity </th>
                            <th>Price </th>
                            <th> Satting </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($medicines as $medicine)
                        <tr>
                            <td> {{ $medicine->medicine_name }} </td>

                            <td>{{$medicine->date_created ?? '-'}}</td>
                            <td> {{ $medicine->date_end}}</td>
                            <td> {{ $medicine->manufacturer }}</td>
                            <td> {{ $medicine->quantity }}</td>
                            <td> {{ $medicine->price }}</td>
                            <td>
                                <a href="{{ route('medicines.edit',$medicine->id) }}" class="btn btn-success m-1">
                                    <i class="mdi mdi-auto-fix"></i>
                                </a>

                                <form action="{{ route('medicines.destroy', $medicine->id) }}" method="post" class="m-1">
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
            <div class="m-2">{{ $medicines->withQueryString() }}</div>
        </div>
    </div>
</div>
@endsection









-----
