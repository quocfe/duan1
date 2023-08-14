<section class="main">
  <div class="container-fluid">
    <!--  -->
    <?php 
              if (count($cmts_reply) !=  0) {
                ?>
    <div class="card w-80 mx-auto mt-5">
      <div class="card-header">
        <h2 class="heading">Chi tiết bình luận</h2>
      </div>
      <div class="card-body">
        <form method="post">
          <table class="table">
            <thead class="thead-dark">
              <tr class="thead-dark-top text-center">
                <th>Nội dung</th>
                <th>Ngày bình luận</th>
                <th>Người bình luận</th>
                <th>Chi tiết</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($cmts_reply as $cmt_reply) {
                extract($cmt_reply);
                ?>
              <tr>
                <td><?=$cmt_content?></td>
                <td><?= $cmt_date ?></td>
                <td><?= $user_fullname ? $user_fullname : $user_username ?></td>
                <td>
                  <input type="hidden" name="cmt_id" value="<?=$cmt_id?>">
                  <button type="submit" name="delete" class="btn-danger btnDelete">Xóa</button>
                </td>
              </tr>
              <?php
              }
                ?>
            </tbody>
          </table>
        </form>
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

    <!--  -->
  </div>
</section>