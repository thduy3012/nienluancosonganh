<?php
include 'config.php';

// Truy vấn cơ sở dữ liệu và lấy dữ liệu sản phẩm
$queryProducts = "SELECT * FROM banhngot";
$resultProducts = mysqli_query($conn, $queryProducts);

// Truy vấn cơ sở dữ liệu và lấy thông tin đơn hàng mới nhất
$queryOrder = "SELECT * FROM DonHang ORDER BY MaDonHang DESC LIMIT 1";
$resultOrder = mysqli_query($conn, $queryOrder);
$order = mysqli_fetch_assoc($resultOrder);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css">
    <title>Admin - Quản lý sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>

    <!-- Form thêm mới sản phẩm -->
    <h2>Thêm mới sản phẩm</h2>
    <form action="add_sp.php" method="POST" enctype="multipart/form-data">
        <label for="tenBanh">Tên bánh:</label><br>
        <input type="text" id="tenBanh" name="tenBanh"><br>
        <label for="description">Mô tả:</label><br>
        <textarea id="description" name="description"></textarea><br>
        <label for="price">Giá:</label><br>
        <input type="text" id="price" name="price"><br>
        <label for="image">Hình ảnh:</label><br>
        <input type="file" id="image" name="image"><br><br>
        <input type="submit" value="Thêm mới">
    </form>

    <!-- Bảng hiển thị danh sách sản phẩm -->
    <h2>Danh sách sản phẩm</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên bánh</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Thao tác</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultProducts)) { ?>
            <tr>
                <td><?php echo $row['MaBanh']; ?></td>
                <td><?php echo $row['TenBanh']; ?></td>
                <td><?php echo $row['Description']; ?></td>
                <td><?php echo $row['Price']; ?></td>
                <td><img src="<?php echo $row['Image']; ?>" width="100"></td>
                <td>
                    <a href="edit_product.php?id=<?php echo $row['MaBanh']; ?>">Chỉnh sửa</a>
                    <a href="delete_product.php?id=<?php echo $row['MaBanh']; ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <!-- Hiển thị thông tin đơn hàng mới nhất -->
    <h2>Thông tin đơn hàng mới nhất</h2>
    <?php
    if ($order) {
        echo "<p>Tên khách hàng: " . $order['TenKH'] . "</p>";
        echo "<p>Số điện thoại: " . $order['SoDienThoai'] . "</p>";
        echo "<p>Địa chỉ giao hàng: " . $order['DiaChiKH'] . "</p>";
    } else {
        echo "<p>Chưa có đơn hàng nào.</p>";
    }
    ?>

    <?php mysqli_close($conn); ?>
</body>
</html>
