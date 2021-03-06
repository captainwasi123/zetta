@extends('web.support.master2')
@section('title', 'Buddy Profile')

@section('content')

 <!-- Action Bar Ends Here -->
 <!-- Page Content Starts Here -->
 <section class="activity-section pad-bot-40 bg-dark2">
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
                      <h4 class="col-purple"> {{ __('content.Hi Buddy')}}  </h4>
                      <p class="col-white"> Lorem Ipsum is a something know you are coach  </p>
                      <h6 class="col-purple"> <i class="fa fa-star "> </i> <i class="fa fa-star "> </i> <i class="fa fa-star "> </i> <i class="fa fa-star "> </i> <i class="fa fa-star "> </i> <b> 5.0 </b> </h6>


                      <div class="profile-btn">
                         @if(Auth::check())
                           @if($is_friend == 1)
                              <a href="javascript:void(0)" class="bg-white col-purple rounded custom-btn1 text-center already_friend">Already Friend</a>
                           @else
                              <a href="javascript:void(0)" class="bg-white col-purple rounded custom-btn1 text-center addFriend" data-id="{{base64_encode(@$data->id)}}">&nbsp;&nbsp;&nbsp;&nbsp;Add Friend&nbsp;&nbsp;&nbsp;&nbsp;</a>
                           @endif
                         <a href="javascript:void(0)" class="bg-white col-purple rounded custom-btn1 text-center getUserMessage"  data-id="{{base64_encode(@$data->id)}}">Send Message</a>
                         @else
                         <a href="javascript:void(0)" class="bg-white col-purple rounded custom-btn1 text-center open-login">&nbsp;&nbsp;&nbsp;&nbsp;Add Friend&nbsp;&nbsp;&nbsp;&nbsp;</a>
                         <a href="javascript:void(0)" class="bg-white col-purple rounded custom-btn1 text-center open-login">Send Message</a>
                         @endif
                      </div>
                   </div>
                </div>
                <div class="profile-details1">
                   <div class="row center-row m-b-20">
                      <div class="col-md-5 col-lg-5 col-12">
                         <div class="field-name">
                            <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon1.png">
                            <span> {{ __('content.Full Name')}} </span>
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
                            <span> {{ __('content.Gender')}} </span>
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
                            <span> {{ __('content.Country')}} </span>
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
                            <span> {{ __('content.City')}} </span>
                         </div>
                      </div>
                      <div class="col-md-7 col-lg-7 col-12">
                         <input type="text" class="form-field3" value="{{@$data->city}}" readonly="" name="">
                      </div>
                   </div>
                </div>
                <div class="description-profile">
                   <h5 class="col-purple"> {{ __('content.Description')}} </h5>
                   <p class="col-grey"> {{$data->description}}  </p>
                </div>
                <div class="description-profile">
                   <h5 class="col-purple"> {{ __('content.Languages')}} </h5>
                   @foreach($data->langs as $val)
                   <h6>  {{$val->language}} - <span> {{$val->level}} </span></h6>
                   @endforeach
                </div>
                <div class="description-profile">
                   <h5 class="col-purple"> {{ __('content.Sports Category')}} </h5>
                   <div class="category-sports m-t-10">
                    @foreach($data->category as $val)
                        <button class="cat-button1"> {{$val->name}} </button>
                    @endforeach
                   </div>
                </div>
                <div class="description-profile">
                   <h5 class="col-purple"> {{ __('content.Education')}} </h5>
                    @foreach($data->education as $val)
                        <div class="edu_block">
                            <h4 class="col-white">{{$val->degree}}</h4>
                        </div>
                    @endforeach
                </div>
                <div class="description-profile no-border">
                   <h5 class="col-purple"> {{ __('content.Certification')}} </h5>
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
                <h5 class="col-white"> {{ __('content.My Videos')}} </h5>
             </div>
             <div class="row">
                 @foreach ($data->media as $media)
                    <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                        <div class="video-box m-b-25">
                            <video style="width: 100%;height: 310px;" controls>
                                <source src="{{URL::to('/')}}/public/storage/user/media/{{$media->media}}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                 @endforeach
             </div>
             <div class="sec-head1 m-b-25">
                <h5 class="col-white"> {{ __('content.Active Activites')}} </h5>
             </div>
             <div class="row">
                @foreach ($data->activities as $val)
                    <div class="col-md-4 col-lg-4 col-sm-6 col-12">
                      <a href="{{route('activity.details', base64_encode($val->id))}}">

                        <div class="lesson-block">
                           <div class="lesson-image-block">
                               @if (empty($val->cover_img))
                                   <img src="{{URL::to('/public/images/lesson-image1.jpg')}}">
                               @else
                                   <img src="{{URL::to('/public/storage/user/activity/main_image/'.$val->cover_img)}}">
                               @endif

                           </div>
                           <div class="lesson-title-block">
                               @if(empty($data->profile_img))
                                   <img src="{{URL::to('/')}}/public/user-placeholder.jpg">
                               @else
                                   <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$data->profile_img}}">
                               @endif

                               <h4> {{$val->title}} <span> {{ __('content.Coach')}} </span>  </h4>
                               <div class="zoom-tag">
                                   @if ($val->availability == '1')
                                       <img src="{{URL::to('/public/images/zoom-logo.png')}}"> Only Zoom Classes
                                   @endif
                               </div>

                           </div>
                           <div class="lesson-info-block mt-3">
                               <p class="descrip"> {{$val->title}}</p>
                               <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                           </div>
                           <div class="lesson-rating-block">
                               <a href="" class="col-purple"> <i class="fa fa-heart col-purple"></i> </a>
                               <span class="col-grey"> {{ __('content.STARTING AT')}}
                                    <b class="col-white">
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
                                   </b>
                               </span>
                           </div>
                        </div>
                        </a>
                    </div>
                @endforeach
             </div>
             <div class="sec-head1 m-b-20">
                <h5 class="col-white"> {{ __('content.Reviews as Activity')}} </h5>
             </div>
             <div class="row">
                <div class="col-md-12">
                 @foreach ($data->reviews as  $val)
                   <div class="review-box">
                     <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{@$val->user->profile_img}}">
                      <h5 class="col-white"> <b class="col-purple"> {{ __('content.Lennon')}} <i class="fa fa-star"> </i> </b>{{@$val->rating}} .0 </h5>
                      <p class="col-white"> {{@$val->review}}
                      </p>
                   </div>
                       @endforeach
                     
                   {{--  <div class="review-button">
                      <button> {{ __('content.+ See more')}} </button>
                   </div>  --}}
                 
                </div>
             </div>
          </div>
       </div>
    </div>
    </div>
 </section>
 <!-- Page Content Ends Here -->



<!-- Modal -->
  <div class="modal fade" id="getUserMessageModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header contact-profile">
          <h4 class="modal-title ">{{ __('content.Send a Message')}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" id="getUserMessageModalContent">

        </div>
      </div>

    </div>
  </div>
@endsection
@section('addScript')
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script type="text/javascript">
      $(document).ready(function(){
         'use strict'

         $(document).on('click', '.addFriend', function(){
            var id = $(this).data('id');
            Swal.fire({
              title: 'Are you sure?',
              text: "You want this user as friend.",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#9a49ff',
              cancelButtonColor: '#b9b9b9',
              confirmButtonText: 'Yes, Add Friend!'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "{{URL::to('/buddy')}}/friends/add/"+id;
              }
            });
         });
      });
   </script>
@endsection
