<?php 

class Us_Controller extends Base_Controller {
  public function index () {
    $this->helper->load('url');
    $this->view->load('site/us/index');
  }

}