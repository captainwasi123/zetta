@extends('coach.include.master')
@section('title', 'Registration Form')

@section('content')
<div class="box-wrapper1">
   <div class="row">
      <div class="col-md-6 col-lg-6 col-sm-12 col-12">
         <div class="profile-pic-upload">
            <form method="post" action="{{route('coach.my_account.profileImage')}}" id="profile_form" enctype="multipart/form-data">
               @csrf
               <div class="avatar-upload">
                  <div class="avatar-edit">
                     <input type='file' id="imageUpload" name="profileImage" accept=".png, .jpg, .jpeg" />
                     <label for="imageUpload"></label>
                  </div>
                  <div class="avatar-preview">
                     <div id="imagePreview" style="
                        @if(empty(Auth::user()->profile_img))
                          background-image: url('{{URL::to('/')}}/public/user-placeholder.jpg');
                        @else
                          background-image: url('{{URL::to('/')}}/public/user/profile_img/{{Auth::user()->profile_img}}');
                        @endif
                     ">
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="profile-pic-details">
            <h4 class="col-white"> Hi, Coach </h4>
            <p class="col-silver"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod </p>
            <a href="javascript:void(0)" class="default_link" data-toggle="modal" data-target="#editProfileModal">Edit Profile</a>
            <h5> 
               <i class="fa fa-star col-yellow"> </i> 
               <i class="fa fa-star col-yellow"> </i> 
               <i class="fa fa-star col-yellow"> </i> 
               <i class="fa fa-star col-yellow"> </i> 
               <i class="fa fa-star col-yellow"> </i> 
               <b class="col-white"> 5.0 </b> 
            </h5>
         </div>
         <div class="row center-row">
            <div class="col-md-4 col-lg-4 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/field-icon1.png">
                  <h5> Full Name </h5>
               </div>
            </div>
            <div class="col-md-8 col-lg-8 col-12">
               <p class="form-field1 text-right mob-text-left off-border">
                  {{Auth::user()->fname.' '.Auth::user()->lname}}
               </p>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-4 col-lg-4 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/field-icon3.png">
                  <h5> Gender </h5>
               </div>
            </div>
            <div class="col-md-8 col-lg-8 col-12">
               <p class="form-field1 text-right mob-text-left off-border">
                  {{Auth::user()->gender}}
               </p>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-4 col-lg-4 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/field-icon1.png">
                  <h5> Email Address </h5>
               </div>
            </div>
            <div class="col-md-8 col-lg-8 col-12">
               <p class="form-field1 text-right mob-text-left off-border">
                  {{Auth::user()->email}}
               </p>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-4 col-lg-4 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/field-icon19.png">
                  <h5> Availability </h5>
               </div>
            </div>
            <div class="col-md-8 col-lg-8 col-12">
               <p class="form-field1 text-right mob-text-left off-border">
                  @switch(Auth::user()->availability)
                     @case('1')
                        Online Zoom Classes
                        @break;

                     @case('2')
                        Normal Classes
                        @break

                     @case('3')
                        Online Zoom Classes, Normal Classes
                        @break
                  @endswitch
               </p>
            </div>
         </div>
      </div>
      <div class="col-md-6 col-lg-6 col-sm-12 col-12">
         <div class="row center-row m-t-30">
            <div class="col-md-4 col-lg-4 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/field-icon13.png">
                  <h5> Country </h5>
               </div>
            </div>
            <div class="col-md-8 col-lg-8 col-12">
               <p class="form-field1 text-right mob-text-left off-border">
                  {{empty(Auth::user()->country) ? '-' : Auth::user()->country->country}}
               </p>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-4 col-lg-4 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/field-icon3.png">
                  <h5> City </h5>
               </div>
            </div>
            <div class="col-md-8 col-lg-8 col-12">
               <p class="form-field1 text-right mob-text-left off-border">
                  {{empty(Auth::user()->city) ? '-' : Auth::user()->city}}
               </p>
            </div>
         </div>
         <div class="row m-b-20">
            <div class="col-md-4 col-lg-4 col-12">
               <div class="field-name m-t-15">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/field-icon12.png">
                  <h5> Choose File </h5>
               </div>
            </div>
            <div class="col-md-8 col-lg-8 col-12">
               <input type="file" name="" class="form-field1 ">
               <span class="info-tag1"> Allowed File types are jpg, jpeg, doc, docs, pdf </span>
            </div>
         </div>
         <div class="row m-b-20">
            <div class="col-md-4 col-lg-4 col-12">
               <div class="field-name m-t-15">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/field-icon15.png">
                  <h5> ID Proof </h5>
               </div>
            </div>
            <div class="col-md-8 col-lg-8 col-12">
               <input type="file" name="" class="form-field1 ">
               <span class="info-tag1"> Allowed File types are jpg, jpeg, doc, docs, pdf </span>
            </div>
         </div>
         <div class="row m-b-20">
            <div class="col-md-4 col-lg-4 col-12">
               <div class="field-name m-t-15">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/field-icon3.png">
                  <h5> Address Proof</h5>
               </div>
            </div>
            <div class="col-md-8 col-lg-8 col-12">
               <input type="file" name="" class="form-field1 ">
               <span class="info-tag1"> Allowed File types are jpg, jpeg, doc, docs, pdf </span>
            </div>
         </div>

         <div class="row">
         <div class="col-md-4 col-lg-4 col-12">
            <div class="field-name">
               <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/add-pic-icon.png">
               <h5> Add Media </h5>
            </div>
         </div>
         <div class="col-md-8 col-lg-8 col-12">
            <div class="pic-uploader1">
               <input type="file" id="input-file-max-fs" class="dropify off-border" data-max-file-size="2M" data-height="50"/>
            </div>
         </div>
      </div>


      </div>
   </div>
   <div class="row m-t-30">
      <div class="col-md-6 col-lg-6 col-sm-12 col-12">
         <div class="profiles-values m-b-30">
            <div class="profile-description">
               <h5 class="col-white"> Description</h5>
               <p class="col-silver">
                  {{Auth::user()->description}}
               </p>
            </div>
            <div class="profile-value1">
               <h5 class="col-purple"> Languages 
                  <a href="javascript:void(0)" class="submit-btn1" data-toggle="modal" data-target="#addLangModal"> 
                     <i class="fa fa-plus"></i> Add New 
                  </a> 
               </h5>
               <div class="lang-1">
                  @foreach(Auth::user()->langs as $val)
                     <p class="col-white"> {{$val->language}} <span class="col-silver"> {{$val->level}} </span> </p>
                  @endforeach
               </div>
            </div>
            <div class="profile-value1">
               <h5 class="col-purple"> Sports Category 
                  <a href="{{route('coach.category.add')}}" class="submit-btn1"> 
                     <i class="fa fa-plus"></i> Add New 
                  </a> 
               </h5>
               <div class="category-sports">
                  @foreach(Auth::user()->category as $val)
                     <button class="cat-button1"> {{$val->name}} </button>
                  @endforeach
               </div>
            </div>
            <div class="profile-value1">
               <h5 class="col-purple"> Education <a href="" class="submit-btn1"> <i class="fa fa-plus"></i> Add New </a> </h5>
               <input type="text" value="Bachelor of Sports" class="form-field1 disabled-field p-0 off-border" name="" readonly="">
               <input type="text" value="Masters In Literature" class="form-field1 disabled-field p-0 off-border" name="" readonly="">
            </div>
            <div class="profile-value1">
               <h5 class="col-purple"> Certification <a href="" class="submit-btn1"> <i class="fa fa-plus"></i> Add New </a> </h5>
               <input type="text" value="MS Office Automation Cert" class="form-field1 disabled-field p-0 off-border" name="" readonly="">
               <input type="text" value="MS Office Automation Cert" class="form-field1 disabled-field p-0 off-border" name="" readonly="">
            </div>
         </div>
      </div>
      <div class="col-md-6 col-lg-6 col-sm-12 col-12">
         <div class="sec-head1 m-b-15">
            <h3> Active Lesson </h3>
         </div>
         <div class="block-element">
            <div class="row">
               <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                  <div class="lesson-block lesson-block3">
                     <div class="lesson-image-block">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/lesson-image1.jpg">
                     </div>
                     <div class="lesson-info-block">
                        <h4> <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <h6> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                     </div>
                     <div class="lesson-rating-block">
                        <a href="" class="col-red"> <i class="fa fa-heart"></i> </a>
                        <span> STARTING AT <b> $800 </b> </span>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                  <div class="lesson-block lesson-block3">
                     <div class="lesson-image-block">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/lesson-image1.jpg">
                     </div>
                     <div class="lesson-info-block">
                        <h4> <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <h6> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                     </div>
                     <div class="lesson-rating-block">
                        <a href="" class="col-red"> <i class="fa fa-heart"></i> </a>
                        <span> STARTING AT <b> $800 </b> </span>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                  <div class="lesson-block lesson-block3">
                     <div class="lesson-image-block">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/lesson-image1.jpg">
                     </div>
                     <div class="lesson-info-block">
                        <h4> <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <h6> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                     </div>
                     <div class="lesson-rating-block">
                        <a href="" class="col-red"> <i class="fa fa-heart"></i> </a>
                        <span> STARTING AT <b> $800 </b> </span>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                  <div class="lesson-block lesson-block3">
                     <div class="lesson-image-block">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/lesson-image1.jpg">
                     </div>
                     <div class="lesson-info-block">
                        <h4> <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <h6> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                     </div>
                     <div class="lesson-rating-block">
                        <a href="" class="col-red"> <i class="fa fa-heart"></i> </a>
                        <span> STARTING AT <b> $800 </b> </span>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                  <div class="lesson-block lesson-block3">
                     <div class="lesson-image-block">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/lesson-image1.jpg">
                     </div>
                     <div class="lesson-info-block">
                        <h4> <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <h6> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                     </div>
                     <div class="lesson-rating-block">
                        <a href="" class="col-red"> <i class="fa fa-heart"></i> </a>
                        <span> STARTING AT <b> $800 </b> </span>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                  <div class="lesson-block lesson-block3">
                     <div class="lesson-image-block">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/lesson-image1.jpg">
                     </div>
                     <div class="lesson-info-block">
                        <h4> <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <h6> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                     </div>
                     <div class="lesson-rating-block">
                        <a href="" class="col-red"> <i class="fa fa-heart"></i> </a>
                        <span> STARTING AT <b> $800 </b> </span>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                  <div class="lesson-block lesson-block3">
                     <div class="lesson-image-block">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/lesson-image1.jpg">
                     </div>
                     <div class="lesson-info-block">
                        <h4> <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <h6> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                     </div>
                     <div class="lesson-rating-block">
                        <a href="" class="col-red"> <i class="fa fa-heart"></i> </a>
                        <span> STARTING AT <b> $800 </b> </span>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                  <div class="lesson-block lesson-block3">
                     <div class="lesson-image-block">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/lesson-image1.jpg">
                     </div>
                     <div class="lesson-info-block">
                        <h4> <img src="{{URL::to('/')}}/assets/user_dashboard/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <h6> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                     </div>
                     <div class="lesson-rating-block">
                        <a href="" class="col-red"> <i class="fa fa-heart"></i> </a>
                        <span> STARTING AT <b> $800 </b> </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>



   <!-- Edit Profile -->
   <div id="editProfileModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <form method="post" action="{{route('coach.my_account.update_profile')}}">
               @csrf
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Edit Profile Information</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body">
                  <div class="row">
                     <div class="col-md-6">
                        <label>First Name</label>
                        <input type="text" name="first_name" value="{{Auth::user()->fname}}" class="form-control" required>
                     </div>
                     <div class="col-md-6">
                        <label>Last Name</label>
                        <input type="text" name="last_name" value="{{Auth::user()->lname}}" class="form-control" required>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-12">
                        <label>Email</label>
                        <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" disabled>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-6">
                        <label>Country</label>
                        <select name="country" class="form-control" required>
                           <option value="">Select</option>
                           @foreach($countries as $val)
                              <option value="{{$val->id}}"
                                 {{Auth::user()->country_id == $val->id ? 'selected' : ''}}
                              >{{$val->nicename}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-md-6">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" value="{{Auth::user()->city}}" required>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-12">
                        <label>Gender</label><br>
                        <div class="text-right mob-text-left field_borders">
                           <label class="custom-control custom-radio">
                              <input id="radio1" name="gender" type="radio" value="Male" class="custom-control-input"
                                 {{Auth::user()->gender == 'Male' ? 'checked' : ''}}
                              >
                              <span class="custom-control-label">Male</span>
                           </label>&nbsp;&nbsp;
                           <label class="custom-control custom-radio">
                              <input id="radio2" name="gender" type="radio" value="Female" class="custom-control-input"
                                 {{Auth::user()->gender == 'Female' ? 'checked' : ''}}
                              >
                              <span class="custom-control-label">Female</span>
                           </label>&nbsp;&nbsp;
                           <label class="custom-control custom-radio">
                              <input id="radio3" name="gender" type="radio" value="Other" class="custom-control-input"
                                 {{Auth::user()->gender == 'Other' ? 'checked' : ''}}
                              >
                              <span class="custom-control-label">Other</span>
                           </label>
                        </div>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-12">
                        <label>Availability</label><br>
                        <div class="text-right mob-text-left field_borders">
                           <label class="custom-control custom-radio">
                              <input id="radio1" name="availability" type="radio" value="1" class="custom-control-input"
                                 {{Auth::user()->availability == '1' ? 'checked' : ''}}
                              >
                              <span class="custom-control-label">Online Zoom Classes</span>
                           </label>&nbsp;
                           <label class="custom-control custom-radio">
                              <input id="radio2" name="availability" type="radio" value="2" class="custom-control-input"
                                 {{Auth::user()->availability == '2' ? 'checked' : ''}}
                              >
                              <span class="custom-control-label">Normal Classes</span>
                           </label>&nbsp;
                           <label class="custom-control custom-radio">
                              <input id="radio3" name="availability" type="radio" value="3" class="custom-control-input"
                                 {{Auth::user()->availability == '3' ? 'checked' : ''}}
                              >
                              <span class="custom-control-label">Both</span>
                           </label>
                        </div>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-12">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4">{{Auth::user()->description}}</textarea>
                     </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary waves-effect">Save Changes</button>
              </div>
            </form>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>

   <!-- Add languages -->
   <div id="addLangModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <form method="post" action="{{route('coach.my_account.add_lang')}}">
               @csrf
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Add Language</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body">
                  <div class="row">
                     <div class="col-md-6">
                        <label>Language</label>
                        <input type="text" name="lang" class="form-control" required>
                     </div>
                     <div class="col-md-6">
                        <label>Level</label>
                        <select name="lang_level" class="form-control" required>
                           <option value="Basic">Basic</option>
                           <option value="Intermediate">Intermediate</option>
                           <option value="Expert">Expert</option>
                        </select>
                     </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary waves-effect">Add Language</button>
              </div>
            </form>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>

</div>


@endsection