<!DOCTYPE html>
<html lang="en">
<head>
  <title>Activate | Zetta</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
   body
      {
          font-family: 'Roboto', sans-serif !important;
          color: black;
          margin:0px;
      }
      a
      {
        text-decoration: none !important;
      }
      .section-1 {
        text-align: center;
        margin-top: -50px !important;
        max-width: 100%;
        width: 65%;
        margin: 0 auto;
    }
  .main-section
  {
      background: white;
      box-shadow: 1px 1px 14px -3px black;
      padding: 0px;
  }
  .logo-section
  {
    background:#1D242C;
    padding: 30px 0px 80px 0px;
    text-align: center;
  }
  .logo-section img
  {
    width: 10%;
  }
.section-2 {
    padding: 60px 110px 40px 110px;
}
.section-3 {
    padding: 0px 0px 20px 0px;
}
  .section-2 h2 {
    margin: 0px;
    font-size: 35px;
    padding-bottom: 15px;
}
.section-2 h4 {
    font-size: 16px;
    font-weight: 400;
    text-align: left;
}
.section-2 p {
    font-size: 16px;
    font-weight: 400;
    margin:0px;
    text-align: left;
    padding-bottom: 30px;
}
.section-2 a {
    padding: 14px 29px !important;
    font-size: 15px !important;
    letter-spacing: 0.6px;
    font-weight: 600 !important;
    background: #6c28a9;
    border-radius: 0px;
    color: white;
}
.section-3 p {
    margin: 0px;
    padding-bottom: 10px;
    font-size: 14px;
    font-weight: 400;
    color: black;
}
.section-4 a img {
    width: 3%;
}
.section-4 a {
    padding-right: 4px;
}
.section-4 hr {
    margin: 20px 0px 0px 0px;
    background: #c3c1c1;
    height: 1px;
}
.section-5 {
  padding-top: 10px;
}
.section-5 a {
    color: grey;
    font-size: 14px;
}
.section-5 a i {
    padding-right: 8px;
    padding-left: 15px;
    color: black;
}
.section-5 a:hover {
  color: #6c28a9;
}
.section-6 {
    padding-top: 5px;
    padding-bottom: 15px;
}
.section-6 a {
    color: grey;
    padding: 0px 7px;
}
.section-6 a:hover {
  color: #6c28a9;
}
.footer
{
  background:#171c22;
  padding:10px 0px;
}
.footer p
{
  font-size: 14px;
  color: white;
  margin:0px;
}
h4.sec-1 {
    font-weight: 600;
    text-align: left;
}
h4.sec-2 {
    font-size: 25px;
    font-weight: 600;
}
p.sec-3 a {
    padding: 0 !important;
    background: white;
    color: #6c28a9;
}

@media screen and (max-width:519px) and (min-width:320px) { 
  .logo-section img {
      width: 35%;
  }
  .section-1 {
    margin-left: 30px;
    margin-right: 30px;
}
.section-2 {
    padding: 40px 30px 40px 30px;
}
.section-2 h2 {
    font-size: 28px;
}
.section-2 h4 {
    font-size: 14px;
}
.section-2 p {
    font-size: 14px;
    padding-bottom: 30px;
}
.section-2 a {
    padding: 14px 20px !important;
    font-size: 12px !important;
  }
  .section-3 p {
    padding-bottom: 0px;
    font-size: 14px;
  }
  .section-4 a img {
    width: 7%;
}
.section-5 a {
    font-size: 12px;
}
.section-6 a {
    font-size: 12px;
}
}
</style>


</head>
<body>

    @include('email.includes.header')
  
  <div class="container">
    <div class="section-1">    
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 main-section">
          <div class="section-2">
              <h2>FORGOT PASSWORD</h2>
              <h4 class="sec-2">Reset your password</h4>
              <p class="sec-3">You???re receiving this email because you requested a password reset for your Zettaa account. Please tap the button below to choose a new password. This link will expire in 1 hour.If you didn???t initiate this change, please email us on <a href="">help@zettaa.ch</a> and let us know </p>    
              <a href="{{ route('reset.password.get', $token)}}"> Reset Password </a>
          </div>
          <div class="section-3">
            <p>Thanks</p>
            <p>The Zetta Team</p>
          </div>
          <div class="section-4">
            <a href="#"><img src="https://dnpprojects.com/demo/zetta/assets/website/images/fb-icon.jpg"></a>
            <a href="#"><img src="https://dnpprojects.com/demo/zetta/assets/website/images/twitter-icon.jpg"></a>
            <a href="#"><img src="https://dnpprojects.com/demo/zetta/assets/website/images/linkedin-icon.jpg"></a>
            <a href="#"><img src="https://dnpprojects.com/demo/zetta/assets/website/images/insta-icon.jpg"></a>
            <hr>
          </div>
          <div class="section-5">
            <a href="#"><i class="fa fa-phone"></i> 252255222</a>
            <a href="#"><i class="fa fa-map-marker"></i> 3 rue du Port, 1204 Gen??ve, Switzerland</a>
            <a href="#"><i class="fa fa-envelope"></i> info@zettaa.ch</a>
          </div>
          <div class="section-6">
            <a href="https://dnpprojects.com/demo/zetta/partner">Partnership</a> |
            <a href="#">Press</a> |
            <a href="https://dnpprojects.com/demo/zetta/contact">Contact</a> |
            <a href="https://dnpprojects.com/demo/zetta/faq">Faq</a> |
            <a href="https://dnpprojects.com/demo/zetta/terms">Terms & Condition</a> |
            <a href="https://dnpprojects.com/demo/zetta/disclaimerPolicy">Disclaimer Policy</a>
          </div>
          <div class="footer">
            <p>?? 2021 zettaa. All Rights Reserved</p>
          </div>
        </div>
        <div class="col-lg-2"></div>
      </div>
    </div>
  </div>

</body>
</html>
