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
                      <th> Buyer </th>
                      <th> Lesson </th>
                      <th> Total </th>
                      <th> Status </th>
                   </tr>
                </thead>
                <tbody>
                   <tr>
                       <td colspan="12" align="center">No Order Found</td>
                   </tr>
                </tbody>
             </table>
          </div>
       </div>
    </div>
 </div>

 @endsection
