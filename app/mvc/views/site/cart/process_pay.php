<section class="main main_page container">
  <div class="breadcrumb">
    <div class="breadcrumb_custom">
      <a href="">Giỏ hàng</a>
      <span style="padding: 0px 5px">|</span>
      <a href="">Thanh toán</a>
    </div>
    <div class="payment_wapper container">
      <div class="payment">
        <form method="post" class="cart_left">
          <div class="title">Thông tin vận chuyển</div>
          <div class="customer_infor">
            <div class="top_input">
              <div class="username_field form_group">
                <input class="form-control" name="username" type="text"
                  value="<?= isset($_SESSION['user']['user_username']) ? $_SESSION['user']['user_username'] : '' ?>"
                  placeholder="Họ và tên" />
                <span
                  class="form-message text-danger"><?= isset($error) && empty($_SESSION['user']['user_username']) ? $error : ''?></span>
              </div>
              <div class="phonenumber_field form_group">
                <input class="form-control" name="numberphone" type="text" value="" placeholder="Số điện thoại"
                  autofocus="" />
                <span class="form-message text-danger"><?= isset($error) ? $error : ''?></span>
              </div>
            </div>
            <div class="mid_input">
              <div class="mail_field form_group">
                <input class="form-control" name="email" type="text"
                  value="<?= isset($_SESSION['user']['user_mail']) ? $_SESSION['user']['user_mail'] : '' ?>"
                  placeholder="abc@gmail.com" />

                <span
                  class="form-message text-danger"><?= isset($error) && empty($_SESSION['user']['user_username']) ? $error : ''?></span>
              </div>
            </div>
            <div class="bottom_input">
              <div class="address_field form_group">
                <input class="form-control" name="address" type="text" value="" placeholder="137 Nguyễn Thị Thập"
                  autofocus="" />
                <span class="form-message text-danger"><?= isset($error) ? $error : ''?></span>
              </div>
              <div class="address_field form_group">
                <label for="" class="note">Ghi chú</label>
                <input class="form-control" name="note" type="text" value="" placeholder="Ex: Giao giờ hành chính"
                  autofocus="" />
              </div>
            </div>
          </div>
          <div class="select_type">
            <input type="hidden" name="province" class="valueProvince" />
            <input type="hidden" name="district" class="valueDistrict" />
            <input type="hidden" name="ward" class="valueWard" />
            <div class="select_wrapper">
              <div class="select_province">
                <p class="name_text">Tỉnh/TP</p>
                <div class="select select_option_province">
                  <div class="selected <?= isset($error) ? 'empty' : '' ?>  form-control border">
                    <p class="selected_text">Chọn Tỉnh/TP</p>
                    <i class="fa-solid fa-arrow-down"></i>
                    <ul class="option option_provinces"></ul>
                  </div>
                </div>
              </div>
              <div class="select_districts">
                <p class="name_text">Quận/Huyện</p>
                <div class="select">
                  <div class="selected <?= isset($error) ? 'empty' : '' ?> form-control border">
                    <p class="selected_text">Chọn Quận/Huyện</p>
                    <i class="fa-solid fa-arrow-down"></i>
                    <ul class="option option_districts"></ul>
                  </div>
                </div>
              </div>
              <div class="select_wards">
                <p class="name_text">Phường/Xã</p>
                <div class="select">
                  <div class="selected <?= isset($error) ? 'empty' : '' ?> form-control border">
                    <p class="selected_text">Chọn Phường/Xã</p>
                    <i class="fa-solid fa-arrow-down"></i>
                    <ul class="option option_wards"></ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form_payment">
            <div class="title">Hình thức thanh toán</div>
            <div>
              <div>
                <input type="hidden" value="" name="checkout" class="checkout-input">
                <lable class="payment-method__item ">
                  <span class="payment-method__item-custom-checkbox custom-radio">
                    <input type="radio" value="cod" autocomplete="off" name="cod" id="" />
                  </span>
                  <span class="payment-method__item-icon-wrapper">
                    <img src="https://www.coolmate.me/images/COD.svg" alt="COD" />
                  </span>
                  <span class="payment-method__item-name">
                    COD <br />
                    Thanh toán khi nhận hàng
                  </span>
                </lable>
                <lable class="payment-method__item ">
                  <span class="payment-method__item-custom-checkbox custom-radio">
                    <input type="radio" autocomplete="off" value="momo" name="momo" id="" />
                  </span>
                  <span class="payment-method__item-icon-wrapper">
                    <img src="https://www.coolmate.me/images/momo-icon.png" alt="momo" />
                  </span>
                  <span class="payment-method__item-name">
                    Thanh toán momo
                  </span>
                </lable>
              </div>
              <p class="cart-return-text">
                Nếu bạn không hài lòng với sản phẩm của chúng tôi? Bạn
                hoàn toàn có thể trả lại sản phẩm.
              </p>
              <div class="btn_setion">
                <button onclick="alert('Xác nhận đặt hàng')" type="submit" name="submitPay" class="checkout_btn">
                  Đặt hàng
                </button>
              </div>
            </div>
          </div>
        </form>
        <div class="line"></div>
        <div class="cart_right">
          <div class="title">Giỏ hàng</div>
          <div class="cart_items">
            <?php 
              $total = 0;
              foreach($_SESSION['cart'] as $item) {
                $temPrice = total_cost($item['price'], $item['quanlity']); 
                $total += $temPrice;  
                $_SESSION['cart'][$item['id']]['total'] = $temPrice;
                $_SESSION['totalCart'] =  $total;
                ?>
            <div class="cart_item ">
              <div class="cart_item_img">
                <img src="<?= UPLOAD_PRODUCT_URL.'/'.$item['img'] ?>" alt="" />
              </div>
              <div class="cart_item_block">
                <div class="cart_item_info">
                  <p class="item_name"><?= isset( $item['title']) ?  $item['title'] : ''?></p>
                  <a href="<?= base_url('cart/delete&id='.$item['id'].'&dir=process_pay')?>" style=" color: #000000;">
                    <ion-icon class="trash md hydrated" name="trash-outline" role="img"></ion-icon>
                  </a>
                </div>
                <div class="cart_item_bottom">
                  <div class="cart_item_quantity">
                    <p>SL: </p>
                    <p class="quantity_text" style="color: #dc3545">
                      <?= isset($item['quanlity']) ? $item['quanlity'] : ''?></p>
                  </div>
                  <div class="cart_item_totalPrice">
                    <p class=""><?= isset($item['price']) ? number_format($item['price'], 0) : ''?>VNĐ</p>
                  </div>
                </div>
              </div>
            </div>
            <?php
              }
            ?>
            <div class="discount_block">
              <input class="form-control" type="text" placeholder="Mã giảm giá" />
              <button class="btnDiscount">Áp dụng</button>
            </div>
            <div class="price_current">
              <div class="price_current_row">
                <div class="">Tạm tính</div>
                <p class=""><?= isset($total) ? number_format($total, 0) : 0?>VNĐ</p>
              </div>
              <div class="price_current_row">
                <div class="">Giảm giá</div>
                <p class="">$0</p>
              </div>
              <div class="price_current_row">
                <div class="">Phí giao hàng</div>
                <p class="">Miễn Phí</p>
              </div>
            </div>
            <div class="total_price">
              <div class="price_current_row">
                <div class="">Tổng</div>
                <p class="totalPrice"><?= isset($total) ? number_format($total, 0) : 0?>VNĐ</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>