<?php 

class Admin_Controller extends Base_Controller  {
  public function index ()  {
    $this->helper->load('url');
    $this->view->load('admin/index');
  } 
  
  public function add_category () {
    $this->helper->load('url');
    $this->view->load('admin/category/add_category');
    $this->model->load('category');

    
    if (isset($_POST['submit'])) {
      
      $namecate = $_POST['namecate'];
      $Category = new Category_Model();

      if (empty($namecate)) {
        echo '<script>';
        echo "alert('Không được bỏ trống')";
        echo '</script>';
      } else {
        $Category->insert($namecate);
        echo '<script>';
        echo "alert('Thêm thành công')";
        echo '</script>';
      }
    }
  }

  public function list_category () {
    $this->helper->load('url');
    $this->model->load('category');
    
    $Category = new Category_Model();
    $list_category = $Category->select_all();
    
    $this->view->load('admin/category/list_category', [
      'list_categories' => $list_category
    ]);
  }

  public function detele_category () {
    $this->helper->load('url');

    $id = $_GET['id'];
    
    $this->model->load('category');
    $Category = new Category_Model();
    $Category->delete('cate', $id);

    $list_category = $Category->select_all();
    
    $this->view->load('admin/category/list_category', [
      'list_categories' => $list_category
    ]);
  }
  
  public function update_category () {
    $this->helper->load('url');
    $id = $_GET['id'];

    $this->model->load('category');
    $Category = new Category_Model();
    $old_category = $Category->select_by_id('cate',$id);

    $this->view->load('admin/category/update_category', [
      'category' => $old_category
    ]);
    
    if (isset($_POST['update'])) {
      
      $namecate = $_POST['namecate'];

      if (empty($namecate)) {
        echo '<script>';
        echo "alert('Không được bỏ trống')";
        echo '</script>';
      } else {
        $Category->update($namecate, $id);
        echo '<script>';
        echo "alert('Cập nhật thành công')";
        echo '</script>';
      }
    }
  }

  public function add_product () {
    $this->helper->load('upload');
    $this->helper->load('url');
    $this->model->load('category');
    $this->model->load('product');

    $product = new Product_Model();
    $Category = new Category_Model();
    $list_category = $Category->select_all();
    
    $this->view->load('admin/product/add_product', [
      'list_categories' => $list_category
    ]);

    if (isset($_POST['btnAddProduct'])) {
      $errors = false;
      $pdt_name = $_POST['pdt_name'];
      $cate_id = $_POST['select_cate'];
      $pdt_price = $_POST['pdt_price'];
      $pdt_date = $_POST['pdt_date'];
      $pdt_view =  isset($_POST['pdt_view']) ? $_POST['pdt_view'] : 0;
      $pdt_desc = $_POST['pdt_desc'];
      $pdt_content = $_POST['pdt_content'];
      
      $pdt_img = save_file('pdt_img', UPLOAD_FILES."/products/");;
      
      if (empty($pdt_name) || empty($cate_id)  || empty($pdt_price) || empty($pdt_date)  || empty($pdt_desc) || empty($pdt_content) || empty($pdt_img)) {
            $errors = true;
      }

      if (!$errors) {
        $product->insert($pdt_price,$pdt_name, $pdt_img, $pdt_date, $pdt_desc, $pdt_content, $pdt_view, $cate_id);
        echo '<script>';
        echo "alert('Thêm thành công')";
        echo '</script>';
        
      } else {
        echo '<script>';
        echo "alert('Không được bỏ trống')";
        echo '</script>';
      }


    }

  }

  public function list_product () {
    $this->helper->load('url');
    $this->model->load('product');

    $product = new Product_Model();

    $list_product = $product->select_all();

    $this->view->load('admin/product/list_product', [
      'list_product' => $list_product
    ]);
  }

  public function delete_product () {
    $this->helper->load('url');

    $id = $_GET['id'];
    
    $this->model->load('product');
    $product = new Product_Model();
    $product->delete('pdt', $id);

    $list_product = $product->select_all();

    $this->view->load('admin/category/list_product', [
      'list_product' => $list_product
    ]);
  }

  public function update_product () {
    $this->helper->load('upload');
    $this->helper->load('url');
    $this->helper->load('isset');
    $this->model->load('category');
    $this->model->load('product');
    $pdt_id = $_GET['id'];
    
    $Category = new Category_Model();
    $product = new Product_Model();
    $list_category = $Category->select_all();
    $old_product = $product->select_by_id('pdt',$pdt_id);

    $this->view->load('admin/product/update_product', [
      'old_product' => $old_product,
      'list_categories' => $list_category
    ]);

    if (isset($_POST['update'])) {
      $errors = false;
      $pdt_title = $_POST['pdt_name'];
      $cate_id = $_POST['select_cate'];
      $pdt_price = $_POST['pdt_price'];
      $pdt_date = $_POST['pdt_date'];
      $pdt_view =  $_POST['pdt_view'];
      $pdt_desc = $_POST['pdt_desc'];
      $pdt_content = $_POST['pdt_content'];
      
      $pdt_img = save_file('pdt_img', UPLOAD_FILES."/products/");
      if ($pdt_img === null) {
        $pdt_img = $_POST['old_img'];
      }


      if (empty($pdt_title) || empty($cate_id) || empty($pdt_price)|| empty($pdt_date)||  empty($pdt_desc)|| empty($pdt_content)|| empty($pdt_img)) {
        $errors = true;
      }

      
      if (!$errors) {
        echo '<script>';
        echo "alert('Cập nhật thành công')";
        echo '</script>';
        $product->update($pdt_price, $pdt_title, $pdt_img, $pdt_date, $pdt_desc, $pdt_content, $pdt_view, $cate_id, $pdt_id);
      } else {
        echo '<script>';
        echo "alert('Không được bỏ trống')";
        echo '</script>';
      }
    }
  }

