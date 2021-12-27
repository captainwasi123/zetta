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
     
      <h1>{{ __('content.Thnkyou_Thankyou for your order!') }}</h1>
      <p>{{__('content.centuries, but also the leap into electronic typesetting, remaining essentially unchanged')}}. </p>
      <p>{{__('content.It was popularised in the 1960s with the release of Letraset sheets conta')}} </p>

      <center><a href="{{URL::to('/')}}">{{ __('content.Thnkyou_Back to Home') }}</a></center>
   </div>  
   </div>
</section>
@endsection
