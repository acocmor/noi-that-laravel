<div class="row">
    <div class="col-9">
        <table class="table">
            <thead class="bg-primary"  style="color: #fff">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên thuốc</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Xoá</th>
                </tr>
            </thead>

            <tbody>
                @if (Session::has('Cart') != null && Session::get('Cart')->sanPham)
                    <?php $i = 1; ?>
                    @foreach (Session::get('Cart')->sanPham as $item)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $item['sanPhamInfo']->name }}</td>
                            <td>
                                <img src="{{ asset('upload/sanpham/' . $item['sanPhamInfo']->hinh_anh) }}" alt="" width="170px"
                                    height="150px">
                            </td>
    
                            <td>{{ $item['so_luong'] }}</td>
                            <td>{{ number_format($item['sanPhamInfo']->gia - $item['sanPhamInfo']->giam_gia) }} VNĐ</td>
                            <td>
                                <i class="fas fa-trash-alt" style="color: red; cursor: pointer;"
                                            onclick="deleteItemCart({{ $item['sanPhamInfo']->id }})"></i>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="6" style="text-align: center;">Bạn chưa đặt sản phẩm nào!</th>
                    </tr>
                @endif
            </tbody>

        </table>
    </div>
    <div class="col-3" style="overflow: hidden;">
        <div class="card col-10">
            <div class="card-header">
                <h4>ĐẶT HÀNG</h4>
            </div>
            <div class="card-body">
                <h5 class="card-title">Tổng số lượng: </h5>
                <p class="card-text">
                    @if (isset(Session::get('Cart')->tongSoluong))
                        {{ number_format(Session::get('Cart')->tongSoluong) }}
                    @else
                        0
                    @endif
                </p>
                <hr>
                <h5 class="card-title">Tổng tiền: </h5>
                <p class="card-text">
                    @if (isset(Session::get('Cart')->tongGia))
                        {{ number_format(Session::get('Cart')->tongGia) }} VNĐ
                    @else
                        0 VNĐ
                    @endif
                </p>
                <hr>
                <a href="{{ route('index.getPayment') }}" class="btn btn-primary">ĐẶT HÀNG</a>
            </div>
        </div>
    </div>
</div>