  public function add_post () {
    $this->helper->load('upload');
    $this->helper->load('url');
    $this->view->load('admin/post/add_post');
    $this->model->load('post');
    
    $post = new Post_Model();

    if (isset($_POST['btnAddPost'])) {
      $errors = false;
      $post_title = $_POST['post_title'];
      $post_date = $_POST['post_date'];
      $post_view = $_POST['post_view'];
      $post_desc = $_POST['post_desc'];
      $post_content = $_POST['post_content'];
      $post_img =  save_file('post_img', UPLOAD_FILES."/news/");;

      if (empty($post_title) || empty($post_date)  || empty($post_desc) || empty($post_content) || empty($post_img)) {
            
            $errors = true;
            return;
      }
      
      if (!$errors) {
        $post->insert($post_title, $post_desc, $post_content, $post_img, $post_date,$post_view);
        echo '<script>';
        echo "alert('Thêm thành công')";
        echo '</script>';
      } else {
        echo '<script>';
        echo "alert(Please fill in all the required fields.)";
        echo '</script>';
      }

    }
    
    
  }
  
  public function list_post () {
    $this->helper->load('url');
    $this->model->load('post');

    $post = new Post_Model;

    $list_post = $post->select_all();

    $this->view->load('admin/post/list_post', [
      'list_post' => $list_post
    ]);

  }

  public function update_post () {
    $this->helper->load('upload');
    $id = $_GET['id'];
    $this->helper->load('url');
    $this->helper->load('isset');
    $this->model->load('post');
    
    $post = new Post_Model();

    $old_post = $post->select_by_id('post',$id);
    $this->view->load('admin/post/update_post', [
    'old_post' => $old_post
    ]);

    if (isset($_POST['btnUpdatePost'])) {
      $errors = false;
      $post_title = $_POST['post_title'];
      $post_date = $_POST['post_date'];
      $post_view = $_POST['post_view'];
      $post_desc = $_POST['post_desc'];
      $post_content = $_POST['post_content'];
      $post_img = save_file('post_img', UPLOAD_FILES."/news/");
      if ($post_img === null) {
        // Quá trình tải lên tệp không thành công.
        $post_img = $_POST['old_img'];
      }
      
      if (empty($post_title) || empty($post_date)  || empty($post_desc) || empty($post_content) || empty($post_img)) {
            $errors = true;
            return;
      }
      
      if (!$errors) {
        $post->update($post_title, $post_desc, $post_content, $post_img, $post_date,$post_view, $id);
        echo '<script>';
        echo "alert('Cập nhật thành công')";
        echo '</script>';
      } else {
        echo '<script>';
        echo "alert(Please fill in all the required fields.)";
        echo '</script>';
      }
    }
  }

  public function delete_post () {
    $this->helper->load('url');

    $id = $_GET['id'];
    
    $this->model->load('post');
    $post = new Post_Model();
    $post->delete('post', $id);


    $list_post = $post->select_all();

    $this->view->load('admin/post/list_post', [
      'list_post' => $list_post
    ]);
  }

  public function list_users () {
    $this->helper->load('url');
    $this->model->load('users');

    $user_model = new Users_Model();

    $users = $user_model->select_all();

    $this->view->load('admin/user/list_users', [
      'users' => $users
    ]);

    
  }

  public function add_user () {
    $this->helper->load('upload');
    $this->helper->load('url');
    $this->model->load('users');

    $users_model = new Users_Model;

    $errors = [];
    if (isset($_POST['btn_insert'])) {
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $active = isset($_POST['active']) ? $_POST['active'] : '';
        $role = isset($_POST['role']) ? $_POST['role'] : '';
        $user_img =  save_file('img', UPLOAD_FILES."/users/");;

        $user_exit = $users_model->user_exist($username);
        $user_exit_email = $users_model->user_exist_email($email);

        if ($user_exit ) {
          $errors['user_exit'] = 'Tên đăng nhập đã tồn tại';
        } 
        if ($user_exit_email) {
          $errors['user_email_exit'] = 'Email đã tồn tại';
        }

        if (empty($errors)){
          $users_model->insert($username, $fullname, $password, $user_img, $email ,$address = '', $gender = '', $role, $active);
            echo '<script>';
            echo "alert('Thêm thành công')";
            echo '</script>';
        }
        
      }
      $this->view->load('admin/user/add_user', [
        'errors' => $errors
      ]);
  }
  
  public function update_user () {
    $this->helper->load('url');
    $this->model->load('users');
    $this->helper->load('upload');

    $id = $_GET['id'];
    $user_model = new Users_Model();

    $old_user = $user_model->select_by_id('user', $id);
    
      if (isset($_POST['btn_update'])) {
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $active = isset($_POST['active']) ? $_POST['active'] : '';
        $role = isset($_POST['role']) ? $_POST['role'] : '';
        $user_img =  save_file('img', UPLOAD_FILES."/users/");
        if ($user_img === null) {
              // Quá trình tải lên tệp không thành công.
              $user_img = isset($_POST['old_img']) ? $_POST['old_img'] : "";
            } 
          $user_model->update_admin($id , $username, $fullname, $password, $user_img, $email, $address = '', $gender = '', $role, $active);
            echo '<script>';
            echo "alert('Cập nhật thành công')";
            echo '</script>';
            
            
          }
          $this->view->load('admin/user/update_user', [
            'old_user' => $old_user
          ]);
          

  }
  
}