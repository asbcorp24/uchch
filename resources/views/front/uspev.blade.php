<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Дашбоард | Учебная часть</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- datepicker -->
        <link href="{{url('assets/libs/air-datepicker/css/datepicker.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- jvectormap -->
        <link href="{{url('assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet')}}" />

        <!-- Bootstrap Css -->
        <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{url('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="colored" data-layout="horizontal" data-layout-size="boxed">

        <!-- Begin page -->
        <div id="layout-wrapper">

          @include('front/menu')

            <div class="main-content">

                <div class="page-content">

                    <!-- Page-Title -->

                    <!-- end page title end breadcrumb -->

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="panel panel-default">

                                        <div class="panel-body" id="pz">
                                            @if($res!=null)
                                            <div class="table-responsive">

                                                    <table class="table  table-hover table-bordered ">
                                                        <thead>
                                                        <tr>
                                                        <th>Группа</th>
                                                        </tr>

                                                        </thead>
                                                        <tbody id="tble">

                                                        @foreach($res as $rs)
                                                          <tr>
                                                              <td><a href="{{url('uspev')}}/{{$rs->id}}" style="display: block">{{$rs->nazv}}</a></td>
                                                          </tr>
                                                        @endforeach



                                                        </tbody>
                                                    </table>

                                            </div>
                                            @endif
                                                @if($predm!=null)
                                                    <div class="table-responsive">

                                                        <table class="table  table-hover table-bordered ">
                                                            <thead>
                                                            <tr>
                                                                <th>Группа</th>
                                                            </tr>

                                                            </thead>
                                                            <tbody id="tble">

                                                            @foreach($predm as $rs)
                                                                <tr>
                                                                    <td><a href="{{url('uspev')}}/{{$rs->id}}" style="display: block">{{$rs->nazv}}</a></td>
                                                                </tr>
                                                            @endforeach



                                                            </tbody>
                                                        </table>

                                                    </div>
                                                @endif
                                                @if($stud!=null)
                                                    <div class="table-responsive">

                                                        <table class="table  table-hover table-bordered ">
                                                            <thead>
                                                            <tr>
                                                                <th>Группа</th>
                                                            </tr>

                                                            </thead>
                                                            <tbody id="tble">

                                                            @foreach($stud as $rs)
                                                                <tr>
                                                                    <td><a href="{{url('uspev')}}/{{$rs->id}}" style="display: block">{{$rs->nazv}}</a></td>
                                                                </tr>
                                                            @endforeach



                                                            </tbody>
                                                        </table>

                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </div>
                            <!-- end row -->

                        </div> <!-- container-fluid -->
                    </div>
                    <!-- end page-content-wrapper -->
                </div>
                <!-- End Page-content -->


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                2020 © Xoric.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{url('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{url('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{url('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{url('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{url('assets/libs/node-waves/waves.min.js')}}"></script>



        <!-- datepicker -->
        <script src="{{url('assets/libs/air-datepicker/js/datepicker.min.js')}}"></script>
        <script src="{{url('ssets/libs/air-datepicker/js/i18n/datepicker.en.js')}}"></script>

        <!-- apexcharts -->
        <script src="{{url('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <script src="{{url('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>

        <!-- Jq vector map -->
        <script src="{{url('assets/libs/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{url('assets/libs/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

        <script src="{{url('assets/js/pages/dashboard.init.js')}}"></script>

        <script src="{{url('assets/js/app.js')}}"></script>

    </body>
</html>
