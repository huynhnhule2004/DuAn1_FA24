<?php

namespace App\Views\Client\Pages\Order;

use App\Views\BaseView;

class History extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="container mt-5 mb-5" >
            <h2 class="mb-4">Lịch Sử Mua Hàng</h2>
            <?php if (!empty($data['orders']) && is_array($data['orders'])) { ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mã Đơn Hàng</th>
                            <th>Ngày Đặt Hàng</th>
                            <th>Phương thức thanh toán</th>
                            <th>Trạng Thái Thanh Toán</th>
                            <th>Tổng Tiền</th>
                            <th>Chi Tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['orders'] as $order) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['id']); ?></td>
                                <td><?php echo htmlspecialchars(date("d/m/Y", strtotime($order['created_at']))); ?></td>
                                <td>
                                    <?php
                                    $status = $order['payment_method'];
                                    $statusClass = '';
                                    $statusText = '';

                                    switch ($status) {
                                        case 'COD':
                                            $statusText = 'Thanh toán khi nhận hàng';
                                            break;
                                        case 'Online payment':
                                            $statusText = 'Thanh toán bằng MOMO';
                                            break;
                                        case 'VNPAY':
                                            $statusText = 'Thanh toán bằng VNPAY';
                                            break;
                                        default:
                                            $statusClass = 'text-muted';
                                            $statusText = 'Không xác định';
                                    }

                                    echo "<span class=\"$statusClass\">" . htmlspecialchars($statusText) . "</span>";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $status = $order['payment_status'];
                                    $statusClass = '';
                                    $statusText = '';

                                    switch ($status) {
                                        case 'Paid':
                                            $statusText = 'Đã thanh toán';
                                            break;
                                        case 'Unpaid':
                                            $statusText = 'Chưa thanh toán';
                                            break;
                                        case 'Refunded':
                                            $statusText = 'Đã hoàn tiền';
                                            break;
                                        default:
                                            $statusClass = 'text-muted';
                                            $statusText = 'Không xác định';
                                    }

                                    echo "<span class=\"$statusClass\">" . htmlspecialchars($statusText) . "</span>";
                                    ?>
                                </td>
                                <td><?php echo number_format($order['total_price'], 0, ',', '.'); ?> VNĐ</td>
                                <td>
                                    <a href="/orders/<?php echo htmlspecialchars($order['id']); ?>" class="btn btn-primary btn-sm" style="padding: 10px">
                                        Xem Chi Tiết
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-info">
                    Bạn chưa có đơn hàng nào.
                </div>
            <?php } ?>
        </div>
<?php
    }
}
