@extends('coach.include.master')
@section('title', 'Add Equipment')

@section('content')

<div class="box-wrapper1">
   <div class="block-element m-b-25">
      <div class="sec-head1">
         <h3> Add Equipments </h3>
      </div>
   </div>
   <div class="block-element">
      <form method="post" enctype="multipart/form-data">
         @csrf
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon1.png">
                  <h5> Name </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <input type="text" placeholder="" class="form-field1" name="name" required>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon2.png">
                  <h5> No of Equipment </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12 ">
               <div class="inc-dec">
                  <input id="tch3" type="text" value="1" name="qty" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" required> 
               </div>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon3.png">
                  <h5> Package </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <div>
                  <label class="custom-control custom-radio">
                  <input id="radio1" name="package" type="radio" value="0" class="custom-control-input" checked>
                  <span class="custom-control-label">Free</span>
                  </label>
                  <label class="custom-control custom-radio">
                  <input id="radio2" name="package" type="radio" value="1" class="custom-control-input">
                  <span class="custom-control-label">Paid</span>
                  </label>
               </div>
            </div>
         </div>
         <div class="row center-row" id="price_block">
            
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/add-pic-icon.png">
                  <h5> Add Picture </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <div class="pic-uploader1">
                  <input type="file" id="input-file-max-fs" name="main_image" class="dropify" data-max-file-size="5M" data-height="80" required />
               </div>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
            </div>
            <div class="col-md-6 col-lg-6 col-12">
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

@endsection
@section('addScript')
      <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
      <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/dropify/dist/js/dropify.min.js"></script>
      <script type="text/javascript">
         jQuery(document).ready(function() {

            $("input[name='qty']").TouchSpin();
         });
         $(document).ready(function() {
             // Basic
             $('.dropify').dropify();
         });

         $(document).on('change', 'input[type=radio][name=package]', function() {
            if (this.value == '0') {
               $('#price_block').html('');
            }
            else if (this.value == '1') {
               $('#price_block').html('<div class="col-md-3 col-lg-3 col-12"><div class="field-name"><img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon4.png"><h5> Price </h5></div></div><div class="col-md-6 col-lg-6 col-12"><input type="number" step="any" class="form-field1" name="price" style="width: 150px;" required></div>');
            }
         });
      </script>
@endsection