<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="host" content="{{URL::to('/')}}">
      <title> @yield('title') | Zettaa</title>

      @include('web.support.style')
      @yield('addStyle')

      @if(!Auth::check())
         <style type="text/css">
            @media only screen and (max-width: 767px) {
               section.action-bar {
                   margin-top: 124px !important;
               }
            }
         </style>
      @endif
   </head>
   <body>
      <!-- Header Section Starts Here -->
         @include('web.support.header2')
      <!-- Header Section Ends Here -->
      <!-- Banner Section Starts Here -->
         @yield('content')
      <!-- Contact Map Section Ends Here -->

         @include('web.support.modal')
      <!-- Footer Section Starts Here -->
         @include('web.support.footer')
      <!-- Footer Section Ends Here -->
      <!-- Bootstrap Javascript -->
         @include('web.support.script')
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         @if(session()->has('success'))
            <script type="text/javascript">
               Swal.fire(
                 'Success!',
                 "{{ session()->get('success') }}",
                 'success'
               );
            </script>

         @endif
         @yield('addScript')
   </body>
</html>
