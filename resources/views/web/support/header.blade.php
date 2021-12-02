
<style type="text/css">

#navWrap {
    height:1000px;
}

.sticky {
    position: fixed;
    top:0;
}
@media only screen and (max-width: 767px) {
.logo {
    left: 65px;
}
header.header-2 .flag-1 img {
    width: 20px;
}
header.header-2 .logo a img {
    width: 110px;
    padding-top: 5px; 
}
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).scroll(function () {
    var y = $(this).scrollTop();
    var navWrap = $('#navWrap').offset().top;
    if (y > navWrap) {
        $('nav').addClass('sticky');
    } else {
        $('nav').removeClass('sticky');
    }
});
</script>


<header class="header-1 header-2 desktop">
   <div class="container-fluid">
      
      <div class="logo">
         <a href="{{URL::to('/')}}"> <img src="{{URL::to('/assets/website')}}/images/zetta-logo.png"> </a>
      </div>       
      <nav class="navbar navbar-expand-lg navbar-dark"> 
       <!--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
           
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('content.Coach')}} <i class="fas fa-chevron-down"></i></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item {{Auth::check() ? '' : 'open-join-buddy' }}" href="javascript:void(0)">{{ __('content.Become a Coach')}} </a>
                @if(Auth::check())
                    @if(Auth::user()->type == '2')
                        <a class="dropdown-item" href="{{route('coach.lesson.add')}}">{{ __('content.Create a Lesson')}}</a>
                    @else
                        <a class="dropdown-item" href="{{route('buddy.become_a_coach')}}">{{ __('content.Create a Lesson')}}</a>
                    @endif
                @else
                    <a class="dropdown-item open-login" href="javascript:void(0)">{{ __('content.Create a Lesson')}}</a>
                @endif
<!--                   anas -->
                <a class="dropdown-item" href="{{route('web.all','Lessons')}}">{{ __('content.Lessons')}}</a>
                <a class="dropdown-item" href="{{route('web.all','Coaches')}}">{{ __('content.Coaches')}}</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ __('content.Sports Buddy')}} <i class="fas fa-chevron-down"></i></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if(Auth::check())
                    <a class="dropdown-item" href="{{route('buddy.activity.add')}}">{{ __('content.Create a Activity')}}</a>
                @else
                    <a class="dropdown-item open-login" href="javascript:void(0)">{{ __('content.Create a Activity')}}</a>
                @endif
                <a class="dropdown-item" href="{{route('web.all','Activities')}}">{{ __('content.Activities')}}</a>
                <a class="dropdown-item" href="{{route('web.all','Sports Buddies')}}">{{ __('content.Sports Buddies')}}</a>
              </div>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="{{URL::to('about_us')}}">{{ __('content.About Us')}}</a>
            </li> -->
          </ul>
        </div>
      </nav>

      <!-- <div class="lang-option">
         <button class="flag-1"> <img src="{{URL::to('/assets/website')}}/images/flag-1.jpg"> </button>
         <button class="flag-1"> <img src="{{URL::to('/assets/website')}}/images/flag-2.jpg"> </button>
         <button class="flag-1"> <img src="{{URL::to('/assets/website')}}/images/flag-3.jpg"> </button>
      </div> -->
      <nav class="navbar navbar-expand-lg navbar-dark"> 
        <button class="navbar-toggler desktop" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
     </nav>


      @if(Auth::check())
         <div class="header-login">
            <div class="dropdown">
               <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{Auth::user()->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';"> <i class="fa fa-caret-down"> </i>
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('buddy.dashboard')}}"> {{ __('content.Dashboard')}} </a>
                  <a class="dropdown-item" href="{{route('logout')}}"> {{ __('content.Logout')}} </a>
               </div>
            </div>
         </div>
      @else
         <div class="header-button">
            <a href="javascript:void(0)" class="open-join-buddy header-btn1" data-id="buddy"> {{ __('content.Register')}} </a>
            <!-- <a href="javascript:void(0)" class="open-join header-btn2"> {{ __('content.Become a Coach')}}</a> -->
            <a href="javascript:void(0)" class="open-login header-btn3"> {{ __('content.Login')}} </a>
         </div>
      @endif
   </div>
