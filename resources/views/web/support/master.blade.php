<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="host" content="{{URL::to('/')}}">
      <title> @yield('title') | Zetta</title>

      @include('web.support.style')
      @yield('addStyle')

   </head>
   <body>
      <!-- Header Section Starts Here -->
         @include('web.support.header')
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
         @yield('addScript')
   </body>
</html>
