@extends('web.support.master2')
@section('title', 'Home')

@section('content')

<section class="action-bar">
   <div class="container">
      <div class="all-actions arrows1">
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> Starting Excercise </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon2.jpg"> Fitness Expert </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon3.jpg"> Body Fitness </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon4.jpg"> Martial Art </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon5.jpg"> Swimming </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon6.jpg"> Boxing </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon7.jpg"> Fencing </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon8.jpg"> Racing </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> Starting Excercise </a>
         </div>
      </div>
   </div>
</section>
<!-- Action Bar Ends Here -->
<!-- Page Content Starts Here -->
<section class="pad-top-40 pad-bot-40 bg-dark2">
   <div class="container">
      <div class="row">
         @if(session()->has('success'))
            <div class="col-md-12">
               <div class="alert alert-success">
                 <strong>Success!</strong> {{ session()->get('success') }}
               </div>
            </div>
         @endif
         <div class="col-md-12 col-lg-9 col-sm-12 col-12">
            <div class="sec-head1 m-b-30">
               <h4 class="col-white gotham-bold"> Check Your Order </h4>
            </div>
            <div class="row" id="accordion">
               <div class="col-md-4 col-lg-4 col-sm-12 col-12">
                  <div class="order-image1">
                     <img src="{{URL::to('/public/storage/user/lessons/main_image/'.$data->cover_img)}}">
                  </div>
               </div>
               <div class="col-md-4 col-lg-4 col-sm-6 col-12">
                  <div class="order-text1">
                     <h5 class="col-white"> 
                        {{$data->description}}  
                     </h5>
                     <h6 class="col-purple"> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <b> 5.0 </b>  </h6>
                     <button class="  collapse-btn1"   data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">  Hide what included  </button>
                  </div>
               </div>
               <div class="col-md-4 col-lg-4 col-sm-6 col-12">
                  
               </div>
            </div>
            <div class="row m-t-20" id="accordion">
               <div class="col-md-12 col-lg-12">
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                     <div class="basic-package-head">
                        <h4 class="col-white"> {{$data->packages[$pack]->title}} Package </h4>
                        <p class="col-white m-t-20">
                           Services
                        </p>
                        <ul class="list-type1" style="max-width: 300px;">
                           @foreach($data->packages[$pack]->details as $val)
                              <li> <i class="fa fa-check col-purple"> </i> {{$val->service}} </li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12 col-lg-3 col-sm-12 col-12">
            <form method="post" action="{{route('web.checkout')}}">
               @csrf
               <input type="hidden" name="lid" value="{{base64_encode($data->id)}}">
               <input type="hidden" name="pack_id" value="{{base64_encode($pack)}}">
               <input type="hidden" name="type" value="{{base64_encode($type)}}">

               <div class="summary-box m-t-30">
                  <h5 class="col-white"> Summary </h5>
                  <table>
                     <tbody>
                        <tr>
                           <th class="col-white"> Total Amount </th>
                           <th class="col-purple"> {{'$'.number_format($data->packages[$pack]->price)}} </th>
                        </tr>
                        <tr>
                           <td colspan="2" class="text-center no-border">
                              <button class="custom-btn1 bg-purple col-white rounded block-element2 m-t-10"> Continue to Checkout ({{'$'.number_format($data->packages[$pack]->price)}})</button> 
                              <p class="col-white m-t-10 m-b-0"> You won't be charged yet  </p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>

@endsection