@extends('buddy.include.master')
@section('title', 'Create your Activity')

@section('content')

<div class="box-wrapper1">
   <div class="block-element m-b-25">
      <div class="sec-head1">
         <h3> Create your Activity </h3>
      </div>
   </div>
   <div class="block-element">
      <form method="post" enctype="multipart/form-data">
         @csrf
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon1.png">
                  <h5> Title </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <input type="text" placeholder="Enter Title" class="form-field1" name="title" required>
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
               <textarea class="form-field1" name="description" required></textarea>
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
               <select class="select2 select2-multiple" style="width: 100%" name="equipments[]" multiple="multiple" data-placeholder="Enter Equipment">
                  @foreach($equip as $val)
                     <option value="{{$val->id}}">{{$val->name}}</option>
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
                  <input id="radio1" name="participants" type="radio" value="0" class="custom-control-input" checked>
                  <span class="custom-control-label"> Single Activity </span>
                  </label>
                  <label class="custom-control custom-radio">
                  <input id="radio2" name="participants" type="radio" value="1" class="custom-control-input">
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
                  <input id="radio1" name="activityType" type="radio" value="1" class="custom-control-input" checked>
                  <span class="custom-control-label"> Public </span>
                  </label>
                  <label class="custom-control custom-radio">
                  <input id="radio2" name="activityType" type="radio" value="2" class="custom-control-input">
                  <span class="custom-control-label"> Private </span>
                  </label>
               </div>
            </div>
         </div>
         <div id="friend_participant">
            <div class="row center-row">
               <div class="col-md-3 col-lg-3 col-12">
                  <div class="field-name">
                     <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon10.png">
                     <h5> Friend Participant </h5>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-12">
                  <select name="friend" id="friend" class="form-field1">
                      <option value="">Select</option>
                       @foreach ($users as $val)
                           <option value="{{$val->friend->id}}">{{$val->friend->fname .' '. $val->friend->lname}}</option>
                       @endforeach
                  </select>
               </div>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon10.png">
                  <h5> Skill Level </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <div class="inline-1">
                   <label class="custom-control custom-checkbox">
                      <input name="skill_level[]" type="checkbox" value="Beginner" class="custom-control-input" checked>
                      <span class="custom-control-label"> Beginner </span>
                   </label>

                   <label class="custom-control custom-checkbox">
                      <input name="skill_level[]" type="checkbox" value="Intermediate" class="custom-control-input" >
                      <span class="custom-control-label"> Intermediate </span>
                   </label>

                   <label class="custom-control custom-checkbox">
                      <input name="skill_level[]" type="checkbox" value="Advanced" class="custom-control-input">
                      <span class="custom-control-label"> Advanced </span>
                   </label>
                </div>
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
               <select name="sports" class="form-field1" required>
                   <option value="" disabled selected>Select</option>
                   @php $checkSports = array(); @endphp
                   @if(count($userSports) > 0)
                      <optgroup label="Favourite Sports">
                          @foreach ($userSports as $val)
                              <option value="{{$val->cat_id}}">{{$val->sports->name}}</option>
                              @php array_push($checkSports, $val->cat_id); @endphp
                          @endforeach
                       </optgroup>
                    @endif
                    <optgroup label="All Sports">
                       @foreach ($sports as $val)
                           @if(!in_array($val->id, $checkSports))
                              <option value="{{$val->id}}">{{$val->name}}</option>
                           @endif
                       @endforeach
                    </optgroup>
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
               <div class="location-field">
                  <input type="text" placeholder="Location" class="form-field1" data-row="0" id="location_field_0" name="location[]" required>
                  <input type="hidden" name="lat[]" id="lat_0">
                  <input type="hidden" name="lng[]" id="lng_0">
               </div>
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
                  <input id="radio1" name="locationType" type="radio" value="1" class="custom-control-input" checked>
                  <span class="custom-control-label"> Yes </span>
                  </label>
                  <label class="custom-control custom-radio">
                  <input id="radio2" name="locationType" type="radio" value="0" class="custom-control-input">
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
               <input type="file" name="cover_image" class="form-field1" accept="image/png, image/jpeg, image/jpg" required>
               <span class="info-tag1"> Allowed File types are jpg, jpeg, png. </span>
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
                  <input type="file" id="input-file-max-fs" name="media[]" class="dropify" data-max-file-size="1024M" data-height="100" multiple />
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
                  <input type="date" placeholder="" class="form-field1" name="held_date" required>
               </div>
            </div>
            <div class="col-md-3 col-lg-3 col-12">
               <div class="pic-uploader1">
                  <input type="text" id="picker3" placeholder="" class="form-field1" name="held_time" value="{{date('H:i')}}" readonly required>
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
                     <input id="radio1" name="availability" type="radio" value="1" class="custom-control-input">
                     <span class="custom-control-label"> Only Online Activity </span>
                     </label>
                     <label class="custom-control custom-radio">
                     <input id="radio2" name="availability" type="radio" value="2" class="custom-control-input">
                     <span class="custom-control-label"> Only Normal Activity </span>
                     </label>
                     <label class="custom-control custom-radio">
                     <input id="radio2" name="availability" type="radio" value="3" class="custom-control-input" checked>
                     <span class="custom-control-label"> Both </span>
                     </label>
                  </div>
               </div>
            </div>
         </div>
         <div class="block-element m-t-30">
             <div class="row">
                <div class="col-md-3 col-lg-3 col-12">
                   <div class="field-name">
                      <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon19.png">
                      <h5> Availability For </h5>
                   </div>
                </div> 
                <div class="col-md-6 col-lg-6 col-12">
                   <div class="inline-1">
                    <label class="custom-control custom-checkbox">
                      <input id="radio2" name="availability_for[]" type="checkbox" value=2 class="custom-control-input" >
                      <span class="custom-control-label"> Senior Citizens </span>
                      </label>
                      <br>
                      <label class="custom-control custom-checkbox">
                      <input id="radio1" name="availability_for[]" type="checkbox" value=1 class="custom-control-input" >
                      <span class="custom-control-label"> Teenagers </span>
                      </label>
                      <br>
                      <label class="custom-control custom-checkbox">
                      <input id="radio2" name="availability_for[]" type="checkbox" value=3 class="custom-control-input" >
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
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@v1.0.2-rc2/mdtimepicker.min.css">
@endsection
@section('addScript')
   <script src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@v1.0.2-rc2/mdtimepicker.min.js"></script>
   <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
   <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
   <script type="text/javascript" src="{{URL::to('/')}}/assets/user_dashboard/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
   <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/dropify/dist/js/dropify.min.js"></script>
   <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
   <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>
