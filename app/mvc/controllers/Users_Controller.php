<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

  class Users_Controller extends Base_Controller{
    
    public function register () {
      $this->helper->load('url');
      $this->helper->load('isset');
      $this->model->load('users');
      $users = new Users_Model();
      
      $errors=[];
      $textValid = [];
      if(isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $comfirmPassword = $_POST['comfirmPassword'];
        $fullname = '';
        $address = '';
        $user_gender = '';
        $img = 'defaut.jpg';


        if (empty($_POST["username"])) {
          $errors['username'] = "Trường này không được để trống!";
        }else if ($users->user_exist($username)) {
          $errors['username'] = "Tên đăng nhập đã tồn tại!";
        } else {
          $textValid['username'] = $username;
        }
        
        if (empty($email)) {
          $errors['emailEmpty'] = "Trường này không được để trống!";
        } else if ($users->user_exist_email($email)) {
          $errors['mailExist'] = "Email đã tồn tại!";
        } else {
          $textValid['email'] = $email;
        }


        if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errors['email'] = "mail không đúng định dạng!";
        } else if (strlen($password) < 6) {
          $errors['password'] = "Mật khẩu > 6 ký tự";
        } else {
          $textValid['password'] = $password;
        }

        if ($password != $comfirmPassword) {
          $errors['comfirmPassword'] = "Mật khẩu không khớp!";
        }

        if (empty($errors)) {
          $users->insert($username, $fullname	,$password ,$img	,$email, $address,$user_gender, $user_role = 0, $user_active = 1);
          echo '<script>';
          echo "alert('Đăng ký thành công')";
          echo '</script>';
        }
      }

      $this->view->load('site/users/register', [
        'errors' => $errors,
        'textValid' => $textValid
      ]);

    }

    public function login () {
      $this->helper->load('url');
      $this->lib->load('Sentmail');
      $this->model->load('users');
      $Users_model = new Users_Model();
      $errors = [];
      $textValid = [];

      if (isset($_POST['login'])) {
        $emailOrName = isset($_POST['emailOrName']) ? $_POST['emailOrName'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $checkUserName = $Users_model->user_exist($emailOrName);

        if ($checkUserName) {
            $textValid['userName'] = $emailOrName; 
            $checkPassword = $Users_model->user_password($emailOrName);
            if ($checkPassword["user_password"] === $password ) {
              $account = $Users_model->login( $emailOrName, $password);
              if (!empty($account)) {
                  $errors['userName'] = ' ';
                  $errors['password'] = ' ';
                  $_SESSION['user'] = $account;
                  $role =  $account['user_role'] == 0 ? "" : "nhân viên ";
                  $link = BASE_URL;
                  echo "<script>
                            alert('Đăng nhập tài khoản " . $role . "thành công!'); 
                            location.href='$link';
                      </script>";
              }
            } else {
                $errors['password'] = "Mật khẩu không chính xác";
            }
          } else {
            $errors['userName'] = "Tên người dùng không tồn tại";
            $errors['password'] = "Mật khẩu không chính xác";
          }
        }
      
        $this->view->load('site/users/login', [
          'errors' => $errors,
          'textValid' => $textValid
        ]);

    }

    public function logout () {
      session_destroy();
      $link = BASE_URL;
        echo "<script>
                  location.href='$link';
            </script>";
    }

    public function member () {
      $this->helper->load('url');
      $this->model->load('users');
      $this->model->load('order');
      $this->layout->set('member');
      
      $Order = new Order_Model();
      $User = new Users_Model();
      $id = $_SESSION['user']["user_id"];

      $user = $User->select_by_id('user',$id);
      $numberOrder = $Order->count_order_by_id('user', $id);
      $this->view->load('site/users/member', [
        'numberOrder' =>  $numberOrder,
        'user' => $user,
      ]);
      // $this->view->load('site/users/order');
    }

    public function order () {
      $this->helper->load('url');
      $this->model->load('users');
      $this->layout->set('member');
      $this->model->load('order');
      $Order = new Order_Model();
      $id = $_SESSION['user']["user_id"];
      $orderAll = $Order->select_all_by_id('user', $id);
      $numberOrder = $Order->count_order_by_id('user', $id);
      $this->view->load('site/users/order', [
        'orderAll' => $orderAll,
        'numberOrder' => $numberOrder 
      ]);
    }

    public function detail_order () {
      $this->helper->load('url');
      $this->model->load('users');
      $this->model->load('detailorder');
      $this->model->load('order');
      $this->layout->set('member');
      $id = $_GET['id'];
      $Detailorder = new Detailorder_Model();
      $Order = new Order_Model();
      $detail = $Detailorder->select_by_orderid($id);
      $order = $Order->select_by_id('order', $id);
      $this->view->load('site/users/detail_order', [
        'detail' => $detail,
        'id' => $id,
        'order' => $order
      ]);
    }

    public function account () {
      $this->helper->load('upload');
      $this->helper->load('url');
      $this->model->load('users');
      $this->layout->set('member');
      $errors = [];
      $Users_model = new Users_Model();
      $id = $_SESSION['user']['user_id'];
      
      if (isset($_POST['update'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $password= $_SESSION['user']['user_password'];
        
      
        $_SESSION['user']['user_fullname'] = $fullname;
        $_SESSION['user']['user_gender'] = $gender; 
        $_SESSION['user']['user_address'] = $address; 
        
        $Users_model->update($id,$username, $fullname,$password, $email, $address,$gender , $user_role = 0, $user_active = 1 );
      }

      if (isset($_POST['edit_img'])) {
        $file_name = save_file("img", UPLOAD_FILES."/users/");
        if ($file_name) {
          $_SESSION['user']['user_img'] = $file_name;
          $Users_model->update_img($id, $file_name);
        } else {
          $errors['emptyImg'] = 'Vui lòng chọn ảnh!';
        }
      }

      $this->view->load('site/users/account', [
        'errors' => $errors
      ]);
    }

    public function change_password () {
      $this->helper->load('url');
      $this->layout->set('member');
      $this->model->load('users');
      $id = $_SESSION['user']['user_id'];
      $User = new Users_Model();
      $user = $User->select_by_id('user', $id);
      $password = $user["user_password"];
      $errors = [];
      if(isset($_POST['change_password'])) {
          $old_pass = $_POST['old_pass'];

          if ($password == $old_pass) {
            $GLOBALS['old_pass'] = $old_pass;
            $new_pass = $_POST['new_pass'];
            $comfirmPassword = $_POST['pass_confirm'];

            if (empty($password) || empty($new_pass) || empty($comfirmPassword)) {
              $errors['empty'] = "Không được để trống!";
            }

            if (strlen($new_pass ) < 6) {
              $errors['password'] = "Mật khẩu > 6 ký tự";
            }
            if ($new_pass != $comfirmPassword) {
              $errors['comfirmPassword'] = "Mật khẩu không khớp!";
            }

            if (empty($errors)) {
              $User->update_password($new_pass,$id );
              echo "<script>
                      alert('Cập nhật mật khẩu thành công!'); 
                    </script>";
            }
          } else {
            unset($GLOBALS['old_pass']);
            $errors['password_old'] = "Mật khẩu cũ không đúng!";
          }
      }
      $this->view->load('site/users/change_password', [
        'errors' => $errors
      ]);

    }

    public function forget_pass () {
      $this->helper->load('url');
      $this->model->load('users');

      $errors = [];
      $Users_model = new Users_Model();


      if (isset($_POST['request_pass'])) {
        $emailRequest = $_POST['emailRequest'];

        if (!empty($emailRequest)) {
          
          if(!filter_var($emailRequest, FILTER_VALIDATE_EMAIL)) {
            $errors['emptyUser'] = "Email không đúng định dạng";
          } else {
              $user = $Users_model->user_exist_email($emailRequest);
              if (!$user) {
                $errors['emptyMail'] = "Email không tồn tại";
              } else {
                $id = $user[0]["user_id"];
                $user_mail = $user[0]["user_mail"];
                $user_fullname = $user[0]["user_fullname"];

                $password = bin2hex(random_bytes(6));
                
                $Users_model->update_password($password, $id);;

                $this->sendEmailConfirmation($user_mail, $password, $user_fullname );
              }
          }
        } 
      }
      $this->view->load('site/users/forget_pass', [
        'errors' => $errors
      ]);

    }
    public function sendEmailConfirmation($user_mail, $password, $user_fullname )
    {
        $subject = 'Reset password';
        $body = 'Mật khẩu mới của bạn là: ' . $password;

        // Gửi email
        $this->sendEmail($user_mail, $user_fullname , $subject, $body);
    }

    public function sendEmail($user_mail, $user_fullname , $subject, $body)
    {
      $this->lib->load('Sentmail');
      $mail = new Sentmail();
      $mail->sent($user_mail, $user_fullname , $subject, $body);
      
    }

    
  }