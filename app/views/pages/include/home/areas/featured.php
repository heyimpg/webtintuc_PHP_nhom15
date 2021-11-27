<div class="row">
    <!-- Single Featured Post -->
    <div class="col-12 col-lg-7">
        <?php
        if (isset($data)) {
            $first_post = $data['featured_post'][0];
        ?>
            <div class="single-blog-post featured-post">
                <div class="post-thumb">
                    <a href="<?= DETAIL_URL . $first_post["ID_BaiViet"] ?>"><img src="./assets/img/bg-img/<?= $first_post['AnhDaiDien'] ?>" alt="" style="width: 100%; height: 275px;"></a>
                </div>
                <div class="post-data">
                    <a href="<?= CATEGORY_URL . $first_post["ID_TheLoai"] ?>" class="post-catagory"><?= $first_post['TenTheLoai'] ?></a>
                    <a href="<?= DETAIL_URL . $first_post["ID_BaiViet"] ?>" class="post-title">
                        <h6><?= $first_post['TieuDe'] ?></h6>
                    </a>
                    <div class="post-meta">
                        <p class="post-excerp"><?= $first_post['GioiThieu'] ?>...</p>
                        <!-- Post Like & Post Comment -->
                        <div class="d-flex align-items-center">
                            <?php
                            if (isset($_SESSION["username"]) && $first_post['DaThich']) {
                            ?>
                                <a href="<?= DETAIL_URL . $first_post["ID_BaiViet"] ?>#like_comment_field" class="post-like"><i class="fa fa-thumbs-up" style="font-size: 18px"></i> <span><?= $first_post['SoLuotThich'] ?></span></a>
                            <?php
                            } else { ?>
                                <a href="<?= DETAIL_URL . $first_post["ID_BaiViet"] ?>#like_comment_field" class="post-like"><i class="fa fa-thumbs-o-up" style="font-size: 18px"></i> <span><?= $first_post['SoLuotThich'] ?></span></a>
                            <?php
                            }
                            ?>
                            <a href="<?= DETAIL_URL . $first_post["ID_BaiViet"] ?>#comment_field" class="post-comment"><i class="fa fa-comment-o" style="font-size: 18px"></i> <span><?= count($first_post['SoBinhLuan']) ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="col-12 col-lg-5">
        <!-- Single Featured Post -->
        <?php
        if (isset($data)) {
            foreach ($data['featured_post'] as $key => $post) {
                if ($key != 0) {
        ?>
                    <div class="single-blog-post featured-post-2">
                        <div class="post-thumb">
                            <a href="<?= DETAIL_URL . $post["ID_BaiViet"] ?>"><img src="./assets/img/bg-img/<?= $post['AnhDaiDien'] ?>" alt="" style="max-height: 160px; width: 100%"></a>
                        </div>
                        <div class="post-data">
                            <a href="<?= CATEGORY_URL.$post["ID_TheLoai"] ?>" class="post-catagory"><?= $post['TenTheLoai'] ?></a>
                            <div class="post-meta">
                                <a href="<?= DETAIL_URL . $post["ID_BaiViet"] ?>" class="post-title">
                                    <h6><?= $post['TieuDe'] ?></h6>
                                </a>
                                <!-- Post Like & Post Comment -->
                                <div class="d-flex align-items-center">
                                    <?php
                                    if (isset($_SESSION["username"]) && $post['DaThich']) {
                                    ?>
                                        <a href="<?= DETAIL_URL . $post["ID_BaiViet"] ?>#like_comment_field" class="post-like"><i class="fa fa-thumbs-up" style="font-size: 18px"></i> <span><?= $post['SoLuotThich'] ?></span></a>
                                    <?php
                                    } else { ?>
                                        <a href="<?= DETAIL_URL . $post["ID_BaiViet"] ?>#like_comment_field" class="post-like"><i class="fa fa-thumbs-o-up" style="font-size: 18px"></i> <span><?= $post['SoLuotThich'] ?></span></a>
                                    <?php
                                    }
                                    ?>
                                    <a href="<?= DETAIL_URL . $post["ID_BaiViet"] ?>#comment_field" class="post-comment"><i class="fa fa-comment-o" style="font-size: 18px"></i> <span><?= count($post['SoBinhLuan']) ?></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php }
            }
        } ?>
    </div>
</div>