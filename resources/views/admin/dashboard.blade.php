<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Marketing - Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- inject:css-->

    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/footable.standalone.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/fullcalendar@5.2.0.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/jquery-jvectormap-2.0.5.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/leaflet.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/MarkerCluster.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/MarkerCluster.Default.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/star-rating-svg.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/trumbowyg.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/wickedpicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/style.css')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon.png')}}">
</head>

<body class="layout-light side-menu overlayScroll">
    <div class="mobile-author-actions"></div>
    @include('admin.navbar')
    <main class="main-content">
        <div class="contents">
          @include('admin.sidebar')
            <div class="container-fluid">
                <div class="social-dash-wrap">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-main">
                              <ul class="atbd-breadcrumb nav">
                                <li class="atbd-breadcrumb__item">
                                    <a href="{{url('admin/dashboard')}}">
                                      <span class="la la-home"></span>
                                    </a>
                                    <span class="breadcrumb__seperator">
                                      <span class="la la-slash"></span>
                                  </span>
                                </li>
                                <li class="atbd-breadcrumb__item">
                                    <a href="{{url('admin/dashboard')}}">
                                        Home
                                    </a>
                                    <span class="breadcrumb__seperator">
                                        <span class="la la-slash"></span>
                                    </span>
                                </li>
                                <li class="atbd-breadcrumb__item">
                                    <span>Dashboard</span>
                                </li>
                            </ul>
                            </div>
                        </div>
                    </div>
                    @if(session()->get('message'))
                        <div id="demo" class="alert-big alert alert-success  alert-dismissible fade show " role="alert">
                            <div class="alert-content">
                                <h6 class="alert-heading">Success !....</h6>
                                <p>{{session()->get('message')}}</p>
                                <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </button>
                            </div>
                        </div>
                        <br>
                        @endif
                        @if(session()->get('error'))
                        <div id="demo" class="alert-big alert alert-danger  alert-dismissible fade show " role="alert">
                        <div class="alert-content">
                            <h6 class="alert-heading">Warning !....</h6>
                            <p>{{session()->get('error')}}</p>
                            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                        </div>
                        <br>
                        @endif
                    {{-- @php $filename = basename(dirname($_SERVER['PHP_SELF'])); $file = basename($_SERVER['PHP_SELF']); @endphp
                    @php $AccessModule = Auth::guard('admin')->user()->accountAccessModule @endphp
                    @php $explode_1 = explode('|',$AccessModule);@endphp
                    @php $lists = explode('|',Auth::guard('admin')->user()->access_list);@endphp
                    <div class="content">
                        @if(session()->get('message'))
                        <div id="demo" class="alert-big alert alert-success  alert-dismissible fade show " role="alert">
                            <div class="alert-content">
                                <h6 class="alert-heading">Success !....</h6>
                                <p>{{session()->get('message')}}</p>
                                <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </button>
                            </div>
                        </div>
                        <br>
                        @endif
                        @if(session()->get('error'))
                        <div id="demo" class="alert-big alert alert-danger  alert-dismissible fade show " role="alert">
                        <div class="alert-content">
                            <h6 class="alert-heading">Warning !....</h6>
                            <p>{{session()->get('error')}}</p>
                            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                        </div>
                        <br>
                        @endif
                        <div class="col-12">
                            @if((Auth::guard('admin')->user()->role == 'SuperAdmin') || (in_array('events',$lists)))
                                <div class="row">
                                    <div class="col-md-5">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="card-header text-success bg-outline-dark">Events List</span>
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                        <div class="feature-cards">
                                            <figure class="feather-cards__figure">
                                                <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                                <figcaption>
                                                    <h4><img src="{{asset('img/home.png')}}" alt="" style="    width: 7%;padding-bottom: 8px;">App List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                    <p>List of Apps, Add New Apps
                                                    </p>
                                                    <a href="{{url('admin/app_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                        <div class="feature-cards">
                                            <figure class="feather-cards__figure">
                                                <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                                <figcaption>
                                                    <h4>category List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                    <p>List of category, Add New category
                                                    </p>
                                                    <a href="{{url('admin/category_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                        <div class="feature-cards">
                                            <figure class="feather-cards__figure">
                                                <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                                <figcaption>
                                                    <h4>Events List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                    <p>List of Events, Add New Events
                                                    </p>
                                                    <a href="{{url('admin/Events')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if((Auth::guard('admin')->user()->role == 'SuperAdmin') || (in_array('prayer',$lists)))
                            <div class="row">
                                <div class="col-md-5">
                                </div>
                                <div class="col-md-4">
                                    <span class="card-header text-success bg-outline-dark">Prayers List</span>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                            <br>    
                            <div class="row">
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4><img src="{{asset('img/home.png')}}" alt="" style="    width: 7%;padding-bottom: 8px;">App List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of Apps, Add New Apps
                                                </p>
                                                <a href="{{url('Prayer/app_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4>category List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of category, Add New category
                                                </p>
                                                <a href="{{url('Prayer/category_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4>Prayer List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of Prayer, Add New Prayer
                                                </p>
                                                <a href="{{url('Prayer/prayers_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if((Auth::guard('admin')->user()->role == 'SuperAdmin') || (in_array('calendar',$lists)))
                            <div class="row">
                                <div class="col-md-5">
                                </div>
                                <div class="col-md-4">
                                    <span class="card-header text-success bg-outline-dark">Calendar List</span>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4><img src="{{asset('img/home.png')}}" alt="" style="    width: 7%;padding-bottom: 8px;">App List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of Apps, Add New Apps
                                                </p>
                                                <a href="{{url('Calendar/app_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4>category List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of category, Add New category</p>
                                                <a href="{{url('Calendar/category_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4>Calendar List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of Calendar, Add New Calendar
                                                </p>
                                                <a href="{{url('Calendar/calendar_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if((Auth::guard('admin')->user()->role == 'SuperAdmin') || (in_array('image',$lists)))
                            <div class="row">
                                <div class="col-md-5">
                                </div>
                                <div class="col-md-4">
                                    <span class="card-header text-success bg-outline-dark">Image List</span>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4><img src="{{asset('img/home.png')}}" alt="" style="    width: 7%;padding-bottom: 8px;">App List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of Apps, Add New Apps
                                                </p>
                                                <a href="{{url('Image/app_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4>category List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of category, Add New category
                                                </p>
                                                <a href="{{url('Image/category_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4>SubCategory List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of SubCategory, Add New SubCategory
                                                </p>
                                                <a href="{{url('Image/sub_category_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4>Image List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of Image, Add New Image
                                                </p>
                                                <a href="{{url('Image/images')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if((Auth::guard('admin')->user()->role == 'SuperAdmin') || (in_array('video',$lists)))
                            <div class="row">
                                <div class="col-md-5">
                                </div>
                                <div class="col-md-4">
                                    <span class="card-header text-success bg-outline-dark">Video List</span>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4><img src="{{asset('img/home.png')}}" alt="" style="    width: 7%;padding-bottom: 8px;">App List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of Apps, Add New Apps
                                                </p>
                                                <a href="{{url('Video/app_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4>category List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of category, Add New category
                                                </p>
                                                <a href="{{url('Video/category_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4>SubCategory List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of SubCategory, Add New SubCategory
                                                </p>
                                                <a href="{{url('Video/sub_category_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4>Video List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of Video, Add New Video
                                                </p>
                                                <a href="{{url('Video/fetch_video')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if((Auth::guard('admin')->user()->role == 'SuperAdmin') || (in_array('quotes',$lists)))
                            <div class="row">
                                <div class="col-md-5">
                                </div>
                                <div class="col-md-4">
                                    <span class="card-header text-success bg-outline-dark">Quotes List</span>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4><img src="{{asset('img/home.png')}}" alt="" style="    width: 7%;padding-bottom: 8px;">App List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of Apps, Add New Apps
                                                </p>
                                                <a href="{{url('Quotes/app_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4>category List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of category, Add New category
                                                </p>
                                                <a href="{{url('Quotes/category_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4>SubCategory List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of SubCategory, Add New SubCategory
                                                </p>
                                                <a href="{{url('Quotes/sub_category_list')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                    <div class="feature-cards">
                                        <figure class="feather-cards__figure">
                                            <img src="{{asset('img/apps_list.jpg')}}" alt="">
                                            <figcaption>
                                                <h4>Quotes List <span class="badge-circle badge-warning ml-1"></span></h4>
                                                <p>List of Quotes, Add New Quotes
                                                </p>
                                                <a href="{{url('Quotes/quotes')}}" class="btn-md btn"><button class="btn-md btn">View List</button></a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div> --}}
                </div>
            </div>
          </div>
        <footer class="footer-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>
    <div class="overlay-dark-sidebar"></div>
      
    <!-- inject:js-->
   @include('admin.js.dashboard')
    <!-- endinject-->
</body>

</html>