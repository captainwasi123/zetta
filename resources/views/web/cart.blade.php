@extends('web.support.master2')
@section('title', 'Cart')

@section('content')

<!-- Action Bar Ends Here -->
<!-- Page Content Starts Here -->
<section class="pad-top-130 pad-bot-40 bg-dark2">
   <div class="container">
      <div class="row">
         @if(session()->has('success'))
            <div class="col-md-12">
               <div class="alert alert-success">
                 <strong>{{ __('content.Success!') }}</strong> {{ session()->get('success') }}
               </div>
            </div>
         @endif
         <div class="col-md-12 col-lg-9 col-sm-12 col-12">
            <div class="sec-head1 m-b-30">
               <h4 class="col-white gotham-bold"> {{ __('content.Check Your Order') }} </h4>
            </div>
            <div class="row" id="accordion">
               <div class="col-md-4 col-lg-4 col-sm-12 col-12">
                  <div class="order-image1">
                      @if ($type == 'activity')
                      <img src="{{asset('/public/storage/user/activity/main_image/'.$data->cover_img)}}">
                      @endif
                      @if ($type == 'lesson')
                      <img src="{{URL::to('/public/storage/user/lessons/main_image/'.$data->cover_img)}}">
                      @endif

                  </div>
               </div>
               <div class="col-md-8 col-lg-4 col-sm-6 col-12">
                  <div class="order-text1">
                     <div class="col-white">
                        {!! $data->description !!}
                     </div>
                     <div class="cart_profile">
                        <div class="lesson-holder-profile">
                           <div>
                              <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($data->user) ? '' : $data->user->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
                           </div>
                           @if(!empty($data->user))
                              @switch($data->user->level_status)
                                 @case('1')
                                    <img class="badge-img" src="{{URL::to('/')}}/assets/website/images/badge/1.png">
                                    @break

                                 @case('2')
                                    <img class="badge-img" src="{{URL::to('/')}}/assets/website/images/badge/2.png">
                                    @break
                                    
                                 @case('3')
                                    <img class="badge-img" src="{{URL::to('/')}}/assets/website/images/badge/top-rated.png">
                                    @break
                                    
                              @endswitch
                           @endif
                           <a href="{{route('web.coach.details', base64_encode($data->user->id))}}">
                              <h4 class="col-white no-margin m-t-0 m-b-0"> {{empty($data->user->fname) ? 'Anonymous' : $data->user->fname.' '.$data->user->lname}} </h4>
                           </a>
                           <h6 class="col-grey">{{$type == 'activity' ? 'Sports Buddy' : 'Coach'}}</h6>
                           @php 
                              $rating_avg = empty($data->user->avgRating) ? '0' : $data->user->avgRating[0]->aggregate; 
                           @endphp
                           <h5 class="col-purple cart_profile_rating">
                              <i class="fa fa-star col-purple"> </i> <strong>{{number_format($rating_avg, 1)}}</strong>  
                           </h5>
                        </div>
                        <button class="  collapse-btn1"   data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">  {{ __('content.Hide what included') }}  </button>
                     </div>
                  </div>
               </div>
               <div class="col-md-0 col-lg-4 col-sm-6 col-12">

               </div>
            </div>
            <div class="row m-t-20" id="accordion">
               <div class="col-md-12 col-lg-12">
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      @if (!empty($data->packages[$pack]->details))

                     <div class="basic-package-head">
                        <h4 class="col-white"> {{$data->packages[$pack]->title}} {{ __('content.Package') }} </h4>
                        <p class="col-white m-t-20">
                           {{ __('content.Services') }}
                        </p>
                        <ul class="list-type1" style="max-width: 300px;">
                           @foreach($data->packages[$pack]->details as $val)
                              <li> <i class="fa fa-check col-purple"> </i> {{$val->service}} </li>
                           @endforeach
                        </ul>
                     </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12 col-lg-3 col-sm-12 col-12">
            <form class="checkout-extra" method="post" action="{{route('web.checkout')}}">
               @csrf
               <input type="hidden" name="lid" value="{{base64_encode($data->id)}}">
               <input type="hidden" name="pack_id" value="{{base64_encode($pack)}}">
               <input type="hidden" name="type" value="{{base64_encode($type)}}">


               <div class="summary-box m-t-30">
                  <h5 class="col-white text-center"> {{ __('content.Summary') }} </h5>
                  
                  <table>
                     <tbody>
                        @if(count($data->equipment) > 0)
                           <tr>
                              <th colspan="3">
                                 <h5 class="col-white"> Equipment:</h5>
                                 <label class="custom-control custom-radio col-white">
                                    <input id="radio2" name="with_without_equipment" type="radio" value="1" class="custom-control-input equipRadio" checked>
                                    <span class="custom-control-label"> Without Equipment </span>
                                 </label>

                                 <label class="custom-control custom-radio col-white" >
                                    <input id="radio1" name="with_without_equipment" type="radio" value="2" class="custom-control-input equipRadio">
                                    <span class="custom-control-label"> With Equipment  </span>
                                 </label> 

                                 <div class="equip_tray">
                                    @foreach($data->equipment as $key => $equ)
                                       <label class="custom-control custom-checkbox col-white">
                                          <input id="checkbox2" name="equipment_item[]" type="checkbox" value="{{@$equ->user_equipment->id}}" class="custom-control-input equipCheckbox" data-price="{{empty($equ->user_equipment->price) ? 0 : $equ->user_equipment->price}}">
                                          <span class="custom-control-label"> {{ @$equ->user_equipment->name}} </span>
                                       </label>
                                    @endforeach
                                 </div>           
                             </th>
                           </tr>
                        @else
                           <input type="hidden" name="with_without_equipment" value="1">
                        @endif

                        @if($data->participants == 1)
                        <tr>
                           <th class="col-white" style="width: 50%;"> No. of participants </th>
                           <th></th>
                           <th>
                              <input type="number" name="qty" class="form-control" value="1" required>
                           </th>
                        </tr>
                        @else
                           <input type="hidden" name="qty" class="form-control" value="1">
                        @endif
                        <tr>
                           <th class="col-white" style="width: 50%;"> Coupon </th>
                           <th colspan="2">
                              <input type="text" name="coupon" id="couponField" class="form-control">
                           </th>
                        </tr>
                        <tr>
                           @php $totalPrice = $type == 'lesson' ? $price : 0; @endphp
                           <th class="col-white" colspan="2"> Amount </th>
                           <th class="col-purple text-right tprice_tray">${{$totalPrice}}</th>
                           <input type="hidden" name="tprice" class="tprice" value="{{$totalPrice}}">
                        </tr>
                        <tr id="discountTray">
                           <th class="col-white" style="width: 50%;"> Discount </th>
                           <th></th>
                           <th class="col-purple text-right" id="discountTrayValue">  </th>
                        </tr>
                        <tr id="finalTray">
                           <th class="col-white" style="width: 50%;"> Final Amount </th>
                           <th></th>
                           <th class="col-purple text-right" id="finalTrayValue">  </th>
                        </tr>
                        @if($type == 'lesson' && $data->participants == 0)
                           <tr>
                              <th colspan="3" class="col-white">
                                 <hr class="hr-white"> 
                              </th>
                           </tr>
                           <tr>
                              <th class="col-white">
                                 Booking Date
                              </th>
                              <th class="col-white" colspan="3">
                                 <input type="text" class="form-control form-dark" placeholder="Select" id="datepicker" name="booking_date" required>
                              </th>
                           </tr>
                           <tr>
                              <th class="col-white">
                                 Booking Time
                              </th>
                              <th class="col-white" colspan="3">
                                 <select class="form-control form-dark bookingTime" name="booking_time" required>
                                    <option value="">Select</option>
                                 </select>
                              </th>
                           </tr>
                        @endif
                        
                        <tr>
                           <td colspan="3" class="text-center no-border">
                              <input type="hidden" name="total_price" id="totalPrice" value="{{$totalPrice}}">
                              <button class="custom-btn1 bg-purple col-white rounded block-element2 m-t-10"> {{ __('content.Continue to Checkout') }}
                              </button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>

