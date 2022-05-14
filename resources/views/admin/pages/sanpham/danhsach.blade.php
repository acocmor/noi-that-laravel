@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm</h1>
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
            <p>
                <a class="btn btn-primary" href="{{ route('admin.sanpham.getThem') }}"> <i class="fa fa-plus"></i>
                    Thêm sản
                    phẩm</a>
            <p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách sản phẩm
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-admin">
                            <thead>
                                <tr>
                                    <th class="t-center">STT</th>
                                    <th class="t-center">Tên sản phẩm</th>
                                    <th class="t-center">Loại sản phẩm</th>
                                    <th class="t-center">Hình ảnh</th>
                                    <th class="t-center">Giá</th>
                                    <th class="t-center">Hiển thị</th>
                                    <th class="t-center">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($sp))
                                    <?php $i = 1; ?>
                                    @foreach ($sp as $item)
                                        <tr class="odd gradeX">
                                            <td class="" style="width:40px;text-align: center;">
                                                <p>
                                                    {{ $i }}
                                                </p>
                                            </td>
                                            <td class="" style="width:145px;font-weight: 600; color: rgb(231, 38, 38)">
                                                <p style="line-height: 18px; padding-top: 38px;">
                                                    {{ $item->name }}</p>
                                            </td>
                                            <td style="width:90px;">
                                                <p style="line-height: 18px; padding-top: 38px;">
                                                    @if (isset($item->loaisanpham->name))
                                                        {{ $item->loaisanpham->name }}
                                                    @else
                                                        -
                                                    @endif
                                                </p>
                                            </td>
                                            <td style="width:240px;">
                                                <img src="{{ asset('upload/sanpham/' . $item->hinh_anh) }}" width="200px"
                                                    height="120px" alt="{{ $item->name }}">
                                            </td>
                                            <td style="text-align: right;">
                                                <p style="line-height: 18px; padding-top: 38px;">
                                                    {{ number_format($item->gia) }} VNĐ</p>
                                            </td>
                                            <td style="width:85px;text-align: center;">
                                                <p style="line-height: 0px; padding-top: 48px;">
                                                    <label class="switch">

                                                        <input class="btn-check" type="checkbox" name="hienthi"
                                                            data-id="{{ $item->id }}"
                                                            data-url="{{ route('admin.sanpham.getCheck') }}"
                                                            data-onstyle="success" data-offstyle="danger"
                                                            data-toggle="toggle" data-on="Active" data-off="InActive" @if ($item->hien_thi == true) checked @endif>
                                                        <span class="slider round"></span>

                                                    </label>
                                                </p>
                                            </td>

                                            <td class="center" style="width:160px; text-align: center;">
                                                <p>
                                                    <a class="btn btn-primary btn-xs" href="{{ route('admin.sanpham.getXem', ['id' => $item->id, 'ten-san-pham' => $item->slug]) }}"
                                                        data-url=""
                                                        ​><i class="fa fa-eye"></i> Xem</a>
                                                    <a class="btn btn-success btn-xs"
                                                        href="{{ route('admin.sanpham.formSua', ['id' => $item->id, 'ten-san-pham' => $item->slug]) }}"
                                                        ​><i class="fa fa-edit"></i> Sửa</a>
                                                    <a class="btn btn-danger btn-xs"
                                                        href="{{ route('admin.sanpham.getXoa', ['id' => $item->id]) }}"
                                                        onclick="return ConfirmDelete()"><i class="fa fa-trash"></i> Xoá</a>
                                                </p>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

@endsection

@section('script')

    <script>
        $('.btn-edit').click(function(e) {
            var url = $(this).attr('data-url');
            $('#modal-edit').modal('show');
            e.preventDefault();
            $.ajax({
                //phương thức get
                type: 'get',
                url: url,
                success: function(response) {
                    //đưa dữ liệu controller gửi về điền vào input trong form edit.
                    $('#name-edit').val(response.data.name);
                    $('#name-lsp').val(response.data.name);
                    //thêm data-url chứa route sửa todo đã được chỉ định vào form sửa.
                    $('#form-edit').attr('action', '{{ asset('admin/loai-san-pham/sua/') }}/' +
                        response.data
                        .id)
                },
                error: function(error) {

                }
            })
        })

        $('.btn-check').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var sanpham_id = $(this).data('id');
            var url = $(this).data('url');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: url,
                data: {
                    'id': sanpham_id,
                    'status': status
                },
                success: function(data) {
                    console.log(data.success)
                }
            });
        })

    </script>

@endsection
