@extends('buddy.include.master')
@section('title', 'Request for new sports category')

@section('content')
<div class="box-wrapper1">
   <div class="block-element m-b-25">
      <div class="sec-head1">
         <h3> Request for new sports category </h3>
      </div>
   </div>
   <div class="block-element">
      <form method="post">
         @csrf
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon16.png">
                  <h5> Sports Category </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <input type="text" class="form-field1" name="category" required>
            </div>
         </div>
         <div class="row  m-t-20">
            <div class="col-md-3 col-lg-3 col-12">
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <button class="submit-btn1"> <i class="fa fa-plus"> </i> SEND REQUEST </button>
               <a href="" class="submit-btn1 bg-green2 m-l-10">  BACK </a>
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
                     <th>#</th>
                     <th>Category name</th>
                     <th>Request at</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  @foreach(Auth::user()->category as $key => $val)
                     <tr>
                        <td>{{++$key}}</td>
                        <td>{{$val->name}}</td>
                        <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</td>
                        <td>
                           <a href="javascript:void(0)" class="btn btn-danger btn-sm deleteItem" data-href="{{route('buddy.category.delete', base64_encode($val->id))}}"><i class="fa fa-trash"></i> Delete </a>
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
