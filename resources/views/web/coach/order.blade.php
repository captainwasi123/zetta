@extends('web.coach.include.master')
@section('title', 'Registration Form')

@section('content')
<div class="box-wrapper1">
                  <div class="block-element">
                     <div class="row">
                        <div class="col-md-9 col-lg-8 col-12 col-sm-12">
                           <div class="block-element m-b-20">
                             <div class="order-detail-box text-left m-b-30 pl-4">

                                 <div class="row">

                                 <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                 <div class="order-name1">
                                 <h4> Order #FO71025F2BF81 </h4>
                                 <p class="m-b-0"> <span> Buyer:joshuacestlaivie </span> <a href="" class="col-green"> view history </a> <span> April 10,2021 </span> </p>
                                 </div>
                                 </div>

                                 <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 text-right mob-text-left">
                                 <a href="" class="custom-btn2 bg-green2"> VIEW GIG  </a>
                                 <b class="order-price1"> $300.00 </b>
                                 </div>   

                                 </div>
 
                              </div>
                              <div class="row m-t-20">
                                 <div class="col-md-12">
                                    <p class="para-1 col-white"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent porta dolor metus. Donec blandit imperdiet
                                       erat, a pharetra nulla pulvinar maximus. Quisque purus dui, 
                                    </p>
                                 </div>
                              </div>
                              <div class="row m-t-20">
                                 <div class="col-md-12 col-lg-12 col-lg-12">
                                    <div class="block-element">
                                       <div class="table-responsive custom-table1">
                                          <table  class="table table-hover contact-list" data-page-size="10">
                                             <thead>
                                                <tr>
                                                   <th> Participant </th>
                                                   <th class="text-center"> Quantity </th>
                                                   <th class="text-center"> Duration </th>
                                                   <th class="text-center"> Amount </th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr>
                                                   <td>  AXEL </td>
                                                   <td class="text-center"> 01  </td>
                                                   <td class="text-center"> Days 10  </td>
                                                   <td class="text-center"> $300.00 </td>
                                                </tr>
                                                <tr>
                                                   <td colspan="4" class="text-right mob-text-left"> <b> Total:  $300.00  </b> </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row m-t-20">
                                 <div class="col-md-12 col-lg-12">
                                    <div id="countdown">
                                       <ul>
                                          <li>Days <span id="days"></span> </li>
                                          <li>Hours <span id="hours"></span> </li>
                                          <li>Minutes <span id="minutes"></span> </li>
                                          <li>Seconds <span id="seconds"></span></li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-12">
                                    <div class="order-box1 border-bot1 support-box1 text-center">
                                       <a href="" class="bg-danger custom-btn2"> ORDER CANCEL </a>
                                       <h5 class="col-purple m-b-5 m-t-20"> ORDER REQUIREMENTS  </h5>
                                       <p class="m-b-10 col-silver"> Your buyer has filled out the requirements</p>
                                       <a href="" class="submit-btn1"> <i class="fa fa-plus"> </i> SHOW REQUIREMENTS </a>
                                    </div>
                                    <div class="order-box1 border-bot1 support-box1 text-center">
                                       <h5 class="col-purple m-b-5"> ORDER STARTED  </h5>
                                       <p class="m-b-15 col-silver"> Your buyer has filled out the requirements</p>
                                       <a  class="custom-btn2 col-white">00:14APRIL 10, 2021 </a>
                                    </div>
                                    <div class="row m-t-20">
                                       <div class="col-12">
                                          <div class="sec-head1">
                                             <h3> Forum </h3>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="chat-main-box">
                                       <div class="chat-rbox message-box1">
                                          <ul class="chat-list p-20">
                                             <!--chat Row -->
                                             <li>
                                                <div class="chat-img"><img src="{{URL::to('/')}}/assets/web/assets/images/users/1.jpg" alt="user" /></div>
                                                <div class="chat-content">
                                                   <h5 class="col-white">James Anderson</h5>
                                                   <div class="box bg-light-info col-silver">Lorem Ipsum is simply dummy text of the printing & type setting industry.</div>
                                                </div>
                                                <div class="chat-time">10:56 am</div>
                                             </li>
                                             <!--chat Row -->
                                             <li>
                                                <div class="chat-img"><img src="{{URL::to('/')}}/assets/web/assets/images/users/2.jpg" alt="user" /></div>
                                                <div class="chat-content">
                                                   <h5 class="col-white">Bianca Doe</h5>
                                                   <div class="box bg-light-info col-silver">It’s Great opportunity to work.</div>
                                                </div>
                                                <div class="chat-time">10:57 am</div>
                                             </li>
                                             <!--chat Row -->
                                             <li class="reverse">
                                                <div class="chat-content">
                                                   <h5 class="col-white">Steave Doe</h5>
                                                   <div class="box bg-light-inverse col-silver">It’s Great opportunity to work.</div>
                                                </div>
                                                <div class="chat-img"><img src="{{URL::to('/')}}/assets/web/assets/images/users/5.jpg" alt="user" /></div>
                                                <div class="chat-time">10:57 am</div>
                                             </li>
                                             <!--chat Row -->
                                             <li class="reverse">
                                                <div class="chat-content">
                                                   <h5 class="col-white">Steave Doe</h5>
                                                   <div class="box bg-light-inverse col-silver">It’s Great opportunity to work.</div>
                                                </div>
                                                <div class="chat-img"><img src="{{URL::to('/')}}/assets/web/assets/images/users/5.jpg" alt="user" /></div>
                                                <div class="chat-time">10:57 am</div>
                                             </li>
                                             <!--chat Row -->
                                             <li>
                                                <div class="chat-img"><img src="{{URL::to('/')}}/assets/web/assets/images/users/3.jpg" alt="user" /></div>
                                                <div class="chat-content">
                                                   <h5 class="col-white">Angelina Rhodes</h5>
                                                   <div class="box bg-light-info col-silver">Well we have good budget for the project</div>
                                                </div>
                                                <div class="chat-time">11:00 am</div>
                                             </li>
                                             <!--chat Row -->
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row m-t-30">
                                 <div class="col-12">
                                    <div class="summernote">
                                       <h3>Default Summernote</h3>
                                    </div>
                                 </div>
                              </div>
                              <div class="row m-t-10">
                                 <div class="col-12">
                                    <div class="text-right mob-text-left">
                                       <a href="" class="custom-btn2"> SEND </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 col-lg-4 col-12 col-sm-12">
                           <div class="support-box1 m-b-30">
                              <h5 class="col-purple"> WANT TO GET <br/> SUPPORT </h5>
                              <p class="m-b-10">    <a href="" class="custom-btn2 bg-purple"> SUPPORT </a> </p>
                              <h6> <a href="" class="col-purple"> <b> LEARN MORE </b> </a> </h6>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
@endsection