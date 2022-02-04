<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="host" content="{{URL::to('/coach')}}">
      <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('/')}}/assets/user_dashboard/coach/images/favicon.png">
      <title> @yield('title') - Coach | ZETTAA </title>

    @include('coach.include.style')
    @yield('addStyle')
</head>

 </head>
   <body class="fix-header fix-sidebar card-no-border">

      <!-- All Page Content Starts Here -->
      <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
            @include('coach.include.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
            @include('coach.include.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- Page Title Starts Here -->
            <div class="row page-titles">
               <div class="col-md-12 align-self-center">
                  <h3 class="text-themecolor">Dashboard <i class="fa fa-home"> </i> </h3>
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="javascript:void(0)">Coach </a></li>

                  </ol>
               </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('content')
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    @include('coach.include.script')

    @if(session()->has('success'))
        <script type="text/javascript">
            Swal.fire(
              'Success!',
              "{{ session()->get('success') }}",
              'success'
            );
        </script>

    @endif
    @if(session()->has('error'))
        <script type="text/javascript">
            Swal.fire(
              'Alert!',
              "{{ session()->get('error') }}",
              'warning'
            );
        </script>

    @endif

    @yield('addScript')

</body>

</html>
