<?php 
class Commentreply_Model extends Base_Model {
    protected $table = 'commentreply';

    public function insert ($cmt_id,	$user_id,	$reply_text,	$reply_date) {
      $sql = "INSERT INTO commentreply (cmt_id,	user_id,	reply_text,	reply_date) VALUES (?,?,?,?)";
      $this->pdo_execute($sql, $cmt_id,	$user_id,	$reply_text,	$reply_date);
    }
    
    public function delete_repcmt($reply_id) {
      $sql = "DELETE FROM commentreply WHERE reply_id = ?";
      $this->pdo_execute($sql, $reply_id);
    }

    public function update_repcmt ($reply_text, $reply_id) {
      $sql = "UPDATE commentreply SET reply_text=? WHERE reply_id=?";
      $this->pdo_execute($sql, $reply_text, $reply_id);
    }

    public function select_reply () {
      $sql = "SELECT commentreply.*, users.user_fullname, users.user_img, users.user_role FROM `commentreply` 
              JOIN users ON users.user_id = commentreply.user_id";
      return $this->pdo_query($sql);
    }
}