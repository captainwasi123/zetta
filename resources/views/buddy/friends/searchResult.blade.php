@foreach($data as $val)
	@if($val->id != Auth::id())
		@if(count($val->checkFriend) == '0')
			<li>
				<a href="javascript:void(0)"  class="addFriend" data-id="{{base64_encode($val->id)}}"><img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" class="img-circle"> <span class="col-white"> {{$val->fname.' '.$val->lname}} </span> <b class="col-silver"> {{empty($val->coach_request_status) ? "Sports Buddy" : "Coach, Sports Buddy"}} </b> </a>
			</li>
		@endif
	@endif
@endforeach
@if(count($data) == '0')
	<li>
		<span>No Users Found.</span>
	</li>
@endif