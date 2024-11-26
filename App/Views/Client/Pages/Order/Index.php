<?php

namespace App\Views\Client\Pages\Order;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {

?>


        <section class="h-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-10 col-xl-8">
                        <div class="card" style="border-radius: 10px;">
                            <div class="card-header px-4 py-5">
                                <h5 class="text-muted mb-0">Cảm Ơn Bạn Đã Đặt Hàng!</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="lead fw-normal mb-0 text-primary fw-bold">Chi Tiết Đơn Hàng</p>
                                    <p class="small text-muted mb-0">Mã Đơn Hàng: <?= htmlspecialchars($data['order_id']) ?></p>
                                </div>
                                <?php if (!empty($data['orders'])): ?>
                                    <?php foreach ($data['orders'] as $item): ?>
                                        <div class="card shadow-0 border mb-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="<?= APP_URL ?>/public/assets/client/images/<?= htmlspecialchars($item['image']) ?>"
                                                            class="img-fluid rounded-3" alt="<?= htmlspecialchars($item['name']) ?>">
                                                    </div>
                                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                        <p class="text-muted mb-0"><?= htmlspecialchars($item['name']) ?></p>
                                                    </div>
                                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                        <p class="text-muted mb-0 small">Size: <?= htmlspecialchars($item['size']) ?></p>
                                                    </div>
                                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                        <p class="text-muted mb-0 small">Số lượng: <?= htmlspecialchars($item['quantity']) ?></p>
                                                    </div>
                                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                        <p class="text-muted mb-0 small">Giá: <?= number_format($item['price'], 0, ',', '.') ?> VNĐ</p>
                                                    </div>
                                                </div>
                                                <hr class="mt-4" style="background-color: #e0e0e0; opacity: 1;">
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-center">Không có sản phẩm trong đơn hàng này.</p>
                                <?php endif; ?>
                                <div class="container">
                                    <div class="card-header px-4 py-5">
                                        <p class="fw-bold mb-0">Chi tiết đơn hàng</p>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-6">
                                            <p class="text-muted mb-0">
                                                Phương thức thanh toán: <?= htmlspecialchars($data['payment_method']) === 'Online payment' ? 'Chuyển khoản' : 'COD' ?>
                                            </p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="text-muted mb-0">
                                                <span class="fw-bold me-2">Tổng:</span> <?= number_format($data['total_amount'], 0, ',', '.') ?> VNĐ
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-6">
                                            <p class="text-muted mb-0">Mã đơn hàng: <?= htmlspecialchars($data['order_id']) ?></p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="text-muted mb-0">
                                                <span class="fw-bold me-2">Phí vận chuyển:</span> <?= number_format($data['shipping_fee'], 0, ',', '.') ?> VNĐ
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 px-4 py-4 bg-primary rounded-3 mt-3">
                                    <h5 class="d-flex align-items-center justify-content-end text-white mb-0 fs-4">
                                        Tổng Số Tiền Thanh Toán:
                                        <span class="h3 mb-0 ms-2"><?= number_format($data['total_amount'] + $data['shipping_fee'], 0, ',', '.') ?> VNĐ</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (isset($data['payment_method'])): ?>
                    <?php if ($data['payment_method'] === 'Online payment'): ?>
                        <?php if (isset($data['qrImage']) && $data['qrImage']): ?>
                            <div class="qr-code text-center mb-4">
                                <h3>Quét mã để thanh toán</h3>
                                <img src="<?= htmlspecialchars($data['qrImage']); ?>" alt="QR Code" class="img-fluid" />
                            </div>
                        <?php elseif (isset($data['errorMessage']) && $data['errorMessage']): ?>
                            <p class="text-center text-danger"><?= htmlspecialchars($data['errorMessage']) ?></p>
                        <?php endif; ?>
                    <?php elseif ($data['payment_method'] === 'COD'): ?>
                        <div class="text-center mb-4">
                            <p class="fw-bold ">Bạn đã chọn phương thức thanh toán COD. Đơn hàng của bạn sẽ được giao hàng và thanh toán khi nhận hàng.</p>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <p class="text-center text-danger">Không xác định được phương thức thanh toán.</p>
                <?php endif; ?>
            </div>
        </section>
<?php
    }
}
