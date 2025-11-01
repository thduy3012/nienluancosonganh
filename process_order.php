<?php
include 'config.php';

// Lấy thông tin từ form thanh toán
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// Lưu thông tin vào bảng KhachHang
$query = "INSERT INTO KhachHang (TenKH, DiaChiKH, SoDienThoai) VALUES ('$name', '$address', '$phone')";
$result = mysqli_query($conn, $query);

if ($result) {
    // Lấy ID của khách hàng vừa thêm vào
    $customer_id = mysqli_insert_id($conn);
    
    // Lấy thông tin giỏ hàng từ sessionStorage (giả sử đã lưu trữ)
    // Sau đó thêm thông tin đơn hàng vào bảng DonHang và chi tiết đơn hàng vào bảng ChiTietDonHang
    // Code xử lý giỏ hàng ở đây...
    
    echo "Đơn hàng của bạn đã được đặt thành công!";
} else {
    echo "Đã xảy ra lỗi khi đặt hàng. Vui lòng thử lại sau.";
}




mysqli_close($conn);
?>
