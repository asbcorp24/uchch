<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Ведомости</title>
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
        <link href="{{url('css/bootstrap-slider.min.css')}}" rel="stylesheet" type="text/css" />
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
                            <br>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card ">

                                        <div class="card-body">
                                            <label>Группа - предмет</label>
                                            <select   name="tz" class="form-control" id="gatt">
                                                @foreach($predmet as $tpr)
                                                    <option value="{{$tpr->id}}">{{$tpr->gnazv}} {{$tpr->nazv}} - {{$tpr->semestr}} семестр</option>
                                                @endforeach
                                            </select>
<label>Тип аттестации</label>
                                            <select   name="tz" class="form-control" id="tatt">
                                                @foreach($tip_ekz as $tekz)
                                                <option value="{{$tekz->id}}">{{$tekz->name}}</option>
                                                @endforeach
                                                </select>
<label>Дата аттестации</label>
                                            <input type="date" class="form-control" id="datt">
                                            <br>
                                            <button class="btn btn-info form-control" id="vbr">Выбрать</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card">

                                        <div class="card-body-body" id="pz">







                                                    <div class="table-responsive">

                                                        <table class="table  table-hover table-bordered ">
                                                            <thead>
                                                            <tr class="bg-info">
                                                                <th>ФИО</th>

                                                            </tr>

                                                            </thead>
                                                            <tbody id="tble">




                                                            </tbody>
                                                        </table>

                                                    </div>

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
        <script src="{{url('js/bootstrap-slider.min.js')}}"></script>
        <script src="{{url('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{url('assets/libs/node-waves/waves.min.js')}}"></script>


<script>
    $('#vbr').click(function () {

        $.post('{{url('vedapi')}}', {
           'md':26,
            'gatt': $('#gatt').val(),
            'tatt': $('#tatt').val(),
            'datt': $('#datt').val(),
            '_token': '{{ csrf_token() }}'
        }, function (data) {



        });
    });

</script>






    </body>
</html>