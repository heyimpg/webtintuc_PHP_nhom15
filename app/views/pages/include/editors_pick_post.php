<div class="editors-pick-post-area section-padding-80-50">
    <div class="container">
        <div class="row">
            <!-- Editors Pick -->
            <div class="col-12 col-md-7 col-lg-9">
                <div class="section-heading">
                    <h6>Tin chọn lựa</h6>
                </div>

                <div class="row">
                    <?php
                        if(isset($data)){
                            foreach ($data["side_post"] as $post) {
                    ?>
                    <!-- Single Post -->
                    <div class="col-12 col-lg-4">
                        <div class="single-blog-post">
                            <div class="post-thumb">
                                <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>"><img src="./assets/img/bg-img/<?= $post["AnhDaiDien"] ?>" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>" class="post-title">
                                    <h6><?= $post["GioiThieu"] ?></h6>
                                </a>
                                <div class="post-meta">
                                    <div class="post-date"><a href="#"><?= $post["NgayDang"] ?></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }}?>
                </div>
            </div>

            <!-- World News -->
            <div class="col-12 col-md-5 col-lg-3">
                <div class="section-heading">
                        <h6>Tin thế giới</h6>
                </div>
                <?php
                        if(isset($data)){
                            foreach ($data["world_post"] as $post) {
                ?>
                <!-- Single Post -->
                <div class="single-blog-post style-2">
                    <div class="post-thumb">
                        <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>"><img src="./assets/img/bg-img/<?= $post["AnhDaiDien"] ?>" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>" class="post-title">
                            <h6><?= $post["GioiThieu"] ?></h6>
                        </a>
                        <div class="post-meta">
                            <div class="post-date"><a href="#"><?= $post["NgayDang"] ?></a></div>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>
