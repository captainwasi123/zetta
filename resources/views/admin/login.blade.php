<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('/public/admin/')}}/assets/images/favicon.png">
    <title>Login | Admin | {{env('APP_NAME')}}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{URL::to('/public/admin/')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{URL::to('/public/admin/')}}/css/style.css" rel="stylesheet">
<link href="{{URL::to('/public/admin/')}}/css/dev.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{URL::to('/public/admin/')}}/css/colors/blue.css" id="theme" rel="stylesheet">
   
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{URL::to('/public/admin/')}}/assets/images/background/login-register.jpg);">
            <br><br><br><br><br><br><br>
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" method="post">
                        @csrf
                        <h1 class="login-heading">MICAHHA</h1>
                        <h3 class="box-title m-b-20">Sign In  <small>(Administration)</small></h3>
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" placeholder="Username" name="username" required> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" placeholder="Password" name="password" required> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{URL::to('/public/admin/')}}/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{URL::to('/public/admin/')}}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{URL::to('/public/admin/')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{URL::to('/public/admin/')}}/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="{{URL::to('/public/admin/')}}/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{URL::to('/public/admin/')}}/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="{{URL::to('/public/admin/')}}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{URL::to('/public/admin/')}}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="{{URL::to('/public/admin/')}}/js/custom.min.js"></script>
</body>

</html>