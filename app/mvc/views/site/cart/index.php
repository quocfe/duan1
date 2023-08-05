<section class="main main_page">
  <form class="cart" method="post">
    <div class="cart_wrapper">
      <div class="cart_heading">
        <?php 
          if (!empty($_SESSION['cart'])) {
            ?>
        <ul>
          <li>Sản phẩm</li>
          <li>Tên sản phẩm</li>
          <li>Giá</li>
          <li>Số lượng</li>
          <li>Tạm tính</li>
          <li></li>
        </ul>
        <?php
          }
        ?>

      </div>
      <div class="cart_body">
        <?php 
          $total = 0;
          if (!empty($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $item) {
              $temPrice = total_cost($item['price'], $item['quanlity']); 
              $total += $temPrice;
              ?>
        <ul class="row_item">
          <li>
            <div class="product_img">
              <img src="<?= UPLOAD_PRODUCT_URL.'/'.$item['img'] ?>" alt="" />
            </div>
          </li>
          <li><?= $item['title']?></li>
          <li class="priceItem"><?= number_format($item['price'], 0) ?>VND</li>
          <li>
            <div class="quanlity_btn second">
              <div class="quanlity_btn_inner">
                <ion-icon class="icon md hydrated  increase-button" name="arrow-up-outline" role="img"></ion-icon>
                <ion-icon class="icon md hydrated decrease-button" name="arrow-down-outline" role="img"></ion-icon>
              </div>
              <input type="text" value="<?= $item['quanlity']?>" class="number_quality" />
              <input type="hidden" value="<?= $item['quanlity']?>" name="<?=$item['id']?>"
                class="number_quanlity-hidden">
              <input type="hidden" value="<?=$item['id']?>" name="id<?=$item['id']?>">
              <input type="hidden" value="<?= $item['price']?>" name="total" class="number_price-hidden">
              <input type="hidden" value="<?= $temPrice?>" name="total" class="number_temPrice-hidden">
            </div>

          </li>
          <li class="temPrice"><?= number_format($temPrice, 0)?>VND</li>
          <li>
            <a href="<?= base_url('cart/delete&id='.$item['id'].'&dir=index') ?>" style="color: #000000;">
              <ion-icon class="trash" name="trash-outline"></ion-icon>
            </a>
          </li>
        </ul>
        <?php
            }
          } else {
            ?>
        <h4 class="messageEmptyCart">Giỏ hàng trống</h4>

        <?php
          }
        ?>
      </div>
    </div>
    <?php 
          if (!empty($_SESSION['cart'])) {
            ?>
    <div class="cart_totals">
      <div class="price">
        <p>Tổng:</p>
        <span class="totalPrice"><?=$total ?>VND</span>
      </div>
      <input type="hidden" name="totalPrice" class="total-price-hidden" value="<?=$total ?>">
      <div class="see_more-btn">
        <button type="submit" name="submit_pay" class="btn_submit">Tiến hành thanh toán</button>
      </div>
    </div>
    <?php
          }
        ?>

  </form>

</section>