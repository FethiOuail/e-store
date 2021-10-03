<!-- ========================= FOOTER ========================= -->
<footer class="section-footer border-top bg">
    <div class="container">
        <section class="footer-top  padding-y">
            <div class="row">

                <aside class="col-md">
                    <h6 class="title">{{ trans('footer.Company') }}</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#"> {{ trans('footer.About_us') }}</a></li>
                        <li> <a href="#"> {{ trans('footer.Career') }}</a></li>
                        <li> <a href="#"> {{ trans('footer.Find_a_store') }}</a></li>
                        <li> <a href="#"> {{ trans('footer.Rules_and_terms') }}</a></li>
                        <li> <a href="#"> {{ trans('footer.Sitemap') }}</a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">{{ trans('footer.Help') }}</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#"> {{ trans('footer.Contact_us') }}</a></li>
                        <li> <a href="#"> {{ trans('footer.Money_refund') }}</a></li>
                        <li> <a href="#"> {{ trans('footer.Order_status') }}</a></li>
                        <li> <a href="#"> {{ trans('footer.Shipping_info') }}</a></li>
{{--
                        <li> <a href="#"> {{ trans('footer.Open_dispute') }}</a></li>
--}}
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">{{ trans('footer.Account') }}</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#"> {{ trans('footer.User_Login') }} </a></li>
                        <li> <a href="#"> {{ trans('footer.User_register') }} </a></li>
                        <li> <a href="#"> {{ trans('footer.Account_Setting') }} </a></li>
                        <li> <a href="#"> {{ trans('footer.My_Orders') }} </a></li>
                    </ul>
                </aside>

                <aside class="col-md">
                    <h6 class="title">{{ trans('footer.Social') }}</h6>
                    <ul class="list-unstyled">

                        <li><a href="#"> <i class="fab fa-facebook"></i> {{ trans('footer.Facebook') }} </a></li>
                        <li><a href="#"> <i class="fab fa-twitter"></i> {{ trans('footer.Twitter') }} </a></li>
                        <li><a href="#"> <i class="fab fa-instagram"></i> {{ trans('footer.Instagram') }} </a></li>
                        <li><a href="#"> <i class="fab fa-youtube"></i> {{ trans('footer.Youtube') }} </a></li>
                    </ul>
                </aside>
            </div> <!-- row.// -->
        </section>	<!-- footer-top.// -->

        <section class="footer-bottom row">
            <div class="col-md-2">
                <p class="text-muted"> &copy Ouail Anwar Kamel  </p>
            </div>
            <div class="col-md-8 text-md-center">
           {{--     <span  class="px-2">{{ $setting->email }}</span>
                <span  class="px-2">{{ $setting->phone }} || {{ $setting->phone2 }} </span>
                <span  class="px-2"> {{ $setting->address }} </span>--}}
            </div>
            <div class="col-md-2 text-md-right text-muted">
                <i class="fab fa-lg fa-cc-visa"></i>
                <i class="fab fa-lg fa-cc-paypal"></i>
                <i class="fab fa-lg fa-cc-mastercard"></i>
            </div>
        </section>
    </div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->

