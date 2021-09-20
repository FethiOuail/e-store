<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class CategoryComponent extends Component
{

    public $sorting;
    public $pagesize;
    public $category_slug;


    public function mount($category_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
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
        $category = Category::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;


      //  dd($category);



        if($this->sorting=='date')
        {
            $products = Product::where('category_id', $category_id)->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price")
        {
            $products = Product::where('category_id', $category_id)->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price-desc")
        {
            $products = Product::where('category_id', $category_id)->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else{
            $products = Product::where('category_id', $category_id)->paginate($this->pagesize);
        }
        $categories  = Category::all();

       // dd($products);

        return view('livewire.category-component',['products'=> $products, 'categories' =>$categories, 'category_name'=>$category_name])->layout("layouts.base");

        //  $products = Product::paginate(12);
        // return view('livewire.shop-component',['products'=> $products])->layout("layouts.base");
    }
}
