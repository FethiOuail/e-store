
@push('scripts_top')
<script>
    // jquery ready start
    $(document).ready(function() {
    // jQuery code
    /////////////////  items slider. /plugins/slickslider/
    if ($('.slider-banner-slick').length > 0) { // check if element exists
    $('.slider-banner-slick').slick({
    infinite: true,
    autoplay: true,
    slidesToShow: 1,
    dots: false,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
    });
    } // end if

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

<style>

    .owl-stage-outer{
        position:relative;
        overflow:hidden;
        -webkit-transform:translate3d(0,0,0);
        direction: ltr;
    }

</style>

<section class="section-main bg padding-y">




<div class="container">

    <div class="row">
        <aside class="col-md-3">
            <nav class="card">
                <ul class="menu-category">

                    @foreach($categories as $category )
                        <li><a  href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}</a></li>

                    @endforeach



                    <li class="has-submenu"><a href="#">More items</a>
                        <ul class="submenu">
                            <li><a href="#">Submenu name</a></li>
                            <li><a href="#">Great submenu</a></li>
                            <li><a href="#">Another menu</a></li>
                            <li><a href="#">Some others</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside> <!-- col.// -->


        <div class="col-md-9 " dir="ltr">

                    <!-- ============== COMPONENT SLIDER SINGLE SLICK  ============= -->
                    <div class="slider-banner-slick">
                        @foreach ($sliders as $slide)

                            <div class="item-slide banner-wrap" >

                                <div class="row   d-flex justify-content-center  " style="position: relative;">


                                    <img class="" src="{{ asset('assets/images/sliders') }}/{{$slide->image}}" height="311px" alt="">


                                    <article class="carousel-caption d-none d-md-block" style="top: 30%;bottom: 20%;">

                                        <h5 class="text-dark">{{$slide->title}}</h5>
                                        <span class="text-dark subtitle">{{$slide->subtitle}}</span>
                                        <a href="{{$slide->link}}" class="btn btn-primary">Shop Now</a>
                                    </article>



                                </div>


                            </div>
                        @endforeach

                    </div>

        </div>


    </div> <!-- row.// -->
</div>
</section>

{{--


<section class="section-content padding-y">
    <div class="container">









    </div> <!-- container .//  -->
</section>



<main id="main">
    <div class="container">


        <!--MAIN SLIDE-->




        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                 data-dots="false">
                @foreach ($sliders as $slide)
                    <div class="item-slide">
                        <img src="{{ asset('assets/images/sliders') }}/{{$slide->image}}" alt="" class="img-slide">
                        <div class="slide-info slide-1">
                            <h2 class="f-title"><b>{{$slide->title}}</b></h2>
                            <span class="subtitle">{{$slide->subtitle}}</span>
                            <p class="sale-info">Only price: <span class="price">${{$slide->price}}</span></p>
                            <a href="{{$slide->link}}" class="btn-link">Shop Now</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!--BANNER-->
        <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{asset('assets/images/home-1-banner-1.jpg')}}" alt="" width="580" height="190">
                    </figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{asset('assets/images/home-1-banner-2.jpg')}}" alt="" width="580" height="190">
                    </figure>
                </a>
            </div>
        </div>

        <!--On Sale-->

        @if($sproducts->count() > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now() )
            <div class="wrap-show-advance-info-box style-1 has-countdown">
                <h3 class="title-box">On Sale</h3>
                <div class="wrap-countdown mercado-countdown"
                     data-expire="{{ Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s') }}"></div>
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                     data-loop="false" data-nav="true" data-dots="false"
                     data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                    @foreach ($sproducts as $sproduct)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('product.details',['slug'=>$sproduct->slug])}}"
                                   title="{{$sproduct->name}}">
                                    <figure><img class="imageproduct"
                                                 src="{{ asset('assets/images/products') }}/{{$sproduct->image}}"
                                                 width="800" height="800" alt=""></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{route('product.details',['slug'=>$sproduct->slug])}}"
                                   class="product-name"><span>{{$sproduct->name}}</span></a>
                                <div class="wrap-price">
                                    <ins><p class="product-price">${{$sproduct->sale_price}}</p></ins>
                                    <del><p class="product-price">${{$sproduct->regular_price}}</p></del>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    @endif

    <!--Latest Products-->

        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Latest Products</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/digital-electronic-banner.jpg') }}" width="1170"
                                 height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                 data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                 data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($lproducts as $lproduct)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{route('product.details',['slug'=>$lproduct->slug])}}"
                                               title="{{$lproduct->name}}">
                                                <figure><img class="imageproduct"
                                                             src="{{ asset('assets/images/products') }}/{{$lproduct->image}}"
                                                             width="800" height="800" alt="{{$lproduct->name}}">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('product.details',['slug'=>$lproduct->slug])}}"
                                               class="product-name"><span>{{$lproduct->name}}</span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">${{$lproduct->regular_price}}</span></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Product Categories</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/fashion-accesories-banner.jpg') }}" width="1170"
                                 height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        @foreach ($categories as $key=>$category)
                            <a href="#category_{{$category->id}}"
                               class="tab-control-item {{$key==0 ? 'active':''}}">{{$category->name}}</a>
                        @endforeach
                    </div>

                    <div class="tab-contents">
                        @foreach ($categories as $key=>$category)
                            <div class="tab-content-item {{$key==0 ? 'active':''}}" id="category_{{$category->id}}">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                     data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                     data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                    @php
                                        $c_products = DB::table('products')->where('category_id',$category->id)->get()->take($no_of_products);
                                    @endphp
                                    @foreach ($c_products as $c_product)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{route('product.details',['slug'=>$c_product->slug])}}"
                                                   title="{{$c_product->name}}">
                                                    <figure><img
                                                            src="{{ asset('assets/images/products') }}/{{$c_product->image}}"
                                                            width="800" height="800" alt="{{$c_product->name}}">
                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{route('product.details',['slug'=>$c_product->slug])}}"
                                                   class="product-name"><span>{{$c_product->name}}</span></a>
                                                <div class="wrap-price"><span
                                                        class="product-price">${{$c_product->regular_price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

--}}

{{--

<div class="row">
    <aside class="col-md-12" style="">

        <!-- ============== COMPONENT SLIDER SINGLE SLICK  ============= -->
        <div class="slider-banner-slick">
            @foreach ($sliders as $slide)

                <div class="item-slide " >

                    <div class="row     " style="position: relative;">


                        <img class="" src="{{ asset('assets/images/sliders') }}/{{$slide->image}}" alt="">


                        <article class="carousel-caption d-none d-md-block" style="top: 40%;bottom: 50%;">

                            <h5 class="text-dark">{{$slide->title}}</h5>
                            <span class="text-dark subtitle">{{$slide->subtitle}}</span>
                            <a href="{{$slide->link}}" class="btn btn-primary">Shop Now</a>
                        </article>



                    </div>


                </div>
            @endforeach

        </div>
        <!-- ============== COMPONENT SLIDER SINGLE SLICK .end // ============= -->
        <br><br>
    </aside> <!-- col.// -->

</div>--}}
