@extends('buddy.include.master')
@section('title', 'Analytics And Redeem')
@section('content')
<div class="box-wrapper1">
    <div class="block-element  ">
       <div class="sec-head1">
          <h3> Your Zetta Lead  </h3>
       </div>
    </div>
    <div class="block-element m-b-10">
       <div class="lead-details">
          <p class="col-silver">
             <span> <b class="bg-danger"></b> Number Of Hours </span>
             <span> <b class="bg-purple"></b> Number Of Activities </span>
             <span> <b class="bg-success"></b> Number Of Different Sports </span>
          </p>
       </div>
    </div>
    <div class="block-element">
        <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Product line Chart</h4>
                  <ul class="list-inline text-right">
                      <li>
                          <h5><i class="fa fa-circle m-r-5 text-inverse"></i>iPhone</h5>
                      </li>
                      <li>
                          <h5><i class="fa fa-circle m-r-5 text-info"></i>iPad</h5>
                      </li>
                      <li>
                          <h5><i class="fa fa-circle m-r-5 text-success"></i>iPod</h5>
                      </li>
                  </ul>
                  <div id="morris-area-chart"></div>
              </div>
          </div>
    </div>
    <div class="block-element m-t-30 m-b-30">
       <div class="row">
          <div class="col-12">
             <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link custom-btn5 active" data-toggle="tab" href="#home" role="tab">Challenges </a> </li>
                <li class="nav-item"> <a class="nav-link custom-btn5 " data-toggle="tab" href="#profile" role="tab">Badges </a> </li>
                <li class="nav-item"> <a class="nav-link custom-btn5" data-toggle="tab" href="#settings" role="tab">Rewards</a> </li>
             </ul>
          </div>
       </div>
       <div class="row">
          <div class="col-12">
             <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                   <div class="row m-t-30 m-b-20">
                      <div class="col-12">
                         <span class="inform-box1"> <i class="fa fa-info"> </i> Complete Challenge to collect More Challenges </span>
                      </div>
                   </div>
                   <div class="row">
                     @foreach($challenges as $val)
                         <div class="col-md-3 col-lg-3 col-sm-3 col-6">
                            <div class="badge-box">
                               <img src="{{asset('public')}}/admin/assets/images/badge1.jpg">
                               <div class="details">
                                 <p>{{$val->title}}</p>
                                 <label class="reward">
                                    <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/bonus-tag.png">
                                    {{$val->reward}}
                                 </label>
                                 @php
                                    $end = \Carbon\Carbon::parse($val->expiry_date);

                                    $current = \Carbon\Carbon::now();
                                    $length = $end->diffInDays($current);
                                 @endphp
                                 <label class="deadline">
                                    <i class="fa fa-history"></i>
                                    {{$length+1}} days left
                                 </label>
                               </div>
                            </div>
                         </div>
                     @endforeach
                   </div>
                </div>
                <div class="tab-pane " id="profile" role="tabpanel">
                   <div class="row m-t-30 m-b-20">
                      <div class="col-12">
                         <span class="inform-box1"> <i class="fa fa-info"> </i> Complete Challenge to collect More Badges  </span>
                      </div>
                   </div>
                   <div class="row m-b-10">
                      <div class="col-12">
                         <span class="bonus-tag"> <img src="{{asset('public')}}/admin/assets/images/bonus-tag.jpg"> 100 </span>
                      </div>
                   </div>
                   <div class="row">
                      <div class="col-md-3 col-lg-3 col-sm-3 col-6">
                         <div class="badge-box">
                            <img src="{{asset('public')}}/admin/assets/images/badge1.jpg">
                         </div>
                      </div>
                      <div class="col-md-3 col-lg-3 col-sm-3 col-6">
                         <div class="badge-box">
                            <img src="{{asset('public')}}/admin/assets/images/badge1.jpg">
                            <span> x2 </span>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="tab-pane" id="settings" role="tabpanel">
                   <div class="row m-t-30 m-b-20">
                      <div class="col-12">
                         <span class="inform-box1"> <i class="fa fa-info"> </i> Complete Challenge to collect More Rewards  </span>
                      </div>
                   </div>
                   <div class="row m-b-10">
                      <div class="col-12">
                         <span class="bonus-tag"> <img src="{{asset('public')}}/admin/assets/images/bonus-tag.jpg"> 100 </span>
                      </div>
                   </div>
                   <div class="row">
                      <div class="col-md-3 col-lg-3 col-sm-3 col-6">
                         <div class="badge-box">
                            <img src="{{asset('public')}}/admin/assets/images/badge1.jpg">
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
