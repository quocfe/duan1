<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
  <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16" />
  <link rel="stylesheet" href="<?=CONTENT_URL?>/asset/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?=CONTENT_URL?>/asset/css/all.min.css" />
  <link rel="stylesheet" href="<?=CONTENT_URL?>/asset/css/dashboard.css" />
  <link rel="stylesheet" href="<?=CONTENT_URL?>/asset/css/style.css" />
  <link rel="stylesheet" href="<?=CONTENT_URL?>/asset/css/admin.css" />

</head>
<style>
.ck-editor__editable[role="textbox"] {
  /* editing area */
  min-height: 200px;
  color: black;
  margin-bottom: 20px;
}
</style>

<body>
  <div class="admin">
    <nav id="sidebar" class="active">
      <?= require 'sidebar.php' ?>
    </nav>
    <div id="body" class="active">
      <nav class="navbar navbar-expand-lg navbar-white bg-white">
        <?= require 'navbar.php' ?>
      </nav>

      <div class="content ">
        <?= $content ?>
      </div>
    </div>
  </div>

  <!-- Js -->
  <script src="<?=CONTENT_URL?>/asset/js/bootstrap.bundle.min.js"></script>
  <script src="<?=CONTENT_URL?>/asset/js/dashboard.js"></script>
  <script src="<?=CONTENT_URL?>/asset/js/main.js"></script>
  <script src="https://kit.fontawesome.com/8813097242.js" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
  <script>
  ClassicEditor
    .create(document.querySelector('#content'))
    .catch(error => {

    });
  </script>
  <script>
  ClassicEditor
    .create(document.querySelector('#desc'))
    .catch(error => {

    });
  </script>
  <script>
  ClassicEditor
    .create(document.querySelector('#productDesc'))
    .catch(error => {

    });
  </script>
  <script>
  ClassicEditor
    .create(document.querySelector('#productContent'))
    .catch(error => {

    });
  </script>

</body>

</html>