<div class="modal fade register-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width: 500px;">
      <div class="modal-content" id="r_content">
         <div class="join-pop-head">
            <h3> Join Zetta <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> </h3>
         </div>
         <div id="r_social">
            <div class="join-social">
               <a href="{{ url('auth/facebook') }}"> <i class="fab fa-facebook-f"> </i> Continue with Facebook </a>
               <a href="{{ url('auth/google') }}"> <i class="fab fa-google-plus-g"> </i> Continue with Google </a>
            </div>
            <div class="join-or">
               <p> <b> OR </b> </p>
            </div>
         </div>
         <div class="join-form">
            <form id="register-form" action="{{URL::to('/register')}}">
               {{csrf_field()}}
               <input type="email" class="email_reg" placeholder="Enter your email" name="email" required>
               <span id="r_error" class="error_span"></span>
               <div id="r_fields">

               </div>
               <button type="submit"> Continue  </button>
               <p> By joining I agree to receive emails from Zetta </p>
            </form>
         </div>
         <div class="join-already">
            <p> Already a member? <a href="javascript:void(0)" class="open-login" data-dismiss="modal"> Sign In </a> </p>
         </div>
      </div>
   </div>
</div>


{{-- for buddy --}}

<div class="modal fade register-modal-buddy" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 500px;">
       <div class="modal-content" id="r_content_buddy">
          <div class="join-pop-head">
             <h3> Join Zetta <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> </h3>
          </div>
          <div id="r_social_buddy">
             <div class="join-social">
                <a href="{{ url('auth/facebook') }}"> <i class="fab fa-facebook-f"> </i> Continue with Facebook </a>
                <a href="{{ url('auth/google') }}"> <i class="fab fa-google-plus-g"> </i> Continue with Google </a>
             </div>
             <div class="join-or">
                <p> <b> OR </b> </p>
             </div>
          </div>
          <div class="join-form">
             <form id="register-form-buddy" action="{{URL::to('/register')}}">
                {{csrf_field()}}
                <input type="email" class="email" placeholder="Enter your email" name="email" required>
                <span id="r_error_buddy" class="error_span"></span>
                <div id="r_fields_buddy">

                </div>
                <button type="submit"> Continue  </button>
                <p> By joining I agree to receive emails from Zetta </p>
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
            <h3> Sign In Zetta <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> </h3>
         </div>
         <div class="join-social">
            <a href="{{ url('auth/facebook') }}"> <i class="fab fa-facebook-f"> </i> Continue with Facebook </a>
            <a href="{{ url('auth/google') }}"> <i class="fab fa-google-plus-g"> </i> Continue with Google </a>
         </div>
         <div class="join-or">
            <p> <b> OR </b> </p>
         </div>
         <div class="join-form">
            <form id="login-form" action="{{URL::to('/login')}}">
               {{csrf_field()}}
               <input type="email" placeholder="Enter your email" name="email" required>
               <input type="password" placeholder="Enter your password" name="password" required>
               <span id="l_error" class="error_span"></span>
               <button type="submit"> Sign In  </button>
            </form>
         </div>
         <div class="join-already">
            <p> Don`t have an account? <a href="javascript:void(0)" class="open-join"> Sign Up </a> </p>
         </div>
      </div>
   </div>
</div>


@if(Auth::check() && Auth::user()->type == '0')
   <div class="modal fade type-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document" style="max-width: 500px;">
         <div class="modal-content" id="o_content">
            <div class="join-pop-head">
               <h3> Select User Type </h3>
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

