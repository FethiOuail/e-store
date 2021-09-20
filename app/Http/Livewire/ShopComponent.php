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

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
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


    use WithPagination;




    public function render()
    {

        $categories  = Category::all();

        if($this->sorting=='date')
        {
            $products = Product::orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price")
        {
            $products = Product::orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price-desc")
        {
            $products = Product::orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else{
            $products = Product::paginate($this->pagesize);
        }
        return view('livewire.shop-component',['products'=> $products, 'categories' =>$categories])->layout("layouts.base");

        //  $products = Product::paginate(12);
        // return view('livewire.shop-component',['products'=> $products])->layout("layouts.base");
    }
}
