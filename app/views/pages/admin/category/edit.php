<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data["title"] ?? null ?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <form action="" method="post" novalidate>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Tên danh mục*</label>
                        <input type="text" onkeyup="removeAccents(this)" class="form-control" name="data_post[TenCTTheLoai]" id="name">
                        <input hidden type="text" name="data_post[URL]" id="slug">
                    </div>
                    <div class="form-group">
                        <label for="parent_category">Danh mục cha</label>
                        <select name="data_post[ID_TheLoai]" class="form-control" id="parent_category">
                            <option value="0" selected disabled hidden>Chọn danh mục cha</option>
                            <?php
                                if(isset($data["categories"]) && $data["categories"] != null) {
                                    foreach ($data["categories"] as $key => $value) {
                            ?>
                                        <option value="<?= $value["ID_TheLoai"] ?>"><?= $value["TenTheLoai"] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="publish">Hiển thị</label>
                        <input type="checkbox" checked name="data_post[HienThi]" id="publish">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="submit">Cập nhật</button>
                        <a class="btn btn-info" href="<?= BASE_URL.$data["template"]."/index" ?>">Trở lại</a>
                    </div>
                </div>
            </div>
        </form>
    <div>
</div>

<script>
    function removeAccents(str) {
        let substr = str.value;
        var AccentsMap = [
            "aàảãáạăằẳẵắặâầẩẫấậ",
            "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
            "dđ", "DĐ",
            "eèẻẽéẹêềểễếệ",
            "EÈẺẼÉẸÊỀỂỄẾỆ",
            "iìỉĩíị",
            "IÌỈĨÍỊ",
            "oòỏõóọôồổỗốộơờởỡớợ",
            "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
            "uùủũúụưừửữứự",
            "UÙỦŨÚỤƯỪỬỮỨỰ",
            "yỳỷỹýỵ",
            "YỲỶỸÝỴ",
            " .:/@#<>%^*()",
        ];
        for (var i=0; i<AccentsMap.length; i++) {
            var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
            var char = AccentsMap[i][0];
            substr = substr.replace(re, char);
            substr = substr.replace(/\s/g,'-');
        }
        document.querySelector('#slug').value = substr;
    }
</script>