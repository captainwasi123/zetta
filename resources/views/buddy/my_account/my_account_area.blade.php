@extends('buddy.include.master')
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
                      <div id="imagePreview" style="
                      @if(empty(Auth::user()->profile_img))
                          background-image: url('{{URL::to('/')}}/public/user-placeholder.jpg');
                        @else
                          background-image: url('{{URL::to('/')}}/public/storage/user/profile_img/{{Auth::user()->profile_img}}');
                        @endif
                      ">
                      </div>
                   </div>
                </div>
             </div>
             <div class="profile-pic-details">
                <h4 class="col-white"> Hi, Sports Buddy </h4>
                <p class="col-silver"> Lorem ipsum dolor sit amet, consectetur adipisicing  </p>
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
                   <input type="text" placeholder="" value="{{Auth::user()->fname .' '. Auth::user()->lname}}" class="form-field1 disabled-field text-right mob-text-left off-border" readonly="" name="">
                   <a href="javascript:void(0)" class="form-edit1"> Edit Name </a>
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
             <div class="row center-row">
                <div class="col-md-4 col-lg-4 col-12">
                   <div class="field-name">
                      <img src="{{asset('public')}}/admin/assets/images/field-icon1.png">
                      <h5> Email Address </h5>
                   </div>
                </div>
                <div class="col-md-8 col-lg-8 col-12">
                   <input type="text" placeholder="" class="form-field1 disabled-field text-right mob-text-left off-border" value="{{Auth::user()->email}}" readonly="" name="">
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
                   <input type="text" placeholder="" value="{{empty(Auth::user()->country) ? '-' : Auth::user()->country->country}}" class="form-field1 disabled-field text-right mob-text-left off-border" readonly="" name="">
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
                   <input type="text" placeholder="" value="{{empty(Auth::user()->city) ? '-' : Auth::user()->city}}" class="form-field1 disabled-field text-right mob-text-left off-border" readonly="" name="">
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
             <form method="post" id="id_proof_form" action="{{route('buddy.my_account.idProof')}}" enctype="multipart/form-data">
                @csrf
                <div class="row m-b-20">
                   <div class="col-md-4 col-lg-4 col-12">
                      <div class="field-name m-t-15">
                         <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon15.png">
                         <h5> ID Proof </h5>
                      </div>
                   </div>
                   <div class="col-md-8 col-lg-8 col-12">
                      @if(empty(Auth::user()->id_proof_status))
                         <input type="file" id="id_proof_field" name="document" class="form-field1" required>
                         <span class="info-tag1"> Allowed File types are jpg, jpeg, doc, docs, pdf </span>
                      @elseif(Auth::user()->id_proof_status == '1')
                         <p class="form-field1 text-right mob-text-left off-border color-orange">
                            In-Review
                         </p>
                      @elseif(Auth::user()->id_proof_status == '2')
                         <p class="form-field1 text-right mob-text-left off-border">
                            Verified <img src="{{URL::to('/assets/user_dashboard/tick.png')}}" width="20px" style="margin-top:-4px;">
                         </p>
                      @endif
                   </div>
                </div>
             </form>
             <form method="post" id="add_proof_form" action="{{route('buddy.my_account.addProof')}}" enctype="multipart/form-data">
                @csrf
                <div class="row m-b-20">
                   <div class="col-md-4 col-lg-4 col-12">
                      <div class="field-name m-t-15">
                         <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon3.png">
                         <h5> Address Proof</h5>
                      </div>
                   </div>
                   <div class="col-md-8 col-lg-8 col-12">
                      @if(empty(Auth::user()->add_proof_status))
                         <input type="file" name="document" id="add_proof_field" class="form-field1 " required>
                         <span class="info-tag1"> Allowed File types are jpg, jpeg, doc, docs, pdf </span>
                      @elseif(Auth::user()->add_proof_status == '1')
                         <p class="form-field1 text-right mob-text-left off-border color-orange">
                            In-Review
                         </p>
                      @elseif(Auth::user()->add_proof_status == '2')
                         <p class="form-field1 text-right mob-text-left off-border">
                            Verified <img src="{{URL::to('/assets/user_dashboard/tick.png')}}" width="20px" style="margin-top:-4px;">
                         </p>
                      @endif
                   </div>
                </div>
             </form>

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
                   <a href="{{route('buddy.category.add')}}" class="submit-btn1">
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
                <h5 class="col-purple"> Education
                   <a href="javascript:void(0)" class="submit-btn1" data-toggle="modal" data-target="#addEduModal">
                      <i class="fa fa-plus"></i> Add New
                   </a>
                </h5>
                @foreach(Auth::user()->education as $val)
                   <div class="edu_block">
                      <p>{{$val->degree}}</p>
                      <span>{{$val->institute}} - {{$val->finish_year}}</span>
                   </div>
                @endforeach
             </div>
             <div class="profile-value1">
                <h5 class="col-purple"> Certificate
                   <a href="javascript:void(0)" class="submit-btn1" data-toggle="modal" data-target="#addCertificateModal">
                      <i class="fa fa-plus"></i> Add New
                   </a>
                </h5>
                @foreach(Auth::user()->certificate as $val)
                   <div class="edu_block">
                      <p>{{$val->certificate}}</p>
                      <span>{{$val->institute}}</span>
                   </div>
                @endforeach
             </div>
          </div>
       </div>
       <div class="col-md-6 col-lg-6 col-sm-12 col-12">
        <div class="sec-head1 m-b-15">
           <h3> Active Lesson </h3>
        </div>
        <div class="block-element">
           <div class="row">
              @foreach(Auth::user()->lessons as $val)
                 <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                    <div class="lesson-block lesson-block3">
                       <div class="lesson-image-block">
                          <img src="{{URL::to('/public/storage/user/lessons/main_image/'.$val->cover_img)}}">
                       </div>
                       <div class="lesson-info-block">
                          <h4> <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->user) ? '' : $val->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';"> {{empty($val->user) ? 'Unknown' : $val->user->fname.' '.$val->user->lname}} <span> Coach </span>  </h4>
                          <p class="descrip">
                             {{$val->description}}
                          </p>
                          <h6> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                       </div>
                       <div class="lesson-rating-block">
                          <span> STARTING AT <b> {{'$'.number_format($val->packages[0]->price)}} </b> </span>
                       </div>
                    </div>
                 </div>
              @endforeach
           </div>
        </div>
     </div>
    </div>
