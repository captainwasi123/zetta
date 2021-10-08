@extends('web.support.master')
@section('title', 'Home')

@section('content')
@php $arr = array(); @endphp
<style type="text/css">
      .slick-track {
    margin: 0 auto;
}
</style>
<div class="video-background-holder">
  <div class="video-background-overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="https://assets.mixkit.co/videos/preview/mixkit-muscular-man-lifting-a-barbell-in-a-dark-gym-23635-large.mp4" type="video/mp4">
    </video>
  <div class="video-background-content container h-100">
    <div class="d-flex h-100 text-center align-items-center">
     
<section class="banner-sec" id="search">
         <div class="container-fluid">
            <div class="banner-text text-center">
               <h2 class="gotham-bold col-white"> Find The <br/> Perfect Sport Buddy </h2>
            </div>
            <div class="search-form">
               <form method="get" action="{{route('web.search')}}">
                  <div class="label-field3 autocomplete">
                     <i class="fa fa-search"> </i>
                     <input type="text" placeholder="Choose a Sport" name="val" id="keywords_val" required>
                  </div>
                  <div class="label-field3">
                     <i class="fa fa-map-marker-alt"></i>
                     <input type="text" placeholder="Address, City or neighborhood" id="madd-input" name="add" required>
                     <input type="hidden" name="country" id="madd-country">
                  </div>
                  <div class="submit-field1">
                     <button class="bg-purple col-white custom-btn1"> Search </button>
                  </div>
               </form>
            </div>
         </div>
      </section>
    </div>
  </div>
