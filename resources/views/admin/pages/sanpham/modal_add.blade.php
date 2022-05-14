<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Thêm sản phẩm mới</h4>
            </div>
            <form role="form" method="POST" action="{{ route('admin.sanpham.postThem') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Nhập tên sản phẩm...">
                    </div>
                    <div class="form-group">
                        <label for="loaisanpham">Tên loại sản phẩm</label>
                        <select style="width: 50%;" class="form-control" name="loaisanpham" id="loaisanpham">
                            @if (isset($lsp))
                                @foreach ($lsp as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hinhanh">Hình ảnh</label>
                        <input type="text" class="form-control" name="hinhanh" id="hinhanh" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="hinhanh">Hiển thị: </label>
                        <label class="switch">
                            <input type="checkbox" name="hienthi" checked>
                            <span class="slider round"></span>
                        </label>
                        <p class="help-block"><i>Mặc định là "Hiển thị".</i> </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" data-dismiss="modal">Huỷ</a>
                    <input type="submit" class="btn btn-primary" value="Thêm">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
