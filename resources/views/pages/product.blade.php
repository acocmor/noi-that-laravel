@extends('pages.layouts.page')

@section('mapping')
    <span><a href="./index.html" class="">Trang chủ</a></span> / <span><a href="{{ route('getProductPage') }}"
            class="">Sản Phẩm</a></span> /
    @if (isset($sp))
        <span><a href="{{ route('getTrangLSP', ['id' => $sp->loaisanpham->id, 'slug' => $sp->loaisanpham->slug]) }}"
                class="">{{ $sp->loaisanpham->name }}</a></span> /
        <span><a href="{{ route('getSP', ['id' => $sp->id]) }}" class="">{{ $sp->name }}</a></span>
    @endif
@endsection

@section('content-pra')

    @if (isset($sp))
        <div class="content-product">
            <div class="content-img-product">
                <img src="{{ asset('upload/sanpham/' . $sp->hinh_anh) }}" alt="{{ $sp->name }}">
            </div>
            <div class="content-info-product">
                <h1 class="name-product">{{ $sp->name }}</h1>
                <div class="product-meta">
                    <span class="sold"><i>Đã bán: {{ $sp->da_ban }}</i></span>
                    <span class="posted_in">Danh mục: <a
                            href="{{ route('getTrangLSP', ['id' => $sp->loaisanpham->id, 'slug' => $sp->loaisanpham->slug]) }}"
                            class="">{{ $sp->loaisanpham->name }}</a></span>
                </div>
                <div class="price">
                    <span><i>Giá:</i></span>
                    <p class="price-product">
                        <font size="4">
                            @if ($sp->gia != 0 && $sp->giam_gia == 0)
                                {{ number_format($sp->gia) }}
                            @elseif ($sp->gia != 0 && $sp->giam_gia != 0)
                                {{ number_format($sp->gia - $sp->giam_gia) }} VNĐ <del
                                    style="color: black; font-weight: 400; font-size: 15px; margin-left:12px;">
                                    <i>{{ number_format($sp->gia) }} VNĐ</i> </del>
                            @else
                                Liên hệ
                            @endif
                        </font>
                    </p>
                    <div class="buy-share">
                        <div class="buy">
                            <a href="{{route('getLHTV', ['id' => $sp->id, 'san-pham' => $sp->slug])}}" class="btn-buy" data-toggle="modal" data-target="#fomr-lh">Liên hệ, tư vấn mua
                                hàng</a>
                        </div>
                        <div class="share-social">
                            <a class="button_share share facebook"
                                href="http://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="button_share share gplus"
                                href="https://plus.google.com/share?url={{ Request::url() }}"><i
                                    class="fab fa-google-plus-g"></i></a>
                            <a class="button_share share twitter"
                                href="https://twitter.com/intent/tweet?text={{ $sp->name }}&url={{ Request::url() }}&via={{ $sp->name }}"><i
                                    class="fab fa-twitter"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="detail-product">
            <div class="title-detail">
                <h3>MÔ TẢ</h3>
            </div>
            <div class="content-detail">
                {!! $sp->mo_ta !!}
            </div>
        </div>
    @endif
    <div class="orther-products">
        <div class="title-orther">
            <h3>SẢN PHẨM KHÁC</h3>
        </div>
        <div class="content-orther-product">
            <ul class="row list-products">
                <?php $i = 1; ?>
                @foreach ($sp->loaisanpham->sanpham as $item)
                    @if ($item->id != $sp->id)
                        @if ($item->hien_thi == 1)
                            @if ($i < 4)
                                <li class="product-item pd-list">
                                    <div class="wrap-product">
                                        <div class="img-product">
                                            <a href="{{ route('getSP', ['loai-san-pham' => $item->loaisanpham->slug, 'id' => $item->id, 'ten-san-pham' => $item->slug]) }}"
                                                class="hover-img-product"><img width="300" height="225"
                                                    src="{{ asset('upload/sanpham/' . $item->hinh_anh) }}"
                                                    alt="product-1"></a>
                                        </div>
                                        <h3 class="title-product">
                                            <a
                                                href="{{ route('getSP', ['loai-san-pham' => $item->loaisanpham->slug, 'id' => $item->id, 'ten-san-pham' => $item->slug]) }}">{{ $item->name }}</a>
                                        </h3>
                                        <p class="price-product">
                                            @if ($item->gia != 0)
                                                {{ number_format($item->gia) }} VNĐ
                                            @else
                                                Liên hệ
                                            @endif
                                        </p>
                                    </div>
                                </li>
                            @endif
                            <?php $i++; ?>
                        @endif
                    @endif

                @endforeach
            </ul>
        </div>
    </div>

@endsection
