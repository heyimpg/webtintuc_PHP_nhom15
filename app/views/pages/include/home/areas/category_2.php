<!-- Trang  danh mục-->
<?php
$ID_TheLoai = $data['isCategory'] ? 'ID_TheLoai' : 'ID_CTTheLoai';
$TenCTTheLoai = $data['isCategory'] ? 'TenTheLoai' : 'TenCTTheLoai';
foreach ($data['category_post_2'] as $key => $post) {
?>
    <!-- Single Featured Post -->
    <div class="single-blog-post featured-post mb-30">
        <div class="post-thumb">
            <a href="<?= DETAIL_URL . $post["ID_BaiViet"] ?>"><img src="./assets/img/bg-img/<?= $post["AnhDaiDien"] ?>" style="width: 100%; height: 400px;" alt=""></a>
        </div>
        <div class="post-data">
            <a href="<?= $URL . $post[$ID_TheLoai] ?>" class="post-catagory"><?= $post[$TenCTTheLoai] ?></a>
            <a href="<?= DETAIL_URL . $post["ID_BaiViet"] ?>" class="post-title">
                <h6><?= $post["TieuDe"] ?></h6>
            </a>
            <div class="post-meta">
                <p class="post-author">Tác giả: <a href="#"><?= $post["TacGia"] ?></a></p>
                <p class="post-excerp"><?= $post["GioiThieu"] ?></p>
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
<?php } ?>