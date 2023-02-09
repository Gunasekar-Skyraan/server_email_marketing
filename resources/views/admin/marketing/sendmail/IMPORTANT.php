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
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="card card-horizontal card-default card-md mb-4">
                            <div class="card-header">
                                <h6>Compose Email</h6>
                            </div>
                            <div class="card-body py-md-30">
                                <div class="horizontal-form">
                                    <form  action="{{url('admin/')}}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      <div class="form-group row">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                          <label for="select-alerts2" class=" col-form-label color-dark fs-14 fw-500 align-center">Template Category<span style="color:red;">&nbsp;*</span></label>
                                        </div>
                                        <div class="col-sm-9">
                                          <div class="select-style2">
                                            <div class="atbd-select ">
                                              <select name="select-alerts2" id="category" class="form-control">
                                                  <option class="text-dark" value="" >Select a Template Category *</option>
                                                  @foreach($category as $category)
                                                    <option class="text-dark" value="{{$category->id}}">{{$category->temp_category_name}}</option>
                                                  @endforeach
                                              </select>
                                            </div>
                                          </div>                                            
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                          <label for="select-search" class="col-form-label color-dark fs-14 fw-500 align-center">Template<span style="color:red;">&nbsp;*</span></label>
                                        </div>
                                        <div class="col-sm-9">
                                          <div class="select-style2">
                                            <div class="atbd-select ">
                                                <select name="subcategory" id="subcategory" class="form-control">                                         
                                                </select>
                                            </div>
                                          </div>                                            
                                        </div>
                                      </div>

                                      <div class="form-group row" id="YesOrNo">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                          <label for="select-search" class="col-form-label color-dark fs-14 fw-500 align-center">Template Use<span style="color:red;">&nbsp;*</span></label>
                                        </div>
                                        <div class="col-sm-9">
                                          <div class="atbd-switch-wrap d-flex align-items-center">
                                            <div class="custom-control custom-switch switch-primary switch-md ">
                                                <input type="checkbox" class="custom-control-input" id="switch-s2" value="0" checked>
                                                <label class="custom-control-label" for="switch-s2"></label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div id="showforquesvideo">
                                        <div class="form-group row">  
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="quiz_question_default_image"  class="col-form-label color-dark fs-14 fw-500 align-center">Template Subject<span style="color:red;">&nbsp;*</span></label>
                                          </div>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control ih-medium ip-light radius-xs b-light px-15"  id="quiz_question_default_image" name="subject" value="{{old('Subject')}}" placeholder="Template Subject" autocomplete="off">
                                          </div>
                                        </div>

                                        <div id="form-text" class="form-group row mb-3">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="html_desc" class="col-form-label color-dark fs-14 fw-500 align-center">Template Body HTML type <span style="color:red;">&nbsp;*</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                              <textarea class="form-control" placeholder="Leave a comment here"  id="html_desc" name="ques_desc_2" style="height: 100px;"></textarea>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group row" id="div_quiz_question">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                          <label class="col-form-label color-dark fs-14 fw-500 align-center" for="quiz_question">Category Format type : </label>
                                        </div>
                                        <div style="display: contents;" class="col-md-9 align-items-center d-inline-flex">
                                          <div class="form-inline">
                                            <input type="radio" name="question_format_type" class="quest_text_type" value="1" id="ques_default_text" onchange="quesishtml()" checked>
                                              <label class="pr-3 pl-1" for="ques_default_text">All</label>
                                            {{-- <input type="radio" name="question_format_type" class="quest_text_type" value="2" id="ques_html_text" onchange="quesishtml()">
                                              <label class="pr-3 pl-1" for="ques_html_text">Category</label>
                                            <span class="text-danger"  id="question_format_type_error"></span>
                                            <input type="radio" name="question_format_type" class="quest_text_type" value="3" id="ques_default_text_3" onchange="quesishtml()">
                                              <label class="pr-3 pl-1" for="ques_default_text_3">Category WIth SubCategory</label> --}}
                                          </div>
                                        </div>
                                      </div>

                                      {{-- <div id="all"> --}}
                                        <div class="form-group row mb-3">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="html_desc" class="col-form-label color-dark fs-14 fw-500 align-center">Category <span style="color:red;">&nbsp;*</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                            <select name="basic[]" multiple="multiple" class="3col active" id="multiple">
                                              @foreach($emailcategory as $row)
                                                <option class="text-dark" value="{{$row->id}}">{{$row->category_name}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                        </div>
                                      {{-- </div> --}}

                                      {{-- <div id="category_select">
                                        <div class="form-group row mb-3">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="html_desc" class="col-form-label color-dark fs-14 fw-500 align-center">Category <span style="color:red;">&nbsp;*</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                            <select class="form-control js-example-basic-multiple" id="multiple" name="category_name[]" multiple="multiple" required>
                                              <option class="text-dark" value="">Select a Category *</option>
                                              <optgroup label="Availble Categories">
                                                @foreach($emailcategory as $row)
                                                  <option class="text-dark" value="{{$row->id}}">{{$row->category_name}}</option>
                                                @endforeach
                                              </optgroup>
                                            </select>
                                          </div>
                                        </div>
                                      </div> --}}
                                      <input type="hidden" name="hidden[]" id="hidden">
                                      <input type="hidden" name="last[]" id="last">
                                      <div class="modal-basic modal fade" id="staticBackdrop2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content modal-bg-white ">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Sub Category</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="form-group row">
                                                    <div class="col-sm-3 d-flex aling-items-center">
                                                      <label for="select-search" class="col-form-label color-dark fs-14 fw-500 align-center">Sub Category<span style="color:red;">&nbsp;*</span></label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                      <div class="select-style2">
                                                        <div class="atbd-select">
                                                            <select name="sub_category_id[]" multiple="multiple" required id="template_sub_category" class="form-control js-example-basic-multiple">                                         
                                                            </select>
                                                        </div>
                                                      </div>                                            
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary btn-sm" id="savechanges">Save changes</button>
                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      {{-- <div id="category_sub_select">
                                        <div class="form-group row mb-3">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="category_with_value" class="col-form-label color-dark fs-14 fw-500 align-center">Category <span style="color:red;">&nbsp;*</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                            <select class="form-control ih-medium ip-light radius-xs b-light px-15 js-example-basic-single" name="category_with_value" id="category_with_value">
                                              <option class="text-dark" value="">Select a Category *</option>
                                              <optgroup label="Availble Categories">
                                                @foreach($emailcategory as $row_2)
                                                  <option class="text-dark" value="{{$row_2->id}}">{{$row_2->category_name}}</option>
                                                 @endforeach
                                              </optgroup>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group row">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="select-search" class="col-form-label color-dark fs-14 fw-500 align-center">Sub Category<span style="color:red;">&nbsp;*</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                            <div class="select-style2">
                                              <div class="atbd-select">
                                                  <select name="sub_category_id" id="select-search" class="form-control">                                         
                                                  </select>
                                              </div>
                                            </div>                                            
                                          </div>
                                        </div>
                                      </div> --}}


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
          <script src="{{ asset('assets/js/main.js')}}"></script>
          <script src="{{ asset('assets/editor_ckediter/ckeditor.js')}}"></script>
          <script src="{{ asset('assets/editor_ckediter/adapters/jquery.js')}}"></script>
          <script src="{{ asset('assets/editor_ckediter/styles.js')}}"></script>
          <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
          {{-- <link rel="stylesheet" href="{{asset('css/multi-select.css')}}" type="text/css" />
          <script src="{{asset('css/jquery.multi-select.js')}}"></script>
          <script src="{{asset('css/jquery.quicksearch.js')}}"></script>           --}}
          <script src="{{asset('css/multiselect/jquery.multiselect.js')}}"></script>
          <link rel="stylesheet" href="{{asset('css/multiselect/jquery.multiselect.css')}}">
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
              let id = $(this).val();
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
                  data: {template_sub_category: id},
              success:function(data) 
              {
                $('#template_sub_category').empty();
                var data = data.template_sub_category;
                if(data.length > 0)
                {
                  $('#template_sub_category').append('<option class="text-dark" value="">Select a Sub Category*</option>');
                  $.each(data,function(index,template_sub_category)
                  {
                    var name = $('#hidden').val();
                    // if(name.length != 0)
                    // {
                      $('#template_sub_category').append('<option class="text-dark" selected value="'+template_sub_category.id+'">'+template_sub_category.sub_category_name+'</option>');
                    // }
                    // else
                    // {
                    //   if($.inArray(template_sub_category.id,name))
                    //   {
                    //     $('#template_sub_category').append('<option class="text-dark" value="'+template_sub_category.id+'>'+template_sub_category.sub_category_name+'</option>');
                    //   }
                    //   else
                    //   {
                    //     $('#template_sub_category').append('<option class="text-dark" value="'+template_sub_category.id+'" selected>'+template_sub_category.sub_category_name+'</option>');
                    //   }
                    // }
                  })
                }
              }
            })
            });
            $('#savechanges').on('click',function(){
              jQuery.noConflict();
              $('#staticBackdrop2').modal('hide');
              var sun = $('#template_sub_category').val();
              var sub = $('#hidden').val();
              if(sub.length == 0)
              {
                $('#hidden').val(sun);
              }
              else
              {
                var result = sub+','+sun;
                $('#hidden').val(sub+','+sun);
              }

              $('#last').val($('#multiple').val());
            });
          </script>
          
          <script>
            $('#showforquesvideo').hide();
            $('#subcategory').on('change',function() 
            {
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
                          $('#showforquesvideo').show();
                          $('#quiz_question_default_image').val(subcategory.template_subject);
                          editor.setData(subcategory.template_body);
                        }
                        else
                        {
                          $('#showforquesvideo').show();
                          $('#quiz_question_default_image').val('');
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
                    $('#subcategory').append('<option class="text-dark" value="" selected>Select a Template*</option>');
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
                        else{
                          $('#showforquesvideo').show();
                          editor.setData('');
                          alert('Please Select a SubCategory');
                        }
                    });
                  }
              }
            })
            });
          </script>
          <script>
            $('#category_select').hide();
            $('#all').hide();
            $('#category_sub_select').hide();
            $('#div_quiz_question').hide();
            function quesishtml() 
            {
                var check_type = $('input[name="question_format_type"]:checked').val();
                if (check_type == 1) 
                {
                  $("#all").show();
                  $('#category_select').hide();
                  $('#category_sub_select').hide();
                } 
                else if(check_type == 2)
                {
                  $("#all").hide();
                  $('#category_select').show();
                  $('#category_sub_select').hide();
                }
                else if(check_type == 3)
                { 
                  $("#all").hide();
                  $('#category_select').hide();
                  $('#category_sub_select').show();
                }
            }
          </script>
          <script>
            $('#category_with_value').on('change',function() {
              let id = $(this).val();
              $.ajaxSetup({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
              });
              $.ajax({
                  url:"{{url('admin/select_subcat')}}",
                  type:"POST",
                  data: {cat_id: id},
                  success:function(data) 
                  {
                      $('#select-search').empty();
                      var data = data.subcategories_list;
                      if(data.length > 0)
                      {
                        $('#select-search').attr('required');
                        $('#select-search').append('<option class="text-dark" value="" selected>Select a Sub-Category*</option>');
                        $.each(data,function(index,subcategory_list)
                        {
                            $('#select-search').append('<option class="text-dark" value="'+subcategory_list.id+'">'+subcategory_list.sub_category_name+'</option>');
                        });
                      }
                      else
                      {
                        $('#select-search').append('<option class="text-dark" value="0">None</option>');
                      }
                  }
                })
              });
          </script>






          <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
          </script>
          <script>
            $(document).ready(function() {

              $('.dev_mysel').multiSelect(
                {
                  selectableHeader: "<input type='text' class='search-input  form-control w-100' autocomplete='off' placeholder='Search...'>",
                  selectionHeader: "<input type='text' class='search-input  form-control w-100' autocomplete='off' placeholder='Search...'>",

                  afterInit: function(ms) {
                      var that = this,
                          $selectableSearch = that.$selectableUl.prev(),
                          $selectionSearch = that.$selectionUl.prev(),
                          selectableSearchString = '#' + that.$container.attr('id') +
                          ' .ms-elem-selectable:not(.ms-selected)',
                          selectionSearchString = '#' + that.$container.attr('id') +
                          ' .ms-elem-selection.ms-selected';


                      that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                          .on('keydown', function(e) {
                              if (e.which === 40) {
                                  that.$selectableUl.focus();
                                  return false;
                              }
                          });

                      that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                          .on('keydown', function(e) {
                              if (e.which == 40) {
                                  that.$selectionUl.focus();
                                  return false;
                              }
                          });
                  },
                  afterSelect: function() {
                      this.qs1.cache();
                      this.qs2.cache();
                  },
                  afterDeselect: function() {
                      this.qs1.cache();
                      this.qs2.cache();
                  }
              });


              $('#dev_select-all').click(function() {
                  $('.dev_mysel').multiSelect('select_all');
                  return false;
              });
              $('#dev_deselect-all').click(function() {
                  $('.dev_mysel').multiSelect('deselect_all');
                  return false;
              });


              });
              $(document).ready(function() 
              {
                $('.tester_mysel').multiSelect({

                    selectableHeader: "<input type='text' class='search-input  form-control w-100' autocomplete='off' placeholder='Search...'>",
                    selectionHeader: "<input type='text' class='search-input  form-control w-100' autocomplete='off' placeholder='Search...'>",

                    afterInit: function(ms) {
                        var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') +
                            ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') +
                            ' .ms-elem-selection.ms-selected';


                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function(e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function(e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                    },
                    afterSelect: function() {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function() {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });

                //  $('.mysel2').multiSelect('select_all');


                $('#tester_select-all').click(function() {
                    $('.tester_mysel').multiSelect('select_all');
                    return false;
                });
                $('#tester_deselect-all').click(function() {
                    $('.tester_mysel').multiSelect('deselect_all');
                    return false;
                });


                });

          </script>
          <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2(); 
            });

            $(document).ready(function() 
            {
                $('#template_sub_category').select2({dropdownParent: $('#staticBackdrop2')});
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












    function insert_email(Request $request)
    {
        $request->validate([
            'sender_email' => 'required',
            'category_id'=>'required',
        ]);

        if(!empty($request->category_id))
        {
            $category_id = implode(',',$request->category_id);
        }

        if(!empty($request->sub_category_id))
        {
            $sub_category_id = implode(',',$request->sub_category_id);
        }

        $user = new SendEmail;
        $user->sender_email = $request->sender_email;
        $user->template_category_id = $request->template_category;

        $user->template_id = $request->template_id; 
        $user->maerketing_name = $request->subject;

        $user->maerketing_short_description = $request->template_body;
        $user->user_count = $request->hidden_user_count;


        $user->category_id	= $category_id;
        $user->sub_category_id	= $sub_category_id;
        $user->user_id = $request->user_count[0];

        $user->filter_age = $request->filter_age;
        $user->filter_gender = $request->filter_gender;
        $user->filter_country= $request->filter_country;
        $user->filter_state= $request->filter_state;
        
        $user->filter_city = $request->filter_city;
        $user->filter_type = $request->check_filter_type ?? '0';


        require base_path("vendor/autoload.php");

        $source = SourceEmail::where('email_id',$request->sender_email)->first();

        $mail = new PHPMailer(true);    

        try 
        {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = $source->mail_host;
            $mail->SMTPAuth = true;
            $mail->Username = $source->user_name;
            $mail->Password = $source->password;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
 
            $mail->setFrom($request->sender_email);

            $explode = implode(',',$request->user_count);
            $implode = explode(',',$explode);
            $EmailUser = EmailUser::whereIn('id',$implode)->get();

            foreach($EmailUser as $all)
            {
                $mail->addBCC($all->user_email);
            }
            
            $mail->isHTML(true);
 
            $mail->Subject = $request->subject;
            $mail->Body = $request->template_body;
            
            if($mail->send()) 
            {
                LogActivity::addToLog();
                $user->save();
                return back()->with('message','Mail Send Successfullyyyy');
            }
            else
            {
                return back()->with("error", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
        } 
        catch (phpmailerException $e) 
        {
            return back()->with("error", $e->errorMessage());
        } 
        catch (Exception $e)
        {   
            $string = $e->getMessage();
            $test_patt = "/(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
            
            $check_if_email = preg_match_all($test_patt, $string, $matches);


            $allemails = implode(',',$matches[0]);    
            $alldsjn = explode(',',$allemails);
            $bounced = new BounsedEmail;
            $bounced->bounced_email = $alldsjn[0];
            $bounced->user_id = $all->id;
            $bounced->bounced = 1;
            $bounced->reason_message = $e->getMessage();
            $bounced->save();
            
            LogActivity::addToLog();
            $user->save();
            return back()->with('message','Mail Send Successfully');
        }
    }














    <!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Marketing - Inbox list</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- inject:css-->
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.css" rel="stylesheet"/>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.js"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script> --}}



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

    <!-- endinject -->
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
                                    <a href="{{url('admin/send_emails_list')}}">
                                      <span class="la la-home"></span>
                                    </a>
                                    <span class="breadcrumb__seperator">
                                      <span class="la la-slash"></span>
                                  </span>
                                </li>
                                <li class="atbd-breadcrumb__item">
                                    <a href="{{url('admin/send_emails_list')}}">
                                        Home
                                    </a>
                                    <span class="breadcrumb__seperator">
                                        <span class="la la-slash"></span>
                                    </span>
                                </li>
                                <li class="atbd-breadcrumb__item">
                                    <span>Inbox</span>
                                </li>
                              </ul>
                              <div class="action-btn">
                                <a href="{{url('admin/send_emails')}}" class="btn btn-sm btn-primary btn-add">
                                  <i class="la la-plus"></i> Compose</a>
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
                            Inbox
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
                                                    <span class="userDatatable-title">S No</span>
                                                  </th>
                                                  <th>
                                                      <span class="userDatatable-title">Template Category Name</span>
                                                  </th>
                                                  <th>
                                                      <span class="userDatatable-title">Template Name</span>
                                                  </th>
                                                  <th>
                                                    <span class="userDatatable-title">Total Emails</span>
                                                  </th>
                                                  <th>
                                                    <span class="userDatatable-title">Success Emails</span>
                                                  </th>
                                                  <th>
                                                    <span class="userDatatable-title">Bounced Count</span>
                                                  </th>
                                                  <th>
                                                      <span class="userDatatable-title">Created </span>
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
                                            @php $sno = 1;@endphp
                                            @foreach($SendEmail as $sub_category)
                                              <tr>
                                                  <td>
                                                      <div class="d-flex">
                                                          <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                              <div class="checkbox-group-wrapper">
                                                                  <div class="checkbox-group d-flex">
                                                                      <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                          <input class="checkbox" type="checkbox" id="check-grp-{{$sub_category->id}}">
                                                                          <label for="check-grp-{{$sub_category->id}}"></label>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </td>
                                                  <td>
                                                    <div class="userDatatable-inline-title">
                                                      {{$sno}}
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <div class="userDatatable-inline-title">
                                                      <a href="#" class="text-dark fw-500">
                                                          <h6>{{$sub_category->template_category->temp_category_name ?? 'none'}}</h6>
                                                      </a>
                                                  </div>
                                                  </td>
                                                  <td>
                                                      <div class="userDatatable-content">
                                                        {{$sub_category->template->template_name ?? 'none'}}
                                                      </div>
                                                  </td>
                                                  <td>
                                                    <div class="userDatatable-content">
                                                      {{$sub_category->user_count}}
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <div class="userDatatable-content">
                                                      {{$sub_category->user_count - $sub_category->get_mapped_cat_count->count();}}
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <div class="btn-group">
                                                      <div class="userDatatable-content d-inline-block" >
                                                        {{ $sub_category->get_mapped_cat_count->count();}} 
                                                      </div>
                                                      <div style="padding-left:10px;">
                                                        <button value="{{$sub_category->id}}" type="button" class="bg-opacity-success color-success rounded-pill userDatatable-content-status active use-address" data-toggle="modal" data-target="#staticBackdrop2">view</button>
                                                        {{-- <button  class="bg-opacity-success color-success rounded-pill userDatatable-content-status active use-address" style="border:0" id="view">View</button> --}}
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                      <div class="userDatatable-content">
                                                         {{date('d-m-Y', strtotime($sub_category->created_at))}}
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="userDatatable-content d-inline-block">
                                                        @if($sub_category->is_active == '0')
                                                          <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                                        @else
                                                        <span class="bg-opacity-warning  color-warning rounded-pill userDatatable-content-status active">deactivete</span>
                                                        @endif
                                                      </div>
                                                  </td>
                                                  <td>
                                                    <div class="dropdown dropdown-click" style="padding-left: 25px;">
                                                      <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                          <span data-feather="more-vertical"></span>
                                                      </button>
                                                      <div class="dropdown-default dropdown-menu bg-dark">
                                                          <div class="dropdown-item" style="padding-left:55px !important;"><form action={{url("admin/edit_send_emails/".$sub_category->id)}} method="POST">
                                                            {{csrf_field()}}
                                                            <button  type="submit" class="btn btn-icon btn-circle btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit App"><span data-feather="edit"></span></button>
                                                            </form>
                                                          </div>
                                                          <div class="dropdown-item" style="padding-left:50px !important;"><form action={{url("admin/delete_send_emails/".$sub_category->id)}} method="POST"  style="padding-left:5px;">
                                                            {{csrf_field()}}
                                                            <button  type="submit" class="btn btn-icon btn-circle btn-outline-danger" onclick="return confirm('Are you sure you want to delete this item?');" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete App"><span data-feather="trash-2"></span></button>
                                                          </form></div>
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
                                                    <form action="{{url('admin/sub_category_status_update')}}" method="POST">
                                                      @csrf
                                                      <input type="hidden" name="sub_cat_id" value="{{$sub_category->id}}">
                                                      @if($sub_category->is_active == '0')
                                                          <input type="hidden" name="status" value="0">
                                                          <button type="submit" data-toggle="tooltip"  data-original-title="Enable" id="enable" name="enable" title="" class="btn_status btn-success enable">
                                                              <i class="mdi mdi-check"></i>Enabled
                                                          </button>
                                                      @else
                                                          <input type="hidden" name="status" value="1">
                                                          <button type="submit" data-toggle="tooltip" data-original-title="Disable" id="disable" title="" name="disable" class="btn_status btn-success"style="background: #ffad46!important;border-color: #ffad46!important;color: #fff!important;">
                                                            <i class="mdi mdi-discord"></i>Disabled
                                                          </button>
                                                      @endif
                                                    </form>
                                                  </td>
                                              </tr>
                                              @php $sno++; @endphp
                                              @endforeach
                                          </tbody>
                                      </table>
                                      <div class="modal-basic modal fade" id="staticBackdrop2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content modal-bg-white ">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Bounced Email List</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                                </div>
                                                <style>
                                                  .select2-container{
                                                    z-index: 999999;
                                                  }
                                                </style>
                                                <form action="{{url('admin/blocked')}}" method="post" enctype="multipart/form-data">
                                                  @csrf
                                                  <div class="modal-body">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12" style="margin-top:10px;">
                                                          <select class="selectpicker form-control" id="mySelect" multiple>
                                                            {{-- <option title="Option 1">option one</option>
                                                            <option title="Option 2">option two</option>
                                                            <option  title="Option 3">Option three</option>
                                                            <option title="Option 4">Option four</option> --}}
                                                          </select>
                                                          <p id="tooltipBox" class="col-sm-6" style="z-index:9999;"></p>
                                                        </div>
                                                    </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="submit" class="btn btn-primary btn-sm" id="savechanges">Save changes</button>
                                                      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
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
            </div>
        </div>
        
        <div class="message-wrapper"></div>
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
    

    
    <script>
      $(".selectpicker").selectpicker()
        var title = [];
        $('#mySelect option').each(function(){
            title.push($(this).attr('title'));
        });

        $("ul.selectpicker li").each(function(i){
          $(this).attr('title',title[i]).tooltip({container:"#tooltipBox"});
        })
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
      $('.use-address').on('click',function(){
                // $('#staticBackdrop2').modal('show');
        var id = $(this).val();
        var $select = $('#mySelect');
        alert(id);
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url:"{{url('admin/block_list_count')}}",
          type:"POST",
          data: {block_id: id},
          success:function(data) 
          {
              $('#mySelect').empty();
              var data = data.subcategories;
              if(data.length > 0)
              {
                $.each(data,function(index,template_sub_category)
                {
                  $(".selectpicker").append('<option class="text-dark" value="'+template_sub_category.user_id+'" title="'+template_sub_category.reason_message+'">'+template_sub_category.bounced_email+'</option>');
                });
                $('.selectpicker').selectpicker('refresh');
              }
            }
          })
      });
    </script>

    <!-- endinject-->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    
    <script>
      $(document).ready(function() {
          $('.js-example-basic-multiple').select2({
            placeholder: {
                text: 'Select a Email'
              },
          }); 
      });
    </script>
    <!-- End custom js for this page -->
    <script>
      $(document).ready( function () {
          $('#members_list').DataTable();
      } );

      const myTimeout = setTimeout(myGreeting, 3000);
      function myGreeting() {
          $('#demo').hide();
        }
    </script>
</body>

</html>























        $input = $this->mail_data['subject']; 

        $semd = SendEmail::find($this->mail_data['subject']);

        require base_path("vendor/autoload.php");

        $source = SourceEmail::where('email_id',$semd->sender_email)->first();

        $mail = new PHPMailer(true);    
        try
        {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = $source->mail_host;
            $mail->SMTPAuth = true;
            $mail->Username = $source->user_name;
            $mail->Password = $source->password;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom($semd->sender_email);

            if($semd->new_user_type	 == 2)
            {
                $explode = explode(',',$semd->new_user);

                foreach($explode as $roes)
                {
                    $mail->AddBCC($roes);
                }
            }

            if($semd->new_user_type	 == 1)
            {
                $implode = explode(',',$semd->user_id);
                $EmailUser = EmailUser::whereIn('id',$implode)->pluck('user_email')->toArray();
                foreach($EmailUser as $row)
                {
                    $mail->AddBCC($row);
                }
            }
            
            $mail->isHTML(true);

            $mail->Subject = $semd->maerketing_name;
            $mail->Body = $semd->maerketing_short_description;
            
            if($mail->send()) 
            {
                $mail_processing = SendEmail::find($this->mail_data['subject'])->update(['mail_processing' => 2]);
                dd('Mail Send Successfullyyyy');
            }
            else
            {
                return back()->with("error", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
        } 
        catch (\phpmailerException $e) 
        {
            dd($e->getMessage());
            return back()->with("error", $e->getMessage());
        }
        catch (\Exception $e)
        {
            $string = $e->getMessage();

            $explode = explode(':',$string);

            unset($explode[0],$explode[1],$explode[2]); 

            $array = array_values($explode);

            $test_patt = "/(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
            
            $check_if_email = preg_match_all($test_patt, $string, $matches);

            if($check_if_email > 0)
            {
                $allemails = implode(',',$matches[0]);
                $alldsjn = explode(',',$allemails);

                $unique_email = array_unique($alldsjn);
                $unique_email = array_values($unique_email);

                foreach($unique_email as $key => $bounced_emails)
                {
                    $BounsedEmail = BounsedEmail::where('bounced_email',$bounced_emails)->count();
                    $EmailUser = EmailUser::where('user_email',$bounced_emails)->first();
                    if($BounsedEmail > 2)
                    {
                        $EmailUer = EmailUser::where('user_email',$bounced_emails)->first();
                        $EmailUer->block = 2;
                        $EmailUer->save();
                    }
                    $bounced = new BounsedEmail;
                    $bounced->bounced_email = $bounced_emails;
                    $bounced->user_id = $EmailUser->id ?? '1';
                    $bounced->bounced = $BounsedEmail + 1;
                    $bounced->send_email_id = $this->mail_data['subject'];
                    $bounced->reason_message = $string;
                    $bounced->save();
                    $mail_processing = SendEmail::find($this->mail_data['subject'])->update(['mail_processing' => 2]);

                }
                dd('message','Mail Send Successfully');
            }
            else
            {
                dd('message','Mail Send Successfully mugaam');
            }
        }