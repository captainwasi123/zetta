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
    /*margin-top: 70px !important;*/
    background-image: url('{{URL::to('/assets/website')}}/images/Banner.png');
    background-size: cover;
    padding-top: 200px;
    padding-bottom: 200px;
    border-bottom:none !important;
    background-position: center;
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

.why-we-do-it {
    padding-bottom: 30px !important;
    padding-top: 30px !important;
}
.how-it-was {
    padding-top: 50px !important;
}

.how-we-do-it, .howwedoit-text, .how-it-started-text {
    /*padding-bottom: 30px !important;*/
    padding-top: 30px !important;
}

.how-we-do-it .row, .how-it-started .row {
    flex-direction: column-reverse;
}
.howwedoit-img img {
    width: 100% !important;
}

p.text-white {
    padding: 0px !important;
}

.whywedoit-img img {
    text-align: left;
    width: 100% !important;
    padding-bottom: 40px;
}



    section.action-bar {
    background-size: cover;
    padding-top: 50px;
    padding-bottom: 50px;
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
section.action-bar {
    padding: 100px 0px !important;
    }



}

.how-it-started {
    padding-top: 100px;
}

.how-it-started-img img {
    width: 100%;
}
.whywedoit-img {
    text-align: left;
}

.how-we-do-it {
    padding-bottom: 60px;
    padding-top: 60px;
}

