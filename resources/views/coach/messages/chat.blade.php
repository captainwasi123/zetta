@extends('coach.include.master')
@section('title', 'Messages')

@section('content')
@php $list_item = array(); @endphp

<div class="box-wrapper2">
    <div class="row">
       <div class="col-md-3 col-lg-3 col-12 col-sm-3 no-pad bg-white">
          <div class="chat-main-box inbox-aside" style="width: 100%">
             <div class="chat-left-aside" style="width: 100%;">
                <div class="open-panel"><i class="ti-angle-right"></i></div>
                <div class="chat-left-inner">
                   <div class="sec-head4">
                      <h5> All Conversations </h5>
                   </div>
                   <ul class="chatonline style-none ">
                     @foreach($chat_list as $val)
                        @if($val->sender_id != Auth::id())
                           @if(!in_array($val->sender_id, $list_item))
                              <li>
                                 <a href="{{URL::to('/coach/inbox/chat/'.base64_encode($val->sender->id))}}/{{empty($val->sender->fname) ? 'Newuser' : $val->sender->fname.' '.$val->sender->lname}}">
                                    <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->sender->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" class="img-circle"> 
                                    <span> {{empty($val->sender->fname) ? 'Newuser' : $val->sender->fname.' '.$val->sender->lname}} <sub class="time-msg"> {{timeCustom($val->created_at)}} </sub> </span> 
                                    <b class="cut-text"> {{$val->message}} </b> 
                                 </a>
                              </li>
                              @php array_push($list_item, $val->sender_id); @endphp
                           @endif
                        @else
                           @if(!in_array($val->receiver_id, $list_item))
                              <li>
                                 <a href="{{URL::to('/coach/inbox/chat/'.base64_encode($val->receiver->id))}}/{{empty($val->receiver->fname) ? 'Newuser' : $val->receiver->fname.' '.$val->receiver->lname}}">
                                    <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->receiver->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" class="img-circle"> 
                                    <span> {{empty($val->receiver->fname) ? 'Newuser' : $val->receiver->fname.' '.$val->receiver->lname}} <sub class="time-msg"> {{timeCustom($val->created_at)}} </sub> </span> 
                                    <b class="cut-text"> {{$val->message}} </b> 
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
       <div class="col-md-7 col-lg-7 col-12 col-sm-3 no-pad">
          <div class="chat-main-box">
             <div class="card m-b-0">
                <!-- .chat-row -->
                <div class="chat-main-box">
                   <!-- .chat-left-panel -->
                   <!-- .chat-left-panel -->
                   <!-- .chat-right-panel -->
                   <div class="chat-right-">
                      <div class="chat-person-name">
                         <h4> {{empty($user->fname) ? $user->email : $user->fname.' '.$user->lname}} </h4>
                         <p> {{empty($user->coach_request_status) ? 'Sports Buddy' : 'Coach, Sports Buddy'}} </p>
                      </div>
                      <div class="chat-rbox chat-bar1">
                        <div class="chat-open-head">
                           <br><br>
                           <h5> <b> We have your back </b> </h5>
                           <p> For Added Safety and your protection, keep payments and comunications within Zettaa </p>
                        </div>
                         <ul class="chat-list p-20" id="talksall">
                            <!--chat Row -->
                            @foreach($chat as $val)
                              @if($val->receiver_id == Auth::id())
                                 <li>
                                    <div class="chat-img"><img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->sender->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" /></div>
                                    <div class="chat-content">
                                       <h5>{{empty($val->sender->fname) ? 'Newuser' : $val->sender->fname.' '.$val->sender->lname}}</h5>
                                       <div class="box bg-light-info">{{$val->message}}</div>
                                    </div>
                                    <div class="chat-time">{{timeCustom($val->created_at)}}</div>
                                    @if(!empty($val->file_attach))
                                       <div class="chatAttach">
                                          <span>{{$val->file_name}}</span>
                                          <a href="{{URL::to('/public/file_attached/'.$val->file_attach)}}" download="{{$val->file_name}}"><i class="fa fa-download"></i></a>
                                       </div>
                                    @endif
                                 </li>
                              @else
                                 <li class="reverse">
                                    <div class="chat-content">
                                       <h5>{{empty($val->sender->fname) ? 'Newuser' : $val->sender->fname.' '.$val->sender->lname}}</h5>
                                       <div class="box bg-light-inverse">{{$val->message}}</div>
                                    </div>
                                    <div class="chat-img"><img  src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->sender->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/user-placeholder.jpg';"/></div>
                                    <div class="chat-time">{{timeCustom($val->created_at)}}</div>
                                    @if(!empty($val->file_attach))
                                       <div class="chatAttach">
                                          <span>{{$val->file_name}}</span>
                                          <a href="{{URL::to('/public/storage/user/chat/file_attached/'.$val->file_attach)}}" download="{{$val->file_name}}"><i class="fa fa-download"></i></a>
                                       </div>
                                    @endif
                                 </li>
                              @endif
                           @endforeach
                            <!--chat Row -->
                         </ul>
                      </div>
                      <div class="card-body b-t">
                        <form id="sendchat" enctype="multipart/form-data">
                           {{csrf_field()}}
                           <input type="hidden" name="msg_id" value="{{base64_encode($user->id)}}">
                           <input type="file" name="attachment" id="fileAttach">
                            <div class="row">
                               <div class="col-12">
                                  <label id="fileAttachName"></label>
                                  <textarea placeholder="Write your message..." name="message" required class=" msg-write" data-emojiable="true"></textarea>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-8">
                                  <a href="javascript:void(0)" class="col-black form-attach1 emojies"> <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/smile-icon.png"> </a>
                                  <label class="col-black form-attach1 attachlabel" for="fileAttach"> <i class="fa fa-paperclip"> </i> </label>
                               </div>
                               <div class="col-4 text-right">
                                  <button class="col-green send-now-btn"> Send </button>
                               </div>
                            </div>
                         </form>
                      </div>
                   </div>
                   <!-- .chat-right-panel -->
                </div>
                <!-- /.chat-row -->
             </div>
          </div>
       </div>
       <div class="col-md-2 col-lg-2 col-12 col-sm-3 no-pad border-5">
          <div class="chat-about-details-head">
             <h4> About me </h4>
          </div>
          <div class="chat-about-details">
             <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$user->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
             <h5> {{empty($user->fname) ? $user->email : $user->fname.' '.$user->lname}} </h5>
             <p> {{$user->description}} </p>
             <table>
                <tbody>
                   <tr>
                      <th> From </th>
                      <td> {{empty($user->country) ? '-' : $user->country->nicename}} </td>
                   </tr>
                   <tr>
                      <th class="col-purple" colspan="2"> Language </th>
                   </tr>
                   @foreach($user->langs as $val)
                      <tr>
                         <th> {{$val->language}} </th>
                         <td> {{$val->level}} </td>
                      </tr>
                   @endforeach
                </tbody>
             </table>
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
@section('addStyle')
     <link href="{{URL::to('/')}}/assets/emojies/css/emoji.css" rel="stylesheet">
@endsection
@section('addScript')
   <script src="{{URL::to('/')}}/assets/user_dashboard/coach/js/chat.js"></script>
   <script src="{{URL::to('/')}}/assets/user_dashboard/coach/js/push.js"></script>
   <script src="{{URL::to('/')}}/assets/emojies/js/config.js"></script>
   <script src="{{URL::to('/')}}/assets/emojies/js/util.js"></script>
   <script src="{{URL::to('/')}}/assets/emojies/js/jquery.emojiarea.js"></script>
   <script src="{{URL::to('/')}}/assets/emojies/js/emoji-picker.js"></script>

   <script>


      $(document).ready(function(){
         chatScrollDown();

         getMessage('{{Auth::id()}}', '{{$user->id}}', '{{env("PUSHER_APP_KEY")}}');
      });
      $(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '[data-emojiable=true]',
          assetsPath: '{{URL::to('/')}}/assets/emojies/img',
          popupButtonClasses: 'fa fa-smile-o'
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
      }); 

      
   </script>


@endsection
