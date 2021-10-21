@extends('web.support.master2')
@section('title', 'About Us')
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
         <h2>  </h2>

         <p>{{ __('content.Zettaa is a multisided platform aiming at gathering people through sport activities, may they be as varied as possible. The three founders came up with the idea on a spring day in 2020, as the pandemic was reaching its peak. Tahar Petrucci, one of the founders and an absolute rollerblade fan wanted to share his passion with others by giving some lessons. Unfortunately, he could not find a platform where he could contact other peers and give lessons to rollerblade enthusiasts. “Why not create a space where people from the same area would communicate in order to practice sports together?” And there it was, the passion that was linking the three friends together and that had been the initiator of their friendship.') }}</p>

         <p>{{ __('content.Zettaa aims at enhancing people’s lives by facilitating social connections through sport events. Its focus as a brand is to include as many sports as possible, focusing on smaller scale activities that are still not widely known by sport enthusiasts.') }}</p>

         <p>{{ __('content.Being part of the Zettaa community allows for people to connect, engage, and make healthy decisions for their bodies. Sportbuddies allows for two or more people to embrace a physical exercise while getting to know someone with the same level and similar goals in a sport. Another option could be to schedule sessions with coaches who would accompany a sport enthusiast to each step in the path to outdo themselves.') }}</p>

         <h3>{{ __('content.Mission Statement') }}</h3>
         <p>{{ __('content.Connect people between each other through sports and give local access to a diverse community worldwide.') }}</p>

         <h3>{{ __('content.Vision Statement') }}</h3>
         <p>{{ __('content.Find the motivation that enables you to move') }}.</p>

         <h3>{{ __('content.Slogan') }}</h3>
         <p>{{ __('content.Unite through sport') }}.</p>

         <h3>{{ __('content.Our People') }}</h3>

         <ul>
            <li>{{ __('content.Axel Olson: sports passionate, hockey player, studied sports management at the southern New Hampshire university.') }}</li>
            <li>{{ __('content.Tahar Petrucci:  sport afficionado, hockey player, multitalented in many areas.') }}</li>
            <li>{{ __('content.Sylvestre Galli: sports lover, golfer, and other sport activities, studied business administration at the University of Geneva.') }}</li>
         </ul>
      </div>
   </div>
</section>

@endsection
