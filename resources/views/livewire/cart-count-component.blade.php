 <a href="{{ route('product.cart') }}" class="widget-header mr-2">
        <div class="icon">
            <i class="icon-sm rounded-circle border fa fa-shopping-cart"></i>
            @if ( Cart::instance('cart')->count() > 0)
                <span class="notify"> {{  Cart::instance('cart')->count() }}</span>
            @else

                <span class="notify">0</span>
            @endif

        </div>
    </a>

