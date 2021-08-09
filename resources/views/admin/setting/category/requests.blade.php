@extends('admin.includes.master')
@section('title', 'Sports Categories Requests | Settings')
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
                                <th width="10%">S#</th>
                                <th width="55%">Category Name</th>
                                <th>Request By</th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $s=1; @endphp
                            @foreach($data as $val)
                                <tr>
                                    <td>{{$s}}</td>
                                    <td>
                                        {{$val->name}}
                                    </td>
                                    @if (!empty($val->user->fname) && !empty($val->user->lname))
                                        <td>{{($val->user->fname).' '.$val->user->lname}}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm deleteCatRequest" data-id="{{base64_encode($val->id)}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @php $s++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
