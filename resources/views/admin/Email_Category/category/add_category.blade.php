<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Marketing - Add Category</title>

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

    <link href="{{ asset('assets/vendor_assets/simple-datatables/style.css')}}" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- endinject -->

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
                                    <a href="{{url('admin/category_list')}}">
                                      <span class="la la-home"></span>
                                    </a>
                                    <span class="breadcrumb__seperator">
                                      <span class="la la-slash"></span>
                                  </span>
                                </li>
                                <li class="atbd-breadcrumb__item">
                                    <a href="{{url('admin/category_list')}}">
                                        Home
                                    </a>
                                    <span class="breadcrumb__seperator">
                                        <span class="la la-slash"></span>
                                    </span>
                                </li>
                                <li class="atbd-breadcrumb__item">
                                    <span>Add Category</span>
                                </li>
                              </ul>
                            </div>
                        </div>
                    </div> 

                  <div class="col-lg-12">
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
                  @if ($errors->any())                  
                    @foreach ($errors->all() as $error)
                      <div id="demo" class="alert-big alert alert-danger  alert-dismissible fade show " role="alert">
                        <div class="alert-content">
                            <h6 class="alert-heading">Warning !....</h6>
                            <p>{{$error}}</p>
                            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                      </div>
                    @endforeach
                  @endif
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="card card-horizontal card-default card-md mb-4">
                            <div class="card-header">
                                <h6>Add Category</h6>
                            </div>
                            <div class="card-body py-md-30">
                                <div class="horizontal-form">
                                    <form action="{{url('admin/category.insert')}}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex aling-items-center">
                                                <label for="app_name" class=" col-form-label color-dark fs-14 fw-500 align-center">Category Name <span style="color:red;">&nbsp;*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control ih-medium ip-light radius-xs b-light px-15" id="app_name" name="category_name" placeholder="Category name" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                          <div class="col-sm-3">
                                          </div>
                                          <div class="col-sm-9">
                                              <div class="layout-button mt-25">
                                                  <input type="button" class="btn btn-default btn-squared border-normal bg-normal px-20" onclick="window.location.href='{{url('admin/category_list')}}'" value="Cancel">
                                                  <button type="submit" name="submit" class="btn btn-primary btn-default btn-squared px-30">save</button>
                                              </div>
                                          </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                 
                </div>
              </div>
              
              <footer class="footer-wrEventser">
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
          <script src="{{ asset('assets/vendor_assets/js/jquery/jquery-3.5.1.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/jquery/jquery-ui.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/bootstrap/popper.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/bootstrap/bootstrap.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/moment/moment.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/accordion.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/autoComplete.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/Chart.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/charts.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/daterangepicker.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/drawer.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/dynamicBadge.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/dynamicCheckbox.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/feather.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/footable.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/fullcalendar@5.2.0.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/google-chart.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/jquery-jvectormap-2.0.5.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/jquery-jvectormap-world-mill-en.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/jquery.countdown.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/jquery.filterizr.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/jquery.magnific-popup.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/jquery.mCustomScrollbar.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/jquery.peity.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/jquery.star-rating-svg.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/leaflet.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/leaflet.markercluster.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/loader.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/message.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/moment.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/muuri.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/notification.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/popover.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/select2.full.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/slick.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/trumbowyg.min.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/js/wickedpicker.min.js')}}"></script>
          <script src="{{ asset('assets/theme_assets/js/drag-drop.js')}}"></script>
          <script src="{{ asset('assets/theme_assets/js/footable.js')}}"></script>
          <script src="{{ asset('assets/theme_assets/js/full-calendar.js')}}"></script>
          <script src="{{ asset('assets/theme_assets/js/googlemap-init.js')}}"></script>
          <script src="{{ asset('assets/theme_assets/js/icon-loader.js')}}"></script>
          <script src="{{ asset('assets/theme_assets/js/jvectormap-init.js')}}"></script>
          <script src="{{ asset('assets/theme_assets/js/leaflet-init.js')}}"></script>
          <script src="{{ asset('assets/theme_assets/js/main.js')}}"></script>
          <script src="{{ asset('assets/vendor_assets/simple-datatables/simple-datatables.js')}}"></script>
        <script>
      
            const myTimeout = setTimeout(myGreeting, 5000);
            function myGreeting() {
                $('#demo').hide();
              }
          </script>
    </body>
    </html>
         