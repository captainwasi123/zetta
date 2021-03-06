@extends('coach.include.master')
@section('title', 'Friends')

@section('content')

<div class="box-wrapper1">
    <div class="block-element">
       <div class="row">
          <div class="col-md-9 col-lg-8 col-12 col-sm-12">
             <div class="block-element m-b-20">
                <div class="row">
                   <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                      <div class="sec-head1">
                         <h3> Recently Added Friends  </h3>
                      </div>
                   </div>
                   <div class="col-md-6 col-lg-6 col-sm-6 col-12 text-right mob-text-left">
                      <a href="" class="col-purple friend-btn1">  Go to Friend List  <i class="fa fa-arrow-right"> </i> </a>
                   </div>
                </div>
                <div class="row m-t-20 marg-less1">
                   <div class="col-md-3 col-lg-3 col-sm-6 col-12 pad-less1">
                      <div class="friends-box m-b-25">
                         <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/4.jpg">
                         <div>
                            <h5> John Doe </h5>
                            <h6> <span> <i class="fa fa-star  col-yellow"> </i> 5.0 </span> <span> USA </span> </h6>
                         </div>
                      </div>
                   </div>
                   <div class="col-md-3 col-lg-3 col-sm-6 col-12 pad-less1">
                      <div class="friends-box m-b-25">
                         <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/5.jpg">
                         <div>
                            <h5> John Doe </h5>
                            <h6> <span> <i class="fa fa-star  col-yellow"> </i> 5.0 </span> <span> USA </span> </h6>
                         </div>
                      </div>
                   </div>
                   <div class="col-md-3 col-lg-3 col-sm-6 col-12 pad-less1">
                      <div class="friends-box m-b-25">
                         <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/6.jpg">
                         <div>
                            <h5> John Doe </h5>
                            <h6> <span> <i class="fa fa-star  col-yellow"> </i> 5.0 </span> <span> USA </span> </h6>
                         </div>
                      </div>
                   </div>
                   <div class="col-md-3 col-lg-3 col-sm-6 col-12 pad-less1">
                      <div class="friends-box m-b-25">
                         <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/7.jpg">
                         <div>
                            <h5> John Doe </h5>
                            <h6> <span> <i class="fa fa-star  col-yellow"> </i> 5.0 </span> <span> USA </span> </h6>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="row m-t-20">
                   <div class="col-md-12 col-lg-12 col-lg-12">
                      <div class="box-type2">
                         <div class="sec-head1">
                            <h3>  Friends List  </h3>
                            <p> Connect With Them</p>
                         </div>
                         <div class="block-element">
                            <div class="table-responsive custom-table1">
                               <table  class="table table-hover contact-list" data-page-size="10">
                                  <tbody>
                                     <tr>
                                        <td class="table-image">
                                           <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/5.jpg" alt="user" width="40" class="img-circle" /> Equipment 1 <br/> @dom </a>
                                        </td>
                                        <td> <i class="fa fa-star col-yellow"> </i> 4.8 </td>
                                        <td> Country: USA </td>
                                        <td> Since: 2020 </td>
                                        <td>
                                           <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-ellipsis-v"> </i> </a>
                                           <div class="dropdown-menu animated flipInY">
                                              <a href="#" class="dropdown-item">  Remove Friend </a>
                                              <a href="#" class="dropdown-item">  Report </a>
                                              <div class="dropdown-divider"></div>
                                              <a href="#" class="dropdown-item">  Block </a>
                                           </div>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td class="table-image">
                                           <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/7.jpg" alt="user" width="40" class="img-circle" /> Equipment 1 <br/> @dom </a>
                                        </td>
                                        <td> <i class="fa fa-star col-yellow"> </i> 4.8 </td>
                                        <td> Country: USA </td>
                                        <td> Since: 2020 </td>
                                        <td>
                                           <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-ellipsis-v"> </i> </a>
                                           <div class="dropdown-menu animated flipInY">
                                              <a href="#" class="dropdown-item">  Remove Friend </a>
                                              <a href="#" class="dropdown-item">  Report </a>
                                              <div class="dropdown-divider"></div>
                                              <a href="#" class="dropdown-item">  Block </a>
                                           </div>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td class="table-image">
                                           <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/6.jpg" alt="user" width="40" class="img-circle" /> Equipment 1 <br/> @dom </a>
                                        </td>
                                        <td> <i class="fa fa-star col-yellow"> </i> 4.8 </td>
                                        <td> Country: USA </td>
                                        <td> Since: 2020 </td>
                                        <td>
                                           <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-ellipsis-v"> </i> </a>
                                           <div class="dropdown-menu animated flipInY">
                                              <a href="#" class="dropdown-item">  Remove Friend </a>
                                              <a href="#" class="dropdown-item">  Report </a>
                                              <div class="dropdown-divider"></div>
                                              <a href="#" class="dropdown-item">  Block </a>
                                           </div>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td class="table-image">
                                           <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/1.jpg" alt="user" width="40" class="img-circle" /> Equipment 1 <br/> @dom </a>
                                        </td>
                                        <td> <i class="fa fa-star col-yellow"> </i> 4.8 </td>
                                        <td> Country: USA </td>
                                        <td> Since: 2020 </td>
                                        <td>
                                           <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-ellipsis-v"> </i> </a>
                                           <div class="dropdown-menu animated flipInY">
                                              <a href="#" class="dropdown-item">  Remove Friend </a>
                                              <a href="#" class="dropdown-item">  Report </a>
                                              <div class="dropdown-divider"></div>
                                              <a href="#" class="dropdown-item">  Block </a>
                                           </div>
                                        </td>
                                     </tr>
                                  </tbody>
                               </table>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-3 col-lg-4 col-12 col-sm-12">
             <div class="chat-main-box inbox-aside inbox-aside2">
                <div class="chat-left-aside">
                   <div class="open-panel"><i class="ti-angle-right"></i></div>
                   <div class="chat-left-inner">
                      <div class="form-material find-form1">
                         <i class="fa fa-search"> </i> <input class="form-control p-20 find-friend-seach" type="text" placeholder="Find Friend">
                      </div>
                      <ul class="chatonline style-none show-search-friends">
                         <li>
                            <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/1.jpg" alt="user-img" class="img-circle"> <span> Minhaj <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b> </a>
                         </li>
                         <li>
                            <a href="javascript:void(0)" class="active"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/2.jpg" alt="user-img" class="img-circle"> <span> Maxella <small class="bg-green">Away</small></span> <b> Hello , How are you sir? </b> </a>
                         </li>
                         <li>
                            <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/3.jpg" alt="user-img" class="img-circle"> <span> Peter <small class="bg-danger">Busy</small></span> <b> Hello , How are you sir? </b> </a>
                         </li>
                         <li>
                            <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Jane Doe <small class="bg-danger">Offline</small></span> <b> Hello , How are you sir? </b> </a>
                         </li>
                         <li>
                            <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/5.jpg" alt="user-img" class="img-circle"> <span> Jonathon <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b> </a>
                         </li>
                         <li class="p-20"></li>
                      </ul>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
