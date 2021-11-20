<div class="row">
    <?php
    if (isset($data)) {
        foreach ($data['latest_post'] as $post) {
    ?>
            <!-- Single Post -->
            <div class="col-12 col-md-6">
                <div class="single-blog-post style-3">
                    <div class="post-thumb">
                        <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>"><img src="./assets/img/bg-img/<?= $post["AnhDaiDien"] ?>" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="<?= CATEGORY_URL.$post["ID_TheLoai"] ?>" class="post-catagory"><?= $post['TenTheLoai'] ?></a>
                        <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>" class="post-title">
                            <h6><?= $post["GioiThieu"] ?></h6>
                        </a>
                        <div class="post-meta d-flex align-items-center">
                            <a href="#" class="post-like"><img src="./assets/img/core-img/like.png" alt=""> <span>392</span></a>
                            <a href="#" class="post-comment"><img src="./assets/img/core-img/chat.png" alt=""> <span>10</span></a>
                        </div>
                    </div>
                </div>
            </div>
    <?php }
    } ?>
</div>