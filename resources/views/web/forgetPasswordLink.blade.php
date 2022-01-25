@extends('web.support.master2')
@section('title', 'Reset Password')
@section('content')

<section class="action-bar">



<style>
.forget-section input {
        width: 100%;
    border: none;
    height: 42px;
    letter-spacing: 0.3px;
    color: black;
    padding: 0px 10px 0px 30px !important;
      border-radius: 8px;
}
.forget-section label {
   color: white;
    font-size: 16px;
    font-weight:400;
}
.forget-section input[type="submit"] {
   padding: 7px 15px !important;
    font-size: 15px !important;
    letter-spacing: 0.6px;
    border-radius: 5px;
    font-weight: 400 !important;
    background:#9a49ff !important;
    color:white !important;
    width:25%;
}
.main-heading {
    color: white;
    font-weight: 700;
    font-size: 50px;
    text-align: center;
}
.pad-top-100 {
   padding-top:100px;
}
.pad-bot-100 {
   padding-bottom:100px;
}

@media only screen and (max-width: 767px) {
.main-heading {
    font-size: 30px;
    padding-bottom:30px;
}
.forget-section input[type="submit"] {
    width: 45%;
}
}
@media screen and (min-width: 768px) and (max-width: 992px) {
  .main-heading {
    font-size: 30px;
    padding-bottom:30px;
}
.forget-section input[type="submit"] {
    width: 45%;
}
}
</style>


     <div class="container pad-top-100 pad-bot-100">
        <div class="row">
        <div class="col-md-12 col-lg-12 col-12 col-sm-12"> 
            <h1 class="main-heading text-white"> RESET PASSWORD</h1>
        </div>
        <div class="col-md-3 col-lg-3 col-12 col-sm-12">
          @if(session()->has('success'))
                      <div class="alert alert-success">
                          {{ session()->get('success') }}
                      </div>
                  @endif
                  @if(session()->has('error'))
                      <div class="alert alert-danger">
                          {{ session()->get('error') }}
                      </div>
                  @endif
         </div> 
           <div class="col-md-6 col-lg-6 col-12 col-sm-12">
            
               <form action="{{ route('reset.password.post') }}" method="POST">
                 @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                 
                  <div class="form-group forget-section">
                     <label for="exampleInputPassword1">Password</label>
                     <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                  </div>
                  <div class="form-group forget-section">
                     <label for="exampleInputPassword1">Confirm Password</label>
                     <input type="password" class="form-control" id="confirmation_password"   name="confirmation_password" placeholder="Confirm Password">
                         @if ($errors->has('confirmation_password'))
                              <span class="text-danger">{{ $errors->first('confirmation_password') }}</span>
                           @endif
                  </div>
                  <div class="forget-section">
                     <input type="submit" value="Resert Password">
                  </div>

                  
               </form>
           </div>
         <div class="col-md-3 col-lg-3 col-12 col-sm-12"> </div>
        </div>
     </div>
  </section>

@endsection
