{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
@csrf

<!-- Name -->
<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<!-- Email Address -->
<div class="mt-4">
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<!-- Password -->
<div class="mt-4">
    <x-input-label for="password" :value="__('Password')" />

    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<!-- Confirm Password -->
<div class="mt-4">
    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>

<div class="flex items-center justify-end mt-4">
    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
        {{ __('Already registered?') }}
    </a>

    <x-primary-button class="ml-4">
        {{ __('Register') }}
    </x-primary-button>
</div>
</form>
</x-guest-layout> --}}


<x-front-layout title="two-factor-chanllege">
    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Register</h2>
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
                    <!-- Shop Login -->

                    <!-- Form -->

                    <form class="form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="UserName" lable="UserName" />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" lable="Your Emali*" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">

                                <input type="password" class="form-control" name="password" placeholder="Password" lable="password" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">

                                <input type="password" class="form-control" name="password_confirmation" placeholder="Password" lable="password" />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group login-btn">
                                <button class="genric-btn info" type="submit">SignIn</button>
                                @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="genric-btn info">LogIn</a>
                                @endif
                            </div>

                            <div class="checkbox">
                                <label class="checkbox-inline" for="2">
                                    <input name="remeber" value="1" id="2" type="checkbox">Remember me</label>
                            </div>
                            @if (Route::has('password.request'))
                            <a href="#" class="lost-pass">Lost your password?</a>
                            @endif

                        </div>
                </div>
                </form>
                <!--/ End Form -->
            </div>
        </div>
        </div>
        </div>
    </section>
    <!--/ End Login -->
    </div>
    </div>
    </div>
    </section>
</x-front-layout>
