<div class="featured-post-area">
    <div class="container">
        <div class="row">
            <!-- Featured Post -->
            <div class="col-12 col-md-6 col-lg-8">
                <div class="row">
                    <!-- Single Featured Post -->
                    <div class="col-12 col-lg-7">
                        <?php
                        if(isset($data)){
                            $first_post = $data['featured_post'][0]; 
                    ?>
                        <div class="single-blog-post featured-post">
                            <div class="post-thumb">
                                <a href="<?= DETAIL_URL.$first_post["ID_BaiViet"] ?>"><img
                                        src="./assets/img/bg-img/<?=$first_post['AnhDaiDien']?>" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="<?= CATEGORY_URL.$first_post["ID_TheLoai"] ?>" class="post-catagory"><?= $first_post['TenTheLoai'] ?></a>
                                <a href="<?= DETAIL_URL.$first_post["ID_BaiViet"] ?>" class="post-title">
                                    <h6><?= $first_post['TieuDe'] ?></h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">Christinne Williams</a></p>
                                    <p class="post-excerp"><?=$first_post['GioiThieu']?>...</p>
                                    <!-- Post Like & Post Comment -->
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="post-like"><i class="fa fa-thumbs-o-up" style="font-size: 18px"></i><span>392</span></a>
                                        <a href="#" class="post-comment"><i class="fa fa-comment-o" style="font-size: 18px"></i> <span>10</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>

                    <div class="col-12 col-lg-5">
                        <!-- Single Featured Post -->
                        <?php
                        if(isset($data)){
                            foreach ($data['featured_post'] as $key => $post) {
                                if($key!=0)
                                {
                        ?>
                        <div class="single-blog-post featured-post-2">
                            <div class="post-thumb">
                                <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>"><img
                                        src="./assets/img/bg-img/<?=$post['AnhDaiDien']?>" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="<?= CATEGORY_URL.$post["ID_TheLoai"] ?>" class="post-catagory"><?= $post['TenTheLoai'] ?></a>
                                <div class="post-meta">
                                    <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>" class="post-title">
                                        <h6><?=$post['GioiThieu']?>...</h6>
                                    </a>
                                    <!-- Post Like & Post Comment -->
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="post-like"><i class="fa fa-thumbs-o-up" style="font-size: 18px"></i>
                                            <span>392</span></a>
                                        <a href="#" class="post-comment"><img src="./assets/img/core-img/chat.png"
                                                alt=""> <span>10</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }}}?>
                    </div>
                </div>
            </div>
            <!-- Category Post -->
            <div class="col-12 col-md-6 col-lg-4">
                <!-- Single Featured Post -->
                <?php
                    if(isset($data)){
                        foreach ($data['category_post'] as $post) {
                ?>
                <div class="single-blog-post small-featured-post d-flex">
                    <div class="post-thumb">
                        <a href="<?php echo DETAIL_URL.$post["ID_BaiViet"] ?>"><img
                                src="./assets/img/bg-img/<?= $post["AnhDaiDien"] ?>" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="#" class="post-catagory"><?= $post['TenTheLoai'] ?></a>
                        <div class="post-meta">
                            <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>" class="post-title">
                                <h6><?=$post['TieuDe']?></h6>
                            </a>
                            <p class="post-date"><?=$post['NgayDang']?></span></p>
                        </div>
                    </div>
                </div>
                <?php }}?>
            </div>
        </div>
    </div>
</div>