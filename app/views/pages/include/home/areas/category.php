<?php
if (isset($data)) {
    foreach ($data['category_post'] as $post) {
?>
        <div class="single-blog-post small-featured-post d-flex">
            <div class="post-thumb">
                <a href="<?php echo DETAIL_URL.$post["ID_BaiViet"] ?>"><img src="./assets/img/bg-img/<?= $post["AnhDaiDien"] ?>" alt=""></a>
            </div>
            <div class="post-data">
                <a href="<?= CATEGORY_URL.$post["ID_TheLoai"] ?>" class="post-catagory"><?= $post['TenTheLoai'] ?></a>
                <div class="post-meta">
                    <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>" class="post-title">
                        <h6><?= $post['TieuDe'] ?></h6>
                    </a>
                    <p class="post-date"><?= $post['NgayDang'] ?></span></p>
                </div>
            </div>
        </div>
<?php }
} ?>