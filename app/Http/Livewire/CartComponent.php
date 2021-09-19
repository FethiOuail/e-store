<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{


    public function increaseQuantity($rowId) {

        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);

    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
    }




    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message','Item has been removed');
    }



    public function destroyAll() {
       // Cart::destroy();
        Cart::instance('cart')->destroy();
        session()->flash('success_message','All Item are removed');
    }


    public function render() {
        return view('livewire.cart-component')->layout('layouts.base');;
    }
}
