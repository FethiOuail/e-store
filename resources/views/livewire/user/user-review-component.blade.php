
    <div class="container" style="padding: 30px 0;">


        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title mb-4">{{trans('message.Addreviewfor')}}</h4>


                        <figure class="itemside align-items-center">
                            <div class="aside"><img src="{{ asset('assets/images/products') }}/{{$orderItem->product->image}}" class="img-sm"></div>
                            <figcaption class="info">
                                <a href="{{route('product.details',['slug'=>$orderItem->product->slug])}}" class="title text-dark">{{$orderItem->product->name}}</a>

                            </figcaption>
                        </figure>


                    <div class="form-group">
                        @if(Session::has('message'))
                            <p class="alert alert-success" role="alert">{{Session::get('message')}}</p>
                        @endif
                            <form wire:submit.prevent="addReview" id="commentform" class="comment-form">
                                <div class="comment-form-rating">


                                    <div class="form-group">
                                    <fieldset class="star-rating">
                                        <legend class="star-rating__title">{{trans('message.Yourrating')}}:</legend>
                                        <div class="star-rating__stars">
                                            <input class="star-rating__input" type="radio" name="rating" value="1" id="rating-1"  wire:model="rating">
                                            <label class="star-rating__label" for="rating-1" aria-label="One"></label>
                                            <input class="star-rating__input" type="radio" name="rating" value="2" id="rating-2"  wire:model="rating">
                                            <label class="star-rating__label" for="rating-2" aria-label="Two"></label>
                                            <input class="star-rating__input" type="radio" name="rating" value="3" id="rating-3"  wire:model="rating">
                                            <label class="star-rating__label" for="rating-3" aria-label="Three"></label>
                                            <input class="star-rating__input" type="radio" name="rating" value="4" id="rating-4" wire:model="rating">
                                            <label class="star-rating__label" for="rating-4" aria-label="Four"></label>
                                            <input class="star-rating__input" type="radio" name="rating" value="5" id="rating-5"  wire:model="rating">
                                            <label class="star-rating__label" for="rating-5" aria-label="Five"></label>
                                            <div class="star-rating__focus"></div>
                                            @error('rating') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </fieldset>
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label for="comment">{{trans('message.Yourreview')}} <span class="required">*</span>
                                    </label>
                                    <textarea id="comment" name="comment" cols="45"  class="form-control" rows="3"  wire:model="comment"></textarea>
                                    @error('comment') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <input name="submit" type="submit" id="submit" class="btn btn-primary" value="{{trans('message.Add')}}">
                                </div>
                            </form>

                        </div><!-- .comment-respond-->
                    </div><!-- #review_form -->
                </div><!-- #review_form_wrapper -->
            </div>


        </div>




