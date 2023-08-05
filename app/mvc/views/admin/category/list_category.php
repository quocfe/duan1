<section class="main">
  <div class="container-fluid">
    <div class="card w-75 mx-auto mt-5">
      <div class="card-header">
        <h2 class="heading">Danh sách danh mục</h2>
        <a class="addBtn" href="./addProducts.html">Thêm mới</a>
      </div>
      <div class="card-body">
        <table class="table">
          <thead class="thead-dark">
            <tr class="thead-dark-top text-center">
              <th>ID</th>
              <th>Tên danh mục</th>
              <th>Sửa</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              foreach ($list_categories as $list_category) {
                ?>
            <tr>
              <td><?= $list_category['cate_id'] ?></td>
              <td><?= $list_category['cate_name'] ?></td>
              <td>
                <a href="<?= base_url('admin/update_category&id='.$list_category['cate_id'].'') ?>" type="button"
                  class="btn-primary btnEdit">Sửa</a>
              </td>
              <td>
                <a href="<?= base_url('admin/detele_category&id='.$list_category['cate_id'].'') ?>" type="button"
                  class="btn-danger btnDelete">Xóa</a>
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