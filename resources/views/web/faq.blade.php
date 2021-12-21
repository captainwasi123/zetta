@extends('web.support.master2')
@section('title', 'FAQ')
@section('addStyle')

<style type="text/css">

    .term-sec1 h2 {
        color: white;
        text-align: center;
        letter-spacing: 1px;
        padding-top: 20px;
    }

    .term-sec1 h3 {
        font-size: 24px;
        font-weight: 500;
        letter-spacing: 1px;
        color: white;
        padding-top: 30px;
    }

    .accordion {
        background-color: transparent;
        color: #fff;
        cursor: pointer;
        padding: 20px;
        width: 100%;
        border: 1px solid #6c28a9;
        text-align: left;
        outline: none;
        font-size: 18px;
        transition: 0.6s;
        border-radius: 10px 10px 10px 10px;
        margin-bottom: 20px;
    }

    .active, .accordion:hover {
        background-color: #fff;
        color: #6C28A9;
        border: 0px solid #fff;
        border-bottom: 2px;
        /*border-radius: 0px 0px 0px 0px;*/
    }

    .active, .accordion:active {
        background-color: #fff;
        color: #6C28A9;
        border: 0px solid #fff;
        border-bottom: 1px;
        border-radius: 10px 10px 0px 0px;
        margin-bottom: 00px;
    }

    .panel {
        padding: 20px 20px;
        display: none;
        background-color: transparent;
        overflow: hidden;
        border: 1px solid #fff;
        border-radius: 0px 0px 10px 10px;
        font-size: 15px;
        letter-spacing: 0.6px;
        line-height: 26px;
        font-weight: 300;
        color: white;
        margin-bottom: 20px;
    }
    .custom-container {
        width: 100% !important;
        max-width: 1300px !important;
}
    .panel p{
        margin-left: 20px;
    }

.accordion-para {
    color: white;
    font-size: 16px;
    font-weight: 300;
}
</style>

@endsection
@section('content')
<body>
<section class="action-bar">
    <div class="container custom-container">
        <div>
        <div class="term-sec1">
            <h2>{{ __('content.FAQ') }} </h2>
                <h3>SPORTBUDDY</h3>
                    <button class="accordion">What is a Sportbuddy ?</button>
                    <div class="panel">
                        <p>The Sportbuddy section is meant for people that are looking for friends or activities in
                           their area. You will be able to post your activities, with our filters (level, age, number of
                           participants) we will help you find the perfect participants. You can also look for activities
                           created by other Sportbuddies in your area and participate in them freely. So join us and
                           start building your community!</p>
                    </div>
                    <h3>ACTIVITY</h3>
                    <button class="accordion">How do I create an activity?</button>
                    <div class="panel">
                        <ol>
                            <li>Register on the platform</li>
                            <li>Set up your account</li>
                            <li>Click on activities where you will see our selection of activities near you and use
                                our filters and find the perfect match for you.</li>
                            <li>Once you create your activity, it will appear on our activity page, the other sport
                                buddies will be able to join as soon as it is posted.</li>
                            <li>Participate in your activity</li> 
                            <li>Repeat steps 3-5 (wink emoji)</li> 
                        </ol>
                    </div>
                    <button class="accordion">How do I join an activity ?</button>
                    <div class="panel">
                        <ol>
                            <li>Register on the platform</li>
                            <li>Set up your account</li>
                            <li>Click on activities where you will see our selection of activities near you and use
                                our filters and find the perfect match for you.</li>
                            <li>Once you find the activity that suits you, be sure to join it while you can
                                depending on the number of participants.</li>
                            <li>Go and enjoy your activity</li>
                            <li>Review your coach on his performance</li>
                            <li>Repeat steps 3-6 (wink emoji)</li>
                        </ol>
                    </div>
                    <button class="accordion">Do I need to pay to participate in an activity?</button>
                    <div class="panel">
                        <p>An activity is always free, the Sportbuddy who created the activity can choose to lend
                           equipment and set his own price for that equipment.</p>
                    </div>
                    <button class="accordion">Friends</button>
                    <div class="panel">
                        <p>Through your dashboard you can find other SportBuddies and add them to your friends
                            list. It will facilitate communication and you can share activities together.</p>
                    </div>
                    <button class="accordion">How do I find a coach and get started?</button>
                    <div class="panel">
                        <p>From the home page click on the Coach Button and find the different coaches selected
                            by our team. You can also just type in the search bar your sport or location and you will
                            have into the results coaches related to your requirements.</p>
                    </div>
                    <button class="accordion">How much does it cost to book a training sessions?</button>
                    <div class="panel">
                        <p>All the prices for lessons are set by the coaches themselves, if you feel like a coach is
                            overcharging for a service without a reasonable explanation please contact the support
                            team.</p>
                    </div>
                    <button class="accordion">Can I contact a coach before booking sessions?</button>
                    <div class="panel">
                        <p>Yes, you can always contact a coach for any reason, by using our messaging system.</p>
                    </div>
                    <button class="accordion">I haven't received a response from a coach I've messaged, what now?</button>
                    <div class="panel">
                        <p>if you haven’t heard from your coach, make sure to check that the message has been
                            sent and delivered if you still don’t have an answer after 48h our support team will help
                            you.</p>
                    </div>
                    <button class="accordion">What is Zettaa’s cancellation policy for scheduled sessions?</button>
                    <div class="panel">
                        <p>attach our cancellation and refund policy</p>
                    </div>
                    <button class="accordion">Will my unused Zettaa packages ever expire?</button>
                    <div class="panel">
                        <p>Once you buy a lesson package you have one full year to complete your lessons if you
                            haven’t done so your lessons will expire. Note that if there is a valid reason you can
                            always ask for a refund prior the expiration.</p>
                    </div>
                    <button class="accordion">Can I refer others to Zettaa?</button>
                    <div class="panel">
                        <p>We encourage you to recommend Zettaa to your friends, family and sports communities
                            that you know in order to increase the activity on the platform. In the next couple of
                            months we will reward profiles that bring new users on the platform.. Stay tuned.</p>
                    </div>



                    <h3>COACHES</h3>
                    <p class="accordion-para">The coaches available on the platform are selected according to very precise criteria in
                        order to guarantee quality services for all users and in respect of the profession of
                        coaching.</p>
                    <button class="accordion">How do I become a Zettaa Coach?</button>
                    <div class="panel">
                        <p>To become a Zettaa coach, you will have to fill out our questionnaire that includes
                            information on your past experiences, your athletic accomplishments and more. You are
                            then going to be reviewed by our team and we will only select the candidates that suit
                            our criterias.<br/>
                            Read and accept our quality agreement designed by our team.</p>
                    </div>

                    <button class="accordion">Section 3</button>
                    <div class="panel">
                        
                    </div>

                <script>
                    var acc = document.getElementsByClassName("accordion");
                    var i;

                    for (i = 0; i < acc.length; i++) {
                        acc[i].addEventListener("click", function () {
                            this.classList.toggle("active");
                            var panel = this.nextElementSibling;
                            if (panel.style.display === "block") {
                                panel.style.display = "none";
                            } else {
                                panel.style.display = "block";
                            }
                        });
                    }
                </script>
        </div>
    </div>
</section>
@endsection