<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenBanh = $_POST['tenBanh'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Xử lý upload hình ảnh
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
    $image = $targetFile;

    // Thêm bản ghi vào cơ sở dữ liệu
    $query = "INSERT INTO banhngot (TenBanh, Description, Price, Image) VALUES ('$tenBanh', '$description', '$price', '$image')";
    if (mysqli_query($conn, $query)) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Thêm sản phẩm thất bại: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
