<header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
               <div class="navbar-header">
                  <a class="navbar-brand" href="{{URL::to('/')}}">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/zetta-logo.png">
                  </a>
               </div>
               <div class="navbar-collapse">
                  <ul class="navbar-nav mr-auto mt-md-0">
                     <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                     <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                  </ul>
                  <ul class="navbar-nav my-lg-0">
                    <!--  <a href="{{URL::to('/buddy')}}" class="custom-btn1"> SWITCH TO SPORTS BUDDY </a> -->
                     @if(Auth::check())
         <div class="header-login">
            <div class="dropdown">
               <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{Auth::user()->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';"> <i class="fa fa-caret-down"> </i>
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('buddy.my_account')}}"> Edit Profile </a>
                  <a class="dropdown-item" href="{{route('logout')}}"> Logout </a>
               </div>
            </div>
         </div>
      @else
         <div class="header-buttons">
            <a href="javascript:void(0)" class="open-join-buddy header-btn1" data-id="buddy"> Register </a>
            <a href="javascript:void(0)" class="open-join header-btn2"> Become a Coach </a>
            <a href="javascript:void(0)" class="open-login header-btn3"> Login </a>
         </div>
      @endif
                  </ul>
               </div>
            </nav>
         </header>