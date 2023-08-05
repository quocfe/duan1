<?php 

class Shipping_Model extends Base_Model {
  protected $table = 'shipping';
  
  public function insert ($order_id, $username,	$shipping_address,	$shipping_method,	$shipping_cost,	$shipping_status,	$estimated_delivery_date,	$shipping_notes) {
    $sql = "INSERT INTO shipping(order_id, username,	shipping_address,	shipping_method,	shipping_cost,	shipping_status,	estimated_delivery_date,	shipping_notes) VALUES (?,?,?,?,?,?,?,?)";
    $this->pdo_execute($sql,$order_id, $username,	$shipping_address,	$shipping_method,	$shipping_cost,	$shipping_status,	$estimated_delivery_date,	$shipping_notes );
  }
}