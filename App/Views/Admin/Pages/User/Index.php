<?php

namespace App\Views\Admin\Pages\User;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ NGƯỜI DÙNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách người dùng</li>
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
                                <h5 class="card-title">Danh sách người dùng</h5>
                                <?php
                                if (count($data)) :
                                ?>
                                    <div class="table-responsive" style="overflow-x: auto;">
                                        <table id="" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="white-space: nowrap;">ID</th>
                                                    <th style="white-space: nowrap;">Ảnh đại diện</th>
                                                    <th style="white-space: nowrap;">Tên đăng nhập</th>
                                                    <th style="white-space: nowrap;">Tên</th>
                                                    <th style="white-space: nowrap;">Họ</th>
                                                    <th style="white-space: nowrap;">Email</th>
                                                    <th style="white-space: nowrap;">Số điện thoại</th>
                                                    <th style="white-space: nowrap;">Địa chỉ</th>
                                                    <th style="white-space: nowrap;">Ngày sinh</th>
                                                    <th style="white-space: nowrap;">Quyền</th>
                                                    <th style="white-space: nowrap;">Trạng thái</th>
                                                    <th style="white-space: nowrap;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $item) : ?>
                                                    <tr>
                                                        <td style="white-space: nowrap;"><?= $item['id'] ?></td>
                                                        <td style="white-space: nowrap;"><img src="<?= APP_URL ?>/public/uploads/users/<?= $item['avatar'] ?>" alt="" width="50px"></td>
                                                        <td style="white-space: nowrap;"><?= $item['username'] ?></td>
                                                        <td style="white-space: nowrap;"><?= $item['first_name'] ?></td>
                                                        <td style="white-space: nowrap;"><?= $item['last_name'] ?></td>
                                                        <td style="white-space: nowrap;"><?= $item['email'] ?></td>
                                                        <td style="white-space: nowrap;"><?= $item['phone_number'] ?></td>
                                                        <td style="white-space: nowrap;"><?= $item['address'] ?></td>
                                                        <td style="white-space: nowrap;"><?= $item['date_of_birth'] ?></td>
                                                        <td style="white-space: nowrap;"><?= ($item['role'] === 'admin') ? 'Quản trị viên' : 'Khách hàng' ?></td>
                                                        <td style="white-space: nowrap;"><?= ($item['status'] === 'active') ? 'Hoạt động' : 'Khoá' ?></td>
                                                        <td style="white-space: nowrap;">
                                                            <a href="/admin/users/<?= $item['id'] ?>" class="btn btn-primary">Sửa</a>
                                                            <form action="/admin/users/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Chắc chưa?')">
                                                                <input type="hidden" name="method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

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


    <?php
    }
}
