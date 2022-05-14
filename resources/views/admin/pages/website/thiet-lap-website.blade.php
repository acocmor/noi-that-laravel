@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thiết lập chung</h1>
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
                    Thiết lập chung website
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (isset($tlc))
                                <form role="form" action="{{ route('admin.website.postTLC', ['id' => $tlc->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">Địa chỉ web site:</label>
                                        <input class="form-control" id="name" name="name"
                                            placeholder="VD: http://website.com" value="{{ $tlc->name_website }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name_website">Tên web site:</label>
                                        <input class="form-control" id="name_website" name="name_website"
                                            placeholder="VD: Công Ty A" value="{{ $tlc->ten_cong_ty }}">
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <label for="logo">Hình ảnh logo:</label>
                                                <input type="file" class="custom-file-input" id="logo" name="logo">
                                            </div>
                                            <span>Ảnh logo: </span>
                                            <img src="{{ asset('images/website/logo/' . $tlc->logo) }}" id="blah"
                                                width="150px" height="150px">
                                        </div>
                                        <p class="help-block"><i>Kích thước tối thiểu 60*70px</i> </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="dia_chi">Địa chỉ chính:</label>
                                        <input type="text" class="form-control" id="dia_chi" name="dia_chi"
                                            placeholder="Nhập địa chỉ..." value="{{ $tlc->dia_chi }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="hotline">Hotline / Số điện thoại chính:</label>
                                        <input type="text" class="form-control" id="hotline" name="hotline"
                                            placeholder="Nhập số điện thoại..." value="{{ $tlc->hotline }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Nhập email..." value="{{ $tlc->email }}">
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <label for="banner">Hình ảnh banner (đầu trang web):</label>
                                                <input type="file" class="custom-file-input" id="banner" name="banner">
                                            </div>
                                            <span>Ảnh banner: </span>
                                            <img src="{{ asset('images/website/banner/' . $tlc->banner) }}" id="blah2"
                                                width="700px" height="100px">
                                        </div>
                                        <p class="help-block"><i>Kích thước tối thiểu 700*70px. Có thể dùng ảnh động
                                                GIF.</i>
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <label for="slide">Hình ảnh Slide (Ảnh bìa) ngoài trang chủ:</label>
                                                <input type="file" class="custom-file-input" id="slide" name="slide">
                                            </div>
                                            <span>Ảnh Slide: </span>
                                            <img src="{{ asset('images/website/slides/' . $tlc->slide) }}" id="blah3"
                                                width="700px" height="300px">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="social_facebook">Chèn Plugin Fanpage Facebook</label><br>
                                        <textarea id="social_facebook" name="social_facebook" cols="110" rows="5"
                                            placeholder="">{{ $tlc->social_facebook }}</textarea>
                                        <a href="#" class="btn btn-outline btn-primary btn-xs" data-toggle="modal"
                                            data-target="#myModal">
                                            Hướng dẫn chèn Plugin Facebook vào website
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Hướng dẫn chèn Plugin
                                                            Facebook
                                                            vào website
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ol>
                                                            <li>Truy cập đường link: <a
                                                                    href="https://developers.facebook.com/docs/plugins/page-plugin">https://developers.facebook.com/docs/plugins/page-plugin</a>
                                                            </li>
                                                            <li>Mục <i style="color: red">URL Trang Facebook</i> điền đường
                                                                dẫn
                                                                của facepage Facebook.</li>
                                                            <li>Mục <i style="color: red">Tab</i> điền <i>"timeline"</i>.
                                                            </li>
                                                            <li>Mục <i style="color: red">Chiều rộng </i>: <i>"260"</i>, <i
                                                                    style="color: red">Chiều cao </i>: <i>"300"</i>.</li>
                                                            <li>Tích chọn <i style="color: red">Phù hợp với chiều rộng vùng
                                                                    chứa plugin </i>.</li>
                                                            <li>Ấn <i style="">Lấy mã </i>.</li>
                                                            <li>Sang mục <i style="color: red">IFrame</i> copy mã và paste
                                                                vào đây.</li>
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
                                    <input type="submit" class="btn btn-primary mb-2" value="Sửa">
                                    <input type="reset" class="btn btn-default" value="Nhập lại">
                                </form>
                            @else
                                <form role="form" action="{{ route('admin.website.postThemTLC') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">Địa chỉ web site:</label>
                                        <input class="form-control" id="name" name="name"
                                            placeholder="VD: http://website.com" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="name_website">Tên web site:</label>
                                        <input class="form-control" id="name_website" name="name_website"
                                            placeholder="VD: Công Ty A" value="">
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <label for="logo">Hình ảnh logo:</label>
                                                <input type="file" class="custom-file-input" id="logo" name="logo">
                                            </div>
                                            <span>Ảnh logo: </span>
                                            <img src="" id="blah"
                                                width="150px" height="150px">
                                        </div>
                                        <p class="help-block"><i>Kích thước tối thiểu 60*70px</i> </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="dia_chi">Địa chỉ chính:</label>
                                        <input type="text" class="form-control" id="dia_chi" name="dia_chi"
                                            placeholder="Nhập địa chỉ..." value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="hotline">Hotline / Số điện thoại chính:</label>
                                        <input type="text" class="form-control" id="hotline" name="hotline"
                                            placeholder="Nhập số điện thoại..." value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Nhập email..." value="">
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <label for="banner">Hình ảnh banner (đầu trang web):</label>
                                                <input type="file" class="custom-file-input" id="banner" name="banner">
                                            </div>
                                            <span>Ảnh banner: </span>
                                            <img src="" id="blah2"
                                                width="700px" height="100px">
                                        </div>
                                        <p class="help-block"><i>Kích thước tối thiểu 700*70px. Có thể dùng ảnh động
                                                GIF.</i>
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <label for="slide">Hình ảnh Slide (Ảnh bìa) ngoài trang chủ:</label>
                                                <input type="file" class="custom-file-input" id="slide" name="slide">
                                            </div>
                                            <span>Ảnh Slide: </span>
                                            <img src="" id="blah3"
                                                width="700px" height="300px">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="social_facebook">Chèn Plugin Fanpage Facebook</label><br>
                                        <textarea id="social_facebook" name="social_facebook" cols="110" rows="5"
                                            placeholder=""></textarea>
                                        <a href="#" class="btn btn-outline btn-primary btn-xs" data-toggle="modal"
                                            data-target="#myModal">
                                            Hướng dẫn chèn Plugin Facebook vào website
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Hướng dẫn chèn Plugin
                                                            Facebook
                                                            vào website
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ol>
                                                            <li>Truy cập đường link: <a
                                                                    href="https://developers.facebook.com/docs/plugins/page-plugin">https://developers.facebook.com/docs/plugins/page-plugin</a>
                                                            </li>
                                                            <li>Mục <i style="color: red">URL Trang Facebook</i> điền đường
                                                                dẫn
                                                                của facepage Facebook.</li>
                                                            <li>Mục <i style="color: red">Tab</i> điền <i>"timeline"</i>.
                                                            </li>
                                                            <li>Mục <i style="color: red">Chiều rộng </i>: <i>"260"</i>, <i
                                                                    style="color: red">Chiều cao </i>: <i>"300"</i>.</li>
                                                            <li>Tích chọn <i style="color: red">Phù hợp với chiều rộng vùng
                                                                    chứa plugin </i>.</li>
                                                            <li>Ấn <i style="">Lấy mã </i>.</li>
                                                            <li>Sang mục <i style="color: red">IFrame</i> copy mã và paste
                                                                vào đây.</li>
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

@endsection

@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#logo").change(function() {
            readURL(this);
        });

    </script>
    <script type="text/javascript">
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#banner").change(function() {
            readURL2(this);
        });

    </script>
    <script type="text/javascript">
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah3').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#slide").change(function() {
            readURL2(this);
        });

    </script>
@endsection
