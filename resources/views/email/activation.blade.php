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
    padding-bottom: 40px;
    text-align: left;
    line-height: 24px;
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
@media screen and (max-width:519px) and (min-width:320px) {
  .logo-section img {
      width: 35%;
  }
   .section-1 {
      width: 75%;
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
    line-height: 17px;
}
.section-2 a {
    padding: 14px 20px !important;
    font-size: 9px !important;
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
              <h2>ACTIVATE YOUR ACCOUNT</h2>
              <h4>You're almost there! Just Confirm you Email</h4>
              <p>You've successfully created a Zetta Account. <br>To activate it, please click below to verify you Email Address.</p>

             <p> </p>
              <a href="{{URl::to('confirmnwithlogin')}}/{{$id}}"> ACTIVATE YOUR ACCOUNT </a>
          </div>
          @include('email.includes.footer')
        </div>
        <div class="col-lg-2"></div>
      </div>
    </div>
  </div>

</body>
</html>
