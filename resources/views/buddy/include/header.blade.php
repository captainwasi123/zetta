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
                <!--   <form method="get" action="{{route('web.search')}}">
                      <div class="label-field3">
                          <i class="fa fa-search"> </i>
                          <input type="text" placeholder="Search" name="val" value="{{isset($search_data['val']) ? $search_data['val'] : ''}}" required>
                      </div>
                      <div class="label-field3">
                          <i class="fa fa-filter"> </i>
                            <select name="type">
                              <option @if(isset($search_data['type'])) @if($search_data['type'] == 'Keywords') selected @endif @endif>Keywords</option>
                              <option @if(isset($search_data['type'])) @if($search_data['type'] == 'Places') selected @endif @endif>Places</option>
                              </select>
                      </div>
                      <div class="submit-field1">
                          <button class="bg-purple col-white custom-btn1"> Search </button>
                      </div>
                  </form> -->
                  <form method="get" action="{{route('web.search')}}">
                  <div class="label-field3">
                     <i class="fa fa-search"> </i>
                     <input type="text" placeholder="Choose a Sport" name="search" required>
                  </div>
                  <div class="label-field3">
                     <i class="fa fa-map-marker"></i>
                     <input type="text" placeholder="Address, City or neighborhood" name="city" required>
                  </div>
                  <div class="submit-field1">
                     <button class="bg-purple col-white custom-btn1"> Search </button>
                  </div>
               </form>
              </div>
         </ul>
         <ul class="navbar-nav my-lg-0">
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


<div id="coach-request-model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
          <form method="post" action="{{route('buddy.coach.request')}}">
            @csrf
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Request For Coach</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                   <div class="col-md-12">
                      <label>Full Name</label>
                      <input type="text" name="fname" value="{{auth()->user()->fname . ' ' . auth()->user()->lname}}" class="form-control" readonly required>
                   </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                       <label>Username</label>
                       <input type="text" name="username" class="form-control" value="{{auth()->user()->username}}" readonly required>
                    </div>
                 </div>
                 <br>
                <div class="row">
                    <div class="col-md-12">
                       <label>Email</label>
                       <input type="text" name="email" value="{{auth()->user()->email}}" class="form-control" readonly required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                       <label>Question</label>
                       <textarea name="answer" class="form-control" placeholder="Why you want to become a coach ?" cols="5" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect">Add Request</button>
            </div>
          </form>
       </div>
       <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
 </div>
