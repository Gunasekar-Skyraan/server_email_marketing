<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Marketing - Edit template</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">


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
                                    <a href="{{url('admin/template_list')}}">
                                      <span class="la la-home"></span>
                                    </a>
                                    <span class="breadcrumb__seperator">
                                      <span class="la la-slash"></span>
                                  </span>
                                </li>
                                <li class="atbd-breadcrumb__item">
                                    <a href="{{url('admin/template_list')}}">
                                        Home
                                    </a>
                                    <span class="breadcrumb__seperator">
                                        <span class="la la-slash"></span>
                                    </span>
                                </li>
                                <li class="atbd-breadcrumb__item">
                                    <span>Edit template</span>
                                </li>
                              </ul>
                            </div>
                        </div>
                    </div>    
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="card card-horizontal card-default card-md mb-4">
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
                            <div class="card-header">
                                <h6>Edit template Form</h6>
                            </div>
                            <div class="card-body py-md-30">
                                <div class="horizontal-form">
                                  @foreach ($edit_category_id as $edit_category_id)
                                    <form action="{{url('admin/edit_template_list/'.$edit_category_id->id)}}" method="POST" enctype="multipart/form-data">
                                      @csrf

                                      <div class="form-group row">
                                        <div class="col-sm-3 d-flex aling-items-center">
                                          <label for="select-alerts2" class=" col-form-label color-dark fs-14 fw-500 align-center">Category<span style="color:red;">&nbsp;*</span></label>
                                        </div>
                                        <div class="col-sm-9">
                                          <div class="select-style2">
                                            <div class="atbd-select ">
                                                <select name="category_id" id="category" class="form-control ">
                                                  <optgroup label="Selected Categories">  
                                                    <option class="text-dark" value="{{$edit_category_id->category->id}}"selected>{{$edit_category_id->category->temp_category_name}}</option>
                                                  </optgroup>  
                                                  <optgroup label="Available Categories">
                                                    @foreach($category_list as $category)
                                                      @if($category->id !== $edit_category_id->category->id)
                                                          <option class="text-dark" value="{{$category->id}}">{{$category->temp_category_name}}</option>
                                                      @endif
                                                    @endforeach
                                                  </optgroup>
                                                </select>
                                            </div>
                                          </div>                                            
                                        </div>
                                      </div>
                                      <input type="hidden" id="empty" name="empty">
                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex aling-items-center">
                                                <label for="random_name" class="col-form-label color-dark fs-14 fw-500 align-center">Template Name <span style="color:red;">&nbsp;*</span></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control ih-medium ip-light radius-xs b-light px-15" id="random_name" name="category_name" value="{{$edit_category_id->template_name}}" placeholder="Template name" autocomplete="off">
                                            </div>
                                            <div class="col-sm-3">
                                              <input id="clickMe" class="btn btn-primary btn-md" type="button" value="Generate Random Name" onclick="generateName();" />
                                            </div>
                                        </div>

                                        <div class="form-group row">  
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="quiz_question_default_image"  class=" col-form-label color-dark fs-14 fw-500 align-center">Template Subject<span style="color:red;">&nbsp;*</span></label>
                                          </div>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control ih-medium ip-light radius-xs b-light px-15"  id="quiz_question_default_image" name="subject" value="{{$edit_category_id->template_subject}}" placeholder="Template Subject" autocomplete="off">
                                          </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="exampleInputUsername2" class="col-form-label color-dark fs-14 fw-500 align-center">Text Type <span style="color:red;">&nbsp;*</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                            <div class="form-check-inline h5 text-dark">
                                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value='1' checked  style="font-size:1.00rem;align-items:center;">
                                              <label class="form-check-label" for="flexRadioDefault1" style="font-size: 80%;padding-left:5px;">
                                                Normal Text
                                              </label>
                                            </div>
                                            <div class="form-check-inline h5 text-dark">
                                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value='2' style="font-size:1.00rem;align-items:center;">
                                              <label class="form-check-label" for="flexRadioDefault2" style="font-size: 80%;padding-left:5px;">
                                                Html Text
                                              </label>
                                            </div> 
                                          </div>
                                        </div>
                                        <div id ='Normal' class="form-group row mb-3">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="normal_desc" class="col-form-label color-dark fs-14 fw-500 align-center">Template Body <span style="color:red;">&nbsp;*</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                              <textarea class="form-control" placeholder="Leave a comment here"  id="normal_desc" name="ques_desc_1" style="height: 100px;" rows="5">@if($edit_category_id->body_type == 1){{$edit_category_id->template_body}}@endif</textarea>
                                          </div>
                                        </div>
                                        <div id="form-text" class="form-group row mb-3">
                                          <div class="col-sm-3 d-flex aling-items-center">
                                            <label for="html_desc" class="col-form-label color-dark fs-14 fw-500 align-center">Template Body HTML type <span style="color:red;">&nbsp;*</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                              <textarea class="form-control" placeholder="Leave a comment here"  id="html_desc" name="ques_desc_2" style="height: 100px;">@if($edit_category_id->body_type == 2){{$edit_category_id->template_body}}@endif</textarea>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <div class="col-sm-3">
                                          </div>
                                          <div class="col-sm-9">
                                              <div class="layout-button mt-25">
                                                  <input type="button" class="btn btn-default btn-squared border-normal bg-normal px-20" onclick="window.location.href='{{url('admin/template_list')}}'" value="Cancel">
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
          <script>
            var aa = {{$edit_category_id->body_type ?? 1}};
            test_check(aa);
            function test_check(params, value)
            {
              if(params == "1"){
                $('#flexRadioDefault1').attr("checked",true);
                $('#flexRadioDefault2').attr("checked",false);
                $("#Normal").show()
                $('#form-text').hide();
      
              }
              else if(params == "2") 
                { $('#flexRadioDefault2').attr("checked",true);
                $('#flexRadioDefault1').attr("checked",false);
                $("#Normal").hide()
                $('#form-text').show();
              }
            }
          </script>
            <script>
                var editor = CKEDITOR.replace('html_desc', {
                  filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                  filebrowserUploadMethod: 'form',
                  height:'300'
                });

                    if($('#flexRadioDefault1').is(':checked'))
                    {
                      $("#Normal").show()
                      $('#form-text').hide();
                    }

                    $('#flexRadioDefault1').bind('change', function () {
                      if ($(this).is(':checked'))
                        $("#Normal").show().removeAttr('checked',true)
                        $('#form-text').hide();
                    });
                    
                    $("#flexRadioDefault2").bind('change', function(){
                      if ($(this).is(':checked'))
                        $("#Normal").hide();
                        $('#form-text').show().attr('checked',true);
                    }); 
              </script>
              <script>
              $('#category').on('change',function(){
                let id = $(this).val();
                $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                    url:"{{url('admin/count')}}",
                    type:"POST",
                    data: {cat_id: id},
                    success:function(data) 
                    {
                      $('#empty').val(data.subcategories);
                    }
                })
              });
          </script>
          <script>
            function capFirst(string) 
            {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }

            function getRandomInt(min, max) 
            {
              return Math.floor(Math.random() * (max - min)) + min;
            }

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
            const myTimeout = setTimeout(myGreeting, 20000);
            function myGreeting() 
            {
              $('#demo').hide();
            }
          </script>    
        </body>
    </html>
         


