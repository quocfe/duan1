<section class="main main_page container">
  <div class="tilte">Quên mật khẩu</div>
  <form method="post" class="login_page foger_pass">
    <div class="login">
      <h3>Mật khẩu mà cũng quên ?</h3>
      <p class="message" style="line-height: 1.5;">
        Vui lòng nhập địa chỉ email. <br>
        Bạn sẽ nhận được mã OTP qua email.
      </p>
      <div class="input">
        <div class="form_group">
          <input type="text" name="emailRequest" placeholder="Enter your email" />
          <span class="message"><?php foreach ($errors as $error) {
            echo $error;
          } ?></span>
        </div>
      </div>
      <div class="see_more-btn">
        <button type="submit" name="request_pass" class="">Lấy mã OTP</button>
      </div>
    </div>
  </form>
</section>