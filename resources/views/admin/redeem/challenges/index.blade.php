@extends('admin.includes.master')
@section('title', 'Challenges | Analytics & Redeem')
@section('content')

<div class="row">
    <div class="col-12">
        @if (session()->has('success'))
            <div class="alert alert-success">
                <strong>Success! </strong>{{ session('success') }}
            </div>
        @endif
    </div>
    <div class="col-12 p-b-10">
        <a href="{{route('admin.redeem.challenges.add')}}" class="btn btn-primary pull-right">Add Challenge</a>
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
                                <th>Orders</th>
                                <th>Rating</th>
                                <th>Rewards</th>
                                <th>Winners</th>
                                <th>Expiry</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $val)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->title}}</td>
                                    <td>{{$val->no_orders}}</td>
                                    <td>{{$val->rating}}</td>
                                    <td>{{@$val->reward}} coins</td>
                                    <td>0</td>
                                    <td>{{date('d-M-Y', strtotime($val->expiry_date))}}</td>
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
