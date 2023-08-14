<section class="main">
  <div class="container-fluid">
    <div class="card w-80 mx-auto mt-5">

      <div class="card-header">
        <h2 class="heading">Chi tiết đơn hàng# <?=$shipping_info["shipping_id"]?></h2>
      </div>
      <div class="card-body">
        <table class="table">
          <thead class="thead-dark">
            <tr class="thead-dark-top text-center">
              <th>Tên khách hàng</th>
              <th>Địa chỉ</th>
              <th>Tên hàng hóa</th>
              <th>Đơn giá</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td><?=$shipping_info["username"]?></td>
              <td><?=$shipping_info["shipping_address"]?></td>
              <td><?=$detail[0]["prd_name"]?></td>
              <td><?=number_format($detail[0]["unit_price"], 0)?>VNĐ</td>
              <td><?=number_format($detail[0]["quantity"], 0)?></td>
              <td><?=number_format($detail[0]["total_price"], 0)?>VNĐ</td>
            </tr>

            <!-- <td colspan="7">
                <p class="text-center fs-3 fw-bolder text-danger">Empty</p>
              </td> -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>