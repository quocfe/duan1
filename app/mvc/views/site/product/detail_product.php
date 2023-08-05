<div class="main main_page container">
  <div class="breadcrumb">
    <div class="breadcrumb_custom">
      <a href="">CỬA HÀNG</a>
      <span style="padding: 0px 5px">|</span>
      <a href="https://43factory.coffee/ca-phe-specialty/">CÀ PHÊ SPECIALTY | <?= $cate_name['cate_name'] ?></a>
    </div>
  </div>
  <div class="detail_product_wrapper">
    <div class="detail_product">
      <div class="top">
        <div class="product_img">
          <div class="img">
            <img src="<?= UPLOAD_PRODUCT_URL.'/'.$product['pdt_img'] ?>" alt="" />
          </div>
        </div>
        <div class="product_info">
          <h2><?=$product['pdt_title']?></h2>
          <p class="product_price"><?= number_format($product['pdt_price'], 0) ?>VNĐ</p>
          <ul class="product_category">
            <li>
              <span class="type">Xuất xứ</span>
              <span class="value"><?= $cate_name["cate_name"] ?></span>
            </li>
            <li>
              <span class="type">Vùng</span>
              <span class="value">Bench Maji Zone</span>
            </li>
            <li>
              <span class="type">Nông trại</span>
              <span class="value">Dimma</span>
            </li>
            <li>
              <span class="type">Giống</span>
              <span class="value">Illubabor Forest</span>
            </li>
            <li>
              <span class="type">Năm thu hoạch</span>
              <span class="value">01/2022</span>
            </li>
            <li>
              <span class="type">Độ cao</span>
              <span class="value">1909 - 2069 masl</span>
            </li>
            <li>
              <span class="type">Phương pháp sơ chế</span>
              <span class="value">Washed</span>
            </li>
            <li>
              <span class="type">Trọng lượng</span>
              <span class="value">250 gram</span>
            </li>
          </ul>
          <div class="product_filter" id="accordion">

            <div class="product_filter_item">
              <div class="filter_head">
                <p class="">HỒ SƠ HƯƠNG VỊ</p>
                <ion-icon class="icon" name="add-outline"></ion-icon>
              </div>
              <div class="filter_body">
                <div class="filter_body_inner">
                  <p>Peach, Tangerine, Vanilla</p>
                </div>
              </div>
            </div>
            <div class="product_filter_item">
              <div class="filter_head">
                <p class="">HỒ SƠ HƯƠNG VỊ</p>
                <ion-icon class="icon" name="add-outline"></ion-icon>
              </div>
              <div class="filter_body">
                <div class="filter_body_inner">
                  <p>Peach, Tangerine, Vanilla</p>
                </div>
              </div>
            </div>
          </div>
          <form class="product_buy" method="post">
            <p class="quanlity_text">Số lượng</p>
            <div class="quanlity_btn">
              <div class="quanlity_btn_inner">
                <ion-icon class="icon" name="arrow-up-outline" onclick="handleChangeQuanlity('plus')"></ion-icon>
                <ion-icon class="icon" name="arrow-down-outline" onclick="handleChangeQuanlity('minus')"></ion-icon>
              </div>
              <input type="text" value="1" class="number_quality" />
              <input type="hidden" value="1" name="quanlity" class="number_quanlity-hidden">
            </div>
            <div class="see_more-btn">
              <button type="submit" name="addToCart">Add to cart</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div style=" text-align: justify; line-height: 1.4; " class=" detail_product-taste">
    <?=$product['pdt_content'] ?>
  </div>
  <form method="post" class="comment_box">
    <div class="head_box">
      <div class="head_box_inner">
        <div class="ava">
          <img
            src="<?= isset($_SESSION['user']['user_img']) ? UPLOAD_USERS_URL.'/'.$_SESSION['user']['user_img'] : UPLOAD_USERS_URL.'/'.'defaut.jpg'?>"
            alt="" />
        </div>
        <?php 
          if (isset( $_SESSION['user'])) {
          ?>
        <input type="text" name="cmt_text" placeholder="Enter your comment" />
        <button type="submit" name="sent_cmt" class="btn_sent">
          <ion-icon class="icon" name="paper-plane-outline"></ion-icon>
        </button>
        <?php      
          } else {
            ?>
        <p style="margin-left: 200px; font-weight: 500; "><a style="color: #000;"
            href="<?=base_url('users/login') ?>">Đăng nhập</a> để bình
          luận</p>
        <?php
          }
          ?>
      </div>
    </div>
    <!--  -->

    <div class="user_comment-box" style="<?=empty($comments) ? 'display: none;' : ''?>">
      <?php 
        foreach ($comments as $comment) {
          ?>
      <div class="comment">
        <div class="infor">
          <div class="ava">
            <img
              src="<?= isset($comment['user_img']) ? UPLOAD_USERS_URL.'/'.$comment['user_img'] : UPLOAD_USERS_URL.'/'.'defaut.jpg'?>"
              alt="" />
          </div>
          <div class="head">
            <p class="name">
              <span>
                <?=$comment['user_fullname']?>
              </span>
              <?php 
                if ($comment['user_role'] == 1) {
                  ?>
              <span class="x3nfvp2 x11njtxf">
                <svg fill="currentColor" viewBox="0 0 12 13" width="1em" height="1em" title="Tài khoản quản trị">
                  <title>Tài khoản quản trị</title>
                  <g fill="hsl(214, 100%, 59%)" fill-rule="evenodd" transform="translate(-98 -917)">
                    <path
                      d="m106.853 922.354-3.5 3.5a.499.499 0 0 1-.706 0l-1.5-1.5a.5.5 0 1 1 .706-.708l1.147 1.147 3.147-3.147a.5.5 0 1 1 .706.708m3.078 2.295-.589-1.149.588-1.15a.633.633 0 0 0-.219-.82l-1.085-.7-.065-1.287a.627.627 0 0 0-.6-.603l-1.29-.066-.703-1.087a.636.636 0 0 0-.82-.217l-1.148.588-1.15-.588a.631.631 0 0 0-.82.22l-.701 1.085-1.289.065a.626.626 0 0 0-.6.6l-.066 1.29-1.088.702a.634.634 0 0 0-.216.82l.588 1.149-.588 1.15a.632.632 0 0 0 .219.819l1.085.701.065 1.286c.014.33.274.59.6.604l1.29.065.703 1.088c.177.27.53.362.82.216l1.148-.588 1.15.589a.629.629 0 0 0 .82-.22l.701-1.085 1.286-.064a.627.627 0 0 0 .604-.601l.065-1.29 1.088-.703a.633.633 0 0 0 .216-.819">
                    </path>
                  </g>
                </svg>
              </span>
              <?php
                }
              ?>
            </p>
            <p><?=$comment['cmt_date']?></p>
          </div>
        </div>
        <div class="box">
          <p><?=$comment['cmt_content']?></p>
          <div class="reply_btn">
            <ion-icon name="arrow-redo-outline"></ion-icon>
          </div>
        </div>
        <?php 
          foreach ($reply_comments as $reply_comment) {
            if ($comment['cmt_id'] === $reply_comment['cmt_id']) {
              ?>
        <div class="reply_box ">
          <div class="reply">
            <div class="infor">
              <div class="ava">
                <img
                  src="<?= isset($reply_comment['user_img']) ? UPLOAD_USERS_URL.'/'.$reply_comment['user_img'] : UPLOAD_USERS_URL.'/'.'defaut.jpg'?>"
                  alt="" />
              </div>
              <div class="head">
                <p class="name">
                  <span>
                    <?=$reply_comment['user_fullname']?>
                  </span>
                  <?php 
                if ($reply_comment["user_role"] == 1) {
                  ?>
                  <span class="x3nfvp2 x11njtxf">
                    <svg fill="currentColor" viewBox="0 0 12 13" width="1em" height="1em" title="Tài khoản quản trị">
                      <title>Tài khoản quản trị</title>
                      <g fill="hsl(214, 100%, 59%)" fill-rule="evenodd" transform="translate(-98 -917)">
                        <path
                          d="m106.853 922.354-3.5 3.5a.499.499 0 0 1-.706 0l-1.5-1.5a.5.5 0 1 1 .706-.708l1.147 1.147 3.147-3.147a.5.5 0 1 1 .706.708m3.078 2.295-.589-1.149.588-1.15a.633.633 0 0 0-.219-.82l-1.085-.7-.065-1.287a.627.627 0 0 0-.6-.603l-1.29-.066-.703-1.087a.636.636 0 0 0-.82-.217l-1.148.588-1.15-.588a.631.631 0 0 0-.82.22l-.701 1.085-1.289.065a.626.626 0 0 0-.6.6l-.066 1.29-1.088.702a.634.634 0 0 0-.216.82l.588 1.149-.588 1.15a.632.632 0 0 0 .219.819l1.085.701.065 1.286c.014.33.274.59.6.604l1.29.065.703 1.088c.177.27.53.362.82.216l1.148-.588 1.15.589a.629.629 0 0 0 .82-.22l.701-1.085 1.286-.064a.627.627 0 0 0 .604-.601l.065-1.29 1.088-.703a.633.633 0 0 0 .216-.819">
                        </path>
                      </g>
                    </svg>
                  </span>
                  <?php
                }
              ?>
                </p>
                <p><?=$reply_comment['reply_date']?></p>
              </div>
            </div>
            <div class="box">
              <p><?=$reply_comment['reply_text']?></p>
              <div class="reply_btn">
                <ion-icon name="arrow-redo-outline"></ion-icon>
              </div>
            </div>
          </div>
        </div>
        <?php
            }
          }
        ?>
        <form method="post">
          <input type="hidden" name="cmt_id" value="<?=$comment['cmt_id']?>">
          <input type="hidden" name="user_id" value="<?=$_SESSION['user']['user_id']?>">
          <div class="reply_text ">
            <div class="textarea-comment">
              <textarea class="textarea" name="reply_content"></textarea>
              <button type="submit" name="reply_btn" class="button button_cmt-send">
                <ion-icon class="icon md hydrated" name="paper-plane-outline" role="img"></ion-icon>
              </button>
            </div>
          </div>
        </form>
      </div>
      <?php
        }
          ?>

    </div>
  </form>
</div>