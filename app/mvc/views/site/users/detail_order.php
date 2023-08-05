<div class="detai_order">
  <div class="detai_order-top">
    <h3>Chi tiết đơn hàng #<span><?=isset($id) ? $id : '' ?></span></h3>
  </div>
  <div class="detai_order-body">
    <div class="col">
      <p class="header">Thông tin đơn hàng</p>
      <div class="main">
        <p>Mã đơn hàng #<span><?=isset($order ["order_id"]) ? $order ["order_id"] : ''?></span></p>
        <p>Ngày tạo: <span><?=isset($order["order_date"]) ? $order["order_date"] : ''?></span></p>
      </div>
    </div>
    <div class="col">
      <p class="header">Thông tin đơn hàng</p>
      <div class="main">
        <p>Tổng giá trị sản phẩm:
          <span><?= isset($order["order_total"]) ? number_format($order["order_total"], 0) : '' ?></span>VNĐ
        </p>
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