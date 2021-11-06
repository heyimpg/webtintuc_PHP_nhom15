<?php $redirect = new Redirect();?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data["title"] ?? null ?></h3>
            <a href="<?php if(isset($data)) { echo "{$data['template']}/add"; }?>" class="btn btn-primary">Thêm mới</a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-12">
            <?php if(isset($_SESSION["flash"])) { ?>
                <h3 class="text-success"><?= $redirect->setFlash("flash"); ?></h3>
            <?php } ?>
        </div>
    </div>
    <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th><input type="checkbox" id="check-all" class="flat"></th>
                        <th class="column-title">Tên danh mục </th>
                        <th class="column-title">Publish</th>
                        <th class="column-title">Ngày Tạo </th>
                        <th class="column-title no-link last"><span class="nobr">Action</span></th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (isset($data)) {
                            foreach ($data["subcategories"] as $subcategory) {
                    ?>
                        <tr class="even pointer">
                            <td class="a-center align-middle"><input type="checkbox" id="check-all" class="flat" name="table_records"></td>
                            <td class="align-middle"><?= $subcategory["TenCTTheLoai"] ?></td>
    <!--                        <td class="align-middle">--><?//= $subcategory["Publish"] ?><!--</td>-->
                            <th>
                                <input type="checkbox" class="flat" <?php if($subcategory["Publish"]== 1) {echo "checked";}?>/>
                            </th>
                            <td class="align-middle"><?= $subcategory["NgayTao"] ?></td>
                            <td class=" last">
                                <a href="<?= $data["template"]?>" class="btn btn-success">Sửa</a>
                                <a href="<?= $data["template"]?>" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>

