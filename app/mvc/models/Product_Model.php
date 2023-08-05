<?php 

class Product_Model extends Base_Model {
  protected $table = 'products';

  
  public function insert ($pdt_price, $pdt_title, $pdt_img, $pdt_date, $pdt_desc, $pdt_content, $pdt_view, $cate_id) {
    $sql = "INSERT INTO products(pdt_price, pdt_title, pdt_img, pdt_date, pdt_desc, pdt_content, pdt_view, cate_id  ) VALUES (?,?,?,?,?,?,?,?)";
    $this->pdo_execute($sql, $pdt_price, $pdt_title, $pdt_img, $pdt_date, $pdt_desc, $pdt_content, $pdt_view, $cate_id);
  }

  public function update($pdt_price, $pdt_title, $pdt_img, $pdt_date, $pdt_desc, $pdt_content, $pdt_view, $cate_id, $pdt_id) {
    $sql = "UPDATE products SET pdt_price=?, pdt_title=?, pdt_img=?, pdt_date=?, pdt_desc=?, pdt_content=?, pdt_view=?, cate_id=? WHERE pdt_id=?";
    $this->pdo_execute($sql, $pdt_price, $pdt_title, $pdt_img, $pdt_date, $pdt_desc, $pdt_content, $pdt_view, $cate_id, $pdt_id);
  }


  public function select_product_by_cateID($id) {
    $sql = "SELECT * FROM products "
        . "JOIN category ON category.cate_id = products.cate_id "
        . "WHERE products.cate_id = ?";
    return $this->pdo_query($sql, $id );
  }

}