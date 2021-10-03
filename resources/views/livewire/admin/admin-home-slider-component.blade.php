
<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mb-4">  {{trans('message.AllSlides')}}   </h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.homeaddslider')}}" class="btn btn-success pull-right">{{trans('message.AddNewSlide')}} </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>{{trans('message.Image')}} </th>
                                <th>{{trans('message.Title')}} </th>
                                <th>{{trans('message.Subtitle')}} </th>
                                <th>{{trans('message.Price')}} </th>
                                <th>{{trans('message.Link')}}</th>
                                <th>{{trans('message.Status')}} </th>
                                <th>{{trans('message.Date')}} </th>
                                <th>{{trans('message.Action')}} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{$slider->id}}</td>
                                    <td><img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" width="60"  alt="slidimage"/></td>
                                    <td>{{$slider->title}}</td>
                                    <td>{{$slider->subtitle}}</td>
                                    <td>{{$slider->price}}</td>
                                    <td>{{$slider->link}}</td>
                                    <td>{{$slider->status == 1 ? 'Active':'Inactive'}}</td>
                                    <td>{{$slider->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.homeslideredit',['slide_id'=>$slider->id])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                        <a href="#" wire:click.prevent="deleteSlide({{$slider->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
