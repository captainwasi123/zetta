@foreach($activities as $val)
   <div class="col-md-4 col-lg-2 col-sm-4">
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
                  {{$val->description}}
               </p>
               <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
            </div>
            <div class="lesson-rating-block">
               <a href="javascript:void(0)" data-id="{{$val->id}}" id="{{$val->id}}" class="col-purple fav_act"> <i class="fa fa-heart col-purple"></i> </a>
               <span class="col-grey"> STARTING AT <b class="col-white"> FREE </b> </span>
            </div>
         </div>
      </a>
   </div>
@endforeach
@if(count($activities) == '0')

   <div class="col-12">
      <h4>No Result Found.</h4>
   </div>

@endif
      