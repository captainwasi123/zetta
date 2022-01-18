@extends('buddy.include.master')
@section('title', 'Request for new sports')

@section('content')
<div class="box-wrapper1">
   <div class="block-element m-b-25">
      <div class="sec-head1">
         <h3> Request for new sports</h3>
      </div>
   </div>
   <div class="block-element">
      <form method="post">
         @csrf
         <div class="row center-row">
            <div class="col-md-2 col-lg-2 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon16.png">
                  <h5> Sports </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <input type="text" class="form-field1" name="sports" required>
            </div>
         </div>
         <div class="row  m-t-20">
            <div class="col-md-2 col-lg-2 col-12">
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <button class="submit-btn1"> <i class="fa fa-plus"> </i> SEND REQUEST </button>
               <a href="{{route('buddy.sports')}}" class="submit-btn1 bg-green2 m-l-10">  BACK </a>
            </div>
         </div>
      </form>
   </div>

   <div class="row">
      <div class="col-md-12">
         <hr><br><br>
         <div class="block-element m-b-25">
            <div class="sec-head1">
               <h3> Pending Requests </h3>
            </div>
         </div>
      </div>
      <div class="col-md-12">
         <div class="table-responsive custom-table1">
            <table class="table table-hover contact-list" data-page-size="10">
               <thead>
                  <tr>
                     <th style="width:10%">#</th>
                     <th>Sports Name</th>
                     <th style="width:20%">Request at</th>
                     <th style="width:15%"></th>
                  </tr>
               </thead>
               <tbody>
                  @foreach(Auth::user()->category as $key => $val)
                     <tr>
                        <td>{{++$key}}</td>
                        <td>{{$val->name}}</td>
                        <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</td>
                        <td>
                           <a href="javascript:void(0)" class="btn btn-danger btn-sm deleteItem" data-href="{{route('buddy.sports.delete', base64_encode($val->id))}}"><i class="fa fa-trash"></i> Delete </a>
                        </td>
                     </tr>
                  @endforeach
                  @if(count(Auth::user()->category) == 0)
                     <tr>
                        <td colspan="4">No Requests Found.</td>
                     </tr>
                  @endif
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

@endsection
