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
                <h3>{{ __('content.SPORTBUDDY')}}</h3>
                    <button class="accordion">{{ __('content.What is a Sportbuddy?')}}</button>
                    <div class="panel">
                        <p>{{ __('content.The Sportbuddy section is meant for people that are looking for friends or activities in their area. You will be able to post your activities, with our filters (level, age, number of participants) we will help you find the perfect participants. You can also look for activities  created by other Sportbuddies in your area and participate in them freely. So join us and  start building your community!')}}</p>
                    </div>
                    <h3>{{ __('content.ACTIVITY')}}</h3>
                    <button class="accordion">{{ __('content.How do I create an activity?')}}</button>
                    <div class="panel">
                        <ol>
                            <li>{{ __('content.Register on the platform')}}</li>
                            <li>{{ __('content.Set up your account')}}</li>
                            <li>{{ __('content.Click on activities where you will see our selection of activities near you and use our filters and find the perfect match for you.')}}</li>
                            <li>{{ __('content.Once you create your activity, it will appear on our activity page, the other sport buddies will be able to join as soon as it is posted.')}}</li>
                            <li>{{ __('content.Participate in your activity')}}</li>
                            <li>{{ __('content.Repeat steps 3-5 (wink emoji)')}}&#128521;</li>
                        </ol>
                    </div>
                    <button class="accordion">{{ __('content.How do I join an activity ?')}}</button>
                    <div class="panel">
                        <ol>
                            <li>{{ __('content.Register on the platform')}}</li>
                            <li>{{ __('content.Set up your account')}}</li>
                            <li>{{ __('content.Click on activities where you will see our selection of activities near you and use our filters and find the perfect match for you.')}}</li>
                            <li>{{ __('content.Once you find the activity that suits you, be sure to join it while you can depending on the number of participants.')}}</li>
                            <li>{{ __('content.Go and enjoy your activity')}}</li>
                            <li>{{ __('content.Review your coach on his performance')}}</li>
                            <li>{{ __('content.Repeat steps 3-6 (wink emoji)')}} &#128521;</li>
                        </ol>
                    </div>
                    <button class="accordion">{{ __('content.Do I need to pay to participate in an activity?')}}</button>
                    <div class="panel">
                        <p>{{ __('content.An activity is always free, the Sportbuddy who created the activity can choose to lend equipment and set his own price for that equipment.')}}</p>
                    </div>
                    <button class="accordion">{{ __('content.Friends')}}</button>
                    <div class="panel">
                        <p>{{ __('content.Through your dashboard you can find other SportBuddies and add them to your friends list. It will facilitate communication and you can share activities together.')}}</p>
                    </div>
                    <button class="accordion">{{ __('content.How do I find a coach and get started?')}}</button>
                    <div class="panel">
                        <p>{{ __('content.From the home page click on the Coach Button and find the different coaches selected by our team. You can also just type in the search bar your sport or location and you will have into the results coaches related to your requirements.')}}</p>
                    </div>
                    <button class="accordion">{{ __('content.How much does it cost to book a training sessions?')}}</button>
                    <div class="panel">
                        <p>{{ __('content.All the prices for lessons are set by the coaches themselves, if you feel like a coach is overcharging for a service without a reasonable explanation please contact the support team.')}}</p>
                    </div>
                    <button class="accordion">{{ __('content.Can I contact a coach before booking sessions?')}}</button>
                    <div class="panel">
                        <p>{{ __('content.Yes, you can always contact a coach for any reason, by using our messaging system.')}}</p>
                    </div>
                    <button class="accordion">{{ __('content.I haven`t received a response from a coach I`ve messaged, what now?')}}</button>
                    <div class="panel">
                        <p>{{ __('content.if you haven’t heard from your coach, make sure to check that the message has been sent and delivered if you still don’t have an answer after 48h our support team will help you')}}.</p>
                    </div>
                    <button class="accordion">{{ __('content.What is Zettaa’s cancellation policy for scheduled sessions?')}}</button>
                    <div class="panel">
                        <p>{{ __('content.attach our cancellation and refund policy')}}</p>
                    </div>
                    <button class="accordion">{{ __('content.Will my unused Zettaa packages ever expire?')}}</button>
                    <div class="panel">
                        <p>{{ __('content.Once you buy a lesson package you have one full year to complete your lessons if you haven’t done so your lessons will expire. Note that if there is a valid reason you can always ask for a refund prior the expiration.')}}</p>
                    </div>
                    <button class="accordion">{{ __('content.Can I refer others to Zettaa?')}}</button>
                    <div class="panel">
                        <p>{{ __('content.We encourage you to recommend Zettaa to your friends, family and sports communities that you know in order to increase the activity on the platform. In the next couple of months we will reward profiles that bring new users on the platform.. Stay tuned.')}}</p>
                    </div>



                    <h3>COACHES</h3>
                    <p class="accordion-para">{{ __('content.The coaches available on the platform are selected according to very precise criteria in order to guarantee quality services for all users and in respect of the profession of coaching.')}}</p>
                    <button class="accordion">{{ __('content.How do I become a Zettaa Coach?')}}</button>
                    <div class="panel">
                        <p>{{ __('content.To become a Zettaa coach, you will have to fill out our questionnaire that includes information on your past experiences, your athletic accomplishments and more. You are then going to be reviewed by our team and we will only select the candidates that suit our criterias.')}}<br/>
                            {{ __('content.Read and accept our quality agreement designed by our team.')}}</p>
                    </div>
                     <h3>{{ __('content.LESSONS')}}</h3>
                    <button class="accordion">{{ __('content.How do I create a lesson?')}}</button>
                    <div class="panel">
                       <p class="accordion-para">
                            {{ __('content.Zettaa is an online sport platform that gives the chance to coaches to expand their visibility and help them organize their booking sessions with an agenda and secure payment. Using Zettaa is as easy as 1-2-3. to create a lesson you will have to:')}}
                       </p>
                             <ol>
                               <li> {{ __('content.Register on the platform')}}</li>
                               <li> {{ __('content.Set up your account')}}</li>
                               <li> {{ __('content.Go on your dashboard select lessons, then click on “create a lesson”. fill in all the information needed for the lesson (be as informative as possible)')}}</li>
                               <li>  {{ __('content.Once you create your lesson, it will appear on our lesson page, the client will book according to your availability.')}}</li>
                               <li> {{ __('content.Coach your lesson.')}}</li>
                               <li> {{ __('content.Review your client on his performance')}}</li>
                               <li> {{ __('content.Repeat steps 3-6 (wink emoji)')}}&#128521;</li>
                        </ol>

                    </div>

                    <button class="accordion">{{ __('content.How do I book a lesson?')}}</button>
                    <div class="panel">
                        <ol>
                            <li>{{ __('content.Register on the platform')}}</li>
                            <li>{{ __('content.Set up your account')}}</li>
                            <li>{{ __('content.Click on lessons where you will see our selection of coaches near you and use our filters and find the perfect match for you.')}}</li>
                            <li>{{ __('content.Once you find the lesson that suits you, you will then select the time and day according to your coach`s availability. and pay through our safe payment method (Stripe).')}}</li>
                            <li>{{ __('content.Go and enjoy your lesson')}}</li>
                            <li>{{ __('content.Review your coach on his performance<')}}/li>
                            <li>{{ __('content.Repeat steps 3-6 (wink emoji)')}}&#128521;</li>

                        </ol>
                    </div>

                    <button class="accordion">{{ __('content.How do I set my availability?')}}</button>
                    <div class="panel">
                        <ol>
                        <li>{{ __('content.On your dashboard select the availability slots tab on the left menu')}}.</li>
                        <li>{{ __('content.Set your availability for each day according to each lesson that you offer.')}}</li>
                        <li>{{ __('content.Your availability will reflect on your agenda when the client is booking the session.')}}</li>

                        </ol>
                    </div>

                    <button class="accordion">{{ __('content.How do I set my training locations?')}}</button>
                    <div class="panel">
                       <p>
                            {{ __('content.When you create your lesson you will be asked to select a location, you can even add several if you need.The locations will then reflect on our map. We recommend not to use your home address for your own safety')}}
                       </p>
                    </div>
                    <button class="accordion">{{ __('content.Changing my price and adding group packages')}}</button>
                    <div class="panel">
                        <p>
                        {{ __('content.You will always set your own price for your lessons, if you want to change your price,')}}</p>
                        <p>{{ __('content.you will have to select the lesson tab on your dashboard and then click “edit”.')}}</p>
                        <p>{{ __('content.You can offer packages which will include several lessons')}}
                        </p>
                    </div>
                    <button class="accordion">{{ __('content.Messaging with Clients')}}</button>
                    <div class="panel">
                         <p>
                            {{ __('content.Zettaa offers a messaging system through your profile. For your own safety and to guarantee you a certain level of quality you will only communicate with your client on Zettaa.')}}
                        </p>
                    </div>
                    <button class="accordion">{{ __('content.What happens once I complete my session?')}}</button>
                    <div class="panel">
                         <p>
                            {{ __('content.Once you complete your session your client will rate your lesson and you will receive a confirmation email for completing the lesson. For the client itself, you will need to review your coach and rate him, you will also receive an email once you complete your lesson with a post lesson survey link.')}}
                        </p>
                    </div>
                    <button class="accordion">{{ __('content.Are there any fees to be a ZettaaCoach?')}}</button>
                    <div class="panel">
                         <p>
                            {{ __('content.On Zettaa it is absolutely free to create an account, the only fees that apply are a service fee of 10% for each lesson.')}}
                        </p>
                    </div>
                    <button class="accordion">{{ __('content.My client wants to pay me in cash. What should I do?')}}</button>
                    <div class="panel">
                        <p>
                        {{ __('content.It is absolutely forbidden to use cash on Zettaa all the payments should be done through the website with our partner Stripe')}}

                        </p>
                    </div>
                    <button class="accordion">{{ __('content.How do I get paid for my Zettaa sessions?')}}</button>
                    <div class="panel">
                         <p>
                            {{ __('content.Once you complete your session and your client has reviewed your performance, you  will receive the payment amount in your wallet section. You will then be able to submit a  withdrawal request and receive the payment in the next couple days.')}}

                        </p>
                    </div>
                    <button class="accordion">{{ __('content.Who reviews our coaches?')}}</button>
                    <div class="panel">
                         <p>
                        {{ __('content.After every lesson, our clients are asked to review their coaches, this is mandatory. If you have not participated in a lesson with a particular coach you can not rate or review him.')}}
                        </p>
                    </div>
                    <button class="accordion">{{ __('content.How do I leave a review for my coach?')}}</button>
                    <div class="panel">
                         <p>
                        {{ __('content.After every lesson, you will be asked to review your coach, this is mandatory, you will also receive an email once you complete your lesson with a post lesson survey link.')}}
                        </p>
                    </div>
                    <button class="accordion">{{ __('content.How much does it cost to book training sessions?')}}</button>
                    <div class="panel">
                        <p>
                        {{ __('content.All the prices for lessons are set by the coaches themselves, if you feel like a coach is overcharging for a service without a reasonable explanation please contact the support team.')}}
                        </p>
                    </div>
                    <button class="accordion">{{ __('content.Can I contact a coach before booking sessions?')}}</button>
                    <div class="panel">
                         <p>
                        {{ __('content.Yes, you can always contact a coach for any reason, but you can only contact him via our messaging system.')}}
                        </p>
                    </div>
                    <button class="accordion">{{ __('content.I haven`t received a response from a coach I`ve messaged, what now?')}}</button>
                    <div class="panel">
                         <p>
                        {{ __('content.if you haven’t heard from your coach, make sure to check that the message has been sent and delivered if you still don’t have an answer after 48h our support team will help  you.')}}

                        </p>
                    </div>

                      <h3>{{ __('content.General Information:')}}</h3>
                    <button class="accordion">{{ __('content.Which sports are available on the platform')}}</button>
                    <div class="panel">
                         <p>
                        {{ __('content.The sports are divided into several distinct categories, themselves made up of several sports relating to the category. Then, it is the users who regulate the different sports practiced in each district. If you don’t find your sport you can let us know by email.')}}

                        </p>
                    </div>
                    <button class="accordion">{{ __('content.Are the sessions on the platform insured in case of accident?')}}</button>
                    <div class="panel">
                         <p>
                        {{ __('content.No, it is up to the coach or each participant to rely on their own insurance policies. Please read our Legal disclaimer.')}}

                        </p>
                    </div>
                    <button class="accordion">{{ __('content.How can I reset my password or email?')}}</button>
                    <div class="panel">
                         <p>
                        {{ __('content.If you need a new password or email we will send you an email for you to be able to do so.')}}
                        </p>
                    </div>
                    <button class="accordion">{{ __('content.Does Zettaa have a mobile app?')}}</button>
                    <div class="panel">
                         <p>
                        {{ __('content.We are currently working on an app, our users will be the first ones to know when it is ready')}}
                        </p>
                    </div>
                    <button class="accordion">{{ __('content.How do I submit feedback about the Zettaa website?')}}</button>
                    <div class="panel">
                         <p>
                        {{ __('content.We will occasionally send surveys through email for our users where they will be able to review and recommend us with their ideas. Or you can always contact us to improve our services.')}}

                        </p>
                    </div>
                    <button class="accordion">{{ __('content.Can I use Zettaa internationally?')}}</button>
                    <div class="panel">
                         <p>
                        {{ __('content.Yes, Zettaa has been created in a way that no matter where you are, we will find you the right partner/coach to do your sports with or even find activities around you.')}}

                        </p>
                    </div>
                    <button class="accordion">{{ __('content.Can I post an ad for a product instead of a service?')}}</button>
                    <div class="panel">
                         <p>
                        {{ __('content.The platform is meant only for events to participate in either a lesson or an activity. You  can not sell products on the website. Although if you have equipment for a particula  lesson or activity you can lend it to other participants and set your own price.')}}

                        </p>
                    </div>

                        <h3>{{ __('content.If your question is not listed above contact us at')}} <a href="mailto:support@zettaa.ch">support@zettaa.ch</a></h3>


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
