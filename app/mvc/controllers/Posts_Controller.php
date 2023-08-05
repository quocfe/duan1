<?php 
  class Posts_Controller extends Base_Controller {
    public function index () {
      $this->helper->load('url');
      $this->model->load('post');

      $Post_Model = new Post_Model();
      $posts = $Post_Model->select_all();
      $populars = $Post_Model->popular();
      
      $this->view->load('site/posts/index', [
          'posts' => $posts,
          'populars' => $populars
      ]);
    }
    public function show () {
      $id = $_GET['id'];
      $this->helper->load('url');
      $this->model->load('post');

      $Post_Model = new Post_Model();
      $post = $Post_Model->select_by_id('post',$id);
      $Post_Model->view('post', $id);

      $this->view->load('site/posts/detail_post', [
        'post' => $post
      ]);
    }
  }
?>