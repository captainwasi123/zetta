@extends('admin.includes.master')
@section('title', 'Sports Categories | Settings')
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
                                <th width="75%">Categories</th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $s=1; @endphp
                            @foreach($data as $val)
                                <tr>
                                    <td>{{$s}}</td>
                                    <td>
                                        <img src="{{URL::to('/public/storage/settings/category/'.$val->image)}}" width="30px">
                                        {{$val->name}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.setting.category.edit', base64_encode($val->id))}}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm deleteCat" data-id="{{base64_encode($val->id)}}">
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
