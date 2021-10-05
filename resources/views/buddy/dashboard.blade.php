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
                                    <h5> Inbox <a href="{{route('buddy.messages')}}" class="custom-btn6"> VIEW ALL  </a>  </h5>
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
                     <div class="col-md-9">
                           <div class="sec-head1 ps">
                              <h3> Timeline   </h3>
                           </div>
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
