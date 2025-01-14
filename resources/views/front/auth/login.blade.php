{{--
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('../../assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('../../assets/vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- Plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="{{ asset('../../assets/css/style.css') }}">
<!-- End layout styles -->
<link rel="shortcut icon" href="{{ asset('../../assets/images/backgroundlog.jpg') }}" />
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Login</h3>
                            <form action="{{ 'login' }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Username or email *</label>
                                    <input type="email" class="form-control p_input" name="{{ config('fortify.username') }}">
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="password" class="form-control p_input" name="password">
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"> Remember me </label>
                                    </div>
                                    <a href="#" class="forgot-pass">Forgot password</a>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="btn btn-outline-primary  mb-4">Login</button>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-facebook me-2 col">
                                        <i class="mdi mdi-facebook"></i> Facebook </button>
                                    <button class="btn btn-google col">
                                        <i class="mdi mdi-google-plus"></i> Google plus </button>
                                </div>
                                <p class="sign-up">Dont have an Account?<a href="#"> Sign Up</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('../../assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('../../assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('../../assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{asset ('../../assets/js/misc.js') }}"></script>
    <script src="{{ asset('../../assets/js/settings.js') }}"></script>
    <script src="{{asset ('../../assets/js/todolist.js') }}"></script>
    <!-- endinject -->
</body>
</html> --}}
<x-front-layout title="Login">
    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Login</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <section class="shop login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">

                    @if($errors->has(config('fortify.username')))
                    <div class="alert alert-danger ">
                        {{ $errors->first(config('fortify.username')) }}
                    </div>
                    @endif


                    <form action="{{ 'login' }}" class="form-gruop p-5 mx-6" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="{{ config('fortify.username')}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                        </div>


                        <div class="d-inline form-group login-btn">
                            <button type="submit" class="genric-btn primary">Login</button>
                        </div>
                        @if (Route::has('register'))
                        <a href="{{route('register')}}" class="genric-btn info ">REGISTER</a>

                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>
