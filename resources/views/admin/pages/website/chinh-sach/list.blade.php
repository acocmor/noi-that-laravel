@extends('admin.layouts.master')

@section('content')
<style>
    table tr td p {
        line-height: 0;
        padding-top: 12px;
    }
</style>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách các chính sách</h1>
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
                <a class="btn btn-primary" href="{{ route('admin.website.getThemCS') }}"> <i class="fa fa-plus"></i>
                    Thêm chính sách mới</a>
            <p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách các chính sách
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-admin">
                            <thead>
                                <tr>
                                    <th class="t-center">STT</th>
                                    <th class="t-center">Tên chính sách</th>
                                    <th class="t-center">Nội dung</th>
                                    <th class="t-center">Hiển thị</th>
                                    <th class="t-center">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($cs))
                                    <?php $i = 1; ?>
                                    @foreach ($cs as $item)
                                        <tr class="odd gradeX">
                                            <td class="" style="width:40px;text-align: center;">
                                                <p>
                                                    {{ $i }}
                                                </p>
                                            </td>
                                            <td class="" style="font-weight: 600;color: rgb(231, 38, 38)">
                                                <p style="">
                                                    {{ $item->title }}</p>
                                            </td>
                                            <td>
                                                <i style="color: rgb(3, 124, 84)" >Bấm "Xem" để hiển thị chi tiết.</i>
                                            </td>
                                            <td style="text-align: center;">
                                                <p style="">
                                                    <label class="switch">
                                                        <input class="btn-check" type="checkbox" name="hienthi"
                                                            data-id="{{ $item->id }}"
                                                            data-url="{{ route('admin.website.getCheckCS') }}"
                                                            data-onstyle="success" data-offstyle="danger"
                                                            data-toggle="toggle" data-on="Active" data-off="InActive" @if ($item->hien_thi == true) checked @endif>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </p>
                                            </td>

                                            <td class="center" style="width:160px; text-align: center;">
                                                <p>
                                                    <a class="btn btn-primary btn-xs" href="{{ route('admin.website.getXemCS', ['id' => $item->id, 'chinh-sach' => $item->slug]) }}"
                                                        data-url=""
                                                        ​><i class="fa fa-eye"></i> Xem</a>
                                                    <a class="btn btn-success btn-xs"
                                                        href="{{ route('admin.website.getSuaCS', ['id' => $item->id, 'chinh-sach' => $item->slug]) }}"
                                                        ​><i class="fa fa-edit"></i> Sửa</a>
                                                    <a class="btn btn-danger btn-xs"
                                                        href="{{ route('admin.website.getXoaCS', ['id' => $item->id]) }}"
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
        $('.btn-check').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var cs_id = $(this).data('id');
            var url = $(this).data('url');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: url,
                data: {
                    'id': cs_id,
                    'status': status
                },
                success: function(data) {
                    console.log(data.success)
                }
            });
        })

    </script>

@endsection
