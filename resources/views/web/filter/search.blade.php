@extends('web.support.master2')
@section('title', 'Search Result')

@section('content')

<section class="action-bar">
   <div class="container">
      <form id="stickmanForm">
         @csrf
         <input type="hidden" name="type" value="{{@$search_data['type']}}">
         <input type="hidden" name="sValue" value="{{empty($search_data['val']) ? 'all' : $search_data['val']}}">
         <div class="all-actions arrows1">
            @foreach($sCategories as $val)
               <div class="subCategory">
                  @if(empty($val->sports))
                     <a href="javascript:void(0)" class="image-checkbox" data-id="{{$val->id}}" data-name="{{$val->name}}"> 
                        <input type="checkbox" id="scales" name="stickman[]" value="{{$val->name}}"> 
                        <img src="{{URL::to('/public/storage/settings/category/')}}/{{$val->image}}"> {{$val->name}}
                     </a>
                  @else
                     <a href="javascript:void(0)" class="image-checkbox" data-id="{{$val->id}}" data-name="{{$val->sports->name}}"> 
                        <input type="checkbox" id="scales" name="stickman[]" value="{{$val->sports->name}}"> 
                        <img src="{{URL::to('/public/storage/settings/sports/')}}/{{$val->sports->image}}"> {{$val->sports->name}}
                     </a>
                  @endif
               </div>
            @endforeach         
         </div>
         <div id="subCategoryBlock">
         </div>
      </form>
   </div>
</section>


<!-- Action Bar Ends Here -->
<!-- Page Content Section Starts Here -->
<!-- Page Content Section Ends Here -->
<!-- Page Content Starts Here -->
<div id="resultBlock">
   <section class="pad-top-40 bg-dark2">
      <div class="container">
         <div class="sec-head1 m-b-25">
            <h4 class="gotham-bold col-white"> <small>{{ __('content.Results for')}}</small> "<span id="searchLabel">{{@$search_data['val']}}</span> | {{@$search_data['add']}}" </h4>
         </div>
      </div>
   </section>

   <section class="pad-top-20 pad-bot-40 bg-dark2 tb-1">
      <div class="container">
         <div class="row">
            <div class="col-12 sectionHeading">
               <h4>{{ __('content.LESSONS')}}</h4>
            </div>
         </div>
         <div class="row">
            @foreach($lessons as $val)
               <div class="col-md-4 col-lg-2 col-sm-4">
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
                           <h4> {{empty($val->user->fname) ? 'New User' : $val->user->fname.' '.$val->user->lname}} <span> {{ __('content.Coach')}} </span>  </h4>
                           <div class="zoom-tag">
                              @if($val->availability != '2')
                                 <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" title="Online Zoom Classes">
                              @endif
                              @php $availability_for = json_decode($val->availability_for); @endphp
                              @if(!empty($availability_for))
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

                              @endif
                           </div>
                        </div>
                        <div class="lesson-info-block">
                           <p class="lesson-title">{{$val->title}}</p>
                           <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                           <h6 class="col-white m-b-15" style="float: right;">
                              <p class="bg-purple col-white custom-btn12 cut-sports" title="{{$val->sports->name}}">{{$val->sports->name}}</p>
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
                           <span class="col-grey"> {{ __('content.STARTING AT')}} <b class="col-white"> {{'$'.number_format($val->packages[0]->price)}} </b> </span>
                        </div>
                     </div>
                  </a>
               </div>
            @endforeach
            @if(count($lessons) == 0)
               <h4>{{ __('content.No Results Found.')}}</h4>
            @endif
         </div>
      </div>
   </section>


   <section class="pad-top-20 pad-bot-40 bg-dark2 tb-1">
      <div class="container">
         <div class="row">
            <div class="col-12 sectionHeading">
               <h4>{{ __('content.ACTIVITIES')}}</h4>
            </div>
         </div>
         <div class="row" id="resultBlock">
            @foreach($activities as $val)
               <div class="col-md-4 col-lg-2 col-sm-4">
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
                           <h4>  {{empty($val->user->fname) ? 'New User' : $val->user->fname.' '.$val->user->lname}} <span>{{ __('content.Sports Buddy')}} </span>  </h4>
                           <div class="zoom-tag">
                              @if($val->availability != '2')
                                 <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" title="Online Zoom Classes">
                              @endif
                              @php $availability_for = json_decode($val->availability_for); @endphp
                              @if(!empty($availability_for))
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
                              @endif
                           </div>
                        </div>
                        <div class="lesson-info-block">
                           <p class="lesson-title">{{$val->title}}</p>
                           <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                           <h6 class="col-white m-b-15" style="float: right;">
                              <p class="bg-purple col-white custom-btn12 cut-sports" title="{{$val->sports->name}}">{{$val->sports->name}}</p>
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
                           <span class="col-grey"><b class="col-white"> 
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
                             {{ __('content.PARTICIPATE')}}
                             @endif
                           </b> </span>
                        </div>
                     </div>
                  </a>
               </div>
            @endforeach
            @if(count($activities) == 0)
               <h4>{{ __('content.No Results Found.')}}</h4>
            @endif
         </div>
      </div>
   </section>


   <section class="pad-top-20 pad-bot-40 bg-dark2 tb-1">
      <div class="container">
         <div class="row">
            <div class="col-12 sectionHeading">
               <h4>{{ __('content.COACHES')}}</h4>
            </div>
         </div>
         <div class="row" id="resultBlock">
            @foreach($coaches as $val)
               <div class="col-md-4 col-lg-2 col-sm-4">
                     <div class="lesson-block2">
                        <a href="{{route('web.coach.details', base64_encode($val->id))}}">
                           <div class="lesson-image-block2">
                              <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                           </div>
                           <div class="lesson-title-block2">
                              <h4>
                                 {{empty($val->fname) ? 'New User' : $val->fname.' '.$val->lname}}
                                 <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" style="width:15px;">
                              </h4>

                           </div>
                           <div class="lesson-info-block text-center">
                              <p class="descrip">
                                 {{empty($val->description) ? 'No Description' : $val->description}}
                              </p>
                           </div>
                        </a>
                        <div class="lesson-rating-block2">
                           <span class="col-white"> <i class="fa fa-star col-purple"> </i>  5.0  </span>
                           @if(count($val->favCoach) == 0)
                              <a href="javascript:void(0)" class="col-purple fav_coach" data-id="{{$val->id}}" id="{{$val->id}}"> <i class="fa fa-heart col-purple"></i> </a>
                           @endif
                        </div>
                     </div>
               </div>
            @endforeach
            @if(count($coaches) == 0)
               <h4>{{ __('content.No Results Found.')}}</h4>
            @endif
         </div>
      </div>
   </section>


   <section class="pad-top-20 pad-bot-40 bg-dark2 tb-1">
      <div class="container">
         <div class="row">
            <div class="col-12 sectionHeading">
               <h4>{{ __('content.SPORTS BUDDY')}}</h4>
            </div>
         </div>
         <div class="row" id="resultBlock">
            @foreach($buddies as $val)
               <div class="col-md-4 col-lg-2 col-sm-4">
                     <div class="lesson-block2">
                        <a href="{{route('web.buddy.details',base64_encode($val->id))}}">
                           <div class="lesson-image-block2">
                              <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                           </div>
                           <div class="lesson-title-block2">
                              <h4>
                                      {{empty($val->fname) ? 'New User' : $val->fname.' '.$val->lname}}
                                 <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" style="width:15px;">
                              </h4>

                           </div>
                           <div class="lesson-info-block text-center">
                              <p class="descrip">
                                 {{empty($val->description) ? 'No Description' : $val->description}}
                              </p>
                           </div>
                        </a>
                        <div class="lesson-rating-block2">
                           <span class="col-white"> <i class="fa fa-star col-purple"> </i>  5.0  </span>
                           @if(count($val->favBuddy) == 0)
                           <a href="javascript:void(0)" class="col-purple fav_buddy" data-id="{{$val->id}}" id="{{$val->id}}"> <i class="fa fa-heart col-purple"></i> </a>
                           @endif
                        </div>
                     </div>
               </div>
            @endforeach
            @if(count($buddies) == 0)
               <h4>{{ __('content.No Results Found.')}}</h4>
            @endif
         </div>
      </div>
   </section>
   <section class="contact-map" id="mapa">
   </section>
