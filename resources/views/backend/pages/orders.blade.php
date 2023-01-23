<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sanad - Admin Dashboard </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">

    <!-- page css -->
    <link href="assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="layout">

            <!-- Search Start-->
            <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Services</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Service Name</a>
                                        <p class="m-b-0 text-muted font-size-13">by: company name</p>
                                    </div>
                                </div>

                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Team Members</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/user.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Abdullah Barakat</a>
                                        <p class="m-b-0 text-muted font-size-13">Administrator</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Companies</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/img-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Company Name</a>
                                        <p class="m-b-0 text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">20 Members</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Workers</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/user.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Abdullah Barakat</a>
                                        <p class="m-b-0 text-muted font-size-13">Driver</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End-->

            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="index.html">
                        <img src="assets/images/logo/logo.svg" alt="Logo">
                        <img class="logo-fold" src="assets/images/logo/logo-fold.svg" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="index.html">
                        <img src="assets/images/logo/logo-white.svg" alt="Logo">
                        <img class="logo-fold" src="assets/images/logo/logo-fold-white.svg" alt="Logo">
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                                <i class="anticon anticon-search"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" data-toggle="dropdown">
                                <i class="anticon anticon-bell notification-badge"></i>
                            </a>
                            <div class="dropdown-menu pop-notification">
                                <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                                    <p class="text-dark font-weight-semibold m-b-0">
                                        <i class="anticon anticon-bell"></i>
                                        <span class="m-l-10">Notification</span>
                                    </p>
                                    <a class="btn-sm btn-default btn" href="javascript:void(0);">
                                        <small>View All</small>
                                    </a>
                                </div>
                                <div class="relative">
                                    <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-blue avatar-icon">
                                                    <i class="anticon anticon-mail"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">You received a new message</p>
                                                    <p class="m-b-0"><small>8 min ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-cyan avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">New user registered</p>
                                                    <p class="m-b-0"><small>7 hours ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-red avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">System Alert</p>
                                                    <p class="m-b-0"><small>8 hours ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
                                            <div class="d-flex">
                                                <div class="avatar avatar-gold avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">You have a new update</p>
                                                    <p class="m-b-0"><small>2 days ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="assets/images/avatars/user.jpg" alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="assets/images/avatars/user.jpg" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold">Abdullah Aldawod</p>
                                            <p class="m-b-0 opacity-07">Admin</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">Edit Profile</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                            <span class="m-l-10">Account Setting</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Header END -->

            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item">
                            <a href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fas fa-home"></i>
                                </span>
                                <span class="title">Home</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="orders.html">
                                <span class="icon-holder">
                                    <i class="fas fa-tasks"></i>
                                </span>
                                <span class="title">Orders</span>
                            </a>

                        </li>

                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fas fa-building"></i>
                                </span>
                                <span class="title">Service providers</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="companies.html">All Service providers</a>
                                </li>
                                <li>
                                    <a href="c-profile.html">Company Profile</a>
                                </li>
                                <li>
                                    <a href="add-new-company.html">Add New Company</a>
                                </li>
                                <li>
                                    <a href="add-new-company2.html">Add Company auto</a>
                                </li>
                                <li>
                                    <a href="add-new-employee.html">Add New Employee</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="commission.html">
                                <span class="icon-holder">
                                    <i class="fas fa-tags"></i>
                                </span>
                                <span class="title">Commission</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="coupon.html">
                                <span class="icon-holder">
                                    <i class="fas fa-tags"></i>
                                </span>
                                <span class="title">Coupons</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fas fa-briefcase"></i>
                                </span>
                                <span class="title">Users & Admins</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="staff.html">Users & Admins</a>
                                </li>
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="sign-up.html">Sign Up</a>
                                </li>
                                <li>
                                    <a href="otp.html">OTP</a>
                                </li>
                                <li>
                                    <a href="404.html">404</a>
                                </li>
                                <li>
                                    <a href="maintenance.html">Maintenance</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="support.html">
                                <span class="icon-holder">
                                    <i class="fas fa-cog"></i>
                                </span>
                                <span class="title">Support </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">

                <!-- Content Wrapper START -->
                <div class="main-content">

                    <div class="page-header">
                        <h2 class="header-title">All Order Requests</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="index.html" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                <a class="breadcrumb-item" href="#">Orders</a>
                                <span class="breadcrumb-item active">All Order Requests</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h2>All Order Requests</h2>

                            <div class="row m-v-30">
                                <div class="col-lg-8">
                                    <div class="d-md-flex">
                                        <div class="m-b-10">
                                            <select class="custom-select" style="min-width: 180px;">
                                                <option selected>Status</option>
                                                <option value="all">All</option>
                                                <option value="Completed">Completed</option>
                                                <option value="Uncompleted">Uncompleted</option>
                                                <option value="rejected">Rejected</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <button class="btn btn-primary">
                                        <i class="anticon anticon-file-excel m-r-5"></i>
                                        <span>Export</span>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover e-commerce-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="checkbox">
                                                    <input id="checkAll" type="checkbox">
                                                    <label for="checkAll" class="m-b-0"></label>
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Requester</th>
                                            <th>Service name</th>
                                            <th>Company name</th>
                                            <th>Contract Type</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #89559
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">1 Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>1 Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$107.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                                    <div>Completed</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #56689
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">2 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                                    <div>Completed</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #53231
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">5 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-warning badge-dot m-r-10"></div>
                                                    <div>Uncompleted</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #53301
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">12 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-danger badge-dot m-r-10"></div>
                                                    <div>Rejected</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #89559
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">1 Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">15 Service name here</a></td>
                                            <td>1 Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$107.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                                    <div>Completed</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #56689
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                                    <div>Completed</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #53231
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-warning badge-dot m-r-10"></div>
                                                    <div>Uncompleted</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #53301
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-danger badge-dot m-r-10"></div>
                                                    <div>Rejected</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #89559
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">1 Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">15 Service name here</a></td>
                                            <td>1 Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$107.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                                    <div>Completed</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #56689
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                                    <div>Completed</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #53231
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-warning badge-dot m-r-10"></div>
                                                    <div>Uncompleted</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #53301
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-danger badge-dot m-r-10"></div>
                                                    <div>Rejected</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #89559
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">1 Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">15 Service name here</a></td>
                                            <td>1 Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$107.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                                    <div>Completed</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #56689
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                                    <div>Completed</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #53231
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-warning badge-dot m-r-10"></div>
                                                    <div>Uncompleted</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #53301
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-danger badge-dot m-r-10"></div>
                                                    <div>Rejected</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #89559
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">1 Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">15 Service name here</a></td>
                                            <td>1 Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$107.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                                    <div>Completed</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #56689
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                                    <div>Completed</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #53231
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-warning badge-dot m-r-10"></div>
                                                    <div>Uncompleted</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #53301
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-danger badge-dot m-r-10"></div>
                                                    <div>Rejected</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #89559
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">1 Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">15 Service name here</a></td>
                                            <td>1 Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$107.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                                    <div>Completed</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #56689
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                                    <div>Completed</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #53231
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-warning badge-dot m-r-10"></div>
                                                    <div>Uncompleted</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #53301
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-image avatar-sm m-r-10">
                                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                    </div>
                                                    <h6 class="m-b-0">Requester name here</h6>
                                                </div>
                                            </td>
                                            <td><a href="order-page.html">1 Service name here</a></td>
                                            <td>Company Name Here</td>
                                            <td>Stay in service</td>
                                            <td>8 May 2019</td>
                                            <td>$137.00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge badge-danger badge-dot m-r-10"></div>
                                                    <div>Rejected</div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0">Copyright © 2021 Sanad.sa All rights reserved.</p>
                        <span>
                            <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
                            <a href="" class="text-gray">Privacy &amp; Policy</a>
                        </span>
                    </div>
                </footer>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="assets/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/pages/e-commerce-order-list.js"></script>

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>