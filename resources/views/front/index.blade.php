<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Дашбоард | Учебная часть</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- datepicker -->
        <link href="assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css" />

        <!-- jvectormap -->
        <link href="assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="colored" data-layout="horizontal" data-layout-size="boxed">

        <!-- Begin page -->
        <div id="layout-wrapper">

          @include('front/menu')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    <!-- Page-Title -->
                    <div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Dashboard</h4>
                                    <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">Welcome to Xoric Dashboard</li>
                                    </ol>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="row">
                                                <div class="col-6">
                                                    <h5>Welcome Back !</h5>
                                                    <p class="text-muted">Xoric Dashboard</p>

                                                    <div class="mt-4">
                                                        <a href="#" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ml-1"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-5 ml-auto">
                                                    <div>
                                                        <img src="assets/images/widget-img.png" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title mb-4">Monthy sale Report</h5>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted mb-2">This month Sale</p>
                                                    <h4>$ 13,425</h4>
                                                </div>
                                                <div dir="ltr" class="ml-2">
                                                    <input data-plugin="knob" data-width="56" data-height="56" data-linecap=round data-displayInput=false
                                                    data-fgColor="#3051d3" value="56" data-skin="tron" data-angleOffset="56"
                                                    data-readOnly=true data-thickness=".17" />
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted">Sale status</p>
                                                    <h5 class="mb-0"> + 12 % <span class="font-size-14 text-muted ml-1">From previous period</span></h5>
                                                </div>

                                                <div class="align-self-end ml-2">
                                                    <a href="#" class="btn btn-primary btn-sm">View more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form-inline float-right">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control form-control-sm datepicker-here" data-range="true"  data-multiple-dates-separator=" - " data-language="en" placeholder="Select Date" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="far fa-calendar font-size-12"></i></span>
                                                    </div>
                                                </div>
                                            </form>
                                            <h5 class="header-title mb-4">Sales Report</h5>
                                            <div id="yearly-sale-chart" class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header bg-transparent p-3">
                                            <h5 class="header-title mb-0">Sales Status</h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="media my-2">

                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Number of Sales</p>
                                                        <h5 class="mb-0">1,625</h5>
                                                    </div>
                                                    <div class="icons-lg ml-2 align-self-center">
                                                        <i class="uim uim-layer-group"></i>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media my-2">
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Sales Revenue </p>
                                                        <h5 class="mb-0">$ 42,235</h5>
                                                    </div>
                                                    <div class="icons-lg ml-2 align-self-center">
                                                        <i class="uim uim-analytics"></i>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media my-2">
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Average Price</p>
                                                        <h5 class="mb-0">$ 14.56</h5>
                                                    </div>
                                                    <div class="icons-lg ml-2 align-self-center">
                                                        <i class="uim uim-ruler"></i>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media my-2">
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Product Sold</p>
                                                        <h5 class="mb-0">8,235</h5>
                                                    </div>
                                                    <div class="icons-lg ml-2 align-self-center">
                                                        <i class="uim uim-box"></i>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title mb-4">Social Source</h5>
                                            <div id="radial-chart" class="apex-charts"></div>

                                            <div class="text-center mt-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div>
                                                            <p class="text-muted"><i class="mdi mdi-circle text-primary mr-1"></i> Facebook</p>
                                                            <h5>$ 1,625</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div>
                                                            <p class="text-muted"><i class="mdi mdi-circle text-warning mr-1"></i> Twitter</p>
                                                            <h5>$ 1,504</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title">Recent Activity</h5>

                                            <div id="activity-chart" class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="float-right ml-2">
                                                <a href="#">View all</a>
                                            </div>
                                            <h5 class="header-title mb-4">Latest Transaction</h5>

                                            <div class="table-responsive">
                                                <table class="table table-centered table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Transaction ID</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">status</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">
                                                                <a href="#"># XO1345</a>
                                                            </th>
                                                            <td>Danny Johnson</td>
                                                            <td>26 Jan</td>
                                                            <td>
                                                                <div class="badge badge-soft-primary">Confirm</div>
                                                            </td>
                                                            <td>$124</td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                                                                        <i class="mdi mdi-eye"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="mdi mdi-pencil"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <i class="mdi mdi-trash-can"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <a href="#"># XO1346</a>
                                                            </th>
                                                            <td>Alvin Newton</td>
                                                            <td>21 Jan</td>
                                                            <td>
                                                                <div class="badge badge-soft-warning">Pending</div>
                                                            </td>
                                                            <td>$112</td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                                                                        <i class="mdi mdi-eye"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="mdi mdi-pencil"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <i class="mdi mdi-trash-can"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <a href="#"># XO1347</a>
                                                            </th>
                                                            <td>Bennie Perez</td>
                                                            <td>15 Jan</td>
                                                            <td>
                                                                <div class="badge badge-soft-primary">Confirm</div>
                                                            </td>
                                                            <td>$106</td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                                                                        <i class="mdi mdi-eye"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="mdi mdi-pencil"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <i class="mdi mdi-trash-can"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <a href="#"># XO1348</a>
                                                            </th>
                                                            <td>Steven Kwon</td>
                                                            <td>11 Jan</td>
                                                            <td>
                                                                <div class="badge badge-soft-primary">Confirm</div>
                                                            </td>
                                                            <td>$115</td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                                                                        <i class="mdi mdi-eye"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="mdi mdi-pencil"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <i class="mdi mdi-trash-can"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <a href="#"># XO1349</a>
                                                            </th>
                                                            <td>Bryan Roark</td>
                                                            <td>08 Jan</td>
                                                            <td>
                                                                <div class="badge badge-soft-danger">Cancel</div>
                                                            </td>
                                                            <td>$105</td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                                                                        <i class="mdi mdi-eye"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="mdi mdi-pencil"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <i class="mdi mdi-trash-can"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="mt-4">
                                                <ul class="pagination pagination-rounded justify-content-center mb-0">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <i class="mdi mdi-chevron-left"></i>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <i class="mdi mdi-chevron-right"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title mb-4">Revenue by Location</h5>

                                            <div id="usa-map"  style="height: 150px" class="mb-5"></div>

                                            <div class="table-responsive">
                                                <table class="table table-centered">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">California</th>
                                                            <td>$ 8,257</td>
                                                            <td>
                                                                <div dir="ltr" class="ml-2">
                                                                    <input data-plugin="knob" data-width="36" data-height="36" data-linecap=round data-displayInput=false
                                                                    data-fgColor="#3051d3" value="56" data-skin="tron" data-angleOffset="36"
                                                                    data-readOnly=true data-thickness=".2" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">New York</th>
                                                            <td>$ 7,253</td>
                                                            <td>
                                                                <div dir="ltr" class="ml-2">
                                                                    <input data-plugin="knob" data-width="36" data-height="36" data-linecap=round data-displayInput=false
                                                                    data-fgColor="#3051d3" value="42" data-skin="tron" data-angleOffset="36"
                                                                    data-readOnly=true data-thickness=".2" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <div class="text-center">
                                                    <a href="#" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ml-1"></i></a>
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
        <div class="right-bar">
            <div data-simplebar class="h-100">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-custom rightbar-nav-tab nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link py-3 active" data-toggle="tab" href="#chat-tab" role="tab">
                            <i class="mdi mdi-message-text font-size-22"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-3" data-toggle="tab" href="#tasks-tab" role="tab">
                            <i class="mdi mdi-format-list-checkbox font-size-22"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-3" data-toggle="tab" href="#settings-tab" role="tab">
                            <i class="mdi mdi-settings font-size-22"></i>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="chat-tab" role="tabpanel">

                        <form class="search-bar py-4 px-3">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>

                        <h6 class="px-4 py-3 mt-2 bg-light">Group Chats</h6>

                        <div class="p-2">
                            <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-success"></i>
                                <span class="mb-0 mt-1">App Development</span>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-warning"></i>
                                <span class="mb-0 mt-1">Office Work</span>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-danger"></i>
                                <span class="mb-0 mt-1">Personal Group</span>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item pl-3 d-block">
                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                                <span class="mb-0 mt-1">Freelance</span>
                            </a>
                        </div>

                        <h6 class="px-4 py-3 mt-4 bg-light">Favourites</h6>

                        <div class="p-2">
                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative align-self-center mr-3">
                                        <img src="assets/images/users/avatar-10.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                        <i class="mdi mdi-circle user-status online"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1">Andrew Mackie</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative align-self-center mr-3">
                                        <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                        <i class="mdi mdi-circle user-status away"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1">Rory Dalyell</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-0 text-truncate">To an English person, it will seem like simplified</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative align-self-center mr-3">
                                        <img src="assets/images/users/avatar-9.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                        <i class="mdi mdi-circle user-status busy"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1">Jaxon Dunhill</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-0 text-truncate">To achieve this, it would be necessary.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <h6 class="px-4 py-3 mt-4 bg-light">Other Chats</h6>

                        <div class="p-2 pb-4">
                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative align-self-center mr-3">
                                        <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                        <i class="mdi mdi-circle user-status online"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1">Jackson Therry</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-0 text-truncate">Everyone realizes why a new common language.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative align-self-center mr-3">
                                        <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                        <i class="mdi mdi-circle user-status away"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1">Charles Deakin</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-0 text-truncate">The languages only differ in their grammar.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative align-self-center mr-3">
                                        <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                        <i class="mdi mdi-circle user-status online"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1">Ryan Salting</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-0 text-truncate">If several languages coalesce the grammar of the resulting.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative align-self-center mr-3">
                                        <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                        <i class="mdi mdi-circle user-status online"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1">Sean Howse</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative align-self-center mr-3">
                                        <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                        <i class="mdi mdi-circle user-status busy"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1">Dean Coward</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-0 text-truncate">The new common language will be more simple.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative align-self-center mr-3">
                                        <img src="assets/images/users/avatar-8.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                        <i class="mdi mdi-circle user-status away"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1">Hayley East</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-0 text-truncate">One could refuse to pay expensive translators.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="tab-pane" id="tasks-tab" role="tabpanel">
                        <h6 class="p-3 mb-0 mt-4 bg-light">Working Tasks</h6>

                        <div class="p-2">
                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                                <p class="text-muted mb-0">App Development<span class="float-right">75%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                                <p class="text-muted mb-0">Database Repair<span class="float-right">37%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                                <p class="text-muted mb-0">Backup Create<span class="float-right">52%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>
                        </div>

                        <h6 class="p-3 mb-0 mt-4 bg-light">Upcoming Tasks</h6>

                        <div class="p-2">
                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                                <p class="text-muted mb-0">Sales Reporting<span class="float-right">12%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                                <p class="text-muted mb-0">Redesign Website<span class="float-right">67%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                                <p class="text-muted mb-0">New Admin Design<span class="float-right">84%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 84%" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>
                        </div>

                        <div class="p-3 mt-2">
                            <a href="javascript: void(0);" class="btn btn-success btn-block waves-effect waves-light">Create Task</a>
                        </div>

                    </div>
                    <div class="tab-pane" id="settings-tab" role="tabpanel">
                            <h6 class="px-4 py-3 bg-light">General Settings</h6>

                        <div class="p-4">
                            <h6 class="font-weight-medium">Online Status</h6>
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="settings-check1" name="settings-check1" checked="">
                                <label class="custom-control-label font-weight-normal" for="settings-check1">Show your status to all</label>
                            </div>

                            <h6 class="mt-4">Auto Updates</h6>
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="settings-check2" name="settings-check2" checked="">
                                <label class="custom-control-label font-weight-normal" for="settings-check2">Keep up to date</label>
                            </div>

                            <h6 class="mt-4">Backup Setup</h6>
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="settings-check3" name="settings-check3">
                                <label class="custom-control-label font-weight-normal" for="settings-check3">Auto backup</label>
                            </div>

                        </div>

                        <h6 class="px-4 py-3 mt-2 bg-light">Advanced Settings</h6>

                        <div class="p-4">
                            <h6 class="font-weight-medium">Application Alerts</h6>
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="settings-check4" name="settings-check4" checked="">
                                <label class="custom-control-label font-weight-normal" for="settings-check4">Email Notifications</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="settings-check5" name="settings-check5">
                                <label class="custom-control-label font-weight-normal" for="settings-check5">SMS Notifications</label>
                            </div>

                            <h6 class="mt-4">API</h6>
                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" id="settings-check6" name="settings-check6">
                                <label class="custom-control-label font-weight-normal" for="settings-check6">Enable access</label>
                            </div>

                        </div>
                    </div>
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

        <!-- datepicker -->
        <script src="assets/libs/air-datepicker/js/datepicker.min.js"></script>
        <script src="assets/libs/air-datepicker/js/i18n/datepicker.en.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

        <!-- Jq vector map -->
        <script src="assets/libs/jqvmap/jquery.vmap.min.js"></script>
        <script src="assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
