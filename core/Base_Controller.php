<?php 
  class Base_Controller extends Core_Controller {

    function renderLayout () {
      ob_start();
      $this->view->show();
      $content = ob_get_contents();
      ob_end_clean();
      
      $this->layout->load([
        'content' => $content
      ]);
    }
    

    function __destruct()
    {
        $this->renderLayout();
    }
  }