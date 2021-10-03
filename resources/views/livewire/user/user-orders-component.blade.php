 <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>

    <div class="container-fluid" >
        <h4 class="card-title mb-4">   {{trans('message.AllOrders')}} </h4>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th> {{trans('message.OrderId')}}</th>
                                <th> {{trans('message.Subtotal')}}</th>
                                <th> {{trans('message.Discount')}}</th>
                                <th> {{trans('message.Tax')}}</th>
                                <th> {{trans('message.Total')}}</th>
                                <th> {{trans('message.FirstName')}}</th>
                                <th> {{trans('message.LastName')}}</th>
                                <th> {{trans('message.Mobile')}}</th>
                                <th> {{trans('message.Email')}}</th>
                                <th> {{trans('message.Zipcode')}}</th>
                                <th> {{trans('message.Status')}}</th>
                                <th> {{trans('message.OrderDate')}}</th>
                                <th> {{trans('message.Action')}}</th>
                            </tr>

                            </thead>
                            <tbody>

                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{trans('message.dz')}} {{$order->subtotal}}</td>
                                    <td>{{trans('message.dz')}} {{$order->discount}}</td>
                                    <td>{{trans('message.dz')}} {{$order->tax}}</td>
                                    <td>{{trans('message.dz')}} {{$order->total}}</td>
                                    <td>{{$order->firstname}}</td>
                                    <td>{{$order->lastname}}</td>
                                    <td>{{$order->mobile}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->zipcode}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td><a href="{{route('user.orderdetails',['order_id'=>$order->id])}}" class="btn btn-primary btn-sm">{{trans('message.Details')}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
        {{$orders->links()}}


    </div>




@push('scripts')
    <script>

        $(document).ready(function() {
            $('#example').DataTable();
        } );

    </script>
@endpush
