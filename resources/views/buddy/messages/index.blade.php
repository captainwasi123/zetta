@extends('buddy.include.master')
@section('title', 'Messages')

@section('content')

<div class="box-wrapper2">
    <div class="row">
       <div class="col-md-3 col-lg-3 col-12 col-sm-3 no-pad bg-white">
          <div class="chat-main-box inbox-aside" style="width: 100%">
             <div class="chat-left-aside" style="width: 100%;">
                <div class="open-panel"><i class="ti-angle-right"></i></div>
                <div class="chat-left-inner">
                   <div class="sec-head4">
                      <h5> All Conversations </h5>
                   </div>
                   <ul class="chatonline style-none ">
                      <li>
                         <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/1.jpg" alt="user-img" class="img-circle"> <span> Minhaj <sub class="time-msg"> 13h </sub> <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b> </a>
                      </li>
                      <li>
                         <a href="javascript:void(0)" class="active"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/2.jpg" alt="user-img" class="img-circle"> <span> Maxella <sub class="time-msg"> 13h </sub> <small class="bg-green">Away</small></span> <b> Hello , How are you sir? </b> </a>
                      </li>
                      <li>
                         <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/3.jpg" alt="user-img" class="img-circle"> <span> Peter <sub class="time-msg"> 13h </sub> <small class="bg-danger">Busy</small></span> <b> Hello , How are you sir? </b> </a>
                      </li>
                      <li>
                         <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Jane Doe <sub class="time-msg"> 13h </sub> <small class="bg-danger">Offline</small></span> <b> Hello , How are you sir? </b> </a>
                      </li>
                      <li>
                         <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/5.jpg" alt="user-img" class="img-circle"> <span> Jonathon <sub class="time-msg"> 13h </sub> <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b> </a>
                      </li>
                      <li>
                         <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/6.jpg" alt="user-img" class="img-circle"> <span> Tahar Roman <sub class="time-msg"> 13h </sub> <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b> </a>
                      </li>
                      <li>
                         <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/7.jpg" alt="user-img" class="img-circle"> <span> Ben Cobert <sub class="time-msg"> 13h </sub> <small class="bg-danger">online</small></span> <b> Hello , How are you sir? </b> </a>
                      </li>
                      <li>
                         <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <sub class="time-msg"> 13h </sub> <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b></a>
                      </li>
                      <li class="p-20"></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
       <div class="col-md-7 col-lg-7 col-12 col-sm-3 no-pad">
          <div class="chat-main-box">
             <div class="card m-b-0">
                <!-- .chat-row -->
                <div class="chat-main-box">
                   <!-- .chat-left-panel -->
                   <!-- .chat-left-panel -->
                   <!-- .chat-right-panel -->
                   <div class="chat-right-">
                      <div class="chat-person-name">
                         <h4> Muhammad Nazim </h4>
                         <p> Last Seen 15m ago </p>
                      </div>
                      <div class="chat-rbox chat-bar1">
                         <ul class="chat-list p-20">
                            <!--chat Row -->
                            <li>
                               <div class="chat-img"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/1.jpg" alt="user" /></div>
                               <div class="chat-content">
                                  <h5>James Anderson</h5>
                                  <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing & type setting industry.</div>
                               </div>
                               <div class="chat-time">10:56 am</div>
                            </li>
                            <!--chat Row -->
                            <li>
                               <div class="chat-img"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/2.jpg" alt="user" /></div>
                               <div class="chat-content">
                                  <h5>Bianca Doe</h5>
                                  <div class="box bg-light-info">It’s Great opportunity to work.</div>
                               </div>
                               <div class="chat-time">10:57 am</div>
                            </li>
                            <!--chat Row -->
                            <li class="reverse">
                               <div class="chat-content">
                                  <h5>Steave Doe</h5>
                                  <div class="box bg-light-inverse">It’s Great opportunity to work.</div>
                               </div>
                               <div class="chat-img"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/5.jpg" alt="user" /></div>
                               <div class="chat-time">10:57 am</div>
                            </li>
                            <!--chat Row -->
                            <li class="reverse">
                               <div class="chat-content">
                                  <h5>Steave Doe</h5>
                                  <div class="box bg-light-inverse">It’s Great opportunity to work.</div>
                               </div>
                               <div class="chat-img"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/5.jpg" alt="user" /></div>
                               <div class="chat-time">10:57 am</div>
                            </li>
                            <!--chat Row -->
                            <li>
                               <div class="chat-img"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/3.jpg" alt="user" /></div>
                               <div class="chat-content">
                                  <h5>Angelina Rhodes </h5>
                                  <div class="box bg-light-info">Well we have good budget for the project</div>
                               </div>
                               <div class="chat-time">11:00 am</div>
                            </li>
                            <!--chat Row -->
                         </ul>
                      </div>
                      <div class="card-body b-t">
                         <div class="row">
                            <div class="col-12">
                               <textarea placeholder="Type your message here" class="form-control b-0 msg-write"></textarea>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-8">
                               <a href="" class="col-black form-attach1"> <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/smile-icon.png"> </a>
                               <a href="" class="col-black form-attach1"> <i class="fa fa-bolt"> </i> </a>
                               <a href="" class="col-black form-attach1"> <i class="fa fa-paperclip"> </i> </a>
                               <a href="" class="submit-btn1 bg-green2"> Create an Offer </a>
                            </div>
                            <div class="col-4 text-right">
                               <button type="button" class="col-green send-now-btn"> Send </button>
                            </div>
                         </div>
                      </div>
                   </div>
                   <!-- .chat-right-panel -->
                </div>
                <!-- /.chat-row -->
             </div>
          </div>
       </div>
       <div class="col-md-2 col-lg-2 col-12 col-sm-3 no-pad border-5">
          <div class="chat-about-details-head">
             <h4> About me </h4>
          </div>
          <div class="chat-about-details">
             <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/6.jpg">
             <h5> Minhaj </h5>
             <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
             <table>
                <tbody>
                   <tr>
                      <th> From </th>
                      <td> Pakistan </td>
                   </tr>
                   <tr>
                      <th class="col-purple" colspan="2"> Language </th>
                   </tr>
                   <tr>
                      <th> English </th>
                      <td> Basic </td>
                   </tr>
                   <tr>
                      <th> Urdu </th>
                      <td> Intermediate </td>
                   </tr>
                </tbody>
             </table>
          </div>
       </div>
    </div>
</div>

@endsection
