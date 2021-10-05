<main id="main" class="main-site">

    <section class="section-pagetop bg " style="padding: 10px">
        <div class="container">
            <h2 class="title-page">{{trans('message.checkout')}} </h2>
            <nav>
                <ol class="breadcrumb text-white">
                    <li class="breadcrumb-item"><a href="/home"> {{trans('message.home')}} </a></li>

                    <li class="breadcrumb-item active" aria-current="page">{{trans('message.checkout')}}</li>
                </ol>
            </nav>
        </div> <!-- container //  -->
    </section>
    <br>


    <style>
        .summary-item .row-in-form input[type="password"], .summary-item .row-in-form input[type="text"], .summary-item .row-in-form input[type="tel"] {
            font-size: 13px;
            line-height: 19px;
            display: inline-block;
            height: 43px;
            padding: 2px 20px;
            max-width: 300px;
            width: 100%;
            border: 1px solid #e6e6e6;
        }
    </style>
    <div class="container">



        <form wire:submit.prevent="placeOrder" onsubmit="$('#processing').show();">
            <h2 class="title"> {{trans('message.BillingAddress')}} </h2>
            <div class="form-row align-items-center">

                <div class="row col-12">
                <div class="col-12 col-sm-6 my-1">
                    <label class="" for="fname">  {{trans('message.firstname')}} <span>*</span></label>
                    <input type="text" class="form-control" name="fname" value="" placeholder=" {{trans('message.Yourname')}} " wire:model="firstname">
                    @error('firstname')  <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="col-12 col-sm-6 my-1">
                        <label class="" for="lname"> {{trans('message.lastname')}} <span>*</span></label>
                        <input type="text" class="form-control" name="lname" value="" placeholder=" {{trans('message.Yourlastname')}} " wire:model="lastname">
                        @error('lastname')  <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="row col-12">

                    <div class="col-12 col-sm-6 my-1">
                        <label class="" for="email"> {{trans('message.EmailAddreess')}} :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="email" class="form-control" name="email" value="" placeholder=" {{trans('message.Typeyouremail')}} "  wire:model="email">
                            @error('email')  <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 my-1">
                        <label class="" for="phone"> {{trans('message.Phonenumber')}} <span>*</span></label>
                        <input type="number" class="form-control" name="phone" value="" placeholder=" {{trans('message.digitsformat')}} "  wire:model="mobile">
                        @error('mobile')  <span class="text-danger">{{$message}}</span> @enderror
                    </div>




                </div>


                <div class="row col-12">
                    <div class="col-12 col-sm-6 my-1">
                        <label class="" for="add">{{trans('message.Line1')}}  </label>
                        <input type="text" class="form-control" name="add" value="" placeholder="{{trans('message.Streetatapartmentnumber')}}  "  wire:model="line1">
                        @error('line1')  <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="col-12 col-sm-6 my-1">
                        <label class="" for="add">{{trans('message.Line2')}} </label>
                        <input type="text" class="form-control" name="add" value="" placeholder="{{trans('message.Streetatapartmentnumber')}}"  wire:model="line2">
                    </div>


                </div>


                <div class="row col-12">
                    <div class="col-12 col-sm-6 my-1">
                        <label class="" for="country">{{trans('message.Country')}} <span>*</span></label>
                        <input type="text" class="form-control" name="country" value="Algeria" placeholder="Algeria" disabled wire:model="country">
                        @error('country')  <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="col-12 col-sm-6 my-1">
                        <label class="" for="city">{{trans('message.Province')}} <span>*</span></label>
                        <input type="text" class="form-control" name="province" value="" placeholder="{{trans('message.Province')}}" wire:model="province">
                        @error('province')  <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>



                <div class="row col-12">
                    <div class="col-12 col-sm-6 my-1">
                        <label class="" for="city">{{trans('message.City')}} <span>*</span></label>
                        <input type="text" class="form-control" name="city" value="" placeholder="{{trans('message.Cityname')}}" wire:model="city">
                        @error('city')  <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="col-12 col-sm-6 my-1">
                        <label class="" for="zip-code">{{trans('message.Postcode')}}  </label>
                        <input type="number" class="form-control" name="zip-code" value="" placeholder="{{trans('message.Yourpostalcode')}}" wire:model="zipcode">
                        @error('zipcode')  <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>

                <div class="row col-12">
                <div class="col-auto my-1">
                    <label class="checkbox-field">
                        <input name="different-add" id="different-add" hidden value="1" type="checkbox" wire:model="ship_to_different">
                        <span hidden> {{trans('message.Shiptoadifferentaddress')}} ?</span>
                    </label>
                </div>



                </div>


            </div>



            @if($ship_to_different)
                <h3 class="box-title"> {{trans('message.ShippingAddress')}} </h3>
                <div class="form-row align-items-center">

                    <div class="row col-12">
                        <div class="col-12 col-sm-6 my-1">
                            <label class="sr-only"  for="fname">first name<span>*</span></label>
                            <input type="text" class="form-control" name="fname" value="" placeholder="Your name" wire:model="s_firstname">
                            @error('s_firstname')  <span class="text-danger">{{$message}}</span> @enderror

                        </div>
                        <div class="col-12 col-sm-6 my-1">
                            <label class="sr-only" for="lname">last name<span>*</span></label>
                            <input type="text" class="form-control"name="lname" value="" placeholder="Your last name" wire:model="s_lastname">
                            @error('s_lastname')  <span class="text-danger">{{$message}}</span> @enderror

                        </div>
                    </div>

                    <div class="row col-12">

                        <div class="col-12 col-sm-6 my-1">
                            <label class="sr-only" for="email">Email Addreess:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="email" class="form-control"  name="email" value="" placeholder="Type your email" wire:model="s_email">
                                @error('s_email')  <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 my-1">
                            <label class="sr-only" for="phone">Phone number<span>*</span></label>
                            <input type="number" class="form-control" name="phone" value="" placeholder="10 digits format" wire:model="s_mobile">
                            @error('s_mobile')  <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                    </div>


                    <div class="row col-12">
                        <div class="col-12 col-sm-6 my-1">
                            <label class="sr-only" for="add">Line1:</label>
                            <input type="text" class="form-control" name="add" value="" placeholder="Street at apartment number" wire:model="s_line1">
                            @error('s_line1')  <span class="text-danger">{{$message}}</span> @enderror
                        </div>


                        <div class="col-12 col-sm-6 my-1">
                            <label class="sr-only" for="add">Line2:</label>
                            <input type="text" class="form-control" name="add" value="" placeholder="Street at apartment number" wire:model="s_line2">
                        </div>

                    </div>


                    <div class="row col-12">
                        <div class="col-12 col-sm-6 my-1">
                            <label class="sr-only" for="country">Country<span>*</span></label>
                            <input type="text" class="form-control" name="country" value="" placeholder="United States" wire:model="s_country">
                            @error('s_country')  <span class="text-danger">{{$message}}</span> @enderror
                        </div>


                        <div class="col-12 col-sm-6 my-1">
                            <label class="sr-only" for="city">Province<span>*</span></label>
                            <input type="text" class="form-control" name="province" value="" placeholder="Province" wire:model="s_province">
                            @error('s_province')  <span class="text-danger">{{$message}}</span> @enderror
                        </div>




                    </div>



                    <div class="row col-12">
                        <div class="col-12 col-sm-6 my-1">
                            <label class="sr-only" for="city">Town / City<span>*</span></label>
                            <input type="text" class="form-control" name="city" value="" placeholder="City name" wire:model="s_city">
                            @error('s_city')  <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="col-12 col-sm-6 my-1">
                            <label class="sr-only" for="zip-code">Postcode / ZIP:</label>
                            <input type="number" class="form-control" name="zip-code" value="" placeholder="Your postal code" wire:model="s_zipcode">
                            @error('s_zipcode')  <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                    </div>


                </div>
            @endif



            <div class="card">
                <h4 class="title-box"> {{trans('message.PaymentMethod')}} </h4>

                <div class="card-body">
                    <dl class="dlist-align">
                        <input name="payment-method"  checked id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
                        <span>  {{trans('message.CashOnDelivery')}} </span>
                        <span class="payment-desc"> {{trans('message.OrderNowPayonDelivery')}} </span>
                    </dl>
                    @error('paymentmode')  <span class="text-danger">{{$message}}</span> @enderror

                    @if(Session::has('checkout'))
                    <dl class="dlist-align">
                        <dt> {{trans('message.GrandTotal')}} </dt>
                        <dd class="text-right text-danger">DZ {{Session::get('checkout')['total']}}</dd>
                    </dl>
                    @endif

                    @if($errors->isEmpty())
                        <div wire:ignore id="processing" style="font-size:22px; margin-bottom:20px;padding-left:37px;color:green;display:none;">
                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                            <span> {{trans('message.Processing')}} </span>
                        </div>
                    @endif

                    <hr>


                    <button type="submit" class="btn btn-primary btn-block"> {{trans('message.Placeordernow')}}   </button>
                </div> <!-- card-body.// -->
            </div>



        </form>







    </div><!--end container-->
</main>
