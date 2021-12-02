@extends('web.support.master2')
@section('title', 'About Us')
@section('addStyle')
<style>

body{
    background-image: url('{{URL::to('/assets/website')}}/images/side-particles.png');
    background-size: contain;
    background-color: #1d242c;
}

h1.main-heading {
    color: white;
    font-weight: 900;
    font-size: 70px;
    text-align: center;
}

p.main-head-text {
    text-align: center;
    color: #a2a2a2;
    letter-spacing: 2px;
}

section.action-bar {
    margin-top: 70px !important;
    background-image: url('{{URL::to('/assets/website')}}/images/Banner.png');
    background-size: contain;
    padding-top: 200px;
    padding-bottom: 200px;
    border-bottom:none !important;
}

section.reasons-run{
    /*background-image: url('{{URL::to('/assets/website')}}/images/side-particles.png');
    background-size: cover;*/
    padding-top: 80px;
    padding-bottom: 80px;
}

h2.reasons-run-main-head {
    text-align: center;
    font-size: 20px;
    padding-bottom: 15px;
}

.sec-2 {
    padding-bottom: 60px;
}

.sec-3 {
    padding-bottom: 40px;

}

h2.reasons-run-main-head-text {
    text-align: center;
    font-size: 45px;
    font-weight: 900;
    color: #6f1ad9;
}

.center-video img {
    width: 80%;
}

.center-video { 
    text-align: center;
}

.reason-one-text, .reason-two-text, .reason-three-text, .reason-four-text {
    color: #515151;
    font-size: 15px;
}

.reason-one-main {
    padding-top: 60px;
}

.reason-two-main {
    padding-top: 60px;
}

.reason-one-main-div {
    display: grid;
}

.reason-two, .reason-four, .reason-two-text, .reason-four-text {
    text-align: right;
}

.wom-bi-main {
    text-align: left;
}

.wom-bi-main1 {
    text-align: center;
}

.wom-bi-main2 {
    text-align: right;
}

.wom-bi-main img, .wom-bi-main1 img, .wom-bi-main2 img {
    width: 95%
}

.reason-one, .reason-two, .reason-three, .reason-four {
    color: #6f1ad9;
    font-size: 24px;
    font-weight: 900;
    line-height: 60px;
}
.custom-container {
    width: 100% !important;
    max-width: 1300px !important;
}

.coach1-head, .coach2-head, .coach3-head {
    text-align: center;
    padding-top: 25px;
    font-weight: 900;
    color: #6f1ad9;
}

.coach1-text, .coach2-text, .coach3-text {
    text-align: center;
    font-size: 15px;
    font-weight: 500;
}

.coaches-section {
    padding-bottom: 60px;
}
.how-it-was-main-head {
    font-size: 45px;
    font-weight: 900;
    line-height: 70px;
    color: #6f1ad9;
}
.how-it-was-img {
    text-align: right;
}

.how-it-was-img img {
    width: 85%;
}
.how-it-was {
    padding-bottom: 60px;
}

.how-it-was-text {
    padding-right: 60px;
    font-size: 16px;
    color: #000000;
    line-height: 30px;
    letter-spacing: 1px;
}


@media only screen and (max-width: 767px){

    section.action-bar {
    margin-top: 160px !important;
    background-size: cover;
    padding-top: 100px;
    padding-bottom: 100px;
    background-repeat: no-repeat;
    background-position: center;
        }

    h1.main-heading {
    font-size: 50px;
        }
.sec-2 {
    padding-bottom: 10px;
}
h2.reasons-run-main-head-text {
    font-size: 35px;
}
.reason-one, .reason-two, .reason-three, .reason-four {
    text-align: center;
    line-height: 40px;
}  
.reason-one-text, .reason-two-text, .reason-three-text, .reason-four-text {
    font-size: 16px;
    text-align: center;

}
.reason-two-text {
    text-align: center;
}
.reasons-run-main-head-text {
    text-align: center;
}   
.center-video img {
    width: 100%;
    padding-top: 30px;
}
.reason-two-main {
    padding-top: 30px;
}
section.reasons-run {
    padding-top: 30px;
    padding-bottom: 30px;
}
.wom-bi-main img, .wom-bi-main1 img, .wom-bi-main2 img {
    width: 90%;
}
.wom-bi-main, .wom-bi-main1, .wom-bi-main2 {
    text-align: center;
}
.reason-four-main {
    padding-bottom: 30px;
}
.coach2-head, .coach1-head, .coach3-head {
    padding-top: 10px;
}
.coaches-section {
    padding-bottom: 00px;
}
.how-it-was-main-head {
    font-size: 35px;
    text-align: center;
    line-height: 40px;
}
.how-it-was-text {
    padding: 0px 0px 30px 0px !important;
    text-align: center;
    line-height: 25px;
    letter-spacing: 0px;
}
.reason-one-main {
    padding-top: 30px;
}
.how-it-was-img img {
    width: 90%;
}
.how-it-was-img {
    text-align: center;
}
}

