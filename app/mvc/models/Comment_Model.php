<?php 

class Comment_Model extends Base_Model {
  protected $table = 'comment';

  public function insert ($cmt_content, $user_id, $pdt_id, $cmt_date, $cmt_time	) {
    $sql = "INSERT INTO comment (cmt_content, user_id, pdt_id, cmt_date, cmt_time) VALUES (?, ?, ?, ?, ?);";
    $this->pdo_execute( $sql, $cmt_content, $user_id, $pdt_id, $cmt_date, $cmt_time);
  }

  public function delete_cmt ($cmt_id) {
    $sql1 = "DELETE FROM commentreply WHERE cmt_id = ?";
    $sql2 = "DELETE FROM comment WHERE cmt_id = ?";
    
    $this->pdo_query($sql1, $cmt_id);
    $this->pdo_query($sql2, $cmt_id);
  }

  public function select_cmt_by_product($pdt_id, $limit = 10) {
    $sql = "SELECT comment.*, users.user_fullname, users.user_img, users.user_role FROM comment
        JOIN products ON products.pdt_id = comment.pdt_id 
        JOIN users ON users.user_id = comment.user_id 
        WHERE comment.pdt_id = ? ORDER BY cmt_id ASC LIMIT $limit";
        
    return $this->pdo_query($sql, $pdt_id);
  }

  public function select_cmt_by_user($pdt_id) {
    $sql = "SELECT comment.*, users.user_fullname, users.user_username,products.pdt_title FROM comment
        JOIN products ON products.pdt_id = comment.pdt_id 
        JOIN users ON users.user_id = comment.user_id 
        WHERE comment.pdt_id = ? ";
        
    return $this->pdo_query($sql, $pdt_id);
  }




}