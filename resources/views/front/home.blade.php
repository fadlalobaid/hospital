<x-front-layout title="hospital">
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-xl-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>We are here for your care</h5>
                            <h1>Best Care &
                                Better Doctor</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit sed do eiusmod tempor incididunt ut labore et dolore
                                magna aliqua. Quis ipsum suspendisse ultrices gravida.Risus cmodo viverra </p>
                            <a href="{{ route('app.create') }}" class="btn_2">Make an appointment</a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner_img">
                        <img src="{{ asset('front/img/banner_img.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- about us part start-->
    <section class="about_us padding_top">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 col-lg-6">
                    <div class="about_us_img">
                        <img src="{{ asset('front/img/top_service.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="about_us_text">
                        <h2>About us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua
                            Quis ipsum suspendisse ultrices gravida. Risus cmodo viverra
                            maecenas accumsan lacus vel</p>
                        <a class="btn_2 " href="#">learn more</a>
                        <div class="banner_item">
                            <div class="single_item">
                                <img src="{{asset ('front/img/icon/banner_1.svg') }}" alt="">
                                <h5>Emergency</h5>
                            </div>
                            <div class="single_item">
                                <img src="{{ asset('front/img/icon/banner_2.svg') }}" alt="">
                                <h5>Appointment</h5>
                            </div>
                            <div class="single_item">
                                <img src="{{ asset('front/img/icon/banner_3.svg') }}" alt="">
                                <h5>Qualfied</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about us part end-->

    <!-- feature_part start-->
    <section class="feature_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2>Our services</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">

                <div class="col-lg-4 col-sm-12">
                    <div class="single_feature_img">
                        <img src="{{ asset('front/img/service.png') }}" alt="">
                    </div>
                </div>
                @foreach ($services as $service)
                <x-card.services :service="$service" />
                @endforeach

            </div>
        </div>
    </section>
    <!-- feature_part start-->

    <!-- our depertment part start-->
    <section class="our_depertment section_padding">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-12">
                    <div class="depertment_content">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <h2>Our Depertment</h2>
                                <div class="row">
                                    @foreach ($departments as $deprtment)
                                    <div class="col-lg-6 col-sm-6">
                                        <x-card.department :deprtment="$deprtment" />
                                    </div>
                                    @endforeach
                                </div>
                              <div class="d-grid gap-2">
                                <a href="{{ route('d.index') }}" class="btn d-inline alert alert-primary">
                                    View All Departments
                                </a>
                               </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- our depertment part end-->

    <!--::doctor_part start::-->
    <section class="doctor_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2> <a href="{{ route('doctor.index') }}">Experienced Doctors</a></h2>
                        <p>Face replenish sea good winged bearing years air divide wasHave night male also</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($doctors as $doctor)
                <div class="col-sm-6 col-lg-3">
                    <x-card.doctor :doctor="$doctor" />
                </div>
                @endforeach

            </div>



        </div>

    </section>
    <!--::doctor_part end::-->

    <!--::regervation_part start::--> 

    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-7">
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
    <!--::regervation_part end::-->

    <!--::blog_part start::-->
    {{-- <section class="blog_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2>Our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="{{ asset('front/img/blog/blog_2.png') }}" class="card-img-top" alt="blog">
    <div class="card-body">
        <a href="blog.html">
            <h5 class="card-title">First cattle which earth unto let health for
                can get and see what you </h5>
        </a>
        <ul>
            <li> <span class="ti-user"></span>Jhon mike</li>
            <li> <span class="ti-bookmark"></span>Clinic, doctors</li>
        </ul>

    </div>
    </div>
    </div>
    </div>
    <div class="col-sm-6">
        <div class="single-home-blog">
            <div class="card">
                <img src="{{ ('front/img/blog/blog_3.png') }}" class="card-img-top" alt="blog">
                <div class="card-body">
                    <a href="blog.html">
                        <h5 class="card-title">First cattle which earth unto let health for
                            can get and see what you </h5>
                    </a>
                    <ul>
                        <li> <span class="ti-user"></span>Jhon mike</li>
                        <li> <span class="ti-bookmark"></span>Clinic, doctors</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </section> --}}
    <!--::blog_part end::-->


</x-front-layout>
{{-- --}}
