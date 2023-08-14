<div class="detai_order">
  <div class="detai_order-top" style="display: flex; align-items: center; justify-content: space-between;">
    <h3>Chi tiết đơn hàng #<span><?=isset($id) ? $id : '' ?></span></h3>
    <?php 
      if ($order['order_status'] != 'Đã xác nhận' && $order['order_status'] != 'Đã hủy') {
        ?>
    <form method="post">
      <button style="background-color: #dc3545; padding: 10px; color: #fff; cursor: pointer;" type="submit"
        name="cacelOrder" class="btn-primary btnEdit ">Hủy
        đơn hàng</button>
    </form>
    <?php
      } else if ($order['order_status'] == 'Đã hủy') {
        ?>
    <a style="background-color: #28A745 ; padding: 10px; color: #fff; cursor: pointer;" class="btn-primary btnEdit ">Đơn
      hàng đã hủy</a>
    <?php
      } else if ($order['order_status'] == 'Đã xác nhận') {
        ?>
    <a style="background-color: #28A745 ; padding: 10px; color: #fff; cursor: pointer;" class="btn-primary btnEdit ">Đơn
      hàng đã được xác nhận</a>
    <?php
      } 
    ?>

  </div>
  <div class="detai_order-body">
    <div class="col">
      <p class="header">Thông tin đơn hàng</p>
      <div class="main">
        <p>Mã đơn hàng #<span><?=isset($order ["order_id"]) ? $order ["order_id"] : ''?></span></p>
        <p>Ngày tạo: <span><?=isset($order["order_date"]) ? $order["order_date"] : ''?></span></p>
        <p>Tổng giá trị sản phẩm:
          <span><?= isset($order["order_total"]) ? number_format($order["order_total"], 0) : '' ?></span>VNĐ
        </p>
      </div>
    </div>
    <div class="col">
      <p class="header">Thông tin người nhận</p>
      <div class="main">
        <p>Họ tên: <span><?=$shipping_info['username']?></span></p>
        <p>Địa chỉ: <span><?=$shipping_info['shipping_address']?></span></p>
      </div>
    </div>
  </div>
  <div class="detai_order-bottom">
    <?php 
      foreach ($detail as $item) {
        ?>
    <div class="item">
      <div class="img">
        <img src="<?= UPLOAD_PRODUCTS_URL.'/'.$item["prd_img"] ?>" alt="">
      </div>
      <div class="infor">
        <a href="<?= base_url('product/show&id='.$item["pdt_id"].'') ?>"><?= $item["prd_name"] ?></a>
      </div>
      <div class="quantity">
        <p>sl: <span><?=$item["quantity"]?></span></p>
      </div>
      <div class="total">
        <?=number_format($item["total_price"], 0)?>VNĐ
      </div>
    </div>
    <?php
      }
    ?>
  </div>
</div>