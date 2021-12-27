@extends('admin.includes.master')
@section('title', 'Badges | Analytics & Redeem')
@section('content')
<div class="row">
  <div class="page-title">
     
      </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="m-b-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <strong>Success! </strong>{{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{route('admin.redeem.badges.add')}}" enctype="multipart/form-data">
                            @csrf
                       
                    <input type="hidden" name="bid" value="{{@$edit_badge->id}}">
                            
                            <div class="form-group">
                                <label>Title *</label>
                                <input type="text" class="form-control"  name="title" value="{{@$edit_badge->title}}" required>
                            </div>

                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Badge</label>

                            <input type="file" class="" name="image"  {{ (@$is_edit) ? '' : 'required' }}>
                        </div>
                    </div>
                  
                    <div class="col-md-4"></div>
                    <div class="col-md-4 m-t-30">
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                &nbsp;&nbsp;Save&nbsp;&nbsp;
                            </button>
                            <button type="reset" class="btn btn-inverse waves-effect waves-light">
                                Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S#</th>
                                <th>Title</th>
                                <th>Badge</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $val)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$val->title}}</td>
                                    <td>
                                    <img src="{{URL::to('/public/admin/images/'.$val->image)}}" width="80px">
                                    </td>
                                    <td>{{date('d-M-Y h:i a', strtotime($val->created_at))}}
                                    <td>
                                               
                                        
                                          <a  class="btn btn-info btn-sm "  href="{{route('admin.redeem.badges.edit', base64_encode($val->id))}}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                               
                                        <a  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('admin.redeem.badges.delete', base64_encode($val->id))}}">
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
