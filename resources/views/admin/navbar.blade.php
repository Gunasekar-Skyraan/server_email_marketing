<header class="header-top">
  <nav class="navbar navbar-light">
      <div class="navbar-left">
          <a href="" class="sidebar-toggle">
              <img class="svg" src="{{asset('img/svg/bars.svg')}}" alt="img"></a>
          <a class="navbar-brand" href="{{url('admin/dashboard')}}"><img rel="icon" src="{{asset('img/favicon.png')}}" aria-current="true" style="height: 15%;width:15%;"> Email Marketing</a>
      </div>
      <!-- ends: navbar-left -->
      <div class="navbar-right">
          <ul class="navbar-right__menu">
              <li class="nav-author">
                  <div class="dropdown-custom" style="padding-right:20px; ">
                        <a href="javascript:;" class="nav-item-toggle">
                            @if(Auth::guard('admin')->user()->image_type == 1)   
                                <img src="{{asset(Auth::guard('admin')->user()->image) }}" alt="" class="rounded-circle">
                            @elseif(Auth::guard('admin')->user()->image_type == 2)
                                <img src="{{Auth::guard('admin')->user()->image}}" alt="" class="rounded-circle">
                            @endif
                        </a>
                      <div class="dropdown-wrapper">
                          <div class="nav-author__info">
                              <div class="author-img">
                                @if(Auth::guard('admin')->user()->image_type == 1)   
                                    <img src="{{asset(Auth::guard('admin')->user()->image) }}" alt="" class="rounded-circle">
                                @elseif(Auth::guard('admin')->user()->image_type == 2)
                                    <img src="{{Auth::guard('admin')->user()->image}}" alt="" class="rounded-circle">
                                @endif
                              </div>
                              <div>
                                  <h6>{{Auth::guard('admin')->user()->name}}</h6>
                                  <span>{{Auth::guard('admin')->user()->role}}</span>
                              </div>
                          </div>
                          <div class="nav-author__options">
                              <ul>
                                  <li>
                                      <a href="{{url('admin/profile_update')}}">
                                          <span data-feather="user"></span> Profile</a>
                                  </li>
                                  <li>
                                      <a href="{{url('admin/superadmin')}}">
                                          <span data-feather="settings"></span> Settings</a>
                                  </li>
                              </ul>
                              <a href="{{ route('admin.logout')}}" class="nav-author__signout">
                                  <span data-feather="log-out"></span> Sign Out</a>
                          </div>
                      </div>
                      <!-- ends: .dropdown-wrapper -->
                  </div>
              </li>
              <!-- ends: .nav-author -->
          </ul>
          <!-- ends: .navbar-right__menu -->
          <div class="navbar-right__mobileAction d-md-none">
              <a href="#" class="btn-search">
                  <span data-feather="search"></span>
                  <span data-feather="x"></span></a>
              <a href="#" class="btn-author-action">
                  <span data-feather="more-vertical"></span></a>
          </div>
      </div>
      <!-- ends: .navbar-right -->
  </nav>
</header>