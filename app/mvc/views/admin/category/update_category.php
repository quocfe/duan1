<div class="addProduct_wrapper">
  <div class="addProducts addCategory">
    <p class="title">Sửa danh mục</p>
    <div class="box_add">
      <form method="post" id="addCate">
        <div class="form_select">
          <div class="form_group">
            <label for="">Tên danh mục</label>
            <input type="text" name="namecate" id="namecate"
              value="<?= isset($category["cate_name"]) ? $category["cate_name"] : '' ?>" />
          </div>
          <div class="form_btn">
            <a class="btn_admin_product btn-danger">Nhập lại</a>
            <button class="btn_admin_product btn-primary" id="btnAdd" name="update">Cập nhật</button>
            <a href=" ?module=admin&action=list_category" class="btn_admin_product btn-light">Danh sách</a>
          </div>
      </form>
    </div>
  </div>
</div>