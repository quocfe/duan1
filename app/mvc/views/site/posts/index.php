<section class="main main_page container">
  <div class="breadcrumb">
    <div class="breadcrumb_custom">
      <a href="">Trải nghiệm</a>
      <span style="padding: 0px 5px">|</span>
      <a href="https://43factory.coffee/ca-phe-specialty/">Tin tức</a>
    </div>
  </div>
  <div class="news">
    <div class="top">
      <?php 
        for ($i = 0; $i < 2 ; $i ++) {
          ?>
      <div class="content">
        <a href="<?= base_url('posts/show&id='.$posts[$i]["post_id"].'') ?>">
          <img src="<?= UPLOAD_NEWS_URL.'/'.$posts[$i]['post_img'] ?>" alt="" />
        </a>
        <h3 class="title">
          <a href="https://43factory.coffee/news/"><?=$posts[$i]['post_title']?></a>
        </h3>
        <div class="script">
          <p>
            <?=$posts[$i]['post_desc']?>
          </p>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
    <div class="bottom">
      <div class="left">
        <strong class="heading">LATEST</strong>
        <ul class="product_shop_list">
          <?php 
            foreach ($posts as $post) {
              ?>
          <li class="product_lst_item">
            <a href="<?= base_url('posts/show&id='.$post["post_id"].'') ?>">
              <figure>
                <img src="<?= UPLOAD_NEWS_URL.'/'.$post['post_img'] ?>" alt="" />
              </figure>
              <div class="item_cont">
                <h3 class="item_ttl">
                  <?=$post['post_title']?>
                </h3>
                <p>
                  <?=$post['post_desc']?>
                </p>
              </div>
            </a>
          </li>
          <?php
            }
          ?>
        </ul>
        <div class="see_more-btn" style="<?= count($posts) == 0 || count($posts) < 4 ? 'display: none;' : ''?>">
          <button>Xem thêm</button>
          <div class="spinner"></div>
        </div>
      </div>
      <div class="right">
        <strong class="heading">POPULAR</strong>
        <ul class="product_shop_list popular">
          <?php foreach ($populars as $popular) {
            ?>
          <li class="product_lst_item">
            <a href="<?= base_url('posts/show&id='.$popular["post_id"].'') ?>">
              <div class="item_cont">
                <h3 class="item_ttl">
                  <?= $popular['post_title'] ?>
                </h3>
                <p>
                  <?= $popular['post_desc'] ?>
                </p>
              </div>
            </a>
          </li>
          <?php
          } ?>
        </ul>
      </div>
    </div>
  </div>
</section>