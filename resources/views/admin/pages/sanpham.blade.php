@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-cubes fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" style="font-size: 25px">Loại sản phẩm</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.loaisanpham.getDanhSach')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Truy cập</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-cube fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" style="font-size: 25px">Danh sách sản phẩm</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.sanpham.getDanhSach')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Truy cập</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

    </div>

@endsection
