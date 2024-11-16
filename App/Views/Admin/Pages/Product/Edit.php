<?php

namespace App\Views\Admin\Pages\Product;

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
                        <h4 class="page-title">QUẢN LÝ SẢN PHẨM</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa sản phẩm</li>
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
                            <form class="form-horizontal" action="/admin/products/<?= $data['product']['id'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa sản phẩm</h4>
                                    <input type="hidden" name="method" id="" value="PUT">
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="id" name="id" value="<?= $data['product']['id'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Tên*</label>
                                        <input type="text" class="form-control" id="product_name" placeholder="Nhập tên sản phẩm..." name="product_name" value="<?= $data['product']['product_name'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Giá tiền*</label>
                                        <input type="number" class="form-control" id="price" placeholder="Nhập giá tiền..." name="price" value="<?= $data['product']['price'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="discount_price">Giá giảm*</label>
                                        <input type="number" class="form-control" id="discount_price" placeholder="Nhập giá giảm..." name="discount_price" value="<?= $data['product']['discount_price'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="short_description">Mô tả ngắn</label>
                                        <textarea class="form-control" name="short_description" id="short_description_editor" placeholder="Nhập mô tả ngắn..."><?= htmlspecialchars($data['product']['short_description']) ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="long_description">Mô tả</label>
                                        <textarea class="form-control" name="long_description" id="long_description_editor" placeholder="Nhập mô tả..."><?= htmlspecialchars($data['product']['long_description']) ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="how_to_use">Cách sử dụng</label>
                                        <textarea class="form-control" name="how_to_use" id="how_to_use_editor" placeholder="Nhập cách sử dụng..."><?= htmlspecialchars($data['product']['how_to_use']) ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="format">Định dạng</label>
                                        <input type="text" class="form-control" id="format" placeholder="Nhập định dạng sản phẩm.." name="format" value="<?= $data['product']['format'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Loại sản phẩm*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="category_id" name="category_id" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>

                                            <?php
                                            foreach ($data['category'] as $item) :
                                            ?>
                                                <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['product']['category_id']) ? 'selected' : '' ?>><?= $item['category_name'] ?></option>
                                            <?php
                                            endforeach
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_feature">Nổi bật*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="is_feature" name="is_feature" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1" <?= ($data['product']['is_feature'] == 1 ? 'selected' : '') ?>>Nổi bật</option>
                                            <option value="0" <?= ($data['product']['is_feature'] == 0 ? 'selected' : '') ?>>Không</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" value="<?= $data['product']['status'] ?>" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="available" <?= ($data['product']['status'] == 'available' ? 'selected' : '') ?>>Còn hàng</option>
                                            <option value="out_of_stock" <?= ($data['product']['status'] == 'out_of_stock' ? 'selected' : '') ?>>Hết hàng</option>
                                            <option value="discontinued" <?= ($data['product']['status'] == 'discontinued' ? 'selected' : '') ?>>Ngừng hoạt động</option>


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
            <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

            <script>
                // Initialize CKEditor on each textarea with a unique ID
                ClassicEditor
                    .create(document.querySelector('#short_description_editor'))
                    .catch(error => {
                        console.error(error);
                    });

                ClassicEditor
                    .create(document.querySelector('#long_description_editor'))
                    .catch(error => {
                        console.error(error);
                    });
                ClassicEditor
                    .create(document.querySelector('#how_to_use_editor'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

    <?php
    }
}
