@extends('coach.include.master')
@section('title', 'Favourite Coach')

@section('content')


 

 <div class="container-fluid">
               <div class="box-wrapper1">

                 <div class="block-element m-b-25">
                     <a href="{{route('coach.favouriteCoach')}}" class="custom-btn4 m-r-15"> Coach  </a>
                     <a href="{{route('coach.favouriteLesson')}}" class="custom-btn3 m-r-15"> Lessons  </a>
                     <a href="{{route('buddy.favouriteBuddy')}}"  class="custom-btn3 m-r-15"> Sports Buddy  </a>
                     <a href="{{route('buddy.favouriteActivity')}}" class="custom-btn3"> Activity  </a>
                  </div>
                 
                  <div class="block-element m-b-20">
                     <div class="sec-head1">
                        <h3> My Favourite Coach  </h3>
                     </div>
                  </div>

  
                     
                 {{@$val->lesson}}
               <div class="block-element">
                  
                  <div class="row">
   @foreach($data as $key => $val)
                        <div class="col-md-4 col-lg-4 col-sm-6 col-12">
                           <div class="lesson-block lesson-block2">
                              <div class="lesson-image-block ">
                                 
                                    <img src="{{URL::to('/')}}/public/storage/user/lessons/main_image/{{empty($val->user) ? '' : $val}}" 
                                 onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                              </div>
                              <div class="lesson-holder-head">
                                 <div class="lesson-mini-image">
                                
                                      <h4> <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->user) ? '' : $val->user->profile_img}}" 
                                 onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';"></h4>
                                 </div>
                                 <div class="lesson-mini-title ">

                                   
                                  
                                    <h4> {{empty($val->user->fname) ? 'Anonymous' : $val->user->fname.' '.$val->user->lname}} </h4>
                                    <p> Yoga Coach </p>
                                 </div>
                              </div>
                              <div class="lesson-info-block">
                                 <p class="descrip">
                                 {{@$val->user->description}}
                              </p>
                              </div>
                              <div class="lesson-rating-block">
                                 <b class="pull-left1 col-white m-r-20"  > <i class="fa fa-star col-yellow"> </i> 5.0  </b> 
                          


                                 <span class="col-grey">     @if(Auth::check())
                           <a  href="{{route('favourite.coach.del',$val->id)}}" class="col-purple" >    
                             <i class="fa fa-heart col-purple"></i> 
                           </a>
                             @endif   </b> </span>
                              </div>
                           </div>
                        </div>
                      @endforeach
               </div>
              
            </div>
         </div>
      </div>




@endsection
