<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="style/cart.css"> <!-- Đường dẫn đến file CSS cho trang giỏ hàng -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="style/cartPage.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap');

    /* Reset CSS */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    /* Global Styles */
    body {
        font-family: 'Quicksand', sans-serif;
        line-height: 1.6;
        background-color: rgb(214, 218, 200);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Header Styles */
    header {
        background-color: rgb(156, 175, 170);
        color: rgb(251, 243, 213);
        padding: 20px 0;
        text-align: center;
    }

    .order-info {
        font-size: 40px;
    }

    /* Cart Styles */
    .cart {
        margin-top: 20px;
        padding: 20px;
        background-color: rgb(251, 243, 213);
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgb(239, 188, 155);
        padding: 10px 0;
    }

    .product-name {
        font-weight: bold;
    }

    .product-price {
        color: green;
    }

    .remove-from-cart {
        background-color: rgb(239, 188, 155);
        color: rgb(251, 243, 213);
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 5px;
    }

    .remove-from-cart:hover {
        background-color: rgb(255, 105, 97);
    }

    .total {
        margin-top: 10px;
        font-size: 18px;
        font-weight: bold;
    }

    /* Payment Form Styles */
    .payment-container {
        margin-top: 20px;
        background-color: rgb(214, 218, 200);
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .payment-container h2 {
        margin-bottom: 20px;
        font-size: 24px;
    }

    .input-group {
        margin-bottom: 20px;
    }

    .input-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .input-group input[type="text"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid rgb(156, 175, 170);
    }

    #checkout-btn {
        background-color: rgb(85, 184, 76);
        color: rgb(251, 243, 213);
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    #checkout-btn:hover {
        background-color: rgb(69, 160, 73);
    }

    /* Footer Styles */
    footer {
        background-color: rgb(156, 175, 170);
        color: rgb(251, 243, 213);
        padding: 20px 0;
        text-align: center;
    }

    .thank-you {
        font-size: 40px;
    }

    </style>

</head>
<body>
    <header>
        <!-- Header của trang -->
        <div class="order-info">
            <p>Đây là những sản phẩm bạn đặt:</p>
        </div>
    </header>

    <section class="cart" id="cart">
        <!-- Hiển thị giỏ hàng -->
    </section>

    <div class="payment-container">
        <h2>Thanh toán</h2>
        <form id="checkout-form" action="process_order.php" method="POST">
            <div class="input-group">
                <label for="name">Tên:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="input-group">
                <label for="address">Địa chỉ giao hàng:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <button type="submit" id="checkout-btn">Thanh toán</button>
        </form>

    <footer>
        <!-- Footer của trang -->
        <div class="thank-you">
            <p>Cảm ơn bạn đã ghé qua Betty!</p>
        </div>
    </footer>

    <script>
$(document).ready(function() {
    var totalPrice = 0;

    // Lặp qua các mục đã được lưu trong sessionStorage và hiển thị trong giỏ hàng
    for (var i = 0; i < sessionStorage.length; i++) {
        var key = sessionStorage.key(i);
        if (key.indexOf('cartProduct_') !== -1) {
            var productInfo = JSON.parse(sessionStorage.getItem(key));
            totalPrice += parseFloat(productInfo.price);
            $('#cart').append(`
                <div class="product">
                    <p class="product-name">${productInfo.name}</p>
                    <p class="product-price">${parseFloat(productInfo.price).toFixed(2)}</p>
                    <button class="remove-from-cart" data-product-id="${productInfo.id}">Xóa</button>
                </div>
            `);
        }
    }

    // Hiển thị tổng hóa đơn
    $('#cart').append(`<p class="total">Tổng hóa đơn: ${totalPrice.toFixed(2)}</p>`);

    // Xử lý sự kiện khi nhấn nút "Xóa" cho mỗi sản phẩm trong giỏ hàng
    $('.remove-from-cart').click(function() {
        var productId = $(this).data('product-id');
        for (var i = 0; i < sessionStorage.length; i++) {
            var key = sessionStorage.key(i);
            if (key.indexOf('cartProduct_') !== -1) {
                var productInfo = JSON.parse(sessionStorage.getItem(key));
                if (productInfo.id == productId) {
                    sessionStorage.removeItem(key); // Xóa sản phẩm khỏi sessionStorage
                    break;
                }
            }
        }
        location.reload(); // Tải lại trang để cập nhật giỏ hàng
    });

    // Xử lý sự kiện khi nhấn nút "Thanh toán"
    $('#checkout-btn').click(function() {
        var name = $('#name').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        
        // Kiểm tra thông tin đặt hàng
        if (name && phone && address) {
            // Hiển thị thông báo đặt hàng thành công và xóa giỏ hàng
            alert("Đặt hàng thành công!");
            sessionStorage.clear(); // Xóa tất cả sản phẩm khỏi giỏ hàng
            location.reload(); // Tải lại trang để cập nhật giỏ hàng
        } else {
            alert("Vui lòng điền đầy đủ thông tin thanh toán!");
        }
    });
});
    </script>

    <script src="script/checkout.js"></script>

</body>
</html>
