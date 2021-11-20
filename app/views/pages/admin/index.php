<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= BASE_URL?>">
    <title>Hệ thống Trang quản trị viên</title>
    <link rel="shortcut icon" href="assets/admin/build/images/favicon.ico"/>
    <!-- Bootstrap -->
    <link href="assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/admin/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="post" action="<?= BASE_URL."admin/admin/signin"?>">
                        <h1>Đăng nhập</h1>
                        <div hidden><input type="text" name="type" value="dang-nhap"></div>
                        <div>
                            <input type="text" name="TenTaiKhoan" class="form-control" placeholder="Tên đăng nhập" required="" />
                        </div>
                        <div>
                            <input type="password" name="MatKhau" class="form-control" placeholder="Mật khẩu" required="" />
                        </div>
                        <div>
                            <a class="btn btn-default submit" href="javascript:void(0)"><button type="submit" name="submit">Đăng nhập</button></a>
                            <a class="reset_pass" href="javascript:void(0)">Quên mật khẩu?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Bạn là thành viên mới?
                                <a href="<?= BASE_URL."admin/#signup" ?>" class="to_register"> Tạo tài khoản</a>
                            </p>

                            <div class="clearfix"></div>
                            <br />
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form method="post" action="<?= BASE_URL."admin/admin/signup"?>">
                        <h1>Tạo tài khoản mới</h1>
                        <?php
                            if(isset($data["signup_alert"])) {
                                echo $data["signup_alert"];
                            }
                        ?>
                        <div hidden>
                            <input type="text" name="type" value="dang-ki">
                        </div>
                        <div>
                            <input type="text" name="TenTaiKhoan" class="form-control" placeholder="Tên tài khoản"/>
                        </div>
                        <div>
                            <input type="email" name="Email" class="form-control" placeholder="Địa chỉ Email"/>
                        </div>
                        <div>
                            <input type="password" name="MatKhau" class="form-control" placeholder="Mật khẩu"/>
                        </div>
                        <div>
                            <input type="password" name="XacNhanMatKhau" class="form-control" placeholder="Nhập lại mật khẩu"/>
                        </div>
                        <div>
                            <a class="btn btn-default submit" href="javascript:void(0)">
                                <button type="submit" name="submit" value="submit">Đăng kí</button>
                            </a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Đã có tài khoản ?
                                <a href="<?= BASE_URL."admin/#signin" ?>" class="to_register"> Đăng nhập </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>