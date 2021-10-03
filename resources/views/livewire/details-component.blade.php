@push('scripts_top')

    <script type="text/javascript">
        /// some script

        // jquery ready start
        $(document).ready(function() {
            // jQuery code




            /////////////////  items slider. /plugins/slickslider/
            if ($('.slider-custom-slick').length > 0) { // check if element exists
                $('.slider-custom-slick').slick({
                    infinite: true,
                    slidesToShow: 2,
                    dots: true,
                    prevArrow: $('.slick-prev-custom'),
                    nextArrow: $('.slick-next-custom')
                });
            } // end if



            /////////////////  items slider. /plugins/slickslider/
            if ($('.slider-items-slick').length > 0) { // check if element exists
                $('.slider-items-slick').slick({
                    infinite: true,
                    swipeToSlide: true,
                    slidesToShow: 4,
                    dots: true,
                    slidesToScroll: 2,
                    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
                    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
                    responsive: [
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2
                            }
                        },
                        {
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 1
                            }
                        }
                    ]
                });
            } // end if



            /////////////////  items slider. /plugins/owlcarousel/
            if ($('.slider-banner-owl').length > 0) { // check if element exists
                $('.slider-banner-owl').owlCarousel({
                    loop:true,
                    margin:0,
                    items: 1,
                    dots: false,
                    nav:true,
                    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                });
            } // end if

            /////////////////  items slider. /plugins/owlslider/
            if ($('.slider-items-owl').length > 0) { // check if element exists
                $('.slider-items-owl').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:true,
                    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                    responsive:{
                        0:{
                            items:1
                        },
                        640:{
                            items:3
                        },
                        1024:{
                            items:4
                        }
                    }
                })
            } // end if

            /////////////////  items slider. /plugins/owlcarousel/
            if ($('.slider-custom-owl').length > 0) { // check if element exists
                var slider_custom_owl = $('.slider-custom-owl');
                slider_custom_owl.owlCarousel({
                    loop: true,
                    margin:15,
                    items: 2,
                    nav: false,
                });

                // for custom navigation
                $('.owl-prev-custom').click(function(){
                    slider_custom_owl.trigger('prev.owl.carousel');
                });

                $('.owl-next-custom').click(function(){
                    slider_custom_owl.trigger('next.owl.carousel');
                });

            } // end if



        });
        // jquery end
    </script>
@endpush


