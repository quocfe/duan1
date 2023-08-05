<section class="main">
  <div class="container-fluid">
    <div class="card w-75 mx-auto mt-5">
      <div class="card-header">
        <h2 class="heading">Danh sách bài viết</h2>
        <a class="addBtn" href="<?= base_url('admin/add_post')?>">Thêm mới</a>
      </div>
      <div class="card-body">
        <table class="table">
          <thead class="thead-dark">
            <tr class="thead-dark-top text-center">
              <th>ID</th>
              <th>Tên bài viết</th>
              <th>Hình ảnh</th>
              <th>Sửa</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              foreach($list_post as $post) {
                ?>
            <tr>
              <td><?= $post["post_id"]?></td>
              <td style="width: 600px;"><?= $post["post_title"]?></td>
              <td>
                <img style="margin: 0 auto;" width="100px" heigh="100px"
                  src="<?= UPLOAD_NEWS_URL.'/'.$post["post_img"]?>" />
              </td>
              <td>
                <a href="<?= base_url('admin/update_post&id='.$post["post_id"].'')?>" type="button"
                  class="btn-primary btnEdit">Sửa</a>
              </td>
              <td>
                <a href="<?= base_url('admin/delete_post&id='.$post["post_id"].'')?>" type="button"
                  class="btn-danger btnDelete">Xóa</a>
              </td>
            </tr>
            <?php
              }
            ?>

            <!-- <td colspan="7">
                <p class="text-center fs-3 fw-bolder text-danger">Empty</p>
              </td> -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>