</div>

       <section class="pad-top-40 bg-dark2 pad-bot-20">
         <div class="container-fluid">
            <div class="sec-head1 m-b-40">
               <h2 class="col-white gotham-bold text-center m-b-20"> Upcoming Events </h2>
            </div>
            <div class="boxes-slider1 arrows1">
               @foreach($uactivities as $val)

                  <div>
                     <a href="{{route('activity.details', base64_encode($val->id))}}">
                        <div class="lesson-block">
                           <div class="lesson-tag">
                              <img src="{{URL::to('/assets/website')}}/images/activity.png">
                           </div>
                           
                           <div class="lesson-image-block">
                              <img src="{{URL::to('/public/storage/user/activity/main_image/'.$val->cover_img)}}">
                           </div>
                           <div class="lesson-title-block">
                              <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->user) ? '' : $val->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                              <h4>  {{empty($val->user->fname) ? 'Anonymous' : $val->user->fname.' '.$val->user->lname}} <span>Sports Buddy </span>  </h4>
                              <div class="zoom-tag">
                                 @if($val->availability != '2')
                                    <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" title="Online Zoom Classes">
                                 @endif
                                 @php $availability_for = json_decode($val->availability_for); @endphp
                                 @foreach($availability_for as $value)
                                    
                                    @if($value == '1')
                                       <img src="{{URL::to('/assets/')}}/65+.png" title="For Senior Citizen">
                                    @endif
                                    @if($value == '2')
                                       <img src="{{URL::to('/assets/')}}/teenager.png" title="For Teenager">
                                    @endif
                                    @if($value == '3')
                                       <img src="{{URL::to('/assets/')}}/handicapped.png" title="For Handicapped">
                                    @endif
                                 
                                 @endforeach
                              </div>
                           </div>
                           <div class="lesson-info-block">
                              <p class="lesson-title">{{$val->title}}</p>
                              <p class="descrip">
                                 {{$val->description}}
                              </p>
                              <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                              <h6 class="col-white m-b-15 lesson-catagory-text" style="float: right;">
                                 <span class="bg-purple col-white custom-btn12"> {{@$val->sports->name}} </span>
                              </h6>
                           </div>
                           <div class="lesson-rating-block gig">
                           <p id="count{{$val->id}}" class="countDownP"></p>
                           @php array_push($arr, array('id' => $val->id, 'date' => date('M d, Y H:i:s', strtotime($val->held_date)))); @endphp
                           </div>
                        </div>
                     </a>
                  </div>
               @endforeach
            </div>
            @if(count($activities) == 0)
               <div class="sec-head1 m-b-40 m-t-40">
                  <br><br>
                  <h5 class="col-white gotham-bold text-center m-b-20"> No Gigs Found. </h5>
               </div>
            @endif
         </div>
      </section>

      <section class="pad-top-40 bg-dark2 pad-bot-20 work-bac">
         <div class="container-fluid">
            <div class="sec-head1 m-b-20">
               <h2 class="col-white gotham-bold text-center m-b-20"> How it Works </h2>
            </div>

            <div class="row">
                  <div class="col-md-4">
                     <div class="work">
                     <img src="{{URL::to('/assets/website')}}/images/work1.png">
                     <h2>Search your Sports</h2>
                     <p>Find the right sport partner near you. Either you’re looking for a coach a buddy, our filters will guide you.</p>   </div>                     
                  </div> 
                  <div class="col-md-4">
                     <div class="work">
                     <img src="{{URL::to('/assets/website')}}/images/work2.png">
                     <h2>Book Your Session</h2>
                     <p>Reserve your activity or lesson. Follow your progression with your personal dashboard.</p>   </div>                     
                  </div> 
                  <div class="col-md-4">
                     <div class="work">
                     <img src="{{URL::to('/assets/website')}}/images/work3.png">
                     <h2>Share your Passion</h2>
                     <p>Discover new sport opportunities everywhere around you.</p>   </div>                     
                  </div>                               
            </div> 

         </div>
      </section>
      
      <section class="bg-dark2 pad-top-20 pad-bot-40">
         <div class="container-fluid">
            <div class="sec-head1 m-b-40">
               <h2 class="col-white gotham-bold m-b-10"> Top Coaches </h2>
               <p class="col-grey m-b-0"> Each sports coach is carefully selected by the Zettaa team </p>
            </div>
            <div class="row">
               <!-- <div class="col-md-2 col-lg-2 col-sm-12 col-12 order-lg-2 order-md-2">
                  <div class="all-filters2">
                     <a class="buddy-btn" href="{{route('web.search.filter','friend')}}">Friends</a>
                     <a class="buddy-btn" href="{{route('web.search.filter','online_coach')}}">Online Coach</a>
                     <a class="buddy-btn" href="{{route('web.search.filter','group_coach')}}">Group Coach</a>
                     <a class="buddy-btn" href="{{route('web.search.filter','private_coach')}}">Private Coach</a>
                     <a class="buddy-btn" href="{{route('web.search.filter','girl')}}">Girl Coach</a>
                     <button class="buddy-btn"> Find My Teacher </button>
                  </div>
               </div> -->
               <div class="col-md-12 col-lg-12 col-sm-12 col-12 order-lg-1 order-md-1">
                  <div class="buddies-wrapper">
                     <div class="all-buddies">
                        <div class="buddy-box1">
                           <div class="buddy-box">
                              <div>
                                 <img src="{{URL::to('/assets/website')}}/images/buddy-image1.jpg">
                              </div>
                              <h4 class="col-white gotham-regular"> Aubrey </h4>
                              <h5> <span class="col-white"> 5.0 </span> <i class="fa fa-star col-purple"> </i>
                                 <span class="col-white"> 1 Review </span> <img src="{{URL::to('/assets/website')}}/images/buddy-icon1.jpg">
                              </h5>
                           </div>
                        </div>
                        <div class="buddy-box2">
                           <div class="buddy-box ">
                              <div>
                                 <img src="{{URL::to('/assets/website')}}/images/buddy-image2.jpg">
                              </div>
                              <h4 class="col-white gotham-regular"> Aubrey </h4>
                              <h5> <span class="col-white"> 5.0 </span> <i class="fa fa-star col-purple"> </i>
                                 <span class="col-white"> 1 Review </span> <img src="{{URL::to('/assets/website')}}/images/buddy-icon1.jpg">
                              </h5>
                           </div>
                        </div>
                        <div class="buddy-box3">
                           <div class="buddy-box ">
                              <div>
                                 <img src="{{URL::to('/assets/website')}}/images/buddy-image3.jpg">
                              </div>
                              <h4 class="col-white gotham-regular"> Aubrey </h4>
                              <h5> <span class="col-white"> 5.0 </span> <i class="fa fa-star col-purple"> </i>
                                 <span class="col-white"> 1 Review </span> <img src="{{URL::to('/assets/website')}}/images/buddy-icon1.jpg">
                              </h5>
                           </div>
                        </div>
                        <div class="buddy-box4">
                           <div class="buddy-box ">
                              <div>
                                 <img src="{{URL::to('/assets/website')}}/images/buddy-image4.jpg">
                              </div>
                              <h4 class="col-white gotham-regular"> Aubrey </h4>
                              <h5> <span class="col-white"> 5.0 </span> <i class="fa fa-star col-purple"> </i>
                                 <span class="col-white"> 1 Review </span> <img src="{{URL::to('/assets/website')}}/images/buddy-icon1.jpg">
                              </h5>
                           </div>
                        </div>
                        <div class="buddy-box5">
                           <div class="buddy-box">
                              <div>
                                 <img src="{{URL::to('/assets/website')}}/images/buddy-image5.jpg">
                              </div>
                              <h4 class="col-white gotham-regular"> Aubrey </h4>
                              <h5> <span class="col-white"> 5.0 </span> <i class="fa fa-star col-purple"> </i>
                                 <span class="col-white"> 1 Review </span> <img src="{{URL::to('/assets/website')}}/images/buddy-icon1.jpg">
                              </h5>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Sports Buddy Section Ends Here -->
      <!-- Page Content Starts Here -->
      <section class="pad-top-40 bg-dark2 pad-bot-20">
         <div class="container-fluid">
            <div class="sec-head1 m-b-40">
               <h2 class="col-white gotham-bold text-center m-b-40"> Sport Buddy Activities </h2>
            </div>
            <div class="boxes-slider1 arrows1">
               @foreach($activities as $val)

                  <div>
                     <a href="{{route('activity.details', base64_encode($val->id))}}">
                        <div class="lesson-block">
                           <div class="lesson-tag">
                              <img src="{{URL::to('/assets/website')}}/images/activity.png">
                           </div>
                           
                           <div class="lesson-image-block">
                              <img src="{{URL::to('/public/storage/user/activity/main_image/'.$val->cover_img)}}">
                           </div>
                           <div class="lesson-title-block">
                              <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->user) ? '' : $val->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                              <h4>  {{empty($val->user->fname) ? 'Anonymous' : $val->user->fname.' '.$val->user->lname}} <span>Sports Buddy </span>  </h4>
                              <div class="zoom-tag">
                                 @if($val->availability != '2')
                                    <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" title="Online Zoom Classes">
                                 @endif
                                 @php $availability_for = json_decode($val->availability_for); @endphp
                                 @foreach($availability_for as $value)
                                    
                                    @if($value == '1')
                                       <img src="{{URL::to('/assets/')}}/65+.png" title="For Senior Citizen">
                                    @endif
                                    @if($value == '2')
                                       <img src="{{URL::to('/assets/')}}/teenager.png" title="For Teenager">
                                    @endif
                                    @if($value == '3')
                                       <img src="{{URL::to('/assets/')}}/handicapped.png" title="For Handicapped">
                                    @endif
                                 
                                 @endforeach
                              </div>
                           </div>
                           <div class="lesson-info-block">
                              <p class="lesson-title">{{$val->title}}</p>
                              <p class="descrip">
                                 {{$val->description}}
                              </p>
                              <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                              <h6 class="col-white m-b-15 lesson-catagory-text" style="float: right;">
                                 <span class="bg-purple col-white custom-btn12"> {{@$val->sports->name}} </span>
                              </h6>
                           </div>
                           <div class="lesson-rating-block">
                              <a href="javascript:void(0)" data-id="{{$val->id}}" class="col-purple fav_act" id="{{$val->id}}" >
                                 @if(Auth::check())
                                    @php $fv = 0; @endphp
                                    @foreach (auth()->user()->fav_activity as $act)
                                        @if ($val->id == $act->activity_id && $act->user_id == auth()->user()->id)
                                            @php $fv = 1; @endphp
                                        @endif
                                    @endforeach
                                    @if ($fv == 1)
                                        <i class="fa fa-heart col-purple"></i>
                                    @else
                                        <i class="far fa-heart col-purple"></i>
                                    @endif
                                 @else
                                    <i class="far fa-heart col-purple"></i>
                                 @endif
                            </a>
                              <span class="col-grey">  <b class="col-white">
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
                                     {{--  {{'$'.number_format($price)}}  --}}
                                 {{$price="PARTICIPATE"}}
                                      
                                @else
                                PARTICIPATE
                                @endif
                                  </b> </span>
                           </div>
                        </div>
                     </a>
                  </div>
               @endforeach
            </div>
         </div>
      </section>
      <!-- Page Content Ends Here -->
      <!-- Page Content Starts Here -->
      <section class="pad-top-40 pad-bot-40 bg-dark2">
         <div class="container-fluid">
            <div class="sec-head1 m-b-40">
               <h2 class="col-white gotham-bold text-center m-b-40"> Coach Lessons </h2>
            </div>
            <div class="boxes-slider1 arrows1">
               @foreach($lessons as $val)
                  <div>
                     <a href="{{route('lesson.details', base64_encode($val->id))}}">
                        <div class="lesson-block">
                           <div class="lesson-tag">
                              <img src="{{URL::to('/assets/website')}}/images/lesson.png">
                           </div>
                           <div class="lesson-image-block">
                              <img src="{{URL::to('/public/storage/user/lessons/main_image/'.$val->cover_img)}}">
                           </div>
                           <div class="lesson-title-block">
                              <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->user) ? '' : $val->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                              <h4> {{empty($val->user->fname) ? 'Anonymous' : $val->user->fname.' '.$val->user->lname}} <span> Coach </span>  </h4>
                              <div class="zoom-tag">
                                 @if($val->availability != '2')
                                    <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" title="Online Zoom Classes">
                                 @endif
                                 @php $availability_for = json_decode($val->availability_for); @endphp
                                 @foreach($availability_for as $value)
                                    
                                    @if($value == '1')
                                       <img src="{{URL::to('/assets/')}}/65+.png" title="For Senior Citizen">
                                    @endif
                                    @if($value == '2')
                                       <img src="{{URL::to('/assets/')}}/teenager.png" title="For Teenager">
                                    @endif
                                    @if($value == '3')
                                       <img src="{{URL::to('/assets/')}}/handicapped.png" title="For Handicapped">
                                    @endif
                                 
                                 @endforeach
                              </div>
                           </div>
                            
                          
                           <div class="lesson-info-block">
                              <p class="lesson-title">{{$val->title}}</p>
                              <p class="descrip">
                                 {{$val->description}}
                              </p>
                              <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                              <h6 class="col-white m-b-15 lesson-catagory-text" style="float: right;">
                                 <span class="bg-purple col-white custom-btn12"> {{@$val->sports->name}} </span>
                              </h6>
                           </div>
                           <div class="lesson-rating-block">
                            <a href="javascript:void(0)" class="col-purple fav_lesson " data-id="{{$val->id}}" id="fl{{$val->id}}" >
                                @if(Auth::check())
                                    @php $fv = 0; @endphp
                                    @foreach (auth()->user()->fav_lesson as $lsn)
                                        @if ($val->id == $lsn->lesson_id && $lsn->user_id == auth()->user()->id)
                                            @php $fv = 1; @endphp
                                        @endif
                                    @endforeach
                                    @if ($fv == 1)
                                        <i class="fa fa-heart col-purple"></i>
                                    @else
                                        <i class="far fa-heart col-purple"></i>
                                    @endif
                                 @else
                                    <i class="far fa-heart col-purple"></i>
                                 @endif
                            </a>
                              <span class="col-grey"> STARTING AT <b class="col-white">
                                @if (count($val->packages)>0)
                                {{'$'.number_format($val->packages[0]->price)}} </b>
                                @endif

                            </span>
                           </div>
                        </div>
                     </a>
                  </div>
               @endforeach
            </div>
         </div>
      </section>
      <!-- Page Content Ends Here -->
      <!-- Page Content Starts Here -->
      <section class="pad-top-40 pad-bot-40 bg-dark2">
         <div class="container-fluid">
            <div class="sec-head1 m-b-40">
               <h2 class="col-white gotham-bold text-center m-b-20 text-center"> Check Out What Our SportsBuddy Think after their Sessions  </h2>
               <p class="col-white text-center" style="max-width: 600px;margin:auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                  ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud
                  exercitation ullamco laboris.
               </p>
            </div>
            <div class="boxes-slider2 arrows1">
               <div class="review-wrapper">
                  <div class="review-text review-bg1">
                     <p class="  m-b-15"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.  </p>
                     <h5 class="col-white"> Hennyfercity L </h5>
                     <h6> Reviews </h6>
                     <p class="m-b-0"> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> </p>
                  </div>
               </div>
               <div class="review-wrapper">
                  <div class="review-text review-bg2">
                     <p class="  m-b-15"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.  </p>
                     <h5 class="col-white"> Hennyfercity L </h5>
                     <h6> Reviews </h6>
                     <p class="m-b-0"> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> </p>
                  </div>
               </div>
               <div class="review-wrapper">
                  <div class="review-text review-bg1">
                     <p class="  m-b-15"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.  </p>
                     <h5 class="col-white"> Hennyfercity L </h5>
                     <h6> Reviews </h6>
                     <p class="m-b-0"> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Page Content Ends Here -->
      <!-- Contact Map Section Starts Here -->
      <section class="contact-map" id="mapa">
      </section>