.text-white {

    color:#fff !important;
}


@media only screen and (min-device-width : 768px) and (max-device-width : 1024px){

.center-video img {
    width: 100%;
}

.reason-one-main {
    padding-top: 0px;
}
.reason-two-main {
    padding-top: 0px;
}
.reason-one, .reason-two, .reason-three, .reason-four {
    
    line-height: 40px;
}

.how-it-was-text {
    padding-right: 0px;
    font-size: 16px;
    letter-spacing: 0px;
}
.how-it-was-img img {
    width: 100%;
}



}

</style>
@endsection
@section('content')


<section class="action-bar">
   <div class="container custom-container">
        <div class="row">
              <div class="col-md-12">
                    <h1 class="main-heading text-white">{{ __('content.aboutus_ABOUT US') }}</h1>
                    <p class="main-head-text">{{ __('content.aboutus_HOME') }}&nbsp;&nbsp; | &nbsp;&nbsp;{{ __('content.aboutus_ABOUT US') }}</p>
              </div>
        </div>
    </div>
</section>

<section class="reasons-run">
    <div class="container custom-container">
        <div class="row">
              <div class="col-md-12 sec-2">
                    <h2 class="reasons-run-main-head text-white">{{ __('content.aboutus_WELCOME') }}</h2>
                    <h2 class="reasons-run-main-head-text text-white">{{ __('content.aboutus_REASONS TO RUN WITH US!') }}</h2>
              </div>
        </div>
        <div class="row">
            <div class="col-md-3 reason-one-main-div">
                <div class="reason-one-main">
                    <h3 class="reason-one text-white">{{ __('content.aboutus_BE HEALTHY') }}</h3>
                    <p class="reason-one-text text-white">{{ __('content.aboutus_Fresh air and early morning running trips sure can cure almost anything.') }}</p>
                </div>
                <div class="reason-three-main">
                    <h3 class="reason-three text-white">{{ __('content.aboutus_FEEL FREE') }}</h3>
                    <p class="reason-one-text text-white">{{ __('content.aboutus_Nothing makes you feel more free and independent as running open road.') }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="center-video">
                    <img src="{{URL::to('/assets/website/images/video-picture.png')}}"/>
                </div>
            </div>
            <div class="col-md-3 reason-one-main-div">
                <div class="reason-two-main">
                    <h3 class="reason-two text-white">{{ __('content.aboutus_BE ONE OF US') }}</h3>
                    <p class="reason-two-text text-white">{{ __('content.aboutus_By joining our group, you get to experience 100% unforgettable moments.') }}</p>
                </div>
            
                <div class="reason-four-main">
                    <h3 class="reason-four text-white">{{ __('content.aboutus_BE STRONG') }}</h3>
                    <p class="reason-two-text text-white">{{ __('content.aboutus_Regular running helps you stay fit healthy and hardy no matter what.') }}</p>
                </div>
            </div>
        </div>
    </div>    
</section>

<section class="coaches-section">
    <div class="container custom-container">
        <div class="row">
            <div class="col-md-12 sec-3">
                <h2 class="reasons-run-main-head text-white">{{ __('content.aboutus_TEAM') }}</h2>
                <h2 class="reasons-run-main-head-text text-white">{{ __('content.aboutus_OUR COACHES') }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="wom-bi-main">
                    <img src="{{URL::to('/assets/website/images/women-biceps.png')}}"/>
                </div>
                <div class="reason-four-main">
                    <h3 class="coach1-head text-white">{{ __('content.aboutus_LAURA PRISTON') }}</h3>
                    <p class="coach1-text text-white">{{ __('content.aboutus_COACH PACER') }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wom-bi-main1">
                    <img src="{{URL::to('/assets/website/images/squats-train.png')}}"/>
                </div>
                <div class="reason-four-main ">
                    <h3 class="coach2-head text-white">{{ __('content.aboutus_LAURA PRISTON') }}</h3>
                    <p class="coach2-text text-white">{{ __('content.aboutus_COACH PACER') }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wom-bi-main2">
                    <img src="{{URL::to('/assets/website/images/card-holder.png')}}"/>
                </div>
                <div class="reason-four-main">
                    <h3 class="coach3-head text-white">{{ __('content.aboutus_LAURA PRISTON') }}</h3>
                    <p class="coach3-text text-white">{{ __('content.aboutus_COACH PACER') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="how-it-was">
    <div class="container custom-container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="how-it-was-main-head text-white">{{ __('content.aboutus_HOW IT WAS') }}</h2>
                <p class="how-it-was-text text-white">{{ __('content.aboutus_Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim.') }}</p>
            </div>
            <div class="col-md-6">
                <div class="how-it-was-img">
                    <img src="{{URL::to('/assets/website/images/bi-with-bar.png')}}"/>
                </div>
            </div>
        </div>   
    </div>
</section>

<h1>Hello World!</h1>

@endsection
