@extends('buddy.include.master')
@section('title', 'Order Details')
@section('addStyle')
<style>
    #mapa {
        height: 200px;
    }
    #map > div{
        height: 200px!important;
        width: 100%!important;
        position: relative!important;
        top: auto!important;
        right: 0px!important;
    }
</style>
@endsection
@php
   $day = '';
@endphp
@section('content')
<div class="box-wrapper1">
    <div class="block-element">
       <div class="row">
          <div class="col-md-9 col-lg-8 col-12 col-sm-12">
             <div class="block-element m-b-20">
                <div class="row m-t-20">
                   <div class="col-md-12">
                      <p class="para-1 col-white"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent porta dolor metus. Donec blandit imperdiet
                         erat, a pharetra nulla pulvinar maximus. Quisque purus dui,
                      </p>
                   </div>
                </div>
                <div class="row m-t-20">
                   <div class="col-md-12 col-lg-12 col-lg-12">
                      <div class="block-element">
                         <div class="table-responsive custom-table1 group-table">
                            <table  class="table table-hover contact-list border-off" data-page-size="10">
                               <thead>
                                 <tr>
                                    <th colspan="2">Sessions History</th>
                                    <th colspan="2" class="text-right">
                                       
                                    </th>
                                 </tr>
                                 <tr>
                                    <th> # </th>
                                    <th class="text-center"> Booking Date </th>
                                    <th class="text-center"> Booking Time </th>
                                    <th class="text-center"> Status </th>
                                 </tr>
                               </thead>
                               <tbody>
                               </tbody>
                            </table>
                         </div>
                      </div>
                   </div>
                </div>

                <div class="row m-t-20">
                   <div class="col-md-12 col-lg-12">
                      <div id="countdown">
                         <ul>
                            <li>Days <span id="days"></span> </li>
                            <li>Hours <span id="hours"></span> </li>
                            <li>Minutes <span id="minutes"></span> </li>
                            <li>Seconds <span id="seconds"></span></li>
                         </ul>
                      </div>
                   </div>
                </div>
                <div class="row m-t-20" id="order_completed" style="display: none;">
                   <div class="col-md-12 col-lg-12">
                        <span class="alert alert-success"><strong>Alert!</strong> Order Completed.</span>
                   </div>
                </div>
                <div class="comments-wrapper m-t-40">
                   <div class="comments-title-holder m-b-20">
                      <h3 class="col-white"> Forum </h3>
                   </div>
                   <div class="all-comments">
                      <div class="row">
                         <div class="col-12">
                            <div class="chat-main-box">
                               <div class="chat-rbox message-box1">
                                  <ul class="chat-list ">
                                    
                                  </ul>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                    <form method='post' class="ajaxform">
                        @csrf
                        <input type="hidden" name="order_id" value="{{$data->id}}">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <div class="row m-t-30">
                            <div class="col-12">
                                {{-- <div class="summernote">
                                    <h3>Default Summernote</h3>
                                </div> --}}
                                <textarea class="summernote" name="msg" id="msg" cols="6"></textarea>
                            </div>
                        </div>
                        <div class="row m-t-10">
                            <div class="col-12">
                                <div class="text-right mob-text-left">
                                    <button type="submit" id="sendmsg" class="custom-btn2"> SEND </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
             </div>
          </div>
          <div class="col-md-3 col-lg-4 col-12 col-sm-12">
             <div class="order-map m-b-30" id="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.2889612081344!2d-0.08991633469162817!3d51.507914468487265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876035159bb13c5%3A0xa61e28267c3563ac!2sLondon%20Bridge!5e0!3m2!1sen!2s!4v1624374241807!5m2!1sen!2s" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
             </div>
             <div class="support-box1 m-b-30">
                <h5 class="col-white"> WANT TO GET <br/> SUPPORT </h5>
                <p class="m-b-10">    <a href="" class="custom-btn2 bg-purple"> SUPPORT </a> </p>
                <h6> <a href="" class="col-purple"> <b> <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/learn-more-icon.png"> LEARN MORE </b> </a> </h6>
             </div>
             <div class="order-detail-box text-center m-b-30">
                <h4 class="m-b-15"> Order #FO71025F2BF81  <b> {{'$'.number_format($data->price, 2)}}  </b> </h4>
                <p class="m-b-10"> Buyer:{{$data->buyer->fname}} <a href="" class="col-green"> view history </a> </p>
                <p class="m-b-20"> {{$data->created_at->format('m,d,y')}} </p>
                <a href="{{route('activity.details', base64_encode($data->activity_id))}}" class="custom-btn2"> VIEW GIG </a>
             </div>
             <!-- <div class="order-box1 support-box1 text-center m-b-30">
                <a href="" class="bg-danger custom-btn2"> ORDER CANCEL </a>
                <h5 class="col-white m-b-5 m-t-20"> ORDER REQUIREMENTS  </h5>
                <p class="m-b-0 col-silver"> Your buyer has filled out the requirements</p>
             </div> -->
             <div class="order-box1 support-box1 text-center">
                <h5 class="col-white m-b-5"> ORDER STARTED  </h5>
                <p class="m-b-15 col-silver"> Your buyer has filled out the requirements</p>
                <a  class="custom-btn2 col-white">{{$data->created_at->format('h:i:s M D,Y')}} </a>
             </div>
          </div>
       </div>
    </div>
</div>


