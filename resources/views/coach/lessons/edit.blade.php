@extends('coach.include.master')
@section('title', 'Edit your Lessons')

@section('content')

<div class="box-wrapper1">
   <form method="post" action="{{route('coach.lesson.update')}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="lid" value="{{base64_encode($data->id)}}">
      <div class="row">
         <div class="col-md-7 col-lg-7 col-12 col-sm-12">
            <div class="block-element m-b-25">
               <div class="sec-head1">
                  <h3> Edit your Lesson </h3>
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
                     <input type="text" placeholder="" class="form-field1" name="title" value="{{$data->title}}" required>
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
                     <textarea class="form-field1" name="description" required>{{$data->description}}</textarea>
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
                  <div class="col-md-4 col-lg-4 col-12">
                     <div class="field-name">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon3.png">
                        <h5> Location of the Lesson </h5>
                     </div>
                  </div>
                  <div class="col-md-8 col-lg-8 col-12" id="location_block">
                        @if (count($data->locations)>0)
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
                        @else
                        <div class="location-field">
                            <input type="text" placeholder="Location" class="form-field1" data-row="0" id="location_field_0" name="location[]" required>
                        </div>
                            <input type="hidden" name="lat[]" id="lat_0">
                            <input type="hidden" name="lng[]" id="lng_0">
                        @endif
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
                        <input id="radio1" name="locationType" type="radio" value="1" class="custom-control-input" {{$data->location_covered == '1' ? 'checked' : ''}}>
                        <span class="custom-control-label"> Yes </span>
                        </label>
                        <label class="custom-control custom-radio">
                        <input id="radio2" name="locationType" type="radio" value="0" class="custom-control-input" {{$data->location_covered == '0' ? 'checked' : ''}}>
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
                     <div class="inline-1">
                         <label class="custom-control custom-checkbox">
                            <input name="skill_level[]" type="checkbox" value="Beginner" class="custom-control-input"
                              @foreach($data->skills as $val)
                                 {{$val->skills == 'Beginner' ? 'checked' : ''}}
                              @endforeach
                            >
                            <span class="custom-control-label"> Beginner </span>
                         </label>

                         <label class="custom-control custom-checkbox">
                            <input name="skill_level[]" type="checkbox" value="Intermediate" class="custom-control-input"
                              @foreach($data->skills as $val)
                                 {{$val->skills == 'Intermediate' ? 'checked' : ''}}
                              @endforeach
                            >
                            <span class="custom-control-label"> Intermediate </span>
                         </label>

                         <label class="custom-control custom-checkbox">
                            <input name="skill_level[]" type="checkbox" value="Advanced" class="custom-control-input"
                              @foreach($data->skills as $val)
                                 {{$val->skills == 'Advanced' ? 'checked' : ''}}
                              @endforeach
                            >
                            <span class="custom-control-label"> Advanced </span>
                         </label>
                      </div>
                  </div>
               </div>
               <div class="row center-row">
                  <div class="col-md-4 col-lg-4 col-12">
                     <div class="field-name">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon9.png">
                        <h5> Category </h5>
                     </div>
                  </div>
                  <div class="col-md-8 col-lg-8 col-12">
                     <select class="form-field1" name="category" id="category_field" required>
                        <option value="">Select</option>
                        @foreach ($categories as $val)
                           <option value="{{$val->id}}"
                              {{$data->category_id == $val->id ? 'selected' : ''}}
                           >{{$val->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="row center-row">
                  <div class="col-md-4 col-lg-4 col-12">
                     <div class="field-name">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon9.png">
                        <h5> Sports </h5>
                     </div>
                  </div>
                  <div class="col-md-8 col-lg-8 col-12">
                     <select class="form-field1" name="sports" id="sports_id" required>
                        <option value="{{$data->sports_id}}">{{@$data->sports->name}}</option>
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
                        <input id="radio1" name="participants" type="radio" value="0" class="custom-control-input" {{$data->participants == '0' ? 'checked' : ''}}>
                        <span class="custom-control-label"> Single Lesson </span>
                        </label>
                        <label class="custom-control custom-radio">
                        <input id="radio2" name="participants" type="radio" value="1" class="custom-control-input" {{$data->participants == '1' ? 'checked' : ''}}>
                        <span class="custom-control-label"> Group Lesson </span>
                        </label>
                     </div>
                     <div class="inc-dec inline-1 increment-holder1" id="participants_block">
                        @if($data->participants == '1')
                           <input type="text" value="{{$data->group_members}}" name="group_members" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" readonly required>
                        @endif
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
                     <input type="file" name="cover_image" class="form-field1" accept="image/png, image/jpeg, image/jpg">
                     <span class="info-tag1"> Allowed File types are jpg, jpeg, png </span>
                     <br>
                     <img src="{{URL::to('/public/storage/user/lessons/main_image/'.$data->cover_img)}}" width="100px">
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
                        <input type="file" id="input-file-max-fs" class="dropify" name="media[]" data-max-file-size="1024M" data-height="80" multiple />
                     </div>
                  </div>
               </div>

               <div class="row"> 
                  @foreach($data->medias as $val)
                     @php $cont = explode('.', $val->media); @endphp
                     @if($cont[1] == 'mp4')
                        <div class="col-md-3">
                           <a href="{{route('coach.lesson.deleteMedia', base64_encode($val->id))}}" class="btn btn-sm btn-danger">Remove</a>
                           <video style="height:150px; width: 100%;" controls>
                              <source src="{{URL::to('/public/storage/user/lessons/media/'.$val->id.'-'.$val->media)}}" type="video/mp4">
                             Your browser does not support the video element.
                           </video>
                           <br>
                        </div>
                     @else
                        <div class="col-md-3">
                           <a href="{{route('coach.lesson.deleteMedia', base64_encode($val->id))}}" class="btn btn-sm btn-danger">Remove</a>
                           <img src="{{URL::to('/public/storage/user/lessons/media/'.$val->id.'-'.$val->media)}}" height="150px" width="100%">
                           <br>
                        </div>
                     @endif
                  @endforeach
               </div>
               <br>
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
                            <input class="table-field1" type="number" placeholder="Duration in min" name="duartion_basic" value="{{@$data->packages[0]->duration}}" required>
                            <input class="table-field1 mt-2" type="number" placeholder="Days" name="day_basic" value="{{@$data->packages[0]->days}}" required>
                           <input class="table-field1 mt-2" type="number" placeholder="Price" name="price_basic" value="{{@$data->packages[0]->price}}" required>
                        </td>
                        <td>
                            <input class="table-field1" type="number" placeholder="Duration in min" name="duartion_standard" value="{{@$data->packages[1]->duration}}" required>
                             <input class="table-field1 mt-2" type="number" placeholder="Days" name="day_standard" value="{{@$data->packages[1]->days}}" required>
                           <input class="table-field1 mt-2" type="number" placeholder="Price" name="price_standard" value="{{@$data->packages[1]->price}}" required>
                        </td>
                        <td>
                            <input class="table-field1" type="number" placeholder="Duration in min" name="duartion_premium" value="{{@$data->packages[2]->duration}}" required>
                            <input class="table-field1 mt-2" type="number" placeholder="Days" name="day_premium" value="{{@$data->packages[2]->days}}" required>
                           <input class="table-field1 mt-2" type="number" placeholder="Price" name="price_premium" value="{{@$data->packages[2]->price}}" required>
                        </td>
                     </tr>
                     @if(!empty(@$data->packages[0]->details) || !empty(@$data->packages[1]->details) || !empty(@$data->packages[2]->details) )
                        @for($x=0; $x<10; $x++)
                            @if((count(@$data->packages[0]->details) > $x) || (count(@$data->packages[1]->details) > $x) || (count(@$data->packages[2]->details) > $x))
                            <tr>
                                <td>  <textarea class="table-field1" placeholder="Service" name="service_basic[]">{{empty(@$data->packages[0]->details[$x]) ? '' : @$data->packages[0]->details[$x]->service}}</textarea>
                                </td>
                                <td> <textarea class="table-field1" placeholder="Service" name="service_standard[]">{{empty(@$data->packages[1]->details[$x]) ? '' : @$data->packages[1]->details[$x]->service}}</textarea>
                                </td>
                                <td> <textarea class="table-field1" placeholder="Service" name="service_premium[]">{{empty(@$data->packages[2]->details[$x]) ? '' : @$data->packages[2]->details[$x]->service}}</textarea>
                                </td>
                            </tr>
                            @endif
                        @endfor
                     @else
                     <tr>
                        <td>  <textarea class="table-field1" placeholder="Service" name="service_basic[]"></textarea>
                        </td>
                        <td> <textarea class="table-field1" placeholder="Service" name="service_standard[]"></textarea>
                        </td>
                        <td> <textarea class="table-field1" placeholder="Service" name="service_premium[]"></textarea>
                        </td>
                    </tr>
                     @endif
                     <tr id="package_block">
                        <td colspan="3" class="text-left p-l-10"> <a href="javascript:void(0)" class="submit-btn1 addServicePackage"> <i class="fa fa-plus"> </i> ADD </a> </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="block-element m-t-30" id="dateTimeBlock" {{$data->participants == '1' ? 'style=display:block !important;' : ''}}>
               <div class="row ">
                  <div class="col-md-4 col-lg-4 col-12">
                     <div class="field-name">
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon19.png">
                        <h5> DateTime </h5>
                     </div>
                  </div>
                  <div class="col-md-5 col-lg-5 col-12">
                     <div class="inline-1">
                        <input type="date" placeholder="" class="form-field1" name="held_date" value="{{date('Y-m-d', strtotime($data->held_date))}}" >
                     </div>
                  </div>
                  <div class="col-md-3 col-lg-3 col-12">
                     <div class="inline-1">
                        <input type="time" placeholder="" class="form-field1" name="held_time" value="{{date('H:i:s', strtotime($data->held_date))}}" >
                     </div>
                  </div>
               </div>
            </div>
            <br>
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
                   <div class="col-md-4 col-lg-4 col-12">
                      <div class="field-name">
                         <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon19.png">
                         <h5> Availability For </h5>
                      </div>
                   </div>
                   <div class="col-md-8 col-lg-8 col-12">
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
       $("input[name='group_members']").TouchSpin();
       $('.dropify').dropify();
       $(".select2").select2();

       CKEDITOR.addCss('.cke_editable { background-color: #1d242c; color: white }');
   
      @foreach($data->locations as $key => $val)
         initialize('location_field_{{$key}}');
      @endforeach
       $(document).on('click', '.addLocationBlock', function(){
           r++;
           var data = '<br><div class="location-field"><input type="text" placeholder="Location" class="form-field1" name="location[]" id="location_field_'+r+'" data-row="'+r+'" required><input type="hidden" name="lat[]" id="lat_'+r+'"><input type="hidden" name="lng[]" id="lng_'+r+'"><a href="javascript:void(0)" class="closeLocation"><i class="fa fa-minus"></i></a></div>';
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
