// Lắng nghe sự thay đổi số lượng
// Khi người dùng thay đổi số lượng
document.querySelectorAll('input[name^="qty["]').forEach(input => {
    input.addEventListener('input', function () {
        // Lấy giá trị của số lượng
        let qty = parseInt(this.value);
        let row = this.closest('tr'); // Tìm dòng chứa ô input này

        if (isNaN(qty) || qty < 1) {
            qty = 1; // Đảm bảo rằng số lượng ít nhất là 1
        }

        // Tính lại thành tiền
        let priceDefault = parseInt(row.querySelector('.price_default').dataset.price); // Lấy giá trị đơn giá từ dữ liệu
        let discountPrice = parseInt(row.querySelector('.discount_price').dataset.discount || 0); // Lấy giá trị khuyến mãi (nếu có)
        let subTotal = (priceDefault - discountPrice) * qty; // Tính thành tiền mới

        // Cập nhật lại giá trị thành tiền
        row.querySelector('.total_price').textContent = new Intl.NumberFormat('vi-VN').format(subTotal) + " đ";

        // Tính lại tổng giỏ hàng
        let total = 0;
        document.querySelectorAll('.total_price').forEach(totalCell => {
            total += parseInt(totalCell.textContent.replace(' đ', '').replace(',', ''));
        });

        // Cập nhật lại tổng giá trị giỏ hàng
        document.querySelector('.total-cart').textContent = new Intl.NumberFormat('vi-VN').format(total) + " đ";
    });
});

// Hàm tính lại tổng giỏ hàng
function updateTotalCart() {
    let total = 0;
    document.querySelectorAll('.fw-bold').forEach(cell => {
        total += parseInt(cell.textContent.replace('đ', '').replace(',', '').trim(), 10);
    });

    const totalPrice = document.querySelector('.text-primary.fw-bold.fs-5');
    totalPrice.textContent = total.toLocaleString() + ' đ';
}

// Hàm gửi yêu cầu AJAX để cập nhật số lượng sản phẩm
function updateCartQuantity(productId, quantity) {
    const formData = new FormData();
    formData.append('id', productId);
    formData.append('qty', quantity);

    fetch('/cart/update', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Giỏ hàng đã được cập nhật');
            // Cập nhật lại tổng giỏ hàng
            updateTotalCart();
        } else {
            console.log('Lỗi: ' + data.message);
            // Xử lý nếu có lỗi
        }
    })
    .catch(error => {
        console.error('Có lỗi khi cập nhật giỏ hàng:', error);
    });
}

// Cập nhật tổng giỏ hàng từ server
function updateCartSummary(cartInfo) {
    const totalPrice = document.querySelector('.text-primary.fw-bold.fs-5');
    totalPrice.textContent = cartInfo.total.toLocaleString() + ' đ'; // Cập nhật tổng giá trị
    // Bạn có thể cập nhật thêm thông tin khác nếu cần
}
