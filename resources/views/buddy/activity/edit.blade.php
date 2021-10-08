@extends('buddy.include.master')
@section('title', 'Edit your Activity')

@section('content')

<div class="box-wrapper1">
   <div class="block-element m-b-25">
      <div class="sec-head1">
         <h3> Edit your Activity </h3>
      </div>
   </div>
   <div class="block-element">
      <form method="post" action="{{route('buddy.activity.update')}}" enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="aid" value="{{base64_encode($data->id)}}">
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon1.png">
                  <h5> Title </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <input type="text" placeholder="" class="form-field1" name="title" value="{{$data->title}}" required>
            </div>
         </div>
         <div class="row m-b-20">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon6.png">
                  <h5> Description </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <textarea class="form-field1" name="description" required>{{$data->description}}</textarea>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon7.png">
                  <h5> Equipment </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <select class="select2 select2-multiple" style="width: 100%" name="equipments[]" multiple="multiple" data-placeholder="">
                  @foreach($equip as $val)
                     <option value="{{$val->id}}"
                        @foreach($data->equipment as $eq)
                           {{$val->id == $eq->equip_id ? 'selected' : ''}}
                        @endforeach
                     >{{$val->name}}</option>
                  @endforeach
              </select>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon8.png">
                  <h5> Participants </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12 ">
               <div class="inline-1">
                  <label class="custom-control custom-radio">
                  <input id="radio1" name="participants" type="radio" value="0" class="custom-control-input" {{$data->participants == '0' ? 'checked' : ''}}>
                  <span class="custom-control-label"> Single Activity </span>
                  </label>
                  <label class="custom-control custom-radio">
                  <input id="radio2" name="participants" type="radio" value="1" class="custom-control-input"{{$data->participants == '1' ? 'checked' : ''}}>
                  <span class="custom-control-label"> Group Activity </span>
                  </label>
               </div>
               <div class="inc-dec inline-1 increment-holder1" id="participants_block">

               </div>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon9.png">
                  <h5> Activity Type </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12 ">
               <div>
                  <label class="custom-control custom-radio">
                  <input id="radio1" name="activityType" type="radio" value="1" class="custom-control-input" {{$data->activity_type == '1' ? 'checked' : ''}}>
                  <span class="custom-control-label"> Public </span>
                  </label>
                  <label class="custom-control custom-radio">
                  <input id="radio2" name="activityType" type="radio" value="2" class="custom-control-input" {{$data->activity_type == '2' ? 'checked' : ''}}>
                  <span class="custom-control-label"> Private </span>
                  </label>
               </div>
            </div>
         </div>

         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon9.png">
                  <h5> Category </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <select name="category" class="form-field1" id="category_field" required>
                   <option value="">Select</option>
                    @foreach ($categories as $val)
                        <option value="{{$val->id}}"
                            @if ($data->category_id == $val->id)
                                selected
                            @endif
                            >{{$val->name}}</option>
                    @endforeach
               </select>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon9.png">
                  <h5> Sports </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <select name="sports" class="form-field1" id="sports_id" required>
                   <option value="{{$data->sports_id}}">{{@$data->sports->name}}</option>
               </select>
            </div>
         </div>

         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
                <div class="field-name">
                   <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon10.png">
                   <h5> Friend Participant </h5>
                </div>
             </div>
            <div class="col-md-6 col-lg-6 col-12">
                {{-- <input type="text" placeholder="" class="form-field1" name=""> --}}
                <select name="friend" id="friend" class="form-field1">
                    <option value="">select friend</option>
                     @foreach ($users as $val)
                         <option value="{{$val->id}}"
                            @if (@$friend->friend_id == $val->id)
                                selected
                            @endif
                            >{{$val->fname .' '. $val->lname}}</option>
                     @endforeach
                </select>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon3.png">
                  <h5> Location of the Activity </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12" id="location_block">
               @foreach($data->locations as $key => $val)
                  @if($key >= 1) <br> @endif
                  <div class="location-field">
                     <input type="text" placeholder="Location" class="form-field1" value="{{$val->address}}" name="location[]" required>
                  </div>
               @endforeach
                <input type="hidden" name="lat" id="lat">
                <input type="hidden" name="lng" id="lng">
            </div>
         </div>
         <div class="row">
            <div class="col-md-3 col-lg-3 col-12"></div>
            <div class="col-md-8 col-lg-8 col-12">
               <div class="m-b-10">
                  <button type="button" class="submit-btn5 addLocationBlock"> <i class="fa fa-plus"> </i> ADD </button>
               </div>
            </div>
         </div>
         <div class="row m-b-20">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon3.png">
                  <h5> Covered </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <div class="m-b-15">
                  <label class="custom-control custom-radio">
                  <input id="radio1" name="locationType" type="radio" value="1" class="custom-control-input" {{$data->location_covered == '1' ? 'checked' : ''}}>
                  <span class="custom-control-label"> Yes </span>
                  </label>
                  <label class="custom-control custom-radio">
                  <input id="radio2" name="locationType" type="radio" value="0" class="custom-control-input"{{$data->location_covered == '0' ? 'checked' : ''}}>
                  <span class="custom-control-label"> No </span>
                  </label>
               </div>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/add-pic-icon.png">
                  <h5> Cover Picture </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <input type="file" name="cover_image" class="form-field1" accept="image/png, image/jpeg, image/jpg">
               <span class="info-tag1"> Allowed File types are jpg, jpeg, png </span>
               <br>
               <img src="{{URL::to('/public/storage/user/activity/main_image/'.$data->cover_img)}}" width="100px">
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon12.png">
                  <h5> Media </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <div class="pic-uploader1">
                  <input type="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M" data-height="100"/>
               </div>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon19.png">
                  <h5> Activity DateTime </h5>
               </div>
            </div>
            <div class="col-md-3 col-lg-3 col-12">
               <div class="pic-uploader1">
                  <input type="date" placeholder="" class="form-field1" value="{{date('Y-m-d', strtotime($data->held_date))}}" name="held_date" required>
               </div>
            </div>
            <div class="col-md-3 col-lg-3 col-12">
               <div class="pic-uploader1">
                  <input type="time" placeholder="" class="form-field1" name="held_time" value="{{date('H:i:s', strtotime($data->held_date))}}" required>
               </div>
            </div>
         </div>
         <div class="block-element m-t-30">
            <div class="row ">
               <div class="col-md-3 col-lg-3 col-12">
                  <div class="field-name">
                     <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon19.png">
                     <h5> Availability </h5>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-12">
                  <div class="inline-1">
                     <label class="custom-control custom-radio">
                     <input id="radio1" name="availability" type="radio" value="1" class="custom-control-input" {{$data->availability == '1' ? 'checked' : ''}}>
                     <span class="custom-control-label"> Only Zoom Classes </span>
                     </label>
                     <label class="custom-control custom-radio">
                     <input id="radio2" name="availability" type="radio" value="2" class="custom-control-input" {{$data->availability == '2' ? 'checked' : ''}}>
                     <span class="custom-control-label"> Only Normal Classes </span>
                     </label>
                     <label class="custom-control custom-radio">
                     <input id="radio2" name="availability" type="radio" value="3" class="custom-control-input" {{$data->availability == '3' ? 'checked' : ''}}>
                     <span class="custom-control-label"> Both </span>
                     </label>
                  </div>
               </div>
            </div>
         </div>
         <div class="block-element m-t-30">
             <div class="row ">
                <div class="col-md-3 col-lg-3 col-12">
                   <div class="field-name">
                      <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon19.png">
                      <h5> Availability For </h5>
                   </div>
                </div>
                <div class="col-md-6 col-lg-6 col-12">
                   <div class="inline-1">
                 
                  
                      <label class="custom-control custom-checkbox">
                      <input id="radio2" name="availability_for[]" type="checkbox" value="1" class="custom-control-input"  >
                      <span class="custom-control-label"> Senior Citizens </span>
                      </label>
                      <br>
                      <label class="custom-control custom-checkbox">
                      <input id="radio1" name="availability_for[]" type="checkbox" value="2" class="custom-control-input" >
                      <span class="custom-control-label"> Teenagers </span>
                      </label>
                      <br>
                      <label class="custom-control custom-checkbox">
                      <input id="radio2" name="availability_for[]" type="checkbox" value="3" class="custom-control-input" >
                      <span class="custom-control-label"> handicapped </span>
                      </label>
                      
                   </div>
                 
                </div>
             </div>
          </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
            </div>
            <div class="col-md-6 col-lg-6 col-12 m-t-40">
               <button class="submit-btn1"> <i class="fa fa-plus"> </i> UPDATE </button>
            </div>
         </div>
      </form>
   </div>
</div>

@endsection
@section('addStyle')

   <link rel="stylesheet" href="{{URL::to('/')}}/assets/user_dashboard/plugins/dropify/dist/css/dropify.min.css">
   <link href="{{URL::to('/')}}/assets/user_dashboard/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
   <link href="{{URL::to('/')}}/assets/user_dashboard/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
   <link href="{{URL::to('/')}}/assets/user_dashboard/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
   <link href="{{URL::to('/')}}/assets/user_dashboard/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('addScript')
   <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
   <script type="text/javascript" src="{{URL::to('/')}}/assets/user_dashboard/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
   <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/dropify/dist/js/dropify.min.js"></script>
   <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>

<script type="text/javascript">
   jQuery(document).ready(function() {
        getLocation();
       $("input[name='tch3']").TouchSpin();
       $('.dropify').dropify();
       $(".select2").select2();

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

@endsection
