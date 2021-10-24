<div class="popular-news-area section-padding-80-50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="section-heading">
                    <h6>Tin mới cập nhật</h6>
                </div>

                <div class="row">
                    <?php
                        if(isset($data)){
                            foreach ($data['latest_post'] as $post) {
                    ?>
                    <!-- Single Post -->
                    <div class="col-12 col-md-6">
                        <div class="single-blog-post style-3">
                            <div class="post-thumb">
                                <a href="#"><img src="./assets/img/bg-img/<?= $post["AnhDaiDien"] ?>" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="#" class="post-catagory">Finance</a>
                                <a href="#" class="post-title">
                                    <h6><?= $post["GioiThieu"] ?></h6>
                                </a>
                                <div class="post-meta d-flex align-items-center">
                                    <a href="#" class="post-like"><img src="./assets/img/core-img/like.png" alt=""> <span>392</span></a>
                                    <a href="#" class="post-comment"><img src="./assets/img/core-img/chat.png" alt=""> <span>10</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } }?>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="section-heading">
                    <h6>Tin phổ biến</h6>
                </div>
                <!-- Popular News Widget -->
                <div class="popular-news-widget mb-30">
                    <h3>Top tin phổ biến nhất</h3>

                    <!-- Single Popular Blog -->
                    <?php
                        if(isset($data)){
                            foreach ($data["popular_post"] as $key => $post) {
                    ?>
                    <div class="single-popular-post">
                        <a href="#">
                            <h6><span><?=$key+1?>.</span> <?=$post["TieuDe"]?></h6>
                        </a>
                        <p><?=$post["NgayDang"]?></p>
                    </div>
                    <?php }}?>

                </div>

                <!-- Newsletter Widget -->
                <div class="newsletter-widget">
                        <h4>Liên hệ hợp tác</h4>
                        <p>Nếu bạn có nhu cầu quảng cáo sản phẩm thông qua website, vui lòng nhập thông tin cá nhân vào bên dưới,
                             chúng tôi sẽ sớm liên hệ với bạn !</p>
                        <form action="#" method="post">
                            <input type="text" name="text" placeholder="Tên">
                            <input type="number" name="phone" placeholder="SDT">
                            <input type="email" name="email" placeholder="Email">
                            <button type="submit" class="btn w-100">Gửi đi</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
