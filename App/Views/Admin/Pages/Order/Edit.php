<?php

namespace App\Views\Admin\Pages\Order;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
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
                                    <li class="breadcrumb-item active" aria-current="page">Cập nhật đơn hàng</li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="/admin/orders/<?= $data['id'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Cập nhật đơn hàng</h4>
                                    <input type="hidden" name="method" id="" value="PUT">
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="id" name="id" value="<?= $data['id'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên khách hàng*</label>
                                        <input type="hidden" name="user_id" value="<?= $data['user_id'] ?>">
                                        <input type="text" class="form-control" id="name" placeholder="Nhập tên loại sản phẩm..." name="first_name" value="<?= $data['first_name'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="total_price">Đơn giá</label>
                                        <input type="text" class="form-control" id="total_price" placeholder="Nhập tên loại sản phẩm..." name="total_price" value="<?= $data['total_price'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Nhập tên loại sản phẩm..." name="phone_number" value="<?= $data['phone_number'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="shipping_address">Địa chỉ</label>
                                        <input type="text" class="form-control" id="shipping_address" placeholder="Nhập tên loại sản phẩm..." name="shipping_address" value="<?= $data['shipping_address'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" required>
                                            <option value="" disabled>Vui lòng chọn...</option>
                                            <option value="Pending" <?= ($data['status'] == 'Pending' ? 'selected' : '') ?>>Đang chờ xử lý</option>
                                            <option value="Shipped" <?= ($data['status'] == 'Shipped' ? 'selected' : '') ?>>Đã vận chuyển</option>
                                            <option value="Delivered" <?= ($data['status'] == 'Delivered' ? 'selected' : '') ?>>Đã giao hàng</option>
                                            <option value="Cancelled" <?= ($data['status'] == 'Cancelled' ? 'selected' : '') ?>>Đã hủy</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="payment_method" value="<?= $data['payment_method'] ?>">
                                        <label for="payment_method">Phương thức thanh toán*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="payment_method" name="payment_method" required disabled>
                                            <option value="" disabled>Vui lòng chọn...</option>
                                            <option value="COD" <?= ($data['payment_method'] == 'COD' ? 'selected' : '') ?>>Thanh toán khi nhận hàng (COD)</option>
                                            <option value="Online payment" <?= ($data['payment_method'] == 'Online payment' ? 'selected' : '') ?>>Thanh toán online</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_status">Trạng thái thanh toán*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="payment_status" name="payment_status" required>
                                            <option value="" disabled>Vui lòng chọn...</option>
                                            <option value="Paid" <?= ($data['payment_status'] == 'Paid' ? 'selected' : '') ?>>Đã thanh toán</option>
                                            <option value="Unpaid" <?= ($data['payment_status'] == 'Unpaid' ? 'selected' : '') ?>>Chưa thanh toán</option>
                                            <option value="Refunded" <?= ($data['payment_status'] == 'Refunded' ? 'selected' : '') ?>>Đã hoàn tiền</option>
                                        </select>
                                    </div>




                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                        <button type="submit" class="btn btn-primary" name="">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <script>
                ClassicEditor
                    .create(document.querySelector('#description'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
    <?php
    }
}
