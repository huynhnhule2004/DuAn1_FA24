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

            .form-control:focus,
            .form-select:focus {
                border-color: #41403E;
                box-shadow: none !important;
            }
        </style>

        <?php
        // Lấy dữ liệu từ cookie
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : ['info' => ['number_order' => 0, 'total' => 0]];
        $user = isset($_COOKIE['user']) ? json_decode($_COOKIE['user'], true) : [];
//         echo "<pre>";
// var_dump($cart);
// exit;
        // Kiểm tra nếu có dữ liệu trong mảng 'buy'
        if (isset($cart) && !empty($cart)) {
            
        ?>

            <!-- Giao diện Thanh Toán -->
            <h1 class="text-center my-3" style="color: var(--bs-primary)">Thanh toán</h1>
            <div class="container p-5 rounded" style="background-color: #F9F3EC;">
                <form action="/orders" method="POST">
                    <div class="row">
                        <!-- Thông tin người mua -->
                        <div class="col-md-6 left-panel">
                            <h3>Thông Tin Người Mua</h3>
                            <input type="hidden" name="method" id="" value="POST">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Họ và Tên</label>
                                <input type="hidden" class="form-control" name="user_id" value="<?= $user['id'] ?>">
                                <input type="text" class="form-control" id="fullName" value="<?= $user['first_name'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số Điện Thoại</label>
                                <input type="tel" class="form-control" name="phone_number" id="phone" required>
                            </div>
                            <h3>Địa Chỉ Giao Hàng</h3>
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
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="address" required>
                                <input type="hidden" name="address" id="hiddenAddress">
                            </div>
                            <h3>Phương Thức Thanh Toán</h3>
                            <div class="mb-3">
                                <label class="form-label">Chọn Phương Thức Thanh Toán</label>
                                <select class="form-select" id="paymentMethod" required name="payment_method">
                                    <option value="">Chọn phương thức</option>
                                    <option value="COD">Thanh toán khi nhận hàng</option>
                                    <option value="Online payment">Thanh toán MOMO</option>
                                    <option value="VNPAY">Thanh toán VNPAY</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="status" value="Pending">
                        <input type="hidden" name="payment_status" value="Unpaid">
                       
                        


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
                                    <?php
                                   $totalPrice = 0; // Khởi tạo biến tổng giá trị

                                   // Lặp qua các sản phẩm trong mảng 'buy'
                                   foreach ($cart as $order) {
                                       foreach ($order['buy'] as $product) {
                                           $product_name = $product['product_name'];
                                           $product_combo = $product['variant_options'][0]['product_variant_option_combination_id'];
                                           $qty = $product['qty'];
                                           $price_default = (float) $product['price_default']; // Chuyển đổi giá thành số
                                           $productTotal = $qty * $price_default; // Tính tổng giá trị của sản phẩm
                                           
                                           $totalPrice += $productTotal; // Cộng vào tổng giá trị của đơn hàng
                                           
                                           // Định dạng lại giá trị để hiển thị
                                           $formattedPrice = number_format($price_default, 0, ',', '.') . ' VNĐ';
                                           $formattedTotal = number_format($productTotal, 0, ',', '.') . ' VNĐ';
                                           
                                           // In ra thông tin sản phẩm
                                           echo "<tr>
                                               <td>$product_name</td>
                                               <td>$qty</td>
                                               <td>$formattedPrice</td>
                                               <td>$formattedTotal</td>
                                                <td><input type='hidden' name='qty[]' value='$qty'></td>
                                               <td><input type='hidden' name='product_combo[]' value='$product_combo '></td>
                                               <td><input type='hidden' name='price[]' value='$price_default '></td>
                                           </tr>";
                                       }
                                   }

                                    // Hiển thị tổng cộng
                                    $total_order = number_format($totalPrice, 0, ',', '.') . ' VNĐ';
                                    // $total_price_payment = number_format($cart['info']['total'], 0, ',', '.');
                                    $total_price_payment = number_format($totalPrice, 0, '', ''); // Không có dấu phân cách
                                    // echo $total_price_payment;

                                    echo "<input type='hidden' name='total_price_payment' value=' $total_price_payment '>";
                                    
                                    echo "<tr>
                                <td class='text-start fw-bold'>Tổng Cộng</td>
                                <td colspan='3'>$total_order</td>
                            </tr>";
                                    ?>
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-primary" name="redirect" id="redirect">Xác Nhận Thanh Toán</button>
                        </div>
                </form>

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

                function updateHiddenAddress() {
                    // Lấy giá trị từ các trường
                    const addressDetail = $("#address").val(); // Địa chỉ chi tiết do người dùng nhập
                    const tinh = $("#tinh option:selected").text();
                    const quan = $("#quan option:selected").text();
                    const phuong = $("#phuong option:selected").text();

                    // Kiểm tra giá trị và ghép địa chỉ
                    const fullAddress = `${addressDetail} ${tinh !== "Tỉnh Thành" ? tinh : ""} ${quan !== "Quận Huyện" ? quan : ""} ${phuong !== "Phường Xã" ? phuong : ""}`;

                    // Cập nhật vào ô input ẩn
                    $("#hiddenAddress").val(fullAddress.trim());
                }

                // Gọi hàm này khi người dùng thay đổi hoặc nhập vào bất kỳ trường nào
                $("#tinh, #quan, #phuong, #address").on("change keyup", function() {
                    updateHiddenAddress();
                });
            </script>
<?php
        }
    }
}
