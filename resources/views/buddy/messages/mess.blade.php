@extends('buddy.include.master')
@section('title', 'Messages')

@section('content')
@php $list_item = array(); @endphp

<div class="box-wrapper2 chatheight">
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
                                    <span> {{empty($val->sender->fname) ? 'Newuser' : $val->sender->fname.' '.$val->sender->lname}} <sub class="time-msg"> {{$val->created_at->diffForHumans()}} </sub> </span> 
                                    <b> {{$val->message}} </b> 
                                 </a>
                              </li>
                              @php array_push($list_item, $val->sender_id); @endphp
                           @endif
                        @else
                           @if(!in_array($val->receiver_id, $list_item))
                              <li>
                                 <a href="{{URL::to('/coach/inbox/chat/'.base64_encode($val->receiver->id))}}/{{empty($val->receiver->fname) ? 'Newuser' : $val->receiver->fname.' '.$val->receiver->lname}}">
                                    <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->receiver->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" class="img-circle"> 
                                    <span> {{empty($val->receiver->fname) ? 'Newuser' : $val->receiver->fname.' '.$val->receiver->lname}} <sub class="time-msg"> {{$val->created_at->diffForHumans()}} </sub> </span> 
                                    <b> {{$val->message}} </b> 
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
            <div class="empty-chat">
               <img src="{{URL::to('/')}}/assets/images/chat.png">
               <h2>Nothing to See Here yet</h2>
               <h5>Your conversations will appear here.</h5>
            </div>
       </div>
       <div class="col-md-2 col-lg-2 col-12 col-sm-3 no-pad border-5">

       </div>
    </div>
</div>

@endsection
