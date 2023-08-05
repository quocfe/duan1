<?php 

class Detailorder_Model extends Base_Model {
  protected $table = 'ordersdetail';

  public function insert ($orders_id,	$pdt_id, $prd_name, $prd_img,	$quantity,	$unit_price,	$total_price	) {
    $sql = "INSERT INTO ordersdetail (order_id, pdt_id, prd_name,prd_img, quantity,	unit_price,	total_price) VALUES(?,?,?,?,?,?,?)";
    $this->pdo_execute( $sql, $orders_id,	$pdt_id, $prd_name, $prd_img, $quantity,	$unit_price,	$total_price);
  }

  public function select_by_orderid ($order_id) {
    $sql = "SELECT * FROM ordersdetail WHERE order_id = ?";
    return $this->pdo_query($sql, $order_id);
  }


}