@extends('pages.layouts.page')

@section('mapping')
    <span><a href="{{ route('index') }}" class="">Trang chủ</a></span> / <span><a href="{{ route('getGioiThieu') }}"
            class="">Về chúng tôi</a></span>
@endsection

@section('content-pra')
    @if(isset($gt))
    <div class="page-products">
        <div class="content-page-contact">
            {!! $gt->content !!}
        </div>
    </div>
    @endif
@endsection
