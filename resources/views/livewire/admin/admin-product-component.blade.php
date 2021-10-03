
<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>



<div class="container">

    <br>
    <div class="row">
        <div class="col-md-6">

            {{trans('message.AllProducts')}}
        </div>
        <div class="col-md-6">
            <a href="{{ route('admin.addproduct') }}" class="btn btn-success pull-right">{{trans('message.Add')}}</a>

        </div>
    </div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Id</th>
            <th>{{trans('message.Image')}}</th>
            <th> {{trans('message.Name')}}</th>
            <th>{{trans('message.Stock')}}</th>
            <th> {{trans('message.Price')}}</th>
            <th>{{trans('message.SalePrice')}}</th>
            <th>{{trans('message.Category')}}</th>
            <th>{{trans('message.Date')}}</th>
            <th>{{trans('message.Action')}}</th>
        </tr>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><img src="{{asset('assets/images/products')}}/{{$product->image}}" width="60" /></td>
                <td>{{$product->name}}</td>
                <td>{{$product->stock_status}}</td>
                <td>{{$product->regular_price}}</td>
                <td>{{$product->sale_price}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->created_at}}</td>
                <td>

                    <a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                    <a href="#" onclick="confirm('Are you sure, you want to delete this product?') || event.stopImmediatePropagation()" style="margin-left:10px;" wire:click.prevent="deleteProduct({{$product->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>

                </td>
            </tr>
        @endforeach



    </table>

    {{$products->links()}}
</div>
@push('scripts')
    <script>

        $(document).ready(function() {
            $('#example').DataTable();
        } );

    </script>
@endpush

