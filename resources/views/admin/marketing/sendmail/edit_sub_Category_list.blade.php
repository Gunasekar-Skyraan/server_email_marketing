<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Marketing - Send Mail</title>

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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="icon" type="admin/png" sizes="16x16" href="{{asset('img/favicon.png')}}">
    <style>
      .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--multiple{
        height: 0% !important;
      }
      .select2-container--default .select2-selection--single .select2-selection__arrow:after{
        content: "\f107";
        position: absolute;
        padding-top: 17px !important;
        font-family: "Line Awesome Free";
        font-weight: 900;
        font-size: 12px;
      }
      .ms-options-wrap > .ms-options > ul li.selected label{
        background-color: rgb(0 81 255 / 79%) !important;
        padding-left: 40px;
        color: rgb(12, 12, 12) !important;
      }
      .ms-options-wrap > .ms-options > ul li label
      {
        padding: 4px 4px 4px 40px;
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
                                    <a href="{{url('admin/send_emails')}}">
                                      <span class="la la-home"></span>
                                    </a>
                                    <span class="breadcrumb__seperator">
                                      <span class="la la-slash"></span>
                                  </span>
                                </li>
                                <li class="atbd-breadcrumb__item">
                                    <a href="{{url('admin/send_emails')}}">
                                        Home
                                    </a>
                                    <span class="breadcrumb__seperator">
                                        <span class="la la-slash"></span>
                                    </span>
                                </li>
                                <li class="atbd-breadcrumb__item">
                                    <span>Compose Email</span>
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
                    @if(Session::has("failed"))
                      <div class="alert alert-danger alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('failed')}}</div>
                    @endif
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="card card-horizontal card-default card-md mb-4">
                            <div class="card-header">
                                <h6>Compose Email</h6>
                            </div>
                            <div class="card-body py-md-30">
                                <div class="horizontal-form">
                                  @foreach ($edit_sub_category_id as $edit)
                                    <form action="{{url('admin/edit_send_emails_list')}}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      <div id="sender_email" class="card card-horizontal card-default card-md mb-4 bg-outline-dark border-1">
                                        <div class="card-header text-dark">
                                            <h6>Sender Email<span style="color:red;">&nbsp;*</span></h6>
                                        </div>
                                        <div class="card-body py-md-30 text-dark">
                                          <div class="form-group row mb-3">  
                                            <div class="col-sm-12">
                                              <select name="sender_email" class="form-control js-example-basic-single">
                                                <optgroup label="Selected Emails">
                                                  <option id="font" class="text-dark" value="{{$edit->sender_email}}" selected>{{$edit->sourcecemail->email_id}}</option> 
                                                  </optgroup>
                                                <optgroup label="Available Emails">
                                                  @foreach($sendemail as $row)
                                                    @if($row->email_id !== $edit->sourcecemail->email_id)
                                                      <option class="text-dark" value="{{$row->email_id}}">{{$row->email_id}}</option>
                                                    @endif  
                                                  @endforeach
                                                </optgroup>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                                      <div id="template_category_type" class="card card-horizontal card-default card-md mb-4 bg-outline-dark border-1">
                                        <div class="card-header text-dark">
                                            <h6>Template Category Type</h6>
                                        </div>
                                        <div class="card-body py-md-30 text-dark">
                                          <div class="form-group row mb-3">
                                            <div class="col-sm-6">
                                              <span class="">Select Template Category <span style="color:red;">&nbsp;*</span></span>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-sm-12">
                                              <div class="select-style2">
                                                <div class="atbd-select">
                                                  <select name="template_category" id="category" class="form-control js-example-basic-singlle">
                                                    <optgroup label="Selected Template Categories">
                                                      <option class="text-dark" value="{{$edit->template_category_id}}" selected>{{$edit->template_category->temp_category_name}}</option> 
                                                    </optgroup>
                                                    <optgroup label="Available Template Categories">
                                                      @foreach($TemplateCategory as $category)
                                                        @if($category->id !== $edit->template_category->id)
                                                          <option class="text-dark" value="{{$category->id}}">{{$category->temp_category_name}}</option>
                                                        @endif  
                                                      @endforeach
                                                    </optgroup>
                                                  </select>
                                                </div>
                                              </div>                                            
                                            </div>
                                          </div>

                                          <div class="form-group row mb-3">
                                            <div class="col-sm-6">
                                              <span class="">Select Template <span style="color:red;">&nbsp;*</span></span>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-sm-12">
                                              <div class="select-style2">
                                                <div class="atbd-select">
                                                    <select name="template_id" id="subcategory" class="form-control js-example-basic-single">                                         
                                                    </select>
                                                </div>
                                              </div>                                            
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div id="showforquesvideo" class="card card-horizontal card-default card-md mb-4 bg-outline-dark border-1">
                                        <div class="card-header text-dark">
                                            <h6>Template Selection Type</h6>
                                        </div>
                                        <div class="card-body py-md-30 text-dark">
                                          <div class="form-group row mb-3">
                                            <div class="col-sm-12">
                                              <div class="atbd-switch-wrap d-flex align-items-center">
                                                <div class="custom-control custom-switch switch-primary switch-md ">
                                                    <input type="checkbox" class="custom-control-input" id="switch-s2" value="0" checked>
                                                    <label class="custom-control-label" for="switch-s2">Template Use <span style="color:red;">&nbsp;*</span></label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                            <div class="col-sm-6">
                                              <span class="">Template Subject<span style="color:red;">&nbsp;*</span></span>
                                            </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                            <div class="col-md-12">
                                              <input type="text" class="form-control ih-medium ip-light radius-xs b-light px-15"  id="quiz_question_default_image" name="subject" value="{{old('Subject')}}" placeholder="Template Subject" autocomplete="off">
                                            </div>
                                          </div>

                                          <div class="form-group row mb-3">
                                            <div class="col-sm-6">
                                              <span class="">Template Body HTML type <span style="color:red;">&nbsp;*</span></span>
                                            </div>
                                          </div>

                                          <div id="form-text" class="form-group row mb-3">
                                            <div class="col-sm-12">
                                                <textarea class="form-control" placeholder="Leave a comment here"  id="html_desc" name="template_body" style="height: 100px;"></textarea>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div id="new_user" class="form-group row mb-3"  style="padding-left:10px;">
                                        <div class="col-sm-12">
                                          <div class="form-check-inline h5 text-dark">
                                            <input class="form-check-input" type="radio" name="file_type" id="image_1" value='1' checked  style="font-size:1.00rem;align-items:center;">
                                            <label class="form-check-label" for="image_1" style="font-size: 80%;padding-left:5px; ">
                                              Existing User 
                                            </label>
                                          </div>
                                          <div class="form-check-inline h5 text-dark">
                                            <input class="form-check-input" type="radio" name="file_type" id="image_2" value='2' style="font-size:1.00rem;align-items:center;" >
                                            <label class="form-check-label" for="image_2"  style="font-size: 80%;padding-left:5px; "> 
                                              New User
                                            </label>
                                          </div> 
                                        </div>
                                      </div>


                                      <div id="category_type" class="card card-horizontal card-default card-md mb-4 bg-outline-dark border-1">
                                        <div class="card-header text-dark">
                                            <h6>User Selection Type</h6>
                                        </div>
                                        <div class="card-body py-md-30 text-dark">
                                          <div class="form-group row mb-3">
                                            <div class="col-sm-3 d-flex aling-items-center">
                                              <label class="col-form-label color-dark fs-14 fw-500 align-center" for="quiz_question">Users Count : </label>
                                            </div>
                                            <div style="display:contents;" class="col-md-6 align-items-center d-inline-flex">
                                              <div class="form-inline">
                                                <input type="hidden" name="hidden_user_count" id="hidden_user_count">
                                                <span class="badge-circle badge-warning ml-1" id="user_id" >0</span>
                                              </div>
                                            </div>
                                            <div style="display:contents;" class="col-md-3 align-items-center d-inline-flex">
                                              <div class="form-inline">
                                                <label class="pr-3 pl-1" for="ques_default_text">
                                                  <input type="text" name="user_count[]" id="user_count" /></label>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                            <div class="col-sm-6">
                                              <span class="">Category</span>
          
                                            </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                            <div class="col-sm-12">
                                              <select name="category_id[]" multiple="multiple" class="3col active ms-active" id="multiple">
                                                  @foreach($emailcategory as $row)                                                
                                                    @if(in_array($row->id,explode(',',$edit->category_id)))
                                                      <option class="text-dark" value="{{$row->id}}" selected>{{$row->category_name}}</option>
                                                    @else
                                                      <option class="text-dark" value="{{$row->id}}">{{$row->category_name}}</option>
                                                    @endif
                                                  @endforeach
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                            <div class="col-sm-11">
                                              <select name="sub_category_id[]" multiple="multiple" id="with_sub_category" class="form-control js-example-basic-multiple">                                         
                                              </select>
                                            </div>
                                            <div class="col-sm-1">
                                              <button type="button" class="btn btn-icon btn-circle btn-outline-primary" id="savechanges"><i class="fas fa-save" style="padding-left:6px;"></i></button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div id="existing_user" class="card card-horizontal card-default card-md mb-4 bg-outline-dark border-1">
                                        <div class="card-header text-dark">
                                            <h6>User Selection Type</h6>
                                        </div>
                                        <div class="card-body py-md-30 text-dark">
                                          <div class="form-group row mb-3">
                                            <div class="col-sm-6">
                                              <span class="">New User</span>
                                            </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                            <div class="col-sm-12">
                                              <textarea class="form-control" placeholder="New User" name="new_user" style="height: 100px;">{{$edit->new_users}}</textarea>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div id="filter_type" class="card card-horizontal card-default card-md mb-4 bg-outline-dark border-1">
                                        <div class="card-header text-dark">
                                            <h6>Filter Type</h6>
                                        </div>
                                        <div class="card-body py-md-30 text-dark">
                                            <div class="form-group row">
                                              <div class="col-sm-6">
                                                <div class="atbd-switch-wrap d-flex align-items-center">
                                                  <div class="custom-control custom-switch switch-primary switch-md ">
                                                      <input type="checkbox" class="custom-control-input" id="switch-s3" value="1" name="check_filter_type">
                                                      <label class="custom-control-label" for="switch-s3"> Filter Apply</label>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div id="filter_country">
                                              <div class="form-group row mb-3">
                                                <div class="col-sm-6">
                                                  <span class="">Select Age</span>
                                                </div>
                                                <div class="col-sm-6">
                                                  <span class="">Select Gender</span>
                                                </div>
                                              </div>
                                              <div class="form-group row mb-4">
                                                <div class="col-sm-6">
                                                  <select class="form-control ih-medium ip-light radius-xs b-light px-15 js-example-basic-single" name="filter_age" id="category_with_value">
                                                    <option class="text-dark" value="" disabled>Select a Age *</option>
                                                    <option value="1" @if($edit->age == 1) selected @endif> 20 < </option>
                                                    <option value="2" @if($edit->age == 2) selected @endif> > 20</option>
                                                  </select>
                                                </div>
                                                <div class="col-sm-6">
                                                  <select class="form-control ih-medium ip-light radius-xs b-light px-15 js-example-basic-single" name="filter_gender" id="gender">
                                                    <option class="text-dark" value="" disabled>Select a Gender *</option>
                                                    <option value="Male" @if($edit->age == "Male") selected @endif> Male </option>
                                                    <option value="FeMale" @if($edit->age == "FeMale") selected @endif> FeMale</option>
                                                  </select>
                                                </div>
                                              </div>

                                              <div class="form-group row mb-4">
                                                <div class="col-sm-6">
                                                  <label class="form-label">Select Country</label>
                                                    <select class="form-select form-select-sm mb-3 js-example-basic-single" id="country" name="filter_country">
                                                        <option value="" selected disabled>Select Country</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                  <label class="form-label">Select State</label>
                                                  <select class="form-select form-select-sm mb-3 js-example-basic-single" id="state" name="filter_state">
                                                      <option value="" selected disabled>Select Country</option>
                                                  </select>
                                                </div>
                                              </div>

                                              <div class="form-group row mb-4">
                                                <div class="col-sm-6">
                                                    <label class="form-label">Select City</label>
                                                    <select class="form-select form-select-sm mb-3 js-example-basic-single" id="city" name="filter_city">
                                                        <option value="" selected disabled>Select Country</option>
                                                    </select>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                      </div>

                                      <input type="hidden" name="hidden[]" id="hidden">
                                      <input type="hidden" name="last[]" id="last">

                                      <div class="form-group row">
                                        <div class="col-sm-3">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="layout-button mt-25">
                                                <input type="button" class="btn btn-default btn-squared border-normal bg-normal px-20" onclick="window.location.href='{{url('admin/send_emails')}}'" value="Cancel">
                                                <button type="submit" name="submit" class="btn btn-primary btn-default btn-squared px-30">save</button>
                                            </div>
                                        </div>
                                      </div>
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          @php $explode = explode(',',$edit->category_id); @endphp
              
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
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
          <script src="{{ asset('assets/js/main.js')}}"></script>
          <script src="{{ asset('assets/editor_ckediter/ckeditor.js')}}"></script>
          <script src="{{ asset('assets/editor_ckediter/adapters/jquery.js')}}"></script>
          <script src="{{ asset('assets/editor_ckediter/styles.js')}}"></script>
          <script src="{{asset('css/multiselect/jquery.multiselect.js')}}"></script>
          <link rel="stylesheet" href="{{asset('css/multiselect/jquery.multiselect.css')}}">
          <script src="{{asset('new/custom.js')}}"></script>

          <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  
          <script>
            $(document).ready(function () {
                getCountry();
                function getCountry(){
                    $("#country").html("");
                    $.ajax({
                        url: "/get-country",
                        type: "GET",
                        success: function (result) {
                          $("#country").append("<option value='0'>Select a country</option>");
                            $.each(result.data, function (key, value) {
                              var php_sub_var = {{$edit->filter_country ?? ''}};
                              if(php_sub_var == value.id)
                              {
                                $("#country").append('<option value="' + value.id + '" selected>' + value.country + "</option>");
                              }
                              else
                              {
                                $("#country").append('<option value="' + value.id + '">' + value.country + "</option>");
                              }
                            });
                        }
                    });
                }

                $("#country").on("change", function () {
                    var country_id = this.value;
                    $("#state").html("");
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/get-state",
                        type: "POST",
                        data: {
                            country_id: country_id
                        },
                        dataType: "json",
                        success: function (result) 
                        {
                            $("#state").append("<option value='0'>Select a State</option>");
                            $.each(result.data, function (key, value) {
                                $("#state").append('<option value="' + value.id + '">' + value.region + "</option>");
                            });
                            $("#city").html('<option value="">Select State First</option>');
                        }
                    });
                });

                getState();
                function getState()
                {
                  var country_id =  {{$edit->filter_country ?? ''}};
                  $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
                  $.ajax({
                      url: "/get-state",
                      type: "POST",
                      data: {
                          country_id: country_id
                      },
                      dataType: "json",
                      success: function (result) {
                          $.each(result.data, function (key, value) {
                              var php_sub_var = {{$edit->filter_state ?? ''}};
                              if(php_sub_var == value.id)
                              {
                                $("#state").append('<option value="' + value.id + '" selected>' + value.region + "</option>");
                              }
                              else
                              {
                                $("#state").append('<option value="' + value.id + '">' + value.region + "</option>");
                              }
                          });
                          $("#city").html('<option value="">Select State First</option>');
                      },
                  });
                }

                getCity();
                function getCity()
                {
                  var state_id =  {{$edit->filter_state}};
                  $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                  $.ajax({
                      url: "/get-city",
                      type: "POST",
                      data: {
                          state_id: state_id,
                      },
                      dataType: "json",
                      success: function (result) {
                          $.each(result.data, function (key, value) {
                              var php_sub_var = {{$edit->filter_city}};
                              if(php_sub_var == value.id)
                              {
                                $("#city").append('<option value="' + value.id + '" selected>' + value.city + "</option>");
                              }
                              else
                              {
                                $("#city").append('<option value="' + value.id + '">' + value.city + "</option>");
                              }
                          });
                      },
                  });
                }


                $("#state").on("change", function () {
                    var state_id = this.value;
                    $("#city").html("");
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/get-city",
                        type: "POST",
                        data: {
                            state_id: state_id,
                        },
                        dataType: "json",
                        success: function (result) {
                            $("#city").append("<option value='0'>Select a city</option>");
                            $.each(result.data, function (key, value) {
                                $("#city").append('<option value="' + value.id + '">' + value.city + "</option>");
                            });
                        },
                    });
                });
            });

          </script>

          <script>
            var category_id = "<?php echo $edit->category_id; ?>";
            test_name_sfkhgsf_check(category_id);
            function test_name_sfkhgsf_check(params)
            {
              var id = $('#multiple').val();
              $('#last').val(id);
              $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
              });
              $.ajax({
                url:"{{url('admin/send_emails_count')}}",
                type:"POST",
                data: {template_sub_category:id}, 
                success:function(data) 
                {
                  $('#with_sub_category').empty();
                  var template = data.template_sub_category;
                  var name = data.subcategoru_if;
                  var hidden = $('#hidden').val();
                  if(hidden.length == 0)
                  {
                    $('#hidden').val(name);
                  }
                  else
                  {
                    var lkd = name;
                    $('#hidden').val(lkd);
                  }
                  if(template.length > 0)
                  {
                    $('#with_sub_category').append('<option class="text-dark" value="">Select a Sub Category*</option>');

                    $.each(template,function(index,template_sub_category)
                    {
                      $('#with_sub_category').append('<option class="text-dark" selected value="'+template_sub_category.id+'">'+template_sub_category.sub_category_name+'</option>');
                    });
                  }
                  $('#user_id').html(data.users.length);
                  $('#hidden_user_count').val(data.users.length);
                  $('#user_count').val(data.users);
                }
              })
            }
          </script>

          <script>
            var user_type_check = {{$edit->filter_type ?? 0}};
            test_name_check(user_type_check);
            function test_name_check(params)
            {
              if(params == 1)
              {
                $('#switch-s3').attr("checked",true);
                $('#filter_type').show();
                $('#filter_country').show();
              }
              else
              {
                $('#filter_type').hide();
                $('#filter_country').hide();
              }
            }

            var image = {{$edit->new_user_type ?? 1}};
            test_check(image);
            function test_check(params)
            {
              if(params == "1")
              {
                $('#image_1').attr("checked",true);
                $('#image_2').attr("checked",false);
                $("#category_type").show();
                $('#existing_user').hide();
              }
              else if(params == "2") 
              {
                $('#image_2').attr("checked",true);
                $('#image_1').attr("checked",false);
                $("#category_type").hide();
                $('#existing_user').show();
              }
            }
          </script>
          <script>
            if($('#image_1').is(':checked'))
            {
              $("#category_type").show();
              $('#existing_user').hide();
            }

            $('#image_1').bind('change', function () {
              if ($(this).is(':checked'))
              {
                $("#category_type").show().removeAttr('checked',true);
                $('#existing_user').hide();
              }
            });
            
            $("#image_2").bind('change', function(){
              if ($(this).is(':checked'))
              {
                $("#category_type").hide();
                $('#existing_user').show().attr('checked',true);
              }
            });
          </script>
          <script>
            $('#template_category_type').show();
            $('#new_user').show();
            $('#sender_email').on('change',function()
            {
              $('#template_category_type').show();
            });

            $('#switch-s3').on('change',function()
            {
              var status = $(this).prop('checked') == true ? 1 : 0;
              if(status == 1)
              {
                $('#filter_country').show();
              }
              else
              {
                $('#filter_country').hide();
              }
            });
          </script>
          <script>
            $(function () {
                $('select[multiple].active.3col').multiselect({
                    columns: 1,
                    placeholder: 'Select Category',
                    search: true,
                    searchOptions: {
                        'default': 'Search Category'
                    },
                    selectAll: true,
                    closeOnSelect: false,
                });
            });
          </script>
          <script>
            $('#multiple').on('change',function()
            {
              $('#filter_type').show();
              $('#user_id').html(' ');
              $('#hidden_user_count').val('');
              let id = $(this).val();
              var hid = $('#last').val();
              $('#multiple option[value="'+id+'"]').attr('selected',true);
              if(hid.length == 0)
              {
                $('#last').val(id);
              }
              else
              {
                if(id.length == 0 || hid.length == 0)
                {
                  $('#user_count').val('');
                  $('#last').val('');
                  $('#hidden').val('');
                  $('#with_sub_category option:selected').remove();
                }
                else
                {
                  if(id.length > 0)
                  {
                    $('#last').val(id);
                  }
                }
              }
              if(id.length > 0)
              {
                $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                  url:"{{url('admin/send_emails_count')}}",
                  type:"POST",
                  data: {template_sub_category:id},
                  success:function(data) 
                  {
                    $('#with_sub_category').empty();
                    var template = data.template_sub_category;
                    var name = data.subcategoru_if;
                    var hidden = $('#hidden').val();
                    if(hidden.length == 0)
                    {
                      $('#hidden').val(name);
                    }
                    else
                    {
                      var lkd = name;
                      $('#hidden').val(lkd);
                    }
                    if(template.length > 0)
                    {
                      $('#with_sub_category').append('<option class="text-dark" value="">Select a Sub Category*</option>');

                      $.each(template,function(index,template_sub_category)
                      {
                        $('#with_sub_category').append('<option class="text-dark" selected value="'+template_sub_category.id+'">'+template_sub_category.sub_category_name+'</option>');
                      });
                    }
                    $('#user_id').html(data.users.length);
                    $('#hidden_user_count').val(data.users.length);
                    $('#user_count').val(data.users);
                  }
                })
              }
            });
            
            $('#savechanges').on('click',function()
            {
              var mame = $('#with_sub_category').val();
              if(mame.length == 0)
              {
                $('#multiple').val($('#multiple option:selected').val());
                $('#hidden').val($('#hidden').val());
              }
              else
              {
                $('#hidden').val('');
                $('#ms-list-1').addClass('ms-active');
                jQuery.noConflict();
                var sun = $('#with_sub_category').val();
                var sub = $('#hidden').val();
                if(sub.length == 0)
                {
                  $('#hidden').val(sun);
                }
                else
                {
                  var result = sub+','+sun;
                  $('#hidden').val(sun);
                }
              }
            });
          </script>
          
          <script>
            $('#showforquesvideo').show();

            var php_template = "<?php echo $edit->template_id; ?>";
            if(php_template !== null)
            {
              $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              $.ajax({
                url:"{{url('admin/template_list_apend')}}",
                type:"POST",
                data: {cat_id: php_template},
                success:function(data) 
                {
                  var data = data.name;
                  if(data.length > 0)
                  {
                    $.each(data,function(index,subcategory)
                    {
                      $('#quiz_question_default_image').val(subcategory.template_subject);
                      editor.setData(subcategory.template_body);
                      if($('#switch-s2').val() == 0)
                      {
                        $('#showforquesvideo').show();
                      }
                      $('#switch-s2').on('change',function()
                      {
                        var status = $(this).prop('checked') == true ? 1 : 0;
                        if(status == 1)
                        {
                          $('#showforquesvideo').show();
                          $('#category_type').show();
                          $('#quiz_question_default_image').val(subcategory.template_subject);
                          editor.setData(subcategory.template_body);
                        }
                        else
                        {
                          $('#showforquesvideo').show();
                          $('#category_type').show();
                          $('#quiz_question_default_image').val('');
                          editor.setData('');
                        }
                      });
                    })
                  }
                }
              })
            }

            $('#subcategory').on('change',function() 
            {
              $('#category_type').show();
              $('#new_user').show();
              let id = $(this).val();
              $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              $.ajax({
                url:"{{url('admin/template_list_apend')}}",
                type:"POST",
                data: {cat_id: id},
                success:function(data) 
                {
                  var data = data.name;
                  if(data.length > 0)
                  {
                    $.each(data,function(index,subcategory)
                    {
                      $('#quiz_question_default_image').val(subcategory.template_subject);
                      editor.setData(subcategory.template_body);
                      if($('#switch-s2').val() == 0)
                      {
                        $('#showforquesvideo').show();
                      }
                      $('#switch-s2').on('change',function()
                      {
                        var status = $(this).prop('checked') == true ? 1 : 0;
                        if(status == 1)
                        {
                          $('#showforquesvideo').show();
                          $('#category_type').show();
                          $('#quiz_question_default_image').val(subcategory.template_subject);
                          editor.setData(subcategory.template_body);
                        }
                        else
                        {
                          $('#showforquesvideo').show();
                          $('#category_type').show();
                          $('#quiz_question_default_image').val('');
                          editor.setData('');
                        }
                      });
                    })
                  }
                }
              })
            });

            var php_var = "<?php echo $edit->template_category_id; ?>";
            if(php_var !== null)
            {
              $.ajaxSetup({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
              }); 
              $.ajax({
                url:"{{url('admin/send_emails_count')}}",
                type:"POST",
                data: {cat_id: php_var},
                success:function(data) 
                {
                  var data = data.subcategories;
                  if(data.length > 0)
                  {
                    $.each(data,function(index,subcategory)
                    { 
                      var php_sub_var = "<?php echo $edit->template_id;?>";
                      if(php_sub_var == subcategory.id)
                      {
                        $('#subcategory').append('<option class="text-dark" value="'+php_sub_var+'" selected>'+subcategory.template_name+'</option>');
                      }
                      else
                      {
                        $('#subcategory').append('<option class="text-dark" value="'+subcategory.id+'">'+subcategory.template_name+'</option>');
                      }
                    })
                  }
                }
              })
            }

            $('#category').on('change',function() 
            {
              $('#quiz_question_default_image').val('');
              editor.setData('');
              let id = $(this).val();
              $.ajaxSetup({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
              });
              $.ajax({
                url:"{{url('admin/send_emails_count')}}",
                type:"POST",
                data: {cat_id: id},
                success:function(data) 
                {
                  $('#subcategory').empty();
                  var data = data.subcategories;
                  if(data.length > 0)
                  {
                    $('#subcategory').append('<option class="text-dark" value="" selected disabled>Select a Template*</option>');
                    $.each(data,function(index,subcategory)
                    {
                      $('#subcategory').append('<option class="text-dark" value="'+subcategory.id+'">'+subcategory.template_name+'</option>');
                    })
                    $('#switch-s2').on('change',function()
                    {
                        var status = $(this).prop('checked') == true ? 1 : 0;
                        if(status == 0)
                        {
                          $('#subcategory').append('<option class="text-dark" value="0" selected>None</option>');
                        }
                        else
                        {
                          $('#showforquesvideo').show();
                          $('#category_type').show();
                          editor.setData('');
                          alert('Please Select a SubCategory');
                        }
                    });
                  }
                }
              })
            });

            // var filter_age = "<?php echo $edit->filter_age;?>";
            // age(filter_age);
            // function age(id)
            // {
            //   let cat_id = $('#last').val();
            //   let sub_id = $('#hidden').val();
            //   let name_id = cat_id.split(",");
            //   let val_id = sub_id.split(",");
            //   $.ajaxSetup({
            //   headers: {
            //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //   }
            //   });
            //   $.ajax({
            //       url:"{{url('admin/send_emails_count')}}",
            //       type:"POST",
            //       data: {category_id:name_id,sub_category_id:val_id,age:id},
            //       success:function(data) 
            //       {
            //         $('#user_id').html(data.users.length);
            //         $('#hidden_user_count').val(data.users.length);
            //         $('#user_count').val(data.users);
            //       }
            //   })
            // }

            $('#category_with_value').on('change',function()
            {
              let id = $(this).val();
              let cat_id = $('#last').val();
              let sub_id = $('#hidden').val();
              let name_id = cat_id.split(",");
              let val_id = sub_id.split(",");
              $.ajaxSetup({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
              });
              $.ajax({
                  url:"{{url('admin/send_emails_count')}}",
                  type:"POST",
                  data: {category_id:name_id,sub_category_id:val_id,age:id},
                  success:function(data) 
                  {
                    $('#user_id').html(data.users.length);
                    $('#hidden_user_count').val(data.users.length);
                    $('#user_count').val(data.users);
                  }
              })
            });

            $('#gender').on('change',function()
            {
              let id = $(this).val();
              let cat_id = $('#last').val();
              let sub_id = $('#hidden').val();
              let name_id = cat_id.split(",");
              let val_id = sub_id.split(",");
              let age_id = $('#category_with_value').val();
              $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              $.ajax({
                  url:"{{url('admin/send_emails_count')}}",
                  type:"POST",
                  data: {category_id:name_id,sub_category_id:val_id,gender:id,age:age_id},
                  success:function(data) 
                  {
                    $('#user_id').html(data.users.length);
                    $('#hidden_user_count').val(data.users.length);
                    $('#user_count').val(data.users);
                  }
              })
            });

            $('#country').on('change',function()
            {
              let id = $(this).val();
              let cat_id = $('#last').val();
              let sub_id = $('#hidden').val();
              let name_id = cat_id.split(",");
              let val_id = sub_id.split(",");
              let age_id = $('#category_with_value').val();
              let gender_id = $('#gender').val();
              $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              $.ajax({
                url:"{{url('admin/send_emails_count')}}",
                type:"POST",
                data: {category_id:name_id,sub_category_id:val_id,gender:gender_id,country:id,age:age_id},
                success:function(data) 
                {
                  $('#user_id').html(data.users.length);
                  $('#hidden_user_count').val(data.users.length);
                  $('#user_count').val(data.users);
                }
              })
            });

            $('#state').on('change',function()
            {
              let id = $(this).val();
              let cat_id = $('#last').val();
              let sub_id = $('#hidden').val();
              let name_id = cat_id.split(",");
              let val_id = sub_id.split(",");
              let age_id = $('#category_with_value').val();
              let gender_id = $('#gender').val();
              let country_id = $('#country').val();
              $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              $.ajax({
                url:"{{url('admin/send_emails_count')}}",
                type:"POST",
                data: {category_id:name_id,sub_category_id:val_id,gender:gender_id,country:country_id,age:age_id,state:id},
                success:function(data) 
                {
                  $('#user_id').html(data.users.length);
                  $('#hidden_user_count').val(data.users.length);
                  $('#user_count').val(data.users);
                }
              })
            });

            $('#city').on('change',function()
            {
              let id = $(this).val();
              let cat_id = $('#last').val();
              let sub_id = $('#hidden').val();
              let name_id = cat_id.split(",");
              let val_id = sub_id.split(",");
              let age_id = $('#category_with_value').val();
              let gender_id = $('#gender').val();
              let country_id = $('#country').val();
              let state_id = $('#state').val();
              $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              $.ajax({
                url:"{{url('admin/send_emails_count')}}",
                type:"POST",
                data: {category_id:name_id,sub_category_id:val_id,gender:gender_id,country:country_id,age:age_id,state:state_id,city:id},
                success:function(data) 
                {
                  $('#user_id').html(data.users.length);
                  $('#hidden_user_count').val(data.users.length);
                  $('#user_count').val(data.users);
                }
              })
            });
          </script>
       





          <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
            $(document).ready(function() {
                $('.js-example-basic-singlle').select2();
            });
            
          </script>
          <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2({
                  placeholder: {
                      text: 'Select an Sub Category'
                    },
                }); 
            });
          </script>
          <script>
            var editor = CKEDITOR.replace('html_desc', {
              filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
              filebrowserUploadMethod: 'form',
              height:'300'
            });
          </script>
          <script>
            CKEDITOR.config.toolbarGroups = [{
                name: 'document',
                groups: ['mode', 'document', 'doctools']
            },
            {
                name: 'clipboard',
                groups: ['clipboard', 'undo']
            },
            {
                name: 'editing',
                groups: ['find', 'selection', 'spellchecker', 'editing']
            },
            {
                name: 'forms',
                groups: ['forms']
            },
            {
                name: 'basicstyles',
                groups: ['basicstyles', 'cleanup']
            },
            {
                name: 'paragraph',
                groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']
            },
            {
                name: 'links',
                groups: ['links']
            },
            {
                name: 'insert',
                groups: ['insert']
            },
            {
                name: 'styles',
                groups: ['styles']
            },
            {
                name: 'colors',
                groups: ['colors']
            },
            {
                name: 'tools',
                groups: ['tools']
            },
            {
                name: 'others',
                groups: ['others']
            },
            {
                name: 'about',
                groups: ['about']
            }
            ];

            CKEDITOR.config.removeButtons =
                'Anchor,HorizontalRule,CopyFormatting,RemoveFormat,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Templates,Save,NewPage,ExportPdf,Preview,Print,Strike,Language,Flash,Smiley,PageBreak,Iframe,TextColor,BGColor,Maximize,About,ShowBlocks,CreateDiv,Blockquote,Styles';


          </script>
    </body>
    </html>