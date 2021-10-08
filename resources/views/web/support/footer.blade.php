<footer class="bg-dark">
     <div class="container-fluid">
        <div class="row">
           <div class="col-md-3 col-lg-3 col-sm-12 col-12">
              <div class="footer-about">
                 <a href=""> <img src="{{URL::to('/assets/website')}}/images/zetta-logo.png"> </a>
                 <p> Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface. </p>
                 <ul>
                    <li> <a href=""> <i class="fa fa-phone"> </i> 2155655845 </a> </li>
                    <li> <a href=""> <i class="fa fa-map-marker"> </i> 3 rue du Port, 1204 Genève, Switzerland </a> </li>
                    <li> <a href=""> <i class="fa fa-envelope"> </i> info@zettaa.ch </a> </li>
                 </ul>
                 <a href="javascript::void(0)"  style="color: #a5a5a5 !important;" data-toggle="modal" data-target="#languages">
                  <span class="fa fa-globe"></span> &nbsp; English 
               </a>

                <div class="modal fade" id="languages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Choose a language</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <ul class="languages_list">
                          <li><a href="#"><img src="{{URL::to('/assets/website')}}/images/flag-1.jpg"> &nbsp; Chinese  &nbsp;<span class="fa fa-check"></span></a></li>
                          <li><a href="#"><img src="{{URL::to('/assets/website')}}/images/flag-2.jpg">  &nbsp; Spanish  &nbsp;</a></li>
                          <li><a href="#"><img src="{{URL::to('/assets/website')}}/images/flag-3.jpg">  &nbsp; Spanish  &nbsp;</a></li>
                       </ul>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
           </div>
           
           <div class="col-md-3 col-lg-3 col-sm-12 col-12">
              <div class="footer-list">
                 <h4 class="col-white"> QUICK MENU </h4>
                 <ul>
                    <li> <a href="{{URL::to('/')}}"> Home </a> </li>
                    
                    <li> <a href="{{route('web.all','Coaches')}}"> Coaches </a> </li>
                    <li> <a href="{{route('web.all','Sports Buddies')}}"> Sports Buddy </a> </li>
                    <li> <a href="{{route('web.all','Lessons')}}"> Lesson </a> </li>
                    <li> <a href="{{route('web.all','Activities')}}"> Activity </a> </li>
                    <li> <a href="{{URL::to('/')}}#mapa"> Near Me </a> </li>

                 </ul>
              </div>
           </div>
           <style type="text/css">
             .secure img {
    padding-bottom: 15px;
}
.secure {
    padding-top: 20px;
}
           </style>
           <div class="col-md-3 col-lg-3 col-sm-12 col-12">
              <div class="footer-list">
                 <h4 class="col-white"> ABOUT </h4>
                 <ul>
                    <li> <a href="{{URL::to('about_us')}}">About Us </a> </li>
                    <li> <a href="#"> Partnership  </a> </li>
                    <li> <a href="#"> Press  </a> </li>
                    <li> <a href="#"> Contact  </a> </li>
                    <li> <a href="{{route('web.faq')}}"> Faq </a> </li>
                    <li> <a href="{{route('web.terms')}}"> Terms & Condition  </a> </li>
                    <li> <a href="#"> Privacy Policy </a> </li>
                    <!-- <li> <a href="{{route('web.refund_cancel_policy')}}"> Refund Policy </a> </li>      
                    <li> <a href="{{route('web.cookie_policy')}}"> Cookie Policy </a> </li>      -->               
                 </ul>
              </div>
           </div>
           <div class="col-md-3 col-lg-3 col-sm-12 col-12">
              <div class="footer-list">
                 <h4 class="col-white"> SOCIAL MEDIA </h4>
                 <ul>
                    <li> <a href=""> <img src="{{URL::to('/assets/website')}}/images/fb-icon.jpg"> </a> <a href=""> <img src="{{URL::to('/assets/website')}}/images/twitter-icon.jpg"> </a> <a href=""> <img src="{{URL::to('/assets/website')}}/images/linkedin-icon.jpg"> </a><a href=""> <img src="{{URL::to('/assets/website')}}/images/insta-icon.jpg"> </a></li>
                    <div class="secure">
                      <img src="{{URL::to('/assets/website')}}/images/verifiedsecure.png" width="100%">
                      <img src="{{URL::to('/assets/website')}}/images/payment.png" width="100%">                      
                    </div>
                    
                 </ul>
              </div>
           </div>
        </div>
     </div>
  </footer>

<section class="copyright-sec bg-purple text-center">
 	<span class="col-white"> © 2021 zettaa. All Rights Reserved </span>
</section>
