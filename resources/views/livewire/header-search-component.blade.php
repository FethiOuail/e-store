
<form action="{{route('product.search')}}" class="search-wrap">
    <div class="input-group w-100">
        <input type="text"  name="search" value="{{$search}}" class="form-control" style="width:55%;" placeholder="{{trans('message.Search')}}">
        <input type="hidden" name="product_cat" value="{{$product_cat}}" id="product-cate">
        <input type="hidden" name="product_cat_id" value="{{$product_cat_id}}" id="product-cate-id">
        <select class="custom-select" name="category_name">

            <option value=""> {{trans('message.AllCategory')}} </option>

            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name }}</option>
            @endforeach
        </select>

        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
</form> <!-- search-wrap .end// -->
