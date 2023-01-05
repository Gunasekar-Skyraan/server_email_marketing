<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Marketing - Edit Quiz</title>

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
                                    <span>Add Quiz</span>
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
                                  <h6>Edit Quiz</h6>
                              </div>
                              <div class="card-body py-md-30">
                                  <div class="horizontal-form">
                                    @foreach ($edit_question_id as $quiz)
                                      <form action="{{url('admin/edit_Quiz_list/'.$quiz->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="select-alerts2" class=" col-form-label color-dark fs-14 fw-500 align-center">Category<span style="color:red;">&nbsp;*</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                            <div class="select-style2">
                                              <div class="atbd-select ">
                                                  <select name="category_id" id="select-alerts2" class="form-control ">
                                                    <optgroup label="Selected Categories">  
                                                      <option class="text-dark" value="{{$quiz->category->id}}"selected>{{$quiz->category->category_name}}</option>
                                                    </optgroup>  
                                                    <optgroup label="Available Categories">
                                                      @foreach($category_id as $category)
                                                        @if($category->id !== $quiz->category->id)
                                                            <option class="text-dark" value="{{$category->id}}">{{$category->category_name}}</option>
                                                        @endif
                                                      @endforeach
                                                    </optgroup>
                                                  </select>
                                              </div>
                                            </div>                                            
                                          </div>
                                        </div>


                                          <div class="form-group row" id="div_quiz_question">
                                            <div class="col-sm-3 d-flex aling-items-center">
                                              <label class="col-form-label color-dark fs-14 fw-500 align-center" for="quiz_question">Question Format type : </label>
                                            </div>
                                            <div style="display: contents;" class="col-md-9 align-items-center d-inline-flex">
                                              <div class="form-inline">
                                                <input type="radio" name="question_format_type" class="quest_text_type" value="1" id="ques_default_text" onchange="quesishtml()" @if($quiz->question_format_type == 1) checked @endif >
                                                  <label class="pr-3 pl-1" for="ques_default_text">Normal text</label>
                                                <input type="radio" name="question_format_type" class="quest_text_type" value="2" id="ques_html_text" onchange="quesishtml()" @if($quiz->question_format_type == 2) checked @endif >
                                                  <label class="pr-3 pl-1" for="ques_html_text">Html text</label>
                                                <span class="text-danger"  id="question_format_type_error"></span>
                                                <input type="radio" name="question_format_type" class="quest_text_type" value="3" id="ques_default_text_3" onchange="quesishtml()" @if($quiz->question_format_type == 3) checked @endif >
                                                  <label class="pr-3 pl-1" for="ques_default_text_3">Image text</label>
                                                <input type="radio" name="question_format_type" class="quest_text_type" value="4" id="ques_default_text_4" onchange="quesishtml()" @if($quiz->question_format_type == 4) checked @endif >
                                                  <label class="pr-3 pl-1" for="ques_default_text_4">Video text</label>
                                              </div>
                                            </div>
                                        </div>



                                          <!--show for question with video-->
                                        <div id="showforquesvideo">
                                          <div class="form-group row">  
                                            <div class="col-sm-3 d-flex aling-items-center">
                                              <label for="showforquesdefault"  class=" col-form-label color-dark fs-14 fw-500 align-center">Question Name<span style="color:red;">&nbsp;*</span></label>
                                            </div>
                                            <div class="col-md-9 p-0">
                                                <textarea name="question_name_video" class="form-control input-full" rows="5" id="quiz_question_default_image" style="height:100px;">{{$quiz->question_name}}</textarea>
                                                    <span class="text-danger" id="error_quiz_question_default" ></span>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <div class="col-sm-3 d-flex aling-items-center">
                                                <label for="video_type_file" class=" col-form-label color-dark fs-14 fw-500 align-center">[Video File Type]</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control ih-medium ip-light radius-xs b-light px-15"  accept="video/*" name="video_file" id="video_type_file" >
                                            </div>
                                          </div>
                                          @if(!empty($quiz->question_content))
                                            <div class="form-group row ">
                                              <div class="col-sm-3 d-flex aling-items-center">
                                              <label for="file_1" class="col-form-label color-dark fs-14 fw-500 align-center">Video Preview</label>
                                              </div>
                                              <div class="col-md-9">
                                                @if($quiz->question_format_type == 4)
                                                  <a src="{{asset($quiz->question_content)}}" style="height:70px;width:auto;">{{asset($quiz->question_content)}}</a>
                                                @else
                                                <img src="{{$quiz->question_content}}" style="height:70px;width:auto;">
                                                @endif
                                              </div>
                                            </div>
                                          @endif

                                        </div>

                                      
                                        <!--show for question with image-->
                                        <div id="showforquesImage">
                                          <div class="form-group row">  
                                            <div class="col-sm-3 d-flex aling-items-center">
                                              <label for="showforquesdefault"  class=" col-form-label color-dark fs-14 fw-500 align-center">Question Name <span style="color:red;">&nbsp;*</span></label>
                                            </div>
                                            <div class="col-md-9 p-0">
                                                  <textarea name="question_name_image" class="form-control input-full" rows="5" id="quiz_question_default_video" style="height:100px;">{{$quiz->question_name}}</textarea>
                                                      <span class="text-danger" id="error_quiz_question_default"></span>
                                              </div>
                                          </div>  
                                          <div class="form-group row">
                                            <div class="col-sm-3 d-flex aling-items-center">
                                                <label for="video_type_file" class=" col-form-label color-dark fs-14 fw-500 align-center">Image File Type  <span style="color:red;">&nbsp;*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control ih-medium ip-light radius-xs b-light px-15"  accept="image/*" name="image_file" id="imgInp" >
                                            </div>
                                          </div>
                                          @if(!empty($quiz->question_content))
                                            <div class="form-group row ">
                                              <div class="col-sm-3 d-flex aling-items-center">
                                              <label for="file_1" class="col-form-label color-dark fs-14 fw-500 align-center">Image Preview</label>
                                              </div>
                                              <div class="col-md-9">
                                                @if($quiz->question_format_type == 3)
                                                  <img src="{{asset($quiz->question_content)}}" style="height:70px;width:auto;">
                                                @else
                                                <img src="{{$quiz->question_content}}" style="height:70px;width:auto;">
                                                @endif
                                              </div>
                                            </div>
                                          @endif
                                          <div class="form-group row">
                                            <div class="col-sm-3 d-flex aling-items-center">
                                                <label for="video_type_file" class=" col-form-label color-dark fs-14 fw-500 align-center">[Image File Preview]</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <img id="blah" src="#" alt=""/>
                                            </div>
                                          </div>
                                        </div>
        
                                        <!--show for question html-->
        
                                        <div class="form-group row" id="showforqueshtml">
                                            <div class="col-sm-3 d-flex aling-items-center">
                                              <label for="showforqueshtml"  class=" col-form-label color-dark fs-14 fw-500 align-center">Question <span style="color:red;">&nbsp;*</span></label>
                                            </div>
                                            <div class="col-md-9">
                                              <textarea class="form-control" name="question_name_html" rows="5" id="quiz_question_html" >{{strip_tags($quiz->question_name)}}</textarea>
                                                <span class="text-danger"  id="error_quiz_question_html"></span>
                                            </div>
                                        </div>
        
                                        <!--show for question default-->
        
                                        <div class="form-group row" id="showforquesdefault">  
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="showforquesdefault"  class=" col-form-label color-dark fs-14 fw-500 align-center">Question<span style="color:red;">&nbsp;*</span></label>
                                          </div>
                                          <div class="col-md-9 p-0">
                                                <textarea name="question_name" class="form-control input-full" rows="5" id="quiz_question_default" style="height:100px;">{{$quiz->question_name}}</textarea>
                                                    <span class="text-danger" id="error_quiz_question_default"></span>
                                            </div>
                                        </div>
        
        
                                        <div class="form-group row">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="showforqueshtml"  class=" col-form-label color-dark fs-14 fw-500 align-center">No of Options<span
                                                    style="color:red;">&nbsp;*</span></label>
                                          </div>
                                            <div class="col-md-9">
                                                <SELECT name="option_count" id="ppl" class="form-control" style="width:100%;" required onchange="optionlist()">
                                                  <option disabled="true" selected>Select Option</option>
                                                  <option value="1" @if($quiz->option_count == 1) selected @endif>1</option>
                                                  <option value="2" @if($quiz->option_count == 2) selected @endif>2</option>
                                                  <option value="3" @if($quiz->option_count == 3) selected @endif>3</option>
                                                  <option value="4" @if($quiz->option_count == 4) selected @endif>4</option>
                                                  <option value="5" @if($quiz->option_count == 5) selected @endif>5</option>
                                                  <option value="6" @if($quiz->option_count == 6) selected @endif>6</option>
                                                </select>
                                                <span class="text-danger" id="error_option_count"></span>
                                            </div>
                                        </div>
        
        
                                        <div class="form-group row" id="change_option">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label  class="col-form-label color-dark fs-14 fw-500 align-center" for="">Option Format type : </label>
                                          </div>
                                          <div style="display: contents;" class=" col-md-9 align-items-center d-inline-flex">
                                            <div class="form-inline">
                                              <input type="radio" name="option_format_type" class="opt_text_type" value="0"
                                                  id="opt_default_text" onchange="optionishtml()" checked>
                                              <label class="pr-3 pl-1" for="opt_default_text">Normal text</label>

                                              <input type="radio" name="option_format_type" class="opt_text_type" value="1"
                                                  id="opt_html_text" onchange="optionishtml()" @if($quiz->option_format_type
                                                  == 1) checked @endif>
                                              <label class="control-label" for="opt_html_text">Html text</label>
                                              <p class="text-danger err_msg" id="err_quiz_question"></p>
                                            </div>
                                          </div>
                                        </div>
        
        
        
                                        <!--show for opt html-->
                                        <div id="showforopthtml">
                                            <div class="form-group row" id="text_html_1">
                                                <div class="col-sm-3 d-flex aling-items-center">
                                                  <label for="" class="col-form-label color-dark fs-14 fw-500 align-center">Option 1<span
                                                          style="color:red;">&nbsp;*</span></label>
                                                </div>
                                                <div class="col-md-9 p-0">
                                                    <textarea name="option_1_html" class="form-control input-full" rows="5"
                                                        id="quiz_option1_html" style="height:100px;">@if($quiz->option_format_type==1){{$quiz->option_1}}  @endif</textarea>
                                                        <span class="text-danger" id="error_option_1_html"></span>
                                                </div>
                                            </div>
        
        
                                            <div class="form-group row" id="text_html_2">
                                              <div class="col-sm-3 d-flex aling-items-center">
                                                <label for=""  class=" col-form-label color-dark fs-14 fw-500 align-center">Option 2<span
                                                        style="color:red;">&nbsp;*</span></label>
                                              </div>
                                                <div class="col-md-9 p-0">
                                                    <textarea name="option_2_html" class="form-control input-full" rows="5"
                                                        id="quiz_option2_html" style="height:100px;">@if($quiz->option_format_type==1){{$quiz->option_2}}  @endif</textarea>
                                                            <span class="text-danger" id="error_option_2_html"></span>
                                                </div>
                                            </div>
        
        
                                            <div class="form-group row" id="text_html_3">
                                              <div class="col-sm-3 d-flex aling-items-center">
                                                <label for=""  class=" col-form-label color-dark fs-14 fw-500 align-center">Option 3<span
                                                        style="color:red;">&nbsp;*</span></label>
                                              </div>
                                                <div class="col-md-9 p-0">
                                                    <textarea name="option_3_html" class="form-control input-full" rows="5"
                                                        id="quiz_option3_html" style="height:100px;">@if($quiz->option_format_type==1){{$quiz->option_3}}  @endif</textarea>
        
                                                        <span class="text-danger" id="error_option_3_html"></span>
        
                                                </div>
                                            </div>
        
                                            <div class="form-group row" id="text_html_4">
                                              <div class="col-sm-3 d-flex aling-items-center">
                                                <label for=""  class=" col-form-label color-dark fs-14 fw-500 align-center">Option 4<span
                                                        style="color:red;">&nbsp;*</span></label>
                                              </div>
                                                <div class="col-md-9 p-0">
                                                    <textarea name="option_4_html" class="form-control input-full" rows="5"
                                                        id="quiz_option4_html" style="height:100px;">@if($quiz->option_format_type==1){{$quiz->option_4}}  @endif</textarea>
        
                                                        <span class="text-danger" id="error_option_4_html"></span>
        
                                                </div>
                                            </div>
        
                                            <div class="form-group row" id="text_html_5">
                                              <div class="col-sm-3 d-flex aling-items-center">
                                                <label for=""  class=" col-form-label color-dark fs-14 fw-500 align-center">Option 5<span
                                                        style="color:red;">&nbsp;*</span></label>
                                              </div>
                                                <div class="col-md-9 p-0">
                                                    <textarea name="option_5_html" class="form-control input-full" rows="5"
                                                        id="quiz_option5_html" style="height:100px;">@if($quiz->option_format_type==1){{$quiz->option_5}}  @endif</textarea>
        
                                                        <span class="text-danger" id="error_option_5_html"></span>
        
                                                </div>
                                            </div>
        
                                            <div class="form-group row" id="text_html_6">
                                              <div class="col-sm-3 d-flex aling-items-center">
                                                <label for=""  class=" col-form-label color-dark fs-14 fw-500 align-center">Option 6<span
                                                        style="color:red;">&nbsp;*</span></label>
                                              </div>
                                                <div class="col-md-9 p-0">
                                                    <textarea name="option_6_html" class="form-control input-full" rows="5"
                                                        id="quiz_option6_html" style="height:100px;">@if($quiz->option_format_type==1){{$quiz->option_6}}  @endif</textarea>
        
                                                        <span class="text-danger" id="error_option_6_html"></span>
        
                                                </div>
                                            </div>
        
        
                                        </div>
        
        
                                        <!--show for opt default-->
                                        <div id="showforoptdefault">
        
                                            <div class="form-group row" id="default_1">
                                              <div class="col-sm-3 d-flex aling-items-center">
                                                <label for=""  class=" col-form-label color-dark fs-14 fw-500 align-center">Option 1<span
                                                        style="color:red;">&nbsp;*</span></label>
                                              </div>
                                                <div class="col-md-9 p-0">
                                                    <textarea name="option_1" class="form-control input-full" rows="5"
                                                        id="quiz_option1_default" style="height:100px;">@if($quiz->option_format_type == 0){{strip_tags($quiz->option_1)}} @endif</textarea>
        
                                                        <span class="text-danger" id="error_quiz_option1_default"></span>
        
                                                </div>
                                            </div>
        
        
                                            <div class="form-group row" id="default_2">
                                              <div class="col-sm-3 d-flex aling-items-center">
                                                <label for=""  class=" col-form-label color-dark fs-14 fw-500 align-center">Option 2<span
                                                        style="color:red;">&nbsp;*</span></label>
                                              </div>
                                                <div class="col-md-9 p-0">
                                                    <textarea name="option_2" class="form-control input-full" rows="5"
                                                        id="quiz_option2_default" style="height:100px;">@if($quiz->option_format_type==0){{strip_tags($quiz->option_2)}} @endif</textarea>
                                                        <span class="text-danger" id="error_quiz_option2_default"></span>
                                                </div>
                                            </div>
        
        
                                            <div class="form-group row" id="default_3">
                                              <div class="col-sm-3 d-flex aling-items-center">
                                                <label for=""  class=" col-form-label color-dark fs-14 fw-500 align-center">Option 3<span style="color:red;">&nbsp;*</span></label>
                                              </div>
                                                <div class="col-md-9 p-0">
                                                    <textarea name="option_3" class="form-control input-full" rows="5"
                                                        id="quiz_option3_default" style="height:100px;">@if($quiz->option_format_type==0){{strip_tags($quiz->option_3)}} @endif</textarea>
        
                                                        <span class="text-danger" id="error_quiz_option3_default"></span>
        
                                                </div>
                                            </div>
        
        
                                            <div class="form-group row" id="default_4">
                                              <div class="col-sm-3 d-flex aling-items-center">
                                                <label for=""  class=" col-form-label color-dark fs-14 fw-500 align-center">Option 4<span
                                                        style="color:red;">&nbsp;*</span></label>
                                              </div>
                                                <div class="col-md-9 p-0">
                                                    <textarea name="option_4" class="form-control input-full" rows="5"
                                                        id="quiz_option4_default" style="height:100px;">@if($quiz->option_format_type==0){{strip_tags($quiz->option_4)}} @endif</textarea>
        
                                                        <span class="text-danger" id="error_quiz_option4_default"></span>
        
                                                </div>
                                            </div>
        
                                            <div class="form-group row" id="default_5">
                                              <div class="col-sm-3 d-flex aling-items-center">
                                                <label for=""  class=" col-form-label color-dark fs-14 fw-500 align-center">Option 5<span
                                                        style="color:red;">&nbsp;*</span></label>
                                              </div>
                                                <div class="col-md-9 p-0">
                                                    <textarea name="option_5" class="form-control input-full" rows="5"
                                                        id="quiz_option5_default" style="height:100px;">@if($quiz->option_format_type==0){{strip_tags($quiz->option_5)}} @endif</textarea>
        
                                                        <span class="text-danger" id="error_quiz_option5_default"></span>
        
                                                </div>
                                            </div>
        
                                            <div class="form-group row" id="default_6">
                                              <div class="col-sm-3 d-flex aling-items-center">
                                                <label for=""  class=" col-form-label color-dark fs-14 fw-500 align-center">Option 6<span
                                                        style="color:red;">&nbsp;*</span></label>
                                              </div>
                                                <div class="col-md-9 p-0">
                                                    <textarea name="option_6" class="form-control input-full" rows="5"
                                                        id="quiz_option6_default" style="height:100px;">@if($quiz->option_format_type==0){{strip_tags($quiz->option_6)}} @endif</textarea>
        
                                                        <span class="text-danger" id="error_quiz_option6_default"></span>
        
                                                </div>
                                            </div>
                                        </div>
        
        
                                        <div class="form-group row" id="div_quiz_answer">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="div_quiz_answer"  class=" col-form-label color-dark fs-14 fw-500 align-center">Answer<span
                                                    style="color:red;">&nbsp;*</span></label>
                                          </div>
                                            <div class="col-md-9 p-0">
                                                <select name="quiz_answer" class="form-control input-full" id="quiz_answer"
                                                    style="width:100%" >
        
                                                </select>
                                                <span class="text-danger" id="error_quiz_answer"></span>
                                            </div>
                                        </div>
        
                                        <div class="form-group row" id="div_quiz_hint">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="div_quiz_hint"  class=" col-form-label color-dark fs-14 fw-500 align-center">Hint</label>
                                          </div>
                                            <div class="col-md-9 p-0">
                                                <textarea name="quiz_hint" class="form-control input-full" rows="8"
                                                    id="quiz_hint" style="height:100px;width:100%;"
                                                  >{{$quiz->quiz_hint}}</textarea>
        
                                                <small class="form-text text-muted text-danger err_msg"
                                                    id="error_quiz_hint"></small>
                                            </div>
                                        </div>
        
        
                                        <div class="form-group row" id="explanation">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="div_quiz_exp"  class=" col-form-label color-dark fs-14 fw-500 align-center">Explanation</label>
                                          </div>
                                            <div class="col-md-9 p-0">
                                                <textarea name="quiz_exp" class="form-control input-full" rows="8"  id="quiz_exp" style="height:100px;width:100%;">{{$quiz->quiz_exp}} </textarea>
                                                <small class="form-text text-muted text-danger err_msg"
                                                    id="err_quiz_exp"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                          <label for="exampleInputUsername2" class=" col-form-label color-dark fs-14 fw-500 align-center">App Image Type </label>
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
                                        <div  id ='Normal_image_type' class="form-group row">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                              <label for="file" class=" col-form-label color-dark fs-14 fw-500 align-center">File Type <span style="color: #405189;padding-left:5px;">(optional)</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                              <input type="file" class="form-control ih-medium ip-light radius-xs b-light px-15" name="file" id="file" autocomplete="off">
                                          </div>
                                        </div>
                                        <div id="url_image_type" class="form-group row">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                              <label for="file_1" class=" col-form-label color-dark fs-14 fw-500 align-center">URL Image <span style="color: #405189;padding-left:5px;">(optional)</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control ih-medium ip-light radius-xs b-light px-15" accept="image/*" id="file_1" name="url_image" value="@if($quiz->image_type == 2) {{$quiz->quiz_image}} @endif" autocomplete="off">
                                          </div>
                                        </div>
                                        @if(!empty($quiz->quiz_image))
                                          <div class="form-group row ">
                                            <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="file_1" class="col-form-label color-dark fs-14 fw-500 align-center">Image Preview<span style="color:red;">&nbsp;*</span></label>
                                            </div>
                                            <div class="col-md-9">
                                              @if($quiz->image_type == 1)
                                                <img src="{{asset($quiz->quiz_image)}}" style="height:70px;width:auto;">
                                              @else
                                              <img src="{{$quiz->quiz_image}}" style="height:70px;width:auto;">
                                              @endif
                                            </div>
                                          </div>
                                        @endif
                                        <div class="form-group row">
                                          <div class="col-sm-3">
                                          </div>
                                          <div class="col-sm-9">
                                              <div class="layout-button mt-25">
                                                  <input type="button" class="btn btn-default btn-squared border-normal bg-normal px-20" onclick="window.location.href='{{url('admin/Quiz')}}'" value="Cancel">
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
  
      
      <!-- inject:js-->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- endinject-->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/editor_ckediter/ckeditor.js')}}"></script>
    <script src="{{ asset('assets/editor_ckediter/adapters/jquery.js')}}"></script>
    <script src="{{ asset('assets/editor_ckediter/styles.js')}}"></script>

      <script>
        var image = {{$quiz->image_type ?? 1}};
        test_check(image);
        function test_check(params)
        {
          if(params == "1")
          {
            $('#image_1').attr("checked",true);
            $('#image_2').attr("checked",false);
            $("#Normal_image_type").show()
            $('#url_image_type').hide();
          }
          else if(params == "2") 
          { 
            $('#image_2').attr("checked",true);
            $('#image_1').attr("checked",false);
            $("#Normal_image_type").hide()
            $('#url_image_type').show();
          }
        }
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
        var valur = {{$quiz->question_format_type ?? 1}};
        queshtml(valur);
        function queshtml(params) 
        {
            if (params == 1) 
            {
                $("#showforqueshtml").hide();
                $("#showforquesdefault").show();
                $('#showforquesImage').hide();
                $('#showforquesvideo').hide();
            } 
            else if(params == 2)
            {
              $("#showforqueshtml").show();
              $("#showforquesdefault").hide();
              $('#showforquesImage').hide();
              $('#showforquesvideo').hide();
            }
            else if(params == 3)
            { 
              $("#showforqueshtml").hide();
              $("#showforquesdefault").hide();
              $('#showforquesImage').show();
              $('#showforquesvideo').hide();
            }
            else
            {
              $("#showforqueshtml").hide();
              $("#showforquesdefault").hide();
              $('#showforquesImage').hide();
              $('#showforquesvideo').show();
            }
        }

        
      </script>
   
      
      <script>
        imgInp.onchange = evt => {
          const [file] = imgInp.files
          if (file) {
            blah.src = URL.createObjectURL(file)
          }
        }
     </script>
      <script>
          var optionsel = {{$quiz->option_count ?? 1}};
          optionlist();

          
          var option_format_type = {{$quiz->option_format_type ?? 1}};
          optionishtml();


          function optionishtml() 
          {
              var check_type_option = $('input[name="option_format_type"]:checked').val();
              if (check_type_option == 0) {

                  $("#showforoptdefault").show();
                  $("#showforopthtml").hide();


              } else {
                  $("#showforoptdefault").hide();
                  $("#showforopthtml").show();
              }


              var check_question_type = $('input[name="question_format_type"]:checked').val();
              if (check_question_type == 0) {

                  $("#showforquesdefault").show();
                  $("#showforqueshtml").hide();



              } else {

                  $("#showforquesdefault").hide();
                  $("#showforqueshtml").show();
              }


          }

          document.getElementById('showforoptdefault').style.display = 'none';

          function optionlist() 
          {
              var selValue = document.getElementById("ppl").value;
              var quiz_answer = document.getElementById("quiz_answer");


              //METHOD 2
              var selObj = document.getElementById("ppl");
              var selValue = selObj.options[selObj.selectedIndex].value;

              //default text checking
              if (selValue >= 1) 
              {
                  document.getElementById('change_option').style.display = 'flex';
                  $("#showforoptdefault").show();
                  $("#div_quiz_answer").show();
                  $("#div_quiz_hint").show();
                  $("#explanation").show();

              } 
              else {
                  document.getElementById('default_1').style.display = 'none';

              }

              if (selValue >= "2") {


                  document.getElementById('default_2').style.display = 'flex';
              } else {
                  document.getElementById('default_2').style.display = 'none';

              }

              if (selValue >= "3") {
                  document.getElementById('default_3').style.display = 'flex';
              } else {
                  document.getElementById('default_3').style.display = 'none';

              }

              if (selValue >= "4") {
                  document.getElementById('default_4').style.display = 'flex';
              } else {
                  document.getElementById('default_4').style.display = 'none';

              }
              if (selValue >= "5") {
                  document.getElementById('default_5').style.display = 'flex';
              } else {
                  document.getElementById('default_5').style.display = 'none';

              }
              if (selValue >= "6") {
                  document.getElementById('default_6').style.display = 'flex';
              } else {
                  document.getElementById('default_6').style.display = 'none';

              }

              //html text checking

              if (selValue >= "1") {

                  document.getElementById('text_html_1').style.display = 'flex';
              } else {
                  document.getElementById('text_html_1').style.display = 'none';

              }

              if (selValue >= "2") {

                  $("#text_html_2").show();

              } else {
                  $("#text_html_2").hide();


              }

              if (selValue >= "3") 
              {
                  document.getElementById('text_html_3').style.display = 'flex';
              } 
              else 
              {
                  document.getElementById('text_html_3').style.display = 'none';
              }

              if (selValue >= "4") {
                  document.getElementById('text_html_4').style.display = 'flex';
              } else {
                  document.getElementById('text_html_4').style.display = 'none';

              }
              if (selValue >= "5") {
                  document.getElementById('text_html_5').style.display = 'flex';
              } else {
                  document.getElementById('text_html_5').style.display = 'none';

              }
              if (selValue >= "6") {
                  document.getElementById('text_html_6').style.display = 'flex';
              } else {
                  document.getElementById('text_html_6').style.display = 'none';

              }





              if ($("input[id='opt_default_text']:checked").val()) 
              {
                  if (selValue >= "1") {

                      document.getElementById('default_1').style.display = 'flex';
                  } else {
                      document.getElementById('default_1').style.display = 'none';

                  }

                  if (selValue >= "2") {
                      document.getElementById('default_2').style.display = 'flex';
                  } else {
                      document.getElementById('default_2').style.display = 'none';

                  }

                  if (selValue >= "3") {
                      document.getElementById('default_3').style.display = 'flex';
                  } else {
                      document.getElementById('default_3').style.display = 'none';

                  }

                  if (selValue >= "4") {
                      document.getElementById('default_4').style.display = 'flex';
                  } else {
                      document.getElementById('default_4').style.display = 'none';

                  }
                  if (selValue >= "5") {
                      document.getElementById('default_5').style.display = 'flex';
                  } else {
                      document.getElementById('default_5').style.display = 'none';

                  }
                  if (selValue >= "6") {
                      document.getElementById('default_6').style.display = 'flex';
                  } else {
                      document.getElementById('default_6').style.display = 'none';

                  }




              } 
              else if ($("input[id='opt_html_text']:checked").val()) 
              {
                  if (selValue >= "1") {
                      $("#showforoptdefault").hide();
                      document.getElementById('text_html_1').style.display = 'flex';
                  } else {
                      document.getElementById('text_html_1').style.display = 'none';

                  }

                  if (selValue >= "2") {
                      $("#text_html_2").show();

                  } else {
                      $("#text_html_2").hide();

                  }

                  if (selValue >= "3") {
                      document.getElementById('text_html_3').style.display = 'flex';
                  } else {
                      document.getElementById('text_html_3').style.display = 'none';

                  }

                  if (selValue >= "4") {
                      document.getElementById('text_html_4').style.display = 'flex';
                  } else {
                      document.getElementById('text_html_4').style.display = 'none';

                  }
                  if (selValue >= "5") {
                      document.getElementById('text_html_5').style.display = 'flex';
                  } else {
                      document.getElementById('text_html_5').style.display = 'none';

                  }
                  if (selValue >= "6") {
                      document.getElementById('text_html_6').style.display = 'flex';
                  } else {
                      document.getElementById('text_html_6').style.display = 'none';

                  }

              }

              var set = "";
              var b ="{{$quiz->quiz_answer}}";
              set += '<option disabled >Select Option</option>';
              for (var i = 1; i <= selValue; i++) {

                  if(i == b){
                      set += '<option value="' + i + '" selected >Option ' + i +' </option>';
                  }else{
                      set += '<option value="' + i + '" >Option ' + i +' </option>';

                  }
              }

              quiz_answer.innerHTML = set;

          }
          </script>
          <script>
            $(document).ready(function() 
            {
              var check_type_on_load_html = $('input[name="question_format_type"]:checked').val();
              if (check_type_on_load_html == 2) 
              {
                  $("#showforqueshtml").show();
                  $("#showforquesdefault").hide();
                  $('#showforquesImage').hide();
                  quesishtml();

              }
              else if(check_type_on_load_html == 3)
              {
                $("#showforqueshtml").hide();
                $("#showforquesdefault").hide();
                $('#showforquesImage').show();
              }
              else
              {
                  $("#showforqueshtml").hide();
                  $("#showforquesdefault").show();
              }

              var check_type_on_load_default = $('input[name="option_format_type"]:checked').val();
              if (check_type_on_load_default == 0) 
              {

                  $("#showforoptdefault").show();
                  $("#showforopthtml").hide();

              } 
              else 
              {
                  $("#showforoptdefault").hide();
                  $("#showforopthtml").show();
                  optionishtml();
              }
            });

          var editor = CKEDITOR.replace('quiz_question_html', 
          {
              extraPlugins: 'image2,uploadimage',
              
              filebrowserUploadMethod: 'form',
              height: 200,
          });

          function quesishtml() 
          {
              var check_type = $('input[name="question_format_type"]:checked').val();
              if (check_type == 1) 
              {
                  $("#showforqueshtml").hide();
                  $("#showforquesdefault").show();
                  $('#showforquesImage').hide();
                  $('#showforquesvideo').hide();
              } 
              else if(check_type == 2)
              {
                $("#showforqueshtml").show();
                $("#showforquesdefault").hide();
                $('#showforquesImage').hide();
                $('#showforquesvideo').hide();
              }
              else if(check_type == 3)
              { 
                $("#showforqueshtml").hide();
                $("#showforquesdefault").hide();
                $('#showforquesImage').show();
                $('#showforquesvideo').hide();
              }
              else
              {
                $("#showforqueshtml").hide();
                $("#showforquesdefault").hide();
                $('#showforquesImage').hide();
                $('#showforquesvideo').show();
              }
          }


          var editor = CKEDITOR.replace('quiz_option1_html', {
              extraPlugins: 'image2,uploadimage',
              filebrowserUploadMethod: 'form',
              height: 200,

          });

          var editor = CKEDITOR.replace('quiz_option2_html', {
              extraPlugins: 'image2,uploadimage',
              
              filebrowserUploadMethod: 'form',
              height: 200,

          });

          var editor = CKEDITOR.replace('quiz_option3_html', {
              extraPlugins: 'image2,uploadimage',
              
              filebrowserUploadMethod: 'form',
              height: 200,

          });

          var editor = CKEDITOR.replace('quiz_option4_html', {
              extraPlugins: 'image2,uploadimage',
              
              filebrowserUploadMethod: 'form',
              height: 200,

          });
          var editor = CKEDITOR.replace('quiz_option5_html', {
              extraPlugins: 'image2,uploadimage',
              
              filebrowserUploadMethod: 'form',
              height: 200,

          });

          var editor = CKEDITOR.replace('quiz_option6_html', {
              extraPlugins: 'image2,uploadimage',
              
              filebrowserUploadMethod: 'form',
              height: 200,

          });



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


          function optionishtml() {
              var check_type_option = $('input[name="option_format_type"]:checked').val();
              if (check_type_option == 0) {

                  $("#showforoptdefault").show();
                  $("#showforopthtml").hide();
              } else {
                  $("#showforoptdefault").hide();
                  $("#showforopthtml").show();
              }

          }
      </script>
      <script>
        const myTimeout = setTimeout(myGreeting, 5000);
        function myGreeting() {
            $('#demo').hide();
          }
      </script> 

  </body>
  
  </html>