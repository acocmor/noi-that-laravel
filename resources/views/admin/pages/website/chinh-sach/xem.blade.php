@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa chính sách</h1>
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
                    Chi tiết chính sách
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if(isset($cs))
                            <form role="form">
                                <div class="form-group">
                                    <label for="title">Tên chính sách:</label>
                                    <h2>{{$cs->title}}</h2>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="hien_thi">Hiển thị lên Website: </label>
                                    @if($cs->hien_thi == 1)
                                        <p>Có</p>
                                    @else 
                                        <p>Không</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội dung chính sách:</label>
                                    <p>{!!$cs->content!!}</p>
                                </div>
                                <a href="{{route('admin.website.getCS')}}" class="btn btn-primary mb-2">Quay lại danh sách</a>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
