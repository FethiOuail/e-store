<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{

    public $sorting;
    public $pagesize;

    public $min_price=1;
    public $max_price=1000;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;

        $this->min_price = 1;
        $this->max_price = 1000;
    }



    public function store($product_id,$product_name,$product_price, $image,$slug)
    {

       // dd($image);

       Cart::instance('cart')->add($product_id,$product_name,1,$product_price, ['image'=>$image, 'slug'=>$slug])->associate('App\Models\Product');
      //  Cart::add('293ad', 'Product 1', 1, 9.99);

      //  dd(Cart::content());

        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
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

    use WithPagination;




    public function render()
    {

        $categories  = Category::all();

        if($this->sorting=='date')
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price")
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price-desc")
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else{
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize);
        }
        return view('livewire.shop-component',['products'=> $products, 'categories' =>$categories])->layout("layouts.base");

        //  $products = Product::paginate(12);
        // return view('livewire.shop-component',['products'=> $products])->layout("layouts.base");
    }
}
