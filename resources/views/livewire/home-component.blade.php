<div class="">


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

</div>
