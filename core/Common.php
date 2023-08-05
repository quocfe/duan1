<?php 

function load_app()  {
  $config = require BASE_PATH . '/config/config.php';
  
  $module = !empty($_GET['module']) ? $_GET['module'] : $config["defaut_module"];
  $action = !empty($_GET['action']) ? $_GET['action'] : $config["defaut_action"];


  // load base and core controller
  require BASE_PATH . '/core/Core_Controller.php';
  require BASE_PATH . '/core/Base_Controller.php';
  // load model
  require BASE_PATH . '/core/Core_Model.php';
  require BASE_PATH . '/core/Base_Model.php';


  $controller = ucfirst(($module)) . '_Controller';

  $controller_path = APP_PATH . '/controllers/' . $controller . '.php';

  if (!file_exists($controller_path)) {
    exit('file not found' . $controller_path);
  }

  require $controller_path;

  if (!class_exists($controller)) {
    exit('class not found' . $controller);
  }

  $object = new $controller;

  if (!method_exists($object, $action)) {
    exit('Method not found' . $action);
  }

  $object->$action();


}