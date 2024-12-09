<?php

namespace App\Views\Admin\Pages\Order;

use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($order = null, $orderDetails = null)
    {
?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Chi tiết đơn hàng</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="/admin/orders">Danh sách đơn hàng</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Thông tin đơn hàng</h5>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Mã đơn hàng:</th>
                                            <td><?= $order['id'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tên khách hàng:</th>
                                            <td><?= $order['last_name'] . ' ' . $order['first_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tổng giá:</th>
                                            <td><?= number_format($order['total_price']) ?> VND</td>
                                        </tr>
                                        <tr>
                                            <th>Ngày tạo:</th>
                                            <td><?= date("d/m/Y", strtotime($order['created_at'])) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ngày cập nhật:</th>
                                            <td><?= date("d/m/Y", strtotime($order['updated_at'])) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Trạng thái:</th>
                                            <td>
                                                <?php
                                                switch ($order['status']) {
                                                    case 'Pending':
                                                        echo 'Đang chờ xử lý';
                                                        break;
                                                    case 'Shipped':
                                                        echo 'Đang giao';
                                                        break;
                                                    case 'Delivered':
                                                        echo 'Đã giao hàng';
                                                        break;
                                                    case 'Cancelled':
                                                        echo 'Đã hủy';
                                                        break;
                                                    default:
                                                        echo 'Không xác định';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Số điện thoại:</th>
                                            <td><?= $order['phone_number'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Địa chỉ giao hàng:</th>
                                            <td><?= $order['shipping_address'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Phương thức thanh toán:</th>
                                            <td>
                                                <?= ($order['payment_method'] === 'COD') ? 'Thanh toán khi nhận hàng' : 'Thanh toán trực tuyến' ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Trạng thái thanh toán:</th>
                                            <td>
                                                <?php
                                                switch ($order['payment_status']) {
                                                    case 'Paid':
                                                        echo 'Đã thanh toán';
                                                        break;
                                                    case 'Unpaid':
                                                        echo 'Chưa thanh toán';
                                                        break;
                                                    case 'Refunded':
                                                        echo 'Đã hoàn tiền';
                                                        break;
                                                    default:
                                                        echo 'Không xác định';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Chi tiết sản phẩm</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Hình ảnh</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $index = 1;
                                            foreach ($orderDetails as $item): ?>
                                                <tr>
                                                    <td><?= $index++ ?></td>
                                                    <td>
                                                        <img src="<?= APP_URL ?>/public/uploads/products/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" width="100px">
                                                    </td>
                                                    <td><?= $item['product_name'] ?></td>
                                                    <td><?= $item['quantity'] ?></td>
                                                    <td><?= number_format($item['price']) ?> VND</td>
                                                    <td><?= number_format($item['quantity'] * $item['price']) ?> VND</td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
