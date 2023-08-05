<?php 

  class Cart_Controller extends Base_Controller {
      public function index () {
        $this->helper->load('url');
        $this->helper->load('totalCost');
        $this->view->load('site/cart/index');


        if (isset($_POST['submit_pay'])) {
          if (!empty($_SESSION['user'])) {
            foreach ($_SESSION['cart'] as $item) {
              $id = $item["id"];
              $quanlity = isset( $_POST[$id]) ?  $_POST[$id] : 0;
              $arrayQuanlity = [
                $id => $quanlity
            ];
            $_SESSION['cart'][$id]["quanlity"] = $arrayQuanlity[$id];
            }
            header('location: '.base_url('cart/process_pay'));
          } else {
            header('location: '.base_url('users/login'));
          }
        }
      }

      public function delete () {
        $this->helper->load('url');
        $this->helper->load('totalCost');
        $id = $_GET['id'];
        $dir = $_GET['dir'];
        unset($_SESSION['cart'][$id]);
        $dir === 'process_pay' ? 
        $this->view->load('site/cart/process_pay') : 
        $this->view->load('site/cart/index');
      }

      public function process_pay () {
        $this->helper->load('url');
        $this->helper->load('totalCost');
        $this->helper->load('isset');
        $error = '';
        if (isset($_POST['submitPay'])) {
          $username = $_POST['username'];
          $numberphone = $_POST['numberphone'];
          $email = $_POST['email'];
          $address = $_POST['address'];
          $province = $_POST['province'];
          $district = $_POST['district'];
          $ward = $_POST['ward'];
          $arrayAddress  = array($address,$ward ,$district, $province);
          $address =  implode(", ", $arrayAddress);
          $method = $_POST['checkout'];
          $note = $_POST['note'];
          $currentDate = date('Y-m-d'); // Format: YYYY-MM-DD
          
            if (empty($username) || empty($numberphone) || empty($email) || empty($address) || empty($province) || empty($district) || empty($ward) || empty($method)) {
                $error = "Vui lòng nhập trường này!";
                $this->view->load('site/cart/process_pay', [
                  'error' => $error
                ]);
            } else {
                $data = array(
                  'username' => $username,
                  'numberphone' => $numberphone,
                  'email' => $email,
                  'address' => $address,
                  'date' => $currentDate,
                  'note' => $note,
                  'method' => $method
                );
                $_SESSION['shipping'] =  $data;
                header('location: '.base_url('cart/check_out&method='.$method.'').'');
            }
        }

        $this->view->load('site/cart/process_pay');

      }

      public function check_out () {
        $this->helper->load('url');
        $this->model->load('order');
        $this->model->load('detailorder');
        $this->model->load('product');
        $this->model->load('shipping');
        $user_id = $_SESSION['user']['user_id'];
        $username = $_SESSION['shipping']['username'];
        $order_date = $_SESSION['shipping']["date"];
        $order_total = $_SESSION['totalCart'];
        $address = $_SESSION['shipping']['address'];
        $method_shipping = $_SESSION['shipping']['method'];
        $note =  $_SESSION['shipping']['note'];
        $estimated_delivery_date = date('d-m-y', strtotime($order_date . ' +4 days'));
      

        
        $Detailorder_Model = New Detailorder_Model();
        $Order_Model = New Order_Model();
        $Shipping_Model = New Shipping_Model();
        
        $method = $_GET['method'];
        if ($method === 'cod') {
          // insert order 
            $Order_Model->insert($user_id, $order_date, $order_total);
            $order_id = $Order_Model->getLastOrderId();
            $_SESSION['order_id'] = $order_id;
            foreach($_SESSION['cart'] as $item) {
              $Detailorder_Model->insert($order_id, $item['id'], $item['title'], $item["img"], $item['quanlity'], $item['price'], (string)$item['total']);
            }
            $Shipping_Model->insert($order_id, $username, $address, $method_shipping, 0, "Đang gửi", $estimated_delivery_date, $note);
            
            unset($_SESSION['cart']);
            header('location: '.base_url('cart/success'));
        } else if ($method === 'momo') {  
            header('location: '.base_url('paymentonline/momo'));
          }
      }

      public function success () {
        $this->helper->load('url');
        $this->model->load('detailorder');
        
        $Detailorder_Model = New Detailorder_Model();

        $order_id =  $_SESSION['order_id'];
        $data = $Detailorder_Model->select_by_orderid($order_id);
        $this->view->load('site/cart/success', [
          'data' => $data
        ]);
      }

      public function invoice () {
        $this->helper->load('url');
        $this->layout->set('invoice');
        $this->model->load('detailorder');
        $this->model->load('shipping');

        $Shipping_Model = New Shipping_Model();
        $Detailorder_Model = New Detailorder_Model();

        $order_id =  $_SESSION['order_id'];
        $data = $Detailorder_Model->select_by_orderid($order_id);
        $shipping = $Shipping_Model->select_by_id('order', $order_id);
        $this->view->load('site/cart/invoice', [
          'data' => $data,
          'shipping' => $shipping
        ]);
      }
  }