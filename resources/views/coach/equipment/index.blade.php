@extends('coach.include.master')
@section('title', 'Equipments')

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
                           <a href="{{route('coach.equipment.add')}}" class="custom-btn2 m-b-10"> Add New Equipment </a>
                        </div>
                     </div>
                  </div>
                  <div class="block-element">
                     <div class="row">
                        <div class="col-md-8 col-lg-8 col-12">
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
                                    @foreach(Auth::user()->equipment as $val)
                                       <tr>
                                          <td>
                                             <a href="javascript:void(0)">
                                                <img src="{{URL::to('/public/storage/user/equipment/'.$val->image)}}" alt="user" width="40" class="img-circle" />&nbsp;&nbsp;&nbsp;
                                                {{$val->name}}
                                             </a>
                                          </td>
                                          <td> {{$val->qty}} </td>
                                          <td>
                                             <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/wheel-icon.png"> </a>
                                             <div class="dropdown-menu animated flipInY">
                                                <a href="{{route('coach.equipment.edit', base64_encode($val->id))}}" class="dropdown-item"><i class="fa fa-pencil"></i> Edit </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="javascript:void(0)" class="dropdown-item deleteItem" data-href="{{route('coach.equipment.delete', base64_encode($val->id))}}"><i class="fa fa-trash"></i> Delete </a>
                                             </div>
                                          </td>
                                          <td> {{empty($val->price) ? 'Free' : '$'.number_format($val->price,2)}} </td>
                                       </tr>
                                    @endforeach
                                    @if(count(Auth::user()->equipment) == '0')
                                       <tr>
                                          <td colspan="4">
                                             No Equipments Found.
                                          </td>
                                       </tr>
                                    @endif
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
                        <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/lead-graph2.jpg" width="850">
                     </div>
                  </div>
               </div>

@endsection