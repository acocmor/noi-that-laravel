@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thông tin sản phẩm: {{$sp->name}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thông tin sản phẩm
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="" method="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="loaisanpham">Tên loại sản phẩm</label>
                                    <input class="form-control" id="name" name="name" placeholder="" value="{{$sp->loaisanpham->name}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm</label>
                                    <input class="form-control" id="name" name="name" placeholder="" value="{{$sp->name}}" readonly> 
                                </div>

                                <div class="form-group">
                                    <label for="gia">Giá sản phẩm (VNĐ)</label>
                                    <input type="number" style="width: 30%" class="form-control" id="gia" name="gia"
                                        placeholder="Nhập giá sản phẩm" value="{{$sp->gia}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="giamgia">Mức giảm giá (VNĐ)</label>
                                    <input type="number" style="width: 30%" class="form-control" id="giamgia" name="giamgia"
                                        placeholder="Nhập mức giảm giá" value="{{$sp->giam_gia}}" readonly>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <label for="giamgia">Hình ảnh sản phẩm:</label>
                                        <img id="blah" width="250px" height="250px" src="{{asset('upload/sanpham/'.$sp->hinh_anh)}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mota">Mô tả sản phẩm:</label> <br>
                                    {!! $sp->mo_ta !!}
                                </div>
                                <div class="form-group">
                                    <label for="daban">Số lượng đã bán sản phẩm:</label> <br>
                                    {{$sp->da_ban}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
