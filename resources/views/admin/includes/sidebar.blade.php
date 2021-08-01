<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{URL::to('/public/admin/')}}/assets/images/dp-placeholder.jpg" alt="user" />
                <!-- this is blinking heartbit-->
                <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
            </div>
            <!-- User profile text-->
            <div class="profile-text">
                <h5>{{Auth::guard('admin')->user()->first_name}} {{Auth::guard('admin')->user()->last_name}}</h5>
                <p class="text-muted">{{Auth::guard('admin')->user()->email}}</p>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li>
                    <a class="waves-effect waves-dark" href="{{route('admin.dashboard')}}" aria-expanded="false">
                        <i class="mdi mdi-gauge"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span class="hide-menu">All Users</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.users.active')}}">Active</a></li>
                        <li><a href="{{route('admin.users.blocked')}}">Blocked</a></li>
                        <li><a href="{{route('admin.users.id_proof')}}">ID Proof Request</a></li>
                        <li><a href="{{route('admin.users.add_proof')}}">Addr. Proof Request</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-dumbbell"></i>
                        <span class="hide-menu">All Lessons</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.lessons.active')}}">Active</a></li>
                        <li><a href="{{route('admin.lessons.blocked')}}">Blocked</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-run-fast"></i>
                        <span class="hide-menu">All Activities</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.activities.active')}}">Active</a></li>
                        <li><a href="{{route('admin.activities.blocked')}}">Blocked</a></li>
                    </ul>
                </li>

                <li class="nav-small-cap">Settings</li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-soccer"></i>
                        <span class="hide-menu">Sports Category</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.setting.category.add')}}">Add Category</a></li>
                        <li><a href="{{route('admin.setting.category')}}">Categories</a></li>
                        <li><a href="{{route('admin.setting.category.requests')}}">New Requests</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
