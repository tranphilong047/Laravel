<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from themeforestdemo.com/templates/shapebootstrap/html/be-admin/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 May 2017 03:22:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Admin</title>

        <!-- Bootstrap -->
        <link href="{{asset('backend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/waves.min.css')}}" type="text/css" rel="stylesheet">
        <!--        <link rel="stylesheet" href="css/nanoscroller.css">-->
        <link href="{{asset('backend/css/menu-light.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('backend/')}}css/style.css" type="text/css" rel="stylesheet">
        <link href="{{asset('backend/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Static navbar -->

        <nav class="navbar navbar-default yamm navbar-fixed-top">
            <div class="container-fluid">
                <span class="search-icon"><i class="fa fa-search"></i></span>
                <div class="search" style="display: none;">
                    <form role="form">
                        <input type="text" class="form-control" autocomplete="off" placeholder="Tìm Kiếm">
                        <span class="search-close"><i class="fa fa-times"></i></span>
                    </form>
                </div>
                
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle button-wave" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản Phẩm <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{URL::to('/add-product')}}">Thêm Sản Phẩm</a></li>
                                <li><a href="{{URL::to('/all-product')}}">Liệt Kê Sản Phẩm</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle button-wave" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Thương Hiệu <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{URL::to('/add-brand-product')}}">Thêm Thương Hiệu</a></li>
                                <li><a href="{{URL::to('/all-brand-product')}}">Liệt Kê Thương Hiệu</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle button-wave" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Danh Mục <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{URL::to('/add-category-product')}}">Thêm Danh Mục</a></li>
                                <li><a href="{{URL::to('/all-category-product')}}">Liệt Kê Danh Mục</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle button-wave" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Banner <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{URL::to('/add-slider')}}">Thêm Banner</a></li>
                                <li><a href="{{URL::to('/all-slider')}}">Liệt Kê Banner</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle button-wave" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mã Giảm Giá <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{URL::to('/insert-coupon')}}">Thêm Mã Giảm Giá</a></li>
                                <li><a href="{{URL::to('/list-coupon')}}">Liệt Kê Mã Giảm Giá</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle button-wave" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hóa Đơn <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{URL::to('/list-order')}}">Hóa Đơn</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle button-wave" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img alt="image" class="img-circle" src="{{asset('backend/images/2.png')}}" width="30"> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                 <li><a href="#"><?php
                                            $name = Session::get('admin_name');
                                            if($name){
                                                echo $name;
                                            }
                                        ?>  </a></li>
                                <li><a href="#"><i class="fa fa-user"></i>My Profile</a></li>
                                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
        <section class="page">
            <div id="wrapper">
                @yield('admin_content')     
            </div>
        </section>

        <script type="text/javascript" src="{{asset('backend/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('backend/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('backend/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <!-- Flot -->
        <script src="{{asset('backend/js/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('backend/js/flot/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('backend/js/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('backend/js/flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('backend/js/chartjs/Chart.min.js')}}"></script>
        <script src="{{asset('backend/js/pace.min.js')}}"></script>
        <script src="{{asset('backend/js/waves.min.js')}}"></script>
        <script src="{{asset('backend/js/morris_chart/raphael-2.1.0.min.js')}}"></script>
        <script src="{{asset('backend/js/morris_chart/morris.js')}}"></script>

        <script src="{{asset('backend/js/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!--        <script src="js/jquery.nanoscroller.min.js"></script>-->
        <script type="text/javascript" src="{{asset('backend/js/custom.js')}}"></script>
        <!-- ChartJS-->
        <script src="{{asset('backend/js/chartjs/Chart.min.js')}}"></script>

        {{-- validator --}}
        <script src="{{asset('backend/js/jquery.form-validator.min.js')}}"></script>
        <script type="text/javascript">
            $.validate({

            });
        </script>
        {{-- ckeditor --}}
        <script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace('ckeditor1');
            CKEDITOR.replace('ckeditor2');
        </script>
        <script>
            $(document).ready(function () {

                var lineData = {
                    labels: ["January", "February", "March", "April", "May"],
                    datasets: [
                        {
                            label: "Example dataset",
                            fillColor: "rgba(120,120,120,0.5)",
                            strokeColor: "rgba(120,120,120,1)",
                            pointColor: "rgba(120,120,120,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56]
                        },
                        {
                            label: "Example dataset",
                            fillColor: "rgba(223, 61, 130,0.5)",
                            strokeColor: "rgba(223, 61, 130,0.7)",
                            pointColor: "rgba(223, 61, 130,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(223, 61, 130,1)",
                            data: [28, 48, 40, 19, 86]
                        }
                    ]
                };

                var lineOptions = {
                    scaleShowGridLines: true,
                    scaleGridLineColor: "rgba(0,0,0,.05)",
                    scaleGridLineWidth: 1,
                    bezierCurve: true,
                    bezierCurveTension: 0.4,
                    pointDot: true,
                    pointDotRadius: 4,
                    pointDotStrokeWidth: 1,
                    pointHitDetectionRadius: 20,
                    datasetStroke: true,
                    datasetStrokeWidth: 2,
                    datasetFill: true,
                    responsive: true
                };


                var ctx = document.getElementById("lineChart").getContext("2d");
                var myNewChart = new Chart(ctx).Line(lineData, lineOptions);

            });
        </script>


        <script type="text/javascript">
            $(function () {

                var barData = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.5)",
                            strokeColor: "rgba(220,220,220,0.8)",
                            highlightFill: "rgba(220,220,220,0.75)",
                            highlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(223, 61, 130,0.5)",
                            strokeColor: "rgba(223, 61, 130,0.8)",
                            highlightFill: "rgba(223, 61, 130,0.75)",
                            highlightStroke: "rgba(223, 61, 130,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };

                var barOptions = {
                    scaleBeginAtZero: true,
                    scaleShowGridLines: true,
                    scaleGridLineColor: "rgba(0,0,0,.05)",
                    scaleGridLineWidth: 1,
                    barShowStroke: true,
                    barStrokeWidth: 2,
                    barValueSpacing: 5,
                    barDatasetSpacing: 1,
                    responsive: true
                };


                var ctx = document.getElementById("barChart").getContext("2d");
                var myNewChart = new Chart(ctx).Bar(barData, barOptions);

            });
        </script>
        <!-- Google Analytics:  -->
        <script>
            (function (i, s, o, g, r, a, m)
            {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function ()
                {
                    (i[r].q = i[r].q || []).push(arguments);
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '../../../../../www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-3560057-28', 'auto');
            ga('send', 'pageview');
        </script>
    </body>

<!-- Mirrored from themeforestdemo.com/templates/shapebootstrap/html/be-admin/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 May 2017 03:22:41 GMT -->
</html>
