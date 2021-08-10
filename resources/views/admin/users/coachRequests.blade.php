@extends('admin.includes.master')
@section('title', 'Coach Requests | All Users')
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
                                <th>Country</th>
                                <th>Answer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $val)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{@$val->user->fname.' '.$val->user->lname}}</td>
                                    <td>{{@$val->user->email}}</td>
                                    <td>{{@$val->user->gender}}</td>
                                    <td>{{@$val->user->country->nicename}}</td>
                                    <td>{{$val->answer}}</td>
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Approve"
                                        class="btn btn-success btn-sm approveForCoach" data-id="{{base64_encode($val->id)}}">
                                            <i class="fa fa-check"></i>
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
