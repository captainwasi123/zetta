@extends('web.support.master')
@section('title', 'Buddy Profile')

@section('content')


 <section class="action-bar">
    <div class="container">
       <div class="all-actions arrows1">
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> Starting Excercise </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon2.jpg"> Fitness Expert </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon3.jpg"> Body Fitness </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon4.jpg"> Martial Art </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon5.jpg"> Swimming </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon6.jpg"> Boxing </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon7.jpg"> Fencing </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon8.jpg"> Racing </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> Starting Excercise </a>
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
                      <h4 class="col-purple"> Hi Buddy  </h4>
                      <p class="col-white"> Lorem Ipsum is a something know you are coach  </p>
                      <h6 class="col-purple"> <i class="fa fa-star "> </i> <i class="fa fa-star "> </i> <i class="fa fa-star "> </i> <i class="fa fa-star "> </i> <i class="fa fa-star "> </i> <b> 5.0 </b> </h6>
                   </div>
                </div>
                <div class="profile-details1">
                   <div class="row center-row m-b-20">
                      <div class="col-md-5 col-lg-5 col-12">
                         <div class="field-name">
                            <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon1.png">
                            <span> Full Name </span>
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
                            <span> Gender </span>
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
                            <span> Country </span>
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
                            <span> City </span>
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
                            <span> Languages </span>
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
                   <h5 class="col-purple"> Description </h5>
                   <p class="col-grey"> {{$data->description}}  </p>
                </div>
                <div class="description-profile">
                   <h5 class="col-purple"> Languages </h5>
                   @foreach($data->langs as $val)
                   <h6>  {{$val->language}} - <span> {{$val->level}} </span></h6>
                   @endforeach
                </div>
                <div class="description-profile">
                   <h5 class="col-purple"> Sports Category </h5>
                   <div class="category-sports m-t-10">
                    @foreach($data->category as $val)
                        <button class="cat-button1"> {{$val->name}} </button>
                    @endforeach
                   </div>
                </div>
                <div class="description-profile">
                   <h5 class="col-purple"> Education </h5>
                    @foreach($data->education as $val)
                        <div class="edu_block">
                            <h4 class="col-white">{{$val->degree}}</h4>
                        </div>
                    @endforeach
                </div>
                <div class="description-profile no-border">
                   <h5 class="col-purple"> Certification </h5>
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
                <h5 class="col-white"> My Videos </h5>
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
                <h5 class="col-white"> Active Activites </h5>
             </div>
             <div class="row">
                @foreach ($data->activities as $val)
                    <div class="col-md-4 col-lg-4 col-sm-6 col-12">
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

                            <h4> {{$val->title}} <span> Coach </span>  </h4>
                            <div class="zoom-tag">
                                @if ($val->availability == '1')
                                    <img src="{{URL::to('/public/images/zoom-logo.png')}}"> Only Zoom Classes
                                @endif
                            </div>

                        </div>
                        <div class="lesson-info-block mt-3">
                            <p> {{$val->description}}</p>
                            <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                        </div>
                        <div class="lesson-rating-block">
                            <a href="" class="col-purple"> <i class="fa fa-heart col-purple"></i> </a>
                            <span class="col-grey"> STARTING AT <b class="col-white">
                                @if (count($val->equipment)>0)
                                    @php
                                        $ids = [];
                                        $price = 0;
                                    @endphp
                                    @foreach ($val->equipment as $k => $val)
                                        @php
                                          $price = $price+$val->user_equipment->price;
                                            $ids[$k] = $val->equip_id;
                                        @endphp
                                    @endforeach
                                     {{'$'.number_format($price)}}
                                @else
                                FREE
                                @endif
                            </span>
                        </div>
                        </div>
                    </div>
                @endforeach
             </div>
             <div class="sec-head1 m-b-20">
                <h5 class="col-white"> Reviews as Activity </h5>
             </div>
             <div class="row">
                <div class="col-md-12">
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
                   <div class="review-box">
                      <img src="{{URL::to('/public/images/profile-image1.jpg')}}">
                      <h5 class="col-white"> <b class="col-purple"> Lennon <i class="fa fa-star"> </i> </b> 5.0 </h5>
                      <p class="col-white"> That would be good please share any reference or similar website interms of features
                         and functionality you need.
                      </p>
                   </div>
                   <div class="review-button">
                      <button> + See more </button>
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
