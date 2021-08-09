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
                        <th> Buyer </th>
                        <th> Activity </th>
                        <th> Total Amount</th>
                        <th> Commision </th>
                        <th> Earning </th>
                        <th> Status </th>
                        <th> Order at </th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($orders as $key => $val)
                        <tr>
                           <td>{{++$key}}</td>
                           <td>
                              <img src="{{URL::to('/public/storage/user/profile_img/'.$val->buyer->profile_img)}}" width="30px"  alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" style="border-radius: 50%;">
                              {{empty($val->buyer->fname) ? $val->buyer->username : $val->buyer->fname.' '.$val->buyer->lname}}
                           </td>
                           <td>
                              <img src="{{URL::to('/public/storage/user/activity/main_image/'.$val->activity->cover_img)}}" width="30px">
                              {{$val->activity->title}}
                           </td>
                           <td>{{empty($val->price) ? 'Free' : '$'.number_format($val->price, 2)}}</td>
                           <td>{{empty($val->commision) ? 'nil' : '$'.number_format($val->commision, 2)}}</td>
                           <td>{{empty($val->earning) ? 'nil' : '$'.number_format($val->earning, 2)}}</td>
                           <td>
                              @if($val->status == '1')
                                 <span class="badge badge-success">Active</span>
                              @elseif($val->status == '2')
                                 <span class="badge badge-danger">Cancelled</span>
                              @endif
                           </td>
                           <td> 
                              {{date('d-M-Y H:i a', strtotime($val->created_at))}}
                           </td>
                        </tr>
                     @endforeach
                     @if(count($orders) == 0)
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
