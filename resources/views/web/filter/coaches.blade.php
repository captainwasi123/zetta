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
                     <a href="javascript:void(0)" class="image-checkbox stickman" data-id="{{$val->id}}" data-name="{{$val->name}}"> 
                        <input type="checkbox" id="scales" name="stickman[]" value="{{$val->name}}"> 
                        <img src="{{URL::to('/public/storage/settings/category/')}}/{{empty($val->cat) ? $val->image : $val->cat->image}}"> {{empty($val->cat) ? $val->name : $val->cat->name}}
                     </a>
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
            <h4 class="gotham-bold col-white"> {{ __('content.Results for')}} "{{@$search_data['val']}} - Coaches" </h4>
         </div>
         @if(count($coaches) == 0)
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
            @foreach($coaches as $val)
               <div class="col-md-4 col-lg-2 col-sm-4">
                     <div class="lesson-block2">
                        <a href="{{route('web.coach.details', base64_encode($val->id))}}">
                           <div class="lesson-image-block2">
                              <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                           </div>
                           <div class="lesson-title-block2">
                              <h4>
                                 {{empty($val->fname) ? 'New User' : $val->fname.' '.$val->lname}}
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
                              <a href="javascript:void(0)" class="col-purple fav_coach" data-id="{{$val->id}}" id="{{$val->id}}"> <i class="far fa-heart col-purple"></i> </a>
                          @else
                           <a href="javascript:void(0)" class="col-purple fav_coach" data-id="{{$val->id}}" id="{{$val->id}}"> <i class="fa fa-heart col-purple"></i> </a>
                           @endif
                        </div>
                     </div>
               </div>
            @endforeach
         </div>

         {{@$coaches->links()}}
      </div>
   </section>
</div>
@endsection