</div>

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

   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>

   <script type="text/javascript">
      var alocations = [
         @foreach($activities as $vall)
            @foreach ($vall->locations as $val)
                  ['{{$vall->title}}', {{$val->lat}}, {{$val->lng}}, '{{$vall->user->fname}} {{$vall->user->lname}}', "{{route('activity.details', base64_encode($vall->id))}}"],
            @endforeach
         @endforeach
      ];
      var llocations = [
         @foreach($lessons as $vall)
            @foreach ($vall->locations as $val)
                  ['{{$vall->title}}', {{$val->lat}}, {{$val->lng}}, '{{$vall->user->fname}} {{$vall->user->lname}}', "{{route('lesson.details', base64_encode($vall->id))}}"],
            @endforeach
         @endforeach
      ];
      var ulocations = [
            @foreach ($coaches as $val)
               ['{{$val->fname.' '.$val->lname}}', {{$val->lat}}, {{$val->lng}}, '{{empty($val->coach_request_status) ? "Sports Buddy" : "Coach, Sports Buddy"}}', "{{route('web.buddy.details', base64_encode($val->id))}}"],
            @endforeach
            @foreach ($buddies as $val)
               ['{{$val->fname.' '.$val->lname}}', {{$val->lat}}, {{$val->lng}}, '{{empty($val->coach_request_status) ? "Sports Buddy" : "Coach, Sports Buddy"}}', "{{route('web.buddy.details', base64_encode($val->id))}}"],
            @endforeach
      ];

      $(document).ready(function(){  
         mapset();

      });

      function mapset(){
         var nlat = alocations[0][1];
         var nlng = alocations[0][2];
         var nZoom = 11;
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
  </script>
@endsection

