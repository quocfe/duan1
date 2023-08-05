<?php 
  function check_isset ($param, $message) {
    return !empty($param) ? $param : $message;
  }
?>