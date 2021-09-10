@extends('buddy.include.master')
@section('title', 'My Account Settings')

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
                          background-image: url('{{URL::to('/')}}/public/storage/user/profile_img/{{Auth::user()->profile_img}}');
                        @endif
                     ">
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="profile-pic-details">
            <h4 class="col-white"> Hi, {{Auth::user()->fname.' '.Auth::user()->lname}} </h4>
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
         <div class="row center-row line">
            <div class="col-md-6 col-lg-4 col-6">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon1.png">
                  <h5> Full Name </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-8 col-6">
               <p class="form-field1 text-right mob-text-left off-border">
                  {{Auth::user()->fname.' '.Auth::user()->lname}}
               </p>
            </div>
         </div>
         <div class="row center-row line">
            <div class="col-md-6 col-lg-4 col-6">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon3.png">
                  <h5> Gender </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-8 col-6">
               <p class="form-field1 text-right mob-text-left off-border">
                  {{Auth::user()->gender}}
               </p>
            </div>
         </div>
         <div class="row center-row ">
            <div class="col-md-6 col-lg-4 col-6">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/public/admin/assets/images/field-icon17.png">
                  <h5> Email Address </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-8 col-6">
               <p class="form-field1 text-right mob-text-left off-border">
                  {{Auth::user()->email}}
               </p>
            </div>
         </div>
      </div>
      <div class="col-md-6 col-lg-6 col-sm-12 col-12">
         <div class="row center-row m-t-30 line">
            <div class="col-md-6 col-lg-4 col-6">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon13.png">
                  <h5> Country </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-8 col-6">
               <p class="form-field1 text-right mob-text-left off-border">
                  {{empty(Auth::user()->country) ? '-' : Auth::user()->country->country}}
               </p>
            </div>
         </div>
         <div class="row center-row line">
            <div class="col-md-6 col-lg-4 col-6">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon3.png">
                  <h5> City </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-8 col-6">
               <p class="form-field1 text-right mob-text-left off-border">
                  {{empty(Auth::user()->city) ? '-' : Auth::user()->city}}
               </p>
            </div>
         </div>

         <!-- <div class="row m-b-20">
            <div class="col-md-4 col-lg-4 col-12">
               <div class="field-name m-t-15">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon12.png">
                  <h5> Choose File </h5>
               </div>
            </div>
            <div class="col-md-8 col-lg-8 col-12">
               <input type="file" name="" class="form-field1 ">
               <span class="info-tag1"> Allowed File types are jpg, jpeg, doc, docs, pdf </span>
            </div>
         </div> -->
         <form method="post" id="id_proof_form" action="{{route('buddy.my_account.idProof')}}" enctype="multipart/form-data">
            @csrf
            <div class="row m-b-20 line">
               <div class="col-md-6 col-lg-4 col-6">
                  <div class="field-name m-t-15">
                     <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon15.png">
                     <h5> ID Proof </h5>
                  </div>
               </div>
               <div class="col-md-6 col-lg-8 col-6">
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
            <div class="row m-b-20 ">
               <div class="col-md-6 col-lg-4 col-6">
                  <div class="field-name m-t-15">
                     <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon3.png">
                     <h5> Address Proof</h5>
                  </div>
               </div>
               <div class="col-md-6 col-lg-8 col-6">
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
                        <p class="col-white">
                            {{$val->language}}
                            <span class="col-silver"> {{$val->level}} </span>
                            <a href="javascript:void(0)" class="removeLng" data-id="{{base64_encode($val->id)}}" style="color: red";>
                                <i class="fa fa-times"></i>
                            </a>
                        </p>
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
                     <a href="javascript:void(0)" class="removeEdu" data-id="{{base64_encode($val->id)}}" style="color: red";>
                        <i class="fa fa-times"></i>
                    </a>
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
                     <a href="javascript:void(0)" class="removeCert" data-id="{{base64_encode($val->id)}}" style="color: red";>
                        <i class="fa fa-times"></i>
                    </a>
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
               @foreach(Auth::user()->activities as $val)
                  <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                     <div class="lesson-block lesson-block3">
                        <div class="lesson-image-block">
                           <img src="{{URL::to('/public/storage/user/activity/main_image/'.$val->cover_img)}}">
                        </div>
                        <div class="lesson-info-block">
                           <h4> <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->user) ? '' : $val->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';"> {{empty($val->user) ? 'Unknown' : $val->user->fname.' '.$val->user->lname}} <span> Sports Buddy </span>  </h4>
                           <p class="descrip">
                              {{$val->description}}
                           </p>
                           <h6> <i class="fa fa-star col-yellow"> </i> 5.0 </h6>
                        </div>
                        <div class="lesson-rating-block">
                           <span> STARTING AT <b> FREE </b> </span>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>



   <!-- Edit Profile -->
   <div id="editProfileModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <form method="post" action="{{route('buddy.my_account.update_profile')}}">
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
                       <label>Address</label>
                       <textarea class="form-control" name="address" id="address" cols="5" rows="4">{{Auth::user()->address}}</textarea>
                       <input type="hidden" name="lat" id="lat">
                       <input type="hidden" name="lng" id="lng">
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
            <form method="post" action="{{route('buddy.my_account.add_lang')}}">
               @csrf
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Add Language</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body">
                  <div class="row">
                     <div class="col-md-6">
                        <label>Language</label>
                        <select class="form-control" name="lang" id="lang" required>
                            <option value="">Select</option>
                            @foreach ($languages as $lng)
                                <option value="{{$lng->name}}">{{$lng->name}}</option>
                            @endforeach
                        </select>
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
            <form method="post" action="{{route('buddy.my_account.add_edu')}}">
               @csrf
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Add Education</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
            <form method="post" action="{{route('buddy.my_account.add_certificate')}}">
               @csrf
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Add Certificate</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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

</div>


@endsection
@section('addScript')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>
<script>
    $(document ).ready(function() {
        getLocation();
    });

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        // initMap(position.coords.latitude,position.coords.longitude);
        console.log(position);
        $('#lat').val(position.coords.latitude);
        $('#lng').val(position.coords.longitude);
    }

</script>

{{-- <script type="text/javascript">
    function initMap(lat,lng) {
    const myLatLng = { lat: lat, lng: lng };
    const map = new google.maps.Map(document.getElementById("mapa"), {
        zoom: 15,
        center: myLatLng,
    });
    new google.maps.Marker({
        position: myLatLng,
        map,
        title: "Hello World!",
    });
}

</script> --}}
@endsection
