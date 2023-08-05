<div class="community container">
  <div class="top">
    <div class="title">
      <h3>Cộng đồng</h3>
      <p>Những người giúp chúng tôi xây dựng một thế giới tuyệt vời</p>
    </div>
    <div class="see_more">
      <a href="<?=base_url('posts/index')?>">Xem tiếp</a>
    </div>
  </div>
  <div class="community_swiper">
    <ion-icon class="btn btn-previous" name="arrow-back-outline"></ion-icon>
    <div class="item_wrapper container">
      <div class="item_row">
        <?php 
        foreach ($posts as $item) {
          ?>
        <a href="<?=base_url('posts/show&id='.$item["post_id"].'')?>" class="item">
          <div class="item_img" style="height: 100%; width: 100%;">
            <img style="object-fit: cover; height: 100%; width: 100%;"
              src="<?= UPLOAD_NEWS_URL . '/' . $item["post_img"] ?>" alt="" />
          </div>
          <div class="item_content">
            <h3>Danche</h3>
            <p>Trạm sơ chế</p>
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