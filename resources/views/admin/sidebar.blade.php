@php $filename = basename(dirname($_SERVER['PHP_SELF'])); $file = basename($_SERVER['PHP_SELF']); @endphp
@php $AccessModule = Auth::guard('admin')->user()->accountAccessModule @endphp
@php $explode_1 = explode('|',$AccessModule);@endphp
@php $lists = explode('|',Auth::guard('admin')->user()->access_list);@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<aside class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="menu-title">
                    <span>Applications</span>
                </li>
                <li>
                    <a href="{{url('admin/dashboard')}}" class="{{ (Route::currentRouteName() == 'admin/dashboard') ? 'active':'' }}">
                        <span data-feather="home" class="nav-icon"></span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                @if((Auth::guard('admin')->user()->role == 'SuperAdmin') || (in_array('set_1',$lists)))
                    <li class="has-child @if((Route::currentRouteName() == 'admin.applist') || (Route::currentRouteName() == 'admin.add_app') || (Route::currentRouteName() == 'admin.edit') || (Route::currentRouteName() == 'admin.mapping')) {{'open'}} @endif @if((Route::currentRouteName() == 'category.list') || (Route::currentRouteName() == 'admin.add_category') || (Route::currentRouteName() == 'admin.edit_category') ) {{'open'}} @endif @if((Route::currentRouteName() == 'admin.sub_categorylist') || (Route::currentRouteName() == 'admin.add_sub_category') || (Route::currentRouteName() == 'admin.edit_sub_category' || (Route::currentRouteName() == 'Quiz.bulk_Quiz')) ) {{'open'}} @endif">
                        <a href="{{url('admin/app_list')}}" class="@if((Route::currentRouteName() == 'admin.applist') || (Route::currentRouteName() == 'admin.add_app') || (Route::currentRouteName() == 'admin.edit') || (Route::currentRouteName() == 'admin.mapping')) {{'active'}} @endif @if((Route::currentRouteName() == 'category.list') || (Route::currentRouteName() == 'admin.add_category') || (Route::currentRouteName() == 'admin.edit_category')) {{'active'}} @endif @if((Route::currentRouteName() == 'admin.sub_categorylist') || (Route::currentRouteName() == 'admin.add_sub_category') || (Route::currentRouteName() == 'admin.edit_sub_category' || (Route::currentRouteName() == 'Quiz.bulk_Quiz')) ) {{'active'}} @endif">
                            <span data-feather="layers" class="nav-icon"></span>
                            <span class="menu-text">Email Category</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li>
                                <a class="{{ (Route::currentRouteName() == 'category.list') ? 'active':'' }}" href="{{url('admin/category_list')}}">Category List</a>
                            </li>
                            <li>
                                <a class="{{ (Route::currentRouteName() == 'admin.add_category') ? 'active':'' }}" href="{{url('admin/add_category')}}"> Add Category</a>
                            </li>
                            @if((Route::currentRouteName() == 'admin.edit_category'))
                                <li>
                                    <a class="{{ (Route::currentRouteName() == 'admin.edit_category') ? 'active':'' }}" href="{{Request::segment(3)}}">Category Manage</a>
                                </li>
                            @endif
                            <li>
                                <a class="{{ (Route::currentRouteName() == 'admin.sub_categorylist') ? 'active':'' }}" href="{{url('admin/sub_category_list')}}">Sub Category List</a>
                            </li>
                            <li>
                                <a class="{{ (Route::currentRouteName() == 'admin.add_sub_category') ? 'active':'' }}" href="{{url('admin/add_sub_category')}}"> Add New Sub Category</a>
                            </li>
                            @if((Route::currentRouteName() == 'admin.edit_sub_category'))
                                <li>
                                    <a class="{{ (Route::currentRouteName() == 'admin.edit_sub_category') ? 'active':'' }}" href="{{Request::segment(3)}}">Sub Category Manage</a>
                                </li>
                            @endif
    
                        </ul>
                    </li>
                @endif
                

                @if((Auth::guard('admin')->user()->role == 'SuperAdmin') || (in_array('set_4',$lists)))
                <li class="has-child @if((Route::currentRouteName() == 'users.users') || (Route::currentRouteName() == 'users.add_users') || (Route::currentRouteName() == 'users.edit_users') ) {{'open'}} @endif">
                    <a href="{{url('admin/users_list')}}" class="@if((Route::currentRouteName() == 'users.users') || (Route::currentRouteName() == 'users.add_users') || (Route::currentRouteName() == 'users.edit_users') ) {{'active'}} @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder nav-icon"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                        <span class="menu-text">Users</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ (Route::currentRouteName() == 'users.users') ? 'active':'' }}" href="{{url('admin/users_list')}}">Users List</a>
                        </li>
                        <li>
                            <a class="{{ (Route::currentRouteName() == 'users.add_users') ? 'active':'' }}" href="{{url('admin/add_users')}}">Add User</a>
                        </li>
                        @if((Route::currentRouteName() == 'users.edit_users'))
                        <li>
                            <a class="{{ (Route::currentRouteName() == 'users.edit_users') ? 'active':'' }}" href="{{Request::segment(3)}}">User Manage</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if((Auth::guard('admin')->user()->role == 'SuperAdmin') || (in_array('template',$explode_1)))
                <li class="has-child @if((Route::currentRouteName() == 'template.list') || (Route::currentRouteName() == 'add_template') || (Route::currentRouteName() == 'edit_template') ) {{'open'}} @endif  @if((Route::currentRouteName() == 'template_category.list') || (Route::currentRouteName() == 'template_admin.add_category') || (Route::currentRouteName() == 'template_admin.edit_category') ) {{'open'}} @endif">
                    <a href="{{url('admin/template_list')}}" class="@if((Route::currentRouteName() == 'template.list') || (Route::currentRouteName() == 'add_template') || (Route::currentRouteName() == 'edit_template')) {{'active'}} @endif @if((Route::currentRouteName() == 'template_category.list') || (Route::currentRouteName() == 'template_admin.add_category') || (Route::currentRouteName() == 'template_admin.edit_category') ) {{'active'}} @endif">
                        <span data-feather="layers" class="nav-icon"></span>
                        <span class="menu-text">Template</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ (Route::currentRouteName() == 'template_category.list') ? 'active':'' }}" href="{{url('admin/template_category_list')}}">Template Category List</a>
                        </li>
                        <li>
                            <a class="{{ (Route::currentRouteName() == 'template_admin.add_category') ? 'active':'' }}" href="{{url('admin/template_add_category')}}"> Add Template Category</a>
                        </li>
                        @if((Route::currentRouteName() == 'template_admin.edit_category'))
                            <li>
                                <a class="{{ (Route::currentRouteName() == 'template_admin.edit_category') ? 'active':'' }}" href="{{Request::segment(3)}}">Template Category Manage</a>
                            </li>
                        @endif
                        <li>
                            <a class="{{ (Route::currentRouteName() == 'template.list') ? 'active':'' }}" href="{{url('admin/template_list')}}"> Template List</a>
                        </li>
                        <li>
                            <a class="{{ (Route::currentRouteName() == 'add_template') ? 'active':'' }}" href="{{url('admin/add_template')}}"> Template Add</a>
                        </li>
                        @if((Route::currentRouteName() == 'edit_template'))
                        <li>
                            <a class="{{ (Route::currentRouteName() == 'edit_template') ? 'active':'' }}" href="{{Request::segment(3)}}">Manage</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if((Auth::guard('admin')->user()->role == 'SuperAdmin') || (in_array('set_3',$lists)))
                <li class="has-child @if((Route::currentRouteName() == 'admin.add_block') || (Route::currentRouteName() == 'admin.edit_send_emails') || (Route::currentRouteName() == 'admin.send_emails_list') || (Route::currentRouteName() == 'admin.emailslist') || (Route::currentRouteName() == 'admin.add_emails') || (Route::currentRouteName() == 'admin.send_emails') || (Route::currentRouteName() == 'admin.edit_emails') ) {{'open'}} @endif ">
                    <a href="{{url('admin/app_list')}}" class="@if((Route::currentRouteName() == 'admin.add_block') || (Route::currentRouteName() == 'admin.edit_send_emails') || (Route::currentRouteName() == 'admin.send_emails_list') || (Route::currentRouteName() == 'admin.emailslist') || (Route::currentRouteName() == 'admin.add_emails') || (Route::currentRouteName() == 'admin.send_emails') || (Route::currentRouteName() == 'admin.edit_emails')) {{'active'}} @endif ">
                        <span data-feather="layers" class="nav-icon"></span>
                        <span class="menu-text">Email Marketing</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ (Route::currentRouteName() == 'admin.emailslist') ? 'active':'' }}" href="{{url('admin/emails_list')}}">Email List</a>
                        </li>
                        <li>
                            <a class="{{ (Route::currentRouteName() == 'admin.add_emails') ? 'active':'' }}" href="{{url('admin/add_emails')}}"> Add Email</a>
                        </li>  
                        @if((Route::currentRouteName() == 'admin.edit_emails'))
                            <li>
                                <a class="{{ (Route::currentRouteName() == 'admin.edit_emails') ? 'active':'' }}" href="{{Request::segment(3)}}">Email Manage</a>
                            </li>
                        @endif
                        <li>
                            <a class="{{ (Route::currentRouteName() == 'admin.send_emails') ? 'active':'' }}" href="{{url('admin/send_emails')}}"> Compose</a>
                        </li> 
                        <li>
                            <a class="{{ (Route::currentRouteName() == 'admin.send_emails_list') ? 'active':'' }}" href="{{url('admin/send_emails_list')}}"> Inbox</a>
                        </li>
                        <li>
                            <a class="{{ (Route::currentRouteName() == 'admin.add_block') ? 'active':'' }}" href="{{url('admin/add_block')}}"> Add to block</a>
                        </li>
                        @if((Route::currentRouteName() == 'admin.edit_send_emails'))
                            <li>
                                <a class="{{ (Route::currentRouteName() == 'admin.edit_send_emails') ? 'active':'' }}" href="{{url('admin/edit_send_emails')}}"> Manage</a>
                            </li>
                        @endif
                    </ul>
                </li>
                @endif


                @if((Auth::guard('admin')->user()->role == 'SuperAdmin') ||(in_array('admin',$explode_1)))
                <li class="has-child @if((Route::currentRouteName() == 'superadmin.list') || (Route::currentRouteName() == 'add_superadmin') || (Route::currentRouteName() == 'edit_superadmin') ) {{'open'}} @endif">
                  <a href="{{url('admin/superadmin')}}" class="@if((Route::currentRouteName() == 'superadmin.list') || (Route::currentRouteName() == 'add_superadmin') || (Route::currentRouteName() == 'edit_superadmin')) {{'active'}} @endif">
                      <span data-feather="layers" class="nav-icon"></span>
                      <span class="menu-text">Administrator</span>
                      <span class="toggle-icon"></span>
                  </a>
                  <ul>
                      <li>
                          <a class="{{ (Route::currentRouteName() == 'superadmin.list') ? 'active':'' }}" href="{{url('admin/superadmin')}}">List</a>
                      </li>
                      <li>
                          <a class="{{ (Route::currentRouteName() == 'add_superadmin') ? 'active':'' }}" href="{{url('admin/admin_add_sub_admin')}}"> Add</a>
                      </li>
                      @if((Route::currentRouteName() == 'edit_superadmin'))
                      <li>
                          <a href="{{Request::segment(3)}}" class="{{ (Route::currentRouteName() == 'edit_superadmin') ? 'active':'' }}">
                              <i class="bi bi-circle"></i><span>Manage</span>
                          </a>
                      </li>
                      @endif
                  </ul>
                </li>
                @endif


                <li class="menu-title m-top-30">
                    <span>PROFILE</span>
                </li>
  
                <li class="has-child @if((Route::currentRouteName() == 'admin.profile_update')) {{'open'}} @endif">
                    <a href="{{url('admin/profile_update')}}" class="{{ (Route::currentRouteName() == 'admin.profile_update') ? 'active':'' }}">
                        <span data-feather="aperture" class="nav-icon"></span>
                        <span class="menu-text">Profile</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li class="nav-item">
                            <a href="{{url('admin/profile_update')}}" class="{{ (Route::currentRouteName() == 'admin.profile_update') ? 'active':'' }}">My Profile</a>
                        </li>
                        <li>
                            <a href="" class="">Profile Settings <span class="badge badge-success menuItem">New</span></a>
                        </li>
                    </ul>
                </li>
  
                {{-- <li class="has-child">
                    <a href="#" class="">
                        <span data-feather="folder" class="nav-icon"></span>
                        <span class="menu-text">Users</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="" class="">Team</a>
                        </li>
                        <li>
                            <a href="" class="">Users List</a>
                        </li>
                    </ul>
                </li>
                <li class="has-child">
                    <a href="#" class="">
                        <span data-feather="user-check" class="nav-icon"></span>
                        <span class="menu-text">Contact</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a class="" href="">Contact Grid</a>
                        </li>
                        <li>
                            <a class="" href="">Contact List</a>
                        </li>
                        <li>
                            <a class="" href="">Contact
                                Create</a>
                        </li>
                    </ul>
                </li> --}}
                <li class="menu-title m-top-30">
                    <span>Sessions</span>
                </li>
                <li>
                    <a href="{{ route('admin.logout')}}" class="nav-author__signout">
                        <span data-feather="log-out"></span> Sign Out</a>
                </li>
            </ul>
        </div>
    </div>
  </aside>