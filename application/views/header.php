<!DOCTYPE html>
<html lang="vi" ng-app="app.shop">

<head ng-controller="headerController">
    <meta charset="UTF-8">
    <base href="http://localhost/duy_ci/">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>Thời Trang Hàn Quốc LimeOrange</title>
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <!-- Font CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto+Slab:300,400,500,600,700"> -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,800&amp;subset=cyrillic,latin">
    <!-- Plugin CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- web push -->
    <script type="text/javascript" src="assets/js/client.js"></script>
    <!-- Custom CSS -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/slick-theme.css" rel="stylesheet">
    <link href="assets/css/header.css" rel="stylesheet">
    <link href="assets/css/footer.css" rel="stylesheet">
    <link href="assets/css/base.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
    <link href="assets/css/mypage.css" rel="stylesheet">
    <link href="assets/css/product.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/new_style.css" rel="stylesheet">
    <link href="assets/css/new_style_responsive.css" rel="stylesheet">
    <link href="assets/css/new_login.css" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/angular-xeditable/0.8.1/css/xeditable.min.css" rel="stylesheet" />
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-xeditable/0.8.1/js/xeditable.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script>
        var app = angular.module("app.shop", ["xeditable"]);
    </script>
    <link rel="manifest" href="assets/json/manifest.json">
    <script type="text/javascript" src="../socket.io/socket.io.js"></script>
    <script>
        // goi dien len server
        var socket = io("http://localhost:8080/");
    </script>
    <script>
        // angulajs

        app.controller("headerController", ['$scope', "header", function($scope, header) {

            header.UserInfo().then(function(response) {
                var data = response.data;

                $(document).ready(function() {
                    if (data != "Vui lòng đăng nhập") {
                        $(".chuadangnhap").hide();

                        $("#header-user-name").html(data[0].username);
                        $(".dadangnhap").show();
                    }
                });
            });
            // order product
            function Orderinfo() {
                header.UserOrderInfo().then(function(response) {
                    var data = response.data;

                    $(document).ready(function() {
                        if (data.length != 0) {
                            $("#hd_cart_area").html("");
                            $(".top-menu-cart").bind("mouseover focus", function() {


                                if ($(".apop-wrap").css("display") !== "none") {

                                    $(".apop-wrap").stop().hide();
                                }
                                $(".cpop-wrap").show();
                            });
                            $(".cpop-wrap .span-x").on("click", function() {
                                    $(".cpop-wrap").hide();

                                })
                                // socket.emit("orderproduct");
                            data[0].cartdetaillist.forEach(item => {
                                vals = '<li class="cart_rows"><a href="/detailproduct/' + item.productid + '"><img src=".' + item.productimg + '" class="cpop-img" alt="image"><div class="cpop-txt"><p class="tit">' + item.productname + '</p><ul class="desc"><li><span class="fl">Số lượng</span><span class="fr">' + item.quantity + '</span></li><li><span class="fl">Giá</span><span class="fr">' + item.cost + ' VNĐ</span></li></ul></div></a></li>';
                                $("#hd_cart_area").append(vals);
                            });

                            $("#cart_tt_amount").html(data[0].tongtien);

                            $(".cart-num").html(data[0].soluongpro);
                        } else {
                            $("#cart_tt_amount").html("0");
                            $(".cart-num").html("0");
                        }
                    });
                });
            }
            Orderinfo();
            socket.on("server-send-info-order", function() {
                Orderinfo();
                send2();
            });


        }]);
        app.factory("header", ["$http", function($http) {
            return {
                UserInfo: function() {
                    return $http.get("/api/userinfo")
                },
                UserOrderInfo: function() {
                    return $http.get("/api/usercartlist")
                }
            }
        }]);
    </script>


</head>

