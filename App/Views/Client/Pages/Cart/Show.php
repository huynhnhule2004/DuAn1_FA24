<?php

namespace App\Views\Client\Pages\Cart;

use App\Views\BaseView;

class Show extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="container mt-5">
            <h3 class="text-center text-primary mb-4">Giỏ hàng của bạn</h3>
            <div id="cart-container">
                <!-- Nội dung giỏ hàng sẽ được JS xử lý -->
            </div>
        </div>

        <script>
            // Hàm lấy cookie
            function getCookie(name) {
                let cookieArr = document.cookie.split("; ");
                for (let cookie of cookieArr) {
                    let [key, value] = cookie.split("=");
                    if (key === name) {
                        return decodeURIComponent(value);
                    }
                }
                return null;
            }

            // Hàm render giỏ hàng
            function renderCart() {
                const cartData = getCookie("cart");
                const cartContainer = document.getElementById("cart-container");

                // Kiểm tra nếu giỏ hàng rỗng
                if (!cartData || JSON.parse(cartData).length === 0) {
                    cartContainer.innerHTML = `
                        <h3 class="text-center text-danger mt-3 mb-5">Giỏ hàng trống!</h3>
                        <p class="text-center">
                            Click <a href="/">vào đây</a> để quay lại trang chủ
                        </p>
                    `;
                    return;
                }

                const cart = JSON.parse(cartData);
                let totalPrice = 0;

                let cartHTML = `
                    <table class="table align-middle text-center mt-5">
                        <thead class="bg-light">
                            <tr>
                                <th>Ảnh</th>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                `;

                // Render từng sản phẩm
                cart.forEach(entry => {
                    if (entry.buy && typeof entry.buy === 'object') {
                        Object.values(entry.buy).forEach(item => {
                            const unitPrice = item.price_default;
                            const subTotal = unitPrice * item.qty;
                            totalPrice += subTotal;

                            const variantKey = item.variant_options.map(v => v.sku).join('-');
                            const variantHTML = item.variant_options.map(variant => `${variant.name}`).join(", ");

                            cartHTML += `
                <tr>
                    <td><img src="${item.image}" class="img-thumbnail" style="width: 80px;" alt="Ảnh sản phẩm"></td>
                    <td>
                        <a href="/products/${item.id}" class="text-dark text-decoration-none fw-bold">${item.product_name}</a>
                        <div class="text-muted">${variantHTML}</div>
                    </td>
                    <td>${new Intl.NumberFormat().format(unitPrice)} đ</td>
                    <td>
                        <input type="number" class="form-control text-center" value="${item.qty}" min="1" max="10" onchange="updateCart('${item.id}', '${variantKey}', this.value)">
                    </td>
                    <td>${new Intl.NumberFormat().format(subTotal)} đ</td>
                    <td>
                        <button class="btn btn-outline-danger btn-sm" onclick="removeFromCart('${item.id}', '${variantKey}')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
                        });
                    }
                });
                cartHTML += `
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between mt-4">
                        <div>
                            <a href="/products" class="btn btn-outline-secondary">
                                <i class="fa-solid fa-shopping-cart me-2"></i> Mua tiếp
                            </a>
                            <button class="btn btn-danger" onclick="clearCart()">
                                <i class="fa-solid fa-trash me-2"></i> Xóa giỏ hàng
                            </button>
                        </div>
                        <div>
                            <p class="fw-bold fs-5">Tổng giá: <span class="text-primary fw-bold fs-5">${new Intl.NumberFormat().format(totalPrice)} đ</span></p>
                            <a href="/checkout" class="btn btn-primary">
                                <i class="fa-solid fa-credit-card me-2"></i> Thanh toán
                            </a>
                        </div>
                    </div>
                `;

                cartContainer.innerHTML = cartHTML;
            }

            // Hàm cập nhật giỏ hàng
            function updateCart(productId, variantKey, qty) {
                const cartData = JSON.parse(getCookie("cart")) || [];
                cartData.forEach(entry => {
                    if (entry.buy[productId] && entry.buy[productId].variantKey === variantKey) {
                        entry.buy[productId].qty = parseInt(qty);
                        entry.buy[productId].sub_total =
                            (entry.buy[productId].price_default - (entry.buy[productId].discount_price || 0)) * qty;
                    }
                });
                document.cookie = `cart=${encodeURIComponent(JSON.stringify(cartData))}; path=/`;
                renderCart();
            }

            // Hàm xóa sản phẩm khỏi giỏ hàng
            function removeFromCart(productId, variantKey) {
                let cartData = JSON.parse(getCookie("cart")) || [];

                // Tìm và xóa đúng variant bằng cách sử dụng productId và variantKey
                cartData = cartData.map(entry => {
                    if (entry.buy[productId] && entry.buy[productId].variantKey === variantKey) {
                        delete entry.buy[productId]; // Xóa đúng variant
                    }
                    return entry;
                }).filter(entry => Object.keys(entry.buy).length > 0); // Xóa entry nếu không còn sản phẩm

                document.cookie = `cart=${encodeURIComponent(JSON.stringify(cartData))}; path=/`;
                renderCart();
            }

            // Hàm xóa toàn bộ giỏ hàng
            function clearCart() {
                document.cookie = "cart=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
                renderCart();
            }

            // Render giỏ hàng khi tải trang
            document.addEventListener("DOMContentLoaded", renderCart);
        </script>
<?php
    }
}
?>