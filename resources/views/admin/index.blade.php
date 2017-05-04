<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ url('public/favicon.ico')}}">
    <title>Gretong Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{ url('public/dist/sweetalert.css') }}">
    <script src="{{ url('public/dist/sweetalert.min.js') }}"></script>
    
    <!-- Bootstrap Core CSS -->
    <link href="{{ url('public/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('public/vendor/bootstrap-social/bootstrap-social.css')}}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{ url('public/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('public/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ url('public/vendor/morrisjs/morris.css')}}" rel="stylesheet">

        <!-- DataTables CSS -->
    <link href="{{ url('public/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ url('public/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('public/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ url('public/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('public/js/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ url('public/css/style.css') }}"></script>
    <script type="text/javascript"> 
        var baseURL = "{!!url('/')!!}";
    </script>
    
    <script src="{{ url('public/js/func_ckfinder.js') }}"></script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Gretong Admin Dashboard</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
           <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {{ Auth::user()->username }} </a>
                        </li>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{!! route('admin.logout') !!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    <!--     <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        
                        </li> -->
                        <li>
                            <a href="{!! URL::route('admin.dashboard') !!}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Danh mục<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::route('admin.cate.getList') !!}">Danh sách danh mục</a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('admin.cate.getAdd') !!}">Thêm một danh mục mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::route('admin.product.getList') !!}">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('admin.product.getAdd') !!}">Thêm sản phẩm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-home fa-fw"></i> Trang chủ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::route('admin.homepage.getList') !!}">Sửa tiêu đề và nội dung</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

     
             <!--Content here-->
            
    </div>
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('controller')
                            <small>@yield('action')</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        @if (Session::has('flash_massage'))
                            <div class="alert alert-{!! Session::get('flash_level') !!}">
                                {!! Session::get('flash_massage') !!}
                            </div>
                        @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <!-- START -  Đây là phần chứa content trong dashboard-->
                    @yield('content')
                     <!-- END -  Đây là phần chứa content trong dashboard-->


            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
</div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{ url('public/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('public/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('public/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <script src="{{ url('public/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ url('public/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ url('public/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ url('public/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{ url('public/vendor/morrisjs/morris.min.js')}}"></script>
    <script src="{{ url('public/data/morris-data.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ url('public/dist/js/sb-admin-2.js')}}"></script>
    <script src="{{ url('public/js/myScript.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
        $('#dataTables-2').DataTable({
            responsive: true
        });
        $('div.alert').delay(3000).slideUp();
    });
    </script>
</body>

</html>
