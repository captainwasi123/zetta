@extends('web.support.master2')
@section('title', 'Home')
@section('addStyle')
@endsection

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
                           <img src="{{URL::to('/public/storage/settings/sports/')}}/{{$val->sports->image}}">{{ __('content.'.$val->sports->name)}}
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
            <h4 class="gotham-bold col-white"> {{ __('content.Results for')}} "{{@$search_data['val']}} - Activities" </h4>
         </div>
         @if(count($activities) == 0)
            <h4>{{ __('content.No Results Found.')}}</h4>
         @else
            <!-- <div class="all-filters">
               <div class="btn-group">
                  <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Sports <i class="fa fa-caret-down"> </i>
                  </button>
                  <div class="dropdown-menu keep-open">
                     <div class="filters-main-bg">
                        <span class="col-black"> {{ __('content.No Filter')}} </span>
                     </div>
                  </div>
               </div>
               <div class="btn-group">
                  <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Date <i class="fa fa-caret-down"> </i>
                  </button>
                  <div class="dropdown-menu keep-open">
                     <div class="filters-main-bg">
                        <div class="filter-date">
                           <input type="date" format="" name="">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="btn-group">
                  <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Price <i class="fa fa-caret-down"> </i>
                  </button>
                  <div class="dropdown-menu keep-open">
                     <div class="filters-main-bg">
                        <div class="price-range-slider">
                           <p class="range-value">
                              <input type="text" id="amount" readonly>
                           </p>
                           <div id="slider-range" class="range-bar"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="btn-group">
                  <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Time <i class="fa fa-caret-down"> </i>
                  </button>
                  <div class="dropdown-menu keep-open">
                     <div class="filters-main-bg">
                        <div class="filter-date">
                           <input type="time" name="" value="now">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="btn-group">
                  <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Perimeter <i class="fa fa-caret-down"> </i>
                  </button>
                  <div class="dropdown-menu keep-open">
                     <div class="filters-main-bg">
                        <div class="price-range-slider">
                           <p class="range-value">
                              <input type="text" id="amount2" readonly>
                           </p>
                           <div id="slider-range2" class="range-bar"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="btn-group">
                  <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Favourite <i class="fa fa-caret-down"> </i>
                  </button>
                  <div class="dropdown-menu keep-open">
                     <div class="filters-main-bg">
                     </div>
                  </div>
               </div>
               <div class="btn-group">
                  <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Coach Level <i class="fa fa-caret-down"> </i>
                  </button>
                  <div class="dropdown-menu keep-open">
                     <div class="filters-main-bg">
                     </div>
                  </div>
               </div>
               <div class="btn-group">
                  <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  My Friends <i class="fa fa-caret-down"> </i>
                  </button>
                  <div class="dropdown-menu keep-open">
                     <div class="filters-main-bg">
                     </div>
                  </div>
               </div>
               <div class="btn-group">
                  <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Gender <i class="fa fa-caret-down"> </i>
                  </button>
                  <div class="dropdown-menu keep-open">
                     <div class="filters-main-bg">
                        <div class="gender-filter">
                           <label class="container-radio col-black no-margin m-b-0"> {{ __('content.Male')}}
                           <input type="radio" checked="checked" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container-radio col-black no-margin m-b-0"> {{ __('content.Female')}}
                           <input type="radio" checked="checked" name="radio">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="btn-group">
                  <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Based on ratings <i class="fa fa-caret-down"> </i>
                  </button>
                  <div class="dropdown-menu keep-open">
                     <div class="filters-main-bg">
                        <div class="filters-rating">
                           <button class="col-black active"> 5 {{ __('content.star')}} </button>
                           <button class="col-black"> 4 {{ __('content.star')}} </button>
                           <button class="col-black"> 3 {{ __('content.star')}} </button>
                           <button class="col-black"> 2 {{ __('content.star')}} </button>
                           <button class="col-black"> 1 {{ __('content.star')}} </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div> -->
         @endif
      </div>
   </section>
   <!-- Page Content Section Ends Here -->
   <!-- Page Content Starts Here -->
   <section class="pad-top-40 pad-bot-40 bg-dark2">
      <div class="container">
         <div class="row" id="resultBlock">
            @foreach($activities as $val)
                  @if(!empty($val->user))
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
                                 <h4 class="ellipsis2">  {{empty($val->user) ? 'Unknown' : $val->user->fname.' '.$val->user->lname}} <span>{{ __('content.Sports Buddy')}} </span>  </h4>
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
                                 <p class="lesson-title ellipsis">{{$val->title}}</p>
                                 <h6 class="col-white m-b-15"> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                                 <h6 class="col-white m-b-15" style="float: right; margin-right: -10px;">
                                    <span class="bg-purple col-white custom-btn12 "> {{@$val->sports->name}} </span>
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
                                 <span class="col-grey"> {{ __('content.STARTING AT')}} <b class="col-white">
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
                                         {{ __('content.FREE')}}
                                         @endif
                                           </b> </span>
                              </div>
                           </div>
                        </a>
                     </div>
                  @endif
            @endforeach
         </div>

         {{$activities->links()}}
      </div>
   </section>
</div>
@endsection

@section('addScript')

   <script type="text/javascript">
      
   </script>

@endsection