<body>

    <!--fixed button-->

    <a href="#fooder" class="scrollToTop"></a>

    <!--// END fixed button-->
    <!--header-->
    <div id="header" class="header">
        <a href="/" class="header-logo">
            <img src="assets/img/logo-main2.svg" class="desktop" alt="limeorange seoul logo">

        </a>
        <!-- seacrh -->
        <form action="/search" method="get" id="searchHeaderForm" name="searchHeaderForm">
            <div class="top-search">
                <span class="close-search-mobile"></span>
                <input type="text" class="" name="product_name" placeholder="" onkeydown="if(event.keyCode == 13){SearchHeader();return false;}">
                <button type="submit" class="search-mobile-button">
                    <img src="assets/img/search.svg" class="icon" alt="search">
                </button>
            </div>
            <div class="top-search-mobile">
                <button type="submit" class="search-mobile-button">
                    <img src="assets/img/search.png" class="icon" alt="search">
                </button>
            </div>
        </form>
        <!-- header-wrap -->
        <div class="header-wrap">
            <button class="header-toggle"><img src="assets/img/menu.png" class="icon" alt="menu"></button>
            <!-- header-menu-wrap -->
            <div class="header-menu-wrap">
                <button class="mobile-close-btn"><span class="hide">X</span></button>
                <div class="top">
                    <div class="container" id="header-top">
                        <div class="pagelink">
                            <ul class="link-page">
                                <li class="page-item"><a href="/brandintro/limeorangeIntroduceInfo">LIMEORANGE</a></li>
                                <li class="page-item"><a href="/Product/productCollectionList?idx=26">AFTER WORK</a></li>
                                <li class="page-item"><a href="/Product/productCollectionList?idx=25">RHYMEORANGE</a></li>
                                <li class="page-item"><a href="http://bwproject.vn" target="_blank">BW PROJECT</a></li>
                            </ul>
                        </div>
                        <ul class="top-menu">

                            <li class="chuadangnhap">

                                <a href="/login" class="top-menu-link login-link">
                                    <img src="assets/img/login.png" class="" alt="limeorange login">
                                    <p>Đăng nhập</p>
                                </a>

                            </li>
                            <li class="dadangnhap" style="display:none">
                                <a href="/mypage" class="top-menu-link login-link">
                                    <img src="assets/img/user.png" class="" alt="limeorange login">
                                    <p id="header-user-name"></p>

                                </a>
                                <a href="/logout" class="top-menu-link login-link">
                                    <img src="assets/img/logout.png" class="" alt="limeorange login">
                                    <p>Logout</p>

                                </a>

                            </li>
                            <li>
                                <a href="/mypage/order" class="top-menu-link">
                                    <img src="assets/img/top-icon03.png" alt="limeorange order">
                                    <p>Giao hàng</p>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="top-menu-link top-menu-cart">
                                    <img src="assets/img/top-icon04.png" alt="limeorange cart">

                                    <p>Giỏ hàng</p>
                                    <span class="cart-num"></span>
                                </a>
                                <!-- 20171020 장바구니팝업 추가 -->
                                <div class="cpop-wrap">
                                    <div class="cpop">
                                        <span class="span-x"><i class="fas fa-times"></i></span>
                                        <!-- cpop-inner -->
                                        <div class="cpop-inner">
                                            <ul id="hd_cart_area" class="cpop-list">
                                            </ul>
                                        </div>
                                        <!--//END cpop-inner -->
                                        <p class="cpop-tot">
                                            <span class="txt">TỔNG ĐƠN HÀNG</span>
                                            <span id="cart_tt_amount" class="num"></span>
                                        </p>
                                        <a href="/orderproduct" class="cpop-link">XEM GIỎ HÀNG</a>
                                    </div>
                                </div>
                                <!--//END 20171020 장바구니팝업 추가 -->
                            </li>
                            <li>
                                <a href="/mypage/wish" class="top-menu-link">
                                    <img src="assets/img/top-icon05.png" alt="limeorange wish">
                                    <p>Yêu thích</p>
                                </a>
                            </li>
                            <li>
                                <a href="/community/qna" class="top-menu-link">
                                    <img src="assets/img/top-icon06.png" alt="limeorange qna">
                                    <p>CSKH</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header-body">
                    <div class="container">
                        <ul class="menu">
                            <li class="menu-item menu-home">
                                <a href="" class="menu-item-link">HOME</a>
                            </li>
                            <li class="menu-item">
                                <a href="/Product/productNewArrivalList" class="menu-item-link">NEW</a>
                            </li>
                            <li class="menu-item">
                                <a href="/Product/productBestList" class="menu-item-link">BEST</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-item-link">BỘ SƯU TẬP</a>
                                <!-- COLLECTION -->
                                <ul class="menu-item-depth2">
                                    <li>
                                        <a href="/Product/productCollectionAll">BỘ SƯU TẬP MỚI</a>
                                    </li>
                                    <li>
                                        <a href="/Product/productCollectionMain">LIME ORANGE</a>
                                    </li>
                                    <li>
                                        <a href="/Product/productCollectionRhymeMain">RHYME ORANGE</a>
                                    </li>
                                    <li>
                                        <a href="/Product/productCollectionAwMain">AFTER WORK</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- 104 -->
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-item-link">NỮ</a>
                                <!-- WOMEN -->
                                <ul class="menu-item-depth2">

                                    <li>
                                        <a href="">
                                           ggdfg
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-item-link">NAM</a>
                                <ul class="menu-item-depth2">

                                    <li>
                                        <a href=">">
                                           321321
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-item-link">
                                    <img src="assets/img/ro-logo.svg" class="ro-logo menu-image menu-image-pc" alt="rhymeorange logo">
                                    <img src="assets/img/ro-logo.svg" class="ro-logo menu-image menu-image-mobile" alt="rhymeorange mobile logo">
                                </a>
                                <ul class="menu-item-depth2">

                                    <li>
                                        <a href="">
                                           321312312
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-item-link">
                                    <img src="assets/img/aw-logo.svg" class="aw-logo menu-image menu-image-pc" alt="afterwork logo">
                                    <img src="assets/img/aw-logo.svg" class="aw-logo menu-image menu-image-mobile" alt="afterwork mobile logo">
                                </a>
                                <ul class="menu-item-depth2">

                                    <li>
                                        <a href="">
                                          32131231232
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <!-- lookbook 추가 : 20171220 -->
                            <li class="menu-item">
                                <a href="/lookbook/lookbooklist" class="menu-item-link">LOOK BOOK</a>
                            </li>
                            <!--// lookbook 추가 : 20171220 -->
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-item-link">CỘNG ĐỒNG</a>
                                <!-- COMMUNITY -->
                                <ul class="menu-item-depth2">
                                    <li>
                                        <a href="/notication">THÔNG BÁO</a>
                                        <!-- NOTICE -->
                                    </li>
                                    <li>
                                        <a href="/community/faq">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="/community/qna">HỎI & ĐÁP</a>
                                        <!-- Q&amp;A -->
                                    </li>
                                </ul>
                            </li>

                            <!-- not sale -->
                            <li class="menu-item">
                                <a href="/Product/productSaleList" class="menu-item-link">SALE</a>
                            </li>
                            <!-- not sale -->

                            <li class="menu-item">
                                <a href="/Product/productEventList" class="menu-item-link">SỰ KIỆN</a>

                            </li>
                            <li class="menu-item">
                                <a href="/Product/productCollectionBwMain" class="menu-item-link">BW PROJECT</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--//end header-menu-wrap -->
        </div>
        <!--// end header-wrap -->

    </div>
    <!--//end header-->