<div class="addProducts ">
  <p class="title">Cập nhật khách hàng</p>
  <div class="box_add">
    <form method="post" enctype="multipart/form-data">
      <div style="grid-template-columns: repeat(2, 1fr);" class="form_select ">
        <div class="form_group">
          <label for="">Tên đăng nhập</label>
          <input type="text" name="username" id="" value="<?= $old_user['user_username']?>" />
        </div>
        <div class="form_group ">
          <label for="">Họ và tên</label>
          <input type="text" name="fullname" id="" value="<?= $old_user['user_fullname']?>" />
        </div>
        <div class="form_group">
          <label for="">Mật khẩu</label>
          <input type="password" name="password" id=" " value="<?= $old_user['user_password']?>" />
        </div>
        <div class="form_group">
          <label for="">Địa chỉ email</label>
          <input type="text" name="email" id="" value="<?= $old_user['user_mail']?>" />
        </div>
        <div class="form_group">
          <label for="">Hình ảnh</label>
          <input type="file" name="img" value="" />
          <input type="hidden" name="old_img" value="<?=$old_user['user_img']?>">
          <?= $old_user['user_img']?>
        </div>
        <div class="form_group">
          <label for="">Kích hoạt</label>
          <div class="radio_group">
            <div class="radio">
              <input type="radio" value="0" <?=$old_user['user_active'] == 0 ? 'checked': '' ?> name="active"
                id="selectActive1" />
              <label for="selectActive1">Chưa kích hoạt</label>
            </div>
            <div class="radio">
              <input type="radio" value="1" <?=$old_user['user_active'] == 1 ? 'checked': '' ?> name="active"
                id="selectActive2" />
              <label for="selectActive2">Kích hoạt</label>
            </div>
          </div>
        </div>
        <div class="form_group">
          <label for="">Vai trò</label>
          <div class="radio_group">
            <div class="radio">
              <input type="radio" value="0" <?=$old_user['user_role'] == 0 ? 'checked': '' ?> name="role"
                id="selectClient1" />
              <label for="selectClient1">Khách hàng</label>
            </div>
            <div class="radio">
              <input type="radio" value="1" <?=$old_user['user_role'] == 1 ? 'checked': '' ?> name="role"
                id="selectClient2" />
              <label for="selectClient2">Nhân viên</label>
            </div>
          </div>
        </div>
      </div>
      <div class="form_btn">
        <button class="btn_admin_product btn-primary" name="btn_update">Cập nhật mới</button>
        <a href="<?=base_url('admin/list_users')?>" class="btn_admin_product btn-light">Danh sách</a>
      </div>
    </form>
  </div>
</div>