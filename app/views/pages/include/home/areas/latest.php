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
                            <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>#like_comment_field" class="post-like"><i class="fa fa-thumbs-o-up" style="font-size: 18px"></i> <span><?=$post['SoLuotThich']?></span></a>
                            <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>#comment_field" class="post-comment"><i class="fa fa-comment-o" style="font-size: 18px"></i> <span><?=count($post['SoBinhLuan'])?></span></a>
                        </div>
                    </div>
                </div>
            </div>
    <?php }
    } ?>
</div>