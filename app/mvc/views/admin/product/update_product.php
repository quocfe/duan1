<div class="addProduct_wrapper">
  <div class="addProducts">
    <p class="title">Cập nhật sản phẩm</p>
    <div class="box_add">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form_select">
          <div class="form_group">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="pdt_name" id="" value="<?=check_isset($old_product["pdt_title"], '')?>" />
          </div>
          <div class="form_group">
            <label for="">Loại sản phẩm</label>
            <select name="select_cate" id="">
              <option value="">Chưa chọn loại sản phẩm</option>
              <?php 
                foreach($list_categories as $category) {
                  ?>
              <option value="<?= $category["cate_id"] ?>" selected><?= $category["cate_name"] ?></option>
              <?php
                }
              ?>
            </select>
          </div>
          <div class="form_group disabled">
            <label for="">Mã sản phẩm</label>
            <input disabled type="text" name="pdt_id" id="" value="auto number" />
          </div>
          <div class="form_group">
            <label for="">Ảnh sản phẩm</label>
            <input type="file" name="pdt_img" id="" />
            <span><?= check_isset($old_product["pdt_img"], '') ?></span>
            <input hidden type="text" name="old_img" value="<?= check_isset($old_product["pdt_img"], '') ?>">
          </div>
          <div class="form_group">
            <label for="">Đơn giá</label>
            <input type="text" name="pdt_price" id="" value="<?= check_isset($old_product["pdt_price"], '') ?>" />
          </div>
          <div class="form_group">
            <label for="">Ngày nhập</label>
            <input type="date" name="pdt_date" id="" value="<?= check_isset($old_product["pdt_date"], '') ?>" />
          </div>
          <div class="form_group disabled">
            <label for="">Số lượt xem</label>
            <input disabled type="number" name="" id="" value="0" />
            <input hidden type="number" name="pdt_view" id="" value="0" />
          </div>
        </div>
        <div class="form_des">
          <div class="form_group">
            <label for="">Mô tả sản phẩm</label>
            <textarea name="pdt_desc" id="productDesc" cols="30" rows="10">
              <?= check_isset($old_product["pdt_desc"], '') ?>
            </textarea>
          </div>
          <div class="form_content">
            <div class="form_group">
              <label for="">Nội dung sản phẩm</label>
              <textarea name="pdt_content" id="productContent" cols="30" rows="10">
                  <?= check_isset($old_product["pdt_content"], '') ?>
              </textarea>
            </div>
          </div>
          <div class="form_btn">
            <a class="btn_admin_product btn-danger">Nhập lại</a>
            <button class="btn_admin_product btn-primary" name="update">Cập nhật</button>
            <a href="<?= base_url('admin/list_product') ?>" class="btn_admin_product btn-light">Danh sách</a>
          </div>
      </form>
    </div>
  </div>
</div>