
<section class="section-content  ">
    <div class="container">

        <br>
        <nav aria-label="breadcrumb text-white">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="link"> {{trans('message.home')}}</a></li>
                <li class="breadcrumb-item active"><span> {{trans('footer.Contact_us')}}</span></li>

            </ol>
        </nav>



        <!-- ============================ COMPONENT 1 ================================= -->
        <div class="card">
            <div class="row no-gutters">
                <aside class="col-md-6" >
                    <h2 class="card-title mb-4 " style="margin: 20px;;">{{trans('message.LeaveaMessage')}}</h2>
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif

                    <form  wire:submit.prevent="sendMessage" style="margin: 20px;;">
                        <div class="form-group">
                        <label for="name">{{trans('message.Name')}}<span>*</span></label>
                        <input type="text" class="form-control" value="" id="name" name="name" wire:model="name" >
                        @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>

                        <div class="form-group">
                        <label for="email">{{trans('message.Email')}}<span>*</span></label>
                        <input type="text" class="form-control" value="" id="email" name="email" wire:model="email"  >
                        @error('email') <p class="text-danger">{{$message}}</p> @enderror
                        </div>

                        <div class="form-group">
                        <label for="phone">{{trans('footer.Phone')}}</label>
                        <input type="text" class="form-control" value="" id="phone" name="phone" wire:model="phone" >
                        @error('phone') <p class="text-danger">{{$message}}</p> @enderror

                        </div>

                        <div class="form-group">

                        <label for="comment">{{trans('message.Comment')}}</label>
                        <textarea name="comment" class="form-control" rows="3" id="comment" wire:model="comment" ></textarea>
                        @error('comment') <p class="text-danger">{{$message}}</p> @enderror

                        </div>

                        <div class="form-group">
                            <input type="submit"  class="btn btn-primary btn-block" name="ok" value="{{trans('message.Send')}}" >
                        </div> <!-- form-group// -->
                    </form>



                </aside>




                <main class="col-md-6 border-left">
                    <article class="content-body">

                        <iframe  width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy" src="{{$setting->map}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                        <hr>

                        <h4 class="title ">{{trans('message.ContactDetail')}} </h4>



                        <div class="wrap-icon-box">
                            <div class="icon-box-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>{{trans('message.Email')}}</b>
                                    <p class="contact-txt">{{$setting->email}}</p>
                                </div>
                            </div>

                            <div class="icon-box-item">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>{{trans('footer.Phone')}}</b>
                                    <p>{{ $setting->phone }} || {{ $setting->phone2 }}</p>
                                </div>
                            </div>

                            <div class="icon-box-item">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>{{trans('footer.Address')}}</b>
                                    <p>{{$setting->address}}</p>
                                </div>
                            </div>
                        </div>



           </article> <!-- product-info-aside .// -->
                </main> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->
        <!-- ============================ COMPONENT 1 END .// ================================= -->





    </div>

</section>
