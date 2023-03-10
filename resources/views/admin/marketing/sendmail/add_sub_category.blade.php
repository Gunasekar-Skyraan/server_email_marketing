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
                    
                    {{-- <style>
                        /* .container {
                          width: 400px;
                          height: 50px;
                          position: relative;
                          border: 1px solid black;
                        } */
                      
                      .progress {
                        background: rgb(23, 23, 103);
                        float: left;
                        color: white;
                        width: 100%;
                        height: 50px;
                        line-height: 50px;
                        animation-name: slideInFromLeft;
                        animation-duration: 30s;
                        animation-timing-function: cubic-bezier(0, .9, .9, .999);
                        text-align: center;
                      }
                      
                      .percent::before {
                        content: counter(count);
                        animation-name: counter;
                        animation-duration: 30s;
                        animation-timing-function: cubic-bezier(0, .9, .9, .999);
                        counter-reset: count 0;
                      }
                      
                      @keyframes slideInFromLeft {
                        0% {
                          width: 0%;
                        }
                        99% {
                          width: 50%;
                        }
                      }
                      
                        @keyframes counter {
                        0% {
                          counter-increment: count 0;
                        }
                        10% {
                          counter-increment: count 10;
                        }
                        20% {
                          counter-increment: count 20;
                        }
                        30% {
                          counter-increment: count 30;
                        }
                        40% {
                          counter-increment: count 40;
                        }
                        50% {
                          counter-increment: count 50;
                        }
                        60% {
                          counter-increment: count 60;
                        }
                        70% {
                          counter-increment: count 70;
                        }
                        80% {
                          counter-increment: count 80;
                        }
                        90% {
                          counter-increment: count 90;
                        }
                        92% {
                          counter-increment: count 92;
                        }
                        95% {
                          counter-increment: count 95;
                        }
                        98% {
                          counter-increment: count 98;
                        }
                        99% {
                          counter-increment: count 99;
                        }
                        100% {
                          counter-increment: count 100;
                        }
                      }
                    </style>    --}}

                    <style>
                      #loader {
                        display: none;
                        position: fixed;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        width: 100%;
                        background: rgba(0,0,0,0.75) url(https://flevix.com/wp-content/uploads/2019/12/Progress-Loading-1.gif) no-repeat center center ;
                        background-size: 100% 100%;
                        opacity: 0.7;
                        z-index: 10000;
                      }
                    </style>
                  
                    <div class="row">
                      <div class="col-lg-12">
                        <div id="loader" class="hidden" style="display:none">
                          {{-- <div class="form-group row mb-3">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                              <div class="progress">
                                <span class="percent">%</span>
                              </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                          </div> --}}
                        </div>
                        <div id="card_id" class="card card-horizontal card-default card-md mb-4">
                            <div class="card-header">
                                <h6>Compose Email</h6>
                            </div>
                            <div class="card-body py-md-30">
                                <div class="horizontal-form">
                                    <form id="some-form" action="{{url('admin/insert_email')}}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      <div id="sender_email" class="card card-horizontal card-default card-md mb-4 bg-outline-dark border-1">
                                        <div class="card-header text-dark">
                                            <h6>Sender Email<span style="color:red;">&nbsp;*</span></h6>
                                        </div>
                                        <div class="card-body py-md-30 text-dark">
                                          <div class="form-group row mb-3">  
                                            <div class="col-sm-12">
                                              <select name="sender_email" class="form-control js-example-basic-single">
                                                <option value="text-dark" value="" selected disabled>Select A Sender Email  <span style="color:red;">&nbsp;*</span></option>
                                                @foreach($sendemail as $row)
                                                  <option class="text-dark" value="{{$row->email_id}}">{{$row->email_id}}</option>
                                                @endforeach
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
                                              <span class="">Select Template Category</span>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-sm-12">
                                              <div class="select-style2">
                                                <div class="atbd-select">
                                                  <select name="template_category" id="category" class="form-control js-example-basic-single">
                                                      <option class="text-dark" value="" selected disabled>Select a Template Category *</option>
                                                      @foreach($category as $category)
                                                        <option class="text-dark" value="{{$category->id}}">{{$category->temp_category_name}}</option>
                                                      @endforeach
                                                  </select>
                                                </div>
                                              </div>                                            
                                            </div>
                                          </div>

                                          <div class="form-group row mb-3">
                                            <div class="col-sm-6">
                                              <span class="">Select Template</span>
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
                                                    <label class="custom-control-label" for="switch-s2">Template Use</label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          
                                          <div id="show_category">
                                            <div class="form-group row mb-3">
                                              <div class="col-sm-6">
                                                <span class="">Select Template Category</span>
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <div class="col-sm-12">
                                                <div class="select-style2">
                                                  <div class="atbd-select">
                                                    <select name="new_template_category" id="show_name_category" class="form-control js-example-basic-single">
                                                        <option class="text-dark" value="" selected>Select a Template Category *</option>
                                                        @foreach($name as $rowsd)
                                                          <option class="text-dark" value="{{$rowsd->id}}">{{$rowsd->temp_category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                  </div>
                                                </div>                                            
                                              </div>
                                            </div>
                                            <input type="hidden" id="empty" name="empty">
                                            <div class="form-group row mb-3">
                                              <div class="col-sm-6">
                                                <span class="">Template Name</span>
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <div class="col-sm-9">
                                                  <input type="text" class="form-control ih-medium ip-light radius-xs b-light px-15" id="random_name" name="category_name" value="{{old('category_name')}}" placeholder="Template name" autocomplete="off">
                                              </div>
                                              <div class="col-sm-3">
                                                <input id="clickMe" class="btn btn-primary btn-md" type="button" value="Generate Random Name" onclick="generateName();" />
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
                                              <span class="">Template Body HTML type</span>
                                            </div>
                                          </div>

                                          <div id="form-text" class="form-group row mb-3">
                                            <div class="col-sm-12">
                                                <textarea class="form-control" placeholder="Leave a comment here"  id="html_desc" name="template_body" style="height: 100px;"></textarea>
                                            </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                            <div class="col-sm-3">
                                              <button type="button" class="btn btn-outline-primary" id="trigger_template">Save as Template</button>
                                            </div>
                                            <div class="col-sm-3">
                                              <input type="hidden" name="template_category_hidden" id="hidden_category" value="0">
                                              <span id="p"></span>
                                            </div>
                                            <div class="col-sm-3">
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
                                                  <option class="text-dark" value="{{$row->id}}">{{$row->category_name}}</option>
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
                                              <textarea class="form-control" placeholder="New User"  id="new_user" name="new_user" style="height: 100px;"></textarea>
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
                                                    <option class="text-dark" value="" selected disabled>Select a Age *</option>
                                                    <option value="1"> 20 < </option>
                                                    <option value="2"> > 20</option>
                                                  </select>
                                                </div>
                                                <div class="col-sm-6">
                                                  <select class="form-control ih-medium ip-light radius-xs b-light px-15 js-example-basic-single" name="filter_gender" id="gender">
                                                    <option class="text-dark" value="" selected disabled>Select a Gender *</option>
                                                    <option value="Male"> Male </option>
                                                    <option value="FeMale"> FeMale</option>
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
                                                <button type="submit" id="submit-form" name="submit" class="btn btn-primary btn-default btn-squared px-30">Send</button>
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
                      <span class="spin-dot badge-dot dot-success"></span>
                      <span class="spin-dot badge-dot dot-success"></span>
                      <span class="spin-dot badge-dot dot-success"></span>
                      <span class="spin-dot badge-dot dot-success"></span>
                  </div>
              </span>
          </div>
          <div class="overlay-dark-sidebar"></div>
      
          
          <!-- inject:js-->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

          <script src="{{asset('new/custom.js')}}"></script>

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
          <script src="{{ asset('assets/js/main.js')}}"></script>
          <script src="{{ asset('assets/editor_ckediter/ckeditor.js')}}"></script>
          <script src="{{ asset('assets/editor_ckediter/adapters/jquery.js')}}"></script>
          <script src="{{ asset('assets/editor_ckediter/styles.js')}}"></script>
          <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
          <script src="{{asset('css/multiselect/jquery.multiselect.js')}}"></script>
          <link rel="stylesheet" href="{{asset('css/multiselect/jquery.multiselect.css')}}">

          <script>
            $('#show_name_category').on('change',function(){
              let id = $(this).val();
              $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              $.ajax({
                  url:"{{url('admin/count')}}",
                  type:"POST",
                  data: {cat_id:id},
                  success:function(data) 
                  {
                    $('#empty').val(data.subcategories);
                  }
              })
            });
            $('#clickMe').on('click',function(){
              
              let id =$('#category').val();
              if(!id || id.length === 0 )
              {
                alert('Plese Select a Category');
              }
              else
              {
                var first_name = [$('#category option:selected').text()];
                var last_name = $('#empty').val();
                var name ='';
                if(last_name == 0)
                {
                  var x = $('#empty').val();
                  var name = first_name +'_temp_'+x;
                  $("#random_name").val(name);
                }
                else
                {
                  var x = $('#empty').val();
                  var name = first_name +'_temp_'+x;
                  $("#random_name").val(name);
                }
              }
            });

            function generateName()
            {
              let id =$('#category').val();
              if(!id || id.length === 0 )
              {
                alert('Plese Select a Category');
              }
              else
              {
                var first_name = [$('#category option:selected').text()];
                var last_name = $('#empty').val();
                var name ='';
                if(last_name == 0)
                {
                  var x = $('#empty').val();
                  var name = first_name +'_temp_'+x;
                  $("#random_name").val(name);
                }
                else
                {
                  var x = $('#empty').val();
                  var name = first_name +'_temp_'+x;
                  $("#random_name").val(name);
                }
              }
            }
          </script>
          <script>
            $('#trigger_template').hide();
            $('#trigger_template').on('click',function()
            {
              $('#hidden_category').val(1);
              $('#p').html('<p>Save Successfully</p>');
            });
          </script>
            <script>
              $('#show_category').hide();
              let form = document.querySelector('#some-form');
              let vallue = document.querySelector('#card_id');
              let loader = document.querySelector('#loader');

              form.addEventListener('submit', function (event) 
              {
                
                // using non css framework method with Style
                loader.style.display = 'block';
                vallue.style.display = 'none';
              
                // using a css framework such as TailwindCSS
                loader.classList.remove('hidden');

                // pretend the form has been sumitted and returned
              });
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
            $('#filter_country').hide();
            $('#template_category_type').hide();
            $('#new_user').hide();
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
            $('#category_sub_select').hide();
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
            $('#filter_type').hide();
            $('#multiple').on('change',function()
            {
              $('#filter_type').show();
              $('#user_id').html(' ');
              $('#hidden_user_count').val('');
              $('#category_sub_select').show();
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
                jQuery.noConflict();
                $('#staticBackdrop2').modal('show');
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
                        
                        if(template_sub_category.id == 0)
                        {
                          $('#with_sub_category').append('<option class="text-dark" value="0" selected disabled>None</option>');
                        }
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
            
            $('#savechanges').on('click',function(){
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
                var sun = $('#with_sub_category').val();
                var id = $('#multiple').val();
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

                $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });

                $.ajax({
                  url:"{{url('admin/send_emails_count')}}",
                  type:"POST",
                  data: {sub_category:sun,template_sub_category:id},
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
                        if(sun == template_sub_category.id)
                        {
                          $('#with_sub_category').append('<option class="text-dark" value="'+template_sub_category.id+'" selected>'+template_sub_category.sub_category_name+'</option>');
                        }
                        else
                        {
                          $('#with_sub_category').append('<option class="text-dark" value="'+template_sub_category.id+'">'+template_sub_category.sub_category_name+'</option>');
                        }
                      });
                    }
                    $('#user_id').html(data.users.length);
                    $('#hidden_user_count').val(data.users.length);
                    $('#user_count').val(data.users);
                  }
                })

              }
            });
          </script>
          
          <script>
            $('#showforquesvideo').hide();
            $('#category_type').hide();
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
                      $('#YesOrNo').show();
                      $('#div_quiz_question').show();
                      $('#all').show();
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
                          $('#trigger_template').hide();
                          $('#show_category').hide();
                          $('#showforquesvideo').show();
                          $('#category_type').show();
                          $('#quiz_question_default_image').val(subcategory.template_subject);
                          editor.setData(subcategory.template_body);
                        }
                        else
                        {
                          $('#trigger_template').show();
                          $('#show_category').show();
                          $('#showforquesvideo').show();
                          $('#category_type').show();
                          $('#quiz_question_default_image').val(' ');
                          editor.setData('');
                        }
                      });
                    })
                  }
                }
              })
            });

            $('#category').on('change',function() 
            {
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
            $('#category_select').hide();
            $('#all').hide();
            $('#category_sub_select').hide();
            $('#div_quiz_question').hide();
          </script>
       





          <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2({
                    // placeholder: "Select a Value",
                    // allowClear: true
                });
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

            $('#YesOrNo').hide();
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