<header class="header-1">
   <div class="container">
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
               <input type="text" placeholder="Choose a Sport" name="val" value="{{isset($search_data['val']) ? $search_data['val'] : ''}}" required>
            </div>
            <div class="label-field3">
               <i class="fa fa-map-marker-alt"></i>
               <input type="text" placeholder="Address, City or neighborhood" name="add" id="add-input" value="{{isset($search_data['add']) ? $search_data['add'] : ''}}" required>
               <input type="hidden" name="country" id="add-country" value="{{isset($search_data['type']) ? $search_data['type'] : ''}}">
            </div>
            <div class="submit-field1">
               <button class="bg-purple col-white custom-btn1"> Search </button>
            </div>
         </form>
      </div>
      @if(Auth::check())
         <div class="header-login">
            <div class="dropdown">
               <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{Auth::user()->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';"> <i class="fa fa-caret-down"> </i>
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('buddy.dashboard')}}"> Dashboard </a>
                  <a class="dropdown-item" href="{{route('logout')}}"> Logout </a>
               </div>
            </div>
         </div>
      @else
         <div class="header-buttons">
            <a href="javascript:void(0)" class="open-join header-btn1"> Register </a>
            <a href="javascript:void(0)" class="open-join-coach header-btn2"> Become a Coach </a>
            <a href="javascript:void(0)" class="open-login header-btn3"> Login </a>
         </div>
      @endif
   </div>
</header>
