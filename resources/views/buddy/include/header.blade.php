<header class="topbar">
   <nav class="navbar top-navbar navbar-expand-md navbar-light">
      <div class="navbar-header">
         <a class="navbar-brand" href="{{URL::to('/')}}">
         <img src="{{URL::to('/')}}/assets/website/images/zetta-logo.png">
         </a>
          <ul class="navbar-nav mr-auto mt-md-0" style="float: right; padding-top: 10px;">
                        <div class="desktop">
                     <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                     <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </div>
               
                  </ul>
                
      </div>
      <div class="navbar-collapse">
         <ul class="navbar-nav mr-auto mt-md-0">
            <div class="mobile">
              <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
              <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            </div>
             <div class="search-form desktop-v">
                  <form method="get" class="searchForm" action="{{route('web.search')}}">
                     <div class="label-field3">
                        <i class="fa fa-search"> </i>
                        <input type="text" placeholder="Choose a Sport" name="val" id="keywords_val" value="{{isset($search_data['val']) ? $search_data['val'] : ''}}">
                     </div>
                     <div class="label-field3">
                        <i class="fa fa-map-marker-alt"></i>
                        <input type="text" placeholder="Address, City or neighborhood" name="add" id="add-input" value="{{isset($search_data['add']) ? $search_data['add'] : ''}}">
                        <input type="hidden" name="country" id="add-country" value="{{isset($search_data['type']) ? $search_data['type'] : ''}}">
                     </div>
                     <div class="submit-field1">
                        <button class="bg-purple col-white custom-btn1"> Search </button>
                     </div>
                  </form>
              </div>
              <nav class="navbar navbar-expand-lg navbar-dark desktop"> 
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>

                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                 <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Coach <i class="fas fa-chevron-down"></i></a>
                                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                       
                                        @if(Auth::user()->type == '2')
                                            <a class="dropdown-item" href="{{route('coach.lesson.add')}}">Create a Lesson</a>
                                        @else
                                            <a class="dropdown-item" href="{{route('buddy.become_a_coach')}}">Become a Coach </a>
                                            <a class="dropdown-item" href="{{route('buddy.become_a_coach')}}">Create a Lesson</a>
                                        @endif

                                        <a class="dropdown-item" href="{{route('web.all','Lessons')}}">Lessons</a>
                                        <a class="dropdown-item" href="{{route('web.all','Coaches')}}">Coaches</a>
                                      </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Sports Buddies <i class="fas fa-chevron-down"></i></a>
                                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('buddy.activity.add')}}">Create an Activity</a>
                                        <a class="dropdown-item" href="{{route('web.all','Activities')}}">Activities</a>
                                        <a class="dropdown-item" href="{{route('web.all','Sports Buddies')}}">Sports Buddies</a>
                                      </div>
                                    </li>
                              <!-- <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('about_us')}}">About Us</a>
                              </li> -->
                            </ul>
                          </div>
                     </nav>
         </ul>
         <style type="text/css">
     
         </style>
         <ul class="navbar-nav my-lg-0">
            <div class="profile-text">
               <a href="{{route('buddy.messages')}}" class="noti-mob"> 
                  <i class="mdi mdi-email " id="mnotiBadge" style="font-size: 2rem;padding-right: 11px;color: #fff;">  </i>
               </a>

               <a href="{{route('buddy.friends')}}" class="" > 
                  <i class="fa fa-bell" id="fnotiBadge" style="font-size: 2rem;padding-right: 11px;color: #fff;"></i> 
               </a>
            </div>

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
                  <!-- <a href="javascript:void(0)" class="open-join header-btn2"> Become a Coach </a> -->
                  <a href="javascript:void(0)" class="open-login header-btn3"> Login </a>
               </div>
            @endif
         </ul>
      </div>
   </nav>
</header>

