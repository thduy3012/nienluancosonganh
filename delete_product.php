<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa sản phẩm khỏi cơ sở dữ liệu
    $query = "DELETE FROM banhngot WHERE MaBanh = '$id'";
    if (mysqli_query($conn, $query)) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Xóa sản phẩm thất bại: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
