<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data["title"] ?? null ?></h3>
            <a href="<?php if(isset($data)) { echo "{$data['template']}/add"; }?>" class="btn btn-primary">Thêm mới</a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <form class="" action="" method="post" novalidate>
            </p>
            <span class="section">Personal Info</span>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="ex. John f. Kennedy" required="required" />
                </div>
            </div>
        </form>
        <div>
            <?php
                if(isset($data)) {
                    var_dump($data["array"]);
                }
            ?>
        </div>
    </div>
</div>

