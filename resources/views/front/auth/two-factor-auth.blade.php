<x-front-layout title="two-factor-auth">
    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Two Factor Authentcation</h2>
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
            <form action="{{ route('two-factor.enable') }}" method="post" class="form-group">
                @csrf
                <div class="col-12">
                    @if (session('status')=='two-factor-authentcation.enable')
                    <div class="p-4 font-medium text-sm">
                        place................
                    </div>
                    @endif
                </div>
                <div class="form-group login-btn">
                    @if (!$user->two_factor_secret)
                    <button class="genric-btn success" type="submit">Enable</button>
                    @else
                    <div class="p-4">
                        {!! $user->twoFactorQrCodeSvg() !!}
                    </div>
                    <h4>RecoveryCodes Code</h4>
                    <ul>
                        @foreach($user->recoveryCodes() as $code )
                        <li>
                            {{ $code }}
                        </li>
                        @endforeach
                    </ul>
                    @method('delete')
                    <button class="genric-btn danger" type="submit">Disable</button>
                    @endif

                </div>
        </div>
        </form>
        </div>
        </div>
    </section>

</x-front-layout>
