@extends('web.support.master2')
@section('title', 'Home')

@section('content')

@if ($search_data['type'] == 'girl')
<section class="action-bar">
    <div class="container">
       <div class="all-actions arrows1">
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> Starting Excercise </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon2.jpg"> Fitness Expert </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon3.jpg"> Body Fitness </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon4.jpg"> Martial Art </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon5.jpg"> Swimming </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon6.jpg"> Boxing </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon7.jpg"> Fencing </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon8.jpg"> Racing </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> Starting Excercise </a>
          </div>
       </div>
    </div>
</section>
<section class="pad-top-40 bg-dark2">
    <div class="container">
    <div class="sec-head1 m-b-25">
        <h4 class="gotham-bold col-white"> Results for "{{$search_data['val']}} - Coaches" </h4>
    </div>
    @if(count($coaches) == 0)
        <h4>No Results Found.</h4>
    @else
        <div class="all-filters">
            <div class="btn-group">
                <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sports <i class="fa fa-caret-down"> </i>
                </button>
                <div class="dropdown-menu keep-open">
                <div class="filters-main-bg">
                    <span class="col-black"> No Filter </span>
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
                        <label class="container-radio col-black no-margin m-b-0"> Male
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-radio col-black no-margin m-b-0"> Female
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
                        <button class="col-black active"> 5 star </button>
                        <button class="col-black"> 4 star </button>
                        <button class="col-black"> 3 star </button>
                        <button class="col-black"> 2 star </button>
                        <button class="col-black"> 1 star </button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @endif
    </div>
</section>
<section class="pad-top-40 pad-bot-40 bg-dark2">
    <div class="container">
        <div class="row">
            @foreach($coaches as $val)


                <div class="col-md-4 col-lg-2 col-sm-4">
                    <div class="lesson-block2">
                        <div class="lesson-image-block2">
                            <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                        </div>
                        <div class="lesson-title-block2">
                            <h4>
                                <a href="{{route('web.coach.details',base64_encode($val->id))}}">
                            {{$val->fname.' '.$val->lname}}
                                </a>
                                @if ($val->availability == 1)
                                    <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" style="width:15px;">
                                @endif
                            </h4>

                        </div>
                        <div class="lesson-info-block text-center">
                            <p class="descrip">
                            {{$val->description}}
                            </p>
                        </div>
                        <div class="lesson-rating-block2">
                            <span class="col-white"> <i class="fa fa-star col-purple"> </i>  5.0  </span>
                            <a href="javascript:void(0)" class="col-purple fav_coach" data-id="{{$val->id}}" id="{{$val->id}}"> <i class="far fa-heart col-purple"></i> </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{@$coaches->links()}}
    </div>
</section>
@elseif ($search_data['type'] == 'friend')
<section class="action-bar">
    <div class="container">
       <div class="all-actions arrows1">
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> Starting Excercise </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon2.jpg"> Fitness Expert </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon3.jpg"> Body Fitness </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon4.jpg"> Martial Art </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon5.jpg"> Swimming </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon6.jpg"> Boxing </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon7.jpg"> Fencing </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon8.jpg"> Racing </a>
          </div>
          <div>
             <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> Starting Excercise </a>
          </div>
       </div>
    </div>
</section>
<section class="pad-top-40 bg-dark2">
    <div class="container">
    <div class="sec-head1 m-b-25">
        <h4 class="gotham-bold col-white"> Results for "{{$search_data['val']}} - Coaches" </h4>
    </div>
    @if(count($coaches) == 0)
        <h4>No Results Found.</h4>
    @else
        <div class="all-filters">
            <div class="btn-group">
                <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sports <i class="fa fa-caret-down"> </i>
                </button>
                <div class="dropdown-menu keep-open">
                <div class="filters-main-bg">
                    <span class="col-black"> No Filter </span>
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
                        <label class="container-radio col-black no-margin m-b-0"> Male
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-radio col-black no-margin m-b-0"> Female
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
                        <button class="col-black active"> 5 star </button>
                        <button class="col-black"> 4 star </button>
                        <button class="col-black"> 3 star </button>
                        <button class="col-black"> 2 star </button>
                        <button class="col-black"> 1 star </button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @endif
    </div>
</section>
<section class="pad-top-40 pad-bot-40 bg-dark2">
    <div class="container">
        <div class="row">
            @foreach($coaches as $val)


                <div class="col-md-4 col-lg-2 col-sm-4">
                    <div class="lesson-block2">
                        <div class="lesson-image-block2">
                            <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                        </div>
                        <div class="lesson-title-block2">
                            <h4>
                                <a href="{{route('web.coach.details',base64_encode($val->id))}}">
                            {{$val->fname.' '.$val->lname}}
                                </a>
                                @if ($val->availability == 1)
                                    <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" style="width:15px;">
                                @endif
                            </h4>

                        </div>
                        <div class="lesson-info-block text-center">
                            <p class="descrip">
                            {{$val->description}}
                            </p>
                        </div>
                        <div class="lesson-rating-block2">
                            <span class="col-white"> <i class="fa fa-star col-purple"> </i>  5.0  </span>
                            <a href="javascript:void(0)" class="col-purple fav_buddy" data-id="{{$val->id}}" id="{{$val->id}}"> <i class="far fa-heart col-purple"></i> </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{@$coaches->links()}}
    </div>
