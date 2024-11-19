<?php

namespace App\Views\Client\Pages\Checkout;

use App\Views\BaseView;

class Checkout extends BaseView
{
    public static function render($data = null)
    {
?>
        <style>
            .css_select_div {
                text-align: center;
                display: flex;
                justify-content: space-between;
            }

            .css_select {
                width: 30%;
                /* Đặt độ rộng cho mỗi select */
                padding: 5px;
                margin: 5px;
                border: solid 1px #686868;
                border-radius: 5px;
            }

            /* Form Styling */
            .form-label {
                color: #333;
            }

            .form-control,
            .form-select {
                border-radius: 5px;
                border: 1px solid #d1d1d1;
                padding: 10px;
            }

            .form-control:focus, .form-select:focus {
                border-color: #41403E;
                box-shadow: none !important;
            }
        </style>

        <!-- Giao diện Thanh Toán -->
        <h1 class="text-center my-3" style="color: var(--bs-primary)">Thanh toán</h1>
        <div class="container p-5 rounded" style="background-color: #F9F3EC;">
            <div class="row">
                <!-- Thông tin người mua -->
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

                        <!-- Chọn Tỉnh Thành, Quận Huyện và Phường Xã -->
                        <div class="css_select_div mb-3">
                            <select class="css_select" id="tinh" name="tinh" title="Chọn Tỉnh Thành">
                                <option value="0">Tỉnh Thành</option>
                            </select>

                            <select class="css_select" id="quan" name="quan" title="Chọn Quận Huyện">
                                <option value="0">Quận Huyện</option>
                            </select>

                            <select class="css_select" id="phuong" name="phuong" title="Chọn Phường Xã">
                                <option value="0">Phường Xã</option>
                            </select>
                        </div>

                        <h3>Phương Thức Thanh Toán</h3>
                        <div class="mb-3">
                            <label class="form-label">Chọn Phương Thức Thanh Toán</label>
                            <select class="form-select" id="paymentMethod" required>
                                <option value="">Chọn phương thức</option>
                                <option value="COD">Thanh toán khi nhận hàng</option>
                                <option value="online_payment">Thanh toán trực tuyến</option>
                            </select>
                        </div>
                    </form>
                </div>

                <!-- Tóm Tắt Đơn Hàng -->
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

                    <a href="/orders" class="btn btn-primary">Xác Nhận Thanh Toán</a>
                </div>
            </div>
        </div>

        <script src="https://esgoo.net/scripts/jquery.js"></script>
        <script>
            $(document).ready(function() {
                // Lấy tỉnh thành
                $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm', function(data_tinh) {
                    if (data_tinh.error == 0) {
                        $.each(data_tinh.data, function(key_tinh, val_tinh) {
                            $("#tinh").append('<option value="' + val_tinh.id + '">' + val_tinh.full_name + '</option>');
                        });

                        $("#tinh").change(function(e) {
                            var idtinh = $(this).val();
                            // Lấy quận huyện
                            $.getJSON('https://esgoo.net/api-tinhthanh/2/' + idtinh + '.htm', function(data_quan) {
                                if (data_quan.error == 0) {
                                    $("#quan").html('<option value="0">Quận Huyện</option>');
                                    $("#phuong").html('<option value="0">Phường Xã</option>');
                                    $.each(data_quan.data, function(key_quan, val_quan) {
                                        $("#quan").append('<option value="' + val_quan.id + '">' + val_quan.full_name + '</option>');
                                    });

                                    // Lấy phường xã
                                    $("#quan").change(function(e) {
                                        var idquan = $(this).val();
                                        $.getJSON('https://esgoo.net/api-tinhthanh/3/' + idquan + '.htm', function(data_phuong) {
                                            if (data_phuong.error == 0) {
                                                $("#phuong").html('<option value="0">Phường Xã</option>');
                                                $.each(data_phuong.data, function(key_phuong, val_phuong) {
                                                    $("#phuong").append('<option value="' + val_phuong.id + '">' + val_phuong.full_name + '</option>');
                                                });
                                            }
                                        });
                                    });
                                }
                            });
                        });
                    }
                });
            });
        </script>
<?php
    }
}
?>