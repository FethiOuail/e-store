
<x-base-layout>

    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y">

        <!-- ============================ COMPONENT REGISTER   ================================= -->
        <div class="card mx-auto" style="max-width:520px; margin-top:0px;">
            <article class="card-body">
                <header class="mb-4"><h4 class="card-title">{{trans("message.Signup")}}</h4></header>
                <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('register') }}">
                @csrf

                    <div class="form-row">
                        <div class="col form-group">
                            <label>{{trans("message.Yourname")}}</label>
                            <input type="text" class="form-control" id="frm-reg-lname" name="name" placeholder="{{trans("message.Yourname")}}" :value="name" required autofocus autocomplete="name">
                        </div> <!-- form-group end.// -->

                    </div> <!-- form-row end.// -->
                    <div class="form-group">
                        <label> {{trans("message.Emailaddress")}}</label>
                        <input type="email" class="form-control"id="frm-reg-email" name="email" placeholder="{{trans('message.Emailaddress')}}" :value="email" required autofocus autocomplete="email">
                        <small class="form-text text-muted">{{trans("message.Wellnevershareyouremailwithanyoneelse")}} </small>
                    </div> <!-- form-group end.// -->

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>{{trans('message.Createpassword')}}</label>
                            <input class="form-control" type="password" id="frm-reg-pass" name="password" placeholder="{{trans('message.Password')}}" required autocomplete="new-password">
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-6">
                            <label>{{trans('message.Repeatpassword')}}</label>
                            <input class="form-control" type="password" id="frm-reg-cfpass"  name="password_confirmation" required autocomplete="new-password" placeholder="{{trans('message.ConfirmPassword')}}">
                        </div> <!-- form-group end.// -->
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" value="Register" name="register"> {{trans("message.Register")}}  </button>
                    </div> <!-- form-group// -->
                </form>
            </article><!-- card-body.// -->
        </div> <!-- card .// -->
        <p class="text-center mt-4"> {{trans("message.Haveanaccount")}} <a href="{{ route('login') }}">{{trans("message.LogIn")}} </a></p>
        <br><br>
        <!-- ============================ COMPONENT REGISTER  END.// ================================= -->


    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

</x-base-layout>
