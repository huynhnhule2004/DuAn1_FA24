<?php

namespace App\Views\Client\Pages\Cart;

use App\Views\BaseView;

class Show extends BaseView
{
    public static function render($data = null)
    {
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : ['info' => ['number_order' => 0]];
        $number_order = $cart['info']['number_order'] ?? 0;
        $total = 0;

        foreach ($data['list_buy'] as $item) {
            $total += $item['sub_total'];
        }


?>
        <div class="container mt-5">
            <h3 class="text-center text-primary mb-4">Giỏ hàng của bạn</h3>
            <?php if (!empty($data['list_buy']) && is_array($data['list_buy'])) : ?>
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
                        <?php foreach ($data['list_buy'] as $item) : ?>
                            <tr>
                                <td style="width: 100px;">
                                    <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" class="img-thumbnail" alt="" style="width: 80px;">
                                </td>
                                <td>
                                    <a href="/products/<?= $item['id'] ?>" class="text-dark text-decoration-none fw-bold"><?= $item['product_name'] ?></a>
                                    <br>
                                    <?php if (!empty($item['variant_options'])) : ?>
                                        <small>
                                            <?= implode(', ', array_map(function ($variant) {
                                                return $variant['name'];
                                            }, $item['variant_options'])) ?>
                                        </small>
                                    <?php endif; ?>
                                </td>
                                <td class="text-primary fw-semibold"><?= number_format($item['price_default'] - ($item['discount_price'] ?? 0)) ?> đ</td>
                                <td style="width: 100px;">
                                    <input type="number" name="qty[<?= $item['id'] ?>]" value="<?= $item['qty'] ?>" class="form-control text-center" min="1" max="10">
                                </td>
                                <td class="fw-bold"><?= number_format(max(0, ($item['price_default'] - ($item['discount_price'] ?? 0)) * $item['qty'])) ?> đ</td>
                                <td>
                                    <form action="/cart/<?= $item['id'] ?>" method="post" onsubmit="return confirm('Chắc chắn muốn xóa?')">
                                        <input type="hidden" name="method" value="DELETE">
                                        <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="row py-3 border-top">
                                    <!-- Phần bên trái -->
                                    <div class="col-md-6 d-flex flex-column align-items-start mt-3">
                                        <a href="/products" class="btn btn-outline-secondary mb-2 w-30">
                                            <i class="fa-solid fa-shopping-cart me-2"></i> Mua tiếp
                                        </a>
                                        <a href="/cart/deleteAll" class="btn btn-danger w-20" onclick="return confirm('Bạn có chắc chắn muốn xóa giỏ hàng?');">
                                            <i class="fa-solid fa-trash me-2"></i> Xóa giỏ hàng
                                        </a>
                                    </div>

                                    <!-- Phần bên phải -->
                                    <div class="col-md-6 d-flex flex-column align-items-end">
                                        <p class="fw-bold fs-5 mb-2">
                                            Tổng giá:
                                            <span class="text-primary fw-bold fs-5">
                                            <?= number_format($data['cart_info']['total'] ?? 0) ?> đ
                                            </span>
                                        </p>
                                        <a href="/cart/checkout" class="btn btn-primary w-30 mt-1">
                                            <i class="fa-solid fa-credit-card me-2"></i> Thanh toán
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>

                </table>
        </div>
        </div>
    <?php
            else :
    ?>
        <h3 class="text-center text-danger mt-3 mb-5">Giỏ hàng trống! </h3>
        <p class="text-center">Click <a href="/">vào đây</a> để quay lại trang chủ</p>

    <?php
            endif;
    ?>
    </div>
    </div>
    </div>

    </div>
<?php
    }
}
