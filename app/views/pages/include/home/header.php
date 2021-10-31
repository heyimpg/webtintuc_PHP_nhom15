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
                            <a href="<?=BASE_URL?>">
                                <h3>Trang báo việt</h3>
                                <p>Tin mới mỗi ngày</p>
                            </a>
                        </div>

                        <!-- Login Search Area -->
                        <div class="login-search-area d-flex align-items-center">
                            <!-- Login -->
                            <div class="login d-flex">
                                <a href="#">Đăng nhập</a>
                                <a href="#">Đăng ký</a>
                            </div>
                            <!-- Search Form -->
                            <div class="search-form">
                                <form action="#" method="post">
                                    <input type="search" name="search" class="form-control" placeholder="Tìm kiếm">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
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
                                        <li><a href="#">Dropdown</a>
                                            <ul class="dropdown">
                                                <li><a href="home">Home</a></li>
                                                <li><a href="catagories-post.html">Catagories</a></li>
                                                <li><a href="single-post.html">Single Articles</a></li>
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                                    if(isset($data)) {
                                        foreach ($data['categories'] as $category) {

                                ?>
                                <li><a href="<?= CATEGORY_URL.$category["ID_CTTheLoai"] ?>"><?php echo $category['TenCTTheLoai']; ?></a></li>
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
