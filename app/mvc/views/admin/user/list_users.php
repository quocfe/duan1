<section class="main">
  <div class="container-fluid">
    <div class="card w-80 mx-auto mt-5">
      <div class="card-header">
        <h2 class="heading">Danh sách thành viên</h2>
        <a class="addBtn" href="<?= base_url('admin/add_user') ?>">Thêm mới</a>
      </div>
      <div class="card-body">
        <table class="table">
          <thead class="thead-dark">
            <tr class="thead-dark-top text-center">
              <th>ID</th>
              <th>Tên đăng nhập</th>
              <th>Họ và tên</th>
              <th>Email</th>
              <th>vai trò</th>
              <th>Hoạt động</th>
              <th>Sửa</th>
              <th>Vô hiệu hóa</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($users as $user) {
                  extract($user);
                ?>
            <tr>
              <td><?=isset($user_id) ? $user_id : ''?></td>
              <td><?=isset($user_username) ? $user_username : ''?></td>
              <td><?=isset($user_fullname) && $user_fullname != '' ? $user_fullname : 'Họ và tên'?></td>
              <td><?=isset($user_mail) ? $user_mail : ''?></td>
              <td><?=isset($user_role) ? $user_role : ''?></td>
              <td><?=isset($user_active) ? $user_active : ''?></td>
              <td>
                <a href="<?= base_url('admin/update_user&id='.$user_id) ?> " type="button"
                  class="btn-primary btnEdit">Sửa</a>
              </td>
              <?php 
                if ($user_active == 0) {
                  ?>
              <td>
                <a href="<?= base_url('admin/active_user&id='.$user_id) ?>" type="button"
                  class="btn-primary btnEdit">Kích hoạt</a>
              </td>
              <?php
                } else {
                  ?>
              <td>
                <?php 
                  if ($user_role == 1) {
                    ?>
                <a style="background-color: gray; user-select: none; padding: 10px; border-radius: 10px;"
                  class="btn-danger ">Vô hiệu
                  hóa</a>
                <?php
                  } else {
                    ?>
                <a href="<?= base_url('admin/disable_user&id='.$user_id) ?>" type="button"
                  class="btn-danger btnDelete">Vô hiệu hóa</a>
                <?php
                  }
                ?>

              </td>
              <?php
                }
              ?>

            </tr>
            <?php
              }
            ?>

            <!-- <td colspan="7">
                <p class="text-center fs-3 fw-bolder text-danger">Empty</p>
              </td> -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>