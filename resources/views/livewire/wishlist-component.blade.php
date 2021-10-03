 <main class="">

        <section class="section-pagetop bg " style="padding: 10px">
            <div class="container">
                <h2 class="title-page">{{trans('message.Wishlist')}} </h2>
                <nav>
                    <ol class="breadcrumb text-white">
                        <li class="breadcrumb-item"><a href="/home"> {{trans('message.home')}} </a></li>

                        <li class="breadcrumb-item active" aria-current="page">{{trans('message.Wishlist')}}</li>
                    </ol>
                </nav>
            </div> <!-- container //  -->
        </section>

        <div class="container padding-top" >
            @if(Cart::instance('wishlist')->content()->count() > 0)
        <div class="row">
            @foreach (Cart::instance('wishlist')->content() as $item)
            <div class="col-md-4">
                <figure class="card card-product-grid">
                    <div class="img-wrap">
                        <span class="badge badge-danger"> NEW </span>
                        <img src="{{ asset('assets/images/products') }}/{{$item->model->image}}" alt="{{$item->model->name}}">
                        <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                    </div> <!-- img-wrap.// -->
                    <figcaption class="info-wrap">
                        <div class="fix-height">
                            <a href="{{route('product.details',['slug'=>$item->model->slug])}}" title="{{$item->model->regular_price}}" class="title">{{$item->model->name}}</a>
                            <div class="price-wrap mt-2">

                                <span class="price"> {{$item->model->regular_price}} </span>
                                <del class="price-old" {{$item->model->sale_price}}</del>
                            </div> <!-- price-wrap.// -->
                        </div>


                        <a href="#"  wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')"  class="btn btn-block btn-primary">{{trans('details.MoveToCart')}} <i class="fas fa-shopping-cart"></i> </a>
                        <a href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})"  class="btn  btn-outline-danger btn-block">{{trans('details.RemoveWishlist')}}  <i class="fas fa-heart text-danger"></i></a>
                    </figcaption>
                </figure>
            </div> <!-- col.// -->
            @endforeach



        </div> <!-- row end.// -->

            @else
                <h4>{{trans('message.Noiteminwishlist')}} </h4>
            @endif


</div>

 </main> <!-- col.// -->


