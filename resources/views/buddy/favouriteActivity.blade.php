@extends('buddy.include.master')
@section('title', 'Favourite Activity')

@section('content')
   <div class="container-fluid">
      <div class="box-wrapper1">
         <div class="block-element m-b-25">
            <a href="{{route('coach.favouriteCoach')}}" class="custom-btn3 m-r-15"> Coach  </a>
            <a href="{{route('coach.favouriteLesson')}}" class="custom-btn3 m-r-15"> Lessons  </a>
            <a href="{{route('buddy.favouriteBuddy')}}" class="custom-btn3 m-r-15"> Sports Buddy  </a>
            <a href="{{route('buddy.favouriteActivity')}}" class="custom-btn4"> Activity  </a>
         </div>
         <div class="block-element m-b-20">
            <div class="sec-head1">
               <h3> My Favourite Activity  </h3>
            </div>
         </div>
         <div class="block-element">
            <div class="row">
               @foreach($data as $key => $val)
                  <div class="col-md-4 col-lg-4 col-sm-6 col-12">
                     <a href="{{route('activity.details', base64_encode($val->activity_id))}}" target="_blank">
                        <div class="lesson-block">
                           <div class="lesson-image-block">
                              <img src="{{URL::to('/public/storage/user/activity/main_image/'.@$val->activity->cover_img)}}">
                           </div>
                           <div class="lesson-info-block">
                              <h4> <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->activity->user) ? '' : $val->activity->user->profile_img}}" 
                              onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';"> {{empty($val->activity->user->fname) ? 'Anonymous' : $val->activity->user->fname.' '.$val->activity->user->lname}} <span> Sports Buddy </span>  </h4>
                              <p class="lesson-title">{{@$val->activity->title}}</p>
                           </div>
                           <div class="lesson-rating-block">
                              @if(Auth::check())
                                 <a  href="{{route('favourite.activity.del',$val->id)}}" class="col-purple" >
                                   <i class="fa fa-heart col-purple"></i>
                                 </a>
                              @endif
                              <span class="col-grey">  
                                 <b class="col-white">
                                    @if(!empty($val->activity->equipment))
                                       @if (count($val->activity->equipment)>0)
                                          @php
                                              $ids = [];
                                              $price = 0;
                                          @endphp
                                          @foreach ($val->activity->equipment as $k => $val)
                                              @php
                                                $price = $price+$val->user_equipment->price;
                                                  $ids[$k] = $val->equip_id;
                                              @endphp
                                          @endforeach
                                           {{'$'.number_format($price)}}   
                                      @else
                                       PARTICIPATE
                                      @endif
                                    @endif
                                 </b> 
                              </span>
                           </div>
                        </div>
                     </a>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
@endsection
