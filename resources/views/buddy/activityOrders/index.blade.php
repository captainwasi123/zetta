@extends('buddy.include.master')
@section('title', 'My Orders')
@section('addStyle')
<link href="{{asset('public')}}/admin/assets//plugins/summernote/dist/summernote.css" rel="stylesheet" />
@endsection
@section('content')
<div class="box-wrapper1">
    <div class="block-element">
       <div class="sec-head1">
          <h3> Manage Activity Orders  </h3>
       </div>
    </div>
    <div class="block-element m-b-20 custom-table1">
       <div class="row">
          <div class="col-lg-6 col-sm-6 col-md-6 col-12">
             <div class="order-sorting-text m-b-10">
                <a href="{{route('buddy.activityOrder')}}" class="{{$status == '1' ? 'active' : ''}}"> Active </a>
                <a href="{{route('buddy.activityOrder.cancelled')}}" class="col-silver {{$status == '2' ? 'active' : ''}}"> Cancelled </a>
             </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-12 text-right mob-text-left">
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
                        <th> Buyer </th>
                        <th> Activity </th>
                        <th> Qty </th>
                        <th> Total Amount</th>
                        <th> Equipments </th>
                        <th> Type </th>
                        <th> BookingTime </th>
                        <th> Status </th>
                        <th> Order at </th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($data as $key => $val)
                        <tr>
                           <td>{{++$key}}</td>
                           <td>
                              <a href="{{route('web.buddy.details', base64_encode(@$val->buyer->id))}}" target="_blank" class="order_profile_link"><img src="{{URL::to('/')}}/public/storage/user/profile_img/{{empty($val->seller) ? '' : $val->buyer->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" width="40" class="img-circle" /> {{empty($val->buyer) ? 'Unknown' : $val->buyer->fname.' '.$val->buyer->lname}} </a>
                           </td>
                           <td>
                               {{empty($val->activity) ? '' : $val->activity->title}}
                            </td>
                            <td> {{$val->qty}} </td>
                           <td> {{'$'.number_format($val->price, 2)}} </td>
                           <td>
                              @foreach($val->equipments as $eq)
                                 <span class="badge badge-info badge-pill">{{@$eq->equip->name}}</span>
                              @endforeach 
                           </td>
                           <td>
                              @if(!empty($val->activity))
                                 {{$val->activity->participants == '0' ? 'Single Activity' : 'Group Activity'}}
                              @endif
                           </td>
                           <td>
                              {{date('d-M-Y h:i a', strtotime(@$val->activity->held_date))}}
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
                              <a href="{{route('buddy.activityOrder.view',base64_encode($val->id))}}" class="label bg-green2">  Details 
                              </a> 
                           </td>
                        </tr>
                     @endforeach
                     @if(count($data) == 0)
                        <tr>
                           <td colspan="10" align="center">No Order Found</td>
                        </tr>
                     @endif
                </tbody>
             </table>
          </div>
       </div>
    </div>
 </div>

 @endsection
