
<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                {{trans('message.EditProduct')}}
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right"> {{trans('message.AllProducts')}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                            <div class="form-group">
                                <label class="">{{trans('message.ProductName')}}</label>
                                <div class="">
                                    <input type="text" placeholder="Product Name" class="form-control" wire:model="name" wire:keyup="generateSlug" />
                                    @error('name')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.ProductSlug')}}</label>
                                <div class="">
                                    <input type="text" placeholder="Product Slug" class="form-control " wire:model="slug" />
                                    @error('slug')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.ShortDescription')}}</label>
                                <div class="" wire:ignore>
                                    <textarea class="form-control" id="short_description" placeholder="Short Description"  wire:model="short_description"></textarea>
                                    @error('short_description')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.Description')}}</label>
                                <div class="" wire:ignore>
                                    <textarea class="form-control" id="description" placeholder="Description"  wire:model="description"></textarea>
                                    @error('description')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.RegularPrice')}}</label>
                                <div class="">
                                    <input type="number" placeholder="Regular Price" class="form-control "  wire:model="regular_price"/>
                                    @error('regular_price')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.SalePrice')}}</label>
                                <div class="">
                                    <input type="number" placeholder="Sale Price" class="form-control input-md" wire:model="sale_price" />
                                    @error('sale_price')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.SKU')}}</label>
                                <div class="">
                                    <input type="text" placeholder="SKU" class="form-control  wire:model="SKU" />
                                    @error('SKU')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.Stock')}}</label>
                                <div class="">
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="instock">InStock</option>
                                        <option value="outofstock">Out of Stock</option>
                                    </select>
                                    @error('stock_status')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.Featured')}}</label>
                                <div class="">
                                    <select class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.Quantity')}}</label>
                                <div class="">
                                    <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity"/>
                                    @error('quantity')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.ProductImage')}}</label>
                                <div class="">
                                    <input type="file" class="input-file" wire:model="newimage" />
                                    @if($newimage)
                                        <img src="{{$newimage->temporaryUrl()}}" width="120" />
                                    @else
                                        <img src="{{asset('assets/images/products')}}/{{$image}}" width="120" />
                                    @endif
                                    @error('newimage')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.ProductGallery')}}</label>
                                <div class="">
                                    <input type="file" class="input-file" wire:model="newimages" multiple />
                                    @if($newimages)
                                        @foreach($newimages as $newimage)
                                            @if($newimage)
                                                <img src="{{$newimage->temporaryUrl()}}" width="120" />
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach($images as $image)
                                            @if($image)
                                                <img src="{{asset('assets/images/products')}}/{{$image}}" width="120" />
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.Category')}}</label>
                                <div class="">
                                    <select class="form-control" wire:model="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=""></label>
                                <div class="">
                                    <button type="submit" class="btn btn-primary btn-block"> {{trans('message.Update')}}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector:'#short_description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                    @this.set('short_description',sd_data);
                    });
                }
            });

            tinymce.init({
                selector:'#description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                    @this.set('description',d_data);
                    });
                }
            });
        });
    </script>
@endpush
