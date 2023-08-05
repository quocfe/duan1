<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/png" href="<?= CONTENT_URL ?>/asset/img/LOGO47FACTORY.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?= CONTENT_URL ?>/asset/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
  <title>47 Factory</title>
</head>


<body>
  <div class="wrapper">
    <!-- loader -->
    <div class="loader--wrapper ">
      <div class="spinner"></div>
    </div>
    <!-- end loader -->

    <!-- header -->
    <header id="header">
      <?= require "header.php" ?>
    </header>
    <!-- end header -->

    <section class="main ">
      <?= $content ?>
    </section>

    <footer id="footer">
      <?= require 'footer.php' ?>
    </footer>
    <div id="toast"></div>

  </div>


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/8813097242.js" crossorigin="anonymous"></script>
  <script src="<?= CONTENT_URL ?>/asset/js/swiper.js"></script>
  <script src="<?= CONTENT_URL ?>/asset/js/main.js"></script>
  <script>
  setTimeout(() => {
    (function() {
      document.querySelector(".loader--wrapper").classList.add("hidden");
    })();
  }, 100)
  </script>
</body>

</html>