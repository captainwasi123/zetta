@extends('web.support.master2')
@section('title', 'Home')

@section('content')

<section class="action-bar">
   <div class="container">
      <form id="stickmanForm">
         @csrf
         <input type="hidden" name="type" value="{{@$search_data['type']}}">
         <input type="hidden" name="sValue" value="{{empty($search_data['val']) ? 'all' : $search_data['val']}}">
         <div class="all-actions arrows1">
            @foreach($sCategories as $val)
               <div class="subCategory">
                  @if(empty($val->sports))
                     <a href="javascript:void(0)" class="image-checkbox" data-id="{{$val->id}}" data-name="{{$val->name}}"> 
                        <input type="checkbox" id="scales" name="stickman[]" value="{{$val->name}}"> 
                        <img src="{{URL::to('/public/storage/settings/category/')}}/{{$val->image}}"> {{$val->name}}
                     </a>
                  @else
                     <a href="javascript:void(0)" class="image-checkbox" data-id="{{$val->id}}" data-name="{{$val->sports->name}}"> 
                        <input type="checkbox" id="scales" name="stickman[]" value="{{$val->sports->name}}"> 
                        <img src="{{URL::to('/public/storage/settings/sports/')}}/{{$val->sports->image}}"> {{$val->sports->name}}
                     </a>
                  @endif
               </div>
            @endforeach       
         </div>
         <div id="subCategoryBlock">
         </div>
      </form>
   </div>
</section>

<!-- Action Bar Ends Here -->
<div id="resultBlock">
   <!-- Page Content Section Starts Here -->
   <section class="pad-top-40 bg-dark2">
      <div class="container">
         <div class="sec-head1 m-b-25">
            <h4 class="gotham-bold col-white"> {{ __('content.Results for')}} "{{@$search_data['val']}} - Lessons" </h4>
         </div>
         @if(count($lessons) == 0)
            <h4>{{ __('content.No Results Found.')}}</h4>
         @else
      
         @endif
      </div>
   </section>
   <!-- Page Content Section Ends Here -->
   <!-- Page Content Starts Here -->
   <section class="pad-top-40 pad-bot-40 bg-dark2">
      <div class="container">
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
                           <h4> {{empty($val->user) ? 'Unknown' : $val->user->fname.' '.$val->user->lname}} <span> {{ __('content.Coach')}} </span>  </h4>
                           <div class="zoom-tag">
                              @if($val->availability != '2')
                                 <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" title="Online Zoom Classes">
                              @endif
                              @php $availability_for = json_decode($val->availability_for); @endphp
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
                           </div>
                        </div>
                        <div class="lesson-info-block">
                           <p class="lesson-title">{{$val->title}}</p>
                           <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                           <h6 class="col-white m-b-15" style="float: right;">
                              <span class="bg-purple col-white custom-btn12"> {{$val->category->name}} </span>
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
                           <span class="col-grey"> {{ __('content.STARTING AT')}} <b class="col-white"> {{'$'.number_format($val->packages[0]->price)}} </b> </span>
                        </div>
                     </div>
                  </a>
               </div>
            @endforeach
         </div>

         {{$lessons->links()}}
      </div>
   </section>
</div>
@endsection

