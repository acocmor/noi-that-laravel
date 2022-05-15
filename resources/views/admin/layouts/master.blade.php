<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Trang quản trị</title>

    <link href="{{ asset('front-end/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/admin/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/admin/css/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/admin/css/dataTables/dataTables.responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/admin/css/startmin.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <style>
        .t-center {
            text-align: center;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 52px;
            height: 26px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        table tr td p {
            line-height: 120px;
        }

    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Quản trị</a>
            </div>

            <ul class="nav navbar-nav navbar-left navbar-top-links">
                <li><a href="{{ route('index') }}"><i class="fa fa-home fa-fw"></i> Website</a></li>
            </ul>

            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }}<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ route('admin.user.getProfile') }}"><i class="fa fa-user fa-fw"></i> Thông tin
                                tài khoản</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ route('admin.index') }}" class="active"><i class="fa fa-dashboard fa-fw"></i>
                                Trang chính</a>
                        </li>
                        <li>
                            <a href={{ route('admin.dathang.getDanhSach') }}><i class="fa fa-table fa-fw"></i> DS
                                đặt hàng</a>
                        </li>
                        <li>
                            <a href={{ route('admin.donhang.getDanhSach') }}><i class="fa fa-table fa-fw"></i> DS
                                khách hàng cần mua sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.khlienhe.getDanhSach') }}"><i class="fa fa-edit fa-fw"></i> Liên
                                hệ của khách hàng (qua trang Liên hệ) </a>
                        </li>
                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                            <li>
                                <a href="#"><i class="fa fa-cube fa-fw"></i> Sản phẩm<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.loaisanpham.getDanhSach') }}">Loại sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.sanpham.getDanhSach') }}">Danh sách sản phẩm</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        @endif

                        @if (Auth::user()->role_id == 1)
                            <li>
                                <a href="{{ route('admin.website.getDanhSach') }}"><i class="fa fa-wrench fa-fw"></i>
                                    Website<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.website.getTLC') }}">Thiết lập chung</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.website.getGioiThieu')}}">Cập nhật trang giới thiệu Website</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.website.getCS') }}">Chính sách website</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.website.getLH') }}">Cập nhật trang liên hệ</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.website.getCH') }}">Danh sách cửa hàng</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            {{-- <li>
                                <a href={{ route('admin.user.getCN') }}><i class="fa fa-list fa-fw"></i>
                                    Chức năng khác</a>
                            </li> --}}
                            <li>
                                <a href={{ route('admin.user.getDanhSach') }}><i class="fa fa-group fa-fw"></i> Danh
                                    sách người dùng</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>

    {{-- <script src="https://code.jquery.com/jquery-latest.js"></script> --}}
    <script src="{{ asset('front-end/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-end/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-end/admin/js/metisMenu.min.js') }}"></script>

    <script src="{{ asset('front-end/admin/js/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('front-end/admin/js/dataTables/dataTables.bootstrap.min.js') }}"></script>

    <script src="{{ asset('front-end/admin/js/startmin.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            $('#table-admin').DataTable({
                responsive: true
            });
        });

    </script>

    <script>
        function ConfirmDelete() {
            var x = confirm("Bạn có muốn xoá?");
            if (x)
                return true;
            else
                return false;
        }

    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    @yield('script')
    <script type="text/javascript">
        $(".alert").fadeTo(4500, 800).slideUp(800, function() {
            $(".alert").slideUp(800);
        });

    </script>
</body>

</html>
