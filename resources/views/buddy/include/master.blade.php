<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="host" content="{{URL::to('/buddy')}}">
      <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('/')}}/assets/user_dashboard/buddy/images/favicon.png">
      <title> @yield('title') - Sports Buddy | ZETTAA </title>

    @include('buddy.include.style')
    @yield('addStyle')
</head>

 </head>
   <body class="fix-header fix-sidebar card-no-border">

      <!-- All Page Content Starts Here -->
      <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
            @include('buddy.include.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
            @include('buddy.include.sidebar')
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
                  <h3 class="text-themecolor">@yield('title') <i class="fa fa-home"> </i> </h3>
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="javascript:void(0)">Sports Buddy </a></li>

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

    @include('buddy.include.script')

    
    @if(session()->has('success'))
        <script type="text/javascript">
            Swal.fire(
              'Success!',
              "{{ session()->get('success') }}",
              'success'
            );
        </script>
    @elseif (session()->has('pending'))
        <script type="text/javascript">
            Swal.fire(
              'Pending!',
              "{{ session()->get('success') }}",
              'warning'
            );
        </script>
    @endif

    @yield('addScript')

</body>

</html>
