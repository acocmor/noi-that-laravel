@extends('pages.layouts.page')

@section('mapping')
    <span><a href="{{ route('index') }}" class="">Trang chủ</a></span> 
    
@endsection

@section('content-pra')
    @if(isset($cs))
    <div class="page-products">
        <div class="title-page-product">
            <h3><a href="{{ route('getChinhSach', ['id' => $cs->id, 'slug' => $cs->slug]) }}">{{$cs->title}}</a></h3>
        </div>
        <div class="content-page-contact">
            {!! $cs->content !!}
        </div>
    </div>
    @endif
@endsection
