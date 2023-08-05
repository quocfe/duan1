    <section class="main">
      <div class="container-fluid">
        <div class="card w-75 mx-auto mt-5">
          <div class="card-header">
            <h2 class="heading">Danh sách sản phẩm</h2>
            <a class="addBtn" href="<?= base_url('admin/add_product') ?>">Thêm mới</a>
          </div>
          <div class="card-body">
            <table class="table">
              <thead class="thead-dark">
                <tr class="thead-dark-top text-center">
                  <th>ID</th>
                  <th>Tên sản phẩm</th>
                  <th>Hình ảnh</th>
                  <th>Giá sản phẩm</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach($list_product as $product) {
                    ?>
                <tr>
                  <td><?= $product["pdt_id"] ?></td>
                  <td><?= $product["pdt_title"] ?></td>
                  <td>
                    <img style="margin: 0 auto;" width="100px" heigh="100px"
                      src="<?= UPLOAD_PRODUCT_URL.'/'.$product["pdt_img"]?>" />
                  </td>
                  <td><?= number_format($product["pdt_price"], 0) ?> VNĐ</td>
                  <td>
                    <a href="<?= base_url('admin/update_product&id='.$product["pdt_id"].'') ?> " type="button"
                      class="btn-primary btnEdit">Sửa</a>
                  </td>
                  <td>
                    <a href="<?= base_url('admin/delete_product&id='.$product["pdt_id"].'') ?>" type="button"
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