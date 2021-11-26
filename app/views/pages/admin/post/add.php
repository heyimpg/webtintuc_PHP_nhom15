<div class="clearfix"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <h6 id="display_message" class="text-danger"><?php if(isset($data["message"])) { echo $data["message"];} ?></h6>
            <div class="x_panel">
                <h2>Đăng bài viết</h2>
                <div class="x_title"></div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"
                        enctype="multipart/form-data" action="admin/post/add">
                        <input type="text" hidden name="author" value="<?= $_SESSION["ID_TaiKhoan"] ?>">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="post_tile">Tiêu đề bài
                                viết
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" id="post_tile" required="required" class="form-control"
                                    name="post_title">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="post_short_content">Nội
                                dung
                                tóm tắt
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 ">
                                <textarea id="post_short_content" class="form-control" required="required"
                                    style="resize: none;" name="post_short_content"></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="post_thumbnail">Ảnh đại
                                diện
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 ">
                                <input id="post_thumbnail" type="file" required="required" name="upload_file">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="post_content_editor">Nội
                                dung
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8">
                                <textarea id="post_content_editor" class="form-control" required="required"
                                    style="resize: none;" name="post_content"></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="post_content_editor">Thể
                                loại
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8">
                                <select class="form-control" name="theloai">
                                    <option value="0" selected disabled hidden>Chọn thể loại</option>
                                    <?php
                                        if(isset($data["categories"]) && $data["categories"] != null) {
                                            foreach ($data["categories"] as $key => $value) {
                                    ?>
                                        <option value="<?= $value["ID_TheLoai"] ?>"><?= $value["TenTheLoai"] ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="post_content_editor">Loại
                                tin
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8">
                                <select class="form-control" name="loaitin">
                                    <option value="0" selected disabled hidden>Chọn loại tin</option>
                                    <?php
                                        if(isset($data["loaitin"]) && $data["loaitin"] != null) {
                                            foreach ($data["loaitin"] as $key => $value) {
                                    ?>
                                        <option value="<?= $value["ID_LoaiTin"] ?>"><?= $value["TenLoaiTin"] ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <div class="col-md-9 col-sm-9 offset-md-3">
                                <button type="submit" name="submit" class="btn btn-success">Đăng bài viết</button>
                                <a class="btn btn-danger" href="admin/post/">Hủy bỏ</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/admin/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace("post_content_editor", {removePlugins: 'exportpdf'});
</script>