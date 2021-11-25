@extends('buddy.include.master')
@section('title', 'All Activities')

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
                                       <li class="nav-item"> <a class=" nav-link active " data-toggle="tab" href="#tab-data1" role="tab"> Active Activities </a> </li>
                                       <li class="nav-item"> <a class=" nav-link" data-toggle="tab" href="#tab-data2" role="tab"> Draft Activities </a> </li>
                                       <li class="nav-item"> <a class=" nav-link" data-toggle="tab" href="#tab-data3" role="tab"> Paused Activities </a> </li>
                                    </ul>
                                 </div>
                                 <div class="col-12 col-lg-3 col-md-3 col-sm-12 text-right mob-text-left">
                                    <a href="{{route('buddy.activity.add')}}" class="custom-btn2 m-b-10"> Create an Activity </a>
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
                                                            <th> Activity </th>
                                                            <th class="text-center"> Orders </th>
                                                            <th class="text-center"> Cancellations </th>
                                                            <th class="text-center"> Actions </th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         @foreach($data['active'] as $val)
                                                            <tr >
                                                               <td id="myBtn" class="table-image2">
                                                                  <img src="{{URL::to('/public/storage/user/activity/main_image/'.$val->cover_img)}}">
                                                                  {{$val->title}}
                                                               
                                                               </td>
                                                               <td class="text-center">  0 </td>
                                                               <td class="text-center"> 0 </td>
                                                               <td class="text-center">
                                                                 <div class="dropdown-wrapper">
                                                                  <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-caret-down"> </i> </a>
                                                                  <div class="dropdown-menu animated flipInY">
                                                                     <a href="{{route('buddy.activity.edit', base64_encode($val->id))}}" class="dropdown-item"><i class="fa fa-edit"></i> Edit </a>
                                                                     <a href="{{route('buddy.activity.draft', base64_encode($val->id))}}" class="dropdown-item"><i class="fa fa-file"></i> Send to Draft </a>
                                                                     <a href="{{route('buddy.activity.paused', base64_encode($val->id))}}" class="dropdown-item"><i class="fa fa-pause"></i> Send to Paused </a>
                                                                     <div class="dropdown-divider"></div>
                                                                     <a href="javascript:void(0)" class="dropdown-item deleteItem" data-href="{{route('buddy.activity.delete', base64_encode($val->id))}}"><i class="fa fa-trash"></i> Delete </a>
                                                                  </div>
                                                              </div>
                                                               </td>

                                                            </tr>
                                                            <tr style="border-bottom: 0px;">
                                                               <td colspan="4" style="border-bottom: 0px !important;padding: 0px;">
                                                                   <div id="myDropdown" class="dropdown-content">
                                                                     <img src="https://dnpprojects.com/demo/zetta/assets/website/images/zetta-logo.png" >  
                                                                   </div>
                                                               </td>
                                                              
                                                            </tr>
                                                            
                                                           

                                                         @endforeach
                                                         @if(count($data['active']) == 0)
                                                            <tr>
                                                               <td colspan="4">
                                                                  No Activity Found.
                                                               </td>
                                                            </tr>
                                                         @endif
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                       </div>


                                       <div class="tab-pane"  id="tab-data2" role="tabpane2">
                                          <div class="row">
                                             <div class="col-md-12 col-lg-12 col-12">
                                                <div class="table-responsive custom-table1 wallet-table">
                                                   <table class="table table-hover contact-list border-off" data-page-size="10">
                                                      <thead>
                                                         <tr>
                                                            <th> Activity </th>
                                                            <th class="text-center"> Orders </th>
                                                            <th class="text-center"> Cancellations </th>
                                                            <th class="text-center"> Actions </th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         @foreach($data['draft'] as $val)
                                                            <tr >
                                                               <td id="myBtn" class="table-image2">
                                                                  <img src="{{URL::to('/public/storage/user/activity/main_image/'.$val->cover_img)}}">
                                                                  {{$val->title}}
                                                               
                                                               </td>
                                                               <td class="text-center">  0 </td>
                                                               <td class="text-center"> 0 </td>
                                                               <td class="text-center">
                                                                 <div class="dropdown-wrapper">
                                                                  <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-caret-down"> </i> </a>
                                                                  <div class="dropdown-menu animated flipInY">
                                                                     <a href="{{route('buddy.activity.edit', base64_encode($val->id))}}" class="dropdown-item"><i class="fa fa-edit"></i> Edit </a>
                                                                     <a href="{{route('buddy.activity.active', base64_encode($val->id))}}" class="dropdown-item"><i class="fa fa-check"></i> Send to Active </a>
                                                                     <a href="{{route('buddy.activity.paused', base64_encode($val->id))}}" class="dropdown-item"><i class="fa fa-pause"></i> Send to Paused </a>
                                                                     <div class="dropdown-divider"></div>
                                                                     <a href="javascript:void(0)" class="dropdown-item deleteItem" data-href="{{route('buddy.activity.delete', base64_encode($val->id))}}"><i class="fa fa-trash"></i> Delete </a>
                                                                  </div>
                                                              </div>
                                                               </td>

                                                            </tr>
                                                            <tr style="border-bottom: 0px;">
                                                               <td colspan="4" style="border-bottom: 0px !important;padding: 0px;">
                                                                   <div id="myDropdown" class="dropdown-content">
                                                                     <img src="https://dnpprojects.com/demo/zetta/assets/website/images/zetta-logo.png" >  
                                                                   </div>
                                                               </td>
                                                              
                                                            </tr>
                                                            
                                                           

                                                         @endforeach
                                                         @if(count($data['draft']) == 0)
                                                            <tr>
                                                               <td colspan="4">
                                                                  No Activity Found.
                                                               </td>
                                                            </tr>
                                                         @endif
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                       </div>


                                       <div class="tab-pane"  id="tab-data3" role="tabpane3">
                                          <div class="row">
                                             <div class="col-md-12 col-lg-12 col-12">
                                                <div class="table-responsive custom-table1 wallet-table">
                                                   <table class="table table-hover contact-list border-off" data-page-size="10">
                                                      <thead>
                                                         <tr>
                                                            <th> Activity </th>
                                                            <th class="text-center"> Orders </th>
                                                            <th class="text-center"> Cancellations </th>
                                                            <th class="text-center"> Actions </th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         @foreach($data['paused'] as $val)
                                                            <tr >
                                                               <td id="myBtn" class="table-image2">
                                                                  <img src="{{URL::to('/public/storage/user/activity/main_image/'.$val->cover_img)}}">
                                                                  {{$val->title}}
                                                               
                                                               </td>
                                                               <td class="text-center">  0 </td>
                                                               <td class="text-center"> 0 </td>
                                                               <td class="text-center">
                                                                 <div class="dropdown-wrapper">
                                                                  <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-caret-down"> </i> </a>
                                                                  <div class="dropdown-menu animated flipInY">
                                                                     <a href="{{route('buddy.activity.edit', base64_encode($val->id))}}" class="dropdown-item"><i class="fa fa-edit"></i> Edit </a>
                                                                     <a href="{{route('buddy.activity.active', base64_encode($val->id))}}" class="dropdown-item"><i class="fa fa-check"></i> Send to Active </a>
                                                                     <a href="{{route('buddy.activity.draft', base64_encode($val->id))}}" class="dropdown-item"><i class="fa fa-file"></i> Send to Draft </a>
                                                                     <div class="dropdown-divider"></div>
                                                                     <a href="javascript:void(0)" class="dropdown-item deleteItem" data-href="{{route('buddy.activity.delete', base64_encode($val->id))}}"><i class="fa fa-trash"></i> Delete </a>
                                                                  </div>
                                                              </div>
                                                               </td>

                                                            </tr>
                                                            <tr style="border-bottom: 0px;">
                                                               <td colspan="4" style="border-bottom: 0px !important;padding: 0px;">
                                                                   <div id="myDropdown" class="dropdown-content">
                                                                     <img src="https://dnpprojects.com/demo/zetta/assets/website/images/zetta-logo.png" >  
                                                                   </div>
                                                               </td>
                                                              
                                                            </tr>
                                                            
                                                           

                                                         @endforeach
                                                         @if(count($data['paused']) == 0)
                                                            <tr>
                                                               <td colspan="4">
                                                                  No Activity Found.
                                                               </td>
                                                            </tr>
                                                         @endif
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

   <script>
// Get the button, and when the user clicks on it, execute myFunction
document.getElementById("myBtn").onclick = function() {myFunction()};

/* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Get the button, and when the user clicks on it, execute myFunction
document.getElementById("myBtn1").onclick = function() {myFunction1()};

/* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
function myFunction1() {
  document.getElementById("myDropdown1").classList.toggle("show");
}
</script>

@endsection
