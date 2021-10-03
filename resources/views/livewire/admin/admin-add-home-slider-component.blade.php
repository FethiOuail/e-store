
<div>
    <div class="container" style="padding: 30px 10px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mb-4">    {{trans('message.AddNewSlide')}}  </h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.homesliders')}}" class="btn btn-success pull-right">{{trans('message.AllSlides')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="addSlide">
                            <div class="form-group">
                                <label class="">{{trans('message.Title')}}</label>
                                <div class="">
                                    <input type="text" placeholder="{{trans('message.Title')}}" class="form-control input-md" wire:model="title" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.Subtitle')}}</label>
                                <div class=" ">
                                    <input type="text" placeholder="{{trans('message.Subtitle')}}" class="form-control input-md" wire:model="subtitle" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.Price')}}</label>
                                <div class="">
                                    <input type="text" placeholder="{{trans('message.Price')}}" class="form-control input-md" wire:model="price" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.Link')}}</label>
                                <div class="">
                                    <input type="text" placeholder="{{trans('message.Link')}}" class="form-control " wire:model="link" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.Image')}}</label>
                                <div class=" ">
                                    <input type="file" class="input-file" wire:model="image" />
                                    @if($image)
                                        <img src="{{$image->temporaryUrl()}}" width="120" />
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.Status')}}</label>
                                <div class=" ">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=""></label>
                                <div class=" ">
                                    <button type="submit" class="btn btn-primary btn-block">{{trans('message.Add')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
