<?php 

class Category_Model extends Base_Model {
  protected $table = 'category';
  
  public function insert($cate_name) {
    $sql = "INSERT INTO category (cate_name) VALUES (?)";
    $this->pdo_execute($sql, $cate_name);
    }
  
  public function update($name, $id ) {
    $sql = "UPDATE category SET cate_name=? WHERE cate_id=?";
    $this->pdo_execute($sql, $name, $id);
  }

}