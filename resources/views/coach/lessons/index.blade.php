@extends('coach.include.master')
@section('title', 'Lessons')

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
                              </div>
                           </div>
                           <div class="block-element pl-4">
                              <div class="row">
                                 <div class="col-12 col-lg-9 col-md-9 col-sm-12">
                                    <ul class="nav nav-tabs profile-tab less-triggers" role="tablist">
                                       <li class="nav-item"> <a class=" nav-link active " data-toggle="tab" href="#tab-data1" role="tab"> Active Lesson </a> </li>
                                       <li class="nav-item"> <a class="nav-link  " data-toggle="tab" href="#tab-data2" role="tab">Draft  </a> </li>
                                       <li class="nav-item"> <a class="nav-link  " data-toggle="tab" href="#tab-data3" role="tab">Paused </a> </li>
                                       <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#tab-data4" role="tab"> Lesson Schedule </a> </li>
                                    </ul>
                                 </div>
                                 <div class="col-12 col-lg-3 col-md-3 col-sm-12 text-right mob-text-left">
                                    <a href="{{route('coach.lesson.add')}}" class="custom-btn2 m-b-10"> Create a Lesson </a>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-12">
                                    <div class="tab-content">
                                       <div class="tab-pane  active"  id="tab-data1" role="tabpanel">
                                          <div class="row">
                                             <div class="col-md-12 col-lg-12 col-12">
                                                <div class="table-responsive custom-table1 wallet-table">
                                                   <table class="table table-hover contact-list border-off" data-page-size="10">
                                                      <thead>
                                                         <tr>
                                                            <th> Lesson </th>
                                                            <th class="text-center"> Orders </th>
                                                            <th class="text-center"> Cancellations </th>
                                                            <th class="text-center"> Actions </th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         @foreach($data['active'] as $val)
                                                            <tr>
                                                               <td class="table-image2">
                                                                  <img src="{{URL::to('/public/storage/user/lessons/main_image/'.$val->cover_img)}}"> 
                                                                  {{$val->title}}
                                                               </td>
                                                               <td class="text-center"> <a href="">{{count($val->activeOrders)}} - View</a> </td>
                                                               <td class="text-center"> {{count($val->cancelOrders)}} </td>
                                                               <td class="text-center">
                                                                 <div class="dropdown-wrapper">
                                                                  <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-caret-down"> </i> </a>
                                                                  <div class="dropdown-menu animated flipInY">
                                                                     <a href="{{route('coach.lesson.edit', base64_encode($val->id))}}" class="dropdown-item"><i class="fa fa-pencil"></i> Edit </a>
                                                                     <div class="dropdown-divider"></div>
                                                                     <a href="javascript:void(0)" class="dropdown-item deleteItem" data-href="{{route('coach.lesson.delete', base64_encode($val->id))}}"><i class="fa fa-trash"></i> Delete </a>
                                                                  </div>
                                                              </div>
                                                               </td>
                                                            </tr>
                                                         @endforeach
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="tab-pane" id="tab-data2" role="tabpanel">
                                          <div class="row">
                                             <div class="col-md-12 col-lg-12 col-12">
                                                <div class="table-responsive custom-table1 wallet-table">
                                                   <table class="table table-hover contact-list border-off" data-page-size="10">
                                                      <thead>
                                                         <tr>
                                                            <th colspan="2"> Lesson </th>
                                                            <th class="text-center"> Orders </th>
                                                            <th class="text-center"> Cancellations </th>
                                                            <th class="text-center"> Actions </th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         <tr>
                                                            <td class="text-center">  <label style="margin-top: -25px;" class="custom-control custom-radio">
                                                               <input id="radio1" name="radio" type="radio" class="custom-control-input">
                                                               <span class="custom-control-label">  </span>
                                                               </label> 
                                                            </td>
                                                            <td class="table-image2">
                                                               <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/5.jpg"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in Nullam at
                                                               gravida sapien. In eget orci et massa laoreet gravida vitae at ante
                                                            </td>
                                                            <td class="text-center">  05 </td>
                                                            <td class="text-center"> 02 </td>
                                                            <td class="text-center">
                                                               <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-caret-down"> </i> </a>
                                                               <div class="dropdown-menu animated flipInY">
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-eye"></i> View </a>
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-pencil"></i> Edit </a>
                                                                  <div class="dropdown-divider"></div>
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-trash"></i> Delete </a>
                                                               </div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="tab-pane" id="tab-data3" role="tabpanel">
                                          <div class="row">
                                             <div class="col-md-12 col-lg-12 col-12">
                                                <div class="table-responsive custom-table1 wallet-table">
                                                   <table class="table table-hover contact-list border-off" data-page-size="10">
                                                      <thead>
                                                         <tr>
                                                            <th colspan="2"> Lesson </th>
                                                            <th class="text-center"> Orders </th>
                                                            <th class="text-center"> Cancellations </th>
                                                            <th class="text-center"> Actions </th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         <tr>
                                                            <td class="text-center">  <label style="margin-top: -25px;" class="custom-control custom-radio">
                                                               <input id="radio1" name="radio" type="radio" class="custom-control-input">
                                                               <span class="custom-control-label">  </span>
                                                               </label> 
                                                            </td>
                                                            <td class="table-image2">
                                                               <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/5.jpg"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in Nullam at
                                                               gravida sapien. In eget orci et massa laoreet gravida vitae at ante
                                                            </td>
                                                            <td class="text-center">  05 </td>
                                                            <td class="text-center"> 02 </td>
                                                            <td class="text-center">
                                                               <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-caret-down"> </i> </a>
                                                               <div class="dropdown-menu animated flipInY">
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-eye"></i> View </a>
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-pencil"></i> Edit </a>
                                                                  <div class="dropdown-divider"></div>
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-trash"></i> Delete </a>
                                                               </div>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td class="text-center">  <label style="margin-top: -25px;" class="custom-control custom-radio">
                                                               <input id="radio1" name="radio" type="radio" class="custom-control-input">
                                                               <span class="custom-control-label">  </span>
                                                               </label> 
                                                            </td>
                                                            <td class="table-image2">
                                                               <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/5.jpg"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in Nullam at
                                                               gravida sapien. In eget orci et massa laoreet gravida vitae at ante
                                                            </td>
                                                            <td class="text-center">  05 </td>
                                                            <td class="text-center"> 02 </td>
                                                            <td class="text-center">
                                                               <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-caret-down"> </i> </a>
                                                               <div class="dropdown-menu animated flipInY">
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-eye"></i> View </a>
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-pencil"></i> Edit </a>
                                                                  <div class="dropdown-divider"></div>
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-trash"></i> Delete </a>
                                                               </div>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td class="text-center">  <label style="margin-top: -25px;" class="custom-control custom-radio">
                                                               <input id="radio1" name="radio" type="radio" class="custom-control-input">
                                                               <span class="custom-control-label">  </span>
                                                               </label> 
                                                            </td>
                                                            <td class="table-image2">
                                                               <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/5.jpg"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in Nullam at
                                                               gravida sapien. In eget orci et massa laoreet gravida vitae at ante
                                                            </td>
                                                            <td class="text-center">  05 </td>
                                                            <td class="text-center"> 02 </td>
                                                            <td class="text-center">
                                                               <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-caret-down"> </i> </a>
                                                               <div class="dropdown-menu animated flipInY">
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-eye"></i> View </a>
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-pencil"></i> Edit </a>
                                                                  <div class="dropdown-divider"></div>
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-trash"></i> Delete </a>
                                                               </div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="tab-pane" id="tab-data4" role="tabpanel">
                                          <div class="row">
                                             <div class="col-md-12 col-lg-12 col-12">
                                                <div class="table-responsive custom-table1 wallet-table">
                                                   <table class="table table-hover contact-list border-off" data-page-size="10">
                                                      <thead>
                                                         <tr>
                                                            <th colspan="2"> Lesson </th>
                                                            <th class="text-center"> Orders </th>
                                                            <th class="text-center"> Cancellations </th>
                                                            <th class="text-center"> Actions </th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         <tr>
                                                            <td class="text-center">  <label style="margin-top: -25px;" class="custom-control custom-radio">
                                                               <input id="radio1" name="radio" type="radio" class="custom-control-input">
                                                               <span class="custom-control-label">  </span>
                                                               </label> 
                                                            </td>
                                                            <td class="table-image2">
                                                               <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/users/5.jpg"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in Nullam at
                                                               gravida sapien. In eget orci et massa laoreet gravida vitae at ante
                                                            </td>
                                                            <td class="text-center">  05 </td>
                                                            <td class="text-center"> 02 </td>
                                                            <td class="text-center">
                                                               <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-caret-down"> </i> </a>
                                                               <div class="dropdown-menu animated flipInY">
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-eye"></i> View </a>
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-pencil"></i> Edit </a>
                                                                  <div class="dropdown-divider"></div>
                                                                  <a href="#" class="dropdown-item"><i class="fa fa-trash"></i> Delete </a>
                                                               </div>
                                                            </td>
                                                         </tr>
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
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>

