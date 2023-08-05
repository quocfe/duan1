\_\_construct() là 1 hàm tự động chạy khi khởi tạo class

ob_start: lưu dữ liệu require vào 1 biến

get all, find_by_id(col), create, update, delete, search_by

function renderLayout () {
ob_start();
$this->view->show();
$content = ob_get_contents();
ob_end_clean();

      $this->layout->load([
        'content' => $content
      ]);
    }

- Hàm ob_start() bắt đầu một bộ đệm. Điều này có nghĩa là tất cả đầu ra của mã sau đó sẽ được lưu trữ trong bộ đệm thay vì được hiển thị cho người dùng. Điều này hữu ích vì nó cho phép chúng ta lưu trữ mã HTML cho view và layout trong các bộ đệm riêng biệt.
- Hàm ob_get_contents() lấy nội dung của bộ đệm. Điều này trả về mã HTML cho view.
- Hàm ob_end_clean() làm sạch bộ đệm. Điều này có nghĩa là nội dung của bộ đệm được hiển thị cho người dùng.

- checkout -> cod -> sucess -> show sucess page (option: invoice || detail_order) -> insert database
- checkout -> momo -> goto qr -> sucess -> show sucess page (option: invoice || detail_order) -> insertdatabase

- mã hóa password

- ko cho cập nhật tên đăng nhập
  -Nhân viên quản trị không được phép xóa chính mình.
