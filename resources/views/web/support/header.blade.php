<header class="header-style2">
   <div class="container">
      
      <div class="navbar-custom">
            @if(Auth::check())
                @if(Auth::user()->type == '3' || Auth::user()->type == '1')
                     @if(empty(Auth::user()->premium))
                        <div class="menu-item">
                           <a href="javascript:void(0)" class="premium_account"> Premium Account </a>
                        </div>
                     @endif
                @endif
            @else
                <div class="menu-item">
                    <a href="javascript:void(0)" class="open-login"> Premium Account </a>
                </div>
            @endif
         @if(Auth::check())
            <div class="menu-item">
                <a href="{{URL::to('/inbox')}}"><span id="newMessInd" class="fa fa-circle"></span>&nbsp;Messages </a>
            </div>
            <div class="menu-item">
                <a href="{{URL::to('/saved')}}"> Saved </a>
            </div>
            <div class="menu-profile">
               <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <img src="{{URL::to('/')}}/public/profile_img/{{Auth::user()->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/user-placeholder.jpg';">
                     <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                     @if(Auth::user()->type == '1')
                        <li><a href="{{URL::to('/employer/profile')}}">Profile</a></li>  
                        <li><a href="{{URL::to('/employer/requests')}}">Requests History</a></li>                    
                     @elseif(Auth::user()->type == '2')
                        <li><a href="{{URL::to('/helper/profile')}}">Profile</a></li> 
                        <li><a href="{{URL::to('/helper/requests')}}">Requests History</a></li>                     
                     @elseif(Auth::user()->type == '3')
                        <li><a href="{{URL::to('/agency/profile')}}">Profile</a></li>
                        <li><a href="{{URL::to('/agency/requests')}}">Requests History</a></li> 
                     @endif
                     <li><a href="{{URL::to('/settings')}}">Account Settings</a></li>
                     <li role="separator" class="divider"></li>
                     <li><a href="{{URL::to('/logout')}}">Logout</a></li>
                  </ul>
               </div>
            </div>
         @else
            <div class="menu-item menu-join">
               <a href="javascript:void(0)" class="open-login"> Login </a>
            </div>
            <div class="menu-item menu-join">
               <a href="javascript:void(0)" class="open-join"> Join </a>
            </div>
         @endif
      </div>
   </div>
</header>