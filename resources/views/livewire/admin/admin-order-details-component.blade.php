
    <div class="container" style="padding: 30px 0;">


        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                {{trans('message.OrderDetails')}}

                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.orders')}}" class="btn btn-success pull-right">{{trans('message.AllOrders')}} </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Order Id</th>
                                <td>{{$order->id}}</td>
                                <th>{{trans('message.OrderDate')}}</th>
                                <td>{{$order->created_at}}</td>
                                <th>{{trans('message.Status')}}</th>
                                <td>{{$order->status}}</td>
                                @if($order->status == "delivered")
                                    <th>{{trans('message.DeliveryDate')}}</th>
                                    <td>{{$order->delivered_date}}</td>
                                @elseif($order->status == "canceled")
                                    <th>{{trans('message.CancellationDate')}}</th>
                                    <td>{{$order->canceled_date}}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">

            <aside class="col-lg-9">
                <div class="card">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                        <tr class="small text-uppercase">
                            <th scope="col">{{trans('message.Product')}}</th>
                            <th scope="col" width="120">{{trans('message.Quantity')}}</th>
                            <th scope="col" width="120">{{trans('message.Price')}}</th>
                            <th scope="col" class="text-right" width="200"> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->orderItems as $item)

                            <tr>
                                <td>
                                    <figure class="itemside align-items-center">
                                        <div class="aside"><img src="{{ asset('assets/images/products') }}/{{$item->product->image}}" alt="{{$item->product->name}}" class="img-" style="width: 50px; height: 50px"></div>
                                        <figcaption class="info">
                                            <a href="{{route('product.details',['slug'=>$item->product->slug])}}" class="title text-dark">{{$item->product->name}}</a>

                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <div class="price-wrap">
                                        <var class="price"> {{$item->quantity}} </var>

                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td>
                                    <div class="price-wrap">
                                        <var class="price"> {{$item->price * $item->quantity}} {{trans('message.dz')}}   </var>
                                        <small class="text-muted"> {{$item->price}} {{trans('message.each')}}  </small>
                                    </div> <!-- price-wrap .// -->
                                </td>

                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                    <div class="card-body border-top">
                    </div> <!-- card-body.// -->

                </div> <!-- card.// -->

            </aside> <!-- col.// -->
            <aside class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <p class="card-title text-center font-weight-bold">{{trans('message.OrderSummary')}}</p>
                    </div>
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>{{trans('message.Subtotal')}}:</dt>
                            <dd class="text-right"> {{$order->subtotal}} {{trans('message.dz')}}  </dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>{{trans('message.Tax')}} :</dt>
                            <dd class="text-right text-danger"> {{$order->tax}} {{trans('message.dz')}} </dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>{{trans('message.Total')}}:</dt>
                            <dd class="text-right text-dark b"><strong> {{$order->total}} {{trans('message.dz')}} </strong></dd>
                        </dl>
                        <hr>


                    </div> <!-- card-body.// -->

                </div> <!-- card.// -->

            </aside> <!-- col.// -->


        </div>



        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{trans('message.BillingDetails')}}
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th> {{trans('message.FirstName')}} </th>
                                <td>{{$order->firstname}}</td>
                                <th> {{trans('message.LastName')}} </th>
                                <td>{{$order->lastname}}</td>
                            </tr>
                            <tr>
                                <th> {{trans('footer.Phone')}} </th>
                                <td>{{$order->mobile}}</td>
                                <th> {{trans('message.Email')}} </th>
                                <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <th> {{trans('message.Line1')}} </th>
                                <td>{{$order->line1}}</td>
                                <th> {{trans('message.Line2')}} </th>
                                <td>{{$order->line2}}</td>
                            </tr>
                            <tr>
                                <th> {{trans('message.City')}} </th>
                                <td>{{$order->city}}</td>
                                <th> {{trans('message.Province')}} </th>
                                <td>{{$order->province}}</td>
                            </tr>
                            <tr>
                                <th >{{trans('message.Country')}}</th>
                                <td>{{$order->country}}</td>
                                <th> {{trans('message.Zipcode')}} </th>
                                <td>{{$order->zipcode}}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        @if($order->is_shipping_different)
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Shipping Details
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <th>First Name</th>
                                    <td>{{$order->shipping->firstname}}</td>
                                    <th>Last Name</th>
                                    <td>{{$order->shipping->lastname}}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{$order->shipping->mobile}}</td>
                                    <th>Email</th>
                                    <td>{{$order->shipping->email}}</td>
                                </tr>
                                <tr>
                                    <th>Line1</th>
                                    <td>{{$order->shipping->line1}}</td>
                                    <th>Line2</th>
                                    <td>{{$order->shipping->line2}}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{$order->shipping->city}}</td>
                                    <th>Province</th>
                                    <td>{{$order->shipping->province}}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{$order->shipping->country}}</td>
                                    <th>Zipcode</th>
                                    <td>{{$order->shipping->zipcode}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

     {{--   <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{trans('message.Transaction')}}
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>{{trans('message.TransactionMode')}} </th>
                                <td>{{$order->transaction->mode}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('message.Status')}} </th>
                                <td>{{$order->transaction->status}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('message.TransactionDate')}}</th>
                                <td>{{$order->transaction->created_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
--}}
    </div>
