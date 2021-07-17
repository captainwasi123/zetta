@extends('coach.include.master')
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
                                 <a href="{{route('coach.category.add')}}" class="custom-btn2 m-b-10"> Request Category </a>
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
   </div>
</div>

@endsection