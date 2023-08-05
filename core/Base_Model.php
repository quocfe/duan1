<?php 

class Base_Model extends Core_Model  {
  
  protected $table;

  function select_all( ) {
    $sql = "SELECT * FROM $this->table ";
    return $this->pdo_query($sql);
  }

  function select_by_id( $prefix, $id) {
    $column = $prefix . '_id';
    $sql = "SELECT * FROM $this->table WHERE $column=?";
    return $this->pdo_query_one($sql, $id);
  }

  function select_all_by_id( $prefix, $id) {
    $column = $prefix . '_id';
    $sql = "SELECT * FROM $this->table WHERE $column=?";
    return $this->pdo_query($sql, $id);
  }

  function search_by_keyword($keyword) {
    $sql = "SELECT * FROM products "
        . " JOIN category  ON category.cate_id=products.cate_id "
        . " WHERE pdt_title LIKE ? OR cate_name LIKE ?";
    return $this->pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
  }

  function delete ($prefix, $id) {
    $column = $prefix . '_id';
    $sql = "DELETE FROM $this->table WHERE $column=?";
    $this->pdo_execute($sql, $id);
  }
      
  function view ($prefix, $id) {
    $column = $prefix . '_view';
    $idComlmn = $prefix . '_id';
    $sql = "UPDATE $this->table SET $column  = $column + 1 WHERE $idComlmn=?";
    $this->pdo_execute($sql, $id);
  }
  
}