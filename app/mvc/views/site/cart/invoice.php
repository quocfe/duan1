<div class="invoice">
  <div class="header">
    <div class="header_left">
      <div class="logo">
        <a href="<?= base_url('home/index') ?>">
          <img src="<?= CONTENT_URL ?>/asset/img/LOGOSIMPLE47FACTORY.png" alt="" />
        </a>
      </div>
      <div class="thanks_text">
        <p>Hello, <span> <?= $_SESSION['user']["user_fullname"] ? 
            $_SESSION['user']["user_fullname"] : 
            $_SESSION['user']["user_username"] ?></span></p>
        <p>Thank you for your order.</p>
      </div>
    </div>
    <div class="header_right">
      <div class="invoice_text">
        <p>Hóa đơn</p>
      </div>
      <div class="invoice_date">
        <p>Order #<span><?=$shipping["order_id"] ?></span></p>
        <p><?=$_SESSION['shipping']["date"]?></p>
      </div>
    </div>
  </div>
  <div class="main">
    <div class="info_product">
      <ul class="head">
        <li>Tên sản phẩm</li>
        <li>Số lượng</li>
        <li>Đơn giá</li>
        <li>Tổng</li>
      </ul>
      <div class="content_wrapper">
        <?php 
          foreach($data as $item) {
            ?>
        <ul class="content">
          <li><?= $item["prd_name"] ?></li>
          <li><?= $item["quantity"] ?></li>
          <li><?= number_format($item["unit_price"], 0)?>VNĐ</li>
          <li><?= number_format($item["total_price"], 0)?>VNĐ</li>
        </ul>
        <?php
          }
        ?>
      </div>
    </div>
    <div class="info_total">
      <?php 
          $total = 0;
          foreach($data as $item) {
            $total += $item["total_price"];
          }
      ?>
      <ul>
        <li>
          <p>Tạm tính</p>
          <p><?=number_format($total, 0)?>VNĐ</p>
        </li>
        <li>
          <p>Phí vận chuyển</p>
          <p>0VNĐ</p>
        </li>
        <li>
          <p>Giảm giá</p>
          <p>0</p>
        </li>
        <li>
          <p>Total</p>
          <p><?=number_format($total, 0)?>VNĐ</p>
        </li>
      </ul>
    </div>
    <div class="info_bill">
      <ul>
        <li>
          <p>BILLING INFORMATION</p>
        </li>
        <li>
          <p>
            <?= $_SESSION['user']["user_fullname"] ? 
            $_SESSION['user']["user_fullname"] : 
            $_SESSION['user']["user_username"] ?>
          </p>
        </li>
        <li>
          <?php 
            $str = $shipping["shipping_address"] ;
            $parts = explode(",", $str);

            foreach ($parts as $part) {
              ?>
          <p style="margin-bottom: 10px;"><?=$part?>,</p>
          <?php
            }
            ?>
        </li>

      </ul>
      <ul>
        <li>
          <p>PAYMENT INFORMATION</p>
        </li>
        <li>
          <p><?=strtoupper($shipping["shipping_method"] )?></p>
        </li>
      </ul>
    </div>
  </div>
</div>