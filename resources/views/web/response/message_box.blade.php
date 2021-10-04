<div class="row">
  <div class="col-md-4">
    <div class="contact-profile-section">
    <img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$data->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';">
    <h3>{{empty($data->fname) || empty($data->lname) ? 'Anonymous' : $data->fname.' '.$data->lname}}</h3>
    <h4>{{empty($data->coach_request_status) ? "Sports Buddy" : "Coach, Sports Buddy"}}</h4>
    </div>
    <hr>
    <div class="contact-profile-section1">
      <h3>Please include:</h3>
      <ul>
        <li>Project Description</li>
        <li>Project Description</li>
        <li>Project Description</li>                
      </ul>
    </div>
    
  </div>
  <div class="col-md-8">
    <div class="contact-profile-section3">
      <form method="post" action="{{URL::to('/sendMessage')}}">
        {{csrf_field()}}
        <input type="hidden" name="msg_id" value="{{base64_encode($data->id)}}">
        <textarea rows="11" cols="5" placeholder="Write your message..." name="message" required></textarea>
        <input type="submit" name="">
      </form>                
    </div>
  </div>            
</div>