<input type="hidden" id="lat" value="1">
<input type="hidden" id="lng" value="1">


@endsection
@section('addStyle')
<style>
    #mapa {
        height: 400px;
    }
   .gm_label_heading {
      margin-top: 0px;
   }
   .gm_reference {
      margin-top: -8px;
   }
</style>
@endsection

@section('addScript')

   @foreach($arr as $val)
      <script type="text/javascript">
         
         $(document).ready(function(){
            timer({{$val['id']}}, "{{$val['date']}}");
         });
      </script>
   @endforeach
   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>

   <script type="text/javascript">

      var alocations = [
            @foreach ($alocation as $val)
               @if(!empty($val->activity))
                  ['{{$val->activity->title}}', {{$val->lat}}, {{$val->lng}}, '{{$val->activity->user->fname}} {{$val->activity->user->lname}}', "{{route('activity.details', base64_encode($val->activity->id))}}"],
               @endif
            @endforeach
      ];
      var llocations = [
            @foreach ($llocation as $val)
               @if(!empty($val->lesson))
                  ['{{$val->lesson->title}}', {{$val->lat}}, {{$val->lng}}, '{{$val->lesson->user->fname}} {{$val->lesson->user->lname}}', "{{route('lesson.details', base64_encode($val->lesson->id))}}"],
               @endif
            @endforeach
      ];
      var ulocations = [
            @foreach ($ulocation as $val)
               ['{{$val->fname.' '.$val->lname}}', {{$val->lat}}, {{$val->lng}}, '{{empty($val->coach_request_status) ? "Sports Buddy" : "Coach, Sports Buddy"}}', "{{route('web.buddy.details', base64_encode($val->id))}}"],
            @endforeach
      ];

      $(document).ready(function(){
         getLocation();  
         mapset();

      });

      function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
      }

      function showPosition(position) {
          $('#lat').val(position.coords.latitude);
          $('#lng').val(position.coords.longitude);
          mapset();
      }

      function mapset(){
         var nlat = $('#lat').val() == 1 ? 33.8662044 : $('#lat').val();
         var nlng = $('#lng').val() == 1 ? 7.3174239 : $('#lng').val();
         var nZoom = $('#lat').val() == 1 ? 2 : 10;
         setTimeout(function(){
            var map = new google.maps.Map(document.getElementById('mapa'), {
               zoom: nZoom,
               center: new google.maps.LatLng(nlat , nlng),
               mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < alocations.length; i++) {  
               marker = new google.maps.Marker({
                 position: new google.maps.LatLng(alocations[i][1], alocations[i][2]),
                 icon: {
                     url: "{{URL::to('/assets/website/images/map/activity.png')}}",
                     size: new google.maps.Size(36, 50),
                     scaledSize: new google.maps.Size(36, 40),
                     anchor: new google.maps.Point(0, 40)
                  },
                 map: map
               });

               google.maps.event.addListener(marker, 'click', (function(marker, i) {
                 return function() {
                   infowindow.setContent("<h4 class='gm_label_heading'>"+alocations[i][0]+"</h4><p class='gm_reference'>Activity By: <strong>"+alocations[i][3]+"</strong></p><a href='"+alocations[i][4]+"' target='_blank'>View Details</a>");
                   infowindow.open(map, marker);
                 }
               })(marker, i));
            }

            for (i = 0; i < llocations.length; i++) {  
               marker = new google.maps.Marker({
                 position: new google.maps.LatLng(llocations[i][1], llocations[i][2]),
                 icon: {
                     url: "{{URL::to('/assets/website/images/map/lesson.png')}}",
                     size: new google.maps.Size(36, 50),
                     scaledSize: new google.maps.Size(36, 40),
                     anchor: new google.maps.Point(0, 40)
                  },
                 map: map
               });

               google.maps.event.addListener(marker, 'click', (function(marker, i) {
                 return function() {
                   infowindow.setContent("<h4 class='gm_label_heading'>"+llocations[i][0]+"</h4><p class='gm_reference'>Lesson By: <strong>"+llocations[i][3]+"</strong></p><a href='"+llocations[i][4]+"' target='_blank'>View Details</a>");
                   infowindow.open(map, marker);
                 }
               })(marker, i));
            }

            for (i = 0; i < ulocations.length; i++) {  
               marker = new google.maps.Marker({
                 position: new google.maps.LatLng(ulocations[i][1], ulocations[i][2]),
                 icon: {
                     url: "{{URL::to('/assets/website/images/map/profile.png')}}",
                     size: new google.maps.Size(36, 50),
                     scaledSize: new google.maps.Size(36, 40),
                     anchor: new google.maps.Point(0, 40)
                  },
                 map: map
               });

               google.maps.event.addListener(marker, 'click', (function(marker, i) {
                 return function() {
                   infowindow.setContent("<h4 class='gm_label_heading'>"+ulocations[i][0]+"</h4><p class='gm_reference'>Type: <strong>"+ulocations[i][3]+"</strong></p><a href='"+ulocations[i][4]+"' target='_blank'>View Profile</a>");
                   infowindow.open(map, marker);
                 }
               })(marker, i));
            }
         }, 100);
      }


      // Set the date we're counting down to
function timer(id, time){

   var countDownDate = new Date(time).getTime();
   // Update the count down every 1 second
   var x = setInterval(function() {

     // Get today's date and time
     var now = new Date().getTime();
       
     // Find the distance between now and the count down date
     var distance = countDownDate - now;
       
     // Time calculations for days, hours, minutes and seconds
     var days = Math.floor(distance / (1000 * 60 * 60 * 24));
     var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
     var seconds = Math.floor((distance % (1000 * 60)) / 1000);
       

     // Output the result in an element with id="demo"

      if(days==0){
            document.getElementById("count"+id).innerHTML =  hours + "h " + minutes + "m " + seconds + "s ";
       }

      else if(hours==0) { 
      
      document.getElementById("count"+id).innerHTML =  minutes + "m " + seconds + "s ";
       
       }

       else if (minutes==0){

      document.getElementById("count"+id).innerHTML =   seconds + "s ";

       }

       
       else if (seconds==0){

      document.getElementById("count"+id).innerHTML = " ";


       }

       else{
          
       document.getElementById("count"+id).innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

       }


     // If the count down is over, write some text 
     if (distance < 0) {
       clearInterval(x);
       document.getElementById("count"+id).parentNode.parentNode.parentNode.remove();
     }
   }, 1000);
}
  </script>
@endsection