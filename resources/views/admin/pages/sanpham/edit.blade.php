@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thông tin sản phẩm</h1>
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
                    Thông tin sản phẩm
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="{{ route('admin.sanpham.postSua', ['id'=>$sp->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="loaisanpham">Tên loại sản phẩm</label>
                                    <select class="form-control" style="width: 30%" name="loaisanpham" id="loaisanpham">
                                        <option value="" disabled selected>--- Loại sản phẩm ---</option>
                                        @if (isset($lsp))
                                            @foreach ($lsp as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($sp->loai_san_pham_id == $item->id)
                                                        selected
                                                    @endif
                                                    >{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm</label>
                                    <input class="form-control" id="name" name="name" placeholder="Độ dài tên lớn hơn 3..." value="{{$sp->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="gia">Giá sản phẩm (VNĐ)</label>
                                    <input type="number" style="width: 30%" class="form-control" id="gia" name="gia"
                                        placeholder="Nhập giá sản phẩm" value="{{$sp->gia}}">
                                    <p class="help-block"><i>Giá = 0 VNĐ => Hiển thị website: "Liên hệ".</i> </p>
                                </div>
                                <div class="form-group">
                                    <label for="giamgia">Mức giảm giá (VNĐ)</label>
                                    <input type="number" style="width: 30%" class="form-control" id="giamgia" name="giamgia"
                                        placeholder="Nhập mức giảm giá" value="{{$sp->giam_gia}}">
                                    <p class="help-block"><i>Mặc định: 0 VNĐ</i> </p>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <label for="hinhanh">Hình ảnh sản phẩm</label>
                                            <input type="file" class="custom-file-input" id="hinhanh" name="hinhanh">
                                        </div>
                                        <span>Hình ảnh sản phẩm: </span>
                                        <img id="blah" width="250px" height="250px" src="{{asset('upload/sanpham/'.$sp->hinh_anh)}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="hinhanh">Hiển thị lên Website: </label>
                                    <label class="switch">
                                        <input type="checkbox" name="hienthi" 
                                        @if ($sp->hien_thi == 1)
                                            checked
                                        @endif
                                        >
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="mota">Mô tả sản phẩm</label>
                                    <textarea class="ckeditor" id="mota" name="mota"
                                        placeholder="Nhập mô tả sản phẩm...">{{$sp->mo_ta}}</textarea>
                                    <a href="#" class="btn btn-outline btn-primary btn-xs" data-toggle="modal"
                                        data-target="#myModal">
                                        Hướng dẫn chèn hình ảnh vào mô tả
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
                                <div class="form-group">
                                    <label for="daban">Tuỳ chỉnh số lượng đã bán sản phẩm</label>
                                    <input type="number" style="width: 30%" class="form-control" id="daban" name="daban"
                                        placeholder="" value="{{$sp->da_ban}}">
                                    <p class="help-block" style="color: rgb(245, 150, 150);"><i class="fa fa-warning"></i>
                                        Cảnh báo: Thay đổi số lượng thực tế đã bán ra!</p>
                                </div>

                                <input type="submit" class="btn btn-primary mb-2" value="Sửa">
                                <input type="reset" class="btn btn-default" value="Hoàn tác">

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
        $("#hinhanh").change(function() {
            readURL(this);
        });

    </script>
@endsection
