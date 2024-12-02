<?php

namespace App\Views\Admin\Pages\Order;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null, $currentPage = 1, $itemsPerPage = 10, $totalItems = 0)
    {
        $totalPages = ceil($totalItems / $itemsPerPage);

?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ ĐƠN HÀNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách đơn hàng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Danh sách đơn hàng</h5>
                                <?php
                                if (count($data)) :
                                ?>
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Khách hàng</th>
                                                    <th>Tổng giá</th>
                                                    <th>Trạng thái</th>
                                                    <th>Phương thức thanh toán</th>
                                                    <th>Trạng thái thanh toán</th>
                                                    <th>Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($data as $item) :
                                                ?>
                                                    <tr>
                                                        <td><?= $item['id'] ?></td>
                                                        <td><?= $item['first_name'] ?></td>
                                                        <td><?= number_format($item['total_price']) ?></td>
                                                        <td>
                                                            <?php
                                                            switch ($item['status']) {
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
                                                        <td>
                                                            <?= ($item['payment_method'] === 'COD') ? 'Thanh toán khi nhận hàng' : 'Thanh toán trực tuyến' ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            switch ($item['payment_status']) {
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
                                                        <td>
                                                            <a href="/admin/orders/<?= $item['id'] ?>" class="btn btn-primary text-white" style="width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center; font-size: 16px; padding: 0;">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="/admin/orders/<?= $item['id'] ?>" method="post" style="display: inline-block; width: 40px; height: 40px; margin-top: 2px; " onsubmit="return confirm('Chắc chưa?')">
                                                                <input type="hidden" name="method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger text-white" style="width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center; font-size: 16px; padding: 0;">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Pagination -->
                                    <?php if ($totalPages > 1) : ?>
                                        <div class="pagination">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination justify-content-center">
                                                    <?php if ($currentPage > 1) : ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="?page=<?= $currentPage - 1 ?>" aria-label="Previous">
                                                                <span aria-hidden="true">&laquo;</span>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                                        <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                                                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                                        </li>
                                                    <?php endfor; ?>

                                                    <?php if ($currentPage < $totalPages) : ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="?page=<?= $currentPage + 1 ?>" aria-label="Next">
                                                                <span aria-hidden="true">&raquo;</span>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </nav>
                                        </div>
                                    <?php endif; ?>
                                <?php
                                else :
                                ?>
                                    <h4 class="text-center text-danger">Không có dữ liệu</h4>
                                <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
