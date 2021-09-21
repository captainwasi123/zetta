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

<section class="pad-bot-40 bg-dark2 activity-section">
   <div class="container">
      <div class="row">
         <div class="col-7">
            <div class="row">
               <div class="col-10">
                  <div class="lesson-holder-head m-b-15">
                     <h3> {{$data->title}} </h3>
                  </div>
                  <div class="lesson-holder-title">
                     <div class="lesson-title-block">
                        <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($data->user) ? '' : $data->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                        <h4>  {{empty($data->user) ? 'Unknown' : $data->user->fname.' '.$data->user->lname}} <span> Sports Buddy </span>  </h4>
                     </div>
                     <div class="lesson-holder-review">
                        <i class="fa fa-star col-purple"> </i>
                        <i class="fa fa-star col-purple"> </i>
                        <i class="fa fa-star col-purple"> </i>
                        <i class="fa fa-star col-purple"> </i>
                        <i class="fa fa-star col-purple"> </i>
                        <b class="col-purple"> 5.0 </b>
                     </div>
                  </div>
               </div>
               <div class="col-2">
                  <div class="activity_category"> 
                     <img src="{{URL::to('/public/storage/settings/category/'.$data->category->image)}}">
                     <label>{{$data->category->name}}</label> 
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
            </div>
            <div class="lesson-holder-about m-t-0 no-border">
               <h3 class="col-white m-b-15"> About The Sports Buddy </h3>
            </div>
            <div class="lesson-holder-profile">
               <div>
                  <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($data->user) ? '' : $data->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
               </div>
               <h4 class="col-white no-margin m-t-0 m-b-0"> {{empty($data->user) ? 'Unknown' : $data->user->fname.' '.$data->user->lname}} </h4>
               <h6 class="col-grey"> Sports Buddy </h6>
               <h5 class="col-purple m-b-15"> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> <i class="fa fa-star col-purple"> </i> 5.0  </h5>
               <a href="{{URL::to('/buddy/inbox/chat/'.base64_encode($data->user_id))}}/{{empty($data->user->fname) ? 'Newuser' : $data->user->fname.' '.$data->user->lname}}" class="bor-purple col-white rounded custom-btn1 font-thin"> Contact Me </a>
            </div>
            

            <div class="lesson-holder-about">
               <h3 class="col-white m-b-15"> About The Activity </h3>
               <h5 class="col-white m-b-30" >  {{$data->title}} </h5>
               <p class="col-white"  >
                  {{$data->description}}
               </p>
            </div>
            <div class="lesson-holder-details m-t-40">
               <div class="profile-details1">
                  <div class="row center-row m-b-20">
                     <div class="col-md-5 col-lg-5 col-12">
                        <div class="field-name">
                           <img src="{{URL::to('/assets/website')}}/images/field-icon5.jpg">
                           <span> City </span>
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
                           <span> Sports Category</span>
                        </div>
                     </div>
                     <div class="col-md-7 col-lg-7 col-12">
                        <input type="text" class="form-field3" value="@foreach($data->user->category as $val){{$val->name}}, @endforeach" readonly="" name="">
                     </div>
                  </div>
               </div>
               <div class="description-profile2">
                  <p class="col-grey">
                     {{empty($data->user) ? '' : $data->user->description}}
                  </p>
               </div>
            </div>
            <div class="sec-head1 m-t-40 m-b-15" style="visibility: hidden;">
               <h3 class="col-white"> Reviews as Sport Buddy </h3>
            </div>
            <div class="review-slider arrows3" style="visibility: hidden;">
               <div class="review-box">
                  <img src="{{URL::to('/assets/website')}}/images/profile-image1.jpg">
                  <h5 class="col-white"> <b class="col-purple"> Lennon <i class="fa fa-star"> </i> </b> 5.0 </h5>
                  <p class="col-white"> That would be good please share any reference or similar website interms of features
                     and functionality you need.
                  </p>
               </div>
               <div class="review-box">
                  <img src="{{URL::to('/assets/website')}}/images/profile-image1.jpg">
                  <h5 class="col-white"> <b class="col-purple"> Lennon <i class="fa fa-star"> </i> </b> 5.0 </h5>
                  <p class="col-white"> That would be good please share any reference or similar website interms of features
                     and functionality you need.
                  </p>
               </div>
               <div class="review-box">
                  <img src="{{URL::to('/assets/website')}}/images/profile-image1.jpg">
                  <h5 class="col-white"> <b class="col-purple"> Lennon <i class="fa fa-star"> </i> </b> 5.0 </h5>
                  <p class="col-white"> That would be good please share any reference or similar website interms of features
                     and functionality you need.
                  </p>
               </div>
            </div>
            <div class="sec-head1 m-t-60 m-b-15">
               <h3 class="col-white"> Reviews as Sport Buddy </h3>
            </div>
            <div class="review-slider arrows3">
               <div class="review-box">
                  <img src="{{URL::to('/assets/website')}}/images/profile-image1.jpg">
                  <h5 class="col-white"> <b class="col-purple"> Lennon <i class="fa fa-star"> </i> </b> 5.0 </h5>
                  <p class="col-white"> That would be good please share any reference or similar website interms of features
                     and functionality you need.
                  </p>
               </div>
               <div class="review-box">
                  <img src="{{URL::to('/assets/website')}}/images/profile-image1.jpg">
                  <h5 class="col-white"> <b class="col-purple"> Lennon <i class="fa fa-star"> </i> </b> 5.0 </h5>
                  <p class="col-white"> That would be good please share any reference or similar website interms of features
                     and functionality you need.
                  </p>
               </div>
               <div class="review-box">
                  <img src="{{URL::to('/assets/website')}}/images/profile-image1.jpg">
                  <h5 class="col-white"> <b class="col-purple"> Lennon <i class="fa fa-star"> </i> </b> 5.0 </h5>
                  <p class="col-white"> That would be good please share any reference or similar website interms of features
                     and functionality you need.
                  </p>
               </div>
            </div>
            
            <div class="all-ratings m-t-40">
               <div class="row">
                  <div class="col-md-7 col-lg-7 col-sm-12 col-12">
                     <div class="rating-bars">
                        <div class="rating-bar-box">
                           <div> 5 star </div>
                           <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <div> (364) </div>
                        </div>
                        <div class="rating-bar-box">
                           <div> 4 star </div>
                           <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <div> (364) </div>
                        </div>
                        <div class="rating-bar-box">
                           <div> 3 star </div>
                           <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <div> (364) </div>
                        </div>
                        <div class="rating-bar-box">
                           <div> 2 star </div>
                           <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <div> (364) </div>
                        </div>
                        <div class="rating-bar-box">
                           <div> 1 star </div>
                           <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                           <div> (64) </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-12 col-12">
                     <div class="rating-breakdown">
                        <h3 class="col-white"> Rating Breakdown </h3>
                        <table>
                           <tbody>
                              <tr>
                                 <td class="col-white"> Seller communication level  </td>
                                 <td class="col-white"> 4.9 <span class="col-purple"> <i class="fa fa-star"> </i> </span> </td>
                              </tr>
                              <tr>
                                 <td class="col-white">Recommend to a friend  </td>
                                 <td class="col-white"> 4.9 <span class="col-purple"> <i class="fa fa-star"> </i> </span> </td>
                              </tr>
                              <tr>
                                 <td class="col-white"> Service as described  </td>
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
                  <ul class="nav nav-tabs" role="tablist">
                     {{-- <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Basic</a>
                     </li> --}}
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <div class="package-content">
                           <div class="package-content-head">
                              <h3 class="m-b-20 col-white"> Price <b class="col-purple">
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
                              <p class="col-white m-b-20"> {{$data->description}}  </p>
                              {{-- <h5 class="col-white m-b-20"> <img src="{{URL::to('/assets/website')}}/images/clock-icon.jpg"> 9 am - 12 am </h5> --}}
                           </div>
                           {{-- <ul class="list-type1 no-border">
                              <li class="block-element2"> <i class="fa fa-check col-purple"> </i> Lorem Ipsum </li>
                              <li class="block-element2"> <i class="fa fa-check col-purple"> </i> Lorem Ipsum </li>
                              <li class="block-element2"> <i class="fa fa-check col-purple"> </i> Lorem Ipsum </li>
                              <li class="block-element2"> <i class="fa fa-check col-purple"> </i> Lorem Ipsum </li>
                              <li class="block-element2"> <i class="fa fa-check col-purple"> </i> Lorem Ipsum </li>
                              <li class="block-element2"> <i class="fa fa-check col-purple"> </i> Lorem Ipsum </li>
                           </ul> --}}
                           <div class="block-element2 m-t-30">
                              <p class="m-b-10" >  <a href="{{URL::to('/cart/activity/'.base64_encode($data->id).'/basic')}}" class="block-element2 bg-purple col-white rounded custom-btn1 text-center"> Continue
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
                                @endif

                            </a> </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="block-element3 m-t-30">
                  <!-- <p class="m-b-0" style="padding:0px 30px">   <a href="{{URL::to('/buddy/inbox/chat/'.base64_encode($data->user_id))}}/{{empty($data->user->fname) ? 'Newuser' : $data->user->fname.' '.$data->user->lname}}" class="block-element2 bg-white col-purple rounded custom-btn1 text-center" data-toggle="modal" data-target="#myModal"> Contact Buddy  </a> </p> -->
                  <p class="m-b-0" style="padding:0px 30px">   <a href="#" class="block-element2 bg-white col-purple rounded custom-btn1 text-center" data-toggle="modal" data-target="#myModal"> Contact Buddy  </a> </p>
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
         <h3 class="col-white"> Sports Buddy's Activity </h3>
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
                        <h4>  {{empty($val->user) ? 'Unknown' : $val->user->fname.' '.$val->user->lname}} <span>Coach </span>  </h4>
                     </div>
                     <div class="lesson-info-block">
                        <p class="descrip">
                           {{$val->description}}
                        </p>
                        <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                     </div>
                     <div class="lesson-rating-block">
                        <a href="" class="col-purple"> <i class="fa fa-heart col-purple"></i> </a>
                        <span class="col-grey"> STARTING AT <b class="col-white"> FREE </b> </span>
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
         <h3 class="col-white"> Related Activity </h3>
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
                        <h4>  {{empty($val->user) ? 'Unknown' : $val->user->fname.' '.$val->user->lname}} <span>Coach </span>  </h4>
                     </div>
                     <div class="lesson-info-block">
                        <p class="descrip">
                           {{$val->description}}
                        </p>
                        <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                     </div>
                     <div class="lesson-rating-block">
                        <a href="" class="col-purple"> <i class="fa fa-heart col-purple"></i> </a>
                        <span class="col-grey"> STARTING AT <b class="col-white"> FREE </b> </span>
                     </div>
                  </div>
               </a>
            </div>
         @endforeach
      </div>
   </div>
</section>


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header contact-profile">
          <h4 class="modal-title ">Send a Message</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="contact-profile-section">
              <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($data->user) ? '' : $data->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
              <h3>gmxsolution</h3>
              <h4>away</h4>
              </div>
              <hr>
              <div class="contact-profile-section1">
                <h3>Please include:</h3>
                <ul>
                  <li>Project Description</li>
                  <li>Project Description</li>
                  <li>Project Description</li>                
                </ul>
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="contact-profile-section3">
                <form>
                  <textarea rows="11" cols="5"></textarea>
                  <input type="submit" name="">
                </form>                
              </div>
            </div>            
          </div>
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
