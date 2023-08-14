<?php 
  var_dump(empty($errors));
?>

<section class="main main_page container">
  <div class="login_page" style="grid-template-columns:100%;">
    <div class="login" style="margin: 0 auto;">
      <h3>Đặt lại mật khẩu</h3>
      <?php 
        foreach ($errors as $error) {
          ?>
      <span style="color: #dc3545; margin-bottom: 10px; display:block"><?=$error?></span>
      <?php
        }
      ?>
      <form class="login_form form" method="post">
        <div class="input">
          <div class="form_group">
            <input type="text" placeholder="OTP" name="otp" value="" />
            <span class="message"></span>
          </div>
          <div class="form_group">
            <input type="password" class="showPassword" placeholder="Password" name="password" value="" />
            <span class="message"></span>
          </div>
          <div class="form_group">
            <input type="password" class="showPassword" placeholder="Password confirmation*" name="comfirmPassword" />
            <span class="message"></span>
          </div>
        </div>
        <div class="showPass">
          <input id="showPass" type="checkbox">
          <label for="showPass" class="showPassBtn">Hiển thị mật khẩu</label>
        </div>
        <div class="see_more-btn">
          <button class="btn_submit" name="request_newpass">Đặt lại mật khẩu</button>
        </div>
      </form>
    </div>
  </div>
</section>