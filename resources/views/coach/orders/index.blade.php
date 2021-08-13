@extends('coach.include.master')
@section('title', 'Registration Form')

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
               <a href="" class="active"> Active </a>
               <a href="" class="col-silver"> Delivered  </a>
               <a href="" class="col-silver"> Cancellation </a>
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
                     <th> Total Amount </th>
                     <th> Site Commision </th>
                     <th> Total Earning </th>
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
                           <span class="label bg-green2"> Custom Order </span>
                            {{empty($val->lesson) ? '' : $val->lesson->title}}
                         </td>
                        <td> {{'$'.number_format($val->price, 2)}} </td>
                        <td> {{'$'.number_format($val->commision, 2)}} </td>
                        <td> {{'$'.number_format($val->earning, 2)}} </td>
                        <td>
                           @if($val->status == '1')
                              <span class="label bg-success"> Active </span>
                           @else
                              <span class="label bg-danger"> Cancelled </span>
                           @endif
                        </td>
                        <td>  
                           <a href="{{route('coach.orders.view',base64_encode($val->id))}}" class="label bg-green2">  Details 
                           </a> 
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>


@endsection
