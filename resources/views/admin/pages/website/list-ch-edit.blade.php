<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Sửa</h4>
            </div>
            <form role="form" method="POST" action="" id="form-edit">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dia_chi">Địa chỉ cửa hàng (*) </label>
                        <input class="form-control" name="dia_chi" id="name-edit">
                    </div>
                    <div class="form-group">
                        <label for="hotline_add">Số điện thoại cửa hàng</label>
                        <input class="form-control" name="hotline_add" id="sdt-edit">
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" data-dismiss="modal">Huỷ</a>
                    <input type="submit" class="btn btn-primary" value="Sửa">
                </div>
            </form>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>