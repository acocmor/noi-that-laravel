@extends('pages.layouts.page')

@section('mapping')
    <span><a href="{{ route('index') }}" class="">Trang chủ</a></span> / <span><a href="{{ route('getProductPage') }}"
            class="">Sản Phẩm</a></span> /
    @if (isset($lsp))
        <span><a href="{{ route('getTrangLSP', ['id' => $lsp->id, 'slug' => $lsp->slug]) }}"
                class="">{{ $lsp->name }}</a></span>
    @endif
@endsection

@section('content-pra')

    <div class="page-products">
        @if (isset($lsp))

            <div class="title-page-product">
                <h3><a href="{{ route('getTrangLSP', ['slug' => $lsp->slug, 'id' => $lsp->id]) }}">{{ $lsp->name }}</a>
                </h3>
            </div>
            <div class="content-page-product">
                <ul class="row list-products">
                    @if(count($lsp->sanpham) > 0)
                    @foreach ($item as $sp)
                            @if ($sp->hien_thi == 1)
                                <li class="product-item pd-list">
                                    <div class="wrap-product">
                                        <div class="img-product">
                                            <a href="{{ route('getSP', ['loai-san-pham' => $lsp->slug, 'id' => $sp->id, 'ten-san-pham' => $sp->slug]) }}"
                                                class="hover-img-product"><img width="300" height="225"
                                                    src="{{ asset('upload/sanpham/' . $sp->hinh_anh) }}"
                                                    alt="{{$sp->slug}}"></a>
                                        </div>
                                        <h3 class="title-product">
                                            <a
                                                href="{{ route('getSP', ['loai-san-pham' => $lsp->slug, 'id' => $sp->id, 'ten-san-pham' => $sp->slug]) }}">{{ $sp->name }}</a>
                                        </h3>
                                        <p class="price-product">
                                            @if ($sp->gia != 0)
                                                {{ number_format($sp->gia) }} VNĐ
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
                {{-- {{ $item->links() }} --}}
                {{-- {{$item->render('vendor.pagination.custom')}} --}}
                <div class="nav-pagi">{{ $item->links( "pagination::bootstrap-4") }}</div>
                
            </div>
            

        @endif
    </div>

@endsection