@endsection

@section('addScript')


    <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/flot/jquery.flot.js"></script>
    <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/flot/jquery.flot.time.js"></script>

    <script src="{{URL::to('/')}}/assets/user_dashboard/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="{{URL::to('/')}}/assets/user_dashboard/coach/js/flot-data.js"></script>

    <script type="text/javascript">
      //Flot Bar Chart
      $(function () {
          var barOptions = {
              series: {
                  bars: {
                      show: true
                      , barWidth: 30000000
                  }
              }
              , xaxis: {
                  mode: "time"
                  , timeformat: "%m/%d"
                  , minTickSize: [1, "day"]
              }
              , grid: {
                  hoverable: true
              }
              , legend: {
                  show: false
              }
              , grid: {
                  color: "#AFAFAF"
                  , hoverable: true
                  , borderWidth: 0
                  , backgroundColor: '#fff'
              }
              , tooltip: true
              , tooltipOpts: {
                  content: "Date: <strong>%x</strong> <br>Sales: <strong>%y</strong>"
              }
          };
          var barData = {
              label: "Sales"
              , color: "#7900b8"
              , data: [
                  [1354521600000, 1000]
                  , [1355040000000, 2000]
                  , [1355223600000, 3000]
                  , [1355306400000, 4000]
                  , [1355487300000, 5000]
                  , [1355571900000, 6000]
              ]
          };
          $.plot($("#flot-bar-chart"), [barData], barOptions);
      });
    </script>

@endsection