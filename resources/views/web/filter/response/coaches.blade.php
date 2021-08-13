@foreach($coaches as $val)
   <div class="col-md-4 col-lg-2 col-sm-4">
         <div class="lesson-block2">
            <div class="lesson-image-block2">
               <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
            </div>
            <div class="lesson-title-block2">
               <h4>
                   <a href="{{route('web.coach.details',base64_encode($val->id))}}">
                  {{empty($val->fname) ? 'New User' : $val->fname.' '.$val->lname}}
                   </a>
                  <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" style="width:15px;">
               </h4>

            </div>
            <div class="lesson-info-block text-center">
               <p class="descrip">
                  {{empty($val->description) ? 'No Description' : $val->description}}
               </p>
            </div>
            <div class="lesson-rating-block2">
               <span class="col-white"> <i class="fa fa-star col-purple"> </i>  5.0  </span>
               <a href="javascript:void(0)" class="col-purple fav_coach" data-id="{{$val->id}}" id="{{$val->id}}"> <i class="fa fa-heart col-purple"></i> </a>
            </div>
         </div>
      </div>
@endforeach
@if(count($coaches) == '0')

   <div class="col-12">
      <h4>No Result Found.</h4>
   </div>

@endif
      