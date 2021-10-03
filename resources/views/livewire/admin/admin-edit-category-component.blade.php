


<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel ">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mb-4"> {{trans('message.EditCategory')}}  </h4>

                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">{{trans('message.AllCategory')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">

                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif

                        <form   wire:submit.prevent="updateCategory">
                            <div class="form-group">
                                <label>{{trans('message.CategoryName')}} </label>
                                <input type="text" class="form-control" placeholder="{{trans('message.CategoryName')}}"  wire:model="name" wire:keyup="generateslug" />
                                @error('name')  <p class="text-danger">{{$message}}</p> @enderror
                            </div> <!-- form-group end.// -->


                            <div class="form-group">
                                <label>{{trans('message.CategorySlug')}}  </label>
                                <input type="text" class="form-control" placeholder="{{trans('message.CategorySlug')}}"  wire:model="slug" />
                                @error('slug')  <p class="text-danger">{{$message}}</p> @enderror
                            </div> <!-- form-group end.// -->


                            <button type="submit" class="btn btn-primary btn-block">{{trans('message.Update')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


