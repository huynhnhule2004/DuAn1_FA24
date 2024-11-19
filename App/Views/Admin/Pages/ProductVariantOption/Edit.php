<?php

namespace App\Views\Admin\Pages\ProductVariantOption;

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
                        <h4 class="page-title">QUẢN LÝ GIÁ TRỊ THUỘC TÍNH SẢN PHẨM</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa giá trị thuộc tính</li>
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
            <div class="container mt-5">
                <div class="row">
                    <!-- Cột trái: Form thêm thuộc tính -->
                    <div class="col-md-6 min-vh-100">
                        <h3>Sửa giá trị thuộc tính</h3>
                        <form class="form-horizontal" action="/admin/products/product_variant_options/<?= $data['product_variant_option_detail']['id'] ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="method" id="" value="PUT">
                            <div class="form-group">
                                <label for="product_variant_id">Thuộc tính*</label>
                                <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="product_variant_id" name="product_variant_id" required aria-readonly="true">
                                    <option value="" selected disabled>Vui lòng chọn...</option>

                                    <?php
                                    foreach ($data['product_variations'] as $item) :
                                    ?>
                                        <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['product_variant_option_detail']['product_variant_id']) ? 'selected' : '' ?> aria-re><?= $item['name'] ?></option>
                                    <?php
                                    endforeach
                                    ?>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="attributeName" class="form-label">Tên giá trị thuộc tính</label>
                                <input type="text" name="name" class="form-control" id="attributeName" placeholder="Nhập tên thuộc tính" value=" <?= $data['product_variant_option_detail']['name'] ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa giá trị thuộc tính</button>
                        </form>
                    </div>

                    <!-- Cột phải: Danh sách thuộc tính -->
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Danh sách thuộc tính</h3>
                        </div>
                        <?php
                        if (count($data['product_variant_options'])) :
                        ?>
                            <div class="table-responsive">
                                <table id="" class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Thuộc tính</th>
                                            <th>Tên</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($data['product_variant_options'] as $item) :
                                        ?>
                                            <tr>
                                                <td style="white-space: nowrap;"><?= $item['id'] ?></td>
                                                <td style="white-space: nowrap;"><?= $item['product_variation_name'] ?></td>
                                                <td style="white-space: nowrap;"><?= $item['name'] ?></td>
                                                <td style="white-space: nowrap;">
                                                    <a href="/admin/products/product_variant_options/<?= $item['id'] ?>" class="btn btn-primary ">Sửa</a>
                                                    <form action="/admin/products/product_variant_options/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa thuộc tính này?')">
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
