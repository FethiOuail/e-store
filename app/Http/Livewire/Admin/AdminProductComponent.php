<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{


    public function deleteProduct($id) {
        $product =Product::find($id);

        $image = $product->image;
        $images = $product->images;


        if(file_exists("assets/images/products'.'/'.$product->image")) {
            unlink('assets/images/products'.'/'.$product->image);
        }

        if($product->images)
        {
            $images = explode(",",$product->images);
            foreach($images as $image)
            {
                if($image)
                {

                    if(file_exists("assets/images/products'.'/'.$image")) {
                        unlink('assets/images/products'.'/'.$image);
                    }
                }
            }
        }

       // dd($image);
    //    dd($images);

        $product->delete();
        session()->flash('message','Product has been deleted successfully!');
    }



    public function render() {

        $products = Product::paginate(20);

        return view('livewire.admin.admin-product-component', ['products'=> $products])->layout('layouts.base');
    }
}
