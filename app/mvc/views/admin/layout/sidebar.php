<div class="sidebar-header">
  <a href="<?= base_url('home/index') ?>">
    <img src="<?=CONTENT_URL?>/asset/img/LOGOSIMPLE47FACTORY.png" alt="logo" class="img-fluid logo" />
  </a>
</div>
<ul class="list-unstyled components text-secondary">
  <li>
    <a href="<?= base_url('home/index') ?>"><i class="fas fa-store"></i>Xem trang web</a>
  </li>
  <li>
    <a href="/ShoppingCenter/admin/trang-chinh/"><i class="fas fa-home"></i>Trang chủ</a>
  </li>
  <li>
    <a href="#categories" data-bs-toggle="collapse" aria-expanded="false"
      class="dropdown-toggle no-caret-down collapsed"><i class="fas fa-list-alt"></i>Danh mục
      <i class="fas fa-angle-right float-xl-right"></i>
    </a>
    <ul class="list-unstyled collapse" id="categories">
      <li>
        <a href="<?= base_url('admin/add_category') ?>">
          <i class="fas fa-plus"></i>Thêm Danh Mục</a>
      </li>
      <li>
        <a href="<?= base_url('admin/list_category') ?>">
          <i class="fas fa-list-ul"></i>
          Danh sách danh mục
        </a>
      </li>
    </ul>
  </li>
  <li>
    <a href="#posts" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down">
      <i class="fa fa-newspaper-o"></i>
      Bài viết
      <i class="fas fa-angle-right float-xl-right"></i>
    </a>
    <ul class="collapse list-unstyled" id="posts">
      <li>
        <a href="<?= base_url('admin/add_post') ?>"><i class="fas fa-plus"></i>Thêm bài viết</a>
      </li>
      <li>
        <a href="<?= base_url('admin/list_post') ?>">
          <i class="fas fa-list-ul"></i>Danh sách bài viết
        </a>
      </li>
    </ul>
  </li>
  <li>
    <a href="#products" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i
        class="fas fa-table"></i>Sản phẩm
      <i class="fas fa-angle-right float-xl-right"></i>
    </a>
    <ul class="collapse list-unstyled" id="products">
      <li>
        <a href="<?= base_url('admin/add_product') ?>"><i class="fas fa-plus"></i>Thêm sản phẩm</a>
      </li>
      <li>
        <a href="<?= base_url('admin/list_product') ?>">
          <i class="fas fa-list-ul"></i>Danh sách sản phẩm</a>
      </li>
    </ul>
  </li>
  <li>
    <a href="#accounts" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down">
      <i class="fas fa-user-friends"></i>Khách hàng
      <i class="fas fa-angle-right float-xl-right"></i>
    </a>
    <ul class="collapse list-unstyled" id="accounts">
      <li>
        <a href="<?= base_url('admin/add_user') ?>"><i class="fas fa-plus"></i>Thêm khách hàng</a>
      </li>
      <li>
        <a href="<?= base_url('admin/list_users') ?>">
          <i class="fas fa-list-ul"></i>Danh sách khách hàng</a>
      </li>
    </ul>
  </li>
  <li>
    <a href="/ShoppingCenter/admin/binh-luan/">
      <i class="fas fa-comments"></i>Bình luận</a>
  </li>
  <li>
    <a href="/ShoppingCenter/admin/thong-ke/"><i class="fas fa-chart-line"></i>Thống kê</a>
  </li>
  <li>
    <a href="/ShoppingCenter/admin/don-hang/"><i class="fas fa-shipping-fast"></i>Đơn hàng</a>
  </li>
  <li>
    <a href="settings.html"><i class="fas fa-cog"></i>Cài đặt</a>
  </li>
</ul>