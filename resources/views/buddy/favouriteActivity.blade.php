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

  
                     
                  {{@$val}}
               <div class="block-element">
                  
                  <div class="row">
                      @foreach($data as $key => $val)

                        <div class="col-md-4 col-lg-4 col-sm-6 col-12">
                           <div class="lesson-block">
                              <div class="lesson-image-block">
                                 <img src="{{URL::to('/public/storage/user/activity/main_image/'.@$val->activity->cover_img)}}">
                              </div>
                              <div class="lesson-info-block">


                           

                                 <h4> <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->user) ? '' : $val->user->profile_img}}" 
                                 onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';"> {{empty($val->user->fname) ? 'Anonymous' : $val->user->fname.' '.$val->user->lname}} <span> Yoga Coach </span>  </h4>
                               

                                 <p class="lesson-title">{{@$val->activity->title}}</p>
                              <p class="descrip">
                                 {{@$val->activity->description}}
                              </p>

                                     <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                              {{--  <h6 class="col-white m-b-15 lesson-catagory-text" style="float: right;">
                                 <span class="bg-purple col-white custom-btn12"> {{@$val->activity->sports->name}} </span>
                              </h6>  --}}
{{--  
                                 <div class="zoom-tag">
                                 @if(!empty($val->activity->availability))
                                 @if($val->activity->availability != '2')
                                    <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" title="Online Zoom Classes">
                                 @endif
                                 @endif


                                   @if(!empty($val->activity->availability_for))
                                                  
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

                           <a  href="{{route('favourite.activity.del',$val->id)}}" class="col-purple" >
                              {{--  @if(empty($val->activity->id))  --}}
                             <i class="fa fa-heart col-purple"></i>
                              {{--  @else  --}}
                             {{--  <i class="far fa-heart col-purple"></i>  --}}
                              {{--  @endif  --}}
                           </a>
                        @endif
                                 
                                  
                                    <span class="col-grey">  <b class="col-white">
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
