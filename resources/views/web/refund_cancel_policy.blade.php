@extends('web.support.master2')
@section('title', 'Refund Policy')
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
         <h2>{{ __('content.REFUNDAND CANCELLATION POLICY') }}  </h2>
         
         <h3>{{ __('content.1. INTRODUCTION') }}  </h3>
         <p>{{ __('content.1.1 For purposes of this Refund and Cancellation Policy, “we” or “our” refers to us, and “you” or “your” refers to the client/user. Please read this Refundand Cancellation Policy carefully as it constitutes your agreement with us') }}.</p>
         <p>{{ __('content.1.2 By engaging us to provide services to you, you agree to be legally bound by this Refund and Cancellation Policy. We reserve the right to change or modify this Refundand Cancellation Policy at any time.') }} </p>
         <p>{{ __('content.1.3 Unless otherwise specified, any changes or modifications will be effective immediately and your continued use of our services after such time will constitute your acceptance of such changes or modifications.') }}</p>

         <h3>{{ __('content.2. REFUND & CANCELLATION') }} </h3>
         <p>{{ __('content.2.1 Your purchase of coaching packages or sessions indicates your commitment to participate in the process and follow through to its conclusion. However, we also understand that unexpected events can happen. Refunds and Cancellations will be considered on an individual basis, at our discretion. We ask you to be committed and faithful, and we commit to offering grace when needed.') }}</p>
         <p>{{ __('content.2.2 You may cancel a coaching order within 24 hours of purchasing and request a refund. The refund will be issued, minus a 5% transaction fee. To cancel an order, send your request to us. You must clearly state their decision to cancel, the reason for said cancellation, and their preferred method of reimbursement.') }}</p>
         <p>{{ __('content.2.3 Reimbursement for refunds will be provided by the best available method, based on your situation and at our sole discretion. A 5% transaction fee of the refund amount will apply and be subtracted from all refunds.') }} </p>
         <p>{{ __('content.2.4 If you cancel after beginning sessions and/or receiving services from the coaches on our platform, you may only request a refund for the amount pertaining to remaining sessions or hours not yet logged. You will not have the right to cancel or request a refund after the services have been fully performed (after all sessions or services have been completed).') }} </p>
         <p>{{ __('content.2.5 We reserve the right to modify or terminate services and the relationship at any time for reasons such as, but not limited to, dangerous or criminal behavior on the part of the user, inappropriate or offensive behavior from the user, or irresponsible or disrespectful behavior from the user. We will notify you with the reason for termination or modification and notice that it is effective immediately on the day that we contact you about modification or termination. In such situations, at our discretion, a refund may or may not be issued for any remaining sessions or services that were paid for but not completed.') }}</p>

         <h3>{{ __('content.3. ASSIGNMENT AND AMENDMENT') }} </h3>
         <p>{{ __('content.3.1 No assignment of this Refund and Cancellation Policy or any part thereof shall be made by the user without our written consent.') }}</p>
         <p>{{ __('content.3.2 We may at any time, and from time to time, amend this Refund and Cancellation Policy. Any amendment, unless specifically provided for to the contrary herein, shall only be effective if made in writing and signed by us.') }}</p>

         <h3>{{ __('content.4. LIMITATION OF LIABILITY') }}</h3>
         <p>{{ __('content.You assume the sole risk of transmitting your information as it relates to the use of this platform, and for any data corruptions, intentional interceptions, intrusions or unauthorized access to information, or of any delays, interruptions to or failures preventing the use this platform. In no event shall we be liable for any direct, indirect, special, consequential or monetary damages, including fees, and penalties in connection with your use of materials posted on this platform or connectivity to or from this platform to any other platform.') }}</p>

         <h3>5. SEVERABILITY</h3>
         <p>{{ __('content.In the event any provision or part of this Refundand Cancellation Policy is found to be invalid or unenforceable, only that particular provision or part so found, and not the entire Refund and Cancellation Policy, will be inoperative.') }}</p>

         <h3>6. ENTIRE AGREEMENT </h3>
         <p>{{ __('content.This Refund and Cancellation Policy contains the entire agreement and understanding among the parties hereto with respect to the subject matter hereof, and supersedes all prior and contemporaneous agreements, understandings, inducements and conditions, express or implied, oral or written, of any nature whatsoever with respect to the subject matter hereof.') }}</p>
         
     </div>
   </div>
</section>
@endsection
