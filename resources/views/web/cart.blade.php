@extends('web.support.master2')
@section('title', 'Home')

@section('content')

<section class="action-bar">
   <div class="container">
      <div class="all-actions arrows1">
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> {{ __('content.Starting Excercise') }} </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon2.jpg"> {{ __('content.Fitness Expert') }} </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon3.jpg"> {{ __('content.Body Fitness') }} </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon4.jpg"> {{ __('content.Martial Art') }} </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon5.jpg"> {{ __('content.Swimming') }} </a>
         </div>
         <div>{{ __('content.Slogan') }}
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon6.jpg"> {{ __('content.Boxing') }} </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon7.jpg"> {{ __('content.Fencing ') }}</a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon8.jpg"> {{ __('content.Racing') }} </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/assets/website')}}/images/action-icon1.jpg"> {{ __('content.Starting Excercise ') }}</a>
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
                 <strong>{{ __('content.Success!') }}</strong> {{ session()->get('success') }}
               </div>
            </div>
         @endif
         <div class="col-md-12 col-lg-9 col-sm-12 col-12">
            <div class="sec-head1 m-b-30">
               <h4 class="col-white gotham-bold"> {{ __('content.Check Your Order') }} </h4>
            </div>
            <div class="row" id="accordion">
               <div class="col-md-4 col-lg-4 col-sm-12 col-12">
                  <div class="order-image1">
                      @if ($type == 'activity')
                      <img src="{{asset('/public/storage/user/activity/main_image/'.$data->cover_img)}}">
                      @endif
                      @if ($type == 'lesson')
                      <img src="{{URL::to('/public/storage/user/lessons/main_image/'.$data->cover_img)}}">
                      @endif

                  </div>
               </div>
               <div class="col-md-8 col-lg-4 col-sm-6 col-12">
                  <div class="order-text1">
                     <h5 class="col-white">
                        {{$data->description}}
                     </h5>
                     <h6 class="col-purple"> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <b> 5.0 </b>  </h6>
                     <button class="  collapse-btn1"   data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">  {{ __('content.Hide what included') }}  </button>
                  </div>
               </div>
               <div class="col-md-0 col-lg-4 col-sm-6 col-12">

               </div>
            </div>
            <div class="row m-t-20" id="accordion">
               <div class="col-md-12 col-lg-12">
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      @if (!empty($data->packages[$pack]->details))

                     <div class="basic-package-head">
                        <h4 class="col-white"> {{$data->packages[$pack]->title}} {{ __('content.Package') }} </h4>
                        <p class="col-white m-t-20">
                           {{ __('content.Services') }}
                        </p>
                        <ul class="list-type1" style="max-width: 300px;">
                           @foreach($data->packages[$pack]->details as $val)
                              <li> <i class="fa fa-check col-purple"> </i> {{$val->service}} </li>
                           @endforeach
                        </ul>
                     </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12 col-lg-3 col-sm-12 col-12">
            <form class="checkout-extra" method="post" action="{{route('web.checkout')}}">
               @csrf
               <input type="hidden" name="lid" value="{{base64_encode($data->id)}}">
               <input type="hidden" name="pack_id" value="{{base64_encode($pack)}}">
               <input type="hidden" name="type" value="{{base64_encode($type)}}">

               <div class="summary-box m-t-30">
                  <h5 class="col-white"> {{ __('content.Summary') }} </h5>
                  <table>
                     <tbody>
                        <tr>
                           <th class="col-white"> {{ __('content.Total Amount') }} </th>
                           @if ($price != null)
                           <th class="col-purple"> {{'$'.number_format($price)}} </th>
                           @else
                            @if (!empty($data->packages[$pack]->price))
                            <th class="col-purple"> {{'$'.number_format($data->packages[$pack]->price)}} </th>
                            @else
                            <th class="col-purple"> Free </th>
                            @endif
                           @endif
                        </tr>
                        <tr>
                           <td colspan="2" class="text-center no-border">
                              <button class="custom-btn1 bg-purple col-white rounded block-element2 m-t-10"> {{ __('content.Continue to Checkout') }}
                                @if ($price != null)
                                   ({{'$'.number_format($price)}})
                                @else
                                    @if (!empty($data->packages[$pack]->price))
                                        ({{'$'.number_format($data->packages[$pack]->price)}})
                                    @endif
                                @endif
                              </button>
                              <p class="col-white m-t-10 m-b-0">{{ __('content.Slogan') }} {{ __('content.You won`t be charged yet') }}  </p>
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

