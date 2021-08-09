@extends('buddy.include.master')
@section('title', 'My Wallet')

@section('content')

<div class="box-wrapper1">
<div class="block-element m-b-30 m-t-15">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-6 col-12">
        <div class="sec-head1">
            <h3> My Wallet  </h3>
        </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-12">
        <div class="wallet-price text-right mob-text-left">
            <h4 class="col-green"> <a class="fund-btn2 m-r-15"> Expeceted Earnings </a> $300.00 </h4>
        </div>
        </div>
    </div>
</div>
<div class="block-element ">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-4 col-12 m-b-30">
        <div class="wallet-box2 bg-purple2">
            <h6> Total Earning </h6>
            <h3> $30,895 </h3>
        </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 col-12 m-b-30">
        <div class="wallet-box2 bg-grey2">
            <h6> Total Complete Lesson </h6>
            <h3> 300 </h3>
        </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 col-12 m-b-30">
        <div class="wallet-box2 bg-grey2">
            <h6> Earn in May </h6>
            <h3> $1200 </h3>
        </div>
        </div>
    </div>
</div>
<!-- <div class="block-element  ">
    <div class="sec-head1">
        <h3> Your Zetta Lead  </h3>
    </div>
</div> -->
<!-- <div class="block-element m-b-10">
    <div class="lead-details">
        <p class="col-silver">
        <span> <b class="bg-blue"></b> Earned($1,132) </span>
        <span> <b class="bg-danger"></b> Cancelled ($40) </span>
        <span> <b class="bg-grey"></b> Completed (10) </span>
        <span> <b class="bg-success"></b> New Orders (20) </span>
        </p>
    </div>
</div>
<div class="block-element m-b-40">
    <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product line Chart</h4>
                <ul class="list-inline text-right">
                    <li>
                        <h5><i class="fa fa-circle m-r-5 text-inverse"></i>iPhone</h5>
                    </li>
                    <li>
                        <h5><i class="fa fa-circle m-r-5 text-info"></i>iPad</h5>
                    </li>
                    <li>
                        <h5><i class="fa fa-circle m-r-5 text-success"></i>iPod</h5>
                    </li>
                </ul>
                <div id="morris-area-chart"></div>
            </div>
        </div>
</div> -->
<div class="block-element">
    <div class="row m-b-20">
        <div class="col-md-5 col-lg-5 col-sm-12 col-12">
        <div class="wallet-filters m-b-20">
            <h5 class="col-white"> SHOW </h5>
            <select class="filter-field1">
                <option> EVERYTHING </option>
                <option> EVERYTHING </option>
                <option> EVERYTHING </option>
                <option> EVERYTHING </option>
            </select>
            <select class="filter-field1">
                <option> 2021 </option>
                <option> 2021 </option>
                <option> 2021 </option>
                <option> 2021 </option>
            </select>
            <select class="filter-field1">
                <option> ALL </option>
                <option> ALL </option>
                <option> ALL </option>
                <option> ALL </option>
            </select>
        </div>
        </div>
        <div class="col-md-7 col-lg-7 col-sm-12 col-12 text-right mob-text-left">
        <div class="wallet-filters m-b-20">
            <h5 class="col-white"> WITHDRAW </h5>
            <a href="" class="wallet-btn1"> <img src="{{asset('public/admin')}}/assets/images/paypal-logo.png" width="24"> PAYPAL ACCOUNT </a>
            <a href="" class="wallet-btn1"> <img src="{{asset('public/admin')}}/assets/images/paypal-logo.png" width="24"> PAYPAL ACCOUNT </a>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-12">
        <div class="table-responsive custom-table1 wallet-table">
            <table  class="table table-hover contact-list border-off" data-page-size="10">
                <thead>
                    <tr>
                    <th> DATE </th>
                    <th> FOR </th>
                    <th class="text-center"> AMOUNT </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td> JUNE 02, 21 </td>
                    <td>
                        <div class="progress progress-1">
                            <div class="progress-bar bg-purple2" style="width: 75%; height:15px;" role="progressbar">CLEARING</div>
                        </div>
                        Funds Pending Clearance <a href="" class="fund-btn2"> View Order </a>
                    </td>
                    <td class="col-green text-center">  $580 </td>
                    </tr>
                    <tr>
                    <td> JUNE 02, 21 </td>
                    <td>  Funds Cleared <a href="" class="fund-btn1"> View Order </a> </td>
                    <td class="col-green text-center">  $580 </td>
                    </tr>
                    <tr>
                    <td> JUNE 02, 21 </td>
                    <td> Lesson Purchased <a href="" class="fund-btn1"> View Order </a> </td>
                    <td class="col-red text-center">  -$78 </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
</div>


@endsection
@section('addScript')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses'],
        ['2004',  1000,      400],
        ['2005',  1170,      460],
        ['2006',  660,       1120],
        ['2007',  1030,      540]
      ]);

      var options = {
        title: 'Company Performance',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('morris-area-chart'));

      chart.draw(data, options);
    }
</script>
@endsection
