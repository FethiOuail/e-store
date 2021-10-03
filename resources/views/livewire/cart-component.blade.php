

<main id="main" class="main-site ">

    <section class="section-pagetop bg " style="padding: 10px">
        <div class="container">
            <h2 class="title-page">{{trans('message.Wishlist')}} </h2>
            <nav>
                <ol class="breadcrumb text-white">
                    <li class="breadcrumb-item"><a href="/home"> {{trans('message.home')}} </a></li>

                    <li class="breadcrumb-item active" aria-current="page">{{trans('message.Cart')}}</li>
                </ol>
            </nav>
        </div> <!-- container //  -->
    </section>
    <br>

    <div class="container ">

        @if(Session::has('success_message'))
            <div class="alert alert-success">
                <strong>Success</strong> {{Session::get('success_message')}}
            </div>
        @endif


            @if(Cart::instance('cart')->count() > 0)

        <div class="row">

            <aside class="col-lg-9">
                <div class="card">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                        <tr class="small text-uppercase">
                            <th scope="col"> {{trans('message.Product')}} </th>
                            <th scope="col" width="120"> {{trans('message.Quantity')}}</th>
                            <th scope="col" width="120"> {{trans('message.Price')}}</th>
                            <th scope="col" class="text-right" width="200"> </th>
                        </tr>
                        </thead>

                        <tbody>


                            @foreach (Cart::instance('cart')->content() as $item)
                        <tr>
                            <td>
                                <figure class="itemside align-items-center">
                                    <div class="aside"><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}" class="img-sm"></div>
                                    <figcaption class="info">
                                        <a  href="{{route('product.details',['slug'=>$item->model->slug])}}" class="title text-dark">{{$item->model->name}}</a>

                                    </figcaption>
                                </figure>
                            </td>

                            <td>


                                <div class="input-group mb-3 input-spinner">
                                    <div class="input-group-prepend">
                                        <a class="btn btn-light" type="button" id="button-plus" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"> + </a>
                                    </div>
                                    <input type="text" class="form-control" name="product-quatity"  value="{{$item->qty}}" data-max="120" pattern="[0-9]*">
                                    <div class="input-group-append">
                                        <a class="btn btn-light" type="button" id="button-minus"   href="#"wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"> − </a>
                                    </div>


</div>
                            </td>
                            <td>
                                <div class="price-wrap">
                                    <var class="price">DZ {{$item->subtotal}}</var>
                                    <small class="text-muted"> DZ {{$item->model->regular_price}} {{trans('message.each')}} </small>
                                </div> <!-- price-wrap .// -->
                            </td>
                            <td class="text-right">
                                <a href=""  wire:click.prevent="destroy('{{$item->rowId}}')" class="btn btn-danger" data-original-title="Delete From Cart"> <i class="fa fa-trash "></i> </a>
                            </td>
                        </tr>


                            @endforeach

                        </tbody>
                    </table>

                    <div class="card-body border-top">
                        <p class="icontext"> &nbsp;<i class="icon text-success fa fa-truck"> </i>  &nbsp;{{trans('message.FreeDelivery')}} &nbsp; </p>
                    </div> <!-- card-body.// -->

                </div> <!-- card.// -->

            </aside> <!-- col.// -->


            <aside class="col-lg-3">

                <div class="card mb-3">
                    <div class="card-body">

                            <div class="form-group">
                                <label> {{trans('message.Havecoupon')}}</label>
                                @if(!Session::has('coupon'))
                                    <label class="checkbox-field">
                                        <input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox" wire:model="haveCouponCode"><span></span>
                                    </label>


                                @if($haveCouponCode == 1)

                                <div class="input-group">
                                    <form wire:submit.prevent="applyCouponCode">
                                        @if(Session::has('coupon_message'))
                                            <div class="alert alert-danger" role="danger">{{Session::get('coupon_message')}}</div>
                                        @endif


                                    <input type="text" class="form-control" name="" placeholder="{{trans('message.CouponCode')}}"  wire:model="couponCode">
                                            <br>
                                    <span class="input-group-append">

				<button class="btn btn-primary">{{trans('message.Apply')}}</button>
			</span>
                                    </form>

                                </div>


                                 @endif
                                @endif


                            </div>

                    </div> <!-- card-body.// -->
                </div> <!-- card.// -->

                <div class="card">
                    <div class="card-body">

                        <dl class="dlist-align">
                            <dt>{{trans('message.Subtotal')}}:</dt>
                            <dd class="text-right"> DZ {{Cart::instance('cart')->subtotal()}}</dd>
                        </dl>


                        @if(Session::has('coupon'))
                            <dl class="dlist-align">
                                <dt>{{trans('message.Discount')}}:</dt>
                                <dd class="text-right text-danger"><span class="title"> ({{Session::get('coupon')['code']}}) <a href="#" wire:click.prevent="removeCoupon"><i class="fa fa-times text-danger"></i></dd>
                            </dl>

                            <dl class="dlist-align">
                                <dt>{{trans('message.SubtotalwithDiscount')}}:</dt>
                                <dd class="text-right text-danger"> <b class="index">DZ{{number_format($subtotalAfterDiscount,2)}}</b></dd>
                            </dl>

                            <dl class="dlist-align">
                                <dt>{{trans('message.Tax')}} ({{config('cart.tax')}}%):</dt>
                                <dd class="text-right text-danger"> <b class="index">DZ {{number_format($taxAfterDiscount,2)}}</b></dd>
                            </dl>

                            <dl class="dlist-align">
                                <dt>{{trans('message.Total')}}:</dt>
                                <dd class="text-right text-dark b"><strong> DZ {{number_format($totalAfterDiscount,2)}}</b></strong></dd>
                            </dl>

                        @else

                            <dl class="dlist-align">
                                <dt>{{trans('message.Tax')}}:</dt>
                                <dd class="text-right text-danger"> {{Cart::instance('cart')->tax()}} </dd>
                            </dl>

                      {{--      <dl class="dlist-align">
                                <dt>Shipping:</dt>
                                <dd class="text-right text-dark"> Free Shipping </dd>
                            </dl>--}}

                            <dl class="dlist-align">
                                <dt>{{trans('message.Total')}}:</dt>
                                <dd class="text-right text-dark">{{Cart::instance('cart')->total()}} </dd>
                            </dl>

                        @endif




                        <hr>
                        <p class="text-center mb-3">

                        </p>
                        <a class="btn btn-primary btn-block" href="#" wire:click.prevent="checkout">{{trans('message.checkOut')}}</a>


                        <a  href="/shop" class="btn btn-light btn-block">{{trans('message.ContinueShopping')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div> <!-- card-body.// -->
                </div> <!-- card.// -->

            </aside> <!-- col.// -->


</div>
            @else


                <div class="text-center" style="padding:30px 0;">
                    <h1> {{trans('message.Yourcartisempty')}} </h1>
                    <p>{{trans('message.Additemstoitnow')}}</p>
                    <a href="/shop" class="btn btn-primary">{{trans('message.ShopNow')}}</a>
                </div>

            @endif





    </div>

</main>
