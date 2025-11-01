<?php
// Bao gồm tệp cấu hình cơ sở dữ liệu
include 'config.php';

// Truy vấn cơ sở dữ liệu và lấy dữ liệu cho Cookies
$queryCookies = "SELECT * FROM banhngot WHERE MaLoai = 321"; // Giả sử MaLoai của Cookies là 1
$resultCookies = mysqli_query($conn, $queryCookies);

// Truy vấn cơ sở dữ liệu và lấy dữ liệu cho Cupcakes
$queryCupcakes = "SELECT * FROM banhngot WHERE MaLoai = 654"; // Giả sử MaLoai của Cupcakes là 2
$resultCupcakes = mysqli_query($conn, $queryCupcakes);

// Truy vấn cơ sở dữ liệu và lấy dữ liệu cho Cakes
$queryCakes = "SELECT * FROM banhngot WHERE MaLoai = 987"; // Giả sử MaLoai của Cakes là 3
$resultCakes = mysqli_query($conn, $queryCakes);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <link rel="stylesheet" href="style/reset.css">
        <link rel="stylesheet" href="style/common.css">
        <link rel="stylesheet" href="style/header.css">
        <link rel="stylesheet" href="style/home.css">
        <link rel="stylesheet" href="style/about.css">
        <link rel="stylesheet" href="style/products.css">
        <link rel="stylesheet" href="style/contact.css">
        <link rel="stylesheet" href="style/product-html.css">
        <link rel="stylesheet" href="style/cart.css">
        <link rel="stylesheet" href="style/button.css">
        <link rel="stylesheet" href="style/footer.css">
        <script src="script/products.js"></script>
        <title>Cakes of Betty - Sản Phẩm</title>
    </head>

<body>
    <header>
        <a href="index.php" class="logo"><img src="img/logo.png" alt="Cakes of Betty" /></a>
        <nav class="navigate">
            <ul>
                <li><a href="index.php#home">Trang Chủ</a></li>
                <li><a href="index.php#about">Về Betty</a></li>
                <li><a href="products.php" class="active">Sản Phẩm</a></li>
                <li><a href="index.php#contact">Liên hệ</a></li>
            </ul>
        </nav>
        <div class="cart">
            <a href="cart.php" class="active"> <span class="cart-icon">&#128722;</span> </a>
            <span class="cart-count">0</span>
        </div>
        <div id="menu"><i class="fas fa-bars"></i></div>
    </header>
    <!-- Các danh mục sản phẩm cố định -->
    <section class="product" id="product">
        <h1 class="title">Những sản phẩm từ <span>Betty</span></h1>

        <!-- Cookies Section -->
        <div class="cake-product">
            <h2 class="subtitle">Cookies</h2>
            <div class="inner-cake-row">
                <?php
                // Hiển thị sản phẩm Cookies từ cơ sở dữ liệu
                while ($row = mysqli_fetch_assoc($resultCookies)) {
                    echo "
                        <div class='inner-cake-col' data-product-id='{$row['MaBanh']}'>
                            <img src='{$row['Image']}' alt='{$row['TenBanh']}'>
                            <div class='cake-price'>
                                <p>{$row['Price']}</p>
                            </div>
                            <h2>{$row['TenBanh']}</h2>
                            <h3>{$row['Description']}</h3>
                            <button class='add-to-cart'>Thêm vào giỏ hàng</button>
                        </div>
                    ";
                }
                ?>
            </div>
        </div>

        <!-- Cupcakes Section -->
        <div class="cake-product">
            <h2 class="subtitle">Cupcakes</h2>
            <div class="inner-cake-row">
                <?php
                // Hiển thị sản phẩm Cupcakes từ cơ sở dữ liệu
                while ($row = mysqli_fetch_assoc($resultCupcakes)) {
                    echo "
                        <div class='inner-cake-col' data-product-id='{$row['MaBanh']}'>
                            <img src='{$row['Image']}' alt='{$row['TenBanh']}'>
                            <div class='cake-price'>
                                <p>{$row['Price']}</p>
                            </div>
                            <h2>{$row['TenBanh']}</h2>
                            <h3>{$row['Description']}</h3>
                            <button class='add-to-cart'>Thêm vào giỏ hàng</button>
                        </div>
                    ";
                }
                ?>
            </div>
        </div>

        <!-- Cakes Section -->
        <div class="cake-product">
            <h2 class="subtitle">Cakes</h2>
            <div class="inner-cake-row">
                <?php
                // Hiển thị sản phẩm Cakes từ cơ sở dữ liệu
                while ($row = mysqli_fetch_assoc($resultCakes)) {
                    echo "
                        <div class='inner-cake-col' data-product-id='{$row['MaBanh']}'>
                            <img src='{$row['Image']}' alt='{$row['TenBanh']}'>
                            <div class='cake-price'>
                                <p>{$row['Price']}</p>
                            </div>
                            <h2>{$row['TenBanh']}</h2>
                            <h3>{$row['Description']}</h3>
                            <button class='add-to-cart'>Thêm vào giỏ hàng</button>
                        </div>
                    ";
                }
                ?>
            </div>
        </div>

    </section>

    <!-- Footer và các phần khác của trang web -->

    <?php
    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($conn);
    ?>
</body>
</html>