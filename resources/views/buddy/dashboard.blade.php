@extends('buddy.include.master')
@section('title', 'Dashboard')

@section('content')
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
                                    <h5> Inbox <a href="" class="custom-btn6"> VIEW ALL  </a>  </h5>
                                 </div>
                                 <ul class="chatonline style-none ">
                                    <li>
                                       <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/users/1.jpg" alt="user-img" class="img-circle"> <span> Minhaj <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b> </a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)" class="active"><img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/users/2.jpg" alt="user-img" class="img-circle"> <span> Maxella <small class="bg-green">Away</small></span> <b> Hello , How are you sir? </b> </a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/users/3.jpg" alt="user-img" class="img-circle"> <span> Peter <small class="bg-danger">Busy</small></span> <b> Hello , How are you sir? </b> </a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Jane Doe <small class="bg-danger">Offline</small></span> <b> Hello , How are you sir? </b> </a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/users/5.jpg" alt="user-img" class="img-circle"> <span> Jonathon <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b> </a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/users/6.jpg" alt="user-img" class="img-circle"> <span> Tahar Roman <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b> </a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/users/7.jpg" alt="user-img" class="img-circle"> <span> Ben Cobert <small class="bg-danger">online</small></span> <b> Hello , How are you sir? </b> </a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b></a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b></a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b></a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b></a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b></a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/user_dashboard/buddy/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b></a>
                                    </li>
                                    <li class="p-20"></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-9">
                        <div class="  m-t-20 m-b-20" >
                           <div class="sec-head1 ps">
                              <h3> Timeline   </h3>
                           </div>
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
