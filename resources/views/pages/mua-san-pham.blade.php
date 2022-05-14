@extends('pages.layouts.page')

@section('mapping')
    <span><a href="{{ route('index') }}" class="">Trang chủ</a></span>
@endsection

@section('content-pra')
    @if (isset($sp))
        <div class="row contact">
            <div class="form-contact">
                <form action="{{ route('postLHTV',  ['id' => $sp->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và tên (*)</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email (*)</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Số điện thoại (*)</label>
                        <input type="text" name="phone_number" id="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label for="ghi_chu">Ghi chú</label>
                        <input type="text" name="ghi_chu" id="ghi_chu">
                    </div>
                    <div class="form-group">
                        <input type="submit" onclick="return ConfirmDelete()" name="submit" id="" value="Gửi đi">
                    </div>
                </form>
            </div>
            <div class="info-contact">
                Sản phẩm bạn quan tâm:
                <ul class="row list-products">

                    <li class="product-item pd-list" style="flex: 0 0 100%; max-width: 100%;">
                        <div class="wrap-product">
                            <div class="img-product">
                                <a href="{{ route('getSP', ['loai-san-pham' => $sp->loaisanpham->slug, 'id' => $sp->id, 'ten-san-pham' => $sp->slug]) }}"
                                    class="hover-img-product"><img width="300" height="225"
                                        src="{{ asset('upload/sanpham/' . $sp->hinh_anh) }}" alt="product-1"></a>
                            </div>
                            <h3 class="title-product">
                                <a
                                    href="{{ route('getSP', ['loai-san-pham' => $sp->loaisanpham->slug, 'id' => $sp->id, 'ten-san-pham' => $sp->slug]) }}">{{ $sp->name }}</a>
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

                </ul>
            </div>
        </div>
    @endif
       <script>
        function ConfirmDelete() {
            var x = alert("Cảm ơn quý khách đã gửi thông tin, chúng tôi sẽ sớm liên hệ lại với quý khách!");
            if (x)
                return true;
        }
    </script>

@endsection

 
