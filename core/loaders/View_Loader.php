<?php 

class View_Loader {
  protected $content = [];

  function load ($view, $data = []) {
    extract($data);

    $view_path = APP_PATH . "/views/$view.php";

    if (!file_exists($view_path)) {
      exit('File not found' . $view_path);
    }

    ob_start();
    require $view_path;
    $this->content[] = ob_get_contents();
    ob_end_clean();

  }

  function show () {
    foreach ($this->content as $content) {
      echo $content;
    }
  }
}