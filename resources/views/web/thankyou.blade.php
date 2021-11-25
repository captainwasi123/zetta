@extends('web.support.master2')
@section('title', 'Thank You')
@section('content')

<section class="action-bar">
   <div class="container">
   <div class="thankyou">
      <img src="{{URL::to('/public/Tick.png/')}}" alt="" class="">
      <h3>{{ __('content.Thnkyou_Order #:') }} 1101</h3>
      <h1>{{ __('content.Thnkyou_Thankyou for your order!') }}</h1>
      <p>{{ __('content.Thnkyou_paragraph') }}</p>
      <center><a href="">{{ __('content.Thnkyou_Back to Home') }}</a></center>
   </div>  
   </div>
</section>
@endsection
