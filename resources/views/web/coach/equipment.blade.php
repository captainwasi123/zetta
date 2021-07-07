@extends('web.coach.include.master')
@section('title', 'Registration Form')

@section('content')
<div class="box-wrapper1">
                  <div class="block-element m-b-20">
                     <div class="sec-head1">
                        <h3> Equipments   </h3>
                     </div>
                  </div>
                  <div class="block-element">
                     <div class="row">
                        <div class="col-md-8 col-12 col-sm-12 col-lg-8 text-right mob-text-left">
                           <a href="" class="custom-btn2 m-b-10"> Add New Equipment </a>
                        </div>
                     </div>
                  </div>
                  <div class="block-element">
                     <div class="row">
                        <div class="col-md-8 col-lg-8 col-12">
                           <div>
                              <span class="head-tag1 bg-purple"> Active Lessons </span>
                           </div>
                           <div class="table-responsive custom-table1">
                              <table  class="table table-hover contact-list" data-page-size="10">
                                 <thead>
                                    <tr>
                                       <th> Title </th>
                                       <th> Quantity </th>
                                       <th> Settings </th>
                                       <th> Amount </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>
                                          <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/web/assets/images/users/5.jpg" alt="user" width="40" class="img-circle" /> Equipment 1 </a>
                                       </td>
                                       <td>  01 </td>
                                       <td>
                                          <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <img src="{{URL::to('/')}}/assets/web/assets/images/wheel-icon.jpg"> </a>
                                          <div class="dropdown-menu animated flipInY">
                                             <a href="#" class="dropdown-item"><i class="fa fa-eye"></i> View </a>
                                             <a href="#" class="dropdown-item"><i class="fa fa-pencil"></i> Edit </a>
                                             <div class="dropdown-divider"></div>
                                             <a href="#" class="dropdown-item"><i class="fa fa-trash"></i> Delete </a>
                                          </div>
                                       </td>
                                       <td> $300.00 </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/web/assets/images/users/5.jpg" alt="user" width="40" class="img-circle" /> Equipment 2 </a>
                                       </td>
                                       <td>  02 </td>
                                       <td>
                                          <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <img src="{{URL::to('/')}}/assets/web/assets/images/wheel-icon.jpg"> </a>
                                          <div class="dropdown-menu animated flipInY">
                                             <a href="#" class="dropdown-item"><i class="fa fa-eye"></i> View </a>
                                             <a href="#" class="dropdown-item"><i class="fa fa-pencil"></i> Edit </a>
                                             <div class="dropdown-divider"></div>
                                             <a href="#" class="dropdown-item"><i class="fa fa-trash"></i> Delete </a>
                                          </div>
                                       </td>
                                       <td> $300.00 </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <a href="javascript:void(0)"><img src="{{URL::to('/')}}/assets/web/assets/images/users/5.jpg" alt="user" width="40" class="img-circle" /> Equipment 3 </a>
                                       </td>
                                       <td>  03 </td>
                                       <td>
                                          <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <img src="{{URL::to('/')}}/assets/web/assets/images/wheel-icon.jpg"> </a>
                                          <div class="dropdown-menu animated flipInY">
                                             <a href="#" class="dropdown-item"><i class="fa fa-eye"></i> View </a>
                                             <a href="#" class="dropdown-item"><i class="fa fa-pencil"></i> Edit </a>
                                             <div class="dropdown-divider"></div>
                                             <a href="#" class="dropdown-item"><i class="fa fa-trash"></i> Delete </a>
                                          </div>
                                       </td>
                                       <td class="col-red"> $300.00 </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="block-element m-t-30">
                     <div class="sec-head1">
                        <h3> Your Zetta Lead   </h3>
                     </div>
                     <div class="lead-details m-b-20">
                        <p> 
                           <span> <b class="bg-purple"></b> Earned ($1.132) </span>
                           <span> <b class="bg-danger"></b> Cancelled ($40)  </span>
                           <span> <b class="bg-grey"></b> Completed (10)  </span>
                           <span> <b class="bg-green2"></b> New Orders (20)  </span>
                        </p>
                     </div>
                     <div class="block-element">
                        <img src="{{URL::to('/')}}/assets/web/assets/images/lead-graph2.jpg" width="850">
                     </div>
                  </div>
               </div>

@endsection