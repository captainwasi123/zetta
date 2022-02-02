<div class="modal fade register-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width: 500px;">
      <div class="modal-content" id="r_content">
         <div class="join-pop-head">
            <h3> {{ __('content.Join')}} Zettaa <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> </h3>
         </div>
         <div id="r_social">
            <div class="join-social">
               <a href="{{ url('auth/facebook') }}"> <i class="fab fa-facebook-f"> </i>   Continue with Facebook </a>
               
            </div>
            <div class="join-socialg">
                <a href="{{ url('auth/google') }}"> <i><img class="img-goolge" src="{{URL::to('/public/google.png')}}"  height="16" width="16"> </i> {{ __('content.Continue with Google')}}  </a>
             </div>
            <div class="join-or">
               <p> <b>  OR </b> </p>
            </div>
         </div>
         <div class="join-form">
            <form id="register-form" action="{{URL::to('/register')}}">
               {{csrf_field()}}
               <input type="email" class="email_reg" placeholder="{{ __('content.Enter your email')}}" name="email" required>
               <span id="r_error" class="error_span"></span>
               <div id="r_fields">

               </div>
               <button type="submit">  {{ __('content.Continue')}}  </button>
               <p>  {{ __('content.By joining I agree to receive emails')}} from Zettaa </p>
            </form>
         </div>
         <div class="join-already">
            <p>  {{ __('content.Already a member?')}} <a href="javascript:void(0)" class="open-login" data-dismiss="modal"> {{ __('content.Sign In')}}  </a> </p>
         </div>
      </div>
   </div>
</div>

{{--  forget password  --}}

<div class="modal fade forgotPassword-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width: 500px;">
      <div class="modal-content" id="fp_content">
         <div class="join-pop-head">
            <h3> {{ __('content.Reset your password')}} <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> </h3>
         </div>
         <div class="join-form reset-form">
            <p>  {{ __('content.Enter your email address below to reset password')}}</p>
            <form id="forgot-form" action="{{URL::to('/forgot-password')}}">
               {{csrf_field()}}
               <input type="email" class="email_reg" placeholder="{{ __('content.Enter your email')}}" name="email" required>
               <span id="fp_error" class="error_span"></span>
               <button type="submit">  {{ __('content.Continue')}}  </button>
            </form>
         </div>
         <div class="join-already">
            <p>  {{ __('content.Already a member?')}} <a href="javascript:void(0)" class="open-login" data-dismiss="modal"> {{ __('content.Sign In')}}  </a> </p>
         </div>
      </div>
   </div>
</div>



{{-- for buddy --}}

<div class="modal fade register-modal-buddy" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 500px;">
       <div class="modal-content" id="r_content_buddy">
          <div class="join-pop-head">
             <h3>  {{ __('content.Join')}} Zettaa <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> </h3>
          </div>
          <div id="r_social_buddy">
             <div class="join-social">
                <a href="{{ url('auth/facebook') }}"> <i class="fab fa-facebook-f"> </i>  {{ __('content.Continue with Facebook')}} </a>
                
             </div>
              <div class="join-socialg">
                <a href="{{ url('auth/google') }}"> <i><img class="img-goolge" src="{{URL::to('/public/google.png')}}"  height="16" width="16"> </i> {{ __('content.Continue with Google')}}  </a>
             </div>
             <div class="join-or">
                <p> <b> OR </b> </p>
             </div>
          </div>
          <div class="join-form">
             <form id="register-form-buddy" action="{{URL::to('/register')}}">
                {{csrf_field()}}
                <span id="r_error_buddy" class="error_span"></span>
                <input type="email" class="email" placeholder="{{ __('content.Enter your email')}}" name="email" required>
                <div id="r_fields_buddy">

                <button type="submit" class="signUpStep1">  {{ __('content.Continue')}}  </button>
                </div>
                <p>  {{ __('content.By joining I agree to receive emails from')}} Zettaa </p>
             </form>
          </div>
          <div class="join-already">
             <p> Already a member? <a href="javascript:void(0)" class="open-login" data-dismiss="modal"> Sign In </a> </p>
          </div>
       </div>
    </div>
</div>



