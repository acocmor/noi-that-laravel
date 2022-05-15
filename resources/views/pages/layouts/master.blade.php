<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (isset($web))
        <title>{{ $web->ten_cong_ty }}</title>
        <meta property="og:url" content="{{ $web->name_website }}">
        <meta property="og:site_name" content="{{ $web->ten_cong_ty }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/website/logo/' . $web->logo) }}" />
    @endif

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/pages/css/style.css') }}">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/siiimple-toast/dist/style.css" rel="stylesheet">
    @yield('style')
</head>

<body>
    <div id="main">
        <div id="header">
            <div class="top-header">
                <div class="container">
                    @if (isset($web))
                        <span class="contact-header">
                            <i class="fas fa-mobile-alt"></i> {{ $web->hotline }}
                        </span>
                        <span class="contact-header">
                            <i class="far fa-envelope"></i> {{ $web->email }}
                        </span>
                    @endif
                    <div class="search">
                        <div class="search-form">
                            <form action="{{ route('getSearch') }}" method="GET">
                                <label for="">
                                    <input type="search" name="input_search" id="noi-dung"
                                        placeholder="Tìm kiếm sản phẩm..." autocomplete="off">
                                </label>
                                <input type="submit" name="search" id="search"
                                    style="background-image: url({{ asset('images/website/search/btsearch.png') }})"
                                    value="Tìm kiếm">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-header">
                <div class="container">
                    <div class="logo-content">
                        @if (isset($web))
                            <div class="name-logo">
                                <a href="{{ route('index') }}"><img
                                        src="{{ asset('images/website/logo/' . $web->logo) }}" alt="Logo"
                                        class="logo"><span id="webname">{{ $web->ten_cong_ty }}</span></a>
                            </div>
                            {{-- @if ($web->banner != null)
                                <div class="banner">
                                    <img src="{{ asset('images/website/banner/' . $web->banner) }}" alt="Banner">
                                </div>
                            @endif --}}
                            <div class="banner float-right" style="text-align: right;">
                                <a href="{{ route('index.cart') }}"><i class="fas fa-shopping-cart"></i> Giỏ hàng </a>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
            <div class="nav" id="nav">
                <div class="container">
                    <div id="mobile-menu" class="mobile-btn-menu">
                        <i class="ti-menu"></i>
                    </div>
                    <a href="{{ route('index') }}" class="nav-item">Trang chủ</a>
                    @if (isset($lsp))
                        @foreach ($lsp as $item)
                            <a href="{{ route('getTrangLSP', ['id' => $item->id, 'slug' => $item->slug]) }}"
                                class="nav-item">{{ $item->name }}</a>
                        @endforeach
                    @endif
                    <a href="{{ route('getLienHe') }}" class="nav-item">Liên hệ</a>
                    <a href="{{ route('getGioiThieu') }}" class="nav-item">Giới thiệu</a>

                </div>
            </div>
        </div>
        <!-- Begin: Content -->
        <div id="content">
            @yield('mapping-layout')
            @yield('content')
        </div>
        <!-- End: Content -->


        <div id="footer">
            <div class="container">
                <div class="footer__content">
                    <div class="content-ft">
                        <h3>THÔNG TIN LIÊN HỆ</h3>
                        <ul>
                            @if (isset($web))
                                <li> <i
                                        style="font-weight:600; text-transform: uppercase;">{{ $web->ten_cong_ty }}</i>
                                </li>
                                <li> <i class="fas fa-map-marked-alt"></i> Địa chỉ: <span>{{ $web->dia_chi }}</span>
                                </li>
                                <li> <i class="fas fa-phone-square"></i> Hotline: <span>{{ $web->hotline }}</span>
                                </li>
                                <li> <i class="fas fa-envelope"></i> Email: <span>{{ $web->email }}</span></li>
                                <li> <i class="fas fa-globe"></i> Website: <span>{{ $web->name_website }}</span></li>
                            @endif
                        </ul>
                    </div>
                    <div class="content-ft">
                        <h3>HỆ THỐNG CỬA HÀNG</h3>
                        <ul>
                            @if (isset($ch))
                                <?php $i = 1; ?>
                                @foreach ($ch as $add)
                                    <li>
                                        <h4>* CỬA HÀNG {{ $i }} :</h4>
                                        <p><i class="fas fa-map-pin"></i> {{ $add->dia_chi }}</p>
                                        <p><i class="fas fa-phone-square"></i> {{ $add->hotline_add }}</p>
                                    </li>
                                    <?php $i++; ?>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="content-ft">
                        <h3>HỖ TRỢ KHÁCH HÀNG</h3>
                        <ul>
                            @if (isset($cs))
                                @foreach ($cs as $chinhSach)
                                    @if ($chinhSach->hien_thi == 1)
                                        <li> <i></i> <a
                                                href="{{ route('getChinhSach', ['id' => $chinhSach->id, 'slug' => $chinhSach->slug]) }}">{{ $chinhSach->title }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="content-ft">
                        <div class="social">
                            @if(isset($web))
                            {!! $web->social_facebook !!}
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        var nav = document.getElementById('nav')
        var mobileMenu = document.getElementById('mobile-menu')
        mobileMenu.onclick = function() {
            var isClose = nav.clientHeight === 48;
            if (isClose) {
                nav.style.height = 'auto';
            } else {
                nav.style.height = '48px';
            }
        }

    </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/siiimple-toast/dist/siiimple-toast.min.js"></script>
     <script>
         
         function deleteItemCart(id) {
             $.ajax({
                 url: '/gio-hang/xoa/' + id,
                 type: 'GET',
             }).done(function(response) {
                 $("#content-cart").empty();
                 $("#content-cart").html(response);
                 siiimpleToast.success('Xoá thành công!');
             })
         }
         function updateItemCart(id) {
             var value = $("#select-" + id).val();
             $.ajax({
                 url: '/gio-hang/sua/' + id + '/' + value,
                 type: 'GET',
             }).done(function(response) {
                 $("#content-cart").empty();
                 $("#content-cart").html(response);
                 siiimpleToast.success('Cập nhật thành công!');
             })
         }
         function addCart(id) {
             $.ajax({
                 url: '/gio-hang/them/' + id,
                 type: 'GET',
             }).done(function(respone) {
                 siiimpleToast.success('Thêm vào giỏ hàng thành công!');
             })
         }
     </script>
     @yield('script')
</body>

</html>
