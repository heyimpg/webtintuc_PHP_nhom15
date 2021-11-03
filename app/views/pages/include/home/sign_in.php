<!-- //Meta tag Keywords -->
<link href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./assets/css/login/style.css" type="text/css" media="all" />

<!-- Overlay -->
<div class="modal-sign_in modal_fixed">
    <div class="modal__container-sign_in">
        <!-- /form -->
        <div class="workinghny-form-grid">
            <div class="main-hotair">
                <div class="content-wthree">
                    <p id="message_formLogin-sign_in"></p>
                    <h2>Đăng nhập</h2>
                    <form action="" method="post">
                        <input type="text" class="text" name="username-sign_in" placeholder="Tài khoản" required="" autofocus>
                        <input type="password" class="password" name="password-sign_in" placeholder="Mật khẩu" required="" autofocus>
                        <button class="btn" name="submitFormLogin-sign_in" type="submit">Đăng nhập</button>
                    </form>

                    <p class="account">Nếu bạn chưa có tài khoản? <a href="#signup">Đăng ký ngay</a></p>
                </div>
                <div class="w3l_form align-self">
                    <div class="left_grid_info">
                        <img src="./assets/img/core-img/avatar_login.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <!-- //form -->
    </div>
</div>


<script>
    var sm = $("button[name=submitFormLogin-sign_in]");
    sm.click(e => {
        e.preventDefault();
        const username = $("input[name=username-sign_in]")
        const password = $("input[name=password-sign_in]")
        const arr = [username.val(), password.val()]
        $.ajax("<?= BASE_URL ?>".concat("login/sign_in/").concat(arr.toString()))
            .fail(function(response) {
                //do sth
            }).done(function(response) {
                $("#message_formLogin-sign_in").html(response);
                //do sth
            }).always(function(response) {
                //do sth
            });
    })
</script>