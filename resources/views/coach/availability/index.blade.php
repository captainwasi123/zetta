@extends('coach.include.master')
@section('title', 'Availability')

@section('content')

<div class="box-wrapper1">
   <div class="block-element ">
      <form method="post" action="{{route('coach.availability.addSlot')}}">
         @csrf
         <div class="row">
            <div class="col-md-3">
               <div class="available-day m-b-30">
                  <select class="form-field3 select-bg1" name="day" required>
                     <option> Monday </option>
                     <option> Tuesday </option>
                     <option> Wednesday </option>
                     <option> Thursday </option>
                     <option> Friday </option>
                     <option> Saturday </option>
                     <option> Sunday </option>
                  </select>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-9 col-lg-9  col-12">
               <div class="slot-1">
                  <span class="col-white"> First Booking </span>
                  <input class="clockpicker form-field4" type="text" name="start_time" value="13:14" data-placement="bottom" data-align="top" data-autoclose="true" required>
               </div>
               <div class="slot-1">
                  <span class="col-white"> Last Booking </span>
                  <input class="clockpicker form-field4" type="text" value="13:14" data-placement="bottom" data-align="top" data-autoclose="true" name="end_time" required>
               </div>
               <div class="slot-1">
                  <span class="col-white"> Lesson </span>
                  <select class="form-field4" name="lesson_id" required>
                     <option value=""> Select </option>
                     @foreach($lessons as $val)
                        <option value="{{$val->id}}">{{$val->title}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="col-md-3 col-lg-3 col-12">
               <p>   <button class="submit-btn1 equal-btn1" > <i class="fa fa-plus"> </i> ADD </button>  </p>
            </div>
         </div>
      </form>
      <div class="row">
         <div class="col-md-12 col-lg-12 col-md-12 col-12 m-t-20">
            <div class="border-custom1">
            </div>
         </div>
         <div class="col-md-12 col-lg-12 col-md-12 col-12 m-t-20">
            <table class="table table-white">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Lesson</th>
                     <th>Start Time</th>
                     <th>End Time</th>
                     <th>Day</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($slots as $key => $val)
                     <tr>
                        <td>{{++$key}}</td>
                        <td>{{empty($val->lesson) ? '' : $val->lesson->title}}</td>
                        <td>{{date('h:i a', strtotime($val->start_time))}}</td>
                        <td>{{date('h:i a', strtotime($val->end_time))}}</td>
                        <td>{{$val->day}}</td>
                        <td><a href="javascript:void(0)" class="btn btn-sm btn-danger deleteItem" data-href="{{route('coach.availability.delete', base64_encode($val->id))}}"><i class="fa fa-trash"></i></a></td>
                     </tr>
                  @endforeach
                  @if(count($slots) == '0')
                     <tr>
                        <td colspan="6">No Slots Available.</td>
                     <tr>
                  @endif
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <div class="block-element m-t-30">
      <div class="row m-b-20">
         <div class="col-12">
            <h5 class="col-white"> Schedule your holidays. </h5>
         </div>
      </div>
      <div class="row">
         <div class="col-md-7 col-lg-5 col-12">
            <form method="post" action="{{route('coach.availability.addHoliday')}}">
               @csrf
               <div class="slot-2">
                  <span class="col-white"> Holidays </span>
                  <input type="text" class="form-field3 mydatepicker" name="holidate" placeholder="dd-mm-yyyy" required>
               </div>
         </div>
         <div class="col-md-5 col-lg-3  col-12">
               <p>   <button class="submit-btn1 equal-btn1"> <i class="fa fa-plus"> </i> ADD </button>  </p>
            </form>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 col-lg-4 col-md-4 col-12 m-t-20">
            <table class="table table-white">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Date</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($holidays as $key => $val)
                     <tr>
                        <td>{{++$key}}</td>
                        <td>{{date('d-M-Y', strtotime($val->date))}}</td>
                        <td><a href="javascript:void(0)" class="btn btn-sm btn-danger deleteItem" data-href="{{route('coach.availability.delete.holiday', base64_encode($val->id))}}"><i class="fa fa-trash"></i></a></td>
                     </tr>
                  @endforeach
                  @if(count($holidays) == '0')
                     <tr>
                        <td colspan="3">No Slots Available.</td>
                     <tr>
                  @endif
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <div class="block-element m-b-20 m-t-30">
      <div class="sec-head1">
         <h3> Timeline   </h3>
      </div>
   </div>
   <div class="block-element">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card-body b-l calender-sidebar bg-white">
                           <div id="calendar"></div>
                        </div>
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
@section('addStyle')

   <link href="{{URL::to('/')}}/assets/user_dashboard/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
   <link href="{{URL::to('/')}}/assets/user_dashboard/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('addScript')

   <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
   <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function(){
         'use strict'

         jQuery('.mydatepicker').datepicker({format: 'dd-mm-yyyy'});
         
         $('.clockpicker').clockpicker({
            donetext: 'Done',
         }).find('input').change(function() {
            console.log(this.value);
         });
      });
   </script>

@endsection