</section>
@else
    <section class="action-bar">
        <div class="container">
           <div class="all-actions arrows1">
              <div>
                 <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> Starting Excercise </a>
              </div>
              <div>
                 <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon2.jpg"> Fitness Expert </a>
              </div>
              <div>
                 <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon3.jpg"> Body Fitness </a>
              </div>
              <div>
                 <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon4.jpg"> Martial Art </a>
              </div>
              <div>
                 <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon5.jpg"> Swimming </a>
              </div>
              <div>
                 <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon6.jpg"> Boxing </a>
              </div>
              <div>
                 <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon7.jpg"> Fencing </a>
              </div>
              <div>
                 <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon8.jpg"> Racing </a>
              </div>
              <div>
                 <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> Starting Excercise </a>
              </div>
           </div>
        </div>
    </section>
     <!-- Action Bar Ends Here -->
     <!-- Page Content Section Starts Here -->
    <section class="pad-top-40 bg-dark2">
        <div class="container">
        <div class="sec-head1 m-b-25">
            <h4 class="gotham-bold col-white"> Results for "{{$search_data['val']}} - Coaches" </h4>
        </div>
        @if(count($coaches) == 0)
            <h4>No Results Found.</h4>
        @else
            <div class="all-filters">
                <div class="btn-group">
                    <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sports <i class="fa fa-caret-down"> </i>
                    </button>
                    <div class="dropdown-menu keep-open">
                    <div class="filters-main-bg">
                        <span class="col-black"> No Filter </span>
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
                            <label class="container-radio col-black no-margin m-b-0"> Male
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                            </label>
                            <label class="container-radio col-black no-margin m-b-0"> Female
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
                            <button class="col-black active"> 5 star </button>
                            <button class="col-black"> 4 star </button>
                            <button class="col-black"> 3 star </button>
                            <button class="col-black"> 2 star </button>
                            <button class="col-black"> 1 star </button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @endif
        </div>
    </section>
     <!-- Page Content Section Ends Here -->
     <!-- Page Content Starts Here -->
    <section class="pad-top-40 pad-bot-40 bg-dark2">
        <div class="container">
            <div class="row">
                @foreach($coaches as $val)


                    <div class="col-md-4 col-lg-2 col-sm-4">
                        <div class="lesson-block2">
                            <div class="lesson-image-block2">
                                <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->user->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                            </div>
                            <div class="lesson-title-block2">
                                <h4>
                                    <a href="{{route('web.coach.details',base64_encode($val->user->id))}}">
                                {{$val->user->fname.' '.$val->user->lname}}
                                    </a>
                                    @if ($val->availability == 1)
                                        <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" style="width:15px;">
                                    @endif
                                </h4>

                            </div>
                            <div class="lesson-info-block text-center">
                                <p class="descrip">
                                {{$val->description}}
                                </p>
                            </div>
                            <div class="lesson-rating-block2">
                                <span class="col-white"> <i class="fa fa-star col-purple"> </i>  5.0  </span>
                                <a href="javascript:void(0)" class="col-purple fav_coach" data-id="{{$val->id}}" id="{{$val->id}}"> <i class="far fa-heart col-purple "></i> </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{@$coaches->links()}}
        </div>
    </section>
@endif
{{-- <section class="action-bar">
   <div class="container">
      <div class="all-actions arrows1">
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> Starting Excercise </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon2.jpg"> Fitness Expert </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon3.jpg"> Body Fitness </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon4.jpg"> Martial Art </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon5.jpg"> Swimming </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon6.jpg"> Boxing </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon7.jpg"> Fencing </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon8.jpg"> Racing </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> Starting Excercise </a>
         </div>
      </div>
   </div>
</section>
<!-- Action Bar Ends Here -->
<!-- Page Content Section Starts Here -->
<section class="pad-top-40 bg-dark2">
   <div class="container">
      <div class="sec-head1 m-b-25">
         <h4 class="gotham-bold col-white"> Results for "{{$search_data['val']}} - Coaches" </h4>
      </div>
      @if(count($coaches) == 0)
         <h4>No Results Found.</h4>
      @else
         <div class="all-filters">
            <div class="btn-group">
               <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Sports <i class="fa fa-caret-down"> </i>
               </button>
               <div class="dropdown-menu keep-open">
                  <div class="filters-main-bg">
                     <span class="col-black"> No Filter </span>
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
                        <label class="container-radio col-black no-margin m-b-0"> Male
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-radio col-black no-margin m-b-0"> Female
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
                        <button class="col-black active"> 5 star </button>
                        <button class="col-black"> 4 star </button>
                        <button class="col-black"> 3 star </button>
                        <button class="col-black"> 2 star </button>
                        <button class="col-black"> 1 star </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      @endif
   </div>
</section>
<!-- Page Content Section Ends Here -->
<!-- Page Content Starts Here -->
<section class="pad-top-40 pad-bot-40 bg-dark2">
   <div class="container">
      <div class="row">
         @foreach($coaches as $val)


            <div class="col-md-4 col-lg-2 col-sm-4">
                  <div class="lesson-block2">
                     <div class="lesson-image-block2">
                        <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{Auth::user()->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                     </div>
                     <div class="lesson-title-block2">
                        <h4>
                            <a href="{{route('web.user.details',base64_encode($val->user->id))}}">
                           {{$val->user->fname.' '.$val->user->lname}}
                            </a>
                            @if ($val->availability == 1)
                                <img src="{{URL::to('/assets/website')}}/images/zoom-logo.png" style="width:15px;">
                            @endif
                        </h4>

                     </div>
                     <div class="lesson-info-block text-center">
                        <p class="descrip">
                           {{$val->description}}
                        </p>
                     </div>
                     <div class="lesson-rating-block2">
                        <span class="col-white"> <i class="fa fa-star col-purple"> </i>  5.0  </span>
                        <a href="javascript:void(0)" class="col-purple"> <i class="fa fa-heart col-purple"></i> </a>
                     </div>
                  </div>
               </div>
         @endforeach
      </div>

      {{@$coaches->links()}}
   </div>
</section> --}}

@endsection