@endsection
@section('addScript')
   @if($type == 'lesson' && $data->participants == 0)
      <script type="text/javascript">
         $(document).ready(function(){
            'use strict'

            $( "#datepicker" ).datepicker({ 
               minDate: new Date("{{date('d-M-Y')}}"),
               beforeShowDay: nonWorkingDates,
               dateFormat: 'dd-mm-yy',
               firstDay: 1
            });

            $(document).on('change', '#datepicker', function(){
               var date = $(this).val();
               $('.bookingTime').html('<option value="">...</option>');
               $.get("{{URL::to('/cart/getSlot')}}/"+date+"|{{$data->id}}|{{$pack}}", function(data){

                  $('.bookingTime').html(data);
               });
            });
         });

         var unavailableDates = @json($holiday);
         function unavailable(date) {
            dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
            if ($.inArray(dmy, unavailableDates) == -1) {
                return [true, ""];
            } else {
                return [false, "", "Unavailable"];
            }
         }

         function nonWorkingDates(date){
            var day = date.getDay(), Sunday = 0, Monday = 1, Tuesday = 2, Wednesday = 3, Thursday = 4, Friday = 5, Saturday = 6;
            var closedDates = unavailableDates;
            var closedDays = [
               @foreach($slots as $val)
                  {{$val->day}},
               @endforeach
            ];
            
            if (closedDays.includes(day) == false) {
               return [false];
            }

            for (i = 0; i < closedDates.length; i++) {
               if (date.getMonth() == closedDates[i][0] - 1 &&
                  date.getDate() == closedDates[i][1] &&
                  date.getFullYear() == closedDates[i][2]) {
                     return [false];
               }
            }

            return [true];
         }
      </script>
   @endif
@endsection

