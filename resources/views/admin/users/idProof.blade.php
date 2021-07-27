@extends('admin.includes.master')
@section('title', 'ID Proof Request | All Users')
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
                                <th>SignUp at</th>
                                <th>Attachment</th>
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
                                    <td>{{$val->country->nicename}}</td>
                                    <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}</td>
                                    <td><a href="{{URL::to('/public/storage/user/id_proof/'.$val->id_proof_doc)}}" download="ID Proof - {{$val->fname.' '.$val->lname}}"><span class="fa fa-download"></span> Download</a></td>
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Approve" class="btn btn-success btn-sm approveIDProof" data-id="{{base64_encode($val->id)}}">
                                            <i class="fa fa-check"></i>
                                        </a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Reject" class="btn btn-danger btn-sm rejectIDProof" data-id="{{base64_encode($val->id)}}">
                                            <i class="fa fa-close"></i>
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