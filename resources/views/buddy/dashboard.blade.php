@extends('buddy.include.master')
@section('title', 'Dashboard')

@section('content')

@php $list_item = array(); @endphp
<div class="box-wrapper1">

   <div class="block-element">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="chat-main-box inbox-aside">
                           <div class="chat-left-aside">
                              <div class="open-panel"><i class="ti-angle-right"></i></div>
                              <div class="chat-left-inner">
                                 <div class="chat-sidebar-head">
                                    <h5> Inbox <button class="toggle-trig1"> <i class="fa fa-angle-right"> </i> </button>  <a href="{{route('buddy.messages')}}" class="custom-btn6"> VIEW ALL  </a>  </h5>
                                 </div>
                                 <div class="toggle-content1">
                                 <ul class="chatonline style-none ">
                                    @foreach($chat_list as $val)
                                       @if($val->sender_id != Auth::id())
                                          @if(!in_array($val->sender_id, $list_item))
                                             <li>
                                                <a href="{{URL::to('/buddy/inbox/chat/'.base64_encode($val->sender->id))}}/{{empty($val->sender->fname) ? 'Newuser' : $val->sender->fname.' '.$val->sender->lname}}">
                                                   <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->sender->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" class="img-circle"> 
                                                   <span> {{empty($val->sender->fname) ? 'Newuser' : $val->sender->fname.' '.$val->sender->lname}} <sub class="time-msg"> {{timeCustom($val->created_at)}} </sub> </span> 
                                                   <b class="cut-textc"> {{$val->message}} </b> 
                                                </a>
                                             </li>
                                             @php array_push($list_item, $val->sender_id); @endphp
                                          @endif
                                       @else
                                          @if(!in_array($val->receiver_id, $list_item))
                                             <li>
                                                <a href="{{URL::to('/buddy/inbox/chat/'.base64_encode($val->receiver->id))}}/{{empty($val->receiver->fname) ? 'Newuser' : $val->receiver->fname.' '.$val->receiver->lname}}">
                                                   <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->receiver->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" class="img-circle"> 
                                                   <span> {{empty($val->receiver->fname) ? 'Newuser' : $val->receiver->fname.' '.$val->receiver->lname}} <sub class="time-msg"> {{timeCustom($val->created_at)}} </sub> </span> 
                                                   <b class="cut-textc"> {{$val->message}} </b> 
                                                </a>
                                             </li>
                                             @php array_push($list_item, $val->receiver_id); @endphp
                                          @endif
                                       @endif
                                    @endforeach 
                                    @if(count($chat_list) == '0')
                                       <li class="nochatfound">
                                          No Chats Found.
                                       </li>
                                    @endif 
                                    <li class="p-20"></li>
                                 </ul>
                               </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-9">
                           <div class="sec-head1 ps">
                              <h3> Timeline   </h3>
                           </div>
                        <div class="card-body b-l calender-sidebar timeline-calendar-mobile">
                           <div id="calendar"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@php
   function timeCustom($time){
      $time = strtotime($time);
      $curr = date('Y-m-d H:i:s');
      $curr = strtotime($curr);
      $final = '';

      $totalSecondsDiff = abs($time-$curr); //42600225
      $totalMinutesDiff = $totalSecondsDiff/60; //710003.75
      $totalHoursDiff   = $totalSecondsDiff/60/60;//11833.39
      $totalDaysDiff    = $totalSecondsDiff/60/60/24; //493.05
      $totalMonthsDiff  = $totalSecondsDiff/60/60/24/30; //16.43
      $totalYearsDiff   = $totalSecondsDiff/60/60/24/365; //1.35

      if($totalYearsDiff >= 1){
         $final = number_format($totalYearsDiff).' years ago';
      }elseif($totalMonthsDiff >= 1){
         $final = number_format($totalMonthsDiff).' months ago';
      }elseif($totalDaysDiff >= 1){
         $final = number_format($totalDaysDiff).' days ago';
      }elseif($totalHoursDiff >= 1){
         $final = number_format($totalHoursDiff).' hours ago';
      }elseif($totalMinutesDiff >= 1){
         $final = number_format($totalMinutesDiff).' minutes ago';
      }elseif($totalSecondsDiff >= 1){
         $final = number_format($totalSecondsDiff).' secounds ago';
      }
      return $final;
   }
@endphp
@endsection

@section('addScript')
   <script type="text/javascript">
      
      !function($) {
          "use strict";

          var CalendarApp = function() {
              this.$body = $("body")
              this.$calendar = $('#calendar'),
              this.$calendarObj = null
          };


          CalendarApp.prototype.enableDrag = function() {
              //init events
              $(this.$event).each(function () {
                  // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                  // it doesn't need to have a start or end
                  var eventObject = {
                      title: $.trim($(this).text()) // use the element's text as the event title
                  };
                  // make the event draggable using jQuery UI
                  $(this).draggable({
                      zIndex: 999,
                      revert: true,      // will cause the event to go back to its
                      revertDuration: 0  //  original position after the drag
                  });
              });
          }
          /* Initializing */
          CalendarApp.prototype.init = function() {
              this.enableDrag();
              /*  Initialize the calendar  */
              var date = new Date();
              var d = date.getDate();
              var m = date.getMonth();
              var y = date.getFullYear();
              var form = '';
              var today = new Date($.now());

              var defaultEvents =  [
                  @foreach($orders as $val)
                     {
                         title: ' | {{@$val->orders->lesson->title}}',
                         start: '{{date("Y-m-d H:i:s", strtotime($val->start_date.' '.$val->start_time))}}',
                         className: 'bg-info'
                     },
                  @endforeach
                  @foreach($activities as $val)
                     {
                         title: ' | {{$val->title}}',
                         start: '{{date("Y-m-d H:i:s", strtotime($val->held_date))}}',
                         className: 'bg-primary'
                     },
                  @endforeach
               ];

              var $this = this;
              $this.$calendarObj = $this.$calendar.fullCalendar({
                  slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
                  minTime: '00:00:00',
                  maxTime: '23:59:59',  
                  defaultView: 'month',  
                  handleWindowResize: true,   
                   
                  header: {
                      left: 'prev,next today',
                      center: 'title',
                      right: 'month,agendaWeek,agendaDay'
                  },
                  events: defaultEvents,
                  timeFormat: 'H:mm',
                  editable: false,
                  droppable: false, // this allows things to be dropped onto the calendar !!!
                  eventLimit: false, // allow "more" link when too many events
                  selectable: false,
                  eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }

              });
          },

         //init CalendarApp
          $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
          
      }(window.jQuery),

      //initializing CalendarApp
      function($) {
          "use strict";
          $.CalendarApp.init()
      }(window.jQuery);
   </script>
@endsection
