<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/png" href="<?= CONTENT_URL ?>/asset/img/LOGO47FACTORY.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?= CONTENT_URL ?>/asset/css/style.css">
  <title>47 Factory</title>
</head>
<style>
<?=require CONTENT_PATH.'/asset/css/style.css'?>
</style>

<body>
  <div class="wrapper">
    <div class="loader--wrapper ">
      <div class="spinner"></div>
    </div>

    <!-- header -->
    <header id="header">
      <?= require "header.php" ?>
    </header>
    <!-- end header -->
    <section class="main ">
      <section class="main main_page ">

        <div class="member">
          <div class="side_bar">
            <a href="<?= base_url('users/member') ?>" class="side_bar_inner ">
              <ion-icon name="home-outline"></ion-icon>
              <p>Trang chủ</p>
            </a>
            <a href="<?= base_url('users/order') ?>" class="side_bar_inner">
              <ion-icon name="list-outline"></ion-icon>
              <p>Lịch sử mua hàng</p>
            </a>
            <a class="side_bar_inner">
              <ion-icon name="newspaper-outline"></ion-icon>
              <p>Tra cứu bảo hành</p>
            </a>
            <a href="<?= base_url('users/change_password') ?>" class="side_bar_inner">
              <ion-icon name="create-outline"></ion-icon>
              <p>Đổi mật khẩu</p>
            </a>
            <a class="side_bar_inner">
              <ion-icon name="trophy-outline"></ion-icon>
              <p>Hạng thành viên</p>
            </a>
            <a href="<?= base_url('users/account') ?>" class="side_bar_inner">
              <ion-icon name="person-outline"></ion-icon>
              <p>Tài khoản của bạn</p>
            </a>
            <a class="side_bar_inner">
              <ion-icon name="call-outline"></ion-icon>
              <p>Hỗ trợ</p>
            </a>
            <a class="side_bar_inner">
              <ion-icon name="mail-open-outline"></ion-icon>
              <p>Góp ý phản hồi</p>
            </a>
            <a href="<?= base_url('users/logout') ?>" class="side_bar_inner">
              <ion-icon name="log-out-outline"></ion-icon>
              <p>Đăng xuất</p>
            </a>
          </div>
          <div class="content">
            <?= $content ?>
          </div>
        </div>
      </section>
    </section>
    <footer id="footer">
      <?= require 'footer.php' ?>
    </footer>
  </div>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="<?= CONTENT_URL ?>/asset/js/swiper.js"></script>
  <!-- <script src="<?= CONTENT_URL ?>/asset/js/main.js"></script> -->
  <script>
  <?=require CONTENT_PATH.'/asset/js/main.js'?>
  </script>
  <script>
  setTimeout(() => {
    (function() {
      document.querySelector(".loader--wrapper").classList.add("hidden");
    })();
  }, 100)
  </script>
</body>

</html>