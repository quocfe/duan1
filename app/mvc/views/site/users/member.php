<?php 
extract($user);
?>

<div class="content">
  <div class="box_welcome">
    <div class="top">
      <div class="avatar">
        <img src="<?= UPLOAD_USERS_URL ?>/<?= $user_img ? $user_img : 'defaut.jpg' ?>" alt="">
      </div>
      <div class="infor">
        <p>Xin chào</p>
        <br>
        <span><?= $user_username ?></span>
      </div>
    </div>
    <div class="bottom">
      <div class="left">
        <div class="content_welcome">
          <p>Ngày tham gia</p>
          <ion-icon class="icon" name="calendar-outline"></ion-icon>
          <p>20/2/2020</p>
        </div>
        <div class="content_welcome">
          <p>Hạng thành viên</p>
          <ion-icon class="icon" name="trophy-outline"></ion-icon>
          <p>20/2/2020</p>
        </div>
        <div class="content_welcome">
          <p>Điểm tích lũy</p>
          <ion-icon class="icon" name="ribbon-outline"></ion-icon>
          <p>0</p>
        </div>
      </div>
      <div class="right">
        <p>Đơn hàng của bạn</p>
        <span><?=isset($numberOrder) ? $numberOrder : '' ?> Đơn hàng</span>
        <a href="<?= base_url('users/order') ?>">Xem chi tiết</a>
      </div>
    </div>
  </div>
</div>