</header>
<div class="bottomMenu">
<header class="header-1 desktop fixed-top" id="bottomMenu" >
   <div class="container ">
      <div class="logo">
         <a href="{{URL::to('/')}}"> <img src="{{URL::to('/assets/website')}}/images/zetta-logo.png"> </a>
      </div>
      <div class="search-handler">
         <img src="{{URL::to('/assets/website')}}/images/hamburger.png">
      </div>
      <div class="search-form">
         <form method="get" action="{{route('web.search')}}">
            <div class="label-field3">
               <i class="fa fa-search"> </i>
               <input type="text" placeholder="Choose a Sport" name="val" id="header_sports_val" value="{{isset($search_data['val']) ? $search_data['val'] : ''}}">
            </div>
            <div class="label-field3">
               <i class="fa fa-map-marker-alt"></i>
               <input type="text" placeholder="Address, City or neighborhood" name="add" id="add-input" value="{{isset($search_data['add']) ? $search_data['add'] : ''}}">
               <input type="hidden" name="country" id="add-country" value="{{isset($search_data['type']) ? $search_data['type'] : ''}}">
            </div>
            <div class="submit-field1">
               <button class="bg-purple col-white custom-btn1"> {{ __('content.Search')}} </button>
            </div>
         </form>
          <nav class="navbar navbar-expand-lg navbar-dark stickey-custom "> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
           
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Coach <i class="fas fa-chevron-down"></i></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item {{Auth::check() ? '' : 'open-join-buddy' }}" href="javascript:void(0)">Become a Coach </a>
                @if(Auth::check())
                    @if(Auth::user()->type == '2')
                        <a class="dropdown-item" href="{{route('coach.lesson.add')}}">{{ __('content.Create a Lesson')}}</a>
                    @else
                        <a class="dropdown-item" href="{{route('buddy.become_a_coach')}}">{{ __('content.Create a Lesson')}}</a>
                    @endif
                @else
                    <a class="dropdown-item open-login" href="javascript:void(0)">{{ __('content.Create a Lesson')}}</a>
                @endif

                <a class="dropdown-item" href="{{route('web.all','Lessons')}}">{{ __('content.Lessons')}}</a>
                <a class="dropdown-item" href="{{route('web.all','Coaches')}}">{{ __('content.Coaches')}}</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Sports Buddy <i class="fas fa-chevron-down"></i></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if(Auth::check())
                    <a class="dropdown-item" href="{{route('buddy.activity.add')}}">{{ __('content.Create a Activity')}}</a>
                @else
                    <a class="dropdown-item open-login" href="javascript:void(0)">{{ __('content.Create a Activity')}}</a>
                @endif
                <a class="dropdown-item" href="{{route('web.all','Activities')}}">{{ __('content.Activitie')}}s</a>
                <a class="dropdown-item" href="{{route('web.all','Sports Buddies')}}">{{ __('content.Sports Buddies')}}</a>
              </div>
            </li>
          <!--   <li class="nav-item">
              <a class="nav-link" href="{{URL::to('about_us')}}">{{ __('content.About Us')}}</a>
            </li> -->
          </ul>
        </div>
      </nav>
      </div>
      <nav class="navbar navbar-expand-lg navbar-dark stickey-custom "> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
           
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Coach <i class="fas fa-chevron-down"></i></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item {{Auth::check() ? '' : 'open-join-buddy' }}" href="javascript:void(0)">{{ __('content.Become a Coach')}} </a>
                @if(Auth::check())
                    @if(Auth::user()->type == '2')
                        <a class="dropdown-item" href="{{route('coach.lesson.add')}}">{{ __('content.Create a Lesson')}}</a>
                    @else
                        <a class="dropdown-item" href="{{route('buddy.become_a_coach')}}">{{ __('content.Create a Lesson')}}</a>
                    @endif
                @else
                    <a class="dropdown-item open-login" href="javascript:void(0)">{{ __('content.Create a Lesson')}}</a>
                @endif

                <a class="dropdown-item" href="{{route('web.all','Lessons')}}">{{ __('content.Lessons')}}</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Sports Buddy <i class="fas fa-chevron-down"></i></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if(Auth::check())
                    <a class="dropdown-item" href="{{route('buddy.activity.add')}}">{{ __('content.Create a Activity')}}</a>
                @else
                    <a class="dropdown-item open-login" href="javascript:void(0)">{{ __('content.Create a Activity')}}</a>
                @endif
                <a class="dropdown-item" href="{{route('web.all','Activities')}}">{{ __('content.Activities')}}</a>
              </div>
            </li>
          <!--   <li class="nav-item">
              <a class="nav-link" href="{{URL::to('about_us')}}">{{ __('content.About Us')}}</a>
            </li> -->
          </ul>
        </div>
      </nav>
      <!-- <div class="lang-option">
         <button class="flag-1"> <img src="{{URL::to('/assets/website')}}/images/flag-1.jpg"> </button>
         <button class="flag-1"> <img src="{{URL::to('/assets/website')}}/images/flag-2.jpg"> </button>
         <button class="flag-1"> <img src="{{URL::to('/assets/website')}}/images/flag-3.jpg"> </button>
      </div> -->
      @if(Auth::check())
         <div class="header-login">
            <div class="dropdown">
               <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{Auth::user()->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';"> <i class="fa fa-caret-down"> </i>
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('buddy.dashboard')}}"> {{ __('content.Dashboard')}} </a>
                  <a class="dropdown-item" href="{{route('logout')}}"> {{ __('content.Logout')}} </a>
               </div>
            </div>
         </div>
      @else
         <div class="header-buttons ">
            <a href="javascript:void(0)" class="open-join header-btn1"> {{ __('content.Register')}} </a>
            <!-- <a href="javascript:void(0)" class="open-join-coach header-btn2"> {{ __('content.Become a Coach')}} </a> -->
            <a href="javascript:void(0)" class="open-login header-btn3"> {{ __('content.Login')}} </a>
         </div>
      @endif
   </div>
