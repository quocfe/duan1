<section class="main main_page container">
  <div class="tilte">Register</div>
  <div class="login_page">
    <div class="register">
      <h3>Đăng ký</h3>
      <form method="post" class="form" enctype="multipart/form-data">
        <div class="input">
          <div class="form_group">
            <input type="text" name="username" placeholder="Username*"
              value="<?=isset($textValid['username']) ? $textValid['username']  : '' ?>" />
            <span class="message"><?= isset( $errors['username']) ?  $errors['username']  : ''?></span>
          </div>
          <div class="form_group">
            <input type="text" name="email" placeholder="Email*" autocomplete="off"
              value="<?=isset($textValid['email']) ? $textValid['email']  : '' ?>" />
            <?php if (isset($errors['emailEmpty'])): ?>
            <span class="message"><?= $errors['emailEmpty'] ?></span>
            <?php elseif (isset($errors['email'])): ?>
            <span class="message"><?= $errors['email'] ?></span>
            <?php elseif (isset($errors['mailExist'])): ?>
            <span class="message"><?= $errors['mailExist'] ?></span>
            <?php endif; ?>
          </div>
          <div class="form_group">
            <input type="password" class="showPassword" name="password" placeholder="Password*" autocomplete="off"
              value="<?=isset($textValid['password']) ? $textValid['password']  : '' ?>" />
            <span class="message"><?=  isset($errors["password"]) ? check_isset($errors["password"], '') : '' ?></span>
          </div>
          <div class="form_group">
            <input type="password" class="showPassword" placeholder="Password confirmation*" name="comfirmPassword" />
            <span
              class="message"><?=  isset($errors["comfirmPassword"]) ? check_isset($errors["comfirmPassword"], 'Trường này không được để trống') : '' ?></span>
          </div>
        </div>
        <div class="showPass">
          <input id="showPass" type="checkbox">
          <label for="showPass" class="showPassBtn">Hiển thị mật khẩu</label>
        </div>
        <div class="see_more-btn">
          <button class="btn_submit" name="register">Đăng ký</button>
        </div>
      </form>
    </div>
    <div class="login">
      <h3>Đăng nhập</h3>
      <p class="message">
        Bạn đã có tài khoản? Vui lòng đăng nhập tại đây
      </p>
      <div class="see_more-btn">
        <a href="<?= base_url('users/login') ?>" class="">Đăng nhập</a>
      </div>
    </div>
  </div>
</section>