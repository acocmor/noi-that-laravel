@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách loại sản phẩm</h1>
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
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-add"> <i class="fa fa-plus"></i>
                    Thêm loại sản
                    phẩm</a>
            <p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách loại sản phẩm
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-admin">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên loại sản phẩm</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($lsp))
                                    <?php $i = 1; ?>
                                    @foreach ($lsp as $item)
                                        @if ($i % 2 == 0)
                                            <tr class="odd gradeX">
                                                <td class="" style="width: 80px; text-align: center;">{{ $i }}
                                                </td>
                                                <td class="" style="font-weight: 600; color: rgb(231, 38, 38)">
                                                    {{ $item->name }}</td>
                                                <td class="center" style="width: 150px; text-align: center;">
                                                    <a
                                                        class="btn btn-success btn-xs btn-edit" href="#"
                                                        data-url="{{ route('admin.loaisanpham.postSua', ['id' => $item->id]) }}"
                                                        ​><i class="fa fa-edit"></i> Sửa</a>
                                                    <a class="btn btn-danger btn-xs"
                                                        href="{{ route('admin.loaisanpham.getXoa', ['id' => $item->id]) }}"
                                                        onclick="return ConfirmDelete()"><i class="fa fa-trash"></i> Xoá</a>
                                                </td>
                                            </tr>
                                        @elseif($i % 2 != 0)
                                            <tr class="even gradeC">
                                                <td class="" style="width: 40px; text-align: center;">{{ $i }}
                                                </td>
                                                <td class="" style="font-weight: 600; color: rgb(231, 38, 38)">
                                                    {{ $item->name }}</td>
                                                <td class="center" style="width: 150px; text-align: center;">
                                                    <a
                                                        class="btn btn-success btn-xs btn-edit" href="#"
                                                        data-url="{{ route('admin.loaisanpham.postSua', ['id' => $item->id]) }}"
                                                        ​><i class="fa fa-edit"></i> Sửa</a>
                                                    <a class="btn btn-danger btn-xs"
                                                        href="{{ route('admin.loaisanpham.getXoa', ['id' => $item->id]) }}"
                                                        onclick="return ConfirmDelete()"><i class="fa fa-trash"></i> Xoá</a>
                                                </td>
                                            </tr>
                                        @endif
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
    @include('admin.pages.loaisanpham.modal_add')
    @include('admin.pages.loaisanpham.modal_edit')

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

    </script>

@endsection
