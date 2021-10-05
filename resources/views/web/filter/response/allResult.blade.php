
<section class="pad-top-40 bg-dark2">
   <div class="container">
      <div class="sec-head1 m-b-25">
         <h4 class="gotham-bold col-white"> <small>Results for</small> "@foreach($searchCategory as $val) {{$val->name}},  @endforeach @if(count($searchCategory) == 0) {{$search_value}} @endif | {{@$search_add}}" </h4>
      </div>
   </div>
</section>

<section class="pad-top-20 pad-bot-40 bg-dark2 tb-1">
   <div class="container">
      <div class="row">
         <div class="col-12 sectionHeading">
            <h4>LESSONS</h4>
         </div>
      </div>
      <div class="row" id="resultBlock">
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
                        <h4> {{empty($val->user->fname) ? 'Anonymous' : $val->user->fname.' '.$val->user->lname}} <span> Coach </span>  </h4>
                        <div class="zoom-tag">
                           @if($val->availability != '2')
                              <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" title="Online Zoom Classes">
                           @endif
                           @if($val->availability_for == '1')
                              <img src="{{URL::to('/assets/')}}/teenager.png" title="For Teenager">
                           @endif
                           @if($val->availability_for == '2')
                              <img src="{{URL::to('/assets/')}}/65+.png" title="For Senior Citizen">
                           @endif
                           @if($val->availability_for == '3')
                              <img src="{{URL::to('/assets/')}}/handicapped.png" title="For Handicapped">
                           @endif
                        </div>
                     </div>
                     <div class="lesson-info-block">
                        <p class="descrip">
                           {{$val->description}}
                        </p>
                        <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                        <h6 class="col-white m-b-15" style="float: right;">
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
                        <span class="col-grey"> STARTING AT <b class="col-white"> {{'$'.number_format($val->packages[0]->price)}} </b> </span>
                     </div>
                  </div>
               </a>
            </div>
         @endforeach
         @if(count($lessons) == 0)
            <h4>No Results Found.</h4>
         @endif
      </div>
   </div>
</section>


<section class="pad-top-20 pad-bot-40 bg-dark2 tb-1">
   <div class="container">
      <div class="row">
         <div class="col-12 sectionHeading">
            <h4>ACTIVITIES</h4>
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
                        <h4>  {{empty($val->user->fname) ? 'Anonymous' : $val->user->fname.' '.$val->user->lname}} <span>Sports Buddy </span>  </h4>
                        <div class="zoom-tag">
                           @if($val->availability != '2')
                              <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" title="Online Zoom Classes">
                           @endif
                           @if($val->availability_for == '1')
                              <img src="{{URL::to('/assets/')}}/teenager.png" title="For Teenager">
                           @endif
                           @if($val->availability_for == '2')
                              <img src="{{URL::to('/assets/')}}/65+.png" title="For Senior Citizen">
                           @endif
                           @if($val->availability_for == '3')
                              <img src="{{URL::to('/assets/')}}/handicapped.png" title="For Handicapped">
                           @endif
                        </div>
                     </div>
                     <div class="lesson-info-block">
                        <p class="descrip">
                           {{$val->description}}
                        </p>
                        <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                        <h6 class="col-white m-b-15" style="float: right;">
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
                        <span class="col-grey"> STARTING AT <b class="col-white"> FREE </b> </span>
                     </div>
                  </div>
               </a>
            </div>
         @endforeach
         @if(count($activities) == 0)
            <h4>No Results Found.</h4>
         @endif
      </div>
   </div>
</section>


<section class="pad-top-20 pad-bot-40 bg-dark2 tb-1">
   <div class="container">
      <div class="row">
         <div class="col-12 sectionHeading">
            <h4>COACHES</h4>
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
                              {{empty($val->fname) ? 'Anonymous' : $val->fname.' '.$val->lname}}
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
            <h4>No Results Found.</h4>
         @endif
      </div>
   </div>
</section>


<section class="pad-top-20 pad-bot-40 bg-dark2 tb-1">
   <div class="container">
      <div class="row">
         <div class="col-12 sectionHeading">
            <h4>SPORTS BUDDY</h4>
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
                                   {{empty($val->fname) ? 'Anonymous' : $val->fname.' '.$val->lname}}
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
            <h4>No Results Found.</h4>
         @endif
      </div>
   </div>
</section>
