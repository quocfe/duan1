<?php 

function save_file($fieldname, $target_dir)
{
    $file_uploaded = $_FILES[$fieldname];
    $file_name = basename($file_uploaded['name']);
    $target_path = $target_dir . $file_name;

    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); // Các loại file cho phép upload
    
    $file_extension = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));
    
    if (!in_array($file_extension, $allowed_extensions)) {
        // Nếu loại file không được phép, bạn có thể xử lý lỗi ở đây hoặc trả về giá trị null để chỉ ra việc upload file không thành công.
        return null;
    }

    move_uploaded_file($file_uploaded['tmp_name'], $target_path);
    return $file_name;
}