<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{

    public function store($product_id,$product_name,$product_price, $image,$slug)
    {

       // dd($image);

       Cart::instance('cart')->add($product_id,$product_name,1,$product_price, ['image'=>$image, 'slug'=>$slug])->associate('App\Models\Product');
      //  Cart::add('293ad', 'Product 1', 1, 9.99);

      //  dd(Cart::content());

        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }


    use WithPagination;




    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.shop-component',['products'=> $products])->layout("layouts.base");
    }
}
