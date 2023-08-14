<div class="container">
  <div class="page-title">
    <h4 class="mt-5 font-weight-bold text-center mb-5 text-white">THỐNG KÊ HÀNG HÓA TỪNG LOẠI</h4>
  </div>
  <div class="box border-top-0">
    <div class="box-body" style="background: #020C1B;">
      <table width="100%" class="table table-hover table-bordered text-center ">
        <thead class="" style="background: #020C1B;">
          <tr class="">
            <th>LOẠI HÀNG</th>
            <th>SỐ LƯỢNG</th>
            <th>GIÁ CAO NHẤT</th>
            <th>GIÁ THẤP NHẤT</th>
            <th>GIÁ TRUNG BÌNH</th>
          </tr>
        </thead>
        <tbody style="border-bottom: 1px solid #fff; ">
          <?php
                    foreach ($items as $item) {
                        extract($item);
                    ?>
          <tr>
            <td><?= $cate_name ?></td>
            <td><?= $quantity ?></td>
            <td><?= number_format($min_price, 0) ?>VNĐ</td>
            <td><?= number_format($max_price, 0) ?>VNĐ</td>
            <td><?= number_format($price_avg, 0) ?>VNĐ</td>
          </tr>
          <?php
                    }
                    ?>
        </tbody>
      </table>
      <a href="<?=base_url('admin/chart')?>" style=" padding: 10px; " class=" btn-info text-white">Xem
        biểu đồ<i class=" fas fa-eye ml-2"></i></a>
    </div>
  </div>
</div>