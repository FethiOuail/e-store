{{--
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
--}}


<x-base-layout>
    <main id="main" class="main-site left-sidebar">

        <div class="container">


            <section class="section-pagetop bg " style="padding: 10px">
                <div class="container">
                    <h2 class="title-page">{{trans('message.Wishlist')}} </h2>
                    <nav>
                        <ol class="breadcrumb text-white">
                            <li class="breadcrumb-item"><a href="/home"> {{trans('message.home')}} </a></li>

                            <li class="breadcrumb-item active" aria-current="page">{{trans('message.ResetPassword')}}</li>
                        </ol>
                    </nav>
                </div> <!-- container //  -->
            </section>


            <div class="row justify-content-center" >
                <div class="col-6">
                                <x-jet-validation-errors class="mb-4" />
                                <form name="frm-login" method="POST" action="{{route('password.update')}}">
                                    @csrf


                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">



                                    <div class="form-group">
                                        <label for="frm-login-uname">Email Address:</label>
                                        <input type="email" class="form-control"type="email" id="frm-login-uname" name="email" placeholder="Type your email address" value="{{$request->email}}" required autofocus>
                                    </div> <!-- form-group// -->



                                    <div class="form-group">
                                        <label for="frm-login-uname">Password* </label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="new-password">
                                    </div> <!-- form-group// -->





                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password *</label>
                                        <input type="password" class="form-control"   id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                    </div> <!-- form-group// -->

                                    <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-block" value="Reset Password" name="submit">
                                    </div>

                                </form>

                </div>
        </div><!--end container-->

        </div>

    </main>
</x-base-layout>
