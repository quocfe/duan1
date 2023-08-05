  <form class="change_password form_change form" action="" method="post">
    <?php 
      foreach ( $errors as $error) {
        ?>
    <span class="message"><?=$error ?></span>

    <?php
    
      }
    ?>
    <div class="form_group">
      <label for="">Mật khẩu cũ</label>
      <input type="password" name="old_pass" class="showPassword"
        value="<?=isset($GLOBALS['old_pass']) ? $GLOBALS['old_pass'] : '' ?>">
      <span class="message"></span>
    </div>
    <div class="form_group">
      <label for="">Mật khẩu mới</label>
      <input type="password" class="showPassword" name="new_pass">
      <span class="message"></span>
    </div>
    <div class="form_group">
      <label for="">Xác nhận mật khẩu mới</label>
      <input type="password" class="showPassword" name="pass_confirm">
      <span class="message"></span>
    </div>
    <div class="showPass">
      <input id="showPass" type="checkbox">
      <label for="showPass" class="showPassBtn">Hiển thị mật khẩu</label>
    </div>
    <button type="submit" name="change_password" class="btn_change">Đổi mật khẩu</button>
  </form>