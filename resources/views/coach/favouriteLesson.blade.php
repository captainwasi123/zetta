@extends('coach.include.master')
@section('title', 'Favourite Lesson')

@section('content')

   <div class="container-fluid">
      <div class="box-wrapper1">
         <div class="block-element m-b-25">
            <a href="{{route('coach.favouriteCoach')}}" class="custom-btn3 m-r-15"> Coach  </a>
            <a href="{{route('coach.favouriteLesson')}}" class="custom-btn4 m-r-15"> Lessons  </a>
            <a href="{{route('buddy.favouriteBuddy')}}"  class="custom-btn3 m-r-15"> Sports Buddy  </a>
            <a href="{{route('buddy.favouriteActivity')}}" class="custom-btn3"> Activity  </a>
         </div>
         <div class="block-element m-b-20">
            <div class="sec-head1">
               <h3> My Favourite Lesson </h3>
            </div>
         </div>
         <div class="block-element">
            <div class="row">
               @foreach($data as $key => $val)
                  <div class="col-md-4 col-lg-4 col-sm-6 col-12">
                     <a href="{{route('lesson.details', base64_encode($val->lesson_id))}}" target="_blank">
                        <div class="lesson-block">
                           <div class="lesson-image-block">
                              <img src="{{URL::to('/public/storage/user/lessons/main_image/'.@$val->lesson->cover_img)}}">
                           </div>
                           <div class="lesson-info-block">
                              <h4> <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->lesson->user) ? '' : $val->lesson->user->profile_img}}" 
                              onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';"> {{empty($val->lesson->user->fname) ? 'Anonymous' : $val->lesson->user->fname.' '.$val->lesson->user->lname}} <span> Coach </span>  </h4>
                              <p class="lesson-title">
                                 {{empty($val->lesson->title) ? "Deleted" : $val->lesson->title}}
                              </p>

                              <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                           </div>
                           <div class="lesson-rating-block">
                              @if(Auth::check())
                                 <a href="{{route('favourite.lesson.del',$val->id)}}" class="col-purple " >
                                   <i class="fa fa-heart col-purple"></i>
                                 </a>
                              @endif
                              <span class="col-grey">  
                                 <b class="col-white">
                                    @if(!empty($val->lesson->equipment))
                                       <span class="col-grey"> STARTING AT <b class="col-white">
                                         @if (count($val->lesson->packages)>0)
                                          {{'$'.number_format($val->lesson->packages[0]->price)}} </b>
                                         @endif
                                       </span>
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
