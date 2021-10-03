
<div>
    <div class="container" style="padding: 30px 20px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel ">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mb-4"> {{trans('message.AddNewProduct')}}     </h4>

                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">{{trans('message.AllProducts')}}</a>

                            </div>
                        </div>
                    </div>
                    <div class="panel-body">

                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif

                        <form  enctype="multipart/form-data" wire:submit.prevent="addProduct">
                            <div class="form-group">
                                <label>{{trans('message.ProductName')}} </label>
                                <input type="text"  placeholder="{{trans('message.ProductName')}} " class="form-control " wire:model="name" wire:keyup="generateSlug" />
                                @error('name')  <p class="text-danger">{{$message}}</p> @enderror
                            </div> <!-- form-group end.// -->


                            <div class="form-group">
                                <label>{{trans('message.ProductSlug')}}  </label>
                                <input type="text" placeholder="{{trans('message.ProductSlug')}}" class="form-control" wire:model="slug" />
                                @error('slug')  <p class="text-danger">{{$message}}</p> @enderror
                            </div> <!-- form-group end.// -->



                            <div class="form-group">
                                <label class="">{{trans('message.ShortDescription')}}</label>
                                <div class="" wire:ignore>
                                    <textarea class="form-control" id="short_description" placeholder="{{trans('message.ShortDescription')}}"  wire:model="short_description"></textarea>
                                    @error('short_description')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.Description')}}</label>
                                <div class="" wire:ignore>
                                    <textarea class="form-control" id="description" placeholder="{{trans('message.Description')}}"  wire:model="description"></textarea>
                                    @error('description')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.RegularPrice')}}</label>
                                <div class="">
                                    <input type="text" placeholder="{{trans('message.RegularPrice')}}" class="form-control input-md"  wire:model="regular_price"/>
                                    @error('regular_price')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.SalePrice')}}</label>
                                <div class="">
                                    <input type="text" placeholder="{{trans('message.SalePrice')}}" class="form-control input-md" wire:model="sale_price" />
                                    @error('sale_price')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">SKU</label>
                                <div class="">
                                    <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU" />
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
                                    <input type="text" placeholder="{{trans('message.Quantity')}}" class="form-control input-md" wire:model="quantity"/>
                                    @error('quantity')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.ProductImage')}}</label>
                                <div class="">
                                    <input type="file" class="input-file" wire:model="image" />
                                    @if($image)
                                        <img src="{{$image->temporaryUrl()}}" width="120" />
                                    @endif
                                    @error('image')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.ProductGallery')}}</label>
                                <div class="">
                                    <input type="file" class="input-file" wire:model="images" multiple />
                                    @if($images)
                                        @foreach($images as $image)
                                            <img src="{{$image->temporaryUrl()}}" width="120" />
                                        @endforeach
                                    @endif
                                    @error('images')  <p class="text-danger">{{$message}}</p> @enderror
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

                            <button type="submit" class="btn btn-primary btn-block">{{trans('message.Add')}}</button>
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
