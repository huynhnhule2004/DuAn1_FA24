<?php

namespace App\Views\Client\Pages\Wishlist;

use App\Views\BaseView;

class Wishlist extends BaseView
{
    public static function render($data = null)
    {
?>
        <section class="h-100 h-custom">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="h2">Mục Yêu Thích</th>
                                        <th scope="col" class="text-center">Định dạng</th>
                                        <th scope="col" class="text-center">Số lượng</th>
                                        <th scope="col" class="text-center">Giá</th>
                                        <th scope="col" class="text-center">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $item): ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center">
                                                    <img src="<?= $item['image'] ?>" class="img-fluid rounded-3" style="width: 120px;" alt="<?= $item['name'] ?>">
                                                    <div class="flex-column ms-4">
                                                        <p class="mb-2"><?= $item['name'] ?></p>
                                                        <p class="mb-0"><?= $item['weight'] ?></p>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="align-middle text-center" data-label="Định dạng">
                                                <p class="mb-0" style="font-weight: 500;"><?= $item['format'] ?></p>
                                            </td>
                                            <td class="align-middle text-center" data-label="Số lượng">
                                                <p class="mb-0"><?= $item['quantity'] ?></p>
                                            </td>
                                            <td class="align-middle text-center" data-label="Giá">
                                                <p class="mb-0" style="font-weight: 500;">$<?= number_format($item['price'], 2) ?></p>
                                            </td>
                                            <td class="align-middle text-center" data-label="Thao tác">
                                                <button class="btn btn" onclick="removeItem(this)">Xóa</button>
                                                <button class="btn btn" onclick="moveToCart(this)">Thêm vào Giỏ</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-lg-4 col-xl-3 ms-auto">
                                        <div class="d-flex justify-content-between" style="font-weight: 500;">
                                            <p class="mb-2">Tổng cộng</p>
                                            <p class="mb-2">$<?= number_format(array_sum(array_column($data, 'price')), 2) ?></p>
                                        </div>
                                        <br>
                                        <div class="d-flex justify-content-center">
                                            <a href="/cart" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg text-nowrap">
                                                Thêm vào giỏ hàng
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

<?php
    }
}
?>