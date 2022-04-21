@extends('coach.include.master')
@section('title', 'Manage Order')

@section('content')

<div class="box-wrapper1">
   <div class="block-element">
      <div class="sec-head1">
         <h3> Manage Order  </h3>
      </div>
   </div>
   <div class="block-element m-b-20 custom-table1">
      <div class="row">
         <div class="col-lg-6 col-sm-6 col-md-6 col-12">
            <div class="order-sorting-text m-b-10">
               <a href="{{route('coach.orders')}}" class="{{$status == '0' ? 'active' : ''}}"> Active </a>
               <a href="{{route('coach.orders.delivered')}}" class="col-silver {{$status == '1' ? 'active' : ''}}"> Delivered  </a>
               <a href="{{route('coach.orders.cancelled')}}" class="col-silver {{$status == '2' ? 'active' : ''}}"> Cancellation </a>
            </div>
         </div>
         <div class="col-lg-6 col-sm-6 col-md-6 col-12 text-right mob-text-left">
            <a href="" class="label bg-purple"> Download PDF </a>
         </div>
      </div>
   </div>
   <div class="block-element m-b-30">
      <div class="row">
         <div class="table-responsive custom-table1 m-b-30 order-table" style="overflow-y: auto !important;max-width: 100%;">
            <table  class="table table-hover contact-list border-off" data-page-size="10">
               <thead>
                  <tr>
                     <th> Order# </th>
                     <th> Buyer </th>
                     <th> Lesson </th>
                     <Th> Qty </Th>
                     <th> Total Amount </th>
                     <th> Site Commision </th>
                     <th> Total Earning </th>
                     <th> Equipments </th>
                     <th> Type </th>
                     <th> BookingTime </th>
                     <th> Seesion </th>
                     <th> Status </th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($data as $val)
                     <tr>
                        <td>{{$val->id}}</td>
                        <td>
                           <a href="javascript:void(0)"><img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->buyer) ? '' : $val->buyer->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" width="40" class="img-circle" /> {{empty($val->buyer) ? 'Unknown' : $val->buyer->fname.' '.$val->buyer->lname}} </a>
                        </td>
                        <td>
                            {{empty($val->lesson) ? '' : $val->lesson->title}}
                         </td>
                         <td> {{$val->qty}} </td>
                        <td> {{'$'.number_format($val->price, 2)}} </td>
                        <td> {{'$'.number_format($val->commision, 2)}} </td>
                        <td> {{'$'.number_format($val->earning, 2)}} </td>
                        <td>
                           @foreach($val->equipments as $eq)
                              <span class="badge badge-info badge-pill">{{@$eq->equip->name}}</span>
                           @endforeach 
                        </td>
                        <td>
                           @if(!empty($val->lesson))
                              {{$val->lesson->participants == '0' ? 'Single Lesson' : 'Group Lesson'}}
                           @endif
                        </td>
                        <td>
                           @if(empty($val->booking_date) && @$val->lesson->participants != '0')
                              @if(!empty($val->lesson))
                                 {{date('d-M-Y h:i a', strtotime($val->lesson->held_date))}}
                              @endif
                           @else
                              {{date('d-M-Y h:i a', strtotime($val->booking_date.' '.$val->booking_time))}}
                           @endif
                        </td>
                        <td>
                           @php $totalSessions = 0; $completedSessions = count($val->sessionsCompleted); @endphp
                           @foreach ($val->lesson->packages as $key => $duration)
                              @if ($val->plan == $key)
                                 @php $totalSessions = $duration->days; @endphp
                              @elseif ($val->plan == $key)
                                 @php $totalSessions = $duration->days; @endphp
                              @elseif ($val->plan == $key)
                                 @php $totalSessions = $duration->days; @endphp
                              @endif
                           @endforeach
                           {{$completedSessions.'/'.$totalSessions}}
                        </td>
                        <td>
                           @if($val->status == '0')
                              <span class="label bg-primary"> Active </span>
                           @elseif($val->status == '1')
                              <span class="label bg-success"> Delivered </span>
                           @elseif($val->status == '2')
                              <span class="label bg-danger"> Cancelled </span>
                           @endif
                        </td>
                        <td>  
                           <a href="{{route('coach.orders.view',base64_encode($val->id))}}" class="label bg-green2">  Details 
                           </a> 
                        </td>
                     </tr>
                  @endforeach
                  @if(count($data) == 0)
                     <tr>
                        <td colspan="11">No Orders Found. </td>
                     </tr>
                  @endif
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>


@endsection
