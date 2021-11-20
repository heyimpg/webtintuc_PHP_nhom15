<?php 
    require_once "./app/controllers/navigation.php";
    $navigation = new navigation();
    $menu = $navigation->getMenu();
    $sub_menu = $navigation->getSubMenu();
    // var_dump($sub_menu);
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
                                <?php
                                if (isset($menu)) {
                                    foreach ($menu as $category) {
                                ?>
                                    <li>
                                        <a href="<?= CATEGORY_URL . $category["ID_TheLoai"] ?>">
                                            <?php echo $category['TenTheLoai']; ?>
                                        </a>
                                            <?php
                                                $arr_sub_category = array();
                                                foreach ($sub_menu as $sub_category)
                                                {
                                                    if ($sub_category["ID_TheLoai"] == $category["ID_TheLoai"])
                                                    {
                                                        array_push($arr_sub_category, $sub_category);
                                                    }
                                                }
                                                if(count($arr_sub_category)) {
                                                    ?>
                                                    <ul class="dropdown">
                                                        <?php
                                                            foreach ($arr_sub_category as $sub_category) {
                                                                ?>
                                                                    <li><a href="<?= CATEGORY_URL .'subCategory/'. $sub_category["ID_CTTheLoai"] ?>"><?php echo $sub_category['TenCTTheLoai']; ?></a></li>
                                                                <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                    <?php
                                                }
                                                unset($arr_sub_category);
                                            ?>
                                        
                                    </li>
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