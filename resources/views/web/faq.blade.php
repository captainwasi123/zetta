@extends('web.support.master2')
@section('title', 'FAQ')
@section('addStyle')
<style>
    
</style>
@endsection
@section('content')

<style type="text/css">
   .term-sec1 h2 {
    color: white;
    text-align: center;
    letter-spacing: 1px;
    padding-top: 20px;
}
.term-sec1 p {
    font-size: 15px;
    letter-spacing: 0.6px;
    line-height: 26px;
    font-weight: 300;
    color: white;
}
.term-sec1 h3 {
    font-size: 24px;
    font-weight: 500;
    letter-spacing: 1px;
    color: white;
    padding-top: 30px;
}

.term-sec1 ul li
{
   font-size: 15px;
    letter-spacing: 0.6px;
    line-height: 26px;
    font-weight: 300;
    color: white;
}
section.action-bar {
    margin-top: 78px;
}
</style>


<section class="action-bar">
   <div class="container">
      <div class="term-sec1">
         <h2>{{ __('content.FAQ') }}  </h2>
         
         <h3>{{ __('content.How to become a coach:') }}  </h3>
         <p>{{ __('content.Becoming a coach has never been easier! Zettaa will match you with the perfect clients and help you build up your customer base. You will have to create your coach account by filling up all the informations relative to your skills and competence, and then you will create your lessons with the help of our filters which will help you find the perfect client for your lessons. Oh and zettaa also helps you with your scheduling as well as for a secure payment that will guarantee you safety. And all of this is free of charge!!!') }} </p>

         <h3>{{ __('content.Sportbuddy:') }} </h3>
         <p>{{ __('content.The sportbuddy section is meant for people that are looking for friends or activities in their area. You will be able to post your activities,  with our filters (level, age, number of participants) we will help you find the perfect participants. You can also look for activities created by other Sportbuddies in your area and participate in them freely. If you practice an activity that requires equipment you will be able to rent it for a fee that you select. So join us and start building your community!') }}  </p>
         <p>{{ __('content.2.2 “Confidential Information” shall mean the Content and any information, technical data, or know-how considered proprietary or confidential by either party to these terms and conditions disclosed by either party, either directly or indirectly in any form whatsoever, including in writing, orally, machine readable form.') }} </p>

         <h3>{{ __('content.Become a partner:') }} </h3>
         <p>{{ __('content.If you think that Zettaa can benefit your business or association please contact us at <b>partners@zettaa.ch </b>. We are always looking for new opportunities to help the community grow.') }} </p>

         <h3>{{ __('content.Type of lesson:') }} </h3>
         <p>{{ __('content.Our coaches will offer two kind of lessons, Personal and group lesson. If you are looking for a one on one session to improve your health or help you achieve your goals a personal lesson is what you need. If you like to workout with other people and use that as a motivation to exercise then the group lesson is meant for you.') }}  </p>

         <h3>{{ __('content.Equipement:') }} </h3>
         <p><B>{{ __('content.Equipment:') }} </B> {{ __('content.On Zettaa you will be able to add the equipment you have on your dashboard. By doing this you will be able to share your equipment with other sportbuddies. You will set the price of the equipment yourself and will benefit from our safe payment methods.') }} </p>
     </div>
   </div>
</section>
@endsection
