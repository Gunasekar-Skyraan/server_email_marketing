<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en" dir="ltr">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Email Marketing - Version 1 [Dev-APIs] - Webservice Form</title>

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
<meta charset="UTF-8">
{{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"> --}}

{{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"> --}}

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
<style type="text/css">
body {
	font-size:15px;
    color:black;
}
td
{
    padding-top: 5px;
    padding-left: 5px;
}
</style>

</head>

<body>

    <div class="col-12">
        <div class="card card-default card-md mb-4">
            <div class="card-header  py-20">
                <h6 class="text-dark bg-outline-dark" style="background:#fff;color:#000;font-size:20px;">API Web Form</h6>
            </div> 
            <div class="card-body">
                <div class="atbd-nav-controller nav-controller-slide">
                    <div class="nav-controller-content tab-content">
                        <div class="tab-pane fade show active" id="control1" role="tabpanel" aria-labelledby="control1-tab">
                            <div class="tab-slide-content">
                                <div class="atbd-tab tab-horizontal">
                                    <ul class="nav nav-tabs vertical-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="tab-horizontal-1-tab" data-toggle="tab" href="#tab-horizontal-1" role="tab" aria-controls="tab-horizontal-1" aria-selected="true">Quiz Set 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tab-horizontal-2-tab" data-toggle="tab" href="#tab-horizontal-2" role="tab" aria-controls="tab-horizontal-2" aria-selected="false">Quiz Set 2</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tab-horizontal-3-tab" data-toggle="tab" href="#tab-horizontal-3" role="tab" aria-controls="tab-horizontal-3" aria-selected="false">Quiz Set 3</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tab-horizontal-4-tab" data-toggle="tab" href="#tab-horizontal-4" role="tab" aria-controls="tab-horizontal-4" aria-selected="false">Quiz Set 4</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tab-horizontal-1" role="tabpanel" aria-labelledby="tab-horizontal-1-tab">
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                <form name="form" method="GET" action="{{url('/api/quizset1/app_list_api')}}"> 
                                                @csrf
                                                <input type="hidden" name="_token" value="poyVeWVAWoGXuKZxeCgQYlaYdOvUxCoQKczaj36T">           
                                                <table  border="0" width="100%">
                                                <tr>
                                                    <td height="30" colspan="2"> <strong style="text-decoration:underline;color:#F00;"> 1 . Quiz App List [ Development Mode ] </strong><br>
                                                        <div><strong>API URL:</strong> {{ url('/api/quizset1/app_list_api')}}</div>
                                                        <div><strong>Method:</strong> GET </div>
                                                        <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                        <div><strong>API Mode:</strong> Development </div>
                                                        <div><strong>Notes:</strong> Last Modified at : 06-Oct-2022 </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="center">
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                            <tr style="background-color:#162133;  color:#FFF;">
                                                                <td><strong>Label Name</strong></td>
                                                                <td><strong>Value</strong></td>
                                                                <td><strong>Variable Name</strong></td>
                                                                <td><strong>Mandatory</strong></td>
                                                                <td><strong>Note</strong></td>
                                                                <td><strong>Sample</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="1" align="center"><input type="submit" value="Submit"/></td>
                                                            </tr>
                                                        
                                                        </table>
                                                    </td>
                                                </tr>
                                                </table>
                                            </form>
                                            </fieldset>
                                            <br><br>

                                            <fieldset style="border:2px solid; border-color:#162133">
                                                    <form name="form" method="POST" action="{{ url('api/quizset1/category_list_by_app_id')}}">
                                                    @csrf
                                                    <input type="hidden" name="_token" value="poyVeWVAWoGXuKZxeCgQYlaYdOvUxCoQKczaj36T">
                                                    <table  border="0" width="100%">
                                                    <tr>
                                                        <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 2 . Quiz Category List By App Id [ Development Mode ] </strong><br>
                                                            <div><strong>API URL:</strong> {{url('api/quizset1/category_list_by_app_id')}}</div>
                                                            <div><strong>Method:</strong> POST </div>
                                                            <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                            <div><strong>API Mode:</strong> Development </div>
                                                            <div><strong>Notes:</strong> Last Modified at : 06-Oct-2022 </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                <tr style="background-color:#162133;  color:#FFF;">
                                                                    <td><strong>Label Name</strong></td>
                                                                    <td><strong>Value</strong></td>
                                                                    <td><strong>Variable Name</strong></td>
                                                                    <td><strong>Mandatory</strong></td>
                                                                    <td><strong>Note</strong></td>
                                                                    <td><strong>Sample</strong></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>App ID</td>
                                                                    <td><input type="text" name="app_id" /></td>
                                                                    <td>app_id</td>
                                                                    <td>Yes</td>
                                                                    <td>From App List API </td>
                                                                    <td>1 (string)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Page Number</td>
                                                                    <td><input type="text" name="page"/></td>
                                                                    <td>page</td>
                                                                    <td>No</td>
                                                                    <td>From the Pagination for search</td>
                                                                    <td>1 or 2 (string)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                                </tr>
                                                            
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>

                                            <fieldset style="border:2px solid; border-color:#162133">
                                                    <form name="form" method="POST" action="{{ url('api/quizset1/quiz_list_by_app_id') }}">
                                                        @csrf
                                                    <table  border="0" width="100%">
                                                    <tr>
                                                        <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 3 . Quiz List By App Id [ Development Mode ] </strong><br>
                                                            <div><strong>API URL:</strong>{{ url('api/quizset1/quiz_list_by_app_id') }}</div>
                                                            <div><strong>Method:</strong> POST </div>
                                                            <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                            <div><strong>API Mode:</strong> Development </div>
                                                            <div><strong>Notes:</strong> Last Modified at : 05-Oct-2022 </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                <tr style="background-color:#162133;  color:#FFF;">
                                                                    <td><strong>Label Name</strong></td>
                                                                    <td><strong>Value</strong></td>
                                                                    <td><strong>Variable Name</strong></td>
                                                                    <td><strong>Mandatory</strong></td>
                                                                    <td><strong>Note</strong></td>
                                                                    <td><strong>Sample</strong></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>app_id</td>
                                                                    <td><input type="text" name="app_id"/></td>
                                                                    <td>app_id</td>
                                                                    <td>Yes</td>
                                                                    <td>From App List API (app_id)  </td>
                                                                    <td>1 (string)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Page Number</td>
                                                                    <td><input type="text" name="page"/></td>
                                                                    <td>page</td>
                                                                    <td>No</td>
                                                                    <td>From the Pagination for search</td>
                                                                    <td>1 or 2 (string)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>

                                            <fieldset style="border:2px solid; border-color:#162133">
                                                <form name="form" method="POST" action="{{ url('api/quizset1/quiz_list_by_category_id') }}">
                                                    @csrf
                                                    <table  border="0" width="100%">
                                                        <tr>
                                                            <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 3 . Quiz List By Category Id [ Development Mode ] </strong><br>
                                                                <div><strong>API URL:</strong>{{ url('api/quizset1/quiz_list_by_category_id') }}</div>
                                                                <div><strong>Method:</strong> POST </div>
                                                                <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                                <div><strong>API Mode:</strong> Development </div>
                                                                <div><strong>Notes:</strong> Last Modified at : 05-Oct-2022 </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" align="center">
                                                                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                    <tr style="background-color:#162133;  color:#FFF;">
                                                                        <td><strong>Label Name</strong></td>
                                                                        <td><strong>Value</strong></td>
                                                                        <td><strong>Variable Name</strong></td>
                                                                        <td><strong>Mandatory</strong></td>
                                                                        <td><strong>Note</strong></td>
                                                                        <td><strong>Sample</strong></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>app_id</td>
                                                                        <td><input type="text" name="app_id"/></td>
                                                                        <td>app_id</td>
                                                                        <td>Yes</td>
                                                                        <td>From App List API (app_id)  </td>
                                                                        <td>1 (string)</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Category ID</td>
                                                                        <td><input type="text" name="quiz_category_id" /></td>
                                                                        <td>quiz_category_id</td>
                                                                        <td>Yes</td>
                                                                        <td>From Quiz List API </td>
                                                                        <td>1 (string)</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>
                                        </div>
                                        <div class="tab-pane fade" id="tab-horizontal-2" role="tabpanel" aria-labelledby="tab-horizontal-2-tab">
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                <form name="form" method="GET" action="{{url('/api/quizset2/app_list_api')}}"> 
                                                    @csrf
                                                    <input type="hidden" name="_token" value="poyVeWVAWoGXuKZxeCgQYlaYdOvUxCoQKczaj36T">           
                                                    <table  border="0" width="100%">
                                                        <tr>
                                                            <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 1 . Quiz Set 2 App List [ Development Mode ] </strong><br>
                                                                <div><strong>API URL:</strong> {{ url('/api/quizset2/app_list_api')}}</div>
                                                                <div><strong>Method:</strong> GET </div>
                                                                <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                                <div><strong>API Mode:</strong> Development </div>
                                                                <div><strong>Notes:</strong> Last Modified at : 06-Oct-2022 </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" align="center">
                                                                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                    <tr style="background-color:#162133;  color:#FFF;">
                                                                        <td><strong>Label Name</strong></td>
                                                                        <td><strong>Value</strong></td>
                                                                        <td><strong>Variable Name</strong></td>
                                                                        <td><strong>Mandatory</strong></td>
                                                                        <td><strong>Note</strong></td>
                                                                        <td><strong>Sample</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="1" align="center"><input type="submit" value="Submit"/></td>
                                                                    </tr>
                                                                
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>
                                        
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                    <form name="form" method="POST" action="{{ url('api/quizset2/category_list_by_app_id')}}">
                                                    @csrf
                                                    <input type="hidden" name="_token" value="poyVeWVAWoGXuKZxeCgQYlaYdOvUxCoQKczaj36T">
                                                    <table  border="0" width="100%">
                                                    <tr>
                                                        <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 2 .Quiz Set 2 Category List By App Id [ Development Mode ] </strong><br>
                                                            <div><strong>API URL:</strong> {{url('api/quizset2/category_list_by_app_id')}}</div>
                                                            <div><strong>Method:</strong> POST </div>
                                                            <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                            <div><strong>API Mode:</strong> Development </div>
                                                            <div><strong>Notes:</strong> Last Modified at : 06-Oct-2022 </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                <tr style="background-color:#162133;  color:#FFF;">
                                                                    <td><strong>Label Name</strong></td>
                                                                    <td><strong>Value</strong></td>
                                                                    <td><strong>Variable Name</strong></td>
                                                                    <td><strong>Mandatory</strong></td>
                                                                    <td><strong>Note</strong></td>
                                                                    <td><strong>Sample</strong></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>App ID</td>
                                                                    <td><input type="text" name="app_id" /></td>
                                                                    <td>app_id</td>
                                                                    <td>Yes</td>
                                                                    <td>From App List API </td>
                                                                    <td>1 (string)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Page Number</td>
                                                                    <td><input type="text" name="page"/></td>
                                                                    <td>page</td>
                                                                    <td>No</td>
                                                                    <td>From the Pagination for search</td>
                                                                    <td>1 or 2 (string)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                                </tr>
                                                            
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>
                                            
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                    <form name="form" method="POST" action="{{ url('api/quizset2/sub_category_list') }}">
                                                    @csrf
                                                    <input type="hidden" name="_token" value="poyVeWVAWoGXuKZxeCgQYlaYdOvUxCoQKczaj36T">
                                                    <table  border="0" width="100%">
                                                    <tr>
                                                        <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 3 .Quiz Set 2 Sub Category List By Category Id [ Development Mode ] </strong><br>
                                                            <div><strong>API URL:</strong> {{ url('api/quizset2/sub_category_list') }} </div>
                                                            <div><strong>Method:</strong> POST </div>
                                                            <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                            <div><strong>API Mode:</strong> Development </div>
                                                            <div><strong>Notes:</strong> Last Modified at : 05-Oct-2022 </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                <tr style="background-color:#162133;  color:#FFF;">
                                                                    <td><strong>Label Name</strong></td>
                                                                    <td><strong>Value</strong></td>
                                                                    <td><strong>Variable Name</strong></td>
                                                                    <td><strong>Mandatory</strong></td>
                                                                    <td><strong>Note</strong></td>
                                                                    <td><strong>Sample</strong></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>Category ID</td>
                                                                    <td><input type="text" name="category_id" /></td>
                                                                    <td>category_id</td>
                                                                    <td>Yes</td>
                                                                    <td>From Category List API </td>
                                                                    <td>1 (string)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Page Number</td>
                                                                    <td><input type="text" name="page"/></td>
                                                                    <td>page</td>
                                                                    <td>No</td>
                                                                    <td>From the Pagination for search</td>
                                                                    <td>1 or 2 (string)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                                </tr>
                                                            
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>
                                        
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                    <form name="form" method="POST" action="{{ url('api/quizset2/quizset2_list_by_category_id') }}">
                                                        @csrf
                                                    <table  border="0" width="100%">
                                                    <tr>
                                                        <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 4 .Quiz Set 2 List By Category Id [ Development Mode ] </strong><br>
                                                            <div><strong>API URL:</strong>{{ url('api/quizset2/quizset2_list_by_category_id') }}</div>
                                                            <div><strong>Method:</strong> POST </div>
                                                            <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                            <div><strong>API Mode:</strong> Development </div>
                                                            <div><strong>Notes:</strong> Last Modified at : 05-Oct-2022 </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                <tr style="background-color:#162133;  color:#FFF;">
                                                                    <td><strong>Label Name</strong></td>
                                                                    <td><strong>Value</strong></td>
                                                                    <td><strong>Variable Name</strong></td>
                                                                    <td><strong>Mandatory</strong></td>
                                                                    <td><strong>Note</strong></td>
                                                                    <td><strong>Sample</strong></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>Category ID</td>
                                                                    <td><input type="text" name="category_id" /></td>
                                                                    <td>category_id</td>
                                                                    <td>Yes</td>
                                                                    <td>From Image List API </td>
                                                                    <td>1 (string)</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>
                                            
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                    <form name="form" method="POST" action="{{ url('api/quizset2/quizset2_list_by_sub_category_id') }}">
                                                    @csrf
                                                    <input type="hidden" name="_token" value="poyVeWVAWoGXuKZxeCgQYlaYdOvUxCoQKczaj36T">
                                                    <table  border="0" width="100%">
                                                    <tr>
                                                        <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 5 . Quiz Set 2 List By SubCategory Id [ Development Mode ] </strong><br>
                                                            <div><strong>API URL:</strong> {{ url('api/quizset2/quizset2_list_by_sub_category_id') }}</div>
                                                            <div><strong>Method:</strong> POST </div>
                                                            <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                            <div><strong>API Mode:</strong> Development </div>
                                                            <div><strong>Notes:</strong> Last Modified at : 05-Oct-2022 </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                <tr style="background-color:#162133;  color:#FFF;">
                                                                    <td><strong>Label Name</strong></td>
                                                                    <td><strong>Value</strong></td>
                                                                    <td><strong>Variable Name</strong></td>
                                                                    <td><strong>Mandatory</strong></td>
                                                                    <td><strong>Note</strong></td>
                                                                    <td><strong>Sample</strong></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>Sub Category ID</td>
                                                                    <td><input type="text" name="sub_category_id" /></td>
                                                                    <td>sub_category_id</td>
                                                                    <td>Yes</td>
                                                                    <td>From Image List API </td>
                                                                    <td>1 (string)</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                                </tr>
                                                            
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>
                                            
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                    <form name="form" method="POST" action="{{ url('api/quizset2/quizset2_detail') }}">
                                                    <table  border="0" width="100%">
                                                    <tr>
                                                        <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 2 . Quiz Set 2 Full Details By Quiz ID[ Development Mode ] </strong><br>
                                                            <div><strong>API URL:</strong> {{ url('api/quizset2/quizset2_detail') }}</div>
                                                            <div><strong>Method:</strong> POST </div>
                                                            <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                            <div><strong>API Mode:</strong> Development </div>
                                                            <div><strong>Notes:</strong> Last Modified at : 05-Oct-2022 </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                <tr style="background-color:#162133;  color:#FFF;">
                                                                    <td><strong>Label Name</strong></td>
                                                                    <td><strong>Value</strong></td>
                                                                    <td><strong>Variable Name</strong></td>
                                                                    <td><strong>Mandatory</strong></td>
                                                                    <td><strong>Note</strong></td>
                                                                    <td><strong>Sample</strong></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>Quiz ID</td>
                                                                    <td><input type="text" name="quiz_id" /></td>
                                                                    <td>quiz_id</td>
                                                                    <td>Yes</td>
                                                                    <td>From Image List API </td>
                                                                    <td>1 (string)</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                                </tr>
                                                            
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>
                                        
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                <form name="form" method="POST" action="{{ url('api/quizset2/quizset2_search') }}">
                                                <table  border="0" width="100%">
                                                <tr>
                                                    <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 7 .Quiz Set 2 Details Search Api Development Mode ] </strong><br>
                                                        <div><strong>API URL:</strong> {{ url('api/quizset2/quizset2_search') }}</div>
                                                        <div><strong>Method:</strong> POST </div>
                                                        <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                        <div><strong>API Mode:</strong> Development </div>
                                                        <div><strong>Notes:</strong> Last Modified at : 27-Oct-2022 </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="center">
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                            <tr style="background-color:#162133;  color:#FFF;">
                                                                <td><strong>Label Name</strong></td>
                                                                <td><strong>Value</strong></td>
                                                                <td><strong>Variable Name</strong></td>
                                                                <td><strong>Mandatory</strong></td>
                                                                <td><strong>Note</strong></td>
                                                                <td><strong>Sample</strong></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>Search</td>
                                                                <td><input type="text" name="search"/></td>
                                                                <td>search</td>
                                                                <td>Yes</td>
                                                                <td>From your search result </td>
                                                                <td>array (string)</td>
                                                            </tr>
                                                            <tr>
                                                                <td>app_id</td>
                                                                <td><input type="text" name="app_id"/></td>
                                                                <td>app_id</td>
                                                                <td>Yes</td>
                                                                <td>From App List API (app_id)  </td>
                                                                <td>1 (string)</td>
                                                            </tr>
                                        
                                                            <tr>
                                                                <td>Page Number</td>
                                                                <td><input type="text" name="page"/></td>
                                                                <td>page</td>
                                                                <td>No</td>
                                                                <td>From the Pagination for search</td>
                                                                <td>1 or 2 (string)</td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                            </tr>
                                                        
                                                        </table>
                                                    </td>
                                                </tr>
                                                </table>
                                            </form>
                                            </fieldset>
                                            <br><br>
                                        </div>
                                        <div class="tab-pane fade" id="tab-horizontal-3" role="tabpanel" aria-labelledby="tab-horizontal-3-tab">
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                <form name="form" method="GET" action="{{url('/api/quizset3/app_list_api')}}"> 
                                                    @csrf
                                                    <input type="hidden" name="_token" value="poyVeWVAWoGXuKZxeCgQYlaYdOvUxCoQKczaj36T">           
                                                    <table  border="0" width="100%">
                                                        <tr>
                                                            <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 1 . Quiz Set 3 App List [ Development Mode ] </strong><br>
                                                                <div><strong>API URL:</strong> {{ url('/api/quizset3/app_list_api')}}</div>
                                                                <div><strong>Method:</strong> GET </div>
                                                                <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                                <div><strong>API Mode:</strong> Development </div>
                                                                <div><strong>Notes:</strong> Last Modified at : 06-Oct-2022 </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" align="center">
                                                                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                    <tr style="background-color:#162133;  color:#FFF;">
                                                                        <td><strong>Label Name</strong></td>
                                                                        <td><strong>Value</strong></td>
                                                                        <td><strong>Variable Name</strong></td>
                                                                        <td><strong>Mandatory</strong></td>
                                                                        <td><strong>Note</strong></td>
                                                                        <td><strong>Sample</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="1" align="center"><input type="submit" value="Submit"/></td>
                                                                    </tr>
                                                                
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>
                                            
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                    <form name="form" method="POST" action="{{ url('api/quizset3/category_list_by_app_id')}}">
                                                    @csrf
                                                    <input type="hidden" name="_token" value="poyVeWVAWoGXuKZxeCgQYlaYdOvUxCoQKczaj36T">
                                                    <table  border="0" width="100%">
                                                    <tr>
                                                        <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 2 .Quiz Set 3 Category List By App Id [ Development Mode ] </strong><br>
                                                            <div><strong>API URL:</strong> {{url('api/quizset3/category_list_by_app_id')}}</div>
                                                            <div><strong>Method:</strong> POST </div>
                                                            <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                            <div><strong>API Mode:</strong> Development </div>
                                                            <div><strong>Notes:</strong> Last Modified at : 06-Oct-2022 </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                <tr style="background-color:#162133;  color:#FFF;">
                                                                    <td><strong>Label Name</strong></td>
                                                                    <td><strong>Value</strong></td>
                                                                    <td><strong>Variable Name</strong></td>
                                                                    <td><strong>Mandatory</strong></td>
                                                                    <td><strong>Note</strong></td>
                                                                    <td><strong>Sample</strong></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>App ID</td>
                                                                    <td><input type="text" name="app_id" /></td>
                                                                    <td>app_id</td>
                                                                    <td>Yes</td>
                                                                    <td>From App List API </td>
                                                                    <td>1 (string)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Page Number</td>
                                                                    <td><input type="text" name="page"/></td>
                                                                    <td>page</td>
                                                                    <td>No</td>
                                                                    <td>From the Pagination for search</td>
                                                                    <td>1 or 2 (string)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                                </tr>
                                                            
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>
                                            
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                    <form name="form" method="POST" action="{{ url('api/quizset3/sub_category_list') }}">
                                                    @csrf
                                                    <input type="hidden" name="_token" value="poyVeWVAWoGXuKZxeCgQYlaYdOvUxCoQKczaj36T">
                                                    <table  border="0" width="100%">
                                                    <tr>
                                                        <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 3 .Quiz Set 3 Sub Category List By Category Id [ Development Mode ] </strong><br>
                                                            <div><strong>API URL:</strong> {{ url('api/quizset3/sub_category_list') }} </div>
                                                            <div><strong>Method:</strong> POST </div>
                                                            <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                            <div><strong>API Mode:</strong> Development </div>
                                                            <div><strong>Notes:</strong> Last Modified at : 05-Oct-2022 </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                <tr style="background-color:#162133;  color:#FFF;">
                                                                    <td><strong>Label Name</strong></td>
                                                                    <td><strong>Value</strong></td>
                                                                    <td><strong>Variable Name</strong></td>
                                                                    <td><strong>Mandatory</strong></td>
                                                                    <td><strong>Note</strong></td>
                                                                    <td><strong>Sample</strong></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>Category ID</td>
                                                                    <td><input type="text" name="category_id" /></td>
                                                                    <td>category_id</td>
                                                                    <td>Yes</td>
                                                                    <td>From Category List API </td>
                                                                    <td>1 (string)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Page Number</td>
                                                                    <td><input type="text" name="page"/></td>
                                                                    <td>page</td>
                                                                    <td>No</td>
                                                                    <td>From the Pagination for search</td>
                                                                    <td>1 or 2 (string)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                                </tr>
                                                            
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>
                                            
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                    <form name="form" method="POST" action="{{ url('api/quizset3/quizset3_list_by_category_id') }}">
                                                        @csrf
                                                    <table  border="0" width="100%">
                                                    <tr>
                                                        <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 4 .Quiz Set 3 List By Category Id [ Development Mode ] </strong><br>
                                                            <div><strong>API URL:</strong>{{ url('api/quizset3/quizset3_list_by_category_id') }}</div>
                                                            <div><strong>Method:</strong> POST </div>
                                                            <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                            <div><strong>API Mode:</strong> Development </div>
                                                            <div><strong>Notes:</strong> Last Modified at : 05-Oct-2022 </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                <tr style="background-color:#162133;  color:#FFF;">
                                                                    <td><strong>Label Name</strong></td>
                                                                    <td><strong>Value</strong></td>
                                                                    <td><strong>Variable Name</strong></td>
                                                                    <td><strong>Mandatory</strong></td>
                                                                    <td><strong>Note</strong></td>
                                                                    <td><strong>Sample</strong></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>Category ID</td>
                                                                    <td><input type="text" name="category_id" /></td>
                                                                    <td>category_id</td>
                                                                    <td>Yes</td>
                                                                    <td>From Image List API </td>
                                                                    <td>1 (string)</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>
                                            
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                    <form name="form" method="POST" action="{{ url('api/quizset3/quizset3_list_by_sub_category_id') }}">
                                                    @csrf
                                                    <input type="hidden" name="_token" value="poyVeWVAWoGXuKZxeCgQYlaYdOvUxCoQKczaj36T">
                                                    <table  border="0" width="100%">
                                                    <tr>
                                                        <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 5 . Quiz Set 3 List By SubCategory Id [ Development Mode ] </strong><br>
                                                            <div><strong>API URL:</strong> {{ url('api/quizset3/quizset3_list_by_sub_category_id') }}</div>
                                                            <div><strong>Method:</strong> POST </div>
                                                            <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                            <div><strong>API Mode:</strong> Development </div>
                                                            <div><strong>Notes:</strong> Last Modified at : 05-Oct-2022 </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                <tr style="background-color:#162133;  color:#FFF;">
                                                                    <td><strong>Label Name</strong></td>
                                                                    <td><strong>Value</strong></td>
                                                                    <td><strong>Variable Name</strong></td>
                                                                    <td><strong>Mandatory</strong></td>
                                                                    <td><strong>Note</strong></td>
                                                                    <td><strong>Sample</strong></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>Sub Category ID</td>
                                                                    <td><input type="text" name="sub_category_id" /></td>
                                                                    <td>sub_category_id</td>
                                                                    <td>Yes</td>
                                                                    <td>From Image List API </td>
                                                                    <td>1 (string)</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                                </tr>
                                                            
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>
                                            
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                    <form name="form" method="POST" action="{{ url('api/quizset3/quizset3_detail') }}">
                                                    <table  border="0" width="100%">
                                                    <tr>
                                                        <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 2 . Quiz Set 3 Full Details By Quiz ID[ Development Mode ] </strong><br>
                                                            <div><strong>API URL:</strong> {{ url('api/quizset3/quizset3_detail') }}</div>
                                                            <div><strong>Method:</strong> POST </div>
                                                            <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                            <div><strong>API Mode:</strong> Development </div>
                                                            <div><strong>Notes:</strong> Last Modified at : 05-Oct-2022 </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                <tr style="background-color:#162133;  color:#FFF;">
                                                                    <td><strong>Label Name</strong></td>
                                                                    <td><strong>Value</strong></td>
                                                                    <td><strong>Variable Name</strong></td>
                                                                    <td><strong>Mandatory</strong></td>
                                                                    <td><strong>Note</strong></td>
                                                                    <td><strong>Sample</strong></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>Quiz ID</td>
                                                                    <td><input type="text" name="quiz_id" /></td>
                                                                    <td>quiz_id</td>
                                                                    <td>Yes</td>
                                                                    <td>From Image List API </td>
                                                                    <td>1 (string)</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                                </tr>
                                                            
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>
                                            
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                <form name="form" method="POST" action="{{ url('api/quizset3/quizset3_search') }}">
                                                <table  border="0" width="100%">
                                                <tr>
                                                    <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 7 .Quiz Set 3 Details Search Api Development Mode ] </strong><br>
                                                        <div><strong>API URL:</strong> {{ url('api/quizset3/quizset3_search') }}</div>
                                                        <div><strong>Method:</strong> POST </div>
                                                        <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                        <div><strong>API Mode:</strong> Development </div>
                                                        <div><strong>Notes:</strong> Last Modified at : 27-Oct-2022 </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="center">
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                            <tr style="background-color:#162133;  color:#FFF;">
                                                                <td><strong>Label Name</strong></td>
                                                                <td><strong>Value</strong></td>
                                                                <td><strong>Variable Name</strong></td>
                                                                <td><strong>Mandatory</strong></td>
                                                                <td><strong>Note</strong></td>
                                                                <td><strong>Sample</strong></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>Search</td>
                                                                <td><input type="text" name="search"/></td>
                                                                <td>search</td>
                                                                <td>Yes</td>
                                                                <td>From your search result </td>
                                                                <td>array (string)</td>
                                                            </tr>
                                                            <tr>
                                                                <td>app_id</td>
                                                                <td><input type="text" name="app_id"/></td>
                                                                <td>app_id</td>
                                                                <td>Yes</td>
                                                                <td>From App List API (app_id)  </td>
                                                                <td>1 (string)</td>
                                                            </tr>
                                            
                                                            <tr>
                                                                <td>Page Number</td>
                                                                <td><input type="text" name="page"/></td>
                                                                <td>page</td>
                                                                <td>No</td>
                                                                <td>From the Pagination for search</td>
                                                                <td>1 or 2 (string)</td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                            </tr>
                                                        
                                                        </table>
                                                    </td>
                                                </tr>
                                                </table>
                                            </form>
                                            </fieldset>
                                            <br><br>
                                        </div>
                                        <div class="tab-pane fade" id="tab-horizontal-4" role="tabpanel" aria-labelledby="tab-horizontal-4-tab">
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                <form name="form" method="GET" action="{{url('/api/quizset4/app_list_api')}}"> 
                                                    @csrf
                                                    <input type="hidden" name="_token" value="poyVeWVAWoGXuKZxeCgQYlaYdOvUxCoQKczaj36T">           
                                                    <table  border="0" width="100%">
                                                        <tr>
                                                            <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 1 . Quiz Set 4 App List [ Development Mode ] </strong><br>
                                                                <div><strong>API URL:</strong> {{ url('/api/quizset4/app_list_api')}}</div>
                                                                <div><strong>Method:</strong> GET </div>
                                                                <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                                <div><strong>API Mode:</strong> Development </div>
                                                                <div><strong>Notes:</strong> Last Modified at : 06-Oct-2022 </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" align="center">
                                                                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                    <tr style="background-color:#162133;  color:#FFF;">
                                                                        <td><strong>Label Name</strong></td>
                                                                        <td><strong>Value</strong></td>
                                                                        <td><strong>Variable Name</strong></td>
                                                                        <td><strong>Mandatory</strong></td>
                                                                        <td><strong>Note</strong></td>
                                                                        <td><strong>Sample</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="1" align="center"><input type="submit" value="Submit"/></td>
                                                                    </tr>
                                                                
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </fieldset>
                                            <br><br>

                                            <fieldset style="border:2px solid; border-color:#162133">
                                                <form name="form" method="POST" action="{{ url('api/quizset4/quizset4_detail') }}">
                                                <table  border="0" width="100%">
                                                <tr>
                                                    <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 2 . Quiz Set 4 Full Details By App Id[ Development Mode ] </strong><br>
                                                        <div><strong>API URL:</strong> {{ url('api/quizset4/quizset4_detail') }}</div>
                                                        <div><strong>Method:</strong> POST </div>
                                                        <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                        <div><strong>API Mode:</strong> Development </div>
                                                        <div><strong>Notes:</strong> Last Modified at : 05-Oct-2022 </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="center">
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                            <tr style="background-color:#162133;  color:#FFF;">
                                                                <td><strong>Label Name</strong></td>
                                                                <td><strong>Value</strong></td>
                                                                <td><strong>Variable Name</strong></td>
                                                                <td><strong>Mandatory</strong></td>
                                                                <td><strong>Note</strong></td>
                                                                <td><strong>Sample</strong></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>App ID</td>
                                                                <td><input type="text" name="app_id" /></td>
                                                                <td>app_id</td>
                                                                <td>Yes</td>
                                                                <td>From Image List API </td>
                                                                <td>1 (string)</td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                            </tr>
                                                        
                                                        </table>
                                                    </td>
                                                </tr>
                                                </table>
                                            </form>
                                            </fieldset>
                                            <br><br>
                                            <fieldset style="border:2px solid; border-color:#162133">
                                                <form name="form" method="POST" action="{{ url('api/quizset4/quizset4_search') }}">
                                                <table  border="0" width="100%">
                                                <tr>
                                                    <td height="30" colspan="2" align="left"> <strong style="text-decoration:underline;color:#F00;"> 3 .Quiz Set 4 Details Search Api Development Mode ] </strong><br>
                                                        <div><strong>API URL:</strong> {{ url('api/quizset4/quizset4_search') }}</div>
                                                        <div><strong>Method:</strong> POST </div>
                                                        <div><strong>Content-Type:</strong> application/x-www-form-urlencoded [i.e. x-www-form-urlencoded]</div>
                                                        <div><strong>API Mode:</strong> Development </div>
                                                        <div><strong>Notes:</strong> Last Modified at : 27-Oct-2022 </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="center">
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                            <tr style="background-color:#162133;  color:#FFF;">
                                                                <td><strong>Label Name</strong></td>
                                                                <td><strong>Value</strong></td>
                                                                <td><strong>Variable Name</strong></td>
                                                                <td><strong>Mandatory</strong></td>
                                                                <td><strong>Note</strong></td>
                                                                <td><strong>Sample</strong></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>Search</td>
                                                                <td><input type="text" name="search"/></td>
                                                                <td>search</td>
                                                                <td>Yes</td>
                                                                <td>From your search result </td>
                                                                <td>array (string)</td>
                                                            </tr>
                                                            <tr>
                                                                <td>app_id</td>
                                                                <td><input type="text" name="app_id"/></td>
                                                                <td>app_id</td>
                                                                <td>Yes</td>
                                                                <td>From App List API (app_id)  </td>
                                                                <td>1 (string)</td>
                                                            </tr>
                                        
                                                            <tr>
                                                                <td>Page Number</td>
                                                                <td><input type="text" name="page"/></td>
                                                                <td>page</td>
                                                                <td>No</td>
                                                                <td>From the Pagination for search</td>
                                                                <td>1 or 2 (string)</td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td colspan="1" align="center"><input type="submit" value="Submit" /></td>
                                                            </tr>
                                                        
                                                        </table>
                                                    </td>
                                                </tr>
                                                </table>
                                            </form>
                                            </fieldset>
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ends: .card -->
    </div>
    <footer class="footer-wrQuizser">
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
</body>
</html>
