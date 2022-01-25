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
               <input type="text" placeholder="Enter Title" class="form-field1" name="title" value="{{$data->title}}" required>
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
               <select class="select2 select2-multiple" style="width: 100%" name="equipments[]" multiple="multiple" data-placeholder="Enter Equipment" required>
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

                  <div class="location-field m-t-10">
                     <input type="text" placeholder="Location" class="form-field1" data-row="{{$key}}" id="location_field_{{$key}}" value="{{$val->address}}" name="location[]" required>

                     <input type="hidden" name="lat[]" id="lat_{{$key}}" value="{{$val->lat}}">
                     <input type="hidden" name="lng[]" id="lng_{{$key}}" value="{{$val->lng}}">
                     @if($key > 0)
                        <a href="javascript:void(0)" class="closeLocation"><i class="fa fa-minus"></i></a>
                     @endif
                  </div>
               @endforeach
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
                  <input type="file" id="input-file-max-fs" name="media[]" class="dropify" data-max-file-size="1024M" data-height="100" multiple/>
               </div>
            </div>
         </div>
         <div class="row"> 
            @foreach($data->medias as $val)
               @php $cont = explode('.', $val->media); @endphp
               @if($cont[1] == 'mp4')
                  <div class="col-md-2">
                     <a href="{{route('buddy.activity.deleteMedia', base64_encode($val->id))}}" class="btn btn-sm btn-danger">Remove</a>
                     <video style="height:150px; width: 100%;" controls>
                        <source src="{{URL::to('/public/storage/user/activity/media/'.$val->id.'-'.$val->media)}}" type="video/mp4">
                       Your browser does not support the video element.
                     </video>
                     <br>
                  </div>
               @else
                  <div class="col-md-2">
                     <a href="{{route('buddy.activity.deleteMedia', base64_encode($val->id))}}" class="btn btn-sm btn-danger">Remove</a>
                     <img src="{{URL::to('/public/storage/user/activity/media/'.$val->id.'-'.$val->media)}}" height="150px" width="100%">
                     <br>
                  </div>
               @endif
            @endforeach
         </div>
         <br>
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
                     <span class="custom-control-label"> Only Zoom Activity </span>
                     </label>
                     <label class="custom-control custom-radio">
                     <input id="radio2" name="availability" type="radio" value="2" class="custom-control-input" {{$data->availability == '2' ? 'checked' : ''}}>
                     <span class="custom-control-label"> Only Normal Activity </span>
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

                     

                      <input id="radio2" name="availability_for[]" type="checkbox" value="1" class="custom-control-input"
                        @php $availability_for = json_decode($data->availability_for); @endphp
                        @if(!empty($availability_for))
                           @foreach($availability_for as $value)
                              @if($value == '1')
                                 checked
                              @endif
                           @endforeach
                        @endif
                      >

                      <span class="custom-control-label"> Senior Citizens </span>
                      </label>
                      <br>



                      <label class="custom-control custom-checkbox">

                     

                      <input id="radio1" name="availability_for[]" type="checkbox" value="2" class="custom-control-input"
                        @php $availability_for = json_decode($data->availability_for); @endphp
                        @if(!empty($availability_for))
                           @foreach($availability_for as $value)
                              @if($value == '2')
                                 checked
                              @endif
                           @endforeach
                        @endif
                      >

                      <span class="custom-control-label"> Teenagers </span>
                      </label>
                      <br>


                      <label class="custom-control custom-checkbox">

                      <input id="radio2" name="availability_for[]" type="checkbox" value="3" class="custom-control-input"
                        @php $availability_for = json_decode($data->availability_for); @endphp
                        @if(!empty($availability_for))
                           @foreach($availability_for as $value)
                              @if($value == '3')
                                 checked
                              @endif
                           @endforeach
                        @endif
                      >

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
   <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
   <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
   <script type="text/javascript" src="{{URL::to('/')}}/assets/user_dashboard/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
   <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/dropify/dist/js/dropify.min.js"></script>
   <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>

<script type="text/javascript">

   CKEDITOR.replace( 'description' );
    $("form").submit( function(e) {
        var description = CKEDITOR.instances['description'].getData().replace(/<[^>]*>/gi, '').length;
        if( !description ) {
            alert( 'Please fill all required fields.' );
            e.preventDefault();
        }
    });
   var r = {{count($data->locations)}};
   jQuery(document).ready(function() {
       $("input[name='tch3']").TouchSpin();
       $('.dropify').dropify();
       $(".select2").select2();

       CKEDITOR.addCss('.cke_editable { background-color: #1d242c; color: white }');

       @foreach($data->locations as $key => $val)
         initialize('location_field_{{$key}}');
       @endforeach
       $(document).on('click', '.addLocationBlock', function(){
           r++;
           var data = '<br><div class="location-field"><input type="text" placeholder="Location" class="form-field1" name="location[]" id="location_field_'+r+'" data-row="'+r+'" required><input type="hidden" name="lat[]" id="lat_'+r+'"><input type="hidden" name="lng[]" id="lng_'+r+'"></div>';
           $('#location_block').append(data);
           initialize('location_field_'+r);
       });

       $(document).on('click', '.closeLocation', function(){
            $(this).parent().remove();
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
