@extends('admin.includes.master')
@section('title', 'Add Reward | Analytics & Redeem')
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
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Cost <small>(Coins)</small> *</label>
                                <input type="number" class="form-control" name="cost" required>
                            </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Reward <small>($)</small> *</label>
                            <input type="number" step="any" class="form-control" name="reward" required>
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

@endsection
