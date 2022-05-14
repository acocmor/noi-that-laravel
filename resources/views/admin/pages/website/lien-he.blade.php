@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Trang liên hệ</h1>
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
                    Trang liên hệ
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="{{ route('admin.website.postLH', ['id' => $lh->id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="content">Nội dung trên trang</label>
                                    <textarea class="ckeditor" id="content" name="content"
                                        placeholder="Nhập mô tả sản phẩm...">{{$lh->content}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="maps">Chèn Google Maps</label><br>
                                    <textarea id="maps" name="maps" cols="110" rows="5"
                                        placeholder="">{{$lh->maps}}</textarea><br>
                                    <a href="#" class="btn btn-outline btn-primary btn-xs" data-toggle="modal"
                                        data-target="#myModal">
                                        Chèn Google Maps
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Hướng dẫn chèn Google Maps
                                                        vào website
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <ol>
                                                        <li>Truy cập đường link: <a
                                                                href="https://www.google.com/maps">https://www.google.com/maps</a>
                                                        </li>
                                                        <li>Tìm đến địa điểm cần chèn vào website trên Google Maps</li>
                                                        <li>Chọn địa điểm đó và ấn <i style="color: red">Chia sẻ </i></li>
                                                        <li>Sang tab <i style="color: red">Nhúng bản đồ </i>.</li>
                                                        <li>Chọn <i style="color: red">SAO CHÉP HTML </i>.</li>
                                                        <li>Paste lại vào đây.</li>
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
@endsection
