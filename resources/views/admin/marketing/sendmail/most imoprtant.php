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
                                            <input type="radio" name="question_format_type" class="quest_text_type" value="2" id="ques_html_text" onchange="quesishtml()">
                                              <label class="pr-3 pl-1" for="ques_html_text">Category</label>
                                            <span class="text-danger"  id="question_format_type_error"></span>
                                            <input type="radio" name="question_format_type" class="quest_text_type" value="3" id="ques_default_text_3" onchange="quesishtml()">
                                              <label class="pr-3 pl-1" for="ques_default_text_3">Category WIth SubCategory</label>
                                          </div>
                                        </div>
                                      </div>

                                      <div id="all">
                                        <div class="form-group row mb-3">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="html_desc" class="col-form-label color-dark fs-14 fw-500 align-center">Category <span style="color:red;">&nbsp;*</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                            <label class="form-control control-label" for="description" style="display:flow-root;"><a href='#'
                                              id='dev_select-all'>Select All</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#'
                                              id='dev_deselect-all'>Deselect All</a></label>
                                              <select name="category_id[]" class="form-control dev_mysel" id="category_id" multiple>
                                                @foreach($emailcategory as $row)
                                                    <option class="text-dark" value="{{$row->id}}">{{$row->category_name}}</option>
                                                @endforeach
                                              </select> 
                                          </div>
                                        </div>
                                      </div>

                                      <div id="category_select">
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
                                      </div>
                                      <input type="text" name="hidden[]" id="hidden">
                                      <input type="text" name="last[]" id="last">
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
                                      <div id="category_sub_select">
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
                                      </div>


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
          <link rel="stylesheet" href="{{asset('css/multi-select.css')}}" type="text/css" />
          <script src="{{asset('css/jquery.multi-select.js')}}"></script>
          <script src="{{asset('css/jquery.quicksearch.js')}}"></script>          
          <script>
            $('#multiple').on('change',function()
            {
              let id = $(this).val();
              // alert(id);
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
                    if(name.length == 0)
                    {
                      $('#template_sub_category').append('<option class="text-dark" value="'+template_sub_category.id+'">'+template_sub_category.sub_category_name+'</option>');
                    }
                    else
                    {
                      if($.inArray(name,template_sub_category.id))
                      {
                        // alert($.inArray(name,template_sub_category.id));
                        $('#template_sub_category').append('<option class="text-dark" value="'+template_sub_category.id+'"'+(template_sub_category.id == name ? 'selected' : '')+'>'+template_sub_category.sub_category_name+'</option>');
                      }
                      else
                      {
                        $('#template_sub_category').append('<option class="text-dark" value="'+template_sub_category.id+'">'+template_sub_category.sub_category_name+'</option>');
                      }
                    }
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
              $('#last').val($('#template_sub_category').val());
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





    ///jfshkhf
    

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

                                      <div class="form-group row mb-3">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                          <label for="html_desc" class="col-form-label color-dark fs-14 fw-500 align-center">Category <span style="color:red;">&nbsp;*</span></label>
                                        </div>
                                        <div class="col-sm-5">
                                          <select name="basic" multiple="multiple" class="3col active ms-active" id="multiple" >
                                            @foreach($emailcategory as $row)
                                              <option class="text-dark" value="{{$row->id}}">{{$row->category_name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        <div class="col-sm-4">
                                          
                                          <div class="select-style2">
                                            <div class="atbd-select">
                                              <select name="sub_category_id[]" multiple="multiple" id="select-search" class="form-control">                                         
                                              </select>
                                              <div class="row" style="padding-top:10px;padding-left:15px;">
                                                <button type="button" class="btn btn-primary btn-sm" id="savechanges">Save changes</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    <input type="text" name="hidden[]" id="hidden">
                                    <input type="text" name="last[]" id="last">
                                    <input type="text" name="user_id" id="user_id">

                                      {{-- <div id="all"> --}}
                                        {{-- <div class="form-group row mb-3">
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
                                        </div> --}}
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
                                      {{-- <input type="hidden" name="hidden[]" id="hidden">
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
                                      </div> --}}
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
                  $('#last').val('');
                  $('#hidden').val('');
                  $('#select-search option:selected').remove();
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
                    data: {template_sub_category:id ?? last_id},
                    success:function(data) 
                    {
                      $('#select-search').empty();
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
                        $('#user_id').val(data.users);
                        $('#select-search').append('<option class="text-dark" value="">Select a Sub Category*</option>');
                        $.each(template,function(index,template_sub_category)
                        {
                          $('#select-search').append('<option class="text-dark" selected value="'+template_sub_category.id+'">'+template_sub_category.sub_category_name+'</option>');
                        })
                      }
                    }
                })
              }
            });
            
            $('#savechanges').on('click',function(){
              var mame = $('#select-search').val();
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
                var sun = $('#select-search').val();
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