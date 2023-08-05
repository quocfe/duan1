<?php 

class Post_Model extends Base_Model {
  protected $table = 'post';

  public function insert ($post_title, $post_desc, $post_content, $post_img, $post_date, $post_view) {
    $sql = "INSERT INTO post(post_title, post_desc, post_content, post_img, post_date, post_view) VALUES (?,?,?,?,?,?)";
    $this->pdo_execute($sql, $post_title, $post_desc, $post_content, $post_img, $post_date, $post_view);
  }

  public function update($post_title, $post_desc, $post_content, $post_img, $post_date, $post_view, $post_id) {
    $sql = "UPDATE post SET post_title=?, post_desc=?, post_content=?, post_img=?, post_date=?, post_view=? WHERE post_id=?";
    $this->pdo_execute($sql, $post_title, $post_desc, $post_content, $post_img, $post_date, $post_view, $post_id);
  }

  public function popular() {
    $sql = "SELECT * FROM post WHERE post_view > 0 ORDER BY post_view DESC LIMIT 0, 5 ";
    return $this->pdo_query($sql);
}
}