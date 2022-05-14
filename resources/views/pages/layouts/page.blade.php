@extends('pages.layouts.master')
@section('content')

    <div class="container">
        <div class="mapping">
            @yield('mapping')
        </div>
        <div class="sidebar-main">
            <div class="sidebar-content">
                <section id="title-menu">
                    <h2 class="widget-title">Danh mục sản phẩm</h2>
                    <ul id="menu-items">
                        {{-- <li class="item-menu-product"><a href="./cong.html" class="nav-item">Cổng</a></li>
                        <li class="item-menu-product"><a href="./lancan.html" class="nav-item">Lan can</a></li>
                        <li class="item-menu-product"><a href="./cauthang.html" class="nav-item">Cầu thang</a>
                        </li>
                        <li class="item-menu-product"><a href="./vach.html" class="nav-item">Vách</a></li>
                        <a href="./decor.html" class="nav-item">Decor</a> --}}
                        @if (isset($lsp))
                            @foreach ($lsp as $item)
                                <li class="item-menu-product"><a
                                        href="{{ route('getTrangLSP', ['id' => $item->id, 'slug' => $item->slug]) }}"
                                        class="nav-item">{{ $item->name }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </section>
                <section id="contact-menu">
                    <h2 class="widget-title">Hỗ trợ trực tuyến</h2>
                    <img src="{{ asset('images/website/support/support.gif') }}" alt="">
                    <ul id="menu-items">
                        @if (isset($lsp))
                        <li class="item-menu-product"> <i class="fas fa-phone-square"></i> {{$web->hotline}} </li>
                        <li class="item-menu-product"> <i class="fas fa-envelope"></i> {{$web->email}} </li>
                        @endif
                    </ul>
                </section>
            </div>
            <div class="main-content">
                @yield('content-pra')
            </div>

        </div>
    </div>

@endsection
