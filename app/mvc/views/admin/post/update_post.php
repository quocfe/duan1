<div class="addProduct_wrapper">
  <div class="addProducts">
    <p class="title">Thêm mới bài viết</p>
    <div class="box_add">
      <form method="post" enctype="multipart/form-data">
        <div class="form_select" style="grid-template-columns: repeat(2, 1fr);">
          <div class="form_group">
            <label for="">Tên bài viết</label>
            <input type="text" name="post_title" value="<?= check_isset($old_post["post_title"], '') ?>" />
          </div>
          <div class="form_group">
            <label for="">Ảnh bài viết</label>
            <input type="file" name="post_img" id="" />
            <input hidden type="text" name="old_img" value="<?= check_isset($old_post["post_img"], '') ?>">
            <span><?= check_isset($old_post["post_img"], '') ?></span>
          </div>
          <div class="form_group">
            <label for="">Ngày nhập</label>
            <input type="date" name="post_date" id="" value="<?= check_isset($old_post["post_date"], '') ?>" />
          </div>
          <div class="form_group disabled">
            <label for="">Lượt xem</label>
            <input type="number" name="post_view" value="0">
          </div>
        </div>
        <div class="form_group">
          <label for="">Mô tả bài viết</label>
          <textarea name="post_desc" id="desc"> <?= check_isset($old_post["post_desc"], '') ?></textarea>
        </div>
        <div class="form_des">
          <div class="form_group">
            <label for="">Nội dung bài viết</label>
            <textarea name="post_content" id="content"><?= check_isset($old_post["post_content"], '') ?></textarea>
          </div>
        </div>
        <div class="form_btn">
          <a class="btn_admin_product btn-danger">Nhập lại</a>
          <button class="btn_admin_product btn-primary" id="btnAddPost" name="btnUpdatePost">Cập nhật</button>
          <a href="<?= base_url('admin/list_post') ?>" class="btn_admin_product btn-light">Danh sách</a>
        </div>
      </form>
    </div>
  </div>
</div>