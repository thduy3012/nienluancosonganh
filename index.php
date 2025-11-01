<?php
include 'config.php';

// Truy vấn cơ sở dữ liệu và lấy dữ liệu
$query = "SELECT * FROM banhnoibat";
$result = mysqli_query($conn, $query);
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
    

    <title>Cakes of Betty</title>
</head>
<body>
    <!-- Header và phần khác ở đây -->
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
            <span  class="cart-icon">&#128722;</span> <!-- Unicode của biểu tượng giỏ hàng -->
            <span class="cart-count">0</span> <!-- Số lượng sản phẩm trong giỏ hàng -->
            
        </div>
        <div id="menu"><i class="fas fa-bars"></i></div>
    </header>

<!-----------------------------HOME------------------------------------->
<section id="home" class="home">
    <h1>Bánh Ngon Tới Nhà</h1>
    <p>Thơm Ngon Tròn Vị</p>
    <div class="home-btn">
    <a href="products.php" class="active"><button>Mua Ăn Đi<i class="fas fa-angle-right"></i></button></a>
    </div>
 </section>
<!----------------------------ABOUT-------------------------------------->
<section id="about" class="about">
    <div class="about-content">
        <h2>Câu chuyện từ Betty</h2>
        <p>Những chiếc bánh được chọn từ những nhà cung cấp mà Betty đã tìm hiểu kĩ lưỡng.<br>
           Bạn có thể chọn lựa những chiếc bánh mà bạn thật sự bị cuốn hút.<br>
            Hãy thử những hương vị tuyệt vời mà chúng mang lại.<br>
            Chúc bạn ngon miệng với những chiếc bánh từ Betty.</p>
        <button class="btn">Đọc thêm đi nè!<i class="fas fa-angle-right"></i></button>
    </div>
    <div class="image">
        <img src="img/cake_aboutus.png" alt="img">
    </div>
</section>

    <!-- Hiển thị dữ liệu từ cơ sở dữ liệu -->
    <section class="product" id="product">
        <h1 class="title">Những sản phẩm <span>phổ biến</span></h1>
        <div class="cake-product">
            <div class="inner-cake-row">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="inner-cake-col">';
                    echo '<img src="' . $row['image'] . '" alt="">';
                    echo '<div class="cake-price">';
                    echo '<p>' . $row['price'] . '</p>';
                    echo '</div>';
                    echo '<div class="cake-star">';
                    for ($i = 1; $i <= $row['rating']; $i++) {
                        echo '<i class="fa fa-star" aria-hidden="true"></i>';
                    }
                    echo '</div>';
                    echo '<h2>' . $row['name'] . '</h2>';
                    echo '<h3>' . $row['description'] . '</h3>';
                    echo '<p></p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Footer và phần khác ở đây -->
<!------------------------contact us--------------->
<footer class="contact" id="contact">
    <div class="cake-contact">
        <div class="cake-contact-row">
            <div class="cake-contact-col">
                <img src="img/cakes.avif" alt="img" class="images">
            </div>
            <div class="cake-contact-col">
                <h1>Liên hệ chúng tôi</h1>
                <div class="social">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest"></i>
                </div>
                <p>Số 13, Đường Cornelia, Quận 1989, Thành Phố New York<br>123-456-7890</p>
                <p>Chúng tôi muốn nghe từ bạn, viết cho chúng tôi:</p>
                <form id="formdetails" method="get">
                <input type="text" name="name" id="name" placeholder="Vui lòng nhập tên của bạn" required>
                <input type="text" name="email" id="email" placeholder="Vui lòng nhập E-mail của bạn" required>
                <input type="text" name="mobile" id="mobile" placeholder="Vui lòng nhập số điện thoại" required>
                <textarea row="8" col="10" name="msg" placeholder="Cho chúng tôi một vài ý kiến"></textarea>
                <button class="btn">Gửi đi nào<i class="fas fa-angle-right"></i></button>
                </form>
            </div>
       </div>
            <!-- <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d59017.853243965386!2d72.74254603725106!3d22.405835692956025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1scake%20shop!5e0!3m2!1sen!2sin!4v1628243773361!5m2!1sen!2sin" 
                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div> -->
        </div>
</footer>
        
    <?php mysqli_close($conn); ?>
</body>
</html>
