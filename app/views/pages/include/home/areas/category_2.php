<!-- Trang  danh mục-->
<?php
        $ID_TheLoai = $data['isCategory'] ? 'ID_TheLoai' : 'ID_CTTheLoai';
        $TenCTTheLoai = $data['isCategory'] ? 'TenTheLoai' : 'TenCTTheLoai';
        foreach ($data['category_post_2'] as $key => $post) {
?>
        <!-- Single Featured Post -->
        <div class="single-blog-post featured-post mb-30">
            <div class="post-thumb">
                <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>"><img src="./assets/img/bg-img/<?= $post["AnhDaiDien"] ?>" alt=""></a>
            </div>
            <div class="post-data">
                <a href="<?= $URL.$post[$ID_TheLoai] ?>" class="post-catagory"><?= $post[$TenCTTheLoai] ?></a>
                <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>" class="post-title">
                    <h6><?= $post["TieuDe"] ?></h6>
                </a>
                <div class="post-meta">
                    <p class="post-author">By <a href="#">Christinne Williams</a></p>
                    <p class="post-excerp"><?= $post["GioiThieu"] ?></p>
                    <!-- Post Like & Post Comment -->
                    <div class="d-flex align-items-center">
                        <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>#like_comment_field" class="post-like"><img src="./assets/img/core-img/like.png" alt=""> <span><?=$post['SoLuotThich']?></span></a>
                        <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>#comment_field" class="post-comment"><img src="./assets/img/core-img/chat.png" alt=""> <span><?=count($post['SoBinhLuan'])?></span></a>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>