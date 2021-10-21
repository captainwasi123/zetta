<!DOCTYPE html>
<html lang="en">
<head>
  <title> {{ __('content.Stripe Payment Gateway') }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    .stripe-logo {
      width: 210px;
      float: right;
      margin-top: -15px;
    }
    .payment-logo {
      width: 235px;
      float: left;
    }
  </style>
</head>
<body>
<div class="container">
      <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="jumbotron text-center">
          <div class="row">
            <div class="col-md-6">
              <img src="{{URL::to('/')}}/assets/website/images/zetta-logo.png" class="payment-logo">
            </div>
            <div class="col-md-6">
              <img src="{{URL::to('/')}}/public/stripe.png" class="stripe-logo">
            </div>
            <div class="col-md-12">
              <hr>
              <h1>{{ __('content.Stripe Payment Gateway') }}</h1>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
                <form id="payment-form">
                    @csrf
                    <input type="hidden" name="amount" value="{{$amount}}">
                    <input type="hidden" name="orderId" value="{{$id}}">
                    <input type="hidden" name="type" value="{{$type}}">
                    <label>{{ __('content.Please enter your card details')}}</label>
                    <div id="card-element"></div>
                    <br>
                    <div class="col-md-12" id="pybtn">
                      <button class="btn btn-primary btn-block">Pay £{{$amount}}</button>
                    </div>
                    <div id="pybtn2">
                        
                    </div>
                </form>
            </div>
          </div>
      </div>
      <div class="col-md-3"></div>
      </div>
    </div>
  
</div>
  <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        var url = "{{route('stripe.submit')}}";
        var stripe = Stripe("{{env('STRIPE_API_KEY')}}");
        var form = document.getElementById('payment-form');
        
        var element = stripe.elements();
        var cardElement = element.create('card');
        cardElement.mount('#card-element');
        
        
       console.log('Registering Form submit handling....');
        form.addEventListener('submit', function(e){
            e.preventDefault();
            
            console.log('Createing Payment intent');
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type' : 'application/json',
                },
                body: JSON.stringify({_token: '{{csrf_token()}}', orderId: '{{$id}}', amount: '{{$amount}}', type: '{{$type}}'}),
            })
            .then((response) => response.json())
            .then((data) => {
                
                console.log('Created payment intent: '+data.client_secret);
                stripe.confirmCardPayment(
                    data.client_secret, {
                        payment_method: {
                            card: cardElement,
                        }
                    }
                )
                .then(function(result){
                    if(result.error){
                        document.getElementById("pybtn2").innerHTML = '<br><div class="alert alert-danger"><strong>Error!</strong> Please Enter valid Card Information.</div>';
                        console.log(result.error.message);
                    }else{
                        document.getElementById("pybtn2").innerHTML = '';
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("pybtn").innerHTML = '<div class="alert alert-success"><strong>Payment Successful!</strong></div>';
                                setTimeout(function(){
                                    window.location.href = "{{URL::to('/thankyou')}}";
                                }, 500)
                                console.log(JSON.stringify(result, null, 2));
                            }else{
                                document.getElementById("pybtn").innerHTML = "<img src='https://static.tildacdn.com/tild3637-3962-4434-b061-613661376165/loader.gif' width='150px' />";
                            }
                        };
                        xhttp.open("GET", "{{URL::to('/order/confirmed/'.$id.'/'.$type)}}", true);
                        xhttp.send();
                        
                    }
                })
            })
            .catch((error) => {
                
            });
        });
    </script>
</body>
</html>













