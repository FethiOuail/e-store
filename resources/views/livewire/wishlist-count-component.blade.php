<a href="{{route('product.wishlist')}}" class="widget-header mr-2">
    <div class="icon">
        <i class="icon-sm rounded-circle border fa fa-heart"></i>
        @if(Cart::instance("wishlist")->count() > 0)
            <span class="notify">  {{Cart::instance("wishlist")->count() }}</span>
        @else

            <span class="notify">0</span>
        @endif

    </div>
</a>
