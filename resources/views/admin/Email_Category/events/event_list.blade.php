<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Marketing - Quiz List</title>

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



<style>
  .table-bordered th, .table-bordered tr:hover{
    background: #f1f2f675 !important;
  }
  .table-bordered th, .table-bordered td{
    border: 1px solid #f1f2f6;
    border-bottom: 1px solid #f1f2f6 !important;
  }
  .itemsContainer {
      background:red; 
      float:left;
      position:relative
  }

.itemsContainer:hover .play{display:block;}
.play{
  position : absolute;
    display:none;
    top:20%; 
    width:40px;
    margin:0 auto; left:0px;
    right:0px;
    z-index:100;
    font-size: 30px;
    color: #ff3333;
    cursor: pointer;

} 


</style>
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
                                    <a href="{{url('admin/Quiz')}}">
                                      <span class="la la-home"></span>
                                    </a>
                                    <span class="breadcrumb__seperator">
                                      <span class="la la-slash"></span>
                                  </span>
                                </li>
                                <li class="atbd-breadcrumb__item">
                                    <a href="{{url('admin/Quiz')}}">
                                        Home
                                    </a>
                                    <span class="breadcrumb__seperator">
                                        <span class="la la-slash"></span>
                                    </span>
                                </li>
                                <li class="atbd-breadcrumb__item">
                                    <span>Quiz List</span>
                                </li>
                              </ul>
                              <div class="action-btn">
                                <a href="{{url('admin/add_Quiz')}}" class="btn btn-sm btn-primary btn-add">
                                  <i class="la la-plus"></i> Add New Quiz</a>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mb-30">
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
                      <div class="card">
                          <div class="card-header color-dark fw-500">
                              Quiz List
                          </div>
                          <div class="card-body">
                              <div class="userDatatable global-shadow border-0 bg-white w-100">
                                  <div class="table-responsive">
                                      <table id="members_list" class="table mb-0 table-bordered">
                                          <thead>
                                              <tr class="userDatatable-header">
                                                  <th>
                                                    <div class="d-flex align-items-center">
                                                        <div class="custom-checkbox  check-all">
                                                            <input class="checkbox" type="checkbox" name="checkbox" id="check-3">
                                                            <label for="check-3"></label>
                                                        </div>
                                                    </div>
                                                  </th>
                                                  <th>
                                                      <span class="userDatatable-title">Quiz Name</span>
                                                  </th>
                                                  <th>
                                                    <span class="userDatatable-title">Quiz content</span>
                                                  </th>
                                                  <th>
                                                      <span class="userDatatable-title">Quiz Image</span>
                                                  </th>
                                                  <th>
                                                    <span class="userDatatable-title">Category Name</span>
                                                  </th>
                                                  <th>
                                                      <span class="userDatatable-title">Created</span>
                                                  </th>
                                                  <th>
                                                      <span class="userDatatable-title">Status</span>
                                                  </th>
                                                  <th>
                                                      <span class="userDatatable-title float-left">Action</span>
                                                  </th>
                                                  <th>
                                                    <span class="userDatatable-title float-left">Active</span>
                                                  </th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            @foreach($questions as $Quiz)
                                              <tr>
                                                  <td>
                                                    <div class="d-flex">
                                                        <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                            <div class="checkbox-group-wrapper">
                                                                <div class="checkbox-group d-flex">
                                                                    <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                        <input class="checkbox" type="checkbox" id="check-grp-{{$Quiz->id}}">
                                                                        <label for="check-grp-{{$Quiz->id}}"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <div class="app userDatatable-inline-title" style="max-width: 100px;text-overflow:hidden;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">
                                                      <a href="#" class="text-dark fw-500">
                                                          <h6>{{$Quiz->question_name}}</h6>
                                                      </a>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    @if(($Quiz->question_format_type == 3) || ($Quiz->question_format_type == 4))
                                                    <div class="app userDatatable-inline-title" style="max-width: 100px;text-overflow:hidden;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">
                                                      <a href="#" class="text-dark fw-500">
                                                          <h6><center><img src="{{asset($Quiz->question_content)}}"  style="height:50px; width:auto;border-radius:70%;"></center></h6>
                                                      </a>
                                                    </div>
                                                    @else
                                                    <div class="app userDatatable-inline-title">
                                                      <a href="#" class="text-dark fw-500">
                                                          <center><h6>Nil</h6></center>
                                                      </a>
                                                    </div>
                                                    @endif
                                                  </td>
                                                  <td>
                                                      <div class="userDatatable-content">
                                                        @if($Quiz->quiz_image == null)   
                                                          <center><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdoCQ7-yS62tALBS9_FY5pExwg8Lvvsie6Iml51YO_JQ&s" style="height:50px; width:auto;border-radius:70%;"></center>
                                                        @elseif($Quiz->image_type == 1)
                                                          <center><img src="{{asset($Quiz->quiz_image)}}"  style="height:50px; width:auto;border-radius:70%;"></center>
                                                        @else
                                                          <center><img src="{{$Quiz->quiz_image}}" style="height:60px; width:70px;border-radius:50%;"></center>
                                                        @endif
                                                      </div>
                                                  </td>
                                                  <td>
                                                    <div class="userDatatable-content">
                                                      {{$Quiz->category->category_name ??'nil'}}
                                                    </div>
                                                  </td>
                                                  <td>
                                                      <div class="userDatatable-content">
                                                         {{date('d-m-Y', strtotime($Quiz->created_at))}}
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="userDatatable-content d-inline-block">
                                                        @if($Quiz->is_active == '0')
                                                          <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                                        @else
                                                        <span class="bg-opacity-warning  color-warning rounded-pill userDatatable-content-status active">deactivete</span>
                                                        @endif
                                                      </div>
                                                  </td>
                                                  <td>
                                                    <div class="dropdown dropdown-click" style="padding-left: 25px;">
                                                      <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                          <span class="text-dark" data-feather="more-vertical"></span>
                                                      </button>
                                                      <div class="dropdown-default dropdown-menu bg-dark">
                                                        <div class="dropdown-item" style="padding-left:55px !important;">
                                                          <form action={{url("admin/edit_Quiz/".$Quiz->id)}} method="POST">
                                                            {{csrf_field()}}
                                                            <button type="submit" name="submit" class="btn btn-icon btn-circle btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Quiz"><span data-feather="edit"></span></button>
                                                          </form>
                                                        </div>
                                                        <div class="dropdown-item" style="padding-left:55px !important;">
                                                          <form action={{url("admin/delete_Quiz/".$Quiz->id)}} method="POST">
                                                            {{csrf_field()}}
                                                            <button  type="submit" class="btn btn-icon btn-circle btn-outline-danger" onclick="return confirm('Are you sure you want to delete this item?');" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Quiz"><span data-feather="trash-2"></span></button>
                                                          </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <style>
                                                    .btn_status 
                                                    {
                                                      font-size: .70rem;
                                                      font-weight: 500;
                                                      letter-spacing: 1px;
                                                      padding: 5px 10px;
                                                      border-radius: 0.25rem;
                                                      text-transform: uppercase;
                                                      box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
                                                    }
                                                  </style>
                                                  <td>
                                                    <form action="{{url('admin/Quiz_status_update')}}" method="POST">
                                                      @csrf
                                                      <input type="hidden" name="Quiz_id" value="{{$Quiz->id}}">
                                                      @if($Quiz->is_active == '0')
                                                          <input type="hidden" name="status" value="0">
                                                          <button type="submit" data-toggle="tooltip"  data-original-title="Enable" id="enable" name="enable" title="" class="btn_status btn-success enable">
                                                              <i class="mdi mdi-check"></i>Enabled
                                                          </button>
                                                      @else
                                                          <input type="hidden" name="status" value="1">
                                                          <button type="submit" data-toggle="tooltip" data-original-title="Disable" id="disable" title="" name="disable" class="btn_status btn-success" style="background: #ffad46!important;border-color: #ffad46!important;color: #fff!important;">
                                                            <i class="mdi mdi-discord"></i>Disabled
                                                          </button>
                                                      @endif
                                                    </form>
                                                  </td>
                                              </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>

                    
                </div>
            </div>
        </div>
        
        <footer class="footer-wrQuizer">
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

    {{--  --}}
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

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#members_list').DataTable();
        } );

        const myTimeout = setTimeout(myGreeting, 3000);
        function myGreeting() {
            $('#demo').hide();
          }
        
        $('#colse_btn').on('click',function()
        {
          $('#drawer').hide();
        });
    </script>
</body>

</html>