</header>
</div>
<header class="header-1 header-2 mobile">
   <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark "> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
           
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Coach <i class="fas fa-chevron-down"></i></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                
               <a class="dropdown-item {{Auth::check() ? '' : 'open-join-buddy' }}" href="javascript:void(0)">{{ __('content.Become a Coach')}} </a>
               <!-- <a class="dropdown-item" href="javascript:void(0)">{{ __('content.Become a Coach')}} </a> -->

               
                <a class="dropdown-item" href="{{route('web.all','Lessons')}}">{{ __('content.Online Lessons')}}</a>
                <a class="dropdown-item" href="#">{{ __('content.Group Lessons')}}</a>
                <a class="dropdown-item" href="#">{{ __('content.Private Lesson')}}</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ __('content.Sports Buddy')}} <i class="fas fa-chevron-down"></i></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">{{ __('content.Online Activitie')}}s</a>
                <a class="dropdown-item" href="#">{{ __('content.Group Activities')}}</a>
                <a class="dropdown-item" href="#">{{ __('content.Private Activities')}}</a>
                <a class="dropdown-item" href="#">{{ __('content.Girl Activities')}}</a>
              </div>
            </li>
           <!--  <li class="nav-item">
              <a class="nav-link" href="{{URL::to('about_us')}}">{{ __('content.About Us')}}</a>
            </li> -->
          </ul>
        </div>
      </nav>

      <div class="logo">
         <a href="{{URL::to('/')}}"> <img src="{{URL::to('/assets/website')}}/images/zetta-logo.png"> </a>
      </div>       

      <!-- <div class="lang-option">
         <button class="flag-1"> <img src="{{URL::to('/assets/website')}}/images/flag-1.jpg"> </button>
         <button class="flag-1"> <img src="{{URL::to('/assets/website')}}/images/flag-2.jpg"> </button>
         <button class="flag-1"> <img src="{{URL::to('/assets/website')}}/images/flag-3.jpg"> </button>
      </div> -->
      <nav class="navbar navbar-expand-lg navbar-dark "> 
        <button class="navbar-toggler desktop" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
     </nav>

      @if(Auth::check())
      
         <div class="header-login">
            <div class="dropdown">
               <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{Auth::user()->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';"> <i class="fa fa-caret-down"> </i>
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('buddy.dashboard')}}"> {{ __('content.Dashboard')}} </a>
                  <a class="dropdown-item" href="{{route('logout')}}"> {{ __('content.Logout')}} </a>
               </div>
            </div>
         </div>
      @else
         <div class="header-buttons">
            <a href="javascript:void(0)" class="open-join-buddy header-btn1" data-id="buddy"> Register </a>
            <!-- <a href="javascript:void(0)" class="open-join header-btn2"> {{ __('content.Become a Coach')}} </a> -->
            <a href="javascript:void(0)" class="open-login header-btn3"> {{ __('content.Login')}} </a>
         </div>
      @endif
   </div>
</header>