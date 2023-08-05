<?php 

class Core_Controller {

  protected $layout;
  protected $model;
  protected $view;
  protected $helper;
  protected $lib;

  function __construct() {

    // layout loader
    require BASE_PATH . '/core/loaders/Layout_Loader.php';
    $this->layout = new Layout_Loader;

    // view loader
    require BASE_PATH . '/core/loaders/View_Loader.php';
    $this->view = new View_Loader;

    // model loader 
    require BASE_PATH . '/core/loaders/Model_Loader.php';
    $this->model = new Model_Loader;

    // lib loader
    require BASE_PATH . '/core/loaders/Lib_Loader.php';
    $this->lib = new Lib_Loader;

    // hepler loader 
    require BASE_PATH . '/core/loaders/Helper_Loader.php';
    $this->helper = new Helper_Loader;

  }
}