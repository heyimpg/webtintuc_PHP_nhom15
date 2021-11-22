<?php
  if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
      require_once "app/views/pages/include/admin/header.php"; 
?>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="admin" class="site_title"><i class="fa fa-paw"></i> <span>Trang quản trị</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="assets/admin/build/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Xin chào,</span>
                <h2>
                  <?php if(isset($_SESSION["ID_TaiKhoan"])) {
                      echo explode(" ", $_SESSION["TenTaiKhoan"])[0];
                    } else {
                      echo "Quản trị viên";
                    }
                  ?>
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php require_once "app/views/pages/include/admin/sidebar.php";?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Cài đặt">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Toàn màn hình">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Khóa">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Đăng xuất" href="admin/admin/signout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <?php require_once "app/views/pages/include/admin/topnav.php";?>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <?php if(isset($data)) { require_once "app/views/pages/{$data["page"]}.php"; }?>
        </div>
        <!-- /page content -->
        <?php require_once "app/views/pages/include/admin/footer.php"; ?>
<?php
  } 
  else {
    require_once "app/views/pages/admin/error/page_403.php";
  }
?>

        



