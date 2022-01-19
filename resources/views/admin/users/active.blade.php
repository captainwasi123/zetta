@extends('admin.includes.master')
@section('title', 'Active | All Users')
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Country</th>
                                <th>Lessons</th>
                                <th>Activities</th>
                                <th>SignUp at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $val)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->fname.' '.$val->lname}}</td>
                                    <td>{{$val->email}}</td>
                                    <td>{{$val->gender}}</td>
                                    <td>{{empty($val->dob) ? '' : floor((time() - strtotime($val->dob)) / 31556926).' y'}}</td>
                                    <td>{{@$val->country->nicename}}</td>
                                    <td>{{count($val->lessons)}}</td>
                                    <td>{{count($val->activities)}}</td>
                                    <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Block" class="btn btn-danger btn-sm blockUser" data-id="{{base64_encode($val->id)}}">
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
