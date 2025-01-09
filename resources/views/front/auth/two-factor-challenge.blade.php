<x-front-layout title="two-factor-chanllege">
    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Two Factor Chanllenge</h2>
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
                    <form action="{{ route('two-factor.login') }}" class="form" method="post">
                        @csrf
                        <div class="row">
                            @if($errors->has('code'))
                            <div class="alert aleert-danger">
                                {{ $errors->first(config('code')) }}
                            </div>
                            @endif
                            {{-- code  --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" name="code"  class="form-control" lable="2FA Code" >
                                </div>
                            </div>
                            {{-- recovery_code  --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" name="recovery_code" class="form-control" lable="Recovery Code " />
                                </div>
                            </div>
                            {{-- submit  --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="genric-btn primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>
