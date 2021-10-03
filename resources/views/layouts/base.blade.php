<!DOCTYPE HTML>

@if(App::getLocale('ar') == 'ar')
    <html lang="ar" dir="rtl">

    @else
        <html lang="en" dir="ltr">
        @endif

        <head>
            <meta charset="utf-8">
            <meta http-equiv="pragma" content="no-cache" />
            <meta http-equiv="cache-control" content="max-age=604800" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <title>MM Store</title>

            <link href="{{asset('assets/images/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">

            <!-- jQuery -->
            <script src="{{asset('assets/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>

            <!-- Bootstrap4 files-->
            <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>



            @if(App::getLocale('ar') == 'ar')

                <link rel="stylesheet" href="{{asset('assets/css/rtlbootstrap.css')}}"  >

            @else
                <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
        @endif


            <link rel="stylesheet" type="text/css" href="{{asset('assets/DataTables/datatables.min.css')}}"/>



            <!-- plugin: slickslider -->
            <link href="{{asset('assets/plugins/slickslider/slick.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/plugins/slickslider/slick-theme.css')}}" rel="stylesheet" type="text/css" />
            <script src="{{asset('assets/plugins/slickslider/slick.min.js')}}"></script>

            <!-- plugin: owl carousel  -->
            <link href="{{asset('assets/plugins/owlcarousel/assets/owl.carousel.css')}}" rel="stylesheet">
            <link href="{{asset('assets/plugins/owlcarousel/assets/owl.theme.default.css')}}" rel="stylesheet">
            <script src="{{asset('assets/plugins/owlcarousel/owl.carousel.min.js')}}"></script>



            <!-- Font awesome 5 -->
            <link href="{{asset('assets/fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet">

            <!-- custom style -->
            <link href="{{asset('assets/css/ui.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}"/>

            <link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css')}}"/>

            <!-- custom javascript -->
            <script src="{{asset('assets/js/script.js')}}" type="text/javascript"></script>

            <script type="text/javascript">
                /// some script

                // jquery ready start
                $(document).ready(function() {
                    // jQuery code

                });
                // jquery end
            </script>

            @stack('scripts_top')

            @livewireStyles
        </head>
        <body>

        @php
            $setting = DB::table('settings')->find(1)

        @endphp



        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
            <div class="brand-wrap " style="margin-right: 10px; margin-left: 10px">
                <img class="logo" src="{{asset('assets/images/logo2.png')}}">
            </div> <!-- brand-wrap.// -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link pl-0" data-toggle="" href="/"><strong> <i class="fa fa-home"></i> &nbsp {{__('message.home')}} </strong></a>

                </li>
            </ul>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav bg-dark m-0  p-3 p-lg-0">
                    <li class="d-inline d-lg-none">
                        <button data-toggle="collapse" data-target="#nav" class="close float-right">&times;</button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/shop"><i class="fa fa-shopping-bag"></i> {{trans('message.Shop')}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart"> <i class="fa fa-shopping-cart"></i> {{trans('message.Cart')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/checkout"> <i class="fa fa-shipping-fast"></i> {{trans('message.checkout')}} </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"> <i class="fa fa-info-circle"></i> {{ trans('footer.About_us')  }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}"> <i class="fa fa-info-circle"></i> {{ trans('message.contactUs')  }}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-language"></i> @if (App::getLocale('ar') == 'ar') العربية

                            @else
                                English
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" style="max-width: 100px;">
                            <li><a class="dropdown-item" href="{{ route('set.language', 'ar') }}">Arabic</a></li>
                            <li><a class="dropdown-item" href="{{ route('set.language', 'en') }}">English </a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>

        <br>
        <br>

        <header class="section-header py-2">


            <section class="header-main border-bottom">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-sm-12">



                            @livewire('header-search-component')


                        </div> <!-- col.// -->
                        <div class="col-lg-5 col-xl-4 col-sm-12">
                            <div class="widgets-wrap float-md-right">
                                @livewire('wishlist-count-component')


                                @livewire('cart-count-component')

                            </div>
                                <div class="widget-header icontext">
                                    <a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
                                    <div class="text">

                                        @if (Route::has('login'))

                                            @auth

                                                @if (Auth::user()->utype === 'ADM')
                                                    <span class=""> {{ trans('message.Welcome') }}  {{Auth::user()->name}}</span>
                                                    <ul class="navbar-nav">

                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"> My Account</a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" title="Dashboard" href="{{ route('admin.dashboard') }}"> {{trans('message.Dashboard')}} </a>


                                                            <a  class="dropdown-item"  title="Categories" href="{{route('admin.categories')}}"> {{trans('message.Categories')}} </a>
                                                            <a  class="dropdown-item" title="All Products" href="{{ route('admin.products') }}">{{trans('message.AllProducts')}}</a>
                                                            <a  class="dropdown-item" title="Manage Home Slider" href="{{route('admin.homesliders')}}">{{trans('message.ManageHomeSlider')}}</a>
                                                            <a class="dropdown-item"  title="Manage Home Categories" href="{{route('admin.homecategories')}}">{{trans('message.ManageHomeCategories')}}</a>
                                                            <a class="dropdown-item"  href="{{route('admin.onsale')}}">{{trans('message.SaleSetting')}}</a>


                                                            <a class="dropdown-item"  href="{{route('admin.coupons')}}"> {{trans('message.AllCoupon')}} </a>

                                                            <a class="dropdown-item"  href="{{route('admin.orders')}}">{{trans('message.AllOrders')}} </a>
                                                            <a class="dropdown-item"  href="{{route('admin.setting')}}">{{trans('message.Settings')}} </a>

                                                            <a class="dropdown-item"  title="Contact Us Messages" href="{{route('admin.contact')}}">  {{trans('message.ContactUsMessages')}}</a>

                                                            <div class="dropdown-divider"></div>
                                                            <form id="logout-form" method="POST" action=" {{ route('logout') }} ">
                                                                @csrf

                                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">  {{trans('message.Logout')}}</a>

                                                            </form>
                                                        </div>
                                                    </li>
                                                @else

                                                            <span class=""> {{ trans('message.Welcome') }}  {{Auth::user()->name}}</span>
                                                            <ul class="navbar-nav">

                                                                <li class="nav-item dropdown">
                                                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"> My Account</a>
                                                                    <div class="dropdown-menu">

                                                                        <a  class="dropdown-item"  title="Dashboard" href="{{ route('user.dashboard') }}"> {{ trans('message.Dashboard') }}  </a>
                                                                        <a  class="dropdown-item"  title="Dashboard" href="{{ route('user.changepassword') }}">{{ trans('message.ChangePassword') }}   </a>
                                                                        <a  class="dropdown-item"  title="Dashboard" href="{{ route('user.orders') }}">{{ trans('message.MyOrders') }}   </a>




                                                                <div class="dropdown-divider"></div>
                                                                        <form id="logout-form" method="POST" action=" {{ route('logout') }} ">
                                                                            @csrf

                                                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ trans('message.Logout') }}  </a>

                                                                        </form>
                                                                    </div>
                                                                </li>


                                                @endif

                                            @else
                                                <div>
                                                    <a href="{{ route('login') }}">{{ trans('message.Signin') }}</a>
                                                    <a href="{{ route('register')}}"> {{ trans('message.Register') }} </a>
                                                </div>
                                            @endif

                                        @endif

                                        </ul>
                                    </div>
                                </div>

                            </div> <!-- widgets-wrap.// -->
                        </div> <!-- col.// -->
                    </div>


            </section> <!-- header-main .// -->


        </header> <!-- section-header.// -->




        {{$slot}}






        <!-- ========================= FOOTER ========================= -->

        @livewire('footer-component')
        <!-- ========================= FOOTER END // ========================= -->



        <script type="text/javascript" src="{{asset('assets/DataTables/datatables.min.js')}}"></script>
        @livewireScripts

        <script  src="{{ asset('assets/js/nouislider.min.js')}}"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        @stack('scripts')





        </body>


        </html>
