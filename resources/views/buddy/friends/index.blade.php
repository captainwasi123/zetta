@extends('buddy.include.master')
@section('title', 'Recently Added Friends')
@section('content')

<style type="text/css">
  .inbox-aside {
    max-width: 110%;
    width: 110%;
    max-height: 750px !important;
  }

@media only screen and (max-width: 767px) {
  .inbox-aside {
    max-width: 100%;
    width: 100%;
    max-height: 500px !important;
}
}

</style>
<div class="box-wrapper1">
    <div class="block-element">
       <div class="row">
          <div class="col-md-9 col-lg-8 col-12 col-sm-12">
             <div class="block-element heading-underline1">
                <div class="row ">
                   <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                      <div class="sec-head1">
                         <h3> Recently Added Friends  </h3>
                      </div>
                   </div>
                   <div class="col-md-6 col-lg-6 col-sm-6 col-12 text-right mob-text-left">
                     
                   </div>
                </div>
             </div>
             <div class="block-element m-b-20">
                <div class="row m-t-20 marg-less1">
                  @foreach($recent as $val)
                     @if($val->user_id == Auth::id())
                      <div class="col-md-3 col-lg-3 col-sm-6 col-12 pad-less1">
                        <a href="{{route('web.buddy.details', base64_encode($val->friend->id))}}" target="_blank">
                            <div class="friends-box m-b-25">
                               <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->friend->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                               <div>
                                  <h5> {{$val->friend->fname.' '.$val->friend->lname}} </h5>
                                  <h6> <span> <i class="fa fa-star  col-yellow"> </i> 5.0 </span> <span> {{@$val->friend->country->nicename}} </span> </h6>
                               </div>
                            </div>
                        </a>
                      </div>
                     @else
                      <div class="col-md-3 col-lg-3 col-sm-6 col-12 pad-less1">
                        <a href="{{route('web.buddy.details', base64_encode($val->user->id))}}" target="_blank">
                            <div class="friends-box m-b-25">
                               <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->user->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                               <div>
                                  <h5> {{$val->user->fname.' '.$val->user->lname}} </h5>
                                  <h6> <span> <i class="fa fa-star  col-yellow"> </i> 5.0 </span> <span> {{@$val->user->country->nicename}} </span> </h6>
                               </div>
                            </div>
                        </a>
                      </div>
                     @endif
                  @endforeach
                </div>
                <div class="row m-t-20">
                   <div class="col-md-12 col-lg-12 col-lg-12">
                      <div class="box-type4">
                         <div class="box-type2" style="box-shadow: none !important">
                            <div class="sec-head1">
                               <h3 class="m-b-0">  Friends Requests  </h3>
                            </div>
                         </div>
                         <div>
                            <div class="block-element">
                               <div class="table-responsive custom-table1">
                                  <table class="table table-hover contact-list friends-table" data-page-size="10">
                                     <tbody>
                                       @foreach($requests as $val)
                                           <tr>
                                              <td class="table-image">
                                                 <a href="{{route('web.buddy.details', base64_encode(@$val->user->id))}}"><img src="{{URL::to('/')}}/public/storage/user/profile_img/{{@$val->user->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" alt="user" width="40" class="img-circle"> {{$val->user->fname.' '.$val->user->lname}} <br> {{'@'.$val->user->username}} </a>
                                              </td>
                                              <td> <i class="fa fa-star col-yellow"> </i> 4.8 </td>
                                              <td> Country: {{@$val->user->country->nicename}} </td>
                                              <td> Since: {{date('Y', strtotime(@$val->user->created_at))}} </td>
                                              <td class="">
                                                 <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"> </i> </a>
                                                 <div class="dropdown-menu animated flipInY" style="">
                                                    <a href="javascript:void(0)" data-id="{{base64_encode($val->id)}}" class="dropdown-item approveFriendRequest"> Accept Request </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:void(0)" data-id="{{base64_encode($val->id)}}" class="dropdown-item rejectFriendRequest" style="color:red !important;"> Reject Request </a>
                                                 </div>
                                              </td>
                                           </tr>
                                       @endforeach
                                       @if(count($requests) == '0')
                                          <tr>
                                             <td>No Requests Available.</td>
                                          </tr>
                                       @endif
                                     </tbody>
                                  </table>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="row m-t-20">
                   <div class="col-md-12 col-lg-12 col-lg-12">
                      <div class="box-type4">
                         <div class="box-type2" style="box-shadow: none !important">
                            <div class="sec-head1">
                               <h3 class="m-b-0">  Friends List  </h3>
                               <p class="col-white"> Connect With Them</p>
                            </div>
                         </div>
                         <div>
                            <div class="block-element">
                               <div class="table-responsive custom-table1">
                                  <table class="table table-hover contact-list friends-table" data-page-size="10">
                                     <tbody>
                                       @foreach($friends as $val)
                                          @if($val->user_id == Auth::id())
                                           <tr>
                                              <td class="table-image">
                                                 <a href="{{route('web.buddy.details', base64_encode(@$val->friend->id))}}" target="_blank"><img src="{{URL::to('/')}}/public/storage/user/profile_img/{{@$val->friend->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" alt="user" width="40" class="img-circle"> {{@$val->friend->fname.' '.@$val->friend->lname}} <br> {{'@'.$val->friend->username}} </a>
                                              </td>
                                              <td> <i class="fa fa-star col-yellow"> </i> 4.8 </td>
                                              <td> Country: {{@$val->friend->country->nicename}} </td>
                                              <td> Since: {{date('Y', strtotime(@$val->friend->created_at))}} </td>
                                              <td class="">
                                                 <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"> </i> </a>
                                                 <div class="dropdown-menu animated flipInY" style="">
                                                    <a href="{{URL::to('/buddy/inbox/chat/'.base64_encode($val->friend->id))}}/{{empty(@$val->friend->fname) ? 'New User' : @$val->friend->fname.' '.@$val->friend->lname}}" class="dropdown-item"> Send Message </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:void(0)" data-id="{{base64_encode($val->id)}}" class="dropdown-item removeFriend"> Remove Friend </a>
                                                 </div>
                                              </td>
                                           </tr>
                                          @else
                                           <tr>
                                              <td class="table-image">
                                                 <a href="{{route('web.buddy.details', base64_encode(@$val->user->id))}}" target="_blank"><img src="{{URL::to('/')}}/public/storage/user/profile_img/{{@$val->user->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" alt="user" width="40" class="img-circle"> {{@$val->user->fname.' '.@$val->user->lname}} <br> {{'@'.$val->user->username}} </a>
                                              </td>
                                              <td> <i class="fa fa-star col-yellow"> </i> 4.8 </td>
                                              <td> Country: {{@$val->user->country->nicename}} </td>
                                              <td> Since: {{date('Y', strtotime(@$val->user->created_at))}} </td>
                                              <td class="">
                                                 <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"> </i> </a>
                                                 <div class="dropdown-menu animated flipInY" style="">
                                                    <a href="{{URL::to('/buddy/inbox/chat/'.base64_encode(@$val->user->id))}}/{{empty(@$val->user->fname) ? 'New User' : @$val->user->fname.' '.@$val->user->lname}}" class="dropdown-item"> Send Message </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:void(0)" data-id="{{base64_encode($val->id)}}" class="dropdown-item removeFriend"> Remove Friend </a>
                                                 </div>
                                              </td>
                                           </tr>
                                          @endif
                                       @endforeach
                                       @if(count($friends) == '0')
                                          <tr>
                                             <td>No Friends Available.</td>
                                          </tr>
                                       @endif
                                     </tbody>
                                  </table>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-3 col-lg-4 col-12 col-sm-12">
             <div class="chat-main-box inbox-aside inbox-aside2 custom-scroll1">
                <div class="chat-left-aside">
                   <div class="open-panel"><i class="ti-angle-right"></i></div>
                   <div class="chat-left-inner">
                      <div class="form-material find-form1">
                           <i class="fa fa-search"> </i> 
                           <input class="form-control p-20 col-white" type="text" placeholder="Find Friend" id="userSearch">
                      </div>
                      <ul class="chatonline style-none" id="userSearchResult">
                         
                      </ul>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

 @endsection
 @section('addScript')

   <script src="{{URL::to('/')}}/assets/user_dashboard/buddy/js/friend.js"></script>
 @endsection
