  <div class="order">
    <div class="heading">
      <p>Lịch sử mua hàng</p>
      <span>Tổng số đơn hàng : <strong><?=isset($numberOrder) ? $numberOrder : '' ?></strong> đơn</span>
    </div>
    <div class="content">
      <div class="table">
        <div class="col_head">
          <ul>
            <li>Thời gian</li>
            <li>Mã đơn hàng</li>
            <li>Tổng tiền</li>
            <li>Trạng thái</li>
            <li></li>
          </ul>
        </div>
        <div class="col_body">
          <?php 
          if (is_array($orderAll)) {
              foreach($orderAll as $item ) {
          ?>
          <ul>
            <li class="time">
              <p><?=isset($item["order_date"]) ? $item["order_date"] : ''?></p>
            </li>
            <li><?=isset($item["order_id"]) ? $item["order_id"] : ''?></li>
            <li><?=isset($item ["order_total"]) ? number_format($item ["order_total"], 0) : ''?>VNĐ</li>
            <li>Loading</li>
            <li><a href="<?=  base_url('users/detail_order&id='.$item["order_id"].'')?>">Chi tiết</a></li>
          </ul>
          <?php
            }
          } else {
            ?>
          <ul>
            <li class="time">
              <p><?=isset($orderAll["order_date"]) ? $orderAll["order_date"] : ''?></p>
            </li>
            <li><?=isset($orderAll["order_id"]) ? $orderAll["order_id"] : ''?></li>
            <li><?=isset($orderAll ["order_total"]) ? number_format($orderAll ["order_total"], 0) : ''?>VNĐ</li>
            <li>Loading</li>
            <li><a href="<?=  base_url('users/detail_order&id='.$item["order_id"].'')?>">Chi tiết</a></li>
          </ul>
          <?php
          }
            
          ?>
        </div>
      </div>
    </div>
  </div>