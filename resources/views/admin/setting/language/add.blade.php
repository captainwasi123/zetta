@extends('admin.includes.master')
@section('title', !empty($edit) ? 'Edit Language | Settings' : 'Add Language | Settings')
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
                        <form method="post" action="{{route('admin.setting.language.save')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{!empty($edit) ? $edit->id : ''}}">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Language</label>
                                    <input type="text" class="form-control" name="name" value="{{!empty($edit) ? $edit->name : ''}}" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                    &nbsp;&nbsp;Save&nbsp;&nbsp;
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
