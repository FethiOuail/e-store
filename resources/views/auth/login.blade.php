<x-base-layout>



    <section class="section-conten padding-y" style="min-height:84vh">

        <!-- ============================ COMPONENT LOGIN   ================================= -->
        <div class="card mx-auto" style="max-width: 380px;;">
            <div class="card-body">
                <h4 class="card-title mb-4">{{trans('message.Signin')}}</h4>
                <x-jet-validation-errors class="mb-4" />

                <form  method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="form-group">
                        <input type="email" class="form-control"name="email" placeholder="{{trans('message.Typeyouremailaddress')}}" :value="old('email')" required autofocus>
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="{{trans('message.Password')}}"  name="password" placeholder="************" required autocomplete="current-password">
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <a  class="float-right" href="{{  route('password.request') }}" title="Forgotten password?">{{trans('message.Forgottenpassword')}}</a>
                        <label class="float-left custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> {{trans('message.Remember')}} </div> </label>
                    </div> <!-- form-group form-check .// -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> {{trans("message.Login")}}  </button>
                    </div> <!-- form-group// -->
                </form>
            </div> <!-- card-body.// -->
        </div> <!-- card .// -->

        <p class="text-center mt-4">{{trans('message.Donthaveaccount')}} <a href="{{ route('register')}}">{{trans("footer.User_register")}}</a></p>
        <br><br>
        <!-- ============================ COMPONENT LOGIN  END.// ================================= -->


    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

</x-base-layout>