<div class="modal fade review-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width: 500px;">
      <div class="modal-content" id="re_content">
         <div class="join-pop-head">
            <h3> Leave us a review <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">??</span></button> </h3>
            <p>You`ve recently hired <span id="seller_name"></span>, What do you think about it?
            <hr>
         </div>
         <div class="join-form">
            <form method="post" action="{{route('buddy.review.submit')}}">
                {{csrf_field()}}
                <input type="hidden" name="order_id" value="" id="order_id">
                <input type="hidden" name="seller_id" value="" id="seller_id">
                <div class="rating_block">
                  <input type="number" name="rating" id="rating1" value="1" class="rating text-warning" required />
                </div>
                <textarea name="description" class="form-control" required rows="7" placeholder="Enter your review here..." required></textarea>
                <button type="submit" class="btn btn-primary"> Submit </button>
            </form>
         </div>
      </div>
   </div>
</div>

<div class="modal fade newRequest-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width: 500px;">
      <div class="modal-content" id="re_content">
         <div class="join-pop-head">
            <h3> New Session Request <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">??</span></button> </h3>
            <hr>
         </div>
         <div class="join-form">
            <form method="post" action="{{route('buddy.session.request')}}">
                {{csrf_field()}}
                <input type="hidden" name="order_id" value="{{base64_encode($data->id)}}">
                <div class="container">
                   <div class="row">
                      <div class="col-md-12">
                        <label>Booking Date</label>
                        <input type="date" name="book_date" class="form-control" required>
                      </div>
                   </div>
                   <br>
                   <div class="row">
                      <div class="col-md-12">
                        <label>Booking Time</label>
                        <input type="time" name="book_time" class="form-control" required>
                      </div>
                   </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary"> Submit </button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"> Cancel </button>
            </form>
         </div>
      </div>
   </div>
</div>

@endsection
@section('addScript')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&libraries=places"></script>
<script src="https://use.fontawesome.com/5ac93d4ca8.js"></script>
<script src="{{URL::to('/')}}/assets/js/bootstrap4-rating-input.js"></script>
<script>

   $(document).ready(function(){

      $(document).on('click', '.addRequest', function(){

         $('.newRequest-modal').modal('show');
      });
   });



    jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 250, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.summernote').summernote({
            airMode: true
        });
    });
 </script>
<script type="text/javascript">
   var u_id = '{{base64_encode($data->id)}}';
    (function () {
    const second = 1000,
     minute = second * 60,
     hour = minute * 60,
     day = hour * 24;

     //let created_at_date = "{{$data->created_at}}";
    //  var new_date = "{{date('Y M d h:i:s', strtotime($data->created_at. '+'.$day.' day'))}}";
    //  alert(new_date);
    //  let created_at_date = {{$data->created_at->format('m-d-y')}};

    //  let created_at_time = {{$data->created_at->format('H:i:s')}};

    //  console.log(created_at_date +" "+ created_at_time);
    let new_date = "{{date('Y M d h:i:s', strtotime($data->created_at. '+'.$day.' day'))}}",
    countDown = new Date(new_date).getTime(),
    x = setInterval(function() {

     let now = new Date().getTime(),
         distance = countDown - now;


     //do something later when date is reached
     if (distance >= 0) {
        document.getElementById("days").innerText = Math.floor(distance / (day)),
        document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
        document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
        document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
       
       clearInterval(x);
     }else{

        document.getElementById("days").innerText = '0',
        document.getElementById("hours").innerText = '0',
        document.getElementById("minutes").innerText = '0',
        document.getElementById("seconds").innerText = '0';

        $('#order_completed').css({'display': 'block'});

        $.get("{{URL::to('/')}}/buddy/orders/checkReview/"+u_id, function(data, status){
            if(status == 'success'){
               if(data != 'done'){
                  $('#seller_name').html(data.name);
                  $('#order_id').val(data.order_id);
                  $('#seller_id').val(data.seller_id);

                  setTimeout(function(){
                    $('.review-modal').modal('show');
                  }, 2000);
                  clearInterval(x);
               }
            }else{
               console.log('Something went wrong.');
            }
         });
        clearInterval(x);
     }
     //seconds
    }, 0)
    }());
 </script>
 <script type="text/javascript">
     $(document).ready(function() {

     var locations = [
         @foreach ($location as $val)
             {{'[1,'.$val->lat.','.$val->lng.',1],'}}
         @endforeach
     ];

     var map = new google.maps.Map(document.getElementById('mapa'), {
       zoom: 10,
       center: new google.maps.LatLng(locations[0][1] , locations[0][2]),
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });

     var infowindow = new google.maps.InfoWindow();

     var marker, i;

     for (i = 0; i < locations.length; i++) {
       marker = new google.maps.Marker({
         position: new google.maps.LatLng(locations[i][1], locations[i][2]),
         map: map
       });
       marker.setValues({id :locations[i][3]});

     }

   });


   </script>

   <script>
        $(document).ready(function() {
            $('.ajaxform').submit(function(e) {
                e.preventDefault();
                // validations = $(".ajaxForm").validate();
                // if (validations.errorList.length != 0) {
                //     return false;
                // }
                // var editor = summernote.instances['details'].getData();
                var formData =  $(this).serializeArray() // new FormData(this);
                // formData.append('details', editor);
                //console.log(formData);
                $.ajax({
                    type: "post",
                    url: "{{route('buddy.group.msg')}}",
                    data: formData,
                    dataType: "json",
                    success: function (res) {
                        $('.chat-list').append(res.html);
                        $('.summernote').summernote('reset');
                    }
                });
            })
        });
   </script>


@endsection
