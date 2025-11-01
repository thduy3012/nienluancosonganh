<?php
// Thông tin kết nối cơ sở dữ liệu
define('DB_HOST', 'localhost'); // Địa chỉ máy chủ cơ sở dữ liệu (thường là localhost)
define('DB_USER', 'root'); // Tên người dùng cơ sở dữ liệu
define('DB_PASSWORD', ''); // Mật khẩu cơ sở dữ liệu
define('DB_NAME', 'cakesofbetty'); // Tên cơ sở dữ liệu

// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
?>
