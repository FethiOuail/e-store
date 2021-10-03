
<div class="container" style="padding: 0px 0">
<div class="card mx-auto" style=" margin-left: 10px; margin-right: 10px; margin-top:40px;">
    <article class="card-body">
        <header class="mb-4"><h4 class="card-title">    {{trans('message.Settings')}} </h4></header>

        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
        @endif
        <form class="form-horizontal" wire:submit.prevent="saveSettings">


            <div class="form-group">
                <label class="col-md-6 col-lg-4 control-label"> {{trans('message.Email')}}</label>
                <div class="col-md-6">
                    <input dir="ltr" type="email" placeholder=" {{trans('message.Email')}}" class="form-control input-md" wire:model="email" />
                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-6 col-lg-4  control-label"> {{trans('footer.Phone')}}</label>
                <div class="col-md-6">
                    <input dir="ltr" type="text" placeholder=" {{trans('footer.Phone')}}" class="form-control input-md" wire:model="phone" />
                    @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-6 col-lg-4  control-label"> {{trans('footer.Phone')}} 2</label>
                <div class="col-md-6">
                    <input dir="ltr" type="text" placeholder=" {{trans('footer.Phone')}}2" class="form-control input-md" wire:model="phone2" />
                    @error('phone2') <p class="text-danger">{{$message}}</p> @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 col-lg-4  control-label"> {{trans('footer.Address')}}</label>
                <div class="col-md-6">
                    <input type="text" placeholder=" {{trans('footer.Address')}}" class="form-control input-md" wire:model="address" />
                    @error('address') <p class="text-danger">{{$message}}</p> @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 col-lg-6  control-label"> {{trans('footer.Map')}}</label>
                <div class="col-md-6">
                    <input dir="ltr" type="text" placeholder=" {{trans('footer.Map')}}" class="form-control input-md" wire:model="map" />
                    @error('map') <p class="text-danger">{{$message}}</p> @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 col-lg-6 control-label"> {{trans('footer.Twitter')}}</label>
                <div class="col-md-6">
                    <input type="text" placeholder=" {{trans('footer.Twitter')}}" class="form-control input-md" wire:model="twiter" />
                    @error('twiter') <p class="text-danger">{{$message}}</p> @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4  col-lg-12  control-label"> {{trans('footer.Facebook')}}</label>
                <div class="col-md-6">
                    <input type="text" placeholder=" {{trans('footer.Facebook')}}" class="form-control input-md" wire:model="facebook" />
                    @error('facebook') <p class="text-danger">{{$message}}</p> @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 col-lg-6  control-label">Pinterest</label>
                <div class="col-md-6">
                    <input type="text" placeholder="Pinterest" class="form-control input-md" wire:model="pinterest" />
                    @error('pinterest') <p class="text-danger">{{$message}}</p> @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 col-lg-6 control-label"> {{trans('footer.Instagram')}}</label>
                <div class="col-md-6">
                    <input type="text" placeholder=" {{trans('footer.Instagram')}}" class="form-control input-md" wire:model="instagram" />
                    @error('instagram') <p class="text-danger">{{$message}}</p> @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 col-lg-6 control-label"> {{trans('footer.Youtube')}}</label>
                <div class="col-md-6">
                    <input type="text" placeholder=" {{trans('footer.Youtube')}}" class="form-control input-md" wire:model="youtube" />
                    @error('youtube') <p class="text-danger">{{$message}}</p> @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 col-lg-6 control-label"></label>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block"> {{trans('message.Save')}}</button>
                </div>
            </div>
        </form>

    </article>

</div>
</div>
