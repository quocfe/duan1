<div class="story container">
  <div class="top">
    <div class="title">
      <h3>Trải nghiệm</h3>
      <p>Câu chuyện cà phê</p>
    </div>
    <div class="see_more">
      <a href="<?=base_url('posts/index')?>">Xem tiếp</a>
    </div>
  </div>
  <div class="content">
    <div class="content_left">
      <a class="content_left_img">
        <img src="<?= UPLOAD_NEWS_URL . '/' . $posts[0]["post_img"] ?>" alt="" />
      </a>
      <div class="content_left_para">
        <a class="heading" href="<?=base_url('posts/show&id='.$posts[0]["post_id"].'')?>">
          <h2>
            <?=  $posts[0]["post_title"] ?>
          </h2>
        </a>
        <p style="text-align: justify">
          <?=  $posts[0]["post_desc"] ?>
        </p>
        <div class="see_more color_gray">
          <a href="<?=base_url('posts/show&id='.$posts[0]["post_id"].'')?>">Xem tiếp</a>
        </div>
      </div>
    </div>
    <div class="content_right">
      <a <?=base_url('posts/show&id='.$posts[1]["post_id"].'')?> class="content_right_img">
        <img src="<?= UPLOAD_NEWS_URL . '/' . $posts[1]["post_img"] ?>" alt="" />
      </a>
      <div class="content_right_para">
        <a class="heading" href="<?=base_url('posts/show&id='.$posts[1]["post_id"].'')?>">
          <h2>
            <?=  $posts[1]["post_title"] ?>
          </h2>
        </a>
        <p style="text-align: justify">
          <?=  $posts[1]["post_desc"] ?>
        </p>
      </div>
      <div class="see_more color_gray">
        <a href="<?=base_url('posts/show&id='.$posts[1]["post_id"].'')?>">Xem tiếp</a>
      </div>
    </div>
  </div>
</div>