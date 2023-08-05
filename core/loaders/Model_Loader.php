<?php 


class Model_Loader {

  function load ($model_name) {
    
    $model = ucfirst($model_name) . "_Model"; 

    $model_path = APP_PATH . "/models/$model.php";

    if (!file_exists( $model_path)) {
      exit("File not found" .  $model_path);
    }

    require  $model_path;


    $model_name = new $model;
  }
  
}