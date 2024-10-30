@extends("layout.dashboard")
@section('title')
Nurse - index
@endsection
@section('breadcrumbs')
@parent
<li class="breadcrumb-item active" aria-current="page">Nurses</li>
<li class="breadcrumb-item active" aria-current="page">index</li>

@endsection

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <form action="{{ URL::current() }}" class="row g-3 m-2 ">
            <div class="form-group col-auto">
                <x-form.input type="text" name="name" placeholder="Name Patient" :value="request('name')" />
            </div>
            <div class="form-group col-auto">
                <x-form.input type="text" name="country" placeholder="Country" :value="request('country')" />
            </div>

            <div class="form-group col-auto">

                <select name="gander" id="" class="form-control col-auto">
                    <option value="">Gander </option>
                    <option value="male" @selected(request('gander')=='male' )>male</option>
                    <option value="female" @selected(request('gander')=='female' )>female</option>
                </select>
            </div>

                {{--  d-grid gap-2 col-6 mx-auto  --}}
            <button type="submit" class="btn btn-outline-secondary   col-auto m-3">Filter</button>

        </form>
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
                              <th> Number Phone </th>
                            <th> Email </th>
                            <th>Country </th>
                            <th>City </th>
                            <th>street </th>
                            <th> Satting </th>



                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($nurses as $nurse)
                        <tr>
                            <td>{{ $nurse->id }}</td>
                            <td> {{ $nurse->name }} </td>
                            <td><a href="{{ route('departemnts.index') }}">{{ $nurse->department->name }}</a></td>
                            <td>{{$nurse->birthday }}</td>
                            <td> {{ $nurse->gander}}</td>
                            <td> {{ $nurse->phone }}</td>
                            <td> {{ $nurse->email }}</td>
                            <td> {{ $nurse->country }}</td>
                            <td> {{ $nurse->city }}</td>
                            <td> {{ $nurse->street }}</td>
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

            </div>
            <div class="m-2" >{{ $nurses->links() }}</div>
        </div>
    </div>
</div>
@endsection









-----
