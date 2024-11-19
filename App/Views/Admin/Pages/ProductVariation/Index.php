<?php

namespace App\Views\Admin\Pages\ProductVariation;

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
                        <h4 class="page-title">QUẢN LÝ SẢN PHẨM</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
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
                                <h5 class="card-title">Danh sách sản phẩm</h5>
                                <?php
                                if (count($data)) :
                                ?>
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tên</th>
                                                    <th>Giá</th>
                                                    <th>Giá giảm</th>
                                                    <th>Loại</th>
                                                    <th>Trạng thái</th>
                                                    <th>Nổi bật</th>
                                                    <th>Mô tả ngắn</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($data as $item) :
                                                ?>
                                                    <tr>
                                                        <td style="white-space: nowrap;"><?= $item['id'] ?></td>
                                                        <td style="white-space: nowrap;"><?= $item['product_name'] ?></td>
                                                        <td style="white-space: nowrap;"><?= number_format($item['price']) ?></td>
                                                        <td style="white-space: nowrap;"><?= number_format($item['discount_price']) ?></td>
                                                        <td style="white-space: nowrap;"><?= $item['category_name'] ?></td>
                                                        <td style="white-space: nowrap;">
                                                            <?php
                                                            switch ($item['status']) {
                                                                case 'available':
                                                                    echo 'Còn hàng';
                                                                    break;
                                                                case 'out_of_stock':
                                                                    echo 'Hết hàng';
                                                                    break;
                                                                case 'discontinued':
                                                                    echo 'Ngừng bán';
                                                                    break;
                                                                default:
                                                                    echo 'Không xác định';
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="white-space: nowrap;"><?= $item['is_feature'] == 1 ? 'Nổi bật' : 'Không nổi bật' ?></td>
                                                        <td style="white-space: nowrap;"><?= strlen($item['short_description']) > 50 ? substr($item['short_description'], 0, 50) . '...' : $item['short_description'] ?></td>
                                                        <td style="white-space: nowrap;">
                                                            <a href="/admin/products/<?= $item['id'] ?>" class="btn btn-primary ">Sửa</a>
                                                            <form action="/admin/products/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                                                <input type="hidden" name="method" value="DELETE" id="">
                                                                <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endforeach;


                                                ?>
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