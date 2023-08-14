<?php 

class Base_Model extends Core_Model  {
  
  protected $table;

  public function select_all( ) {
    $sql = "SELECT * FROM $this->table ";
    return $this->pdo_query($sql);
  }

  public function select_by_id( $prefix, $id) {
    $column = $prefix . '_id';
    $sql = "SELECT * FROM $this->table WHERE $column=?";
    return $this->pdo_query_one($sql, $id);
  }

  public function select_all_by_id( $prefix, $id) {
    $column = $prefix . '_id';
    $sql = "SELECT * FROM $this->table WHERE $column=?";
    return $this->pdo_query($sql, $id);
  }

  public function search_by_keyword($keyword) {
    $sql = "SELECT * FROM products "
        . " JOIN category  ON category.cate_id=products.cate_id "
        . " WHERE pdt_title LIKE ? OR cate_name LIKE ?";
    return $this->pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
  }

  public function delete ($prefix, $id) {
    $column = $prefix . '_id';
    $sql = "DELETE FROM $this->table WHERE $column=?";
    $this->pdo_execute($sql, $id);
  }

  public function count () {
    $sql = "SELECT count(*) FROM $this->table ";
    return $this->pdo_query_value($sql);
  }
      
  public function view ($prefix, $id) {
    $column = $prefix . '_view';
    $idComlmn = $prefix . '_id';
    $sql = "UPDATE $this->table SET $column  = $column + 1 WHERE $idComlmn=?";
    $this->pdo_execute($sql, $id);
  }

  function product_statistic()
{
    $sql = "SELECT  cate.cate_id, cate.cate_name,"
        . " COUNT(*) quantity,"
        . " MIN(pdt.pdt_price) min_price,"
        . " MAX(pdt.pdt_price) max_price,"
        . " AVG(pdt.pdt_price) price_avg"
        . " FROM products pdt "
        . " JOIN category cate ON cate.cate_id=pdt.cate_id "
        . " GROUP BY  cate.cate_id,  cate.cate_name";
    return $this->pdo_query($sql);
}
function comment_statistic()
{
    $sql = "SELECT pdt.pdt_id, pdt.pdt_title,"
        . " COUNT(*) as comment_count,"
        . " MIN(cmt.cmt_date) min_date,"
        . " MAX(cmt.cmt_date) max_date"
        . " FROM comment cmt "
        . " JOIN products pdt ON pdt.pdt_id=cmt.pdt_id "
        . " GROUP BY pdt.pdt_id, pdt.pdt_title"
        . " HAVING comment_count > 0";
    return $this->pdo_query($sql);
}
  
}