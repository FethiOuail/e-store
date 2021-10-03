<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component {

    public $qty=1;
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }


    public function increaseQuantity()
    {
        $this->qty++;
    }

    public function decreseQuantity()
    {
        if($this->qty > 1)
        {
            $this->qty--;
        }
    }


    public function addToWishlist($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');

    }


    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
        }
    }


    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $rel_products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(7)->get();
        $pop_products = Product::inRandomOrder()->limit(4)->get();

        $sale = Sale::find(1);

        return view('livewire.details-component',['product'=>$product,'rel_products'=>$rel_products,'pop_products'=>$pop_products, 'sale' => $sale])->layout('layouts.base');
    }
}
