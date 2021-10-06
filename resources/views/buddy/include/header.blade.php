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
                  <form method="get" action="{{route('web.search')}}">
                     <div class="label-field3">
                        <i class="fa fa-search"> </i>
                        <input type="text" placeholder="Choose a Sport" name="val" id="keywords_val" value="{{isset($search_data['val']) ? $search_data['val'] : ''}}" required>
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
              <nav class="navbar navbar-expand-lg navbar-dark desktop"> 
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>

                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Coach <i class="fa fa-chevron-down"></i></a>
                                    <div class="dropdown-menu syed" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="javascript:void(0)">Become a Coach </a>
                                         <a class="dropdown-item" href="#">Create a Lesson</a>
                                         <a class="dropdown-item" href="#">Lessons</a>
                                    </div>
                                  </li>
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Sports Buddy <i class="fa fa-chevron-down"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                         <a class="dropdown-item" href="#">Create a Activity</a>
                                         <a class="dropdown-item" href="#">Activities</a>
                                    </div>
                                  </li>
                              <!-- <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('about_us')}}">About Us</a>
                              </li> -->
                            </ul>
                          </div>
                     </nav>
         </ul>
         <ul class="navbar-nav my-lg-0">
          <div class="profile-text">
                     <a href="{{route('coach.messages')}}" class="" > <i class="mdi mdi-email"> <b class="notif-icon1"> 5  </b> </i>  </a>
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


<div id="coach-request-model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
          <form method="post" action="{{route('buddy.coach.request')}}">
            @csrf
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Want to become a Coach and a member of the Zettaa Team?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                       <label>1. Have you ever coached?</label>
                       <br>
                       <input class="form-check-input" type="radio" name="answer1" id="flexRadioDefault1" value="Yes">
                       <label class="form-check-label" for="flexRadioDefault1">
                           Yes
                       </label>
                       &nbsp;&nbsp;&nbsp;
                       <input class="form-check-input" type="radio" name="answer1" id="flexRadioDefault2" value="No" checked>
                       <label class="form-check-label" for="flexRadioDefault2">
                           No
                       </label>
                       <br><br>
                       <textarea name="answer1Detail" class="form-control" placeholder="If Yes or not please explain." cols="5" required></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                       <label>2. What motivated you to become a coach? Is this your main activity? </label>
                       <br>
                       <input class="form-check-input" type="radio" name="answer2" id="flexRadioDefault3" value="Yes">
                       <label class="form-check-label" for="flexRadioDefault3">
                           Yes
                       </label>
                       &nbsp;&nbsp;&nbsp;
                       <input class="form-check-input" type="radio" name="answer2" id="flexRadioDefault4" value="No" checked>
                       <label class="form-check-label" for="flexRadioDefault4">
                           No
                       </label>
                       <br><br>
                       <textarea name="answer2Detail" class="form-control" placeholder="If not, what is your main occupation?" cols="5" required></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                       <label>3. Do you have a qualification or diploma in a sport-related discipline? (Ex. Nutrition; physiotherapy; sports coaching etc.) </label>
                       <br>
                       <textarea name="answer3Detail" class="form-control" placeholder="" cols="5" required></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                       <label>4. Have you practiced a sport for many years or even at high level?  </label>
                       <br>
                       <input class="form-check-input" type="radio" name="answer4" id="flexRadioDefault5" value="Yes">
                       <label class="form-check-label" for="flexRadioDefault3">
                           Yes
                       </label>
                       &nbsp;&nbsp;&nbsp;
                       <input class="form-check-input" type="radio" name="answer4" id="flexRadioDefault6" value="No" checked>
                       <label class="form-check-label" for="flexRadioDefault4">
                           No
                       </label>
                       <br><br>
                       <textarea name="answer4Detail" class="form-control" placeholder="If so, how many years? At what level? Which sport?" cols="5" required></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                       <label>5. As a coach, what are the qualities that make you an exceptional instructor? </label>
                       <br>
                       <textarea name="answer5Detail" class="form-control" placeholder="" cols="5" required></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                       <label>6. As an athlete, what do you think are the fundamental values for progress?</label>
                       <br>
                       <textarea name="answer6Detail" class="form-control" placeholder="" cols="5" required></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                       <label>7. Bonus : Share with us your worst/best memory during a training or a competition.</label>
                       <br>
                       <textarea name="answer7Detail" class="form-control" placeholder="" cols="5" required></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                       <label>By checking this box, you declare that you have read and understood the Coach Label Zettaa document and agree to refer to it when you are in contact with your Zettaa customers.</label>
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
 <style type="text/css">
  .profile-text a i::before {
    font-size: 28px;
    padding-top: 15px;
    color: white;
    padding-right: 10px;
}
</style>
