<!-- //Meta tag Keywords -->
<link href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./assets/css/login/style.css" type="text/css" media="all" />
<style>
.modal-sign_in {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.6);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1;
    padding-top: 80px;
}

.modal-sign_in.open {
    display: flex;
}

.modal__container-sign_in {
    min-height: 200px;
    width: 900px;
    max-width: calc(100% - 50px);
    max-height: calc(100% - 50px);
    background-color: #fff;
    animation: fadeInModal ease 0.5s;
}
</style>

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
    var btnSignIn = $("button[name=submitFormLogin-sign_in]");
    btnSignIn.click(e => {
        e.preventDefault();
        const username = $("input[name=username-sign_in]")
        const password = $("input[name=password-sign_in]")
        const arr = [username.val(), password.val()]
        $.ajax("<?= BASE_URL ?>".concat("login/sign_in/").concat(arr.toString()))
            .fail(function(response) {
                //do sth
            }).done(function(response) {
                const status = JSON.parse(response).statusCode
                let message = ''
                if (status == 200)
                {
                    message = 'Login success'
                    setTimeout(function(){window.location.replace("<?=BASE_URL?>");}, 500)
                }
                if (status == 400)
                    message = 'Account invalid'
                $("#message_formLogin-sign_in").html(message);
                //do sth
            }).always(function(response) {
                //do sth
            });
    })
</script>