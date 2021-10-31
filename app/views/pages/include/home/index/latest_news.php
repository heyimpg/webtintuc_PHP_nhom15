<div class="popular-news-area section-padding-80-50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <!-- Latest News -->
                <div class="section-heading">
                    <h6>Tin mới cập nhật</h6>
                </div>
                <?php require_once "./app/views/pages/include/home/areas/latest.php"; ?>
            </div>
            <div class="col-12 col-lg-4">
                <!-- Popular News -->
                <div class="section-heading">
                    <h6>Tin phổ biến</h6>
                </div>
                <?php require_once "./app/views/pages/include/home/areas/popular.php"; ?>
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