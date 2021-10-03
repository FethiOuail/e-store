
<main>
    <section class="section-pagetop bg">
        <div class="container">
            <h2 class="title-page"></h2>
            <nav>
                <ol class="breadcrumb text-white">
                    <li class="breadcrumb-item"><a href="#">{{trans('message.home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> {{trans('message.shop')}} </li>
                </ol>
            </nav>
        </div> <!-- container //  -->
    </section>
    <br>
    <section class="section-content padding ">
        <div class="container">

            <div class="row">
                <aside class="col-md-3">

                    <div class="card">
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                                    <i class="icon-control fa fa-chevron-down"></i>
                                    <h6 class="title"> {{trans('message.AllCategories')}} </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_1" style="">
                                <div class="card-body">


                                    <ul class="list-menu">
                                        @foreach($categories as $category )

                                            <li>
                                                <a href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}  </a>
                                            </li>


                                        @endforeach

                                    </ul>

                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group  .// -->


                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class="">
                                    <i class="icon-control fa fa-chevron-down"></i>
                                    <h6 class="title">{{trans('message.Pricerange')}}  </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_3" style="">
                                <div class="card-body">



                                </div><!-- card-body.// -->
                            </div>



                        </article> <!-- filter-group .// -->
                    </div> <!-- card.// -->

                </aside> <!-- col.// -->


                <main class="col-md-9" >

                    <header class="border-bottom mb-4 pb-3">
                        <div class="form-inline">

                            <select class="mr-md-auto mr-2 form-control" name="orderby" class="use-chosen" wire:model="pagesize">
                                <option value="12" selected="selected">12 {{trans('message.perpage')}}</option>
                                <option value="16">16 {{trans('message.perpage')}}</option>
                                <option value="18">18 {{trans('message.perpage')}}</option>
                                <option value="21">21 {{trans('message.perpage')}}</option>
                                <option value="24">24 {{trans('message.perpage')}}</option>
                                <option value="30">30 {{trans('message.perpage')}}</option>
                                <option value="32">32 {{trans('message.perpage')}}</option>
                            </select>

                            <select class="mr-2 form-control" name="orderby" class="use-chosen" wire:model="sorting">
                                <option value="default" selected="selected">{{trans('message.Defaultsorting')}}</option>
                                <option value="date">{{trans('message.Sortbynewness')}}</option>
                                <option value="price">{{trans('message.lowtohigh')}}</option>
                                <option value="price-desc">{{trans('message.hightolow')}}</option>
                            </select>

                            <div class="btn-group">
                                <a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title=""
                                   data-original-title="List view">
                                    <i class="fa fa-bars"></i></a>
                                <a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip" title=""
                                   data-original-title="Grid view">
                                    <i class="fa fa-th"></i></a>
                            </div>
                        </div>
                    </header><!-- sect-heading -->


                    @if($products->count() > 0)

                    <div class="row">

                        <style>
                            svg {
                                overflow: hidden;
                                vertical-align: middle;
                                display: none;
                            }
                        </style>



                        @php
                            $witems = Cart::instance('wishlist')->content()->pluck('id');
                        @endphp

                        @foreach ($products as $product)

                            <div class="col-md-4">
                                <figure class="card card-product-grid">
                                    <div class="img-wrap">
                                        <span class="badge badge-danger"> {{trans('message.NEW')}}  </span>
                                        <a href="{{route('product.details',['slug'=>$product->slug])}}"
                                           title="{{ $product->name }}">
                                            <img src="{{asset('assets/images/products/')}}/{{ $product->image }}"
                                                 alt="{{ $product->name }}">
                                        </a>

                                        <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                                    </div> <!-- img-wrap.// -->
                                    <figcaption class="info-wrap">
                                        <div class="fix-height">
                                            <a href="#" class="title"> {{ substr($product->name, 1, 50) }}.. </a>
                                            <div class="price-wrap mt-2">
                                                @if($product->sale_price)

                                                    <span class="price">{{$product->sale_price}}</span>
                                                    <small class="price-old "> <del>{{$product->regular_price}}</del></small>

                                                @else
                                                    <span class="price"> {{$product->regular_price}}  </span>
                                                @endif

                                            </div> <!-- price-wrap.// -->
                                        </div>
                                        <a href="#"  wire:click.prevent="store('{{$product->id}}','{{$product->name}}', '{{$product->regular_price}}','{{$product->image}}', '{{$product->slug}}')" class="btn btn-block btn-primary">{{trans('details.Addtocart')}} <i class="fas fa-shopping-cart"></i></a>
                                    </figcaption>
                                </figure>
                            </div> <!-- col.// -->

                        @endforeach



                    </div> <!-- row end.// -->



                    {{$products->links()}}

                    @else

                        <p style="padding-top: 30px;"> {{trans('message.NoProduct')}} </p>

                    @endif



                </main> <!-- col.// -->


            </div>

        </div> <!-- container .//  -->

    </section>

</main>




@push('scripts')

    <script>
        var slider = document.getElementById('slider');
        noUiSlider.create(slider, {
            start: [1, 1000],
            connect: true,
            range: {
                'min': 1,
                'max': 1000
            },
            pips: {
                mode: 'steps',
                stepped: true,
                density: 4
            }
        });

        slider.noUiSlider.on('update', function (value) {
        @this.set('min_price', value[0]);
        @this.set('max_price', value[1]);
        });
    </script>
@endpush

