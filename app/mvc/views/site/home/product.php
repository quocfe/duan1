  <div class="products container">
    <div class="top">
      <div class="title">
        <h3>Sản phẩm</h3>
        <p>Sản phẩm của chúng tôi</p>
      </div>
      <div class="see_more">
        <a href="<?=base_url('product/index')?>">Xem tiếp</a>
      </div>
    </div>
    <div class="product">
      <ion-icon class="btn btn-previous" name="arrow-back-outline"></ion-icon>
      <div class="item_wrapper">
        <div class="item_row">
          <?php 
            foreach ($products as $product) {
              ?>
          <a style="text-decoration: none; color: #000000;"
            href="<?= base_url('product/show&id='.$product["pdt_id"].'') ?>" class="item">
            <div class="item_img">
              <img src="<?= UPLOAD_PRODUCTS_URL . '/' . $product["pdt_img"] ?>" alt="" />
            </div>
            <div class="item_cont">
              <p class="item_price"><?= number_format($product["pdt_price"], 0)?>VNĐ</p>
              <h3 class="item_ttl"><?= $product["pdt_title"] ?></h3>
              <p class="item_txt"></p>
            </div>
          </a>
          <?php  
            }
            ?>
        </div>
      </div>
      <ion-icon class="btn btn-next" name="arrow-forward-outline"></ion-icon>
    </div>
  </div>