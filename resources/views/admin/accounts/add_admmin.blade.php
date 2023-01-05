<!doctype html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Email Marketing - Add Admin</title>

      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">


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
      <link href="{{ asset('assets/new/dist/dual-listbox.css')}}" rel="stylesheet" />
      <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon.png')}}">
      {{-- <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon.png')}}"> --}}
      <style>

        .dual-listbox .dual-listbox__title
        {
          /* color:black!important; */
          /* background-color: white; */
          /* border: 2px; */
        }
        .dual-listbox .dual-listbox__available, .dual-listbox .dual-listbox__selected
        {
          color:white!important;
          background-color: white;
        }
        .dual-listbox .dual-listbox__item{
          color:white!important;
          border-bottom-color: #1b1915;
          background-color: #00000054;
        }
        .dual-listbox__search{
          vfom

        }
      </style>
      <style>
        .button-image {
          padding: 0px 2px 0px 8px !important;
        }
        .btn-danger{
          padding: 0px 2px 0px 8px !important;
        }
      </style>
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
                                <a href="{{url('admin/superadmin')}}">
                                  <span class="la la-home"></span>
                                </a>
                                <span class="breadcrumb__seperator">
                                  <span class="la la-slash"></span>
                              </span>
                            </li>
                            <li class="atbd-breadcrumb__item">
                                <a href="{{url('admin/superadmin')}}">
                                    Home
                                </a>
                                <span class="breadcrumb__seperator">
                                    <span class="la la-slash"></span>
                                </span>
                            </li>
                            <li class="atbd-breadcrumb__item">
                                <span>Add Admin</span>
                            </li>
                          </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                  <div class="row">
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
                      <div class="card card-horizontal card-default card-md mb-4">
                        <div class="card-header">
                          <h6>Add Admin</h6>
                        </div>
                        <div class="card-body py-md-30">
                          <div class="horizontal-form">
                            <form class="forms-sample" action="{{url('admin/admin_insert')}}" method="POST" role="form" enctype="multipart/form-data">
                              @csrf

                              <div class="form-group row mb-3">
                                <div class="col-sm-3 d-flex aling-items-center">
                                  <label for="select-alerts2" class=" col-form-label color-dark fs-14 fw-500 align-center">Admin Type<span style="color:red;">&nbsp;*</span></label>
                                </div>
                                <div class="col-sm-9">
                                  <div class="select-style2">
                                    <div class="atbd-select">
                                        <select id="parent" name="parent" class="form-control">
                                          <option class="text-dark" value="">Select a Admin Type *</option>
                                            <option class="text-dark" value="Administrator">Administrator</option>
                                            <option class="text-dark" value="SubAdmin">SubAdmin</option>
                                        </select>
                                    </div>
                                  </div>                                            
                                </div>
                              </div>


                              <div class="form-group row">
                                <div class="col-sm-3 d-flex aling-items-center">
                                    <label for="name" class=" col-form-label color-dark fs-14 fw-500 align-center">Admin Name</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="name" id="name" placeholder="Enter a name"/>
                                </div>
                              </div>


                              <div class="form-group row">
                                <div class="col-sm-3 d-flex aling-items-center">
                                    <label for="email" class=" col-form-label color-dark fs-14 fw-500 align-center">Admin Email</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter a Email">
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-3 d-flex aling-items-center">
                                    <label for="password" class=" col-form-label color-dark fs-14 fw-500 align-center">Admin Password <span style="color:red;">&nbsp;*</span></label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="password" id="password" placeholder="Enter a Password">
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-3 d-flex aling-items-center">
                                    <label for="password_confirmation" class=" col-form-label color-dark fs-14 fw-500 align-center">Confirm Password<span style="color:red;">&nbsp;*</span></label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="password_confirmation" id="password_confirmation" placeholder="Enter a Confirm Password">
                                </div>
                              </div>

                              <div class="form-group row ">
                                <div class="col-sm-3 d-flex aling-items-center">
                                  <label for="type" class=" col-form-label color-dark fs-14 fw-500 align-center">Account Modules<span style="color:red;">&nbsp;*</span></label>
                                </div>
                                <div class="col-sm-9">
                                  <div class="card">
                                    <div class="card-body">
                                      @php $array_2 = array('set_1','set_2','set_3','set_4') @endphp
                                      @foreach($array_2 as $array_2)
                                      <div class="form-check-inline h5 text-dark">
                                          <input class="form-check-input bg-outline-dark border-3" type="checkbox" id="image_1{{$array_2}}" name="list[]" value="{{$array_2}}" style="font-size: 80%;padding-left:5px;">
                                          <label class="form-check-label" for="image_1{{$array_2}}"style="font-size: 80%;padding-left:5px;">
                                          {{$array_2}}
                                          </label>
                                      </div>
                                      @endforeach
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-3 d-flex aling-items-center">
                                  <label for="password_confirmation" class=" col-form-label color-dark fs-14 fw-500 align-center">Access List<span style="color:red;">&nbsp;*</span></label>
                                </div>
                                <div class="col-sm-9">
                                  <div class="card">
                                    <div class="card-body">
                                      @foreach($module as $module)
                                        <div class="form-check-inline h5 text-dark">
                                        <input class="form-check-input bg-outline-dark border-3" type="checkbox" id="image_1{{$module->module_name}}" name="model[]" value="{{$module->module_name}}" style="font-size: 80%;padding-left:5px;">
                                        <label class="form-check-label" for="image_1{{$module->module_name}}" style="font-size: 80%;padding-left:5px;">
                                          {{$module->module_name}}
                                        </label>
                                        </div>
                                      @endforeach
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row ">
                                <div class="col-sm-3 d-flex aling-items-center">
                                  <label for="type" class=" col-form-label color-dark fs-14 fw-500 align-center">Account Previleges <span style="color:red;">&nbsp;*</span></label>
                                </div>
                                <div class="col-sm-9">
                                  <div class="card">
                                    <div class="card-body">
                                      @php $array= array('view','edit','delete','add') @endphp
                                      @foreach($array as $array)
                                      <div class="form-check-inline h5 text-dark">
                                          <input class="form-check-input bg-outline-dark border-3" type="checkbox" id="image_1{{$array}}" name="privileges[]" value="{{$array}}" style="font-size: 80%;padding-left:5px;">
                                          <label class="form-check-label" for="image_1{{$array}}"style="font-size: 80%;padding-left:5px;">
                                          {{$array}}
                                          </label>
                                      </div>
                                      @endforeach
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-3 d-flex aling-items-center">
                                <label for="exampleInputUsername2" class=" col-form-label color-dark fs-14 fw-500 align-center">Profile Icon Type </label>
                                </div>
                                <div class="col-sm-9">
                                  <div class="form-check-inline h5 text-dark">
                                    <input class="radio"  type="radio" name="file_type" id="image_1" value='1' checked>
                                    <label class="form-check-label" for="image_1" style="font-size: 80%;padding-left:5px;">Image Type</label>
                                  </div>
                                  <div class="form-check-inline h5 text-dark">
                                    <input class="radio"  type="radio" name="file_type" id="image_2" value='2' >
                                    <label class="form-check-label" for="image_2" style="font-size: 80%;padding-left:5px;">
                                      URL Type
                                    </label>
                                  </div> 
                                </div>
                              </div>
                              <div id ='Normal_image_type' class="form-group row">
                                <div class="col-sm-3 d-flex aling-items-center">
                                    <label for="file" class=" col-form-label color-dark fs-14 fw-500 align-center">File Type </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control ih-medium ip-light radius-xs b-light px-15" name="file" id="file" autocomplete="off" accept="image/*">
                                </div>
                              </div>
                              <div id="url_image_type" class="form-group row">
                                <div class="col-sm-3 d-flex aling-items-center">
                                    <label for="file_1" class=" col-form-label color-dark fs-14 fw-500 align-center">URL Image <span style="color: #405189;padding-left:5px;">(optional)</span></label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control ih-medium ip-light radius-xs b-light px-15" id="file_1" name="url_image" placeholder="https://kinsta.com/wp-content/uploads/2021/07/how-to-become-a-web-developer.jpg" autocomplete="off">
                                </div>
                              </div>                    
                              <div class="form-group row">
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-9">
                                    <div class="layout-button mt-25">
                                        <input type="button" class="btn btn-default btn-squared border-normal bg-normal px-20" onclick="window.location.href='{{url('admin/superadmin')}}'" value="Cancel">
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
      </div>
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

    <!-- endinject-->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/new/dist/dual-listbox.js')}}"></script>
    <script>
        var dlb1 = new DualListbox(".select1");

        var sources = document.querySelectorAll(".source");
        for (var i = 0; i < sources.length; i++) {
            var source = sources[i];
            source.addEventListener("click", function (event) {
                var code = document.querySelector(
                    "." + event.currentTarget.dataset.source
                );
                code.classList.toggle("open");
            });
        }
    </script>
          <!-- End custom js for this page -->
    <script type="text/javascript">
      if($('#image_1').is(':checked'))
      {
        $("#Normal_image_type").show()
        $('#url_image_type').hide();
      }

      $('#image_1').bind('change', function () {
        if ($(this).is(':checked'))
          $("#Normal_image_type").show().removeAttr('checked',true)
          $('#url_image_type').hide();
      });
      
      $("#image_2").bind('change', function(){
        if ($(this).is(':checked'))
          $("#Normal_image_type").hide();
          $('#url_image_type').show().attr('checked',true);
      });
    </script>
    <script>
      $(document).ready( function () {
          $('#members_list').DataTable();
      } );

      const myTimeout = setTimeout(myGreeting, 5000);
      function myGreeting() {
          $('#demo').hide();
        }
    </script>
  </body>
</html>
