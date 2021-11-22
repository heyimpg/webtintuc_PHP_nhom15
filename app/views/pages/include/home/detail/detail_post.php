<?php date_default_timezone_set('Asia/Ho_Chi_Minh');?>

<!-- Css -->
<link rel="stylesheet" href="./assets/css/custom/detail_style.css">

<div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
<!-- Blog posts -->
                    <div class="blog-posts-area">
                        <?php
                            if(isset($data)){
                                $post = $data["detail_post"];
                        ?>
                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post single-post">
                            <div class="post-thumb">
                                <a href="#"><img src="./assets/img/bg-img/<?= $post["AnhDaiDien"] ?>" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="<?= CATEGORY_URL.$post["ID_TheLoai"] ?>" class="post-catagory"><?= $post['TenTheLoai'] ?></a>
                                <a href="#" class="post-title">
                                    <h6><?=$post["TieuDe"]?></h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author" >Tác giả: <a href="#"><?= $post["author"] ?></a></p>
                                    <p><?=$post["GioiThieu"]?></p>
                                    <p><?=$post["NoiDung"]?></p>
                                    <div id="like_comment_field" class="newspaper-post-like d-flex align-items-center justify-content-end" style="padding-top: 100px">
                                        <!-- Post Like & Post Comment -->
                                        <a href="#" class="post-like"><img src="./assets/img/core-img/like.png" alt=""><span><?=$data['detail_post']['SoLuotThich']?></span></a>
                                        <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>#comment_field" class="post-comment"><img src="./assets/img/core-img/chat.png" alt=""> <span><?=count($data['comments'])?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="pager d-flex align-items-center justify-content-between">
                            <div class="prev">
                                <a href="#" class="active"><i class="fa fa-angle-left"></i> Trước</a>
                            </div>
                            <div class="next">
                                <a href="#">Tiếp <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>

                        <div class="section-heading">
                            <h6>Liên quan</h6>
                        </div>

                        <div class="row" style="border-bottom: 1px solid #d0d5d8;">
                            <!-- Single Post -->
                            <?php
                                foreach ($data['relative_post'] as $post) {
                            ?>
                            <div class="col-12 col-md-6">
                                <div class="single-blog-post style-3 mb-80">
                                    <div class="post-thumb">
                                        <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>"><img src="./assets/img/bg-img/<?= $post["AnhDaiDien"] ?>" alt=""></a>
                                    </div>
                                    <div class="post-data">
                                        <a href="<?= CATEGORY_URL.$post["ID_TheLoai"] ?>" class="post-catagory"><?= $post['TenTheLoai'] ?></a>
                                        <a href="<?= DETAIL_URL.$post["ID_BaiViet"] ?>" class="post-title">
                                            <h6><?= $post['TieuDe'] ?>...</h6>
                                        </a>
                                        <div class="post-meta d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="./assets/img/core-img/like.png" alt=""><span>392</span></a>
                                            <a href="#" class="post-comment"><img src="./assets/img/core-img/chat.png" alt=""> <span>10</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>

                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix" id="comment_field" style="padding-top: 100px">
                            <h5 class="title"><?=count($data['comments'])?> bình luận</h5>

                            <ol>
                                <!-- Single Comment Area -->
                                <?php
                                    foreach ($data['comments'] as $comment) {
                                ?>
                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content d-flex">
                                        <!-- Comment Author -->
                                        <div class="comment-author">
                                            <h3><i class="fa fa-user"></i></h3>
                                        </div>
                                        <!-- Comment Meta -->
                                        <div class="comment-meta">
                                            <a href="#" class="post-author"><?php 
                                                $user_comment = $comment['TaiKhoan'];
                                                if($data["detail_post"]['author'] == $comment['TaiKhoan'])
                                                    $user_comment .= " <i>(Tác giả)</i>";
                                                echo $user_comment;
                                            ?></a>
                                            <i class="post-date">
                                                <?php
                                                    $duration_time_comment = time()- strtotime($comment['ThoiGianBinhLuan']);
                                                    if ($duration_time_comment < 60) {
                                                        echo "vừa xong";
                                                    } elseif ($duration_time_comment >= 60 & $duration_time_comment < 60*60) {
                                                        echo floor($duration_time_comment/60)." phút trước";
                                                    } elseif ($duration_time_comment >= 60*60 & $duration_time_comment < 60*60*24) {
                                                        echo floor($duration_time_comment/(60*60))." giờ trước";
                                                    } else {
                                                        echo floor($duration_time_comment/(60*60*24))." ngày trước";
                                                    }
                                                ?>
                                            </i>
                                            <p><?=$comment['NoiDung']?></p>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                    }
                                ?>
                            </ol>
                        </div>

                        <?php
                                if (isset($_SESSION["username"])) {
                        ?>
                        <div class="post-a-comment-area section-padding-80-0">
                            <h4>Bình luận</h4>
                            <!-- Reply Form -->
                            <div class="contact-form-area">
                                <form action="<?= DETAIL_URL.$data['detail_post']['ID_BaiViet'] ?>" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea name="content" class="form-control" id="message" cols="10" rows="10" placeholder="Nhập nội dung" style="font-size: 15px; resize: none;" required></textarea>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn newspaper-btn mt-30 w-100" name="submit_comment" type="submit">Gửi đi</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php } else { ?>
                            <div class="post-a-comment-area section-padding-80-0">
                                <h6><a href="#" class="btn-sign_in" style="color: red; font-size: 1rem;">Đăng nhập ngay </a> để có thể thích, bình luận bài viết này</h6>
                            </div>
                            <?php } ?>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">
<!-- Category Post -->
                        <div class="latest-posts-widget mb-50">
                            <?php require_once "./app/views/pages/include/home/areas/category.php"; ?>
                        </div>
<!-- Popular News -->             
                        <?php require_once "./app/views/pages/include/home/areas/popular.php"; ?>

                        <!-- Newsletter Widget -->
                        <?php require_once "./app/views/pages/include/home/areas/news_letter.php"; ?>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>