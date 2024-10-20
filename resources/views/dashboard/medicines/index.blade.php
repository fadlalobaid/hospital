@extends("layout.dashboard")
@section('title')
Doctors - index
@endsection

@section('content')


<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">

<x-alert type="success" />
<x-alert type="info" />
<x-alert type="danger" />
        <div class="card-body">
            <h4 class="card-title">Doctors Table</h4>
            <div class="d-grid gap-2 col-6 mx-auto">
            <a class="nav-link btn btn-outline-success create-new-button" id="createbuttonDropdown"  aria-expanded="false" href="{{ route('doctors.create') }}">
                 <i class="mdi mdi-account-plus"></i> <span>Add Medicine</span>
            </a>
            </div>
            </p>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th> Name Medicine</th>
                            <td>Dosage</td>
                            <th> Date Create </th>
                            <th> Date End </th>
                            <th> Manufacturer </th>
                            <th>Quantity </th>
                            <th>Price </th>
                            <th  > Satting </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($medicines as $medicine)
                        <tr>
                            <td> {{ $medicine->medicine_name }} </td>
                            <td>{{ $medicine->dosage ??'-'}}</td>
                            <td>{{$medicine->date_created ?? '-'}}</td>
                            <td> {{ $medicine->date_end}}</td>
                            <td> {{ $medicine->manufacturer }}</td>
                            <td> {{ $medicine->quantity }}</td>
                            <td> {{ $medicine->price }}</td>
                             <td >
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
                <div class="m-2">{{ $medicines->links() }}</div>

            </div>
        </div>
    </div>
</div>
@endsection









-----
