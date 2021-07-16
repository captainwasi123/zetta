@extends('coach.include.master')
@section('title', 'Edit Sports Category')

@section('content')
<div class="box-wrapper1">
   <div class="block-element m-b-25">
      <div class="sec-head1">
         <h3> Edit sport in your profile </h3>
      </div>
   </div>
   <div class="block-element">
      <form method="post" action="{{route('coach.category.update')}}">
         @csrf
         <input type="hidden" name="cid" value="{{base64_encode($data->id)}}">
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon16.png">
                  <h5> Sports Category </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <input type="text" class="form-field1" name="category" value="{{$data->name}}" required>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon17.png">
                  <h5> Accomplishment </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12 ">
               <input type="text" class="form-field1" name="accomp" value="{{$data->accomplishment}}" required>
            </div>
         </div>
         <div class="row center-row">
            <div class="col-md-3 col-lg-3 col-12">
               <div class="field-name">
                  <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/field-icon18.png">
                  <h5> Skills Level </h5>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <input type="text" class="form-field1" name="skill_level" value="{{$data->skill_level}}" required>
            </div>
         </div>
         <div class="row  m-t-20">
            <div class="col-md-3 col-lg-3 col-12">
            </div>
            <div class="col-md-6 col-lg-6 col-12">
               <button class="submit-btn1"> <i class="fa fa-plus"> </i> UPDATE </button>
               <a href="" class="submit-btn1 bg-green2 m-l-10">  BACK </a>
            </div>
         </div>
      </form>
   </div>
</div>

@endsection