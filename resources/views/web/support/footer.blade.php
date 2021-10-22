<footer class="bg-dark">
     <div class="container-fluid">
        <div class="row">
           <div class="col-md-3 col-lg-3 col-sm-12 col-12">
              <div class="footer-about">
                 <a href=""> <img src="{{URL::to('/assets/website')}}/images/zetta-logo.png"> </a>
                 <p> United through sport	 </p>
                 

                 <div class="footer-list-c">
                  {{--  <h4 class="col-white"> {{ __('content.SOCIAL MEDIA') }} </h4>  --}}
                 <ul>
                    <li> <a href=""> <img src="{{URL::to('/assets/website')}}/images/fb-icon.jpg"> </a> <a href=""> <img src="{{URL::to('/assets/website')}}/images/twitter-icon.jpg"> </a> <a href=""> <img src="{{URL::to('/assets/website')}}/images/linkedin-icon.jpg"> </a><a href=""> <img src="{{URL::to('/assets/website')}}/images/insta-icon.jpg"> </a></li>
                 </ul>
              </div>
                 <ul>
                    
                    {{--  <li> <a href=""> <i class="fa fa-phone"> </i> 2155655845 </a> </li>  --}}
                    <li> <a href=""> <i class="fa fa-map-marker"> </i> {{ __('content.3 rue du Port, 1204 Genève, Switzerland') }} </a> </li>
                    <li> <a href=""> <i class="fa fa-envelope"> </i> info@zettaa.ch </a> </li>
                 </ul>
                 <a href="javascript::void(0)"  style="color: #a5a5a5 !important;" data-toggle="modal" data-target="#languages">
                  <span class="fa fa-globe"></span> &nbsp; {{ __('content.language') }}
                                                         
               </a>

                <div class="modal fade" id="languages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">{{ __('content.Choose a language') }}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <ul class="languages_list">
                          <li>
                         
                          <a href="{{URL::to('/lang/en')}}">
                          <img src="{{URL::to('/assets/website')}}/images/flag-2.jpg"> 
                          &nbsp; English  &nbsp;
                          @if(session()->has('locale'))
                             @if (session()->get('locale') == 'en')
                                 <span class="fa fa-check"></span>
                             @endif
                          @else
                             <span class="fa fa-check"></span>
                          @endif
                        
                          </a>
                          </li>

                          <li><a href="{{URL::to('/lang/gr')}}">
                          <img src="{{URL::to('/assets/website')}}/images/flag-3.jpg">
                           &nbsp; Deutsch  &nbsp;
                           @if (session()->has('locale'))
                               @if (session()->get('locale') == 'gr')
                                <span class="fa fa-check"></span>
                               @endif  
                           @endif
                           </a></li>
                          <li>
                          <a href="{{URL::to('/lang/sp')}}">
                          <img src="{{URL::to('/assets/website')}}/images/flag-4.jpg">  
                          &nbsp; Spanisch  &nbsp;
                            @if (session()->has('locale'))
                               @if (session()->get('locale') == 'sp')
                                <span class="fa fa-check"></span>
                               @endif  
                           @endif
                          </a>
                          </li>
                          <li>
                          <a href="{{URL::to('/lang/fr')}}">
                          <img src="{{URL::to('/assets/website')}}/images/flag-1.jpg">
                            &nbsp; Französisch  &nbsp;
                            @if (session()->has('locale'))
                               @if (session()->get('locale') == 'fr')
                                <span class="fa fa-check"></span>
                               @endif  
                           @endif
                            </a>
                            </li>
                       </ul>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
           </div>

           <div class="col-md-3 col-lg-3 col-sm-12 col-12">
              <div class="footer-list">
                 <h4 class="col-white"> {{ __('content.QUICK MENU') }} </h4>
                 <ul>
                    <li> <a href="{{URL::to('/')}}"> Home </a> </li>

                    <li> <a href="{{route('web.all','Coaches')}}"> {{ __('content.Coach') }} </a> </li>
                    <li> <a href="{{route('web.all','Sports Buddies')}}"> {{ __('content.Sports Buddy') }} </a> </li>
                    <li> <a href="{{route('web.all','Lessons')}}"> {{ __('content.Lesson') }} </a> </li>
                    <li> <a href="{{route('web.all','Activities')}}"> {{ __('content.Activity') }} </a> </li>
                    <li> <a href="{{URL::to('/')}}#mapa"> {{ __('content.Near Me') }} </a> </li>

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
                 <h4 class="col-white"> {{ __('content.ABOUT') }}</h4>
                 <ul>
                     <li> <a href="{{URL::to('about_us')}}">{{ __('content.About Usf').' Zettaa' }} </a> </li>
                    <li> <a href="#"> {{ __('content.Contact') }}  </a> </li>
                    <li> <a href="#"> Label Coach </a> </li>
                    <li> <a href="#"> Partnership </a> </li>

                 
                 </ul>
              </div>
           </div>
           <div class="col-md-3 col-lg-3 col-sm-12 col-12">
              <div class="footer-list">
              
              <h4 class="col-white"> {{ __('content.support') }}</h4>
                    <ul>
                     {{--  <li> <a href="{{URL::to('about_us')}}">{{ __('content.About Usf').' Zettaa' }} </a> </li>
                    <li> <a href="#"> {{ __('content.Contact') }}  </a> </li>
                    <li> <a href="#"> Label Coach </a> </li>
                    <li> <a href="#"> Partnership </a> </li>  --}}

                    <li> <a href="{{route('web.faq')}}"> {{ __('content.Faq') }} </a> </li>
                    <li> <a href="{{route('web.terms')}}"> {{ __('content.Terms & Condition') }}  </a> </li>
                    <li> <a href="{{route('web.cookiePolicy')}}"> {{ __('content.Cookie Policy') }} </a> </li>
                    {{--  <li> <a href="{{route('web.disclaimerPolicy')}}"> {{ __('content.Disclaimer Policy') }} </a> </li>
                     <li> <a href="{{route('web.refund_cancel_policy')}}"> {{ __('content.Refund Policy') }} </a> </li>  --}}
                   
                 </ul>
                 {{--  <h4 class="col-white"> {{ __('content.SOCIAL MEDIA') }} </h4>  --}}
                 {{--  <ul>
                    <li> <a href=""> <img src="{{URL::to('/assets/website')}}/images/fb-icon.jpg"> </a> <a href=""> <img src="{{URL::to('/assets/website')}}/images/twitter-icon.jpg"> </a> <a href=""> <img src="{{URL::to('/assets/website')}}/images/linkedin-icon.jpg"> </a><a href=""> <img src="{{URL::to('/assets/website')}}/images/insta-icon.jpg"> </a></li>
                    <div class="secure">
                      <img src="{{URL::to('/assets/website')}}/images/verifiedsecure.png" width="100%">
                      <img src="{{URL::to('/assets/website')}}/images/payment.png" width="100%">
                    </div>

                 </ul>  --}}
              </div>
           </div>
        </div>
     </div>
  </footer>

<section class="copyright-sec bg-purple text-center">
 	<span class="col-white"> © 2021 zettaa. {{ __('content.All Rights Reserved') }} </span>
</section>
