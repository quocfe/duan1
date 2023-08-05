<?php 
extract($_SESSION['user']);
?>
<form method="post" enctype="multipart/form-data">
  <div class="account">
    <div class="account_head">
      <div class="account_head-img">
        <img src="<?= UPLOAD_USERS_URL ?>/<?= $user_img ? $user_img : 'defaut.jpg' ?>" alt="">
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="form_img">
          <div class="btn_change-img">
            <input class="custom-file-input" name="img" type="file" id="file" accept="image/*">
            <label for="file">Sửa ảnh đại diện</label>
          </div>
          <div class="message" style="margin-top: 20px;"><?=isset($errors['emptyImg']) ? $errors['emptyImg'] : '' ?>
          </div>
          <button type="submit" name="edit_img">Sửa</button>
        </div>
      </form>
    </div>
    <div class="account_info">
      <h4 class="account_info-head">
        Thông tin cá nhân
      </h4>
      <div class="account_info-main">
        <div class="form_account ">
          <div class="form_group ">
            <label for="">Họ tên</label>
            <input type="text" name="fullname" id="" value="<?=$user_fullname?>">
            <p><?= $user_fullname ? $user_fullname : 'Họ tên' ?></p>
          </div>
          <div class="form_group">
            <label for="">Tên đăng nhập</label>
            <input type="text" name="username" id="" value="<?= $user_username ?>">
            <p><?= $user_username ?></p>
          </div>
          <div class="form_group">
            <label for="">Email</label>
            <input type="text" name="email" id="" value="<?=$user_mail  ?>">
            <p><?= $user_mail ?></p>
          </div>
          <div class="form_group">
            <label for="">Giới tính</label>
            <select name="gender" id="">
              <option value="Nam" <?php echo $user_gender === 'Nam' ? 'selected' : '' ?>>Nam</option>
              <option value="Nữ" <?php echo $user_gender === 'Nữ' ? 'selected' : '' ?>>Nữ</option>
            </select>
            <p><?= isset($user_gender) && $user_gender ? $user_gender : "Giới tính" ?></p>
          </div>
          <div class="form_group">
            <label for="">Địa chỉ</label>
            <input type="text" name="address" id="" value="<?=$user_address?>">
            <p><?= isset($user_address) && $user_address ? $user_address : "Địa chỉ" ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="account_btn">
      <a class=" edit">Chỉnh sửa thông tin</a>
      <a class="cancel">Hủy</a>
      <button type="submit" name="update" class="update">Cập nhật thông tin</button>
    </div>
  </div>
</form>