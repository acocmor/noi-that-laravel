@extends('pages.layouts.page')

@section('mapping')
    <span><a href="{{ route('index') }}" class="">Trang chủ</a></span> / <span><a href="{{ route('getLienHe') }}"
            class="">Liên hệ</a></span>

@endsection

@section('content-pra')

    <div class="page-products">
        <div class="title-page-product">
            <h3><a href="{{ route('getLienHe') }}">Liên hệ</a></h3>
        </div>
        <div class="content-page-contact">
            <div class="div-map">
                {!! $lh->maps !!}
            </div>
        </div>
        <div class="row contact">
            <div class="form-contact">
                <form action="{{route('postLienHe')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên của bạn (*)</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email của bạn (*)</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Số điện thoại (*)</label>
                        <input type="text" name="phone_number" id="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Tiêu đề </label>
                        <input type="text" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung</label>
                        <textarea class="" name="content" id="content" cols="50" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="" value="Gửi đi">
                    </div>
                </form>
            </div>
            <div class="info-contact">
                {!! $lh->content !!}
            </div>
        </div>
    </div>

@endsection
