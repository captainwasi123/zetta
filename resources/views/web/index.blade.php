@extends('web.support.master')
@section('title', 'Home')

@section('content')

<section class="banner-sec">
         <div class="container-fluid">
            <div class="banner-text text-center">
               <h2 class="gotham-bold col-white"> Find <br/> The Perfect Sport Buddy </h2>
            </div>
            <div class="search-form">
               <form method="get" action="{{route('web.search')}}">
                  <div class="label-field3">
                     <i class="fa fa-search"> </i>
                     <input type="text" placeholder="Search" name="val" required>
                  </div>
                  <div class="label-field3">
                     <i class="fa fa-filter"> </i>
                     <select name="type">
                        <option>Lessons</option>
                        <option>Activities</option>
                        <option>Coaches</option>
                        <option>Sports Buddies</option>
                     </select>
                  </div>
                  <div class="submit-field1">
                     <button class="bg-purple col-white custom-btn1"> Search </button>
                  </div>
               </form>
            </div>
         </div>
      </section>
      <!-- Banner Section Ends Here -->
      <!-- Sports Buddy Section Starts Here -->
      <section class="bg-dark2 pad-top-20 pad-bot-40">
         <div class="container-fluid">
            <div class="sec-head1 m-b-40">
               <h2 class="col-white gotham-bold m-b-10"> The Best Sport Buddies Rated </h2>
               <p class="col-grey m-b-0"> Each sports coach is carefully selected by the TrainMe team </p>
            </div>
            <div class="row">
               <div class="col-md-2 col-lg-2 col-sm-12 col-12 order-lg-2 order-md-2">
                  <div class="all-filters2">
                     {{-- <button class="buddy-btn active"> Friends </button> --}}
                     <a class="buddy-btn" href="{{route('web.search.filter','friend')}}">Friends</a>
                     <a class="buddy-btn" href="{{route('web.search.filter','online_coach')}}">Online Coach</a>
                     <a class="buddy-btn" href="{{route('web.search.filter','group_coach')}}">Group Coach</a>
                     <a class="buddy-btn" href="{{route('web.search.filter','private_coach')}}">Private Coach</a>
                     <a class="buddy-btn" href="{{route('web.search.filter','girl')}}">Girl Coach</a>
                     {{-- <button class="buddy-btn"> Online Coach </button> --}}
                     {{-- <button class="buddy-btn"> Private Coach </button> --}}
                     {{-- <button class="buddy-btn"> Girls Coach </button> --}}
                     <button class="buddy-btn"> Find My Teacher </button>
                  </div>
               </div>
               <div class="col-md-10 col-lg-10 col-sm-12 col-12 order-lg-1 order-md-1">
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
               <h2 class="col-white gotham-bold text-center m-b-40"> Sport Buddy Sessions </h2>
            </div>
            <div class="boxes-slider1 arrows1">
               @foreach($activities as $val)

                  <div>
                     <a href="{{route('activity.details', base64_encode($val->id))}}">
                        <div class="lesson-block">
                           <div class="lesson-image-block">
                              <img src="{{URL::to('/public/storage/user/activity/main_image/'.$val->cover_img)}}">
                           </div>
                           <div class="lesson-title-block">
                              <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->user) ? '' : $val->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                              <h4>  {{empty($val->user) ? 'Unknown' : $val->user->fname.' '.$val->user->lname}} <span>Sports Buddy </span>  </h4>
                           </div>
                           <div class="lesson-info-block">
                              <p class="descrip">
                                 {{ Str::substr($val->description, 0, 30)}} ...
                              </p>
                              <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                           </div>
                           <div class="lesson-rating-block">
                              <a href="javascript:void(0)" data-id="{{$val->id}}" class="col-purple fav_act" id="{{$val->id}}" >
                                    {{-- @foreach (auth()->user()->fav_activity as $act)
                                        @if ($val->id == $act->activity_id && $act->user_id == auth()->user()->id)
                                            <i class="fa fa-heart col-purple"></i>
                                        @else (empty(auth()->user()->fav_activity))
                                            <i class="far fa-heart col-purple"></i>
                                        @endif
                                    @endforeach --}}
                                    {{-- @if ($val->fav_act->user_id == auth()->user()->id)
                                        <i class="fa fa-heart col-purple"></i>
                                    @else
                                        <i class="far fa-heart col-purple"></i>
                                    @endif --}}
                                    <i class="far fa-heart col-purple"></i>
                            </a>
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
                           <div class="lesson-image-block">
                              <img src="{{URL::to('/public/storage/user/lessons/main_image/'.$val->cover_img)}}">
                           </div>
                           <div class="lesson-title-block">
                              <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->user) ? '' : $val->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                              <h4> {{empty($val->user) ? 'Unknown' : $val->user->fname.' '.$val->user->lname}} <span> Coach </span>  </h4>
                              @if($val->availability != '2')
                                 <div class="zoom-tag"> <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png"></div>
                              @endif
                           </div>
                           <div class="lesson-info-block">
                              <p class="descrip">
                                 {{ Str::substr($val->description, 0, 30)}} ...
                              </p>
                              <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                           </div>
                           <div class="lesson-rating-block">
                            <a href="javascript:void(0)" class="col-purple fav_lesson " data-id="{{$val->id}}" id="{{$val->id}}" >
                                <i class="far fa-heart col-purple"></i>
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
               <h2 class="col-white gotham-bold text-center m-b-20 text-center"> Reviews from Customers </h2>
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
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.3733645583543!2d6.148813815099483!3d46.203027191861324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c652e1684fd1f%3A0x5bc95524fc281d4b!2sRue%20du%20Port%203%2C%201204%20Gen%C3%A8ve%2C%20Switzerland!5e0!3m2!1sen!2s!4v1626247013749!5m2!1sen!2s" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </section>
<input type="hidden" id="lat">
<input type="hidden" id="lng">
@endsection
