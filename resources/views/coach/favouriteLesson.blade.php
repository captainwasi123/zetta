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

  
                     
                 {{@$val->lesson}}
               <div class="block-element">
                  
                  <div class="row">
                      @foreach($data as $key => $val)

                        <div class="col-md-4 col-lg-4 col-sm-6 col-12">
                           <div class="lesson-block">
                              <div class="lesson-image-block">
                                 <img src="{{URL::to('/public/storage/user/lessons/main_image/'.@$val->lesson->cover_img)}}">
                              </div>
                              <div class="lesson-info-block">


                           

                                 <h4> <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->user) ? '' : $val->user->profile_img}}" 
                                 onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';"> {{empty($val->user->fname) ? 'Anonymous' : $val->user->fname.' '.$val->user->lname}} <span> Yoga Coach </span>  </h4>
                               

                                 <p class="lesson-title">{{@$val->lesson->title}}</p>
                              <p class="descrip">
                                 {{@$val->lesson->description}}
                              </p>

                                     <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                              {{--  <h6 class="col-white m-b-15 lesson-catagory-text" style="float: right;">
                                 <span class="bg-purple col-white custom-btn12"> {{@$val->lesson->sports->name}} </span>
                              </h6>  --}}
{{--  
                                 <div class="zoom-tag">
                                 @if(!empty($val->lesson->availability))
                                 @if($val->lesson->availability != '2')
                                    <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" title="Online Zoom Classes">
                                 @endif
                                 @endif


                                   @if(!empty($val->lesson->availability_for))
                                 @php $availability_for = json_decode($val->lesson->availability_for); @endphp
                                 
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
                                 @endif
                              </div>  --}}
                               
                              </div>



                                    <div class="product-btn2">
                    
                     </div>
                              <div class="lesson-rating-block">
                             
                        @if(Auth::check())
                           <a href="{{route('favourite.lesson.del',$val->id)}}" class="col-purple " >
                             
                             <i class="fa fa-heart col-purple"></i>
                          
                           </a>
                        @endif
                                 
                                  
                                    <span class="col-grey">  <b class="col-white">
                                    @if(!empty($val->lesson->equipment))
                                <span class="col-grey"> STARTING AT <b class="col-white">
                                @if (count($val->lesson->packages)>0)
                                {{'$'.number_format($val->lesson->packages[0]->price)}} </b>
                                @endif

                            </span>
                                @endif
                                  </b> </span>
                              </div>
                           </div>
                        </div>
                      
                   

                     
                     @endforeach
               </div>
              
            </div>
         </div>
      </div>




@endsection
