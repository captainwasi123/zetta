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
                                <th>Answers</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $val)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{@$val->user->fname.' '.@$val->user->lname}}</td>
                                    <td>{{@$val->user->email}}</td>
                                    <td>{{@$val->user->gender}}</td>
                                    <td>{{@$val->user->country->nicename}}</td>
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Answers"
                                        class="btn btn-info btn-sm coachAnswers" data-id="{{base64_encode($val->id)}}">
                                            <i class="fa fa-list"></i>
                                        </a>
                                    </td>
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


<div class="modal fade bs-example-modal-lg questionareModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Coach Questionaire</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection
