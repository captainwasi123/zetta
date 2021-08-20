@extends('coach.include.master')
@section('title', 'My Account Settings')

@section('content')
@php 
   $x = empty(Auth::user()->level_status) ? '0' : Auth::user()->level_status; 
   $currOrders = count(Auth::user()->lessonOrders);

   $rating_avg = empty(Auth::user()->avgRating) ? '0' : Auth::user()->avgRating[0]->aggregate;
@endphp
<div class="box-wrapper1">
   <div class="block-element m-b-25">
      <div class="sec-head1">
         <h3> Your Seller Level</h3>
      </div>
   </div>
   <div class="block-element">
      <div class="row">
         <div class="col-md-3 col-lg-3 col-sm-3 col-6">
            <div class="level-box level-box1">
               <i class="fa fa-user"> </i>
               <span class="line-1 {{Auth::user()->level_status >= 1 ? 'active' : ''}}"> . </span>
            </div>
         </div>
         <div class="col-md-3 col-lg-3 col-sm-3 col-6">
            <div class="level-box level-box2">
               <b class="{{Auth::user()->level_status >= 1 ? 'active' : 'disabled'}}"> LEVEL ONE </b>
               <span class="line-1 {{Auth::user()->level_status >= 2 ? 'active' : ''}}"> . </span>
            </div>
         </div>
         <div class="col-md-3 col-lg-3 col-sm-3 col-6">
            <div class="level-box level-box3">
               <b class="{{Auth::user()->level_status >= 2 ? 'active' : 'disabled'}}"> LEVEL TWO </b>
               <span class="line-1 {{Auth::user()->level_status >= 3 ? 'active' : ''}}"> . </span>
            </div>
         </div>
         <div class="col-md-3 col-lg-3 col-sm-3 col-6">
            <div class="level-box level-box4">
               <b class="{{Auth::user()->level_status >= 3 ? 'active' : 'disabled'}}">  <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/badge2.png"> </b>
            </div>
         </div>
      </div>
   </div>
   <div class="block-element">
      <div class="row m-t-30">
         <div class="col-md-6 col-lg-6 col-12">
            @if($x < 3)
               <div class="block-element m-b-20">
                  <h4 class="col-silver"> 
                     <b> Maintain these standard to reach a 
                        @switch(Auth::user()->level_status)
                           @case('1')
                              Level Two
                              @break

                           @case('2')
                              Top Rated
                              @break

                           @case('3')
                              Top Rated
                              @break

                           @default
                              Level One
                              @break

                        @endswitch
                      Seller </b> 
                  </h4>
               </div>
               <div class="level-details">
                  <div>
                     <i class="fa fa-check"> </i>
                     <h6 class="col-white"> Orders: {{$levels[$x]->no_orders}} </h6>
                     <p class="col-silver"> Your Orders: {{$currOrders}} </p>
                  </div>
                  @php 
                     $orderPer = ($currOrders/$levels[$x]->no_orders)*100;
                  @endphp
                  <div>
                     <div class="progress progress-1 m-t-20">
                        <div class="progress-bar bg-purple2" style="width: {{$orderPer}}%; height:15px;" role="progressbar">{{$orderPer}}%</div>
                     </div>
                  </div>
               </div>
               <div class="level-details">
                  <div>
                     <i class="fa fa-check"> </i>
                     <h6 class="col-white"> Rating: {{$levels[$x]->rating}} </h6>
                     <p class="col-silver"> Your Rating: {{number_format($rating_avg, 1)}} </p>
                  </div>
                  @php 
                     $ratingPer = ($rating_avg/$levels[$x]->rating)*100;
                  @endphp
                  <div>
                     <div class="progress progress-1 m-t-20">
                        <div class="progress-bar bg-purple2" style="width: {{$ratingPer > 100 ? '100' : $ratingPer}}%; height:15px;" role="progressbar">{{$ratingPer > 100 ? '100' : number_format($ratingPer)}}%</div>
                     </div>
                  </div>
               </div>
               <div class="level-details">
                  <div>
                     <i class="fa fa-check"> </i>
                     <h6 class="col-white"> Earning: ${{number_format($levels[$x]->earning)}} </h6>
                     <p class="col-silver"> Your Earning: ${{number_format($totalEarning)}} </p>
                  </div>
                  @php 
                     $earningPer = ($totalEarning/$levels[$x]->earning)*100;
                  @endphp
                  <div>
                     <div class="progress progress-1 m-t-20">
                        <div class="progress-bar bg-purple2" style="width: {{$earningPer > 100 ? '100' : $earningPer}}%; height:15px;" role="progressbar">{{$earningPer > 100 ? '100' : number_format($earningPer)}}%</div>
                     </div>
                  </div>
               </div>
            @endif
         </div>
         <div class="col-md-6 col-lg-6 col-12">
            <div class="block-element m-b-20">
               <h4 class="col-silver"> <b> Achieve these goal to be nominated for a Top Rated Seller </b> </h4>
            </div>
            <div class="level-details">
               <div>
                  <i class="fa fa-check"> </i>
                  <h6 class="col-white"> Orders: {{$levels[2]->no_orders}} </h6>
                  <p class="col-silver"> Your Orders: {{$currOrders}} </p>
               </div>
               @php 
                  $orderPer = ($currOrders/$levels[2]->no_orders)*100;
               @endphp
               <div>
                  <div class="progress progress-1 m-t-20">
                     <div class="progress-bar bg-purple2" style="width: {{$orderPer}}%; height:15px;" role="progressbar">{{$orderPer}}%</div>
                  </div>
               </div>
            </div>
            <div class="level-details">
               <div>
                  <i class="fa fa-check"> </i>
                  <h6 class="col-white"> Rating: {{$levels[2]->rating}} </h6>
                  <p class="col-silver"> Your Rating: {{number_format($rating_avg, 1)}} </p>
               </div>
               @php 
                  $ratingPer = ($rating_avg/$levels[2]->rating)*100;
               @endphp
               <div>
                  <div class="progress progress-1 m-t-20">
                     <div class="progress-bar bg-purple2" style="width: {{$ratingPer > 100 ? '100' : $ratingPer}}%; height:15px;" role="progressbar">{{$ratingPer > 100 ? '100' : number_format($ratingPer)}}%</div>
                  </div>
               </div>
            </div>
            <div class="level-details">
               <div>
                  <i class="fa fa-check"> </i>
                  <h6 class="col-white"> Earning: ${{number_format($levels[2]->earning)}} </h6>
                  <p class="col-silver"> Your Earning: ${{number_format($totalEarning)}} </p>
               </div>
               @php 
                  $earningPer = ($totalEarning/$levels[2]->earning)*100;
               @endphp
               <div>
                  <div class="progress progress-1 m-t-20">
                     <div class="progress-bar bg-purple2" style="width: {{$earningPer > 100 ? '100' : $earningPer}}%; height:15px;" role="progressbar">{{$earningPer > 100 ? '100' : number_format($earningPer)}}%</div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>
   <div class="block-element m-t-20">
      <br><br>
      <div class="row m-b-30">
         <div class="col-12">
            <h3 class="m-b-0 col-white"> All-Time Rating {{number_format($rating_avg, 1)}}
               <span class="m-l-10">
                  @for($i=1; $i<=5; $i++)
                     @if($i <= $rating_avg)
                        <i class="fa fa-star col-yellow"> </i>
                     @else
                        <i class="fa fa-star"> </i>
                     @endif
                  @endfor
               </span> 
            </h3>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="rating-review">
               <div>
                  <h5> 5 Star </h5>
               </div>
               <div class="rating-bar">
                  <div class="progress ">
                     <div class="progress-bar bg-yellow" style="width: {{($reviews['5']/$reviews['total'])*100}}%; height:15px;" role="progressbar"> </div>
                  </div>
               </div>
               <div>
                  <h5 class="text-right "> ({{$reviews['5']}}) </h5>
               </div>
            </div>
            <div class="rating-review">
               <div>
                  <h5> 4 Star </h5>
               </div>
               <div class="rating-bar">
                  <div class="progress ">
                     <div class="progress-bar bg-yellow" style="width: {{($reviews['4']/$reviews['total'])*100}}%; height:15px;" role="progressbar"> </div>
                  </div>
               </div>
               <div>
                  <h5 class="text-right "> ({{$reviews['4']}}) </h5>
               </div>
            </div>
            <div class="rating-review">
               <div>
                  <h5> 3 Star </h5>
               </div>
               <div class="rating-bar">
                  <div class="progress ">
                     <div class="progress-bar bg-yellow" style="width: {{($reviews['3']/$reviews['total'])*100}}%; height:15px;" role="progressbar"> </div>
                  </div>
               </div>
               <div>
                  <h5 class="text-right "> ({{$reviews['3']}}) </h5>
               </div>
            </div>
            <div class="rating-review">
               <div>
                  <h5> 2 Star </h5>
               </div>
               <div class="rating-bar">
                  <div class="progress ">
                     <div class="progress-bar bg-yellow" style="width:  {{($reviews['2']/$reviews['total'])*100}}%; height:15px;" role="progressbar"> </div>
                  </div>
               </div>
               <div>
                  <h5 class="text-right "> ({{$reviews['2']}}) </h5>
               </div>
            </div>
            <div class="rating-review">
               <div>
                  <h5> 1  Star </h5>
               </div>
               <div class="rating-bar">
                  <div class="progress ">
                     <div class="progress-bar bg-yellow" style="width:  {{($reviews['1']/$reviews['total'])*100}}%; height:15px;" role="progressbar"> </div>
                  </div>
               </div>
               <div>
                  <h5 class="text-right"> ({{$reviews['1']}}) </h5>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            
         </div>
      </div>
   </div>
</div>

@endsection
@section('addScript')

@endsection