.why-we-do-it {
    padding-bottom: 60px;
    padding-top: 60px;
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

<section class="how-it-was how-it-started">
    <div class="container custom-container">
        <div class="row">
            <div class="col-md-6 how-it-started-text">
                <h2 class="how-it-was-main-head text-white">How it Started</h2>
                <p class="how-it-was-text text-white">Zettaa is an idea that emerged from three friends based in Geneva Switzerland. We all played ice hockey and one day in February 2021 we were looking to organize a game with our other friends but none were available. We were stuck and couldn’t find any partners to play with. We then came up with the idea to create a platform where sports passionate just like us could post their activity and get people to participate in them. We put all our time and energy to make sure to create the best platform for our users so they can go and enjoy their activity without wondering if they will find partners. We also dedicated a space for coaches to showcase their knowledge and help them find new clients.</p>
            </div>
            <div class="col-md-6">
                <div class="how-it-was-img how-it-started-img">
                    <img src="{{URL::to('/assets/website/images/bi-with-bar.png')}}"/>
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
                <h2 class="reasons-run-main-head-text text-white">MEET OUR TEAM</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="wom-bi-main">
                    <img src="{{URL::to('/assets/website/images/women-biceps.png')}}"/>
                </div>
                <div class="reason-four-main">
                    <h3 class="coach1-head text-white">Axel Olson</h3>
                    <p class="coach1-text text-white">{{ __('content.aboutus_COACH PACER') }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wom-bi-main1">
                    <img src="{{URL::to('/assets/website/images/squats-train.png')}}"/>
                </div>
                <div class="reason-four-main ">
                    <h3 class="coach2-head text-white">Tahar Petrucci</h3>
                    <p class="coach2-text text-white">{{ __('content.aboutus_COACH PACER') }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wom-bi-main2">
                    <img src="{{URL::to('/assets/website/images/card-holder.png')}}"/>
                </div>
                <div class="reason-four-main">
                    <h3 class="coach3-head text-white">Sylvestre Galli</h3>
                    <p class="coach3-text text-white">{{ __('content.aboutus_COACH PACER') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="coaches-section">
    <div class="container custom-container">
        
        <div class="row">
            <div class="col-md-2">
                                
            </div>
            <div class="col-md-4">
                <div class="wom-bi-main1">
                    <img src="{{URL::to('/assets/website/images/squats-train.png')}}"/>
                </div>
                <div class="reason-four-main ">
                    <h3 class="coach2-head text-white">Neal Schiffelholz</h3>
                    <p class="coach2-text text-white">{{ __('content.aboutus_COACH PACER') }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wom-bi-main2">
                    <img src="{{URL::to('/assets/website/images/card-holder.png')}}"/>
                </div>
                <div class="reason-four-main">
                    <h3 class="coach3-head text-white">Tobias Wicht</h3>
                    <p class="coach3-text text-white">{{ __('content.aboutus_COACH PACER') }}</p>
                </div>
            </div>
            <div class="col-md-2">
                               
            </div>
        </div>
    </div>
</section>

<section class="reasons-run">
    <div class="container custom-container">
        <div class="row">
              <div class="col-md-12 sec-2">
                    <h2 class="reasons-run-main-head text-white">{{ __('content.aboutus_WELCOME') }}</h2>
                    <h2 class="reasons-run-main-head-text text-white">REASONS TO USE ZETTAA</h2>
              </div>
        </div>
        <div class="row">
            <div class="col-md-3 reason-one-main-div">
                <div class="reason-one-main">
                    <h3 class="reason-one text-white">Save time and money:</h3>
                    <p class="reason-one-text text-white">Due to the centralisation of our platform, find the right partner or coach that fits your expectations easily. (whether it is financial or scheduling)</p>
                </div>
                <div class="reason-three-main">
                    <h3 class="reason-three text-white">Be healthy:</h3>
                    <p class="reason-one-text text-white">Exercising regularly helps you stay fit and clear your mind from stress and daily problems</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="center-video">
                    <img src="{{URL::to('/assets/website/images/video-picture.png')}}"/>
                </div>
            </div>
            <div class="col-md-3 reason-one-main-div">
                <div class="reason-two-main">
                    <h3 class="reason-two text-white">Be one of us:</h3>
                    <p class="reason-two-text text-white">By joining Zettaa you get full access to our services and our different communities and join all the activities close to you.</p>
                </div>
            
                <div class="reason-four-main">
                    <h3 class="reason-four text-white">Be independant:</h3>
                    <p class="reason-two-text text-white">No more memberships or club affiliation, be free to do your activity when you feel like it by creating your own activities.</p>
                </div>
            </div>
        </div>
    </div>    
</section>



<section class="how-it-was why-we-do-it">
    <div class="container custom-container">
        <div class="row">
            <div class="col-md-6">
                <div class="how-it-was-img whywedoit-img">
                    <img src="{{URL::to('/assets/website/images/bi-with-bar.png')}}"/>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="how-it-was-main-head text-white">WHY WE DO IT?</h2>
                <p class="how-it-was-text text-white">We created this platform for everyone to use, no matter who you are or what sport you play. We value equality for all our users and we promote all sports in order to create a healthy lifestyle for our users. We want you to be able to create your community or expand the one you already have. We also want our coaches to find new clients and make their life easier for them with our platform. At Zettaa we aim to create a healthy habit for our customers by helping them exercise and get fit as well as contributing to a sustainable society</p>
            </div>            
        </div>   
    </div>
</section>



<section class="how-it-was how-we-do-it">
    <div class="container custom-container">
        <div class="row">
            <div class="col-md-6 howwedoit-text">
                <h2 class="how-it-was-main-head text-white">HOW WE DO IT?</h2>
                <p class="how-it-was-text text-white">We are able to accomplish all of our services on our platform by using an algorithm that links you directly to your sport and lead you to what you are looking for, whether you want to create or join an activity or find the right coach for you. You will be able to use your personalized dashboard that tracks your activity and will show you your progression instantly. We also offer safe payment with our partner Stripe. We make our platform easy to use, so you can find what you are looking for in just a couple clicks.</p>
            </div>
            <div class="col-md-6">
                <div class="how-it-was-img howwedoit-img">
                    <img src="{{URL::to('/assets/website/images/bi-with-bar.png')}}"/>
                </div>
            </div>
        </div>   
    </div>
</section>


@endsection
