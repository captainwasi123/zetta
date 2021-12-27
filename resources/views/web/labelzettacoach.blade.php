@extends('web.support.master2')
@section('title', 'FAQ')
@section('addStyle')
<style>
    
</style>
@endsection
@section('content')

<style type="text/css">
   .term-sec1 h2 {
    color: white;
    text-align: center;
    letter-spacing: 1px;
    padding-top: 20px;
}
.term-sec1 p {
    font-size: 15px;
    letter-spacing: 0.6px;
    line-height: 26px;
    font-weight: 300;
    color: white;
}
.term-sec1 h3 {
    font-size: 24px;
    font-weight: 500;
    letter-spacing: 1px;
    color: white;
    padding-top: 30px;
}

.term-sec1 ul li
{
   font-size: 15px;
    letter-spacing: 0.6px;
    line-height: 26px;
    font-weight: 300;
    color: white;
}
section.action-bar {
    margin-top: 78px;
}
</style>


<section class="action-bar">
   <div class="container">
      <div class="term-sec1">
         <h2>{{ __('content.ZETTAA COACH')}}</h2>
         
         
         <p>{{ __('content.Our coaches are able to combine interpersonal skills and their knowledge in order to bring our customers complete satisfaction.')}}</p>
        <p>{{ __('content.This is why we have gathered some key points that our coaches will have to follow in order to create harmony and guarantee you a quality standard.')}}</p>
        <p>{{ __('content.All of our coaches have previously read this document. They have accepted it and will put into practice the points listed below:')}}</p>
         
         <h3>{{ __('content.1. Know your field/sport')}}</h3>
         <p>{{ __('content.- To be able to teach effectively, the coach must have a thorough understanding of the sport, and his knowledge must cover both fundamentals and technique as well as the advanced systems. ')}}</p>
         <p>{{ __('content.- Experience as a player or coach is an advantage but does not necessarily make you a good coach. ')}}</p>
         <p>{{ __('content.- Good physical and mental condition are essential for the lessons to run smoothly. ')}}</p>

         <h3>{{ __('content.2.  Know your role as a coach')}}</h3>
         <p>{{ __('content.- In order to offer quality lessons, it is essential to master the art of pedagogy and learning methods:  ')}}</p>
         <p>{{ __('content.a. Knowing how to define objectives  ')}}</p>
         <p>{{ __('content.b. Motivation and communication ')}}</p>
         <p>{{ __('content.c. Adapt to the athlete ')}}</p>

         <h4>{{ __('content.This will allow you to better target weaknesses and areas for improvement.')}}</h4>


         <h3>{{ __('content.a.')}}</h3>
         <p>{{ __('content.By setting goals, you are able to measure progress, adapt your training program based on results and revise your approach when the goal is not reached.')}}
     </p>

       <h3>{{ __('content.b.')}}</h3>
        <p>{{ __('content.-  Positive attitude, good humor and enthusiasm are essential. You are a source of motivation and inspiration for your clients to surpass themselves and achieve their goals.')}} 
        </p>

        <p>{{ __('content.-  By adopting this method you will be able to create a climate of trust but above all an emulsion and synergy with your client.')}}
        </p>

        <p>{{ __('content.-  By setting goals, you are able to measure progress, adapt your training program based on results and revise your approach when the goal is not reached.')}}
        </p>

        <p>{{ __('content.-  Be frank and honest without being offensive. Communication is a two-relationship, a good listener will make you a good coach.')}}
        </p>
        <p>{{ __('content.-  Know how to welcome customer comments, questions, criticisms and doubts, then process them to modify your training regimen if necessary.')}}</p>

           <h3>{{ __('content.c.')}}</h3>
         <h4>{{ __('content. Know how to observe in order to make the necessary adjustments. ')}}</h4>
            <p>{{ __('content.-  Each client is unique, by saying that you have to adapt to the different client profiles and their request.')}}
            </p>

             <p>{{ __('content.- Observe carefully to provide the correct settings and advice.')}}
            </p>

             <h3>{{ __('content.3. Constantly renewing yourself')}}</h3>
        <p>{{ __('content.- Learn and develop new training methods that are always more varied and stimulating.')}}
        </p>
        <p>{{ __('content.- Deepen your own knowledge via a holistic approach in order to be able to answer all types of questions')}}
        </p>        
         <p>{{ __('content.- Stay informed of the latest scientific research, training trends and available training.')}}
        </p>
         <p>{{ __('content.- Make sure your equipment is up to date and not obsolete.')}}
         </p>

         <h4>{{ __('content.Don’t stop questioning your training environment.')}}</h4>

         <h3>{{ __('content.4. Have discipline ')}}</h3>
        <h3>{{ __('content.- Respect')}}</h3>
        <h3>{{ __('content.- Punctuality')}}</h3>
        <h3>{{ __('content.- Hygiene')}}</h3>
        <h3>{{ __('content.- Confidentiality')}}</h3>
        <h3>{{ __('content.- Security')}}</h3>

        <p>{{ __('content.Be sure to set up a code of conduct with your client beforehand so that the work climate is suitable for both parties.')}} 
         </p>

          <h3>{{ __('content.5. Be passionate and positive')}}</h3>
           <p>{{ __('content.- Positivity and passion are very contagious, spread the virus!')}}<p>
           <p>{{ __('content.- Share a good, enriching moment and enjoy meeting exceptional individuals who are ')}}</p> 
            <p>{{ __('content.members of the Zettaa community as well as committed athletes.')}}</p>

        <h3>{{ __('content.Zettaa team')}}</h3> 
        <h3>{{ __('content.Geneva, January 2021')}}</h3> 

            

     </div>
   </div>
</section>
@endsection
