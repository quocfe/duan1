<div class="container">
  <div class="header_logo">
    <a href="<?= base_url('home/index') ?>">
      <img class="header_logo" src="<?= CONTENT_URL ?>/asset/img/LOGOSIMPLE47FACTORY.png" alt="logo" />
    </a>
  </div>
  <ul>
    <li class="nav">
      <a href="#">Chúng tôi</a>
      <ion-icon name="chevron-down-outline" class="icon"></ion-icon>
      <ul class="sub_nav">
        <li><a href="<?= base_url('us/index') ?>">Sứ mệnh</a></li>
        <li><a href="">Địa điểm</a></li>
        <li><a href="">Cộng đồng</a></li>
        <li><a href="">Tuyển dụng</a></li>
      </ul>
    </li>
    <li class="nav">
      <a href="<?= base_url('product/index') ?>">Cửa hàng</a>
      <ion-icon name="chevron-down-outline" class="icon"></ion-icon>
      <ul class="sub_nav">
        <li><a href="">Cà phê specially</a></li>
        <li><a href="">Gói thuê bao</a></li>
      </ul>
    </li>
    <li class="nav">
      <a href="#">Trải nghiệm</a>
      <ion-icon name="chevron-down-outline" class="icon"></ion-icon>
      <ul class="sub_nav">
        <li><a href="<?= base_url('posts/index') ?>">Tin tức</a></li>
        <li><a href="">Coffee guides</a></li>
      </ul>
    </li>
    <li class="nav">
      <a href="#">Hợp tác</a>
      <box-icon class="icon"></box-icon>
    </li>
    <li class="nav">
      <a href="#">Hỗ trợ</a>
      <ion-icon name="chevron-down-outline" class="icon"></ion-icon>
    </li>
    <li class="nav">
      <a href="<?= empty($_SESSION['user']) ? base_url('users/login') : '' ?>">Tài khoản</a>
      <ion-icon name="chevron-down-outline" class="icon"></ion-icon>
      <ul class="sub_nav">
        <?php 
          if (isset($_SESSION['user'])) {
            ?>
        <?php 
          if ($_SESSION['user']['user_role'] == '1') {
            ?>
        <li><a href="<?= base_url('admin/index') ?>">Quản trị admin</a></li>
        <?php
          }
        ?>
        <li><a href="<?= base_url('users/member') ?>">Thông tin tài khoản</a></li>
        <li><a href="">Theo dõi đơn hàng</a></li>
        <li><a href="<?= base_url('users/logout') ?>">Đăng xuất</a></li>
        <?php
          } else {
            ?>
        <li><a href="<?= base_url('users/login') ?>">Đăng nhập</a></li>
        <li><a href="<?= base_url('users/register') ?>">Đăng ký</a></li>
        <?php
          }
        ?>
      </ul>
    </li>
    <li class="nav nav_product">
      <a href="<?= base_url('cart/index') ?>">
        <ion-icon class="icon_cart" name="cart-outline"></ion-icon>
      </a>
      <div class="quantity_item">
        <span class="quantity_item_inner"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>
      </div>
      <?php 
          if (!empty($_SESSION['cart'])) {
            ?>
      <ul class="sub_nav">
        <?php
            foreach($_SESSION['cart'] as $item) {
              ?>
        <li>
          <a href="">
            <img src="<?= UPLOAD_PRODUCT_URL.'/'.$item['img']?>" alt="">
            <div class="infor">
              <p><?= $item['title'] ?></p>
              <p>SL: <?= $item['quanlity'] ?></p>
            </div>
          </a>
        </li>
        <?php
            }
          }
          ?>
      </ul>
      <?php
        ?>
    </li>
  </ul>
  <div class="search">
    <ion-icon onclick="toggleSearchForm()" class="icon" name="search-outline"></ion-icon>
    <div id="overlay" class="overlay">
      <div class="searchForm">
        <input type="text" placeholder="Enter your search" id="search" />
        <ion-icon onclick="toggleSearchForm()" name="close-outline" class="icon_close"></ion-icon>
        <div class="search_content" id="result">

        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
$(document).ready(function() {
  $("#search").keyup(function() {
    var query = $("#search").val();
    if (query != " ") {
      $.ajax({
        url: "http://localhost/PRO1014/product/result_search",
        method: "POST",
        data: {
          query: query
        },
        success: function(data) {
          $("#result").html(data);
        }
      });
    } else {
      $("#result").css("display", "none");
    }

  });
});
</script>