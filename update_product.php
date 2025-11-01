<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $tenBanh = $_POST['tenBanh'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
    $query = "UPDATE banhngot SET TenBanh = '$tenBanh', Description = '$description', Price = '$price' WHERE MaBanh = '$id'";
    if (mysqli_query($conn, $query)) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Cập nhật sản phẩm thất bại: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
