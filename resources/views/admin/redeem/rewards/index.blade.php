@extends('admin.includes.master')
@section('title', 'Rewards | Analytics & Redeem')
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
        <a href="{{route('admin.redeem.rewards.add')}}" class="btn btn-primary pull-right">Add Reward</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S#</th>
                                <th>Cost</th>
                                <th>Reward</th>
                                <th width="20%">Created at</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $val)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{@$val->cost}} coins</td>
                                    <td>$ {{$val->reward}}</td>
                                    <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Block" class="btn btn-danger btn-sm deleteReward" data-id="{{base64_encode($val->id)}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @if(count($data) == 0)
                                <tr>
                                    <td colspan="5">No Data Found. </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('addScript')
    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('click', '.deleteReward', function(){
                var id = $(this).data('id');

                if(confirm('Are you sure?')){
                    window.location.href = "{{URL::to('/admin/redeem/rewards/delete')}}/"+id;
                }
            });
        });
    </script>
@endsection