<div class="modal fade login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width: 500px;">
      <div class="modal-content" id="l_content">
         <div class="join-pop-head">
            <h3> Sign In Zettaa <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> </h3>
         </div>
         <div class="join-social">
            <a href="{{ url('auth/facebook') }}"> <i class="fab fa-facebook-f"> </i>  {{ __('content.Continue with Facebook')}} </a>
         </div>
         <div class="join-socialg">
                <a href="{{ url('auth/google') }}"> <i><img class="img-goolge" src="{{URL::to('/public/google.png')}}"  height="16" width="16"> </i>  {{ __('content.Continue with Google')}} </a>
             </div>
         <div class="join-or">
            <p> <b>  {{ __('content.OR')}} </b> </p>
         </div>
         <div class="join-form">
            <form id="login-form" action="{{URL::to('/login')}}">
               {{csrf_field()}}
               <input type="text" placeholder=" {{ __('content.Enter your email Or username')}}" name="email" required>
               <input type="password" placeholder=" {{ __('content.Enter your password')}}" name="password" required>
               <span id="l_error" class="error_span"></span>
               <button type="submit"> {{ __('content.Sign In')}} </button>
            </form>
         </div>
         <div class="join-already">
            <p>  {{ __('content.Forgot your password?')}} <a href="javascript:void(0)" class="open-forgot"> Reset </a> </p>
            <p>  {{ __('content.Don`t have an account?')}} <a href="javascript:void(0)" class="open-join-buddy"> Sign Up </a> </p>
         </div>
      </div>
   </div>
</div>


@if(Auth::check() && Auth::user()->type == '0')
   <div class="modal fade type-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document" style="max-width: 500px;">
         <div class="modal-content" id="o_content">
            <div class="join-pop-head">
               <h3>  {{ __('content.Select User Type')}} </h3>
               <hr>
            </div>
            <div class="type-form">
               <form method="post" action="{{URL::to('/users/type/setup')}}">
                  {{csrf_field()}}

                  <input class="form-check-input" type="hidden" name="usertype" value="1" id="employer" checked>
                     {{-- I am a / an: <br>
                     <label class="form-check-label" for="employer">
                        <div class="form-check">
                           <input class="form-check-input" type="radio" name="usertype" value="1" id="employer" checked>
                           Buddy
                        </div>
                     </label>

                     <label class="form-check-label" for="helper">
                        <div class="form-check">
                           <input class="form-check-input" type="radio" name="usertype" value="2" id="helper">
                           Coach
                        </div>
                     </label> --}}

                  <button type="submit"> Submit  </button>
               </form>
            </div>
         </div>
      </div>
   </div>
@endif


<div class="modal fade coachBecomeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg2" role="document" style="max-width: 800px;">
      <div class="modal-content" id="r_content">
         <div class="join-pop-head">
            <h3>  {{ __('content.Become a Coach')}} <h3>
         </div>
         <div class="card become_coach">
            <form method="post" action="{{route('buddy.coach.request')}}">
               {{csrf_field()}}
               <div class="col-white">
                  <div class="row">
                       <div class="col-md-12">
                          <label>1.  {{ __('content.Have you ever coached?')}}</label>
                          <br> 
                          <input type="radio" id="yes" name="answer1" value="Yes"><label for="yes">Yes</label>
                          <input type="radio" id="no" name="answer1" value="No" checked><label for="no">No</label>
                          
                          <br><br>
                          <textarea name="answer1Detail" class="form-control" placeholder=" {{ __('content.If Yes or not please explain.')}}" cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                          <label>2.  {{ __('content.What motivated you to become a coach? Is this your main activity?')}} </label>
                          <br>
                          <input type="radio" id="yes1" name="answer2" value="Yes"><label for="yes1">Yes</label>
                          <input type="radio" id="no1" name="answer2" value="No" checked><label for="no1">No</label>
                          <br><br>
                          <textarea name="answer2Detail" class="form-control" placeholder="If not, what is your main occupation?" cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                          <label>3.  {{ __('content.Do you have a qualification or diploma in a sport-related discipline? (Ex. Nutrition; physiotherapy; sports coaching etc.)')}} </label>
                          <br>
                          <textarea name="answer3Detail" class="form-control" placeholder="" cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                          <label>4. Have you practiced a sport for many years or even at high level?  </label>
                          <br>
                          <input type="radio" id="yes2" name="answer4" value="Yes"><label for="yes2">Yes</label>
                          <input type="radio" id="no2" name="answer4" value="No" checked><label for="no2">No</label>
                          <br><br>
                          <textarea name="answer4Detail" class="form-control" placeholder=" {{ __('content.If so, how many years? At what level? Which sport?')}}" cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                          <label>5.  {{ __('content.As a coach, what are the qualities that make you an exceptional instructor?')}} </label>
                          <br>
                          <textarea name="answer5Detail" class="form-control" placeholder="" cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                          <label>6.  {{ __('content.As an athlete, what do you think are the fundamental values for progress?')}}</label>
                          <br>
                          <textarea name="answer6Detail" class="form-control" placeholder="" cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                          <label>7.  {{ __('content.Bonus : Share with us your worst/best memory during a training or a competition.')}}</label>
                          <br>
                          <textarea name="answer7Detail" class="form-control" placeholder="" cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                           <input type="checkbox" id="agree" name="agree" value="1" required>
                           <label for="agree"> {{ __('content.By checking this box, you declare that you have read and understood the Coach Label Zettaa document and agree to refer to it when you are in contact with your Zettaa customers.')}}</label>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-md-12">
                          <button type="submit"> {{ __('content.Become a Coach')}}</button>
                       </div>
                   </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>