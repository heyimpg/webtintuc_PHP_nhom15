<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x-panel">
                <div class="x_title">
                    <h2>Danh sách bài viết</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Thể loại</th>
                                <th>Ngày đăng</th>
                                <th>Số lượt thích</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="postModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form method="post" id="postForm" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa bài viết</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group"> 
                        <label for="postTitle" class="control-label">Tiêu đề bài viết *</label>
                        <input type="text" class="form-control" id="postTitle" name="post_title" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="control-label">Nội dung tóm tắt *</label>
                        <textarea id="post_short_content" class="form-control" required="required"
                                    style="resize: none;" name="post_short_content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="post_thumbnail" class="control-label">Ảnh đại diện *</label>
                        <input class="col-9" id="post_thumbnail" type="file" required="required" name="upload_file">
                    </div>
                    <div class="form-group">
                        <label for="post_content_editor" class="control-label">Nội dung *</label>
                        <textarea id="post_content_editor" class="form-control" required="required"
                                    style="resize: none;" name="post_content"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="postId" id="postId" />
                    <input type="hidden" name="action" id="action" value="" />
                    <input type="submit" name="save" id="save" class="btn btn-info" value="Lưu" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="assets/admin/ckeditor/ckeditor.js"></script>
<script>
    $(document).ready(function () {
        let postData = $("#datatable").DataTable({
            "language": {
                "processing": "Đang xử lý...",
                "infoFiltered": "(được lọc từ _MAX_ mục)",
                "aria": {
                    "sortAscending": ": Sắp xếp thứ tự tăng dần",
                    "sortDescending": ": Sắp xếp thứ tự giảm dần"
                },
                "autoFill": {
                    "cancel": "Hủy",
                    "fill": "Điền tất cả ô với <i>%d<\/i>",
                    "fillHorizontal": "Điền theo hàng ngang",
                    "fillVertical": "Điền theo hàng dọc"
                },
                "buttons": {
                    "collection": "Chọn lọc <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                    "colvis": "Hiển thị theo cột",
                    "colvisRestore": "Khôi phục hiển thị",
                    "copy": "Sao chép",
                    "copyKeys": "Nhấn Ctrl hoặc u2318 + C để sao chép bảng dữ liệu vào clipboard.<br \/><br \/>Để hủy, click vào thông báo này hoặc nhấn ESC",
                    "copySuccess": {
                        "1": "Đã sao chép 1 dòng dữ liệu vào clipboard",
                        "_": "Đã sao chép %d dòng vào clipboard"
                    },
                    "copyTitle": "Sao chép vào clipboard",
                    "csv": "File CSV",
                    "excel": "File Excel",
                    "pageLength": {
                        "-1": "Xem tất cả các dòng",
                        "_": "Hiển thị %d dòng"
                    },
                    "pdf": "File PDF",
                    "print": "In ấn"
                },
                "infoThousands": "`",
                "select": {
                    "cells": {
                        "1": "1 ô đang được chọn",
                        "_": "%d ô đang được chọn"
                    },
                    "columns": {
                        "1": "1 cột đang được chọn",
                        "_": "%d cột đang được được chọn"
                    },
                    "rows": {
                        "1": "1 dòng đang được chọn",
                        "_": "%d dòng đang được chọn"
                    }
                },
                "thousands": "`",
                "searchBuilder": {
                    "title": {
                        "_": "Thiết lập tìm kiếm (%d)",
                        "0": "Thiết lập tìm kiếm"
                    },
                    "button": {
                        "0": "Thiết lập tìm kiếm",
                        "_": "Thiết lập tìm kiếm (%d)"
                    },
                    "value": "Giá trị",
                    "clearAll": "Xóa hết",
                    "condition": "Điều kiện",
                    "conditions": {
                        "date": {
                            "after": "Sau",
                            "before": "Trước",
                            "between": "Nằm giữa",
                            "empty": "Rỗng",
                            "equals": "Bằng với",
                            "not": "Không phải",
                            "notBetween": "Không nằm giữa",
                            "notEmpty": "Không rỗng"
                        },
                        "number": {
                            "between": "Nằm giữa",
                            "empty": "Rỗng",
                            "equals": "Bằng với",
                            "gt": "Lớn hơn",
                            "gte": "Lớn hơn hoặc bằng",
                            "lt": "Nhỏ hơn",
                            "lte": "Nhỏ hơn hoặc bằng",
                            "not": "Không phải",
                            "notBetween": "Không nằm giữa",
                            "notEmpty": "Không rỗng"
                        },
                        "string": {
                            "contains": "Chứa",
                            "empty": "Rỗng",
                            "endsWith": "Kết thúc bằng",
                            "equals": "Bằng",
                            "not": "Không phải",
                            "notEmpty": "Không rỗng",
                            "startsWith": "Bắt đầu với"
                        },
                        "array": {
                            "equals": "Bằng",
                            "empty": "Trống",
                            "contains": "Chứa",
                            "not": "Không",
                            "notEmpty": "Không được rỗng",
                            "without": "không chứa"
                        }
                    },
                    "logicAnd": "Và",
                    "logicOr": "Hoặc",
                    "add": "Thêm điều kiện",
                    "data": "Dữ liệu",
                    "deleteTitle": "Xóa quy tắc lọc"
                },
                "searchPanes": {
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Không có phần tìm kiếm",
                    "clearMessage": "Xóa hết",
                    "loadMessage": "Đang load phần tìm kiếm",
                    "collapse": {
                        "0": "Phần tìm kiếm",
                        "_": "Phần tìm kiếm (%d)"
                    },
                    "title": "Bộ lọc đang hoạt động - %d",
                    "count": "{total}"
                },
                "datetime": {
                    "hours": "Giờ",
                    "minutes": "Phút",
                    "next": "Sau",
                    "previous": "Trước",
                    "seconds": "Giây"
                },
                "emptyTable": "Không có dữ liệu",
                "info": "Hiển thị từ _START_ tới _END_ trên tổng số _TOTAL_ dữ liệu",
                "infoEmpty": "Hiển thị 0 tới 0 của 0 dữ liệu",
                "lengthMenu": "Hiển thị _MENU_ dữ liệu",
                "loadingRecords": "Đang tải...",
                "paginate": {
                    "first": "Đầu tiên",
                    "last": "Cuối cùng",
                    "next": "Sau",
                    "previous": "Trước"
                },
                "search": "Tìm kiếm:",
                "zeroRecords": "Không tìm thấy kết quả",
                "searchPlaceholder": "Tìm kiếm"
            },
            "columns": [
                null,
                {
                    "width": "10%"
                },
                {
                    "width": "10%"
                },
                {
                    "width": "10%"
                },
                null
            ],
            "bLengthChange": true,
            "serverSide": true,
            "processing": true,
            "order": [],
            "paging": true,
            "pageLength": 10,
            "ajax": {
                "url": '<?= BASE_URL."admin/post/getpostlist"?>',
                "type": "post",
                "dataType": "json"
            },
            "columnDefs": [{
                'target': [0, 6, 7],
                'orderable': true
            }]
        });
        $("#datatable").on("click", ".update", function(){
            $("#postModal").modal("show");
            let postId = $(this).attr("id");
            $.ajax({
                "url": "<?= BASE_URL."admin/post/update"?>",
                "type": "post",
                "dataType": "json",
                "data": {postId: postId},
                "success": function(response) {
                    $("#postForm #postTitle").val(response.TieuDe);
                    $("#postForm #post_short_content").val(response.GioiThieu);
                    CKEDITOR.instances["post_content_editor"].setData(response.NoiDung);
                    $('#postId').val(response.ID_BaiViet);
                }
            });
        });
        $("#postModal").on("submit", "#postForm", function(event){
            event.preventDefault();
            $('#save').attr('disabled','disabled');
            var formData = $(this).serialize();
            console.log(formData);
        });
        $("#datatable").on('click', '.delete', function(){
            let postId = $(this).attr("id");
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa?',
                text: "Bạn sẽ không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:"<?= BASE_URL."admin/post/delete"?>",
                        dataType: "json",
                        method: "post",
                        data: {postId:postId},
                        success: function(response) {
                            if(response.type === "success") {
                                Swal.fire({
                                    icon:'success',
                                    title: 'Đã xóa!',
                                    text: 'Xóa thành công bài viết.'
                                });
                                postData.ajax.reload();
                            }
                            else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Xóa thất bại',
                                    text: 'Đã có lỗi xảy ra!'
                                });
                            }
                        }
                    });
                }
            });
        });
    });
    CKEDITOR.replace("post_content_editor", {removePlugins: "exportpdf"});
</script>