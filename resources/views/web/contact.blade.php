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
     <div class="contact-div">
        <h1>{{ __('content.Contact_CONTACT US') }}</h1>
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
                     <h5>{{ __('content.Contact_HAVE A QUESTION?') }}</h5>                     
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <h1>{{ __('content.Contact_SEND MESSAGE') }}</h1>    
                  </div>
               </div>
               <form>
                  <div class="row">
                     <div class="col-lg-6 pl-1 pr-1">
                        <div class="form-group">
                           <input type="text" class="form-control" id="usr" placeholder="{{ __('content.Contact_Name') }}">
                        </div>         
                     </div>
                     <div class="col-lg-6 pl-1 pr-1">
                        <div class="form-group">
                           <input type="email" class="form-control" id="email" placeholder="{{ __('content.Contact_Email') }}">
                        </div>       
                     </div>
                  </div>
               
               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <div class="form-group">
                        <textarea rows="6" class="form-control" id="textarea" placeholder="{{ __('content.Contact_Message') }}"></textarea>
                     </div>      
                  </div>
               </div>
               
               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <div class="form-group">
                        <input type="checkbox" id="" name="checkbox" value=""><label for=""> {{ __('content.I agree that my submitted data is being collected and stored') }}</label>               
                     </div>      
                  </div>
               </div>
               
               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <div class="form-group">
                        <button type="submit">{{ __('content.Contact_SEND MESSAGE') }}</button>               
                     </div>
                  </div>
               </div>
               </form>
            </div>
            </div>
            <div class="col-lg-5">
               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <h5 id="contact-info">{{ __('content.Contact_CONTACT INFO') }}</h5>                  
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1 pb-5" id="find-us">
                     <h1>{{ __('content.Contact_FIND US') }}</h1>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1 ">
                     <h6>{{ __('content.Contact_Location') }}</h6>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1 pb-3">
                     <p>3 rue du Port, 1204 Geneva, Switzerland<p>
                  </div>
               </div>

               

               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                     <h6>{{ __('content.Contact_Email') }}</h6>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12 pl-1 pr-1">
                    <a href="mailto:info@zettaa.ch" alt=""> <p>info@zettaa.ch<p></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
