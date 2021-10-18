<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data["title"] ?? null ?></h3>
            <a href="<?php if(isset($data)) { echo "{$data['template']}/index"; }?>" class="btn btn-primary">Trở về</a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <form action="" method="post" novalidate>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Tên danh mục *</label>
                        <input type="text" class="form-control" name="data_post[TenCTTheLoai]" id="name">
                    </div>
                     <div class="form-group">
                        <label for="publish">Publish *</label>
                        <input type="checkbox" checked name="data_post[Publish]" id="publish">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="submit">Thêm mới</button>
                    </div>
                </div>
            </div>
        </form>
        <div>
        </div>
    </div>
</div>