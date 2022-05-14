<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Thêm loại sản phẩm</h4>
            </div>
            <form role="form" method="POST" action="{{ route('admin.loaisanpham.postThem') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tên loại sản phẩm</label>
                        <input class="form-control" name="name" id="name">
                        <p class="help-block"><i>Độ dài tên lớn hơn 3.</i> </p>
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
