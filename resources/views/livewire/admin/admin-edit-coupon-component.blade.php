
<div>
    <div class="container" style="padding: 30px 10px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mb-4">    {{trans('message.EditCoupon')}} </h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.coupons')}}" class="btn btn-success pull-right">{{trans('message.AllCoupon')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateCoupon">
                            <div class="form-group">
                                <label class="">{{trans('message.CouponCode')}}</label>
                                <div class="">
                                    <input type="text" placeholder="{{trans('message.CouponCode')}}" class="form-control input-md" wire:model="code" />
                                    @error('code')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">{{trans('message.CouponType')}}</label>
                                <div class="">
                                    <select class="form-control" wire:model="type">
                                        <option value="">Select</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="percent">Percent</option>
                                    </select>
                                    @error('type')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.CouponValue')}}</label>
                                <div class="">
                                    <input type="text" placeholder="{{trans('message.CouponValue')}}" class="form-control input-md" wire:model="value" />
                                    @error('value')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.CartValue')}}</label>
                                <div class="">
                                    <input type="text" placeholder="{{trans('message.CartValue')}}" class="form-control" wire:model="cart_value" />
                                    @error('cart_value')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.ExpiryDate')}}</label>
                                <div class="" wire:ignore>
                                    <input type="text" id="expiry-date" placeholder="{{trans('message.ExpiryDate')}}" class="form-control input-md" wire:model="expiry_date" />
                                    @error('expiry_date')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=""></label>
                                <div class="">
                                    <button type="submit" class="btn btn-primary btn-block">{{trans('message.Update')}}</button>
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
            $('#expiry-date').datetimepicker({
                format: 'Y-MM-DD'
            })
                .on('dp.change',function(ev){
                    var data = $('#expiry-date').val();
                @this.set('expiry_date',data);
                });
        });
    </script>
@endpush
