

    <div class="container-fluid" style="padding: 30px 10px;">
        <div class="row">
                <div class="panel panel-default">
                    <div class="col-md-6">
                        <h4 class="card-title mb-4">   {{trans('message.AllOrders')}} </h4>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('order_message'))
                            <div class="alert alert-success" role="alert">{{Session::get('order_message')}}
                            </div>
                        @endif

                    </div>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th> {{trans('message.OrderId')}} </th>
                                <th> {{trans('message.Subtotal')}} </th>
                                <th> {{trans('message.Discount')}} </th>
                                <th> {{trans('message.Tax')}} </th>
                                <th> {{trans('message.Total')}} </th>
                                <th> {{trans('message.FirstName')}} </th>
                                <th> {{trans('message.LastName')}} </th>
                                <th> {{trans('message.Mobile')}} </th>
                                <th> {{trans('message.Email')}} </th>
                                <th> {{trans('message.Zipcode')}} </th>
                                <th> {{trans('message.Status')}} </th>
                                <th> {{trans('message.OrderDate')}} </th>
                                <th>  {{trans('message.Action')}} </th>
                            </tr>

                            </thead>
                            <tbody>

                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>${{$order->subtotal}}</td>
                                    <td>${{$order->discount}}</td>
                                    <td>${{$order->tax}}</td>
                                    <td>${{$order->total}}</td>
                                    <td>{{$order->firstname}}</td>
                                    <td>{{$order->lastname}}</td>
                                    <td>{{$order->mobile}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->zipcode}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->created_at}}</td>

                                    <td><a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">{{trans('message.Details')}}</a>

                                        <div class="dropdown">
                                            <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">{{trans('message.Status')}}
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">{{trans('message.Delivered')}}</a></li>
                                                <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">{{trans('message.Canceled')}}</a></li>
                                            </ul>
                                        </div>
                                    </td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$orders->links()}}
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
