<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Thêm địa chỉ cửa hàng mới</h4>
            </div>
            <form role="form" method="POST" action="{{ route('admin.website.postThemCH') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dia_chi">Địa chỉ cửa hàng (*)</label>
                        <input class="form-control" name="dia_chi" id="dia_chi">
                    </div>
                    <div class="form-group">
                        <label for="hotline_add">Số điện thoại cửa hàng</label>
                        <input class="form-control" name="hotline_add" id="hotline_add">
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
