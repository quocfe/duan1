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
  <?= $content ?>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="<?= CONTENT_URL ?>/asset/js/swiper.js"></script>
  <!-- <script src="<?= CONTENT_URL ?>/asset/js/main.js"></script> -->
  <script>
  <?=require CONTENT_PATH.'/asset/js/main.js'?>
  </script>
</body>

</html>