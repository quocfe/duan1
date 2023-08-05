<div class="addProduct_wrapper">
  <div class="addProducts">
    <p class="title">Thêm mới bài viết</p>
    <div class="box_add">
      <form method="post" enctype="multipart/form-data">
        <div class="form_select">
          <div class="form_group">
            <label for="">Tên bài viết</label>
            <input type="text" name="post_title" />
          </div>
          <div class="form_group">
            <label for="">Ảnh bài viết</label>
            <input type="file" name="post_img" id="" />
          </div>
          <div class="form_group">
            <label for="">Ngày nhập</label>
            <input type="date" name="post_date" id="" />
          </div>
          <div class="form_group disabled">
            <input hidden type="number" name="post_view" value="0">
          </div>
        </div>
        <div class="form_group">
          <label for="">Mô tả bài viết</label>
          <textarea name="post_desc" id="desc"></textarea>
        </div>
        <div class="form_des">
          <div class="form_group">
            <label for="">Nội dung bài viết</label>
            <textarea name="post_content" id="content"></textarea>
          </div>
        </div>
        <div class="form_btn">
          <a class="btn_admin_product btn-danger">Nhập lại</a>
          <button class="btn_admin_product btn-primary" id="btnAddPost" name="btnAddPost">Thêm mới</button>
          <a href="./listProducts.html" class="btn_admin_product btn-light">Danh sách</a>
        </div>
      </form>
    </div>
  </div>
</div>