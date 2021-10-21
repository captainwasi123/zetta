@extends('web.support.master2')
@section('title', 'Coach Profile')

@section('content')


 <section class="action-bar">
    <div class="container">
       <div class="all-actions arrows1">
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> {{ __('content.Starting Excercise') }} </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon2.jpg"> {{ __('content.Fitness Expert') }} </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon3.jpg"> {{ __('content.Body Fitness') }} </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon4.jpg"> {{ __('content.Martial Art') }} </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon5.jpg"> {{ __('content.Swimming') }} </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon6.jpg"> {{ __('content.Boxing') }} </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon7.jpg"> {{ __('content.Fencing') }} </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon8.jpg"> {{ __('content.Racing') }} </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> {{ __('content.Starting Excercise') }} </a>
          </div>
       </div>
    </div>
 </section>
 <!-- Action Bar Ends Here -->
 <!-- Page Content Starts Here -->
 <section class="pad-top-40 pad-bot-40 bg-dark2">
    <div class="container">
       <div class="row">
          <div class="col-md-4 col-lg-4 col-sm-12 col-12">
             <div class="profile-actions-wrapper">
                <div class="profile-image-uploader">
                   <div class="avatar-upload">
                      {{-- <div class="avatar-edit avatar-edit2">
                         <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                         <label for="imageUpload"></label>
                      </div> --}}
                      <div class="avatar-preview">
                         <div id="imagePreview" style="@if(empty($data->profile_img))
                            background-image: url('{{URL::to('/')}}/public/user-placeholder.jpg');
                          @else
                            background-image: url('{{URL::to('/')}}/public/storage/user/profile_img/{{$data->profile_img}}');
                          @endif);">
                         </div>
                      </div>
                   </div>
                   <div class="profile-image-name text-center">
                      <h4 class="col-purple"> {{ __('content.Hi Coach') }}  </h4>
                      <p class="col-white"> Lorem Ipsum is a something know you are coach  </p>
                      <h6 class="col-purple"> <i class="fa fa-star "> </i> <i class="fa fa-star "> </i> <i class="fa fa-star "> </i> <i class="fa fa-star "> </i> <i class="fa fa-star "> </i> <b> 5.0 </b> </h6>
                   </div>
                </div>
                <div class="profile-details1">
                   <div class="row center-row m-b-20">
                      <div class="col-md-5 col-lg-5 col-12">
                         <div class="field-name">
                            <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon1.png">
                            <span> {{ __('content.Full Name') }} </span>
                         </div>
                      </div>
                      <div class="col-md-7 col-lg-7 col-12">
                         <input type="text" class="form-field3" value="{{$data->fname.' '.$data->lname}}" readonly="" name="">
                      </div>
                   </div>
                   <div class="row center-row m-b-20">
                      <div class="col-md-5 col-lg-5 col-12">
                         <div class="field-name">
                            <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon3.png">
                            <span> {{ __('content.Gender') }} </span>
                         </div>
                      </div>
                      <div class="col-md-7 col-lg-7 col-12 text-right mob-text-left">
                         <label class="container-radio col-white no-margin m-b-0"> {{$data->gender}}
                         <input type="radio" checked="checked" name="radio">
                         <span class="checkmark"></span>
                         </label>
                      </div>
                   </div>
                   <div class="row center-row m-b-20">
                      <div class="col-md-5 col-lg-5 col-12">
                         <div class="field-name">
                            <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon13.png">
                            <span> {{ __('content.Country') }} </span>
                         </div>
                      </div>
                      <div class="col-md-7 col-lg-7 col-12">
                         <input type="text" class="form-field3" readonly="" name="" value="{{@$data->country->country}}">
                      </div>
                   </div>
                   <div class="row center-row m-b-20">
                      <div class="col-md-5 col-lg-5 col-12">
                         <div class="field-name">
                            <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon3.png">
                            <span> {{ __('content.City') }} </span>
                         </div>
                      </div>
                      <div class="col-md-7 col-lg-7 col-12">
                         <input type="text" class="form-field3" value="{{@$data->city}}" readonly="" name="">
                      </div>
                   </div>
                   <div class="row center-row m-b-20">
                      <div class="col-md-5 col-lg-5 col-12">
                         <div class="field-name">
                            <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon1.jpg">
                            <span> {{ __('content.Languages') }} </span>
                         </div>
                      </div>
                      <div class="col-md-7 col-lg-7 col-12">
                        @foreach($data->langs as $val)
                        <input type="text" class="form-field3" value="{{$val->language}}" readonly="" name="">
                        @break
                        @endforeach

                      </div>
                   </div>
                </div>
                <div class="description-profile">
                   <h5 class="col-purple"> {{ __('content.Description') }} </h5>
                   <p class="col-grey"> {{$data->description}}  </p>
                </div>
                <div class="description-profile">
                   <h5 class="col-purple"> {{ __('content.Languages') }} </h5>
                   @foreach($data->langs as $val)
                   <h6>  {{$val->language}} - <span> {{$val->level}} </span></h6>
                   @endforeach
                </div>
                <div class="description-profile">
                   <h5 class="col-purple"> {{ __('content.Sports Category') }} </h5>
                   <div class="category-sports m-t-10">
                    @foreach($data->category as $val)
                        <button class="cat-button1"> {{$val->name}} </button>
                    @endforeach
                   </div>
                </div>
                <div class="description-profile">
                   <h5 class="col-purple"> {{ __('content.Education') }} </h5>
                    @foreach($data->education as $val)
                        <div class="edu_block">
                            <h4 class="col-white">{{$val->degree}}</h4>
                        </div>
                    @endforeach
                </div>
                <div class="description-profile no-border">
                   <h5 class="col-purple"> {{ __('content.Certification') }} </h5>
                    @foreach($data->certificate as $val)
                        <div class="edu_block">
                            <h4 class="col-white"> {{$val->certificate}} - {{$val->institute}} </h4>
                        </div>
                    @endforeach

                </div>
             </div>
          </div>
          <div class="col-md-8 col-lg-8 col-sm-12 col-12">
             <div class="sec-head1 m-b-25">
                <h5 class="col-white"> {{ __('content.My Videos') }} </h5>
             </div>
             <div class="row">
                 @foreach ($data->media as $media)
                    <div class="col-md-4 col-lg-3 col-sm-4 col-12">
                        <div class="video-box m-b-25">
                            <video controls>
                                <source src="{{URL::to('/')}}/public/storage/user/media/{{$media->media}}" type="video/mp4">
                                {{-- <source src="{{URL::to('/')}}/public/storage/user/media/{{$media->media}}"" type="video/ogg"> --}}
                            </video>
                        {{-- <img src="images/video-image1.jpg"> --}}
                        </div>
                    </div>
                 @endforeach
             </div>
             <div class="sec-head1 m-b-25">
                <h5 class="col-white"> {{ __('content.Active Lessons') }} </h5>
             </div>
             <div class="row">
                @foreach ($data->lessons as $val)
                    <div class="col-md-6 col-lg-4 col-sm-6 col-12">
                        <div class="lesson-block">
                        <div class="lesson-image-block">
                            @if (empty($val->cover_img))
                                <img src="{{URL::to('/public/images/lesson-image1.jpg')}}">
                            @else
                                <img src="{{URL::to('/public/storage/user/lessons/main_image/'.$val->cover_img)}}">
                            @endif

                        </div>
                        <div class="lesson-title-block">
                            @if(empty($data->profile_img))
                                <img src="{{URL::to('/')}}/public/user-placeholder.jpg">
                            @else
                                <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$data->profile_img}}">
                            @endif

                            <h4> {{$val->title}} <span> {{ __('content.Coach') }} </span>  </h4>
                            <div class="zoom-tag">
                                @if ($val->availability == '1')
                                    <img src="{{URL::to('/public/images/zoom-logo.png')}}">
                                @endif
                            </div>

                        </div>
                        <div class="lesson-info-block mt-3">
                            <p class="descrip"> {{$val->description}}</p>
                            <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                        </div>
                        <div class="lesson-rating-block">
                            <a href="" class="col-purple"> <i class="fa fa-heart col-purple"></i> </a>
                            <span class="col-grey"> {{ __('content.STARTING AT') }} <b class="col-white"> {{'$'.number_format($val->packages[0]->price)}} </b> </span>
                        </div>
                        </div>
                    </div>
                @endforeach
             </div>
             <div class="sec-head1 m-b-20">
                <h5 class="col-white"> {{ __('content.Reviews as Activity') }} </h5>
             </div>
             <div class="row">
                <div class="col-md-12">
                   <div class="review-box">
                      <img src="{{URL::to('/public/images/profile-image1.jpg')}}">
                      <h5 class="col-white"> <b class="col-purple"> Lennon <i class="fa fa-star"> </i> </b> 5.0 </h5>
                      <p class="col-white"> {{ __('content.That would be good please share any reference or similar website interms of features and functionality you need.') }}
                      </p>
                   </div>
                   <div class="review-box">
                      <img src="{{URL::to('/public/images/profile-image1.jpg')}}">
                      <h5 class="col-white"> <b class="col-purple"> Lennon <i class="fa fa-star"> </i> </b> 5.0 </h5>
                      <p class="col-white"> That would be good please share any reference or similar website interms of features
                         and functionality you need.
                      </p>
                   </div>
                   <div class="review-box">
                      <img src="{{URL::to('/public/images/profile-image1.jpg')}}">
                      <h5 class="col-white"> <b class="col-purple"> Lennon <i class="fa fa-star"> </i> </b> 5.0 </h5>
                      <p class="col-white"> That would be good please share any reference or similar website interms of features
                         and functionality you need.
                      </p>
                   </div>
                   <div class="review-button">
                      <button> {{ __('content.+ See more') }} </button>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    </div>
 </section>
 <!-- Page Content Ends Here -->

@endsection
