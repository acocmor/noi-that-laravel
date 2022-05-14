<div class="modal fade" id="modal-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Xem chi tiết khách hàng</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <table class="detail">
                        <tr >
                            <td style="padding-bottom:15px;"><span class="label label-default">Họ tên: </span></td>
                            <td style="padding-left:15px;"><b id="name" style="color: rgb(158, 30, 30)"></b></td>
                        </tr>
                        <tr >
                            <td style="padding-bottom:15px;"><span class="label label-default">Email: </span></td>
                            <td style="padding-left:15px;"><i id="email" style="color: rgb(0, 0, 0)"></i></td>
                        </tr>
                        <tr >
                            <td style="padding-bottom:15px;"><span class="label label-default">Số điện thoại: </span></td>
                            <td style="padding-left:15px;"><i id="phone_number" style="color: rgb(0, 0, 0)"></i></td>
                        </tr>
                        <tr >
                            <td style="padding-bottom:15px;"><span class="label label-default">Thời gian gửi: </span></td>
                            <td style="padding-left:15px;"><i id="time" style="color: rgb(0, 0, 0)"></i></td>
                        </tr>
                    </table>
                </div>
                <div class="form-group">
                    <h4> <u> <i>Tiêu đề:</i>  </u> </h4>
                    <blockquote>
                        <p id="title"></p>
                    </blockquote>
                </div>
                <div class="form-group">
                    <h4> <u> <i>Nội dung:</i>  </u> </h4>
                    <blockquote>
                        <p id="content"></p>
                    </blockquote>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>
