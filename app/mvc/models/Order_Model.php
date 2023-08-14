<?php 

class Order_Model extends Base_Model {
  protected $table = 'order';
  protected  $last_order_id;

  public function insert ($user_id,	$order_date,	$order_total, $order_status) {
    
    $sql = "INSERT INTO `order`( user_id,	order_date,	order_total, order_status) VALUES(?,?,?,?)";
    $this->pdo_execute( $sql, $user_id,	$order_date,	$order_total, $order_status);

    $this->last_order_id = $this->conn->lastInsertId();
  }

  
  function select_all( ) {
    $sql = "SELECT * FROM `order` ";
    return $this->pdo_query($sql);
  }

  function select_by_id( $prefix, $id) {
    $column = $prefix . '_id';
    $sql = "SELECT * FROM `order` WHERE $column=?";
    return $this->pdo_query_one($sql, $id);
  }

  function select_all_by_id( $prefix, $id) {
    $column = $prefix . '_id';
    $sql = "SELECT * FROM `order` WHERE $column=?";
    return $this->pdo_query($sql, $id);
  }

  public function getLastOrderId () {
    return $this->last_order_id;
  }

  public function count_order_by_id ($prefix, $id) {
    $column = $prefix . '_id';
    $sql = "SELECT COUNT(*) FROM `order` WHERE $column = ?";
    return $this->pdo_query_value($sql, $id);
  }

  public function update_status ($order_status, $order_id) {
    $sql = "UPDATE `order` SET order_status = ? WHERE order_id = ?";
    $this->pdo_execute($sql, $order_status, $order_id);
  }
  
}