</div>


   <!-- Add languages -->
   <div id="addLangModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
          <form method="post" action="{{route('coach.my_account.add_lang')}}">
             @csrf
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Language</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
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


<!-- Add Education -->
<div id="addEduModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
          <form method="post" action="{{route('coach.my_account.add_edu')}}">
             @csrf
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Education</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
            </div>
            <div class="modal-body">
                <div class="row">
                   <div class="col-md-12">
                      <label>Degree</label>
                      <input type="text" name="degree" class="form-control" required>
                   </div>
                </div>
                <br>
                <div class="row">
                   <div class="col-md-8">
                      <label>Institute</label>
                      <input type="text" name="institute" class="form-control" required>
                   </div>
                   <div class="col-md-4">
                      <label>Finish Year</label>
                      <select name="finish_year" class="form-control" required>
                         <option value="" disabled selected>Select</option>
                         @php $sy = date('Y'); @endphp
                         @for($x=$sy; $x>($sy-30); $x--)
                            <option>{{$x}}</option>
                         @endfor
                      </select>
                   </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect">Add Education</button>
            </div>
          </form>
       </div>
       <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
 </div>


 <!-- Add Certificate -->
 <div id="addCertificateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
          <form method="post" action="{{route('coach.my_account.add_certificate')}}">
             @csrf
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Certificate</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
            </div>
            <div class="modal-body">
                <div class="row">
                   <div class="col-md-12">
                      <label>Certificate</label>
                      <input type="text" name="certificate" class="form-control" required>
                   </div>
                </div>
                <br>
                <div class="row">
                   <div class="col-md-12">
                      <label>Institute</label>
                      <input type="text" name="institute" class="form-control" required>
                   </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect">Add Certificate</button>
            </div>
          </form>
       </div>
       <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
 </div>

@endsection
