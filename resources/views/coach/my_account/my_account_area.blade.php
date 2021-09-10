@extends('coach.include.master')
@section('title', 'My Account Area')
@section('content')
<div class="box-wrapper1">
    <form>
       <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
             <div class="profile-pic-upload">
                <div class="avatar-upload">
                   <div class="avatar-edit avatar-edit2">
                      <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg">
                      <label for="imageUpload"></label>
                   </div>
                   <div class="avatar-preview">
                      <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                      </div>
                   </div>
                </div>
             </div>
             <div class="profile-pic-details">
                <h4 class="col-white"> Hi, {{(Auth::user()->fname.' 'Auth::user()->lname)}} </h4>
                <h5> <i class="fa fa-star col-yellow"> </i> <i class="fa fa-star col-yellow"> </i> <i class="fa fa-star col-yellow"> </i> <i class="fa fa-star col-yellow"> </i> <i class="fa fa-star col-yellow"> </i> <b class="col-white"> 5.0 </b> </h5>
             </div>
             <div class="row center-row">
                <div class="col-md-4 col-lg-4 col-12">
                   <div class="field-name">
                      <img src="{{asset('public')}}/admin/assets/images/field-icon1.png">
                      <h5> Full Name </h5>
                   </div>
                </div>
                <div class="col-md-8 col-lg-8 col-12">
                   <input type="text" placeholder="" value="Minhaj" class="form-field1 disabled-field text-right mob-text-left off-border" readonly="" name="">
                   <a href="" class="form-edit1"> Edit Name </a>
                </div>
             </div>
             <div class="row center-row">
                <div class="col-md-4 col-lg-4 col-12">
                   <div class="field-name">
                      <img src="{{asset('public')}}/admin/assets/images/field-icon3.png">
                      <h5> Gender </h5>
                   </div>
                </div>
                <div class="col-md-8 col-lg-8 col-12">
                   <div class="text-right mob-text-left">
                      <label class="custom-control custom-radio">
                      <input id="radio1" name="radio" type="radio" class="custom-control-input">
                      <span class="custom-control-label">Male</span>
                      </label>
                      <label class="custom-control custom-radio">
                      <input id="radio2" name="radio" type="radio" class="custom-control-input">
                      <span class="custom-control-label">Female</span>
                      </label>
                      <label class="custom-control custom-radio">
                      <input id="radio3" name="radio" type="radio" class="custom-control-input">
                      <span class="custom-control-label">Other</span>
                      </label>
                   </div>
                </div>
             </div>
             <div class="row center-row">
                <div class="col-md-4 col-lg-4 col-12">
                   <div class="field-name">
                      <img src="{{asset('public')}}/admin/assets/images/field-icon1.png">
                      <h5> Email Address </h5>
                   </div>
                </div>
                <div class="col-md-8 col-lg-8 col-12">
                   <input type="text" placeholder="" value="minhaj@gmail.com" class="form-field1 disabled-field text-right mob-text-left off-border" readonly="" name="">
                </div>
             </div>
             <div class="row center-row">
                <div class="col-md-4 col-lg-4 col-12">
                   <div class="field-name">
                      <img src="{{asset('public')}}/admin/assets/images/field-icon19.png">
                      <h5> Availability </h5>
                   </div>
                </div>
                <div class="col-md-8 col-lg-8 col-12">
                   <div class="text-right mob-text-left">
                      <label class="custom-control custom-radio">
                      <input id="radio1" name="radio" type="radio" class="custom-control-input">
                      <span class="custom-control-label">Only Zoom Classes</span>
                      </label>
                      <label class="custom-control custom-radio">
                      <input id="radio2" name="radio" type="radio" class="custom-control-input">
                      <span class="custom-control-label">Only Normal Classes</span>
                      </label>
                      <label class="custom-control custom-radio">
                      <input id="radio3" name="radio" type="radio" class="custom-control-input">
                      <span class="custom-control-label">Both</span>
                      </label>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12 col-12">
             <div class="row center-row m-t-30">
                <div class="col-md-4 col-lg-4 col-12">
                   <div class="field-name">
                      <img src="{{asset('public')}}/admin/assets/images/field-icon13.png">
                      <h5> Country </h5>
                   </div>
                </div>
                <div class="col-md-8 col-lg-8 col-12">
                   <input type="text" placeholder="" value="USA" class="form-field1 disabled-field text-right mob-text-left off-border" readonly="" name="">
                </div>
             </div>
             <div class="row center-row">
                <div class="col-md-4 col-lg-4 col-12">
                   <div class="field-name">
                      <img src="{{asset('public')}}/admin/assets/images/field-icon3.png">
                      <h5> City </h5>
                   </div>
                </div>
                <div class="col-md-8 col-lg-8 col-12">
                   <input type="text" placeholder="" value="Los Angles" class="form-field1 disabled-field text-right mob-text-left off-border" readonly="" name="">
                </div>
             </div>
             <div class="row center-row">
                <div class="col-md-4 col-lg-4 col-12">
                   <div class="field-name">
                      <img src="{{asset('public')}}/admin/assets/images/field-icon14.png">
                      <h5> Languages </h5>
                   </div>
                </div>
                <div class="col-md-8 col-lg-8 col-12">
                   <input type="text" placeholder="" value="English" class="form-field1 disabled-field text-right mob-text-left off-border" readonly="" name="">
                </div>
             </div>
             <div class="row m-b-20">
                <div class="col-md-4 col-lg-4 col-12">
                   <div class="field-name m-t-15">
                      <img src="{{asset('public')}}/admin/assets/images/field-icon12.png">
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
                      <img src="{{asset('public')}}/admin/assets/images/field-icon15.png">
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
                      <img src="{{asset('public')}}/admin/assets/images/field-icon3.png">
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
                      <img src="{{asset('public')}}/admin/assets/images/add-pic-icon.png">
                      <h5> Add Media </h5>
                   </div>
                </div>
                <div class="col-md-8 col-lg-8 col-12">
                   <div class="pic-uploader1">
                      <div class="dropify-wrapper" style="height: 62px;"><div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input accept="video/*" type="file" id="input-file-max-fs" class="dropify off-border" data-max-file-size="2M" data-height="50"><button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </form>
    <div class="row m-t-30">
       <div class="col-md-6 col-lg-6 col-sm-12 col-12">
          <div class="profiles-values m-b-30">
             <div class="profile-description">
                <h5 class="col-white"> Description <a href="" class="form-edit2"> Edit Description </a> </h5>
                <p class="col-silver"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.  </p>
             </div>
             <div class="profile-value1">
                <h5 class="col-purple"> Languages <a href="" class="submit-btn1"> <i class="fa fa-plus"></i> Add New </a> </h5>
                <div class="lang-1">
                   <p class="col-white"> English <span class="col-silver"> Fluent </span> </p>
                   <p class="col-white"> Urdu <span class="col-silver"> Native </span> </p>
                </div>
             </div>
             <div class="profile-value1">
                <h5 class="col-purple"> Sports Category <a class="submit-btn1" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <i class="fa fa-plus"></i> Add New </a> </h5>
                <div class="category-sports">
                   <button class="active cat-button1"> Boxing </button>
                   <button class="cat-button1"> Fitness </button>
                   <button class="cat-button1"> Yoga </button>
                   <button class="cat-button1"> Back Shape </button>
                   <button class="cat-button1"> Cardio </button>
                   <button class="cat-button1"> Racing </button>
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
                         <img src="{{asset('public')}}/admin/assets/images/lesson-image1.jpg">
                      </div>
                      <div class="lesson-info-block">
                         <h4> <img src="{{asset('public')}}/admin/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
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
                         <img src="{{asset('public')}}/admin/assets/images/lesson-image1.jpg">
                      </div>
                      <div class="lesson-info-block">
                         <h4> <img src="{{asset('public')}}/admin/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
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
                         <img src="{{asset('public')}}/admin/assets/images/lesson-image1.jpg">
                      </div>
                      <div class="lesson-info-block">
                         <h4> <img src="{{asset('public')}}/admin/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
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
                         <img src="{{asset('public')}}/admin/assets/images/lesson-image1.jpg">
                      </div>
                      <div class="lesson-info-block">
                         <h4> <img src="{{asset('public')}}/admin/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
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
                         <img src="{{asset('public')}}/admin/assets/images/lesson-image1.jpg">
                      </div>
                      <div class="lesson-info-block">
                         <h4> <img src="{{asset('public')}}/admin/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
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
                         <img src="{{asset('public')}}/admin/assets/images/lesson-image1.jpg">
                      </div>
                      <div class="lesson-info-block">
                         <h4> <img src="{{asset('public')}}/admin/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
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
                         <img src="{{asset('public')}}/admin/assets/images/lesson-image1.jpg">
                      </div>
                      <div class="lesson-info-block">
                         <h4> <img src="{{asset('public')}}/admin/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
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
                         <img src="{{asset('public')}}/admin/assets/images/lesson-image1.jpg">
                      </div>
                      <div class="lesson-info-block">
                         <h4> <img src="{{asset('public')}}/admin/assets/images/avatar.jpg"> Della 785 <span> Yoga Coach </span>  </h4>
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
 </div>
@endsection
