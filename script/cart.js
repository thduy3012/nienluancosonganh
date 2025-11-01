$(document).ready(function() {
    var totalPrice = 0;

    for (var i = 1; i <= sessionStorage.length; i++) {
        var key = sessionStorage.key(i);
        if (key.indexOf('cartProduct_') !== -1) {
            var productInfo = JSON.parse(sessionStorage.getItem(key));
            totalPrice += parseFloat(productInfo.price);
            $('#cart').append(`
                <div class="product">
                    <p>${productInfo.name}</p>
                    <p>${productInfo.price}</p>
                    <button class="remove-from-cart" data-product-id="${productInfo.id}">Xóa</button>
                </div>
            `);
        }
    }

    $('#cart').append(`<p>Tổng hóa đơn: ${totalPrice}</p>`);

    $('.remove-from-cart').click(function() {
        var productId = $(this).data('product-id');
        for (var i = 1; i <= sessionStorage.length; i++) {
            var key = sessionStorage.key(i);
            if (key.indexOf('cartProduct_') !== -1) {
                var productInfo = JSON.parse(sessionStorage.getItem(key));
                if (productInfo.id == productId) {
                    sessionStorage.removeItem(key);
                    break;
                }
            }
        }
        location.reload();
    });
});


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
                    <p>${productInfo.name}</p>
                    <p>${productInfo.price}</p>
                    <input type="number" class="quantity" value="1" min="1">
                    <button class="remove-from-cart" data-product-id="${productInfo.id}">Xóa</button>
                </div>
            `);
        }
    }

    // Hiển thị tổng hóa đơn
    $('#cart').append(`<p class="total">Tổng hóa đơn: ${totalPrice}</p>`);

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
