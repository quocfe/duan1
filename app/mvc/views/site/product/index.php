<section class="main main_page container">
  <div class="breadcrumb">
    <div class="breadcrumb_custom">
      <a href="">CỬA HÀNG</a>
      <span style="padding: 0px 5px">|</span>
      <a href="https://43factory.coffee/ca-phe-specialty/">CÀ PHÊ SPECIALTY |
        <?= isset($cate_name['cate_name']) ? $cate_name['cate_name'] : 'All' ?></a>
    </div>
  </div>
  <div class="main_store">
    <div class="nav">
      <ul class="origin">
        <li class="heading">Origin</li>
        <li>
          <a href="<?= base_url('product/select&id=all') ?>">All</a>
        </li>
        <?php 
          foreach ($categorys as $category) {
            ?>
        <li><a href="<?= base_url('product/select&id='.$category['cate_id'].'') ?>"><?= $category['cate_name'] ?></a>
        </li>
        <?php
          }
        ?>

      </ul>
    </div>
    <div class="list_item">
      <div class="item_row flex">
        <?php 
          if (count($products) > 0 ) {
            ?>
        <?php 
            foreach ($products as $product) {
              ?>
        <a style="text-decoration: none; color: #000000;" class="item"
          href="<?= base_url('product/show&id='.$product["pdt_id"].'') ?>">
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
        <?php
            } else {
              echo '<h3 style= "text-align: center; flex: 1;"  > Sản phẩm không tồn tại! </h3>';
            }
        ?>

      </div>
      <div class="see_more-btn" style="<?= count($products) == 0 || count($products) < 8 ? 'display: none;' : ''?>">
        <button>Xem thêm</button>
        <div class="spinner"></div>
      </div>
    </div>
  </div>
</section>