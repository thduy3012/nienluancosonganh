<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lấy thông tin sản phẩm từ cơ sở dữ liệu
    $query = "SELECT * FROM banhngot WHERE MaBanh = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Hiển thị form chỉnh sửa thông tin sản phẩm
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css">
    <title>Chỉnh sửa sản phẩm</title>
</head>
<body>
    <h1>Chỉnh sửa sản phẩm</h1>
    <form action="update_product.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['MaBanh']; ?>">
        <label for="tenBanh">Tên bánh:</label><br>
        <input type="text" id="tenBanh" name="tenBanh" value="<?php echo $row['TenBanh']; ?>"><br>
        <label for="description">Mô tả:</label><br>
        <textarea id="description" name="description"><?php echo $row['Description']; ?></textarea><br>
        <label for="price">Giá:</label><br>
        <input type="text" id="price" name="price" value="<?php echo $row['Price']; ?>"><br>
        <input type="submit" value="Cập nhật">
    </form>
</body>
</html>
<?php
} else {
    echo "Không tìm thấy sản phẩm.";
}

mysqli_close($conn);
?>
