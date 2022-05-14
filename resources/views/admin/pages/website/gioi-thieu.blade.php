@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Trang giớI thiệu Website</h1>
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

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cập nhật trang giớI thiệu Website
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (isset($gt))
                                <form role="form" action="{{ route('admin.website.postGioiThieu', ['id' => $gt->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="index_content">Nội dung giới thiệu hiển thị NGOÀI TRANG CHỦ <a href="#"
                                                data-toggle="modal" data-target="#ghi-chu"><i
                                                    class="fa fa-question-circle-o"></i></a> </label>
                                        <textarea class="ckeditor" id="index_content" name="index_content"
                                            placeholder="">{{ $gt->index_content }}</textarea>
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
                                                        <h4 class="modal-title" id="myModalLabel">Hướng dẫn chèn hình ảnh
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ol>
                                                            <li>Tải ảnh lên các công cụ lưu trữ ảnh trực tuyến như: Google
                                                                Drive, Google Photos, Dropbox,... </li>
                                                            <li>Chia sẻ đường link <i
                                                                    style="color: rgb(223, 91, 91)">Public</i>
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
                                    <div class="form-group">
                                        <label for="content">Nội dung TRANG GIỚI THIỆU</label>
                                        <textarea class="ckeditor" id="content" name="content"
                                            placeholder="">{{ $gt->content }}</textarea>
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
                                                        <h4 class="modal-title" id="myModalLabel">Hướng dẫn chèn hình ảnh
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ol>
                                                            <li>Tải ảnh lên các công cụ lưu trữ ảnh trực tuyến như: Google
                                                                Drive, Google Photos, Dropbox,... </li>
                                                            <li>Chia sẻ đường link <i
                                                                    style="color: rgb(223, 91, 91)">Public</i>
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


                                    <input type="submit" class="btn btn-primary mb-2" value="Cập nhật">
                                    <input type="reset" class="btn btn-default" value="Hoàn tác">

                                </form>
                            @else
                                <form role="form" action="{{ route('admin.website.postAddGioiThieu') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="index_content">Nội dung giới thiệu hiển thị NGOÀI TRANG CHỦ</label>
                                        <textarea class="ckeditor" id="index_content" name="index_content"
                                            placeholder=""></textarea>
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
                                                        <h4 class="modal-title" id="myModalLabel">Hướng dẫn chèn hình ảnh
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ol>
                                                            <li>Tải ảnh lên các công cụ lưu trữ ảnh trực tuyến như: Google
                                                                Drive, Google Photos, Dropbox,... </li>
                                                            <li>Chia sẻ đường link <i
                                                                    style="color: rgb(223, 91, 91)">Public</i>
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
                                    <div class="form-group">
                                        <label for="content">Nội dung TRANG GIỚI THIỆU</label>
                                        <textarea class="ckeditor" id="content" name="content" placeholder=""></textarea>
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
                                                        <h4 class="modal-title" id="myModalLabel">Hướng dẫn chèn hình ảnh
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ol>
                                                            <li>Tải ảnh lên các công cụ lưu trữ ảnh trực tuyến như: Google
                                                                Drive, Google Photos, Dropbox,... </li>
                                                            <li>Chia sẻ đường link <i
                                                                    style="color: rgb(223, 91, 91)">Public</i>
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ghi-chu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Nội dung này được hiển thị ở đâu?
                    </h4>
                </div>
                <div class="modal-body">
                    <ol>
                        <li>nội dung được hiển thị ngoài mục "VỀ CHÚNG TÔI" ngoài trang chủ</li>
                        <li><img style="width: 100%;" src="{{asset('images/website/support/ex1.png')}}" alt=""></li>
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

@endsection

@section('script')

@endsection
