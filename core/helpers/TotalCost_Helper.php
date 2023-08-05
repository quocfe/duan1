<?php 
  function total_cost ($price, $quanlity) {
    $total = 0;
    $price = $price ? $price : 0;
    $quanlity = $quanlity ? $quanlity : 0;
    $total = (float)$price * (float)$quanlity;
    return $total;
  }
?>