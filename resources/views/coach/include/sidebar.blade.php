<aside class="left-sidebar desktop">

            <div class="scroll-sidebar">

               <div class="user-profile-header">
                  <h4> Hi, {{(Auth::user()->fname)}} </h4>
                  <h6> {{Auth::user()->email}} </h6>
                  <p> <a href="{{route('buddy.analytics_and_redeem')}}"> <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/coin-icon.png"> </a> <span> Z COINS <b> {{empty(Auth::user()->wallet->coin) ? 0 : Auth::user()->wallet->coin}} </b> </span> <a href="{{route('buddy.favouriteCoach')}}"> <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/heart-icon.png"> </a>  </p>
               </div>
               <div class="user-profile">
                  <div class="profile-img">
                     <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{Auth::user()->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/user-placeholder.jpg';"/>
                  </div>
                  <div class="account-btn1 text-center">
                     <a href="{{route('coach.my_account')}}" class="custom-btn2"> My Account </a>
                  </div>
                  <div class="account-btn1 text-center">
                     <a href="{{URL::to('/buddy')}}" class="custom-btn1"> SWITCH TO SPORTS BUDDY </a>
                  </div>
               </div>
              <nav class="sidebar-nav">
                  <ul id="sidebarnav">
                     <li>
                        <a href="{{route('coach.dashboard')}}" >
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon1.png">
                           <span class="hide-menu">&nbsp;&nbsp;Dashboard </span>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('coach.sports')}}" >
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon2.png">
                           <span class="hide-menu">&nbsp;Sports </span>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('coach.lesson')}}" >
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon3.png">
                           <span class="hide-menu">   Lesson </span>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('coach.equipment')}}" >
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon4.png">
                           <span class="hide-menu">  &nbsp;Equipment </span>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('coach.availability')}}" >
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon5.png">
                           <span class="hide-menu">   &nbsp;Availability Slots </span>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('coach.orders')}}" >
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon6.png">
                           <span class="hide-menu">  &nbsp;Orders  </span>
                        </a>
                     </li>
                     <li> 
                        <a href="{{route('coach.my_account_area')}}"> 
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon7.png"> 
                           <span class="hide-menu">   &nbsp;Coach Analatics </span>  
                        </a> 
                     </li>
                     <li>
                        <a href="{{route('coach.my_wallet')}}" >
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon8.png">
                           <span class="hide-menu">   &nbsp;Wallet </span>
                        </a>
                     </li>
                  </ul>
               </nav>
            </div>
         </aside>
<style type="text/css">

</style>
         <aside class="left-sidebar mobile">

            <div class="scroll-sidebar">

               <div class="user-profile-header">
                  <div class="profile-img">
                     <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{Auth::user()->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/user-placeholder.jpg';"/>

                  </div>
                  <h4> Hi, Coach Syed Anas </h4>

                  <p> <a href=""> <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/coin-icon.png"> </a> <span> Z COINS <b> 250 </b> </span> <a  href="{{route('coach.favouriteCoach')}}"> <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/heart-icon.png"> </a>  </p>

               </div>
           <!--     <h4 class="profile-name"> Hi, Coach  </h4> -->
               <div class="user-profile">
                  <!-- <div class="profile-img">
                     <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{Auth::user()->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/user-placeholder.jpg';"/>
                  </div> -->
                  <div class="account-btn1 text-center">
                     <a href="{{route('coach.my_account')}}" class="custom-btn2"> My Account </a>
                  </div>
                  <!-- <div class="profile-text">
                     <a href="{{route('coach.messages')}}" class="" > INBOX <i class="mdi mdi-email"> <b class="notif-icon1"> 5  </b> </i>  </a>
                  </div> -->
                  <div class="account-btn1 text-center">
                     <a href="{{URL::to('/buddy')}}" class="custom-btn1"> SWITCH TO SPORTS BUDDY </a>
                  </div>
<!-- 
                  <div class="profile-text">
                     <a href="{{route('coach.messages')}}" class="" > INBOX <i class="mdi mdi-email"> <b class="notif-icon1"> 5  </b> </i>  </a>
                  </div> -->
               </div>
              <nav class="sidebar-nav">
                  <ul id="sidebarnav">
                     <li>
                        <a href="{{route('coach.dashboard')}}" >
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon1.png">
                           <span class="hide-menu">  Dashboard </span>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('coach.sports')}}" >
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon2.png">
                           <span class="hide-menu">   Sports</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('coach.lesson')}}" >
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon3.png">
                           <span class="hide-menu">   Lesson </span>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('coach.equipment')}}" >
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon4.png">
                           <span class="hide-menu">  Equipment </span>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('coach.availability')}}" >
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon5.png">
                           <span class="hide-menu">   Availability Slots </span>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('coach.orders')}}" >
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon6.png">
                           <span class="hide-menu">  Orders  </span>
                        </a>
                     </li>
                     <li> 
                        <a href="{{route('coach.my_account_area')}}"> 
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon7.png"> 
                           <span class="hide-menu">   My Account Area </span>  
                        </a> 
                     </li>
                     <li>
                        <a href="{{route('coach.my_wallet')}}" >
                           <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/nav-icon8.png">
                           <span class="hide-menu">   Wallet </span>
                        </a>
                     </li>
                  </ul>
               </nav>
            </div>
         </aside>
