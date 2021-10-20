@extends('buddy.include.master')
@section('title', 'My Orders')
@section('addStyle')
<link href="{{asset('public')}}/admin/assets//plugins/summernote/dist/summernote.css" rel="stylesheet" />
@endsection
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
             <a href="" class="label bg-purple2 col-white"> Download PDF </a>
          </div>
       </div>
    </div>
    <div class="block-element">
       <div class="row">
          <div class="table-responsive custom-table1 order-table">
             <table  class="table table-hover contact-list off-border" data-page-size="10">
                <thead>
                     <tr>
                        <th> # </th>
                        <th> Seller </th>
                        <th> Lesson </th>
                        <th> Total Amount</th>
                        <th> Type </th>
                        <th> BookingTime </th>
                        <th> Status </th>
                        <th> Order at </th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($data as $val)
                        <tr>
                           <td>{{$val->id}}</td>
                           <td>
                              <a href="javascript:void(0)"><img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->seller) ? '' : $val->seller->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" width="40" class="img-circle" /> {{empty($val->seller) ? 'Unknown' : $val->seller->fname.' '.$val->seller->lname}} </a>
                           </td>
                           <td>
                               {{empty($val->lesson) ? '' : $val->lesson->title}}
                            </td>
                           <td> {{'$'.number_format($val->price, 2)}} </td>
                           <td>
                              @if(!empty($val->lesson))
                                 {{$val->lesson->participants == '0' ? 'Single Lesson' : 'Group Lesson'}}
                              @endif
                           </td>
                           <td>
                              @if(empty($val->booking_date) && $val->lesson->participants != '0')
                                 @if(!empty($val->lesson))
                                    {{date('d-M-Y h:i a', strtotime($val->lesson->held_date))}}
                                 @endif
                              @else
                                 {{date('d-M-Y h:i a', strtotime($val->booking_date.' '.$val->booking_time))}}
                              @endif
                           </td>
                           <td>
                              @if($val->status == '1')
                                 <span class="label bg-success"> Active </span>
                              @else
                                 <span class="label bg-danger"> Cancelled </span>
                              @endif
                           </td>
                           <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</td>
                           <td>  
                              <a href="{{route('buddy.orders.view',base64_encode($val->id))}}" class="label bg-green2">  Details 
                              </a> 
                           </td>
                        </tr>
                     @endforeach
                     @if(count($data) == 0)
                        <tr>
                           <td colspan="4" align="center">No Order Found</td>
                        </tr>
                     @endif
                </tbody>
             </table>
          </div>
       </div>
    </div>
 </div>

 @endsection
