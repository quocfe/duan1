<section class="main main_page ">
  <div class="success">
    <div class="success_left">
      <div class="success_left-top">
      </div>
      <div class="text">
        <h4>Đặt hàng thành công</h4>
        <p>Chuẩn bị tiền mặt <?=isset( $_SESSION['totalCart']) ? number_format( $_SESSION['totalCart'], 0) : ''?>VND</p>
      </div>
      <div class="success_left-bottom">
        <div class="shipping">
          <p>Phương thức thành toán</p>
          <p><?=isset($_SESSION['shipping']['method']) ? $_SESSION['shipping']['method'] : 'Undefind'  ?></p>
        </div>
        <div class="total">
          <p>Tổng cộng</p>
          <p><?=isset( $_SESSION['totalCart']) ? number_format( $_SESSION['totalCart'], 0) : ''?>VND</p>
        </div>
        <div class="goback">
          <a href="<?= base_url('home/index') ?>">Quay về trang chủ</a>
        </div>
      </div>
    </div>
    <div class="success_right">
      <div class="success_right-top">
        <p>Mã đơn hàng</p>
        <a href="<?=base_url('cart/invoice') ?>">Xem hóa đơn</a>
      </div>
      <div class="success_right-bottom">
        <?php 
          $date = $_SESSION['shipping']['date']; // Thay đổi ngày tháng năm tùy ý
          $d = date('N', strtotime( $date ));
          $d_m = date('d-m-y', strtotime($date . ' +4 days'));
          $_SESSION['shipping']['estimated_date'] = $d_m;
        ?>
        <p class="shipping_time">Dự kiến giao hàng vào Thứ <?=$d?>, <?=$d_m?></p>
        <?php 
          foreach ($data as $item) {
            ?>
        <div class="product">
          <img src="<?= UPLOAD_PRODUCT_URL.'/'. $item['prd_img']?>" alt="">
          <p class="title"><?=isset( $item['prd_name']) ?  $item['prd_name'] : '' ?></p>
        </div>
        <?php
          }
        ?>
      </div>
    </div>
  </div>
</section>

<div class="confetti-background"></div>