@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh tài khoản người dùng</h1>
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

    <div class="panel panel-default">
        <div class="panel-heading">
            Sửa User
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.user.postSua', ['id' => $user->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Chức vụ</label>
                    <select style="width: 200px" class="form-control" id="role_id" name="role_id">
                        @if ($user->id == 1)
                            <option value="{{ $user->role->id }}">{{ $user->role->role_name }}</option>
                        @else
                            @foreach ($role as $r)
                                @if ($r->id != 1)
                                    <option value="{{ $r->id }}" @if ($user->role_id == $r->id) selected @endif>
                                        {{ $r->role_name }}</option>
                                @endif

                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Mã nhân viên</label>
                    <input type="text" class="form-control" id="manv" placeholder="Mã nhân viên" name="ma_nv"
                        value="{{ $user->ma_nv }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Họ tên</label>
                    <input type="text" class="form-control" id="name" placeholder="Họ và tên" name="name"
                        value="{{ $user->name }}" autocomplete="off" />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                        value="{{ $user->email }}" autocomplete="off" readonly="" />
                </div>

                <button type="submit" class="btn btn-primary mb-2">Sửa</button>
                <button type="reset" class="btn btn-default">Nhập lại</button>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Đặt lại mật khẩu
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.user.postResetPassword', ['id' => $user->id]) }}" method="post">
                @csrf
                <label for="exampleFormControlInput1">Đặt lại mật khẩu về mặc định là: 12345678</label>
                <button type="submit" class="btn btn-primary mb-2" onclick="return ConfirmResetPass()">Đặt lại mật
                    khẩu</button>
            </form>
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
