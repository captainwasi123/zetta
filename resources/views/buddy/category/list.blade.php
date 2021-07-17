@extends('buddy.include.master')
@section('title', 'Sports Categories')

@section('content')

<div class="box-wrapper1">
   <div class="block-element">
      <div class="row">
         <div class="col-md-12">
            <div class="card" style="background:none">
               <div class="">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="  m-t-20 m-b-20" style="padding:0px 20px">
                        </div>
                        <div class="block-element">
                           <div class="row">
                              <div class="col-md-12 col-12 col-sm-12 col-lg-12 text-right mob-text-left">
                                 <a href="{{route('buddy.category.add')}}" class="custom-btn2 m-b-10"> Request Category </a>
                              </div>
                           </div>
                           <div class="block-element pl-4">
                              <div class="row">
                                 <div class="col-md-12 col-lg-12 col-12">
                                    <div>
                                       <span class="head-tag1 bg-purple"> Active Categories </span>
                                    </div>
                                    <div class="table-responsive custom-table1">
                                       <table class="table table-hover contact-list" data-page-size="10">
                                          <thead>
                                             <tr>
                                                <th style="width: 10%;">#</th>
                                                <th style="width: 90%"> Category Name </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($data as $key => $val)
                                                <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                    <img src="{{URL::to('/public/storage/settings/category/'.$val->image)}}" width="30px">
                                                    {{$val->name}}
                                                </td>
                                                </tr>
                                             @endforeach
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
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