<?php 

class Home_Controller extends Base_Controller {
  public function index () {
    $this->helper->load('url');
    $this->helper->load('isset');
    $this->model->load('product');
    $this->model->load('post');
    
    $product_model = new Product_Model();
    $post_model = new Post_Model();

    $products = $product_model->select_all();
    $posts = $post_model->select_all();

    $this->view->load('site/home/index', [
      'products' => $products,
      'posts' => $posts
    ]);
  }

}