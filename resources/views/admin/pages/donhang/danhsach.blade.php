@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách khách hàng liên hệ cần tư vấn, mua sản phẩm</h1>
        </div>
    </div>

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
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Ghi chú</th>
                                    <th>Sản phẩm quan tâm</th>
                                    <th>Thời gian gửi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($kh))
                                <?php $i = 1; ?>
                                    @foreach ($kh as $item)
                                        <tr class="odd gradeX">
                                            <td>{{$i}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->phone_number}}</td>
                                            <td>{{$item->ghi_chu}}</td>
                                            <td>
                                                <a href="{{route('admin.donhang.getXem', ['id' => $item->sanpham->id])}}">{{$item->sanpham->name}}</a>
                                            </td>
                                            <td>{{$item->created_at}}</td>

                                        </tr>
                                        <?php $i++;?>
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
