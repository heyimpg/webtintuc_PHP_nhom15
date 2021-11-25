<div class="row">
    <?php
    if (isset($data)) {
        foreach ($data["editor_pick_post"] as $post) {
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
    <?php }
    } ?>
</div>