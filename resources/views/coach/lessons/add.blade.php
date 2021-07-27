@extends('coach.include.master')
@section('title', 'Create your Lessons')

@section('content')

<div class="box-wrapper1">
   <form method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
         <div class="col-md-7 col-lg-7 col-12 col-sm-12">
            <div class="block-element m-b-25">
               <div class="sec-head1">
                  <h3> Create your Lesson </h3>
               </div>
            </div>
            <div class="block-element">
               <div class="row center-row">
                  <div class="col-md-4 col-lg-4 col-12">
                     <div class="field-name">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon1.png">
                        <h5> Title </h5>
                     </div>
                  </div>
                  <div class="col-md-8 col-lg-8 col-12">
                     <input type="text" placeholder="" class="form-field1" name="title" required>
                  </div>
               </div>
               <div class="row m-b-20">
                  <div class="col-md-4 col-lg-4 col-12">
                     <div class="field-name">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon6.png">
                        <h5> Description </h5>
                     </div>
                  </div>
                  <div class="col-md-8 col-lg-8 col-12">
                     <textarea class="form-field1" name="description" required></textarea>
                  </div>
               </div>
               <div class="row center-row">
                  <div class="col-md-4 col-lg-4 col-12">
                     <div class="field-name">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon7.png">
                        <h5> Equipment </h5>
                     </div>
                  </div>
                  <div class="col-md-8 col-lg-8 col-12">
                     <select class="select2 select2-multiple" style="width: 100%" name="equipments[]" multiple="multiple" data-placeholder="">
                        @foreach($equip as $val)
                           <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    </select>
                  </div>
               </div>
               <div class="row center-row">
                  <div class="col-md-4 col-lg-4 col-12">
                     <div class="field-name">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon3.png">
                        <h5> Location of the Lesson </h5>
                     </div>
                  </div>
                  <div class="col-md-8 col-lg-8 col-12" id="location_block">
                     <div class="location-field">
                        <input type="text" placeholder="Location" class="form-field1" name="location[]" required>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4 col-lg-4 col-12"></div>
                  <div class="col-md-8 col-lg-8 col-12">
                     <div class="m-b-10">
                        <button type="button" class="submit-btn5 addLocationBlock"> <i class="fa fa-plus"> </i> ADD </button>
                     </div>
                  </div>
               </div>
               <div class="row m-b-20">
                  <div class="col-md-4 col-lg-4 col-12 p-t-10">
                     <div class="field-name">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon3.png">
                        <h5> Covered </h5>
                     </div>
                  </div>
                  <div class="col-md-8 col-lg-8 col-12">
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
                  <div class="col-md-4 col-lg-4 col-12">
                     <div class="field-name">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon10.png">
                        <h5> Skill Level </h5>
                     </div>
                  </div>
                  <div class="col-md-8 col-lg-8 col-12">
                     <select class="form-field1" name="skill_level" required>
                        <option> Beginner  </option>
                        <option> Intermediate  </option>
                        <option> Advanced  </option>
                     </select>
                  </div>
               </div>
               <div class="row center-row">
                  <div class="col-md-4 col-lg-4 col-12">
                     <div class="field-name">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon8.png">
                        <h5> Participants </h5>
                     </div>
                  </div>
                  <div class="col-md-8 col-lg-8 col-12">
                     <div class="inline-1">
                        <label class="custom-control custom-radio">
                        <input id="radio1" name="participants" type="radio" value="0" class="custom-control-input" checked>
                        <span class="custom-control-label"> Single Lesson </span>
                        </label>
                        <label class="custom-control custom-radio">
                        <input id="radio2" name="participants" type="radio" value="1" class="custom-control-input">
                        <span class="custom-control-label"> Group Lesson </span>
                        </label>
                     </div>
                     <div class="inc-dec inline-1 increment-holder1" id="participants_block">
                         
                     </div>
                  </div>
               </div>
               <div class="row center-row">
                  <div class="col-md-4 col-lg-4 col-12">
                     <div class="field-name">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/add-pic-icon.png">
                        <h5> Cover Picture </h5>
                     </div>
                  </div>
                  <div class="col-md-8 col-lg-8 col-12">
                     <input type="file" name="cover_image" class="form-field1" accept="image/png, image/jpeg, image/jpg" required>
                     <span class="info-tag1"> Allowed File types are jpg, jpeg, png </span>
                  </div>
               </div>
               <div class="row center-row">
                  <div class="col-md-4 col-lg-4 col-12">
                     <div class="field-name">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon12.png">
                        <h5> Media </h5>
                     </div>
                  </div>
                  <div class="col-md-8 col-lg-8 col-12">
                     <div class="pic-uploader1">
                        <input type="file" id="input-file-max-fs" class="dropify" data-max-file-size="5M" data-height="80"/>
                     </div>
                  </div>
               </div>
               <div class="row center-row">
                  <div class="col-md-4 col-lg-4 col-12">
                  </div>
                  <div class="col-md-8 col-lg-8 col-12">
                     <button class="submit-btn1"> <i class="fa fa-plus"> </i> UPDATE </button>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-5 col-lg-5 col-12 col-sm-12">
            <div class="block-element m-b-25">
               <div class="sec-head1">
                  <h3> <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon12.png"> Packages </h3>
               </div>
            </div>
            <div class="packages-table equip-table">
               <table>
                  <thead>
                     <tr>
                        <th> BASIC </th>
                        <th> STANDARD </th>
                        <th> PREMIUM </th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td> 
                           <input class="table-field1" type="number" placeholder="Price" name="price_basic" required>
                        </td>
                        <td> 
                           <input class="table-field1" type="number" placeholder="Price" name="price_standard" required> 
                        </td>
                        <td> 
                           <input class="table-field1" type="number" placeholder="Price" name="price_premium" required> 
                        </td>
                     </tr>
                     <tr>
                        <td>  <textarea class="table-field1" placeholder="Service" name="service_basic[]" required></textarea>
                        </td>
                        <td> <textarea class="table-field1" placeholder="Service" name="service_standard[]" required></textarea>
                        </td>
                        <td> <textarea class="table-field1" placeholder="Service" name="service_premium[]" required></textarea>
                        </td>
                     </tr>
                     <tr id="package_block">
                        <td colspan="3" class="text-left p-l-10"> <a href="javascript:void(0)" class="submit-btn1 addServicePackage"> <i class="fa fa-plus"> </i> ADD </a> </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="block-element m-t-30">
               <div class="row ">
                  <div class="col-md-4 col-lg-4 col-12">
                     <div class="field-name">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon19.png">
                        <h5> Availability </h5>
                     </div>
                  </div>
                  <div class="col-md-8 col-lg-8 col-12">
                     <div class="inline-1">
                        <label class="custom-control custom-radio">
                        <input id="radio1" name="availability" type="radio" value="1" class="custom-control-input">
                        <span class="custom-control-label"> Only Zoom Classes </span>
                        </label>
                        <label class="custom-control custom-radio">
                        <input id="radio2" name="availability" type="radio" value="2" class="custom-control-input">
                        <span class="custom-control-label"> Only Normal Classes </span>
                        </label>
                        <label class="custom-control custom-radio">
                        <input id="radio2" name="availability" type="radio" value="3" class="custom-control-input" checked>
                        <span class="custom-control-label"> Both </span>
                        </label>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>
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

       $("input[name='tch3']").TouchSpin();
       $('.dropify').dropify();
       $(".select2").select2();

   });
</script>

@endsection