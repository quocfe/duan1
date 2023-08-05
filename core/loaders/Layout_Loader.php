<?php 

class Layout_Loader {
  protected $layout = 'default';
  
  function set ($layout) {
    $this->layout = $layout;
  }

  function load ($data = []) {
    extract($data);
    if (isset($_GET['module'] ) && $_GET['module'] === 'admin') {
      $layout_path = APP_PATH . "/views/admin/layout/" . $this->layout .'.php';
    } else {
      $layout_path = APP_PATH . "/views/site/layout/" . $this->layout .'.php';
    }
    

    if (!file_exists($layout_path)) {
      exit("file not found" . $layout_path);
    }

    require $layout_path;
  }
}