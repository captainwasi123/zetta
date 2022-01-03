@extends('web.support.master2')
@section('title', 'Thank You')
@section('content')

<section class="action-bar">
   <div class="container">
   <div class="thankyou">
      <img src="{{URL::to('/public/Tick.png/')}}" alt="" class="">
      @foreach($data as $key => $val)
          <h3>{{ __('content.Thnkyou_Order #:') }} {{$val->id}} </h3>
      @endforeach
     
      <h1>{{ __('content.Thnkyou_You will shortly receive a confirmation email, with all the details regarding your order. You can also access all the necessary information in your dashboard. Have a great session!')}}. </p>

      <center><a href="{{URL::to('/')}}">{{ __('content.Thnkyou_Back to Home') }}</a></center>
   </div>  
   </div>
</section>
@endsection
