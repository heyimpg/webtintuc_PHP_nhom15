<div class="newsletter-widget">
    <h4>Liên hệ hợp tác</h4>
    <p id="message_formEmail"></p>
    <p>Nếu bạn có nhu cầu quảng cáo sản phẩm thông qua website, vui lòng nhập thông tin cá nhân vào bên dưới,
        chúng tôi sẽ sớm liên hệ với bạn !</p>
    <!-- <form action="sendEmail" method="post"> -->
    <form action="" method="post" id="form_sendEmail">
        <input type="text" name="name-send_mail" placeholder="Tên" required maxlength="20">
        <input type="number" name="phone-send_mail" placeholder="SDT" required maxlength="10">
        <input type="email" name="email-send_mail" placeholder="Email" required>
        <button type="submit" class="btn w-100">Gửi đi</button>
    </form>
</div>

<script>
    // var form_sendMail = document.querySelector(".form-send_mail");
    function sendEmailProcess() {
        const name = $("input[name=name-send_mail]")
        const phone = $("input[name=phone-send_mail]")
        const email = $("input[name=email-send_mail]")
        const arr = [name.val(), phone.val(), email.val()]
        $.ajax("<?= BASE_URL ?>".concat("home/sendEmail/").concat(arr.toString()))
            .fail(function(response) {
                //do sth
            }).done(function(response) {
                const status = JSON.parse(response).statusCode
                if (status == 200)
                {
                    alert('Cảm ơn bạn!\nChúng tôi sẽ sớm liên hệ lại với bạn')
                    name.val('')
                    phone.val('')
                    email.val('')
                }
                if (status == 400)
                    alert('Đã có lỗi xảy ra!\nVui lòng thử lại sau')
                //do sth
            }).always(function(response) {
                //do sth
            });
    }
</script>