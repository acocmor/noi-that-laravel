@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm mới chính sách</h1>
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

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thêm mới chính sách
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="{{ route('admin.website.postThemCS') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Tên chính sách</label>
                                    <input class="form-control" id="title" name="title" placeholder="Nhập tên chính sách">
                                </div>
                                <div class="form-group">
                                    <label for="hien_thi">Hiển thị lên Website: </label>
                                    <label class="switch">
                                        <input type="checkbox" name="hien_thi" checked>
                                        <span class="slider round"></span>
                                    </label>
                                    <p class="help-block"><i>Mặc định là "Hiển thị".</i> </p>
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội dung chính sách</label>
                                    <textarea class="ckeditor" id="content" name="content"
                                        placeholder="Nhập mô tả sản phẩm..."></textarea>
                                    <a href="#" class="btn btn-outline btn-primary btn-xs" data-toggle="modal"
                                        data-target="#myModal">
                                        Hướng dẫn chèn hình ảnh
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Hướng dẫn chèn hình ảnh</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <ol>
                                                        <li>Tải ảnh lên các công cụ lưu trữ ảnh trực tuyến như: Google
                                                            Drive, Google Photos, Dropbox,... </li>
                                                        <li>Chia sẻ đường link <i style="color: rgb(223, 91, 91)">Public</i>
                                                            của hình ảnh.</li>
                                                        <li>Copy đường link và nhúng vào trình soạn thảo.</li>
                                                    </ol>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-default" data-dismiss="modal">Đóng</a>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary mb-2" value="Thêm">
                                <input type="reset" class="btn btn-default" value="Nhập lại">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
