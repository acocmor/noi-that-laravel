@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Khách hàng liên hệ (qua trang Liên hệ của Website)</h1>
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
                    Danh sách khách hàng liên hệ
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-admin">
                            <thead>
                                <tr>
                                    <th class="t-center">STT</th>
                                    <th class="t-center">Họ tên</th>
                                    <th class="t-center">Email</th>
                                    <th class="t-center">SĐT</th>
                                    <th class="t-center">Tiêu đề gửi đến</th>
                                    <th class="t-center">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($khlh))
                                    <?php $i = 1; ?>
                                    @foreach ($khlh as $item)
                                        <tr class="odd gradeX">
                                            <td class="" style="width:15px;text-align: center;">
                                                {{ $i }}
                                            </td>
                                            <td class="" style="width:150px;font-weight: 600; color: rgb(51, 12, 122)">
                                                {{ $item->name }}
                                            </td>
                                            <td class="" style="width:150px;">
                                                {{ $item->email }}
                                            </td>
                                            <td class="" style="width:100px; text-align: center">

                                                {{ $item->phone_number }}
                                            </td>
                                            <td class="" style="font-weight: 600;">
                                                <i>
                                                    {{ $item->title }}
                                                </i>
                                            </td>
                                            <td class="center" style="width:120px; text-align: center;">
                                                <a class="btn btn-primary btn-xs btn-view" href="" data-target="#modal-view"
                                                    data-toggle="modal"
                                                    data-url="{{ route('admin.khlienhe.getView', ['id' => $item->id]) }}"
                                                    ​ ​><i class="fa fa-eye"></i> Xem</a>
                                                <a class="btn btn-danger btn-xs"
                                                    href="{{ route('admin.khlienhe.getXoa', ['id' => $item->id]) }}"
                                                    onclick="return ConfirmDelete()"><i class="fa fa-trash"></i> Xoá</a>

                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <p class="help-block"><i style="color: rgb(243, 93, 93)">(*) Click "Xem" để hiển thị đầy đủ nội
                                dung.</i> </p>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('admin.pages.kh_lienhe.modal_view')

@endsection

@section('script')

    <script>
        $('.btn-view').click(function() {
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'get',
                url: url,
                success: function(response) {
                    console.log(response)
                    $('b#name').text(response.data.name)
                    $('i#email').text(response.data.email)
                    $('i#phone_number').text(response.data.phone_number)
                    $('p#title').text(response.data.title)
                    $('p#content').text(response.data.content)
                    

                    $('i#time').text(response.time)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
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

        $('#time').datepicker({
            format: 'mm/dd/yy'
        });

    </script>

@endsection
