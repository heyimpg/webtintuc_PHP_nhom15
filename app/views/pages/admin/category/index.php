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
                        <th class="column-title">Hiển thị</th>
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
                            foreach ($data["categories"] as $category) {
                    ?>
                        <?php if($category['ID_TheLoai'] != null) { ?>
                            <tr class="even<?= $category['ID_TheLoai'] ?> pointer">
                                <td class="a-center align-middle"><input type="checkbox" id="check-all" class="flat" name="table_records"></td>
                                <td class="align-middle"><?= $category["TenTheLoai"] ?></td>
                                <td>
                                    <input type="checkbox" class="flat" <?php if($category["HienThiCha"] == 1) {echo "checked";}?>/>
                                </td>
                                <td class="align-middle"><?= $category["NgayKhoiTao"] ?></td>
                                <td class=" last">
                                    <a href="<?= BASE_URL.$data['template']."/edit/".$category['ID_CTTheLoai']?>" class="btn btn-success">Sửa</a>
                                    <a id="del_tl_<?= $category['ID_TheLoai'] ?>" href="javascript:void(0)" onclick="del(this.id,<?= $category['ID_TheLoai'] ?>)" data-control="<?= $data['template'] ?>" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if(isset($category["TenCTTheLoai"])) { ?>
                            <tr class="even<?= $category['ID_CTTheLoai'] ?> pointer">
                                <td class="a-center align-middle"><input type="checkbox" id="check-all" class="flat" name="table_records"></td>
                                <?php if($category['ID_TheLoai'] != null) { ?>
                                    <td class="align-middle">----- <?= $category["TenCTTheLoai"] ?></td>
                                <?php } else {?>
                                    <td class="align-middle"><?= $category["TenCTTheLoai"] ?></td>
                                <?php } ?>
                                <td>
                                    <input type="checkbox" class="flat" <?php if($category["HienThiCon"] == 1) {echo "checked";}?>/>
                                </td>
                                <td class="align-middle"><?= $category["NgayTao"] ?></td>
                                <td class=" last">
                                    <a href="<?= BASE_URL.$data['template']."/edit/".$category['ID_CTTheLoai']?>" class="btn btn-success">Sửa</a>
                                    <a id="del_cttl_<?= $category['ID_CTTheLoai'] ?>" href="javascript:void(0)" onclick="del(this.id,<?= $category['ID_CTTheLoai'] ?>)" data-control="<?= $data['template'] ?>" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        <?php } } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>

