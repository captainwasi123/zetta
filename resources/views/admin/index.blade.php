@extends('admin.includes.master')
@section('title', 'Dashboard')
@section('addStyle')
    <link href="{{URL::to('/public/admin/')}}/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="{{URL::to('/public/admin/')}}/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
@endsection
@section('addScript')
    <script src="{{URL::to('/public/admin/')}}/assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="{{URL::to('/public/admin/')}}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--morris JavaScript -->
    <script src="{{URL::to('/public/admin/')}}/assets/plugins/raphael/raphael-min.js"></script>
    <script src="{{URL::to('/public/admin/')}}/assets/plugins/morrisjs/morris.min.js"></script>
    <script src="{{URL::to('/public/admin/')}}/js/dashboard2.js"></script>
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12 col-xlg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap">
                    <div>
                        <h4 class="card-title">Analytics Overview</h4>
                        <h6 class="card-subtitle">Overview of Monthly analytics</h6>
                    </div>
                    <div class="ml-auto align-self-center">
                        <ul class="list-inline m-b-0">
                            <li>
                                <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Site A</h6> </li>
                            <li>
                                <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10"></i>Site B</h6> </li>
                        </ul>
                    </div>
                </div>
                <div class="campaign ct-charts" style="height:305px!important;"></div>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
<!-- Row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <h4 class="card-title">Visit From Countries</h4>
                    <div class="ml-auto">
                        <select class="custom-select">
                            <option selected="">January</option>
                            <option value="1">February</option>
                            <option value="2">March</option>
                            <option value="3">April</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive m-t-20">
                    <table class="table nowrap stylish-table">
                        <thead>
                            <tr>
                                <th>Language</th>
                                <th>Vists</th>
                                <th>%</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <i class="flag-icon flag-icon-us"></i>
                                    <span class="country-name">U.S.A</span>
                                </td>
                                <td>18,224</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger " role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span></div>
                                    </div>
                                </td>
                                <td>50%</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="flag-icon flag-icon-gb"></i>
                                    <span class="country-name">U.K</span>
                                </td>
                                <td>12,347</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-success " role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%; height:6px;"> <span class="sr-only">50% Complete</span></div>
                                    </div>
                                </td>
                                <td>60%</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="flag-icon flag-icon-ca"></i>
                                    <span class="country-name">Canada</span>
                                </td>
                                <td>11,868</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span></div>
                                    </div>
                                </td>
                                <td>50%</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="flag-icon flag-icon-de"></i>
                                    <span class="country-name">Germany</span>
                                </td>
                                <td>10,346</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span></div>
                                    </div>
                                </td>
                                <td>50%</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="flag-icon flag-icon-in"></i>
                                    <span class="country-name">India</span>
                                </td>
                                <td>8,354</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span></div>
                                    </div>
                                </td>
                                <td>80%</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="flag-icon flag-icon-au"></i>
                                    <span class="country-name">Australia</span>
                                </td>
                                <td>7,675</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger " role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span></div>
                                    </div>
                                </td>
                                <td>50%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <h4 class="card-title">Visit From Countries</h4>
                    <div class="ml-auto">
                        <select class="custom-select">
                            <option selected="">January</option>
                            <option value="1">February</option>
                            <option value="2">March</option>
                            <option value="3">April</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive m-t-20">
                    <table class="table nowrap stylish-table">
                        <thead>
                            <tr>
                                <th>Language</th>
                                <th>Vists</th>
                                <th>%</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <i class="flag-icon flag-icon-us"></i>
                                    <span class="country-name">U.S.A</span>
                                </td>
                                <td>18,224</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger " role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span></div>
                                    </div>
                                </td>
                                <td>50%</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="flag-icon flag-icon-gb"></i>
                                    <span class="country-name">U.K</span>
                                </td>
                                <td>12,347</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-success " role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%; height:6px;"> <span class="sr-only">50% Complete</span></div>
                                    </div>
                                </td>
                                <td>60%</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="flag-icon flag-icon-ca"></i>
                                    <span class="country-name">Canada</span>
                                </td>
                                <td>11,868</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span></div>
                                    </div>
                                </td>
                                <td>50%</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="flag-icon flag-icon-de"></i>
                                    <span class="country-name">Germany</span>
                                </td>
                                <td>10,346</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span></div>
                                    </div>
                                </td>
                                <td>50%</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="flag-icon flag-icon-in"></i>
                                    <span class="country-name">India</span>
                                </td>
                                <td>8,354</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span></div>
                                    </div>
                                </td>
                                <td>80%</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="flag-icon flag-icon-au"></i>
                                    <span class="country-name">Australia</span>
                                </td>
                                <td>7,675</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger " role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span></div>
                                    </div>
                                </td>
                                <td>50%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection