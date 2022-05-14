@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thông tin người dùng</h1>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
    @endif
    @if (session('thongbao'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{ session('thongbao') }}
        </div>
    @endif
    @if (session('loi'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{ session('loi') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="panel tabbed-panel panel-primary">
                <div class="panel-heading clearfix">
                    <div class="pull-left">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-info-1" data-toggle="tab">Thông tin chung</a></li>
                            <li><a href="#tab-info-2" data-toggle="tab">Đổi mật khẩu</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab-info-1">
                            <form action="#" method="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Chức vụ</label>
                                    <input type="text" class="form-control" id="manv" placeholder="Mã nhân viên"
                                        name="ma_nv" value="{{ Auth::user()->role->role_name }}" readonly="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Mã nhân viên</label>
                                    <input type="text" class="form-control" id="manv" placeholder="Mã nhân viên"
                                        name="ma_nv" value="{{ Auth::user()->ma_nv }} " readonly="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Họ tên</label>
                                    <input type="text" class="form-control" id="name" placeholder="Họ và tên" name="name"
                                        value="{{ Auth::user()->name }}" autocomplete="off" readonly=""/>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                        value="{{ Auth::user()->email }}" autocomplete="off" readonly="" />
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tab-info-2">
                            <form action="{{route('admin.user.changePass')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Mật khẩu cũ</label>
                                    <input type="password" class="form-control" id="old_password" placeholder="Nhập mật khẩu cũ..."
                                        name="old_password" value="" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Mật khẩu mới</label>
                                    <input type="password" class="form-control" id="new_password" placeholder="Nhập mật khẩu mới..."
                                        name="new_password" value="" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Xác nhận mật mới</label>
                                    <input type="password" class="form-control" id="confirm_password" placeholder="Xác nhận mật khẩu mới..."
                                        name="confirm_password" value="" >
                                </div>

                                <button type="submit" class="btn btn-primary mb-2" onclick="return ConfirmResetPass()">Xác nhận</button>
                                <button type="reset" class="btn btn-default">Nhập lại</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.panel -->
        </div>

    </div>

@endsection
@section('script')
    <script type="text/javascript">
        function ConfirmResetPass() {
            var x = confirm("Bạn có muốn đặt lại mật khẩu?");
            if (x)
                return true;
            else
                return false;
        }
    </script>

@endsection