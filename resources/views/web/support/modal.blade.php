<div class="modal fade register-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width: 500px;">
      <div class="modal-content" id="r_content">
         <div class="join-pop-head">
            <h3> Join Zettaa <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> </h3>
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
             <h3> Join Zettaa <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> </h3>
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
            <h3> Sign In Zettaa <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> </h3>
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

<style type="text/css">

</style>
<div class="modal fade register-modalll" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg2" role="document" style="max-width: 800px;">
      <div class="modal-content" id="r_content">
         <div class="join-pop-head">
            <h3> Become a Coach <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> </h3>
         </div>
         <div class="card become_coach">
               <div class="col-white">
                  <div class="row">
                       <div class="col-md-12">

                          <label>1. Have you ever coached?</label>
                          <br>
                          <input type="radio" id="yes" name="first" value="HTML"><label for="yes"> &nbsp;Yes</label>
                          <input type="radio" id="no" name="first" value="CSS"><label for="no"> &nbsp;No</label>
                          <br>
                          <textarea name="answer1Detail" class="form-control" placeholder="If Yes or not please explain." cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                          <label>2. What motivated you to become a coach? Is this your main activity? </label>
                          <br>
                          <input type="radio" id="yes1" name="second" value="HTML"><label for="yes1">&nbsp;Yes</label>
                          <input type="radio" id="no1" name="second" value="CSS"><label for="no1">&nbsp;No</label>
                          <br><br>
                          <textarea name="answer2Detail" class="form-control" placeholder="If not, what is your main occupation?" cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                          <label>3. Do you have a qualification or diploma in a sport-related discipline? (Ex. Nutrition; physiotherapy; sports coaching etc.) </label>
                          <br>
                          <textarea name="answer3Detail" class="form-control" placeholder="" cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                          <label>4. Have you practiced a sport for many years or even at high level?  </label>
                          <br>
                          <input type="radio" id="yes2" name="four" value="HTML"><label for="yes2">&nbsp;Yes</label>
                          <input type="radio" id="no2" name="four" value="CSS"><label for="no2">&nbsp;No</label>
                          <br><br>
                          <textarea name="answer4Detail" class="form-control" placeholder="If so, how many years? At what level? Which sport?" cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                          <label>5. As a coach, what are the qualities that make you an exceptional instructor? </label>
                          <br>
                          <textarea name="answer5Detail" class="form-control" placeholder="" cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                          <label>6. As an athlete, what do you think are the fundamental values for progress?</label>
                          <br>
                          <textarea name="answer6Detail" class="form-control" placeholder="" cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                          <label>7. Bonus : Share with us your worst/best memory during a training or a competition.</label>
                          <br>
                          <textarea name="answer7Detail" class="form-control" placeholder="" cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                          <label><input type="checkbox"> &nbsp;By checking this box, you declare that you have read and understood the Coach Label Zettaa document and agree to refer to it when you are in contact with your Zettaa customers.</label>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-md-12">
                          <button type="button">Become a Coach</button>
                       </div>
                   </div>


 
               </div>
            </div>
      </div>
   </div>
</div>