@extends('web.support.master2')
@section('title', $data->title.' | Activity Details')
@section('addStyle')
<style>
    #mapa {
        height: 200px;
    }
    #map > div{
        height: 200px!important;
        width: 100%!important;
        position: relative!important;
        top: auto!important;
        right: 0px!important;
    }
     .image-checkbox
    {
        cursor: pointer;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        border: 4px solid transparent;
        outline: 0;
    }


        .image-checkbox input[type="checkbox"]
        {
            display: none;
        }

    .image-checkbox-checked
    {
       filter: opacity(.5) drop-shadow(0 0 0 purple);
    }
</style>
@endsection
@section('content')
@php $bookedMember = 0; @endphp
<section class="pad-bot-40 bg-dark2 activity-section">
   <div class="container">
      <div class="row">
         <div class="col-7">
            <div class="row">
               <div class="col-7">
                  <div class="lesson-holder-head m-b-15">
                     <h3> {{$data->title}} </h3>
                  </div>
                  <div class="lesson-holder-title">
                     <a href="javascript:void(0)" id="{{$data->id}}" data-id="{{$data->id}}" class="bor-purple col-white rounded custom-btn1 font-thin fav_act">
                        @if(Auth::check())
                           @php $fv = 0; @endphp
                           @foreach (auth()->user()->fav_activity as $act)
                               @if ($data->id == $act->activity_id && $act->user_id == auth()->user()->id)
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
                  </div>
               </div>
               <div class="col-2">
               </div>
               <div class="col-3">
                  <div class="activity_category"> 
                     <img src="{{URL::to('/public/storage/settings/sports/'.$data->sports->image)}}">
                     <label>{{$data->sports->name}}</label> 
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row m-t-30">
         <div class="col-md-7 col-lg-7 col-sm-12 col-12">
            <div class="lesson-banner-image arrows2">
               <div>
                  <img src="{{URL::to('/public/storage/user/activity/main_image/'.$data->cover_img)}}">
               </div>

               @foreach($data->medias as $val)
                  @php $cont = explode('.', $val->media); @endphp
                  @if($cont[1] == 'mp4')
                     <div>
                        <video style="height:350px; width: 100%;" controls>
                           <source src="{{URL::to('/public/storage/user/activity/media/'.$val->id.'-'.$val->media)}}" type="video/mp4">
                          {{ __('content.Your browser does not support the video element.')}}
                        </video>
                     </div>
                  @else
                     <div>
                        <img src="{{URL::to('/public/storage/user/activity/media/'.$val->id.'-'.$val->media)}}">
                     </div>
                  @endif
               @endforeach
            </div>
            <div class="lesson-holder-about m-t-0 no-border">
               <h3 class="col-white m-b-15"> {{ __('content.About The Sports Buddy')}} </h3>
            </div>
            <div class="lesson-holder-profile">
               <div>
                  <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($data->user) ? '' : $data->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
               </div>
               <a href="{{route('web.buddy.details', base64_encode(@$data->user->id))}}">
                  <h4 class="col-white no-margin m-t-0 m-b-0"> {{empty($data->user->fname) ? 'Anonymous' : $data->user->fname.' '.$data->user->lname}} </h4>
               </a>
               <h6 class="col-grey"> {{ __('content.Sports Buddy')}} </h6>
               @php 
                  $rating_avg = empty($data->user->avgRating) ? '0' : $data->user->avgRating[0]->aggregate; 
               @endphp
               <h5 class="col-purple m-b-15"> 
                  <i class="fa fa-star col-purple"> </i> <strong>{{number_format($rating_avg, 1)}}</strong>  
               </h5>
               <br><br>
            </div>
            

            <div class="lesson-holder-about">
               <h3 class="col-white m-b-15"> {{ __('content.About The Activity')}} </h3>
               <h5 class="col-white m-b-30" >  {{$data->title}} </h5>
               <div class="col-white"  >
                  {!! $data->description !!}
               </div>
               <br>
                <h4>Location:</h3>
                <ul style="color: #fff;">
                  @foreach ($location as $val)
                     <li>{{$val->address}}</li>
                  @endforeach
                </ul>
            </div>
            <div class="lesson-holder-details m-t-40 m-b-20">
               <div class="profile-details1">
                  <div class="row center-row m-b-20">
                     <div class="col-md-5 col-lg-5 col-12">
                        <div class="field-name">
                           <img src="{{URL::to('/assets/website')}}/images/field-icon5.jpg">
                           <span> {{ __('content.City')}} </span>
                        </div>
                     </div>
                     <div class="col-md-7 col-lg-7 col-12">
                        <input type="text" class="form-field3" value="{{empty($data->user) ? 'Unknown' : $data->user->city}}" readonly="" name="">
                     </div>
                  </div>
                  <div class="row center-row m-b-20">
                     <div class="col-md-5 col-lg-5 col-12">
                        <div class="field-name">
                           <img src="{{URL::to('/assets/website')}}/images/field-icon6.jpg">
                           <span> {{ __('content.Sports Category')}}</span>
                        </div>
                     </div>
                     <div class="col-md-7 col-lg-7 col-12">
                        <input type="text" class="form-field3" value="@if(!empty($data->user->category))@foreach($data->user->category as $val){{$val->name}}, @endforeach @endif" readonly="" name="">
                     </div>
                  </div>
                  <div class="row m-b-20">
                     <div class="col-md-12">
                        <div class="description-profile2">
                           <p class="col-grey">
                              {{empty($data->user) ? '' : $data->user->description}}
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="sec-head1 m-t-40 m-b-15">
               <h3 class="col-white"> <br>{{ __('content.Reviews as Sport Buddy')}} </h3>
            </div>
            <div class="review-slider arrows3">
               @foreach($data->user->reviews as $re)
                  <div class="review-box">
                     <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{@$re->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                     <h5 class="col-white"> <b class="col-purple"> {{empty($re->user->fname) ? 'Anonymous' : $re->user->fname.' '.$re->user->lname}} <i class="fa fa-star"> </i> </b> {{number_format($re->rating, 1)}} </h5>
                     <p class="col-white"> 
                        <span>{{date('d-M-Y h:i a', strtotime($re->created_at))}}</span><br>
                        {{empty($re->review) ? '-' : $re->review}}
                     </p>
                  </div>
               @endforeach
               @if(count($data->user->reviews) == 0)
                  <div>
                     <p class="col-white">No Reviews Found.</p>
                  </div>
               @endif
            </div>
            
            <div class="all-ratings m-t-40">
               <div class="row">
                  <div class="col-md-7 col-lg-7 col-sm-12 col-12">
                     <div class="rating-bars">
                        <div class="rating-bar-box">
                           <div> 5 star </div>
                           <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: {{empty($reviews['5']) ? '' : ($reviews['5']/$reviews['total'])*100}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <div> ({{$reviews['5']}}) </div>
                        </div>
                        <div class="rating-bar-box">
                           <div> 4 star </div>
                           <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: {{empty($reviews['4']) ? '' : ($reviews['4']/$reviews['total'])*100}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <div> ({{$reviews['4']}}) </div>
                        </div>
                        <div class="rating-bar-box">
                           <div> 3 star </div>
                           <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: {{empty($reviews['3']) ? '' : ($reviews['3']/$reviews['total'])*100}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <div> ({{$reviews['3']}}) </div>
                        </div>
                        <div class="rating-bar-box">
                           <div> 2 star </div>
                           <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: {{empty($reviews['2']) ? '' : ($reviews['2']/$reviews['total'])*100}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <div> ({{$reviews['2']}}) </div>
                        </div>
                        <div class="rating-bar-box">
                           <div> 1 star </div>
                           <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: {{empty($reviews['1']) ? '' : ($reviews['1']/$reviews['total'])*100}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <div> ({{$reviews['1']}}) </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-12 col-12">
                     <div class="rating-breakdown">
                        <h3 class="col-white"> {{ __('content.Rating Breakdown')}} </h3>
                        <table>
                           <tbody>
                              <tr>
                                 <td class="col-white"> {{ __('content.Seller communication level')}}  </td>
                                 <td class="col-white"> 4.9 <span class="col-purple"> <i class="fa fa-star"> </i> </span> </td>
                              </tr>
                              <tr>
                                 <td class="col-white">{{ __('content.Recommend to a friend')}}  </td>
                                 <td class="col-white"> 4.9 <span class="col-purple"> <i class="fa fa-star"> </i> </span> </td>
                              </tr>
                              <tr>
                                 <td class="col-white"> {{ __('content.Service as described')}} </td>
                                 <td class="col-white"> 4.9 <span class="col-purple"> <i class="fa fa-star"> </i> </span> </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-5 col-lg-5 col-sm-12 col-12">
            <div class="packages-wrapper">
               <div class="packages-main">
                  <ul class="nav nav-tabs" role="tablist" > 
                     {{-- <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Basic</a>
                     </li> --}}
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <div class="package-content">
                           <div class="package-content-head">
                              @if (count($data->equipment)>0)
                              <h3 class="m-b-20 col-white"> {{ __('content.Price')}} <b class="col-purple">
                                @if (count($data->equipment)>0)
                                    @php
                                        $ids = [];
                                        $price = 0;
                                    @endphp
                                    @foreach ($data->equipment as $k => $val)
                                        @php
                                            $price = $price+$val->user_equipment->price;
                                            $ids[$k] = $val->equip_id;
                                        @endphp
                                    @endforeach
                                     ({{'$'.number_format($price)}})
                                @else
                                FREE
                                @endif </b> </h3>
                              @endif
                              <h5 class="col-white m-b-20"> 
                                 <img src="{{URL::to('/assets/website')}}/images/clock-icon.jpg">  
                                 {{date('d-M-Y H:i:s', strtotime($data->held_date))}}
                              </h5>
                           </div>
                           <ul class="list-type1 no-border">
                              <li class="block-element2">
                                 <i class="fa fa-check col-purple"> </i> {{$data->participants == '0' ? 'Single Activity' : 'Group Activity'}} 
                              </li>
                              @if($data->participants > 0)
                                 <li class="block-element2">    
                                    @php 
                                       $bookedMember = empty($data->activeOrdersQty[0]) ? 0 : $data->activeOrdersQty[0]->orderQty;
                                    @endphp                   
                                    <i class="fa fa-check col-purple"> </i> 
                                    {{ $data->group_members == 1 ?    'Participant :'.$bookedMember.'/'.$data->group_members.' Member' :  'Participant :'.$bookedMember.'/'.$data->group_members.' Members'}} 
                                 </li>
                              @endif
                              <li class="block-element2"> <i class="fa fa-check col-purple"> </i> {{$data->location_covered == '0' ? 'Open Location' : 'Covered Location'}} </li>
                              <li class="block-element2"> <i class="fa fa-check col-purple"> </i> 
                                 @switch($data->availability)
                                    @case('1')
                                       Only Zoom Activity
                                       @break

                                    @case('2')
                                       Only Normal Activity
                                       @break

                                    @case('3')
                                       Normal Activity, Zoom Activity
                                       @break
                                 @endswitch
                              </li>
                              <li class="block-element2"> <i class="fa fa-check col-purple"> </i>
                                 {{ __('content.Skill Level')}}:
                                 <table class="table table-striped col-white" style="margin-bottom: -10px;">
                                    <tbody>
                                       @foreach($data->skills as $key => $value)
                                          <tr>
                                            <td class="equ-table">{{$value->skills}}</td>
                                            <td class="equ-table"></td>
                                          </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                              </li>
                              <li class="block-element2"> <i class="fa fa-check col-purple"> </i> 
                                 {{ __('content.Available For')}}: 
                                 <strong>
                                 @php $availability_for = json_decode($data->availability_for); @endphp
                                 @if(!empty($availability_for))
                                    @foreach($availability_for as $value)
                                       @switch($value)
                                          @case('1')
                                             <img src="{{URL::to('/assets/')}}/65+.png" title="For Senior Citizen">
                                             @break

                                          @case('2')
                                             <img src="{{URL::to('/assets/')}}/teenager.png" title="For Teenager"> 
                                             @break

                                          @case('3')
                                             <img src="{{URL::to('/assets/')}}/handicapped.png" title="For Handicapped">
                                             @break
                                       @endswitch
                                    @endforeach
                                 @else
                                    Anyone
                                 @endif
                                 </strong>
                              </li>

                              <li class="block-element2"> <i class="fa fa-check col-purple"> </i> 
                                Equipment :
                                 @if($data->equipment->count() > 0)
                                  <strong> {{ __('content.Available')}}</strong>
                                 <table class="table table-striped col-white ">
                                     <tbody>
                                   
                                      @foreach($data->equipment as $key => $equ)
                                       <tr>
                                         <td class="equ-table">{{ @$equ->user_equipment->name}}</td> 
                                         <td class="equ-table">{{'$ '.number_format(@$equ->user_equipment->price)}}</td> 
                                      </tr>  
                                      @endforeach 
                                                               
                                 </tbody>
                                    </table>
                                 
                                 @else
                                   {{ __('content.Not Available')}}: 
                                 @endif
                                
                              </li>

                           </ul>
                  
                           <div class="block-element2 m-t-30">
                              <p class="m-b-10" >  
                                 @if($data->participants == '0' && $bookedMember > 0)
                                    <a href="javascript:void(0)" class="block-element2 bg-purple col-white rounded custom-btn1 text-center">
                                       Completely Reserved
                                    </a>
                                 @elseif($data->participants == '1' && $bookedMember >= $data->group_members)
                                    <a href="javascript:void(0)" class="block-element2 bg-purple col-white rounded custom-btn1 text-center">
                                       Completely Reserved
                                    </a>
                                 @else
                                    <a href="{{URL::to('/cart/activity/'.base64_encode($data->id).'/basic')}}" class="block-element2 bg-purple col-white rounded custom-btn1 text-center"> Participate
                                       @if (count($data->equipment)>0)
                                          @php
                                              $ids = [];
                                              $price = 0;
                                          @endphp
                                          @foreach ($data->equipment as $k => $val)
                                              @php
                                                  $price = $price+$val->user_equipment->price;
                                                  $ids[$k] = $val->equip_id;
                                              @endphp
                                          @endforeach
                                           ({{'$'.number_format($price)}})
                                       @else
                                       @endif
                                    </a> 
                                 @endif
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="block-element3 m-t-30">
                  <!-- <p class="m-b-0" style="padding:0px 30px">   <a href="{{URL::to('/buddy/inbox/chat/'.base64_encode($data->user_id))}}/{{empty($data->user->fname) ? 'Newuser' : $data->user->fname.' '.$data->user->lname}}" class="block-element2 bg-white col-purple rounded custom-btn1 text-center" data-toggle="modal" data-target="#myModal"> Contact Buddy  </a> </p> -->
                  <p class="m-b-0" style="padding:0px 30px">   
                     @if(Auth::check())
                     <a href="javascript:void(0)" class="block-element2 bg-white col-purple rounded custom-btn1 text-center getUserMessage" data-id="{{base64_encode(@$data->user->id)}}"> Contact Buddy  </a> 
                     @else
                     <a href="javascript:void(0)" class="block-element2 bg-white col-purple rounded custom-btn1 text-center open-login"> Contact Buddy  </a> 
                     @endif

                  </p>
                  <br>
                  @if(session()->has('success'))
                      <div class="alert alert-success">
                          {{ session()->get('success') }}
                      </div>
                  @endif
               </div>
            </div>
            <div class="packages-map block-element3 m-t-30" id="mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.2889612081335!2d-0.08991633469164506!3d51.507914468487286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876035159bb13c5%3A0xa61e28267c3563ac!2sLondon%20Bridge!5e0!3m2!1sen!2s!4v1626273315297!5m2!1sen!2s" width="80%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Page Content Section Ends Here -->
<!-- Page Content Starts Here -->
<section class="pad-top-40 bg-dark2 pad-bot-20" style="border-bottom: 1px solid grey">
   <div class="container">
      <div class="sec-head1 m-b-25">
         <h3 class="col-white"> {{ __('content.Sports Buddy`s Activity')}} </h3>
      </div>
      <div class="boxes-slider1 arrows1">
         @foreach($tactivities as $val)
            <div>
               <a href="{{route('activity.details', base64_encode($val->id))}}">
                  <div class="lesson-block">
                     <div class="lesson-image-block">
                        <img src="{{URL::to('/public/storage/user/activity/main_image/'.$val->cover_img)}}">
                     </div>
                     <div class="lesson-title-block">
                        <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->user) ? '' : $val->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                        <h4>  {{empty($val->user) ? 'Unknown' : $val->user->fname.' '.$val->user->lname}} <span>{{ __('content.Coach')}} </span>  </h4>
                     </div>
                     <div class="lesson-info-block">
                        <p class="lesson-title">{{$val->title}}</p>
                        <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                     </div>
                     <div class="lesson-rating-block">
                        <a href="" class="col-purple"> <i class="fa fa-heart col-purple"></i> </a>
                        <span class="col-grey"> STARTING AT <b class="col-white"> {{ __('content.FREE')}} </b> </span>
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
   <div class="container">
      <div class="sec-head1 m-b-25">
         <h3 class="col-white"> {{ __('content.Related Lesson')}} </h3>
      </div>
      <div class="boxes-slider1 arrows1">
         @foreach($oactivities as $val)
            <div>
               <a href="{{route('activity.details', base64_encode($val->id))}}">
                  <div class="lesson-block">
                     <div class="lesson-image-block">
                        <img src="{{URL::to('/public/storage/user/activity/main_image/'.$val->cover_img)}}">
                     </div>
                     <div class="lesson-title-block">
                        <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->user) ? '' : $val->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                        <h4>  {{empty($val->user) ? 'Unknown' : $val->user->fname.' '.$val->user->lname}} <span>{{ __('content.Coach')}}   </span>  </h4>
                     </div>
                     <div class="lesson-info-block">
                        <p class="lesson-title">{{$val->title}}</p>
                        <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                     </div>
                     <div class="lesson-rating-block">
                        <a href="" class="col-purple"> <i class="fa fa-heart col-purple"></i> </a>
                        <span class="col-grey"> STARTING AT <b class="col-white"> {{ __('content.FREE')}} </b> </span>
                     </div>
                  </div>
               </a>
            </div>
         @endforeach
      </div>
   </div>
</section>


<!-- Modal -->
  <div class="modal fade" id="getUserMessageModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header contact-profile">
          <h4 class="modal-title ">{{ __('content.Send a Message')}} </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <div class="modal-body" id="getUserMessageModalContent">
          
        </div>
      </div>

    </div>
  </div>


<input type="hidden" id="lat">
<input type="hidden" id="lng">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>

<script type="text/javascript">
	$(document).ready(function() {

    var locations = [
        @foreach ($location as $val)
            {{'[1,'.$val->lat.','.$val->lng.',1],'}}
        @endforeach
    ];

    var map = new google.maps.Map(document.getElementById('mapa'), {
      zoom: 13,
      center: new google.maps.LatLng(locations[0][1] , locations[0][2]),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });
      marker.setValues({id :locations[i][3]});

    }

  });


  </script>

@endsection
