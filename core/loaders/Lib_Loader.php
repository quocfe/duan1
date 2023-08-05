<?php 

class Lib_Loader {
  function load ($lib) {
    $lib_path = BASE_PATH . "/lib/$lib.php";

    if (!file_exists( $lib_path)) {
      exit("File not found" .  $lib_path);
    }

    require  $lib_path;
    }
}