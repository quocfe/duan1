<?php 
  function base_url ($uri) {

    $uri_array = explode("/", $uri);

    $module = $uri_array[0];
    $action = $uri_array[1];

    return BASE_URL .'/'.$module.'/'.$action;
  }