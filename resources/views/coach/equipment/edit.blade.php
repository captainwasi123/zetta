@extends('coach.include.master')
@section('title', 'Edit Equipment')

@section('content')

<div class="box-wrapper1">
   <div class="block-element m-b-25">
      <div class="sec-head1">
         <h3> Edit Equipments </h3>
      </div>
   </div>
   <div class="block-element">
      <form method="post" enctype="multipart/form-data" action="{{route('coach.equipment.update')}}">
         @csrf
         <input type="hidden" name="eid" value="{{base64_encode($data->id)}}">
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon1.png">
                  <h5> Name </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <input type="text" placeholder="" class="form-field1" value="{{$data->name}}" name="name" required>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/field-icon9.png">
                  <h5> Sports </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12 ">
               <div class="inc-dec">
                  <select name="sports" class="form-field1" id="sports_id" required>
                     <option value="" disabled selected>Select</option>
                      @php $checkSports = array(); @endphp
                      @if(count($userSports) > 0)
                         <optgroup label="Favourite Sports">
                             @foreach ($userSports as $val)
                                 <option value="{{$val->cat_id}}" {{$data->sports_id == $val->cat_id ? 'selected' : ''}}>{{$val->sports->name}}</option>
                                 @php array_push($checkSports, $val->cat_id); @endphp
                             @endforeach
                          </optgroup>
                       @endif
                       <optgroup label="All Sports">
                          @foreach ($sports as $val)
                              @if(!in_array($val->id, $checkSports))
                                 <option value="{{$val->id}}" {{$data->sports_id == $val->id ? 'selected' : ''}}>{{$val->name}}</option>
                              @endif
                          @endforeach
                       </optgroup>
                  </select> 
               </div>
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
                  <input id="tch3" type="text" value="{{$data->qty}}" name="qty" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" required> 
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
                  <input id="radio1" name="package" type="radio" value="0" class="custom-control-input" {{$data->package == '0' ? 'checked' : ''}}>
                  <span class="custom-control-label">Free</span>
                  </label>
                  <label class="custom-control custom-radio">
                  <input id="radio2" name="package" type="radio" value="1" class="custom-control-input" {{$data->package == '1' ? 'checked' : ''}}>
                  <span class="custom-control-label">Paid</span>
                  </label>
               </div>
            </div>
         </div>
         <div class="row center-row" id="price_block">
            @if($data->package == '1')
               <div class="col-md-3 col-lg-3 col-12">
                  <div class="field-name">
                     <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon4.png">
                     <h5> Price </h5>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-12">
                  <input type="number" step="any" class="form-field1" value="{{$data->price}}" name="price" style="width: 150px;" required>
               </div>
            @endif
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
                  <input type="file" id="input-file-max-fs" name="main_image" class="dropify" data-max-file-size="5M" data-height="80" />
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-3 col-lg-3 col-12">
            </div>
            <div class="col-md-3">
               <img src="{{URL::to('/public/user/equipment/'.$data->image)}}" width="250">
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <br>
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