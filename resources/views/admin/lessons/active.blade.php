@extends('admin.includes.master')
@section('title', 'Active | All Lessons')
@section('content')

<div class="row">
    <div class="col-12">
        @if (session()->has('success'))
            <div class="alert alert-success">
                <strong>Success! </strong>{{ session('success') }}
            </div>
        @endif
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S#</th>
                                <th>Title</th>
                                <th>Coach</th>
                                <th>Location</th>
                                <th>Covered</th>
                                <th>Availability</th>
                                <th>created at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $val)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->title}}</td>
                                    <td>{{$val->user->fname.' '.$val->user->lname}}</td>
                                    <td>{{$val->locations[0]->address}}</td>
                                    <td>{{$val->location_covered == '0' ? 'No' : 'Yes'}}</td>
                                    <td>
                                        @if($val->availability == '1' || $val->availability == '3')
                                            <span class="badge badge-primary">Online Classes</span>
                                        @endif
                                        @if($val->availability == '2' || $val->availability == '3')
                                            <span class="badge badge-info">Normal Classes</span>
                                        @endif
                                    </td>
                                    <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Block" class="btn btn-danger btn-sm blockLesson" data-id="{{base64_encode($val->id)}}">
                                            <i class="fa fa-ban"></i>
                                        </a>
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


@endsection