<div class="container ">



    @php
        $witems = Cart::instance('wishlist')->content()->pluck('id');
    @endphp

    <br>

    <div class="card">
        <div class="row no-gutters">
            <aside class="col-md-6">
                <article class="gallery-wrap">
                    <div class="img-big-wrap"  wire:ignore>
                        <div> <a href="#"><img  id="dataimage" src="{{asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}" style="height: 350px !important;"></a></div>
                    </div> <!-- slider-product.// -->
                    <div class="thumbs-wrap">
                        @php
                            $images = explode(",",$product->images);
                        @endphp
                        @foreach($images as $image)
                            @if($image)
                        <a href="#" class="item-thumb"> <img class="imgdata" data-src="{{ asset('assets/images/products') }}/{{$image}}" src="{{ asset('assets/images/products') }}/{{$image}}"></a>

                            @endif
                        @endforeach



                    </div> <!-- slider-nav.// -->
                </article> <!-- gallery-wrap .end// -->
            </aside>




            <main class="col-md-6 border-left">
                <article class="content-body">

                    <h2 class="title"> {{$product->name}}  </h2>

                    <style>
                        .color-gray {
                            color: #e6e6e6 !important;
                        }

                    </style>

                    @php
                        $avgrating = 0;
                        $avgratings = 0;
                        $avg = 0;
                    @endphp

                    @foreach($product->orderItems->where('rstatus', 1) as $orderItem)

                        @php
                            $avgrating = $avgrating + $orderItem->review->rating;

                        @endphp

                    @endforeach



                    @php
                    $avg = $avgrating * 100 / 5;

                    @endphp

                    <div class="rating-wrap my-3">
                        <ul class="rating-stars">
                            <li style="width:{{$avg}}%" class="stars-active">
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </li>
                            <li>
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </li>
                        </ul>
                        <small class="label-rating text-muted"> {{$product->orderItems->where('rstatus',1)->count()}} {{trans('details.reviews')}} </small>
                        <small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154  {{trans('details.orders')}}  </small>
                    </div> <!-- rating-wrap.// -->

                    <div class="mb-3">
                        <var class="price h4">

                            @if($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())

                                <div class="wrap-price">
                                    <span class="product-price">DZ {{$product->sale_price}}</span>
                                    <del><span class="product-price text-danger salep">DZ {{$product->regular_price}}</span></del>
                                </div>

                            @else
                                <div class="wrap-price"><span class="product-price">DZ {{$product->regular_price}}</span></div>
                            @endif


                        </var>
                        <span class="text-muted"> </span>
                    </div> <!-- price-detail-wrap .// -->

                    <p>   {{$product->short_description}} </p>

                    <div class="stock-info in-stock">
                        <p class="availability">{{trans('details.Availability')}} : <b>  {{$product->stock_status}}</b></p>
                    </div>


                    <hr>
                    <div class="form-row"  wire:ignore>
                        <div class="form-group col-md flex-grow-0">
                            <label>{{trans('details.Quantity')}}</label>
                            <div class="input-group mb-3 input-spinner">
                                <div class="input-group-prepend">
                                    <button class="btn btn-light" type="button" id="button-plus"  wire:click.prevent="increaseQuantity"> + </button>
                                </div>
                                <input type="text" class="form-control" value="1" data-max="120" pattern="[0-9]*" wire:model="qty">
                                <div class="input-group-append">
                                    <button class="btn btn-light" type="button" id="button-minus"  wire:click.prevent="decreseQuantity"> − </button>
                                </div>
                            </div>
                        </div> <!-- col.// -->



                    </div> <!-- row.// -->

                    @if($product->sale_price > 0  && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                        <a href="#" class="btn  btn-outline-primary" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"><span class="text">{{trans('details.Addtocart')}}</span> <i class="fas fa-shopping-cart"></i></a>

                    @else
                        <a href="#" class="btn  btn-outline-primary" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><span class="text">{{trans('details.Addtocart')}}</span> <i class="fas fa-shopping-cart"></i></a>

                    @endif


                    @if($witems->contains($product->id))
                        <a href="#"  wire:click.prevent="removeFromWishlist({{$product->id}})" class="btn  btn-outline-danger"><span class="Add Wishlist">{{trans('details.RemoveWishlist')}}</span> <i class="fas fa-heart text-danger"></i></a>


                    @else

                        <a href="#"  wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->regular_price}})" class="btn  btn-outline-danger"><span class="Add Wishlist">{{trans('details.AddWishlist')}}</span> <i class="fas fa-heart text-danger"></i></a>

                    @endif




                </article> <!-- product-info-aside .// -->
            </main> <!-- col.// -->
        </div> <!-- row.// -->
    </div>


    <br>


    <div class="row " >

        <div class="container" >

            <div class="card " style="padding: 10px">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> {{trans('details.description')}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{trans('details.reviews')}} </a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        {{$product->description}}
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">



                        <div id="comments">
                            <h2 class="woocommerce-Reviews-title">{{$product->orderItems->where('rstatus',1)->count()}} {{trans('details.reviewfor')}}  <span>{{$product->name}}</span></h2>
                            <ol class="commentlist">
                                @foreach($product->orderItems->where('rstatus',1) as $orderItem)

                                        <div id="comment-20" class="">

                                            <div class="row">

                                                <div class="">
                                                    <img alt="" src="{{ asset('assets/images/avatar.jpg') }}" height="40" width="40">

                                                </div>

                                                <div class="col-8" style="">
                                                        <div class="rating-wrap my-3">


                                                            <ul class="rating-stars">
                                                                <li style="width:{{$avg}}%" class="stars-active">
                                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </li>
                                                            </ul>
                                                            <span class="">Rated <strong class="rating">{{$orderItem->review->rating}}</strong> out of 5</span>

                                                        </div> <!-- rating-wrap.// -->

                                                        <p class="meta">
                                                            <strong class="woocommerce-review__author">{{$orderItem->order->user->name}}</strong>
                                                            <span class="woocommerce-review__dash">–</span>
                                                            <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A')}}</time>
                                                        </p>
                                                    <b>{{$orderItem->review->comment}}</b>
                                                        <div class="description">

                                                        </div>

                                                    </div>

                                                </div>



                                            </div>

                                    <hr>

                                @endforeach
                            </ol>
                        </div><!-- #comments -->
                    </div>
                </div>

            </div>
        </div>

    </div>

    <br><br>

    <style>

        .owl-stage-outer{
            position:relative;
            overflow:hidden;
            -webkit-transform:translate3d(0,0,0);
            direction: ltr;
        }

    </style>

    <div class="row " wire:ignore >
        <h4>{{trans('details.RelatedProducts')}} </h4>



        <!-- ============== COMPONENT SLIDER ITEMS OWL  ============= -->
        <div class="slider-items-owl owl-carousel owl-theme " >

            @foreach ($rel_products as $r_product)

                <div class="item-slide">


                    <figure class="card card-product-grid">
                        <div class="img-wrap">
				<span class="topbar">
				@if($r_product->featured)	<span class="badge badge-success">  {{trans('message.NEW')}}  </span> @endif
				</span>
                            <a href="{{route('product.details',['slug'=>$r_product->slug])}}" title="{{$r_product->name}}">
                                <img src="{{asset('assets/images/products')}}/{{$r_product->image}}">
                            </a>
                        </div>
                        <figcaption class="info-wrap border-top">
                            <a href="{{route('product.details',['slug'=>$r_product->slug])}}" title="{{$r_product->name}}" class="title">{{ substr($r_product->name, 1, 50) }}.. </a>
                            <div class="price-wrap mt-2">


                                @if($r_product->sale_price)

                                    <span class="price">{{$r_product->sale_price}}</span>
                                    <small class="price-old "> <del>{{$r_product->regular_price}}</del></small>

                                @else
                                    <span class="price"> {{$r_product->regular_price}}  </span>
                                @endif


                                <span class="float-right text-danger"> @if( $r_product->stock_status === "outofstock") {{trans('message.outofstock')}} @endif</span>
                            </div> <!-- price-wrap.// -->
                        </figcaption>
                    </figure> <!-- card // -->

               {{--     <figure class="card card-product-grid">
                        <div class="img-wrap">
                            <span class="badge badge-danger"> New </span>
                            <a href="{{route('product.details',['slug'=>$r_product->slug])}}" title="{{$r_product->name}}">

                            <img  src="{{asset('assets/images/products')}}/{{$r_product->image}}" >
                            </a>
                        </div>
                        <figcaption class="info-wrap text-center">
                            <h6 class="title text-truncate"><a href="{{route('product.details',['slug'=>$r_product->slug])}}" title="{{$r_product->name}}">  {{$r_product->name}} </a></h6>
                        </figcaption>
                    </figure> <!-- card // -->--}}


                </div>


            @endforeach



        </div>
        <!-- ============== COMPONENT SLIDER ITEMS OWL .end // ============= -->


    </div>

    <br><br>


</div>




{{--
<main id="main" class="main-site">



    <style> .salep {
            font-family: 'Lato', san-serif;
            font-weight: 300;
            font-size: 13px !important;
            color: #aaaaaa !important;
            text-decoration: line-through;
            padding-left:10px;  } </style>

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
            </ul>
        </div>


        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery" wire:ignore>
                            <ul class="slides">

                                <li data-thumb="{{asset('assets/images/products')}}/{{$product->image}}">
                                    <img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}} " style="height: 350px !important;" />
                                </li>

                                @php
                                    $images = explode(",",$product->images);
                                @endphp
                                @foreach($images as $image)
                                    @if($image)
                                        <li data-thumb="{{ asset('assets/images/products' ) }}/{{$image}}">
                                            <img src="{{ asset('assets/images/products') }}/{{$image}}" alt="{{$product->name}}"  style="height: 350px !important;" />
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="detail-info">
                        <div class="product-rating">

                            <style>
                                .color-gray {
                                    color: #e6e6e6 !important;
                                }

                            </style>


                            @php
                                $avgrating = 0;
                            @endphp

                            @foreach($product->orderItems->where('rstatus', 1) as $orderItem)

                                @php
                                    $avgrating = $avgrating + $orderItem->review->rating;
                                @endphp


                            @endforeach

                            @for($i=1; $i<=5; $i++)
                                @if($i <= $avgrating )
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                @endif
                            @endfor


                            <a href="#" class="count-review">( {{$product->orderItems->where('rstatus', 1)->count()}} review)</a>

                        </div>
                        <h2 class="product-name"> {{$product->name}} </h2>
                        <div class="short-desc">
                            <ul>
                                {{$product->short_description}}
                            </ul>
                        </div>
                        <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="{{asset('assets/images/social-list.png')}}" alt=""></a>
                        </div>

                        @if($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())

                            <div class="wrap-price">
                                <span class="product-price">DZ {{$product->sale_price}}</span>
                                <del><span class="product-price salep">DZ {{$product->regular_price}}</span></del>
                            </div>

                        @else
                            <div class="wrap-price"><span class="product-price">DZ {{$product->regular_price}}</span></div>
                        @endif

                        <div class="stock-info in-stock">
                            <p class="availability">Availability: <b>  {{$product->stock_status}}</b></p>
                        </div>
                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" wire:model="qty" >

                                <a class="btn btn-reduce" href="#" wire:click.prevent="decreseQuantity"></a>
                                <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity" ></a>
                            </div>
                        </div>
                        <div class="wrap-butons">
                            @if($product->sale_price > 0  && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})">Add to Cart</a>

                            @else
                                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add to Cart</a>

                            @endif

                            <div class="wrap-btn">
                                <a href="#" class="btn btn-compare">Add Compare</a>
                                <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                            </div>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">description</a>
                            <a href="#review" class="tab-control-item">Reviews</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                {{$product->description}}
                            </div>


                            <div class="tab-content-item " id="review">

                                <div class="wrap-review-form">
                                    <style>
                                        .width-0-percent{
                                            width:0%;
                                        }
                                        .width-20-percent{
                                            width:20%;
                                        }
                                        .width-40-percent{
                                            width:40%;
                                        }
                                        .width-60-percent{
                                            width:60%;
                                        }
                                        .width-80-percent{
                                            width:80%;
                                        }
                                        .width-100-percent{
                                            width:100%;
                                        }
                                    </style>


                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">{{$product->orderItems->where('rstatus',1)->count()}} review for <span>{{$product->name}}</span></h2>
                                        <ol class="commentlist">
                                            @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                    <div id="comment-20" class="comment_container">
                                                        <img alt="" src="{{ asset('assets/images/avatar.jpg') }}" height="80" width="80">
                                                        <div class="comment-text">
                                                            <div class="star-rating">
                                                                <span class="width-{{  $orderItem->review->rating * 20 }}-percent">Rated <strong class="rating">{{$orderItem->review->rating}}</strong> out of 5</span>
                                                            </div>
                                                            <p class="meta">
                                                                <strong class="woocommerce-review__author">{{$orderItem->order->user->name}}</strong>
                                                                <span class="woocommerce-review__dash">–</span>
                                                                <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A')}}</time>
                                                            </p>
                                                            <div class="description">
                                                                <p>{{$orderItem->review->comment}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div><!-- #comments -->

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Free Shipping</b>
                                        <span class="subtitle">On Oder Over $99</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Special Offer</b>
                                        <span class="subtitle">Get a gift!</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Order Return</b>
                                        <span class="subtitle">Return within 7 days</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">

                            @foreach ($pop_products as $p_product)



                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="{{route('product.details',['slug'=>$p_product->slug])}}" title=" {{$p_product->name}} ">
                                                <figure><img src="{{asset('assets/images/products')}}/{{$p_product->image}}" alt=" {{$p_product->name}} "></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span> {{$p_product->name}} </span></a>
                                            <div class="wrap-price"><span class="product-price">DZ {{$p_product->regular_price}}</span></div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div><!--end sitebar-->

            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Related Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                            @foreach ($rel_products as $r_product)

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('product.details',['slug'=>$r_product->slug])}}" title="{{$r_product->name}}">
                                            <figure><img src="{{asset('assets/images/products')}}/{{$r_product->image}}" width="214" height="214" alt="{{$r_product->name}}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>  {{$r_product->name}} </span></a>
                                        <div class="wrap-price"><span class="product-price">DZ {{$r_product->regular_price}}</span></div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div><!--End wrap-products-->
                </div>

            </div>


        </div><!--end row-->

    </div><!--end container-->

</main>


--}}



@push('scripts')

    <script type="text/javascript">
        /// some script
            $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
            })


        $('.imgdata').on('click', function (e) {
            e.preventDefault()

            var  getDefaultImg = $(this).data("src");


            $("#dataimage").attr("src", getDefaultImg);

            console.log(getDefaultImg);

        })

        </script>

    @endpush





