@extends('admin.includes.master')
@section('title', 'Edit Sports Category | Settings')
@section('content')

<div class="row">
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
                    <div class="col-md-4">
                        <form method="post" enctype="multipart/form-data" action="{{route('admin.setting.category.update')}}">
                            @csrf
                            <input type="hidden" name="cid" value="{{base64_encode($data->id)}}">
                            <div class="form-group">
                                <label>Category images (60x60 px)</label>
                                <input type="file" class="form-control" name="main_image"> 
                            </div>
                    </div>
                    <div class="col-md-8">
                        <img src="{{URL::to('/public/storage/settings/category/'.$data->image)}}" width="60px">
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" class="form-control" name="name" value="{{$data->name}}" required> 
                            </div>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-4 m-t-30">
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                &nbsp;&nbsp;Update&nbsp;&nbsp;
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

@endsection