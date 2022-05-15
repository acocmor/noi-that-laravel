@extends('pages.layouts.master')

@section('content')
    <!-- Begin: Slide -->
    <div class="slide">
        @if(isset($web))
        <img src="{{ asset('images/website/slides/'.$web->slide) }}" alt="">
        @endif
    </div>
    <!-- End: Slide -->

    <!--Begin: Product Section -->
    <div class="container">
        <h2 class="heading">
            <a title="Danh sách sản phẩm" href="{{ route('getProductPage') }}">Danh sách sản phẩm</a>
        </h2>

        <div class="show-product coloum-4">
            <ul class="row list-products">
                @if (isset($sp))
                    @foreach ($sp as $item)
                        @if (isset($item->loaisanpham->id))
                            <li class="product-item pd-list">
                                <div class="wrap-product">
                                    <div class="img-product">
                                        <a href="{{ route('getSP', ['loai-san-pham' => $item->loaisanpham->slug, 'id' => $item->id, 'ten-san-pham' => $item->slug]) }}"
                                            class="hover-img-product"><img width="300" height="225"
                                                src="{{ asset('upload/sanpham/' . $item->hinh_anh) }}"
                                                alt="{{ $item->slug }}"></a>
                                    </div>
                                    <h3 class="title-product">
                                        <a
                                            href="{{ route('getSP', ['loai-san-pham' => $item->loaisanpham->slug, 'id' => $item->id, 'ten-san-pham' => $item->slug]) }}">{{ $item->name }}</a>
                                    </h3>
                                    <p class="price-product">
                                        {{-- @if ($item->gia != 0)
                                            {{ number_format($item->gia) }} VNĐ
                                        @else
                                            Liên hệ
                                        @endif --}}

                                        @if ($item->gia != 0 && $item->giam_gia == 0)
                                            {{ number_format($item->gia) }}
                                            @elseif ($item->gia != 0 && $item->giam_gia != 0)
                                                {{ number_format($item->gia - $item->giam_gia) }} VNĐ <p><del
                                                    style="color: black; font-weight: 400; font-size: 15px;">
                                                    <i>{{ number_format($item->gia) }} VNĐ</i> </del></p>
                                                    <div class="buy">
                                                        <a style="cursor: pointer; color: white; background-color: red; padding: 10px" class="btn-buy" onclick="addCart({{ $item->id }})" data-id="{{ $item->id }}">Thêm vào giỏ hàng</a>
                                                    </div>
                                            @else
                                                Liên hệ
                                            @endif
                                    </p>
                                </div>
                            </li>
                        @endif
                    @endforeach
                @endif



            </ul>
        </div>
        <h3 class="heading-more">
            <a title="Danh sách sản phẩm" href="{{ route('getProductPage') }}">Xem tất cả...</a>
        </h3>
    </div>
    <!--Begin: End Section -->

    <div class="intro">
        <div class="container">
            <h2 class="heading">
                <a title="Danh sách sản phẩm" href="{{ route('getGioiThieu') }}">Về chúng tôi</a>
            </h2>
            <p class="content-intro">
                @if (isset($gt))
                    {!! $gt->index_content !!}
                @endif
            </p>
        </div>
    </div>
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="wrap-service">
                    <figure><img src="{{ asset('images/website/services/dich-vu-lap-dat.png') }}"></figure>
                    <div>
                        <h3>TƯ VẤN - BÁO GIÁ - LẮP ĐẶT NHANH &amp; ĐÚNG TIẾN ĐỘ</h3>
                        <div class="desc-gt">Đội ngũ nhân viên Inox Nhà Đẹp làm việc chuyên nghiệp - tận tụy -
                            đảm bảo làm việc Nhanh - Chính
                            xác - Đáp ứng tiến độ cho khách hàng.</div>
                    </div>
                </div>
                <div class="wrap-service">
                    <figure><img src="{{ asset('images/website/services/dich-vu-thanh-toan.png') }}"></figure>
                    <div>
                        <h3>GIÁ TỐT NHẤT</h3>
                        <div class="desc-gt">Tự hào là đơn vị có quy trình làm việc khép kín. Inox Nhà Đẹp cam
                            kết cung cấp sản phẩm tới tay khách hàng có giá rẻ hơn
                            thị trường.</div>
                    </div>
                </div>
                <div class="wrap-service">
                    <figure><img src="{{ asset('images/website/services/dich-vu-bao-hanh.png') }}"></figure>
                    <div>
                        <h3>BẢO HÀNH</h3>
                        <div class="desc-gt">Bảo hành nhanh chóng, chính xác nhất, hỗ trợ khách hàng về sản phẩm
                            có vấn đề phát sinh.</div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
