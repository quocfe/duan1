<section class="main">
  <div class="container-fluid">
    <div class="card w-75 mx-auto mt-5">
      <div class="card-header">
        <h2 class="heading">Danh sách thành viên</h2>
        <a class="addBtn" href="<?= base_url('admin/add_user') ?>">Thêm mới</a>
      </div>
      <div class="card-body">
        <table class="table">
          <thead class="thead-dark">
            <tr class="thead-dark-top text-center">
              <th>ID</th>
              <th>Họ và tên</th>
              <th>Email</th>
              <th>vai trò</th>
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
              <td><?=$user_id?></td>
              <td><?=$user_username?></td>
              <td><?=$user_mail?></td>
              <td><?=$user_role?></td>
              <td>
                <a href="<?= base_url('admin/update_user&id='.$user_id) ?> " type="button"
                  class="btn-primary btnEdit">Sửa</a>
              </td>
              <td>
                <a href="<?= base_url('admin/disable_product&id='.$user_id) ?>" type="button"
                  class="btn-danger btnDelete">Vô hiệu hóa</a>
              </td>
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