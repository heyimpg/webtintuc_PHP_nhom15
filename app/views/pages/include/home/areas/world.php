<?php
if (isset($data)) {
    foreach ($data["world_post"] as $post) {
?>
        <!-- Single Post -->
        <div class="single-blog-post style-2">
            <div class="post-thumb">
                <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>"><img src="./assets/img/bg-img/<?= $post["AnhDaiDien"] ?>" alt=""></a>
            </div>
            <div class="post-data">
                <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>" class="post-title">
                    <h6><?= $post["TieuDe"] ?></h6>
                </a>
                <div class="post-meta">
                    <div class="post-date"><a href="#"><?= $post["NgayDang"] ?></a></div>
                </div>
            </div>
        </div>
<?php }
} ?>