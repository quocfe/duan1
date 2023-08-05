<section class="main main_page container">
  <div class="tilte">Login</div>
  <div class="login_page">
    <div class="login">
      <h3>Đăng nhập</h3>
      <form class="login_form form" method="post">
        <div class="socail">
          <a>
            <img src="https://43factory.coffee/wp-content/themes/soteco/resources/images/icon_google.png"
              alt="google" />
            Đăng nhập với Google
          </a>
          <a>
            <img src="https://43factory.coffee/wp-content/themes/soteco/resources/images/icon_facebook.png"
              alt="facebook" />
            Đăng nhập với Facebook
          </a>
        </div>
        <div class="input">
          <div class="form_group">
            <input type="text" placeholder="Username" name="emailOrName"
              value="<?= isset($textValid['userName']) ? $textValid['userName'] : '' ?>" />
            <span class="message"><?= isset($errors['userName']) ?  $errors['userName'] : '' ?></span>
          </div>
          <div class="form_group">
            <input type="password" class="showPassword" placeholder="Password" name="password"
              value="<?= isset($textValid['password']) ? $textValid['password'] : '' ?>" />
            <span class="message"><?= isset($errors['password']) ?  $errors['password'] : '' ?></span>
          </div>
        </div>
        <div class="showPass">
          <input id="showPass" type="checkbox">
          <label for="showPass" class="showPassBtn">Hiển thị mật khẩu</label>
        </div>
        <a href="<?=base_url('users/forget_pass') ?>" class="forget">* Quên mật khẩu ?</a>
        <div class="see_more-btn">
          <button class="btn_submit" name="login">Đăng nhập</button>
        </div>
      </form>
    </div>
    <div class="register">
      <h3>Đăng ký</h3>
      <p class="message">Tạo tài khoản để truy cập và quản lý đơn hàng</p>
      <div class="see_more-btn">
        <a href="<?= base_url('users/register') ?>" class="">Đăng ký</a>
      </div>
    </div>
  </div>
</section>