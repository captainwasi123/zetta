@extends('buddy.include.master')
@section('title', 'Analytics And Redeem')
@section('content')
<div class="box-wrapper1">
    <div class="block-element  ">
       <div class="sec-head1">
          <h3> Your Zettaa Lead  </h3>
       </div>
    </div>
    <div class="block-element m-t-30 m-b-30">
       <div class="row">
          <div class="col-12">
             <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link custom-btn5 active" data-toggle="tab" href="#home" role="tab">Challenges </a> </li>
                <li class="nav-item"> <a class="nav-link custom-btn5 " data-toggle="tab" href="#profile" role="tab">Badges </a> </li>
                <li class="nav-item"> <a class="nav-link custom-btn5" data-toggle="tab" href="#settings" role="tab">Rewards</a> </li>
             </ul>
          </div>
       </div>
       <div class="row">
          <div class="col-12">
             <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                   <div class="row m-t-30 m-b-20">
                      <div class="col-12">
                         <span class="inform-box1"> <i class="fa fa-info"> </i> Complete Challenge to collect More Challenges </span>
                      </div>
                   </div>
                   <div class="row">
                     @foreach($challenges as $val)
                         <div class="col-md-3 col-lg-3 col-sm-3 col-6">
                            <div class="badge-box">
                               <img src="{{asset('public')}}/admin/assets/images/badge1.jpg">
                               <div class="details">
                                 <p>{{$val->title}}</p>
                                 <label class="reward">
                                    <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/bonus-tag.png">
                                    {{$val->reward}}
                                 </label>
                                 @php
                                    $end = \Carbon\Carbon::parse($val->expiry_date);

                                    $current = \Carbon\Carbon::now();
                                    $length = $end->diffInDays($current);
                                 @endphp
                                 <label class="deadline">
                                    <i class="fa fa-history"></i>
                                    {{$length+1}} days left
                                 </label>
                               </div>
                            </div>
                         </div>
                     @endforeach
                   </div>
                </div>
                <div class="tab-pane " id="profile" role="tabpanel">
                   <div class="row m-t-30 m-b-20">
                      <div class="col-12">
                         <span class="inform-box1"> <i class="fa fa-info"> </i> Complete Challenge to collect More Badges  </span>
                      </div>
                   </div>
                   <div class="row m-b-10">
                      <div class="col-12">
                         <span class="bonus-tag"> <img src="{{asset('public')}}/admin/assets/images/bonus-tag.jpg"> 100 </span>
                      </div>
                   </div>
                   <div class="row">
                      <div class="col-md-3 col-lg-3 col-sm-3 col-6">
                         <div class="badge-box">
                            <img src="{{asset('public')}}/admin/assets/images/badge1.jpg">
                         </div>
                      </div>
                      <div class="col-md-3 col-lg-3 col-sm-3 col-6">
                         <div class="badge-box">
                            <img src="{{asset('public')}}/admin/assets/images/badge1.jpg">
                            <span> x2 </span>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="tab-pane" id="settings" role="tabpanel">
                   <div class="row m-t-30 m-b-20">
                      <div class="col-12">
                         <span class="inform-box1"> <i class="fa fa-info"> </i> Complete Challenge to collect More Rewards  </span>
                         <button type="button" data-toggle="modal" data-target=".couponModal" class="btn btn-primary pull-right">Coupon History</button>
                      </div>
                   </div>
                   <div class="row m-b-10">
                     @foreach($rewards as $val)
                         <div class="col-md-3 col-lg-3 col-sm-3 col-6">
                           <a href="javascript:void(0)" class="convertCoins" data-id="{{base64_encode($val->id)}}">
                            <div class="badge-box">
                               <img src="{{asset('public')}}/admin/assets/images/badge1.jpg">
                               <div class="details">
                                 <label class="reward">
                                    <img src="{{URL::to('/')}}/assets/user_dashboard/coach/images/bonus-tag.png">
                                    {{$val->cost}}
                                 </label>
                                 <label class="deadline">
                                    <strong>$ {{$val->reward}}&nbsp;&nbsp;</strong>
                                 </label>
                               </div>
                            </div>
                           </a>
                         </div>
                     @endforeach
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>


 <div class="modal fade couponModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
           <div class="modal-header">
               <h4 class="modal-title" id="myModalLabel">Coupons History</h4>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           </div>
           <div class="modal-body">
               <div class="row">
                  <div class="col-md-12">
                     <table class="table">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Coupon Code</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach(Auth::user()->coupons as $key => $val)
                              <tr>
                                 <td>{{++$key}}</td>
                                 <td>{{$val->coupon}}</td>
                                 <td>
                                    @switch($val->status)
                                       @case('1')
                                          <label class="badge badge-info">Available</label>
                                          @break

                                       @case('2')
                                          <label class="badge badge-warning">Used</label>
                                          @break
                                    @endswitch
                                 </td>
                              </tr>
                           @endforeach
                           <tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <br>
           </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

@endsection
@section('addScript')
   <script type="text/javascript">
      $(document).ready(function(){

         $(document).on('click', '.convertCoins', function(){
            var id = $(this).data('id');
            Swal.fire({
              title: 'Are you sure?',
              text: "You want to convert your coins to Coupon!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Convert it!'
            }).then((result) => {
              if (result.isConfirmed) {
                  $.getJSON("{{URL::to('/buddy/analytics-and-redeem/reward/convert/')}}/"+id, function(data){
                     if(data.status == 200){
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Insufficient coin balance!'
                        });
                     }else if(data.status == 300){
                        $('#buddyCoins').html(' '+data.balance+' ');
                        Swal.fire({
                          icon: 'success',
                          title: 'Coupon#: '+data.coupon,
                          text: 'Coupon Successfully Generated.'
                        });
                     }
                  });
              }else{
               Swal.close();
              }
            });
         });
         
      });
   </script>
@endsection
