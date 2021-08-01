<header class="header-1 header-2">
   <div class="container-fluid">
      <div class="logo">
         <a href="{{URL::to('/')}}"> <img src="{{URL::to('/assets/website')}}/images/zetta-logo.png"> </a>
      </div>
      <div class="lang-option">
         <button class="flag-1"> <img src="{{URL::to('/assets/website')}}/images/flag-1.jpg"> </button>
         <button class="flag-1"> <img src="{{URL::to('/assets/website')}}/images/flag-2.jpg"> </button>
         <button class="flag-1"> <img src="{{URL::to('/assets/website')}}/images/flag-3.jpg"> </button>
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
            <a href="javascript:void(0)" class="open-join header-btn1"> Register </a>
            <a href="" class="header-btn2"> Become a Coach </a>
            <a href="javascript:void(0)" class="open-login header-btn3"> Login </a>
         </div>
      @endif
   </div>
</header>
