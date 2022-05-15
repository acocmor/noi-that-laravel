@extends('pages.layouts.page')

@section('mapping')
    <span><a href="{{ route('index') }}" class="">Trang chủ</a></span> / <span><a href="{{ route('getProductPage') }}"
            class="">Sản Phẩm</a></span>
@endsection

@section('content-pra')

    <div class="page-products">

        @if (isset($pro))
            <div class="content-page-product">
                <ul class="row list-products">
                    @if (count($pro) > 0)
                        @foreach ($pro as $product)
                            @if ($product->hien_thi == 1)
                                <li class="product-item pd-list">
                                    <div class="wrap-product">
                                        <div class="img-product">
                                            <a href="{{ route('getSP', ['loai-san-pham' => $product->loaisanpham->slug, 'id' => $product->id, 'ten-san-pham' => $product->slug]) }}"
                                                class="hover-img-product"><img width="300" height="225"
                                                    src="{{ asset('upload/sanpham/' . $product->hinh_anh) }}"
                                                    alt="{{ $product->slug }}"></a>
                                        </div>
                                        <h3 class="title-product">
                                            <a
                                                href="{{ route('getSP', ['loai-san-pham' => $product->loaisanpham->slug, 'id' => $product->id, 'ten-san-pham' => $product->slug]) }}">{{ $product->name }}</a>
                                        </h3>
                                        <p class="price-product">
                                            {{-- @if ($product->gia != 0)
                                                {{ number_format($product->gia) }} VNĐ
                                            @else
                                                Liên hệ
                                            @endif --}}

                                            @if ($product->gia != 0 && $product->giam_gia == 0)
                                            {{ number_format($product->gia) }}
                                            @elseif ($product->gia != 0 && $product->giam_gia != 0)
                                                {{ number_format($product->gia - $product->giam_gia) }} VNĐ <p><del
                                                    style="color: black; font-weight: 400; font-size: 15px;">
                                                    <i>{{ number_format($product->gia) }} VNĐ</i> </del></p>
                                                    <div class="buy">
                                                        <a style="cursor: pointer; color: white; background-color: red; padding: 10px" class="btn-buy" onclick="addCart({{ $product->id }})" data-id="{{ $product->id }}">Thêm vào giỏ hàng</a>
                                                    </div>
                                            @else
                                                Liên hệ
                                            @endif
                                        </p>
                                    </div>
                                </li>
                            @endif
                        @endforeach

                    @else
                        Không có sản phẩm nào
                    @endif
                </ul>
                <h3 class="heading-more">
                    <a title="Xem thêm" href="{{ route('getProductPage') }}">Xem
                        tất
                        cả sản phẩm</a>
                </h3>
            </div>


        @endif

        @if (isset($loai_sp))
            @foreach ($loai_sp as $p)
                @if (count($p->sanpham) > 0)
                    <div class="title-page-product">
                        <h3><a
                                href="{{ route('getTrangLSP', ['slug' => $p->slug, 'id' => $p->id]) }}">{{ $p->name }}</a>
                        </h3>
                    </div>
                    <div class="content-page-product">
                        <ul class="row list-products">
                            <?php $i = 1; ?>
                            @foreach ($p->sanpham as $sp)
                                @if ($i < 7)
                                    <li class="product-item pd-list">
                                        <div class="wrap-product">
                                            <div class="img-product">
                                                <a href="{{ route('getSP', ['id' => $sp->id]) }}"
                                                    class="hover-img-product"><img width="300" height="225"
                                                        src="{{ asset('upload/sanpham/' . $sp->hinh_anh) }}"
                                                        alt="product-1"></a>
                                            </div>
                                            <h3 class="title-product">
                                                <a
                                                    href="{{ route('getSP', ['id' => $sp->id]) }}">{{ $sp->name }}</a>
                                            </h3>
                                            <p class="price-product">
                                                <font size="4">
                                                    @if ($sp->gia != 0)
                                                        {{ number_format($sp->gia) }}
                                                    @else
                                                        Liên Hệ
                                                    @endif
                                                </font>
                                            </p>
                                        </div>
                                    </li>

                                @endif
                                <?php $i++; ?>
                            @endforeach
                        </ul>
                        <h3 class="heading-more">
                            <a title="Xem thêm"
                                href="{{ route('getTrangLSP', ['slug' => $p->slug, 'id' => $p->id]) }}">Xem
                                tất
                                cả...</a>
                        </h3>
                    </div>
                @endif
            @endforeach
        @endif
    </div>

@endsection

@section('script')
    @if (session('thongbao'))
        <script>
            {{session('thongbao')}} 
        </script>
    @endif
@endsection
