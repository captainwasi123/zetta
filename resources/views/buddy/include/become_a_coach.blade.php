@extends('buddy.include.master')
@section('title', 'Become a Coach')

@section('content')
<div class="row">
   <div class="col-md-12">
      <h4 class="col-white">Want to become a Coach and a member of the Zettaa Team?</h4>
   </div>
</div>
<div class="box-wrapper1">
   <div class="block-element">
      <div class="row">
         <div class="col-md-12">
            <form method="post" action="{{route('buddy.coach.request')}}">
               @csrf
               <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
               <div class="card">
                  <div class="col-white become_coach">
                     
                     <div class="row">
                          <div class="col-md-12">
                             <label>1. Have you ever coached?</label>
                             <br> 
                             <input type="radio" id="yes" name="answer1" value="Yes"><label for="yes">Yes</label>
                             <input type="radio" id="no" name="answer1" value="No" checked><label for="no">No</label>
                             
                             <br><br>
                             <textarea name="answer1Detail" class="form-control" placeholder="If Yes or not please explain." cols="5" required></textarea>
                          </div>
                      </div>
                      <br>
                      <div class="row">
                          <div class="col-md-12">
                             <label>2. What motivated you to become a coach? Is this your main activity? </label>
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
                             <input type="radio" id="yes2" name="answer4" value="Yes"><label for="yes2">Yes</label>
                             <input type="radio" id="no2" name="answer4" value="No" checked><label for="no2">No</label>
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
                              <input type="checkbox" id="agree" name="agree" value="1" required>
                              <label for="agree">By checking this box, you declare that you have read and understood the Coach Label Zettaa document and agree to refer to it when you are in contact with your Zettaa customers.</label>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                             <button type="submit">Become a Coach</button>
                          </div>
                      </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection
