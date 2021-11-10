<!-- //Meta tag Keywords -->
<link href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./assets/css/login/style.css" type="text/css" media="all" />
<style>
.modal-sign_up {
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

.modal-sign_up.open {
    display: flex;
}

.modal__container-sign_up {
    min-height: 200px;
    width: 900px;
    max-width: calc(100% - 50px);
    max-height: calc(100% - 50px);
    background-color: #fff;
    animation: fadeInModal ease 0.5s;
}

.content-wthree,
.w3l_form {
    padding: 20px;
}

/* Message */
#message_formLogin-sign_up 
{
    opacity: 1;
}
</style>
<!-- Overlay -->
<div class="modal-sign_up modal_fixed">
    <div class="modal__container-sign_up">
        <!-- /form -->
        <div class="workinghny-form-grid">
            <div class="main-hotair">
                <div class="content-wthree">
                    <p id="message_formLogin-sign_up"></p>
                    <h2>Đăng ký</h2>
                    <form action="" method="post" id="form_signUp">
                        <input type="text" class="text" name="username-sign_up" placeholder="Tài khoản" required onfocus="clearMessageSignUp()">
                        <input type="password" class="password" name="password-sign_up" placeholder="Mật khẩu" required onfocus="clearMessageSignUp()" pattern="\w{6,20}" title="Độ dài yêu cầu từ 6-20 ký tự">
                        <input type="password" class="password" name="re_password-sign_up" placeholder="Nhập lại mật khẩu" required onfocus="clearMessageSignUp()" pattern="\w{6,20}" title="Độ dài yêu cầu từ 6-20 ký tự">
                        <button class="btn" name="submitFormLogin-sign_up" type="submit">Đăng ký</button>
                    </form>

                    <p class="account">Quay lại <a href="#" class="btn-sign_in">Đăng nhập</a></p>
                </div>
                <div class="w3l_form align-self">
                    <div class="left_grid_info">
                        <img src="./assets/img/core-img/avatar_register.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <!-- //form -->
    </div>
</div>

<script>
    function signOutProcess() {
        const username = $("input[name=username-sign_up]")
        const password = $("input[name=password-sign_up]")
        const re_password = $("input[name=re_password-sign_up]")
        const arr = [username.val(), password.val(), re_password.val()]
        $.ajax("<?= BASE_URL ?>".concat("login/sign_up/").concat(arr.toString()))
            .fail(function(response) {
                //do sth
            }).done(function(response) {
                const status = JSON.parse(response).statusCode
                let message = ''
                if (status == 201) {
                    username.val('')
                    password.val('')
                    re_password.val('')
                    message = "<p class='text-success'>Đăng ký thành công<p/>"
                } else if (status == 406) {
                    message = "<p class='text-warning'>Mật khẩu nhập lại không khớp<p/>"  
                } else if (status == 409) {
                    message = "<p class='text-danger'>Tên tài khoản đã tồn tại<p/>"  
                }
                else {
                    message = "<p class='text-danger'>Đã có lỗi xảy ra, vui lòng thử lại sau<p/>"
                }
                $("#message_formLogin-sign_up").html(message);
            }).always(function(response) {
                //do sth
            });
    }
    function clearMessageSignUp() {
        $("#message_formLogin-sign_up").html('');
    }
</script>