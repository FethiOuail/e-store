
<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                {{trans('message.AllCoupon')}}
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addcoupon')}}" class="btn btn-success pull-right">{{trans('message.Add')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif


                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>{{trans('message.CouponCode')}}</th>
                                    <th>{{trans('message.CouponType')}}</th>
                                    <th>{{trans('message.CouponValue')}}</th>
                                    <th>{{trans('message.CartValue')}}</th>
                                    <th>{{trans('message.ExpiryDate')}}</th>
                                    <th>{{trans('message.Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{$coupon->id}}</td>
                                        <td>{{$coupon->code}}</td>
                                        <td>{{$coupon->type}}</td>
                                        @if($coupon->type == 'fixed')
                                            <td> DZ {{$coupon->value}}</td>
                                        @else
                                            <td>{{$coupon->value}} %</td>
                                        @endif
                                        <td>DZ {{$coupon->cart_value}}</td>
                                        <td>{{$coupon->expiry_date}}</td>
                                        <td>
                                            <a href="{{route('admin.editcoupon',['coupon_id'=>$coupon->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, You want to delete this coupon?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})" style="margin-left:10px; "><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach



                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>

        $(document).ready(function() {
            $('#example').DataTable();
        } );

    </script>
@endpush

