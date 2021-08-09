@extends('admin.includes.master')
@section('title', 'Language | Settings')
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
                                <th width="75%">Langauge</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $k =>  $val)
                                <tr>
                                    <td>{{$k+1}}</td>
                                    <td>
                                        {{$val->name}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.setting.language.edit', base64_encode($val->id))}}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm deletelang" data-id="{{base64_encode($val->id)}}">
                                            <i class="fa fa-trash"></i>
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
