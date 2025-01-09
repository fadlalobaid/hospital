{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
</div>

<form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <!-- Password -->
    <div>
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="flex justify-end mt-4">
        <x-primary-button>
            {{ __('Confirm') }}
        </x-primary-button>
    </div>
</form>
</x-guest-layout> --}}
<x-front-layout title="confirm-password">
    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>confirm password</h2>
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

                    <form method="POST" action="{{ route('password.confirm') }}" class="form-gruop">
                        @csrf
                        <input type="password" name="password" class="form-control" placeholder="password">
                        <div class="form-group login-btn mt-2">
                        <button type="submit" class="genric-btn primary">confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>
