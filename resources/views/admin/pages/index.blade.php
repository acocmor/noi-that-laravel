@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>
    <div class="row">
        
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-life-saver fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" style="font-size: 25px">DS Đơn đặt hàng</div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.dathang.getDanhSach')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Truy cập</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" style="font-size: 25px">DS khách cần mua</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.donhang.getDanhSach')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Truy cập</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" style="font-size: 25px">Danh sách liên hệ</div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.khlienhe.getDanhSach')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Truy cập</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 )
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" style="font-size: 25px">Sản phẩm</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.sanpham.getIndex')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Truy cập</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        @endif
        @if(Auth::user()->role_id == 1 )
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-gears fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" style="font-size: 25px">Thiết lập Website</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.website.getDanhSach')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Truy cập</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        @endif
    </div>

@endsection
