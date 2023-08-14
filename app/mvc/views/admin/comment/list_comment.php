<section class="main">
  <div class="container-fluid">
    <?php 
      if (count($comments) != 0) {
        ?>
    <div class="card w-80 mx-auto mt-5">
      <div class="card-header">
        <h2 class="heading">Danh sách bình luận</h2>
      </div>
      <div class="card-body">
        <table class="table">
          <thead class="thead-dark">
            <tr class="thead-dark-top text-center">
              <th>Hàng hóa</th>
              <th>Số bình luận</th>
              <th>Cũ nhất</th>
              <th>Mới nhất</th>
              <th>Chi tiết</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              foreach ($comments as $comment) {
                extract($comment);
                if ($comment_count != 0) {
                  
                  ?>
            <tr>
              <td><?= $pdt_title ?></td>
              <td><?= $comment_count ?></td>
              <td><?=$min_date?></td>
              <td><?=$max_date?></td>
              <td>
                <a href="<?=base_url('admin/detail_comment&id='.$pdt_id.'')?>" type="button"
                  class="btn-danger btnDelete">Chi
                  tiết</a>
              </td>
            </tr>
            <?php
                } else {
                  ?>
            <td style="display: none;"></td>
            <?php
                }
                ?>
            <?php   
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php
      } else {
        ?>
    <td colspan="7">
      <p class="text-center fs-3 fw-bolder text-danger mt-4 ">Không có bình luận</p>
    </td>
    <?php
      }
    ?>

  </div>
</section>