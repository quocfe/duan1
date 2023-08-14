<section class="main">
  <div class="container-fluid">
    <div class="card w-80 mx-auto mt-5">
      <div class="card-header">
        <h2 class="heading">Quản lý đơn hàng</h2>
      </div>
      <div class="card-body">
        <table class="table">
          <thead class="thead-dark">
            <tr class="thead-dark-top text-center">
              <th>Mã đơn hàng</th>
              <th>ID khách hàng</th>
              <th>Thời gian đặt hàng</th>
              <th>Tổng tiền</th>
              <th>Trạng thái</th>
              <th>
                <i class="fas fa-cog" aria-hidden="true"></i>
              </th>
              <th> <i class="fas fa-eye" aria-hidden="true"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($orders as $order) {
                extract($order);
                ?>
            <form method="post" class="edit_order">
              <tr>
                <td><?=$order_id?></td>
                <td><?=$user_id?></td>
                <td><?=$order_date?></td>
                <td><?=number_format($order_total, 0)?>VNĐ</td>
                <td>
                  <select class="status_option" name="status"
                    style="color: #fff; background-color: #020C1B; padding: 10px; border-radius: 10px; display: none;">
                    <option <?=$order_status == 'Đã xác nhận' ? 'selected' : '' ?> value="Đã xác nhận">Đã xác nhận
                    </option>
                    <option <?=$order_status == 'Đang xử lý' ? 'selected' : '' ?> value="Đang xử lý">Đang xử lý</option>
                    <option <?=$order_status == 'Đã hủy' ? 'selected' : '' ?> value="Đã hủy">Hủy</option>
                  </select>
                  <p style="color: <?php 
                    if ($order_status == 'Đã xác nhận') {
                      echo '#28A745';
                    } else if ($order_status == 'Đang xử lý') {
                      echo '#007BFF';
                    } else {
                      echo '#DC3545';
                    }
                  ?> "><?=$order_status?></p>
                </td>
                <td>
                  <input type="hidden" value="<?=$order_id?>" name="order_id">
                  <button style="display: none;" type="submit" name="updateorder"
                    class="btn-primary btnEdit btn-update-order">Cập
                    nhật</button>
                  <a style="background-color: #28A745 !important; cursor: pointer;"
                    class="btn-primary btnEdit btn-edit-order">Sửa</a>
                  <a style="background-color: #DC3545 !important; cursor: pointer; display: none;"
                    class="btn-primary btnEdit btn-cacel-order">Hủy</a>
                </td>
                <td>
                  <a href="<?=base_url("admin/detail_order&id=$order_id")?>">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>
                </td>
              </tr>
            </form>
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