<?php 
class Users_Model extends Base_Model {
  protected $table = 'users';


  public function insert ($user_username, $user_fullname	,$user_password	,$user_img	,$user_mail, $user_address, $user_gender	,$user_role, $user_active) {
    $sql = "INSERT INTO users( user_username,user_fullname, user_password, user_img, user_mail,user_address,user_gender, user_role, user_active) VALUES(?,?,?,?,?,?,?,?,?)";
    $this->pdo_execute( $sql, $user_username, $user_fullname ,$user_password	,$user_img	,$user_mail, $user_address, $user_gender	,$user_role, $user_active);
  }


  public function update ($id, $user_username, $user_fullname	,$user_password	,$user_mail	, $user_address, $user_gender,$user_role, $user_active) {
    $sql = "UPDATE users SET user_username=?, user_fullname=?, user_password=?,  user_mail=?,user_address =?, user_gender=?, user_role=? , user_active=? WHERE user_id=?";
    $this->pdo_execute($sql, $user_username, $user_fullname	,$user_password	,$user_mail , $user_address, $user_gender	,$user_role, $user_active, $id);
  }

  public function update_admin ($id, $user_username, $user_fullname	,$user_password, $user_img	,$user_mail	, $user_address, $user_gender,$user_role, $user_active) {
    $sql = "UPDATE users SET user_username=?, user_fullname=?, user_password=?, user_img=?,  user_mail=?,user_address =?, user_gender=?, user_role=? , user_active=? WHERE user_id=?";
    $this->pdo_execute($sql, $user_username, $user_fullname	,$user_password,$user_img	,$user_mail , $user_address, $user_gender	,$user_role, $user_active, $id);
  }

  public function update_password ($password, $id) {
    $sql = "UPDATE users SET user_password = ? WHERE user_id = ?";
    $this->pdo_execute($sql, $password, $id);
  }

  public function update_img ($id,$user_img	) {
    $sql = "UPDATE users SET  user_img=? WHERE user_id=?";
    $this->pdo_execute($sql, $user_img, $id);
  }

  public function user_exist ($username) {
    $sql = "SELECT count(*) FROM users WHERE user_username=?";
    return $this->pdo_query_value($sql, $username) > 0;
  }

  public function user_password ($user_username) {
    $sql = "SELECT user_password FROM `users` WHERE user_username = ?";
    return $this->pdo_query_one($sql, $user_username);
  }

  public function user_exist_email ($email) {
    $sql = "SELECT * FROM `users` WHERE user_mail = ?";
    return $this->pdo_query($sql, $email);
  } 


  public function login ( $username, $password) {
    $sql = "SELECT * FROM users WHERE user_username = ? AND user_password = ?";
    return $this->pdo_query_one($sql, $username, $password);
  }
}