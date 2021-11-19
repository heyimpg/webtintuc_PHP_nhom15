<?php 
    require_once "./app/controllers/navigation.php";
    $navigation = new navigation();
    $categories = $navigation->index();
?>
<!-- Css -->
<link rel="stylesheet" href="./assets/css/custom/header_style.css">

<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?= BASE_URL ?>">
                                <h3>Trang báo việt</h3>
                                <p>Tin mới mỗi ngày</p>
                            </a>
                        </div>

                        <!-- Login Search Area -->
                        <div class="login-search-area d-flex align-items-center">
                            <!-- Login -->
                            <div class="login d-flex">
                                <?php
                                if (isset($_SESSION["username"])) {
                                ?>
                                    <div class="show">
                                        <span href="#" class="name_user"><?php echo "Xin chào ".$_SESSION["username"]?>
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <a id="btn-logout">Đăng xuất</a>
                                    </div class="hide">
                                    <div class="hide">
                                        <a href="#" class="btn-sign_in">Đăng nhập </a>
                                        <a href="#" class="btn-sign_up">Đăng ký</a>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="hide">
                                        <a href="#" id="btn-logout">Account</a>
                                    </div class="none">
                                    <div class="show">
                                        <a href="#" class="btn-sign_in">Đăng nhập </a>
                                        <a href="#" class="btn-sign_up">Đăng ký</a>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                            <!-- Search Form -->
                            <div class="search-form">
                                <form action="<?=CATEGORY_URL."searchPost"?>" method="post">
                                    <input type="search" name="search" class="form-control" placeholder="Tìm kiếm">
                                    <button type="submit" name="submit_search"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="newspaper-main-menu" id="stickyMenu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="newspaperNav">

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li class="active"><a href="home">Trang chủ</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="home">Home</a></li>
                                        <li><a href="catagories-post.html">Catagories</a></li>
                                        <li><a href="single-post.html">Single Articles</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </li>
                                <?php
                                if (isset($categories)) {
                                    foreach ($categories as $category) {

                                ?>
                                        <li><a href="<?= CATEGORY_URL . $category["ID_CTTheLoai"] ?>"><?php echo $category['TenCTTheLoai']; ?></a></li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->
<script>
    // Logout
    var btnLogout = $("#btn-logout");
    btnLogout.click(e => {
        const result = confirm('Bạn có chắc muốn thoát tài khoản?');
        if (result) {
            $.ajax("<?= BASE_URL ?>".concat("login/logout/"))
                .fail(function(response) {
                    //do sth
                }).done(function(response) {
                    window.location.replace("<?= BASE_URL ?>");
                    //do sth
                }).always(function(response) {
                    //do sth
                });
        }
    })
</script>