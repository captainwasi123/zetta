@foreach($data as $val)
	<li>
    	<a href="javascript:void(0)"><img src="{{URL::to('/')}}/public/storage/user/profile_img/{{$val->profile_img}}" alt="user" onerror="this.onerror=null;this.src='{{URL::to('/')}}/assets/user_dashboard/user.png';" class="img-circle"> <span class="col-white"> {{$val->fname.' '.$val->lname}} </span> <b class="col-silver"> Hello , How are you sir? </b> </a>
 	</li>
@endforeach
@if(count($data) == '0')
	<li>
		<span>No Users Found.</span>
	</li>
@endif