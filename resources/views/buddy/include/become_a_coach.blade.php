@extends('buddy.include.master')
@section('title', 'Become a Coach')

@section('content')
<div class="box-wrapper1">
   <div class="block-element">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="col-white become_coach">
                  <div class="row">
                       <div class="col-md-12">
                          <label>1. Have you ever coached?</label>
                          <br> 
                          <input type="radio" id="yes" name="one" value="HTML"><label for="yes">Yes</label>
                          <input type="radio" id="no" name="one" value="CSS"><label for="no">No</label>
                          <!-- <input class="form-check-input" type="radio" name="answer1" id="flexRadioDefault1" value="Yes">
                          <label class="form-check-label" for="flexRadioDefault1">
                              Yes
                          </label>
                          &nbsp;&nbsp;&nbsp;
                          <input class="form-check-input" type="radio" name="answer1" id="flexRadioDefault2" value="No" checked>
                          <label class="form-check-label" for="flexRadioDefault2">
                              No
                          </label> -->
                          
                          <br><br>
                          <textarea name="answer1Detail" class="form-control" placeholder="If Yes or not please explain." cols="5" required></textarea>
                       </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                          <label>2. What motivated you to become a coach? Is this your main activity? </label>
                          <br>
                          <input type="radio" id="yes1" name="second" value="HTML"><label for="yes1">Yes</label>
                          <input type="radio" id="no1" name="second" value="CSS"><label for="no1">No</label>
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
                          <input type="radio" id="yes2" name="four" value="HTML"><label for="yes2">Yes</label>
                          <input type="radio" id="no2" name="four" value="CSS"><label for="no2">No</label>
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
                          <label>By checking this box, you declare that you have read and understood the Coach Label Zettaa document and agree to refer to it when you are in contact with your Zettaa customers.</label>
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
      <!-- BEGIN MODAL -->
      <div class="modal none-border" id="my-event">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title"><strong>Add Event</strong></h4>
                  <button type="button" class="close" data-dismiss="modal"
                     aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body"></div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-white waves-effect"
                     data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-success save-event waves-effect waves-light">Create
                  event</button>
                  <button type="button" class="btn btn-danger delete-event waves-effect waves-light"
                     data-dismiss="modal">Delete</button>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal Add Category -->
      <div class="modal fade none-border" id="add-new-event">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title"><strong>Add</strong> a category</h4>
                  <button type="button" class="close" data-dismiss="modal"
                     aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <form role="form">
                     <div class="row">
                        <div class="col-md-6">
                           <label class="control-label">Category Name</label>
                           <input class="form-control form-white" placeholder="Enter name" type="text"
                              name="category-name" />
                        </div>
                        <div class="col-md-6">
                           <label class="control-label">Choose Category Color</label>
                           <select class="form-control form-white" data-placeholder="Choose a color..."
                              name="category-color">
                              <option value="success">Success</option>
                              <option value="danger">Danger</option>
                              <option value="info">Info</option>
                              <option value="primary">Primary</option>
                              <option value="warning">Warning</option>
                              <option value="inverse">Inverse</option>
                           </select>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger waves-effect waves-light save-category"
                     data-dismiss="modal">Save</button>
                  <button type="button" class="btn btn-white waves-effect"
                     data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
