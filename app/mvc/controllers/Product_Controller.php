<?php 

class Product_Controller extends Base_Controller {
  public function index () {

    $this->helper->load('url');
    
    $this->model->load('category');
    $this->model->load('product');
    $Product_Model = new Product_Model();
    $Cate_model = new Category_Model();

    $products = $Product_Model->select_all();
    $categorys = $Cate_model->select_all();

    // load view
    $this->view->load('site/product/index', [
      'products' => $products,
      'categorys' => $categorys
    ]);
    
  }

  public function show () {
    $this->helper->load('url');

    $id = $_GET['id'];
    $this->model->load('product');
    $this->model->load('category');
    $this->model->load('comment');
    $this->model->load('commentreply');
    $product_model = new Product_Model();
    $comment_model = new Comment_Model();
    $cate_model = new Category_Model();
    $reply_model = new Commentreply_Model();

    $product = $product_model->select_by_id('pdt', $id);
    $cate_name = $cate_model->select_by_id('cate',$product['cate_id']);
    $product_model->view('pdt', $id);

    
    if (isset($_POST['addToCart'])) {
          $quanlity = $_POST['quanlity'];
          extract($product);
          if (isset($_SESSION['cart'][$id])) {
            if (isset($_SESSION['cart'][$id]['quanlity'])) {
                $_SESSION['cart'][$id]['quanlity'] += $quanlity ? $quanlity : 1;
            } else {
                $_SESSION['cart'][$id]['quanlity'] = 1;
            }
            $_SESSION['cart'][$id]['id'] = $pdt_id;
            $_SESSION['cart'][$id]['price'] = $pdt_price;
            $_SESSION['cart'][$id]['img'] = $pdt_img;
            $_SESSION['cart'][$id]['title'] = $pdt_title;
            echo "<script>
                alert('Sản phẩm đã được thêm vào giỏ hàng!'); 
                </script>";
          } else {
            $_SESSION['cart'][$id]['quanlity'] = $quanlity;
            $_SESSION['cart'][$id]['id'] = $pdt_id;
            $_SESSION['cart'][$id]['price'] = $pdt_price;
            $_SESSION['cart'][$id]['img'] = $pdt_img;
            $_SESSION['cart'][$id]['title'] = $pdt_title;
            echo "<script>
                alert('Thêm sản phẩm thành công!'); 
                </script>";
          }
    }

    if (isset($_POST['sent_cmt'])) {
      $cmt_content = $_POST['cmt_text'];
      $pdt_id = $id;
      $user_id = isset( $_SESSION['user']) ? $_SESSION['user']["user_id"] : '';
      $user_role = isset( $_SESSION['user']) ? $_SESSION['user']["user_role"] : '';
      var_dump( $user_role);
      $dateTime = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
      $cmt_date = $dateTime->format('Y-m-d');
      $cmt_time = $dateTime->format('H:i:s');
      if (!empty( $cmt_content)) {
        $comment_model->insert($cmt_content, $user_id, $pdt_id, $cmt_date, $cmt_time, $user_role);
        header('location: '.base_url('product/show&id='.$id.'') );
        exit;
      }
    }

    if (isset($_POST['reply_btn'])) {
      $reply_content = $_POST['reply_content'];
      $cmt_id = $_POST['cmt_id'];
      $user_id = $_POST['user_id'];
      $dateTime = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
      $reply_date = $dateTime->format('Y-m-d');

      if (!empty($reply_content)) {
        $reply_model->insert($cmt_id, $user_id, $reply_content, $reply_date);
        header('location: '.base_url('product/show&id='.$id.'') );
        exit;
      }
      
    }
    $reply_comments = $reply_model->select_reply();
    $comments = $comment_model->select_cmt_by_product($id); 
    
    $this->view->load('site/product/detail_product', [
      'product' => $product,
      'cate_name' => $cate_name,
      'comments' => $comments,
      'reply_comments' => $reply_comments
    ]);
  }

  public function select () {
    $id = $_GET['id'];

    $this->helper->load('url');
    
    $this->model->load('category');
    $this->model->load('product');
    $Product_Model = new Product_Model();
    $Cate_model = new Category_Model();

    $categorys = $Cate_model->select_all();
    $products  = $Product_Model->select_product_by_cateID($id);
    $cate_name = $Cate_model->select_by_id('cate',$id);


    if ($id == 'all') {
      $products = $Product_Model->select_all();
    }
    // load view
    $this->view->load('site/product/index', [
      'products' => $products,
      'categorys' => $categorys,
      'cate_name' => $cate_name
    ]);
  }

  public function result_search () {
      $this->layout->set('search');
      $this->helper->load('url');
      $this->model->load('product');

      $query = $_POST['query'];
      var_dump($query);
      $Product_Model = new Product_Model();
      $result = $Product_Model->search_by_keyword($query);

      if ($result) {
        $this->view->load("site/product/result_search", [
          'result' => $result
        ]);
      } else {
        $this->view->load("site/product/result_search", [
          'error' => 'Không tìm thấy dữ liệu!'
        ]);
      }
  }
}