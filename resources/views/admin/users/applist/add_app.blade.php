<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Marketing - Add Users</title>

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
                                    <a href="{{url('admin/users_list')}}">
                                      <span class="la la-home"></span>
                                    </a>
                                    <span class="breadcrumb__seperator">
                                      <span class="la la-slash"></span>
                                  </span>
                                </li>
                                <li class="atbd-breadcrumb__item">
                                    <a href="{{url('admin/users_list')}}">
                                        Home
                                    </a>
                                    <span class="breadcrumb__seperator">
                                        <span class="la la-slash"></span>
                                    </span>
                                </li>
                                <li class="atbd-breadcrumb__item">
                                    <span>Add Users</span>
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
                                <h6>Add Users</h6>
                                <div class="row">
                                  <div class="col-md-4" style="padding-left:30px;">
                                  </div>  
                                  <div class="col-md-4" style="padding-right:40px;">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop3">Import</button>
                                    <div class="modal-basic modal fade" id="staticBackdrop3" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                      <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content modal-bg-white ">
                                            <div class="modal-header">
                                                <h6 class="modal-title">Export Email From Webpage URL </h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                            </div>
                                            <form action="{{url('admin/insert_export_email')}}" method="POST">
                                              @csrf
                                              <div class="modal-body">
                                                <div class="form-group row">
                                                  <div class="col-sm-3 d-flex aling-items-center">
                                                    <label for="inputContactMessage" class=" col-form-label color-dark fs-14 fw-500 align-center">URl </label>
                                                  </div>
                                                  <div class="col-sm-7">
                                                    <input type="URL" class="form-control ih-medium ip-gray radius-xs b-light" id="inputContactMessage" name="url" value="{{old('url')}}" placeholder="Enter a URl">
                                                  </div>
                                                  <div class="col-md-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" onclick="submitContactForm()" style="cursor:pointer;" width="70%" height="70%" ><path d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"/></svg>
                                                  </div>
                                                </div>

                                                <input type="hidden" name="user_email[]" id="append" multiple>

                                                <div class="form-group row">
                                                  <div class="col-sm-3 d-flex aling-items-center">
                                                    <label for="inputContactMessage" class=" col-form-label color-dark fs-14 fw-500 align-center">Email Address</label>
                                                  </div>
                                                  <div class="col-sm-9" id="text_area">
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                              </div>
                                            </form>
                                        </div>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4" style="padding-right:80px;">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop2">BulkUpload</button>
                                    <div class="modal-basic modal fade" id="staticBackdrop2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                      <div class="modal-dialog modal-md" role="document">
                                          <div class="modal-content modal-bg-white ">
                                              <div class="modal-header">
                                                  <h6 class="modal-title">Sub Category</h6>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                              </div>
                                              <form action="{{url('admin/insert_export_email')}}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                  
                                                  <div class="form-group row">
                                                    <div class="col-sm-3 d-flex aling-items-center">
                                                      <label for="inputContactMessage" class=" col-form-label color-dark fs-14 fw-500 align-center">Email Address</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control ih-medium ip-light radius-xs b-light px-15"  name="user_email[]" multiple>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                                </div>
                                              </form>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="card-body py-md-30">
                                  <div class="horizontal-form">
                                      <form action="{{url('admin/insert_users')}}" method="POST" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="select-alerts2" class="col-form-label color-dark fs-14 fw-500 align-center">Category</label>
                                          </div>
                                          <div class="col-sm-9">
                                            <div class="select-style2">
                                              <div class="atbd-select ">
                                                  <select name="category_id" id="category" class="form-control select2">
                                                      <option class="text-dark" value="" >Select a Category *</option>
                                                    <optgroup label="Available Categories">
                                                      @foreach($categorys as $category)
                                                        <option class="text-dark" value="{{$category->id}}">{{$category->category_name}}</option>
                                                      @endforeach
                                                    </optgroup>
                                                    <optgroup label="Without Category">
                                                      <option class="text-dark" value="0" >None</option>
                                                    </optgroup>
                                                  </select>
                                              </div>
                                            </div>                                            
                                          </div>
                                        </div>
  
                                        <div class="form-group row">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="select-search" class="col-form-label color-dark fs-14 fw-500 align-center">Sub Category</label>
                                          </div>
                                          <div class="col-sm-9">
                                            <div class="select-style2">
                                              <div class="atbd-select ">
                                                  <select name="subcategory" id="select-search" class="form-control">                                         
                                                  </select>
                                              </div>
                                            </div>                                            
                                          </div>
                                        </div>

                                        <div class="form-group row mb-25">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                              <label for="inputNameIcon" class=" col-form-label color-dark fs-14 fw-500 align-center">Name </label>
                                          </div>
                                          <div class="col-sm-9">
                                              <div class="with-icon">
                                                  <span class="la-user lar color-gray"></span>
                                                  <input type="text" class="form-control  ih-medium ip-gray radius-xs b-light" id="inputNameIcon" name="name" value="{{old('name')}}" placeholder="Enter a User Name">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group row mb-25">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                              <label for="inputEmailIcon" class=" col-form-label color-dark fs-14 fw-500 align-center">Email
                                                  Address <span style="color:red;">&nbsp;*</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                              <div class="with-icon">
                                                  <span class="lar la-envelope color-gray"></span>
                                                  <input type="email" class="form-control  ih-medium ip-gray radius-xs b-light" id="inputEmailIcon" value="{{old('email')}}" name="email" placeholder="Enter a User Email">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="form-group row mb-25">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="phone_number" class=" col-form-label color-dark fs-14 fw-500 align-center">Phone
                                                Number <span style="color:red;">&nbsp;*</span></label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control ih-medium ip-gray radius-xs b-light" id="phone_number" value="{{old('phone_number')}}" name="phone_number" placeholder="Enter a User phone_number">
                                        </div>
                                      </div>
                                      <div class="form-group row mb-25">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="checkbox-theme-default custom-checkbox ">
                                              <input class="checkbox" type="checkbox" id="check-1" value="1" name="same_as">
                                              <label for="check-1">
                                                  <span class="checkbox-text">same as whatssapp number
                                                  </span>
                                              </label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row mb-25">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="whatssapp_number" class=" col-form-label color-dark fs-14 fw-500 align-center">WhatsApp Number</label>
                                        </div>
                                        <div class="col-sm-9">
                                          <input type="number" class="form-control ih-medium ip-gray radius-xs b-light" id="whatssapp_number" value="{{old('whatssapp_number')}}" name="whatssapp_number" placeholder="Enter a WhatsApp Number">
                                        </div>
                                      </div>
                                      <div class="form-group row mb-25">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="whatssapp_number" class=" col-form-label color-dark fs-14 fw-500 align-center">Gender</label>
                                        </div>
                                        <div class="col-sm-9">
                                          <div class="radio-horizontal-list d-flex">
                                            <div class="radio-theme-default custom-radio ">
                                                <input class="radio" type="radio" name="radio-optional" value="Male" id="radio-hl1" checked>
                                                <label for="radio-hl1">
                                                    <span class="radio-text">Male</span>
                                                </label>
                                            </div>
                                            <div class="radio-theme-default custom-radio ">
                                                <input class="radio" type="radio" name="radio-optional" value="FeMale" id="radio-hl2">
                                                <label for="radio-hl2">
                                                    <span class="radio-text">FeMale</span>
                                                </label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group row mb-25">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="whatssapp_number" class=" col-form-label color-dark fs-14 fw-500 align-center">Born</label>
                                        </div>
                                        <div class="col-sm-9">
                                          <div class="radio-horizontal-list d-flex">
                                            <div class="radio-theme-default custom-radio ">
                                                <input class="radio" type="radio" id="image_1" name="image" value="0" checked>
                                                <label for="image_1">
                                                    <span class="radio-text">DOB</span>
                                                </label>
                                            </div>
                                            <div class="radio-theme-default custom-radio ">
                                                <input class="radio" id="image_2" type="radio" name="image" value="1">
                                                <label for="image_2">
                                                    <span class="radio-text">Age</span>
                                                </label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                                      <div  id ='Normal_image_type' class="form-group row">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="dob" class=" col-form-label color-dark fs-14 fw-500 align-center">Date Of Birth </label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control ih-medium ip-light radius-xs b-light px-15" name="dob" id="dob" value="{{old('dob')}}"  autocomplete="off">
                                        </div>
                                      </div>
                                      <div id="url_image_type" class="form-group row">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="age" class=" col-form-label color-dark fs-14 fw-500 align-center">Age</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control ih-medium ip-light radius-xs b-light px-15" id="age" value="{{old('age')}}" name="age" placeholder="Ex:: 18" width="30%" autocomplete="off">
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="element-text7" class=" col-form-label color-dark fs-14 fw-500 align-center"> Country </label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select class="form-select form-select-sm mb-3 js-example-basic-single" name="country"  id="country">
                                              <option value="">Select Country</option>
                                            </select>
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="element-text6" class=" col-form-label color-dark fs-14 fw-500 align-center"> State </label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select class="form-select form-select-sm mb-3 js-example-basic-single"  name="State" id="state">
                                              <option value="">Select Country</option>
                                            </select>
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="element-text5" class=" col-form-label color-dark fs-14 fw-500 align-center"> District </label>
                                        </div>
                                        <div class="col-sm-9">
                                            {{-- <input type="text" class="form-control ih-medium ip-light radius-xs b-light px-15" id="element-text5" value="{{old('district')}}" placeholder="example: coimbatore,salem" autocomplete="off"> --}}
                                            <select class="form-select form-select-sm mb-3 js-example-basic-single" name="district" id="city">
                                              <option value="">Select Country</option>
                                            </select>
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="element-text8" class=" col-form-label color-dark fs-14 fw-500 align-center">Pincode <span style="color:red;">&nbsp;*</span></label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control ih-medium ip-light radius-xs b-light px-15" id="element-text8" value="{{old('Pincode')}}" name="Pincode" placeholder="641104" autocomplete="off">
                                        </div>
                                      </div>

                                          <div class="form-group row">
                                            <div class="col-sm-3">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="layout-button mt-25">
                                                    <input type="button" class="btn btn-default btn-squared border-normal bg-normal px-20" onclick="window.location.href='{{url('admin/users_list')}}'" value="Cancel">
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

      <script>
       function submitContactForm()
       {
        var message = $('#inputContactMessage').val();
        if(message.trim() == '' )
        {
            alert('Please enter URl.');
            $('#inputContactMessage').focus();
            return false;
        }
        else
        {
          $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
           });
          $.ajax({
            url:"{{url('admin/export_url')}}",
            type:"POST",
            data: {url: message},
            success:function(response) 
            {
              var result = response.result;
              var email = response.emails;
              if(result == 1)
              { 
                $('#append').val(email);
                $('#text_area').html('<textarea class="form-control" placeholder="Leave a comment here"  id="html_desc" onkeyup="myFunction()" name="template_body" style="height: 100px;">'+email+'</textarea>');
              }
              else
              {
                $('#text_area').append("<textarea style='margin: 2px; height: 194px; width: 620px;'>"+email+"</textarea>");
              }
            }
          });
        }
       }

       function myFunction()
       {  
        var vnam = $('#html_desc').val();
        $('#append').val(vnam);
       }
      </script>

      <script src="{{asset('new/custom.js')}}"></script>
      <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
      </script>
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
        $('#check-1').on('change',function()
        {
          var status = $(this).prop('checked') == true ? 1 : 0;  
          if(status == 1)
          {
            phpne = $('#phone_number').val();
            $('#whatssapp_number').val(phpne);
          }
          else
          {
            $('#whatssapp_number').val('');
          }
        });
      </script>
      <script>
      $('#category').on('change',function() {
      let id = $(this).val();
      $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
      $.ajax({
          url:"{{url('admin/subcat')}}",
          type:"POST",
          data: {cat_id: id},
      success:function(data) 
      {
          $('#select-search').empty();
          var data = data.subcategories;
          if(data.length > 0)
          {
            // $('#select-search').attr('required');
            $('#select-search').append('<option class="text-dark" value="" selected>Select a Sub-Category*</option>');
            $.each(data,function(index,subcategory)
            {
                $('#select-search').append('<option class="text-dark" value="'+subcategory.id+'">'+subcategory.sub_category_name+'</option>');
            })
          }
          else{
            $('#select-search').append('<option class="text-dark" value="0">None</option>');
          }
      }
      })
      });
  
      const myTimeout = setTimeout(myGreeting, 5000);
      function myGreeting() {
          $('#demo').hide();
        }
    </script>
</body>
</html>
     