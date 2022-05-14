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
                            <form role="form">
                                <div class="form-group">
                                    <label for="loaisanpham">Tên loại sản phẩm: </label>
                                    @if (isset($lsp))
                                            @foreach ($lsp as $item)
                                            @if ($sp->loai_san_pham_id == $item->id)
                                                <span style="font-size: 20px; font-weight: 500">{{$item->name}}</span>
                                             @endif
                                            @endforeach
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm: </label>
                                    <span style="font-size: 20px; font-weight: 500">{{$sp->name}}</span>
                                </div>

                                <div class="form-group">
                                    <label for="gia">Giá sản phẩm: </label>
                                    <span style="font-size: 20px; font-weight: 500">{{ number_format($sp->gia) }} VNĐ</span>
                                </div>
                                <div class="form-group">
                                    <label for="giamgia">Mức giảm giá (VNĐ)</label>
                                    <span style="font-size: 20px; font-weight: 500">{{ number_format($sp->giam_gia) }} VNĐ</span>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <label for="hinhanh">Hình ảnh sản phẩm</label>
                                        </div>
                                        <span>Hình ảnh sản phẩm: </span>
                                        <img id="blah" width="250px" height="250px" src="{{asset('upload/sanpham/'.$sp->hinh_anh)}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="hinhanh">Hiển thị lên Website: </label>
                                    <span>@if ($sp->hien_thi == 1)
                                        <span style="font-size: 20px; font-weight: 500"> Có </span>
                                        @else
                                        <span style="font-size: 20px; font-weight: 500"> Không </span>
                                    @endif</span>
                                </div>
                                <div class="form-group">
                                    <label for="mota">Mô tả sản phẩm: </label>
                                    <p>{!!$sp->mo_ta!!}</p>
                                </div>
                                <div class="form-group">
                                    <label for="daban">Số lượng đã bán: </label>
                                    <span style="font-size: 20px; font-weight: 500"> {{$sp->da_ban}} </span>
                                </div>
                                <a href="{{route('admin.sanpham.getDanhSach')}}" class="btn btn-primary mb-2">Quay lại danh sách</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection