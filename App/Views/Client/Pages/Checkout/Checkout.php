<?php

namespace App\Views\Client\Pages\Checkout;

use App\Views\BaseView;

class Checkout extends BaseView
{
    public static function render($data = null)
    {
        ?>
        <style>
            @media (max-width: 576px) {

                .summary-table th,
                .summary-table td {
                    font-size: 14px;
                    padding: 8px;
                }

                .summary-table .product-info {
                    display: block;
                    text-align: left;
                }

                .summary-table .quantity-price {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 5px;
                }

                .left-panel,
                .right-panel {
                    padding: 0 15px;
                }
            }
        </style>

        <!-- Code HTML hiển thị giao diện  -->
        <h1 class="text-center my-3" style="color: var(--bs-primary)">Thanh toán</h1>
        <div class="container p-5 rounded" style="background-color: #F9F3EC;">
            <div class="row">
                <div class="col-md-6 left-panel">
                    <h3>Thông Tin Người Mua</h3>
                    <form>
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Họ và Tên</label>
                            <input type="text" class="form-control" id="fullName" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số Điện Thoại</label>
                            <input type="tel" class="form-control" id="phone" required>
                        </div>

                        <h3>Địa Chỉ Giao Hàng</h3>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa Chỉ</label>
                            <input type="text" class="form-control" id="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">Thành Phố</label>
                            <input type="text" class="form-control" id="city" required>
                        </div>
                        <div class="mb-3">
                            <label for="postalCode" class="form-label">Mã Bưu Điện</label>
                            <input type="text" class="form-control" id="postalCode" required>
                        </div>
                        <h3>Phương Thức Thanh Toán</h3>
                        <div class="mb-3">
                            <label class="form-label">Chọn Phương Thức Thanh Toán</label>
                            <select class="form-select" id="paymentMethod" required>
                                <option value="">Chọn phương thức</option>
                                <option value="creditCard">Thẻ Tín Dụng</option>
                                <option value="paypal">PayPal</option>
                                <option value="bankTransfer">Chuyển Khoản Ngân Hàng</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="col-md-6 right-panel">


                    <h3>Tóm Tắt Đơn Hàng</h3>
                    <table class="table summary-table">
                        <thead>
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Đơn Giá</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sản phẩm 1</td>
                                <td>1</td>
                                <td>200,000 VNĐ</td>
                                <td>200,000 VNĐ</td>
                            </tr>
                            <tr>
                                <td>Sản phẩm 2</td>
                                <td>2</td>
                                <td>150,000 VNĐ</td>
                                <td>300,000 VNĐ</td>
                            </tr>
                            <tr>
                                <td class="text-start fw-bold">Tổng Cộng</td>
                                <td>500,000 VNĐ</td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-primary">Xác Nhận Thanh Toán</button>
                </div>
            </div>
        </div>


        <?php

    }
}