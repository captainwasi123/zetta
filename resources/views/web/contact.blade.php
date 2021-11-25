@extends('web.support.master2')
@section('title', 'Contact')
@section('content')


<style type="text/css">
   .action-bar{
    background-image: url('{{URL::to("/assets/website")}}/images/banner-contact-us.png') !important;
    background-size: cover !important;
}
.custom-container {
    width: 100% !important;
    max-width: 1300px !important;
}
</style>


<section class="action-bar">
   <div class="container custom-container">
     <!-- <div class="term-sec1">
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
     </div> -->
     <div class="contact-div">
        <h1>CONTACT US</h1>
     </div>
   </div>
</section>
<section class="action-bar-2">
   <div class="container custom-container ">
      <div class="contact-div-2">
         <div class="row">
            <div class="col-lg-7">
               <div class="right-pd">
               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <h5>HAVE A QUESTION?</h5>                     
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <h1>SEND MESSAGE</h1>    
                  </div>
               </div>
               <form>
                  <div class="row">
                     <div class="col-lg-6 pl-1 pr-1">
                        <div class="form-group">
                           <input type="text" class="form-control" id="usr" placeholder="Name">
                        </div>         
                     </div>
                     <div class="col-lg-6 pl-1 pr-1">
                        <div class="form-group">
                           <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>       
                     </div>
                  </div>
               
               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <div class="form-group">
                        <textarea rows="6" class="form-control" id="textarea" placeholder="Message"></textarea>
                     </div>      
                  </div>
               </div>
               
               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <div class="form-group">
                        <input type="checkbox" id="" name="checkbox" value=""><label for=""> I agree that my submitted data is being collected and stored.</label>               
                     </div>      
                  </div>
               </div>
               
               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <div class="form-group">
                        <button type="submit">SEND MESSAGE</button>               
                     </div>
                  </div>
               </div>
               </form>
            </div>
            </div>
            <div class="col-lg-5">
               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <h5 id="contact-info">CONTACT INFO</h5>                  
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1 pb-5" id="find-us">
                     <h1>FIND US</h1>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1 ">
                     <h6>Location</h6>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1 pb-3">
                     <p>118N Main St, Trumbauersville, United States<p>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <h6>Phone</h6>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1 pb-3">
                     <p>2155655845<p>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <h6>Email</h6>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <p>abc@gooddesignin.com<p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
