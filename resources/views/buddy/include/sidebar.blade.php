<aside class="left-sidebar">
   <div class="scroll-sidebar">
      <div class="user-profile-header">
         <h4> Hi, Sports Buddy </h4>
         <h6> agalyam01@gmail.com </h6>
         <p> <a href=""> <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/coin-icon.png"> </a> <span> Z COINS <b> 250 </b> </span> <a href=""> <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/heart-icon.png"> </a>  </p>
      </div>
      <div class="user-profile">
         <div class="profile-img"> <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{Auth::user()->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';"/>
         </div>
         <div class="account-btn1 text-center">
            <a href="{{route('buddy.my_account')}}" class="custom-btn2"> My Account </a>
         </div>
         <div class="profile-text">
            <a href="" class="" > INBOX <i class="mdi mdi-email"> <b class="notif-icon1"> 5  </b> </i>  </a>
         </div>
      </div>
      <nav class="sidebar-nav">
         <ul id="sidebarnav">
            <li>
               <a href="{{route('buddy.dashboard')}}">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/nav-icon1.png">
                  <span class="hide-menu">  Agenda </span>
               </a>
            </li>
            <li>
               <a href="{{route('buddy.category')}}">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/nav-icon2.png">
                  <span class="hide-menu">   Sports Category </span>
               </a> </li>
            <li>
               <a href="{{route('buddy.activity')}}">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/nav-icon3.png">
                  <span class="hide-menu">   Activity  </span>
               </a>
            </li>
            <li>
               <a href="{{route('buddy.equipment')}}">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/nav-icon4.png">
                  <span class="hide-menu">  Equipment </span>
               </a>
            </li>
            <li>
               <a href="{{route('buddy.friends')}}">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/friend-icon.png">
                  <span class="hide-menu">   Friends  </span>
               </a>
            </li>
            <li>
               <a href="{{route('buddy.analytics_and_redeem')}}">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/nav-icon9.png">
                  <span class="hide-menu">  Analytics &amp; Redeem  </span>
               </a>
            </li>
            <li>
               <a href="{{route('buddy.order')}}">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/nav-icon6.png">
                  <span class="hide-menu">  Orders  </span>
               </a>
            </li>
            <li>
               <a href="{{route('buddy.my_account')}}">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/nav-icon7.png">
                  <span class="hide-menu">   My Account Area </span>
               </a>
            </li>
            <li>
               <a href="{{route('buddy.my_wallet')}}">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/nav-icon8.png">
                  <span class="hide-menu">   Wallet </span>
               </a>
            </li>
         </ul>
      </nav>
   </div>
</aside>