<script type="text/javascript">

   $(document).ready(function(){
      'use strict'

      $('#picker3').mdtimepicker({ is24hour: true });
   });

   CKEDITOR.replace( 'description' );
   $("form").submit( function(e) {
        var description = CKEDITOR.instances['description'].getData().replace(/<[^>]*>/gi, '').length;
        if( !description ) {
            alert( 'Please fill all required fields.' );
            e.preventDefault();
        }
    });
   var r = 0;
   jQuery(document).ready(function() {


       $("input[name='tch3']").TouchSpin();
       $('.dropify').dropify();
       $(".select2").select2();
       CKEDITOR.addCss('.cke_editable { background-color: #1d242c; color: white }');

       initialize('location_field_0');

       $(document).on('click', '.addLocationBlock', function(){
           r++;
           var data = '<div class="location-field m-t-10"><input type="text" placeholder="Location" class="form-field1" name="location[]" id="location_field_'+r+'" data-row="'+r+'" required><input type="hidden" name="lat[]" id="lat_'+r+'"><input type="hidden" name="lng[]" id="lng_'+r+'"><a href="javascript:void(0)" class="closeLocation"><i class="fa fa-minus"></i></a></div>';
           $('#location_block').append(data);
           initialize('location_field_'+r);
       });

       $(document).on('click', '.closeLocation', function(){
            $(this).parent().remove();
       });

      $('input[type=radio][name=activityType]').change(function() {
         if (this.value == '2') {
            $('#friend_participant').show();
         }
         else if (this.value == '1') {
            $('#friend_participant').hide();
         }
      });
   });


   function initialize(field) {
      var input = document.getElementById(field);
      var row = input.getAttribute("data-row");

      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();

            $('#lat_'+row).val(place.geometry['location'].lat());
            $('#lng_'+row).val(place.geometry['location'].lng());

      });
   }
</script>
@endsection
