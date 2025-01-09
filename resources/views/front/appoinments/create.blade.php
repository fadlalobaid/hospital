<x-front-layout title="Department">

    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Appoinments</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-7">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ol type="1">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach

                        </ol>
                    </div>
                    @endif

                    <div class="regervation_part_iner">

                        <form action="{{ route('app.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                            @csrf
                            <h2>Make an Appointment</h2>
                            <x-alert type="success" />
                            <x-alert type="info" />
                            <x-alert type="danger" />
                            <div class="form-row">


                                <div class="form-group  col-md-6">
                                    <label>Department</label>
                                    <select name="department_id" class="form-control">
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" @selected(old('department_id', $appointment->department_id ?? '') == $department->id)>
                                            {{ $department->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>




                                <div class="form-group  col-md-6">
                                    <label>Doctor</label>
                                    <select name="doctor_id" class="form-control">
                                        @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}" @selected(old('doctor_id', $appointment->doctor_id ?? '') == $department->id)>
                                            {{ $doctor->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>



                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="patient_name" placeholder="Name">
                                </div>


                                <div class="form-group col-md-6">
                                    <select class="form-control" id="Select" name="status">
                                        <option value="status" selected>STATUS</option>
                                        <option value="confirmed" selected>confirmed</option>
                                        <option value="pending">pending</option>
                                        <option value="cancelled">cancelled</option>

                                    </select>
                                </div>


                                <div class="form-group time_icon col-md-6">
                                    <x-form.input type="time" name="time_appointment" placeholder="time" value="{{ old('time_appointment', $appointment->time_appointment ?? '') }}" />
                                </div>
                                <div class="form-group time_icon col-md-6">
                                    <x-form.input type="date" name="date_appointment" placeholder="date" value="{{ old('date_appointment', $appointment->date_appointment ?? '') }}" />
                                </div>


                                <div class="form-group col-md-12">
                                    <x-form.textarea label="notes" name="notes" rows="10" cols="30" />
                                </div>
                            </div>
                            <div class="regerv_btn">
                                <button type="submit" class="btn btn-primary">Make an Appointment</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="reservation_img">
                        <img src="{{ asset('front/img/reservation.png') }}" alt="" class="reservation_img_iner">
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>
