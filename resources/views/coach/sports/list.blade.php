@extends('coach.include.master')
@section('title', 'Sports')

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
                                 <a href="{{route('coach.sports.add')}}" class="custom-btn2 m-b-10"> Request Sports </a>
                              </div>
                           </div>
                           <div class="block-element pl-4">
                              <div class="row">
                                 <div class="col-md-12 col-lg-12 col-12">
                                    <div>
                                       <span class="head-tag1 bg-purple"> Active Sports </span>
                                    </div>
                                    <div class="table-responsive custom-table1">
                                       <table class="table table-hover contact-list" data-page-size="10">
                                          <thead>
                                             <tr>
                                                <th style="width: 10%;">#</th>
                                                <th style="width: 90%"> Sports Name </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($data as $key => $val)
                                                <tr class="sportsItem">
                                                   <td>{{++$key}}</td>
                                                   <td>
                                                       <img src="{{URL::to('/public/storage/settings/sports/'.$val->image)}}" width="30px">
                                                       {{$val->name}}
                                                   </td>
                                                </tr>
                                             @endforeach
                                             <tr id="loadmoreTray">
                                                <td></td>
                                                <td>
                                                   <a href="javascript:void(0)" id="loadmore">
                                                      <i class="fa fa-refresh"></i> Loadmore
                                                   </a>
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

@endsection
@section('addScript')
   <script type="text/javascript">
      $(document).ready(function(){
         'use strict'

         var size_li = $(".custom-table1 .sportsItem").length;
         var x=30;
         $('.sportsItem:lt('+x+')').show();
         if(size_li <= 30){
            $('#loadmoreTray').hide();
         }
         $('#loadmore').click(function () {
            x= (x+30 <= size_li) ? x+30 : size_li;
            $('.sportsItem:lt('+x+')').show();
            if(x >= size_li){
               $('#loadmoreTray').hide();
            }
         });
      });
   </script>
@endsection