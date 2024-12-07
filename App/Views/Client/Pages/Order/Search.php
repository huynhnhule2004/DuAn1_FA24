<?php

namespace App\Views\Client\Pages\Order;

use App\Views\BaseView;

class Search extends BaseView
{
    public static function render($data = null,  $currentPage = 1, $itemsPerPage = 10, $totalItems = 0)
    {
        $totalPages = ceil($totalItems / $itemsPerPage);
?>
        <div class="container mt-5 mb-5">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <!-- Tiêu đề Danh sách đơn hàng ở bên trái -->
                <h2 class="mb-4">Lịch Sử Mua Hàng</h2>

                <!-- Form tìm kiếm nằm bên phải -->
                <form action="/orders/history/search" method="GET" class="d-flex">
                    <select class="select2 form-select shadow-none me-2" name="keyword">
                        <option value="" readonly>Chọn trạng thái</option>
                        <option value="Pending" <?= (isset($_GET['keyword']) && $_GET['keyword'] == 'Pending') ? 'selected' : '' ?>>Đang chờ xử lý</option>
                        <option value="Shipped" <?= (isset($_GET['keyword']) && $_GET['keyword'] == 'Shipped') ? 'selected' : '' ?>>Đang giao hàng</option>
                        <option value="Delivered" <?= (isset($_GET['keyword']) && $_GET['keyword'] == 'Delivered') ? 'selected' : '' ?>>Đã giao hàng</option>
                        <option value="Cancelled" <?= (isset($_GET['keyword']) && $_GET['keyword'] == 'Cancelled') ? 'selected' : '' ?>>Đã hủy</option>
                    </select>
                    <button type="submit" class="btn" style="white-space: nowrap; color: white; background-color: #E9B775">Tìm kiếm</button>
                </form>

            </div>
            <?php if (!empty($data) && is_array($data)) { ?>
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
                        <?php foreach ($data as $order) { ?>
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
                                <td>
                                    <?php
                                    $status = $order['status'];
                                    $statusClass = '';
                                    $statusText = '';

                                    switch ($status) {
                                        case 'Pending':
                                            $statusText = 'Đang chờ xử lý';
                                            break;
                                        case 'Shipped':
                                            $statusText = 'Đang giao hàng';
                                            break;
                                        case 'Delivered':
                                            $statusText = 'Đã giao hàng';
                                            break;
                                        case 'Cancelled':
                                            $statusText = 'Đã hủy';
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
                <!-- Pagination -->
                <?php if ($totalPages > 1) : ?>
                    <div class="pagination">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <?php if ($currentPage > 1) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $currentPage - 1 ?>&keyword=<?= urlencode($_GET['keyword']) ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                    <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?>&keyword=<?= urlencode($_GET['keyword']) ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($currentPage < $totalPages) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $currentPage + 1 ?>&keyword=<?= urlencode($_GET['keyword']) ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                <?php endif; ?>
            <?php } else { ?>
                <div class="alert alert-info">
                    Bạn chưa có đơn hàng nào.
                </div>
            <?php } ?>
        </div>
<?php
    }
}
