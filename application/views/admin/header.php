<!DOCTYPE html>
<html lang="en" ng-app="app.shop">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>Admin page</title>
    <base href="http://localhost/duy_ci/">
    <!-- Bootstrap core CSS-->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Page level plugin CSS-->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/angular-xeditable/0.8.1/css/xeditable.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-xeditable/0.8.1/js/xeditable.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

    <script>
        var app = angular.module("app.shop", ["xeditable"]);
    </script>
    <script src="assets/plugin/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../socket.io/socket.io.js"></script>
    <script>
        // goi dien len server
        var socket = io("http://localhost:8080/");
        $(document).ready(function() {
            // $("#loginForm").show();
            // $("#chatForm").hide();
            // $("#btnRegister").click(function() {
            //     socket.emit("client-send-Username", $("#txtUsername").val());

            // });
            socket.on("useronline", function(data) {
                console.log(data);
                $("#usecount").html(data);
            });
            socket.on("ordernumber", function(data) {

                // $("#ordernumber").html("<p>" + data + "</p>");
                $(".ordernumber").html(data);
            });



        });
    </script>
</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">


        <a class="navbar-brand mr-1" href="<?php echo base_url()."admin"; ?>">Admin home page</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <span class="badge badge-danger ordernumber "></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                    <a class="dropdown-item" href="/admin/cartlist">Có <span class="ordernumber maudo" ></span> đơn hàng đang chờ xác nhận</a>

                    <div class="dropdown-divider"></div>

                </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    <span class="badge badge-danger">7</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
            <li><a class="navbar-brand mr-1" href="<?php echo base_url(); ?>">Home page</a></li>
        </ul>
    </nav>
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url()."admin"; ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Banner</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Product</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                    <a class="dropdown-item" href="/category">Category</a>
                    <a class="dropdown-item" href="<?php echo base_url()."admin/product"; ?>">Product</a>

                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/admin/cartlist">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Cart list</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/static">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Static</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/notication">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Notication</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/list_store">
                    <i class="fas fa-fw fa-table"></i>
                    <span>List store</span></a>
            </